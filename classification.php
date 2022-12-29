<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style.css">
    <title>Classification | Lambe Turah</title>
</head>

<body>
    <div id="container">
        <nav>
            <a href="index.php">Home</a> |
            <a href="crawl.php">Crawling</a> |
            <a href="classification.php" class="active">Classification</a> |
            <a href="evaluation.php">Evaluation</a>
        </nav>
        <section id="search">
            <div id="title">
                <h1>News Classification using the KNN method</h1>
            </div>
            <div id="input">
                <form action="" method="post">
                    Keyword :
                    <i class="material-icons">search</i>
                    <input type="text" name="keyword" value="<?= (isset($_POST['keyword'])) ? $_POST['keyword'] : '' ?>" placeholder="Search" required>
                    <input type="submit" name="crawl" value="Enter">
                    <br>
                    <div>
                        <input type="radio" name="news_portal" id="okezone" value="okezone" checked required><label for="okezone">Okezone</label>
                        <input type="radio" name="news_portal" id="cnn" value="cnn"><label for="cnn">CNN</label>
                    </div>
                </form>
            </div>
        </section>
        <section id="result">
            <tbody>
                <?php
                require_once __DIR__ . '/vendor/autoload.php';
                include_once('simple_html_dom.php');

                use Phpml\FeatureExtraction\TokenCountVectorizer;
                use Phpml\Tokenization\WhitespaceTokenizer;
                use Phpml\FeatureExtraction\TfIdfTransformer;
                use Phpml\Classification\KNearestNeighbors;

                $data_train = array();
                $sample_data = array();
                $category = array();
                $command = "";

                if (isset($_POST['crawl']) && isset($_POST['news_portal'])) {
                    $portal = $_POST['news_portal'];
                    echo "<div id='title'><h3>Classification Result for ".$portal." with KNN method</h3></div>";
                    echo "<table><thead>";
                    echo "<tr><th>Title</th><th>Date</th><th>Original Category</th><th>System Classification</th></tr>";
                    echo "</thead><tbody>";

                    $stemmerFactory = new \Sastrawi\Stemmer\StemmerFactory();
                    $stemmer = $stemmerFactory->createStemmer();
                    $stopwordFactory = new \Sastrawi\StopWordRemover\StopWordRemoverFactory();
                    $stopword = $stopwordFactory->createStopWordRemover();

                    //Crawls News Data
                    $stemNews = $stemmer->stem($_POST['keyword']);
                    $stopNews = $stopword->remove($stemNews);

                    if ($_POST['news_portal'] == 'okezone') {
                        $key = str_replace(" ", "%20", $_POST["keyword"]);
                        $command = "python okezone.py " . $key;

                        //Retrieve Training Data from Database
                        $con = mysqli_connect("localhost", "root", "", "berita");
                        $res = $con->query("SELECT * FROM training");

                        while ($row = $res->fetch_assoc()) {
                            if ($row['portal'] == "okezone") {
                                $sample_data[] = $row['clean_title'];
                                $category[] = $row['category'];
                            }
                        }
                        $data_train = $sample_data;
                    } else {
                        $key = str_replace(" ", "+", $_POST['keyword']);
                        $command = "python cnnidn.py " . $key;

                        //Retrieve Training Data from Database
                        $con = mysqli_connect("localhost", "root", "", "berita");
                        $res = $con->query("SELECT * FROM training");

                        while ($row = $res->fetch_assoc()) {
                            if ($row['portal'] == "cnn") {
                                $sample_data[] = $row['clean_title'];
                                $category[] = $row['category'];
                            }
                        }
                        $data_train = $sample_data;
                    }
                    $output = shell_exec($command);
                    $result = json_decode($output, true);

                    //Classification News Data
                    foreach ((array) $result as $data) {
                        $outputStem = $stemmer->stem($data[0]);
                        $outputStop = $stopword->remove($outputStem);

                        $sample_data[] = $outputStop;

                        //Calculate Tf-Idf for The New News Data
                        $tf = new TokenCountVectorizer(new WhitespaceTokenizer());
                        $tf->fit($sample_data);
                        $tf->transform($sample_data);

                        $tfidf = new TfIdfTransformer($sample_data);
                        $tfidf->transform($sample_data);

                        //Delete New News Data In The Last Index of Array
                        $new_data = $sample_data[count($sample_data) - 1];
                        array_pop($sample_data);

                        //Classfication News Category Using KNN
                        $k = round(sqrt(count($sample_data)));
                        $classifier = new KNearestNeighbors($k);
                        $classifier->train($sample_data, $category);
                        $classfication = $classifier->predict($new_data);

                        // $sql = "INSERT INTO testing('title', 'date', 'original_category', 'classification') VALUES ('" . $data[0] . "','" . $data[1] . "','" . $data[2] . "','" . $classfication . "')";
                        // mysqli_query($con, $sql);
                        $sql = "INSERT INTO testing(title, date, original_category, classification) VALUES (?, ?, ?, ?)";
                        $stmt = $con->prepare($sql);
                        $stmt->bind_param('ssss', $data[0], $data[1], $data[2], $classfication);
                        $stmt->execute();

                        $sample_data = $data_train;

                        echo "<tr>";
                        echo "<td>$data[0]</td>";
                        echo "<td>$data[1]</td>";
                        echo "<td>$data[2]</td>";
                        echo "<td>$classfication</td></tr>";
                    }
                }
                ?>
            </tbody>
        </section>
    </div>
</body>

</html>