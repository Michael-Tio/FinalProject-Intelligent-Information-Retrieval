<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crawl | Lambe Turah</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div id="container">
        <nav>
            <a href="index.php">Home</a> |
            <a href="crawl.php" class="active">Crawling</a> |
            <a href="classification.php">Classification</a> |
            <a href="evaluation.php">Evaluation</a>
        </nav>
        <section id="search">
            <div id="title">
                <h1>Crawling Data from Okezone and CNN Indonesia</h1>
            </div>
            <div id="input">
                <form action="" method="post">
                    Keyword :
                    <i class="material-icons">search</i>
                    <input type="text" placeholder="Search" name="keyword"
                        value="<?=(isset($_POST['keyword'])) ? $_POST['keyword'] : '' ?>">
                    <input type="submit" value="Crawl" name="crawl">
                </form>
            </div>
        </section>
        <section id="result">
                <?php
                set_time_limit(600);
                require_once __DIR__ . '/vendor/autoload.php';
                include_once('simple_html_dom.php');
                $con = mysqli_connect("localhost" ,"root" ,"","berita");
                $sql = "";


                function setCURL($url)
                {
                    $curl = curl_init();
                    curl_setopt($curl, CURLOPT_URL, $url);
                    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
                    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($curl, CURLOPT_HEADER, false);
                    $c_url = curl_exec($curl);
                    curl_close($curl);

                    return $c_url;
                }

                if (isset($_POST['crawl'])) {
                    echo "<div id='title'><h3>Crawled Data for '" . $_POST['keyword'] . "'</h3></div>";

                    echo "<table><thead>";
                    echo "<tr><th>Title</th><th>Date</th><th>Category</th></tr>";
                    echo "</thead><tbody>";

                    $keyOkezone = str_replace(" ", "%20", $_POST["keyword"]);
                    $keyCNN = str_replace(" ", "+", $_POST['keyword']);

                    $stemmerFactory = new \Sastrawi\Stemmer\StemmerFactory();
                    $stemmer = $stemmerFactory->createStemmer();
                    $stopwordFactory = new \Sastrawi\StopWordRemover\StopWordRemoverFactory();
                    $stopword = $stopwordFactory->createStopWordRemover();

                    // CRAWL OKEZONE
                    $commandOkezone = "python okezone.py " . $keyOkezone;
                    $outputOkezone = shell_exec($commandOkezone);
                    $resultOkezone = json_decode($outputOkezone, true);
                
                    foreach ((array)$resultOkezone as $data) {
                        echo "<tr>";
                        echo "<td>$data[0]</td>";
                        echo "<td>$data[1]</td>";
                        echo "<td>$data[2]</td>";
                        echo "<tr>";

                        $outputStem = $stemmer->stem($data[0]);
                        $outputStop = $stopword->remove($outputStem);

                        $portal = "okezone";

                        $sql = "INSERT INTO training(title, clean_title, category, date, portal) VALUES (?, ?, ?, ?, ?)";
                        $stmt = $con->prepare($sql);
                        $stmt->bind_param('sssss', $data[0], $outputStop, $data[2], $data[1], $portal);
                        $stmt->execute();
                    }
                
                    // CRAWL CNN
                    $commandCNN = "python cnnidn.py " . $keyCNN;
                    $outputCNN = shell_exec($commandCNN);
                    $resultCNN = json_decode($outputCNN, true);
                
                    foreach ((array)$resultCNN as $data) {
                        echo "<tr>";
                        echo "<td>$data[0]</td>";
                        echo "<td>$data[1]</td>";
                        echo "<td>$data[2]</td>";

                        $outputStem = $stemmer->stem($data[0]);
                        $outputStop = $stopword->remove($outputStem);

                        $portal = "cnn";

                        $sql = "INSERT INTO training(title, clean_title, category, date, portal) VALUES (?, ?, ?, ?, ?)";
                        $stmt = $con->prepare($sql);
                        $stmt->bind_param('sssss', $data[0], $outputStop, $data[2], $data[1], $portal);
                        $stmt->execute();
                    }
                }

                echo "</tbody></table>";
                mysqli_close($con);
                ?>
        </section>
    </div>
</body>

</html>