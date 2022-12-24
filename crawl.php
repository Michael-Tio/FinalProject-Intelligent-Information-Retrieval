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
            <a href="crawl.php">Crawling</a> |
            <a href="">Classification</a> |
            <a href="">Evaluation</a>
        </nav>
        <section id="search">
            <div id="title">
                <h1>Crawling Data from Okezone and CNN Indonesia</h1>
            </div>
            <div id="input">
                <form action="" method="post">
                    Keyword :
                    <i class="material-icons">search</i>
                    <input type="text" placeholder="Search" name="keyword">
                    <input type="submit" value="Crawl" name="crawl">
                </form>
            </div>
        </section>
        <section>
            <table>
                <thead style="font-weight: bold;">
                    <tr>
                        <td>Title</td>
                        <td>Date</td>
                        <td>Category</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require_once __DIR__ . '/vendor/autoload.php';
                    include_once('simple_html_dom.php');

                    if (isset($_POST['crawl'])) {
                        $keyOkezone = str_replace(" ", "%20", $_POST["keyword"]);
                        $keyCNN = str_replace(" ", "+", $_POST['keyword']);

                        $stemmerFactory = new \Sastrawi\Stemmer\StemmerFactory();
                        $stemmer = $stemmerFactory->createStemmer();
                        $stopwordFactory = new \Sastrawi\StopWordRemover\StopWordRemoverFactory();
                        $stopword = $stopwordFactory->createStopWordRemover();

                        // CRAWL OKEZONE
                        // $commandOkezone = "python okezone.py " . $keyOkezone;
                        // $outputOkezone = shell_exec($commandOkezone);
                        // $resultOkezone = json_decode($outputOkezone, true);

                        // foreach ((array)$resultOkezone as $data) {
                        //     echo "<tr>";
                        //     echo "<td>$data[0]</td>";
                        //     echo "<td>$data[1]</td>";
                        //     echo "<td>$data[2]</td>";
                        //     echo "<tr>";
                        // }

                        // CRAWL CNN
                        // $commandCNN = "python cnn.py " . $keyCNN;
                        // $outputCNN = shell_exec($commandCNN);
                        // $resultCNN = json_decode($outputCNN, true);

                        // foreach ((array)$resultCNN as $data) {
                        //     echo "<tr>";
                        //     echo "<td>$data[0]</td>";
                        //     echo "<td>$data[1]</td>";
                        //     echo "<td>$data[2]</td>";
                        //     echo "<tr>";
                        // }

                        $curl = curl_init();
                        curl_setopt($curl, CURLOPT_URL, "https://www.cnnindonesia.com/search/?query=" . $keyCNN);
                        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true); // so Google won't redirect
                        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                        curl_setopt($curl, CURLOPT_HEADER, false);
                        $url = curl_exec($curl);
                        curl_close($curl);

                        $html = new simple_html_dom();
                        $html->load($url);

                        // $html = file_get_html("https://www.cnnindonesia.com/search/?query=" . $keyCNN);
                        // $html = file_get_html('https://www.cnnindonesia.com/');

                        foreach ($html->find('article') as $berita) {
                            $cnnTitle = $berita->find('h2[class="title"]', 0)->innertext;
                            $cnnDate = $berita->find('a', 0)->find('span[class="box_text"]', 0)->find('span[class="date"]', 0)->plaintext;
                            $cnnCategory = $berita->find('a', 0)->find('span[class="box_text"]', 0)->find('span[class="kanal"]', 0)->innertext;

                            echo "<tr>";
                            echo "<td>$cnnTitle</td>";
                            echo "<td>$cnnDate</td>";
                            echo "<td>$cnnCategory</td>";
                            echo "<tr>";
                        }
                    }

                    ?>
                </tbody>
            </table>
        </section>
    </div>
</body>

</html>