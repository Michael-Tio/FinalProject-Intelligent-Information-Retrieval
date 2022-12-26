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
                    <input type="text" placeholder="Search" name="keyword" value="<?= (isset($_POST['keyword'])) ? $_POST['keyword'] : '' ?>">
                    <input type="submit" value="Crawl" name="crawl">
                </form>
            </div>
        </section>
        <section>
            <table>
                    <?php
                    require_once __DIR__ . '/vendor/autoload.php';
                    include_once('simple_html_dom.php');

                    function setCURL ($url) {
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
                        echo "<thead style='font-weight: bold;'>";
                        echo "<tr><td>Title</td><td>Date</td><td>Category</td></tr>";
                        echo "</thead><tbody>";

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

                        // SELENIUM
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

                        // CURL
                        // $curl = curl_init();
                        // curl_setopt($curl, CURLOPT_URL, "https://www.cnnindonesia.com/search/?query=" . $keyCNN);
                        // curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true); // so Google won't redirect
                        // curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                        // curl_setopt($curl, CURLOPT_HEADER, false);
                        // curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.1) Gecko/20061204 Firefox/2.0.0.1');
                        // $url = curl_exec($curl);
                        // curl_close($curl);
                        // $html = new simple_html_dom();
                        // $html->load($url);

                        // SIMPLE HTML DOM
                        // $html = file_get_html("https://www.cnnindonesia.com/search/?query=" . $keyCNN);

                        // foreach ($html->find('article') as $berita) {
                        //     $cnnTitle = $berita->find('h2[class="title"]', 0)->innertext;
                        //     // $cnnDate = $berita->find('a', 0)->find('span[class="box_text"]', 0)->find('span[class="date"]', 0)->plaintext;
                        //     // $cnnCategory = $berita->find('a', 0)->find('span[class="box_text"]', 0)->find('span[class="kanal"]', 0)->innertext;

                        //     echo "<tr>";
                        //     echo "<td>$cnnTitle</td>";
                        //     // echo "<td>$cnnDate</td>";
                        //     // echo "<td>$cnnCategory</td>";
                        //     echo "<tr>";
                        // }
                        
                        // $curl = curl_init();
                        // curl_setopt($curl, CURLOPT_URL, "https://www.google.com/search?q=cnnindonesia.com+$keyCNN");
                        // curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true); // so Google won't redirect
                        // curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                        // curl_setopt($curl, CURLOPT_HEADER, false);
                        // $url = curl_exec($curl);
                        // curl_close($curl);

                        // $html1 = file_get_html("https://www.google.com/search?q=cnnindonesia.com+$keyCNN");
                        $html1 = setCURL("https://www.google.com/search?q=cnnindonesia.com+$keyCNN");
                        $dom1 = new simple_html_dom();
                        $dom1->load($html1);

                        foreach ($dom1->find("a[href^=/url?]") as $search) {
                            if (!empty($search->plaintext)) {
                                if (strpos($search->href, "cnnindonesia.com/tag/") !== false or strpos($search->href, "google.com") !== false) {
                                    continue;
                                } else {
                                    $cnnLink = substr($search->href, 7);
                                    // echo $cnnLink . "<br>";
                                    // $html = file_get_html($cnnLink);
                                    $html = setCURL($cnnLink);
                                    $news = new simple_html_dom();
                                    $news->load($html);
                                    $cnnArticle = $news->find("a", 0)->href;

                                    // $html2 = file_get_html($cnnArticle);
                                    $html2 = setCURL($cnnArticle);
                                    $new = new simple_html_dom();
                                    $new->load($html2);

                                    $cnnTitle = $new->find("h1[class='title']", 0)->innertext;
                                    echo $cnnTitle . "<br>";

                                    // if($news->find('h1[class="title"]',0)->innertext)
									// {
									// 	$title = $news->find('h1[class="title"]',0)->innertext;
                                    //     echo $title . "<br>";
									// }
									// else{
									// 	continue;
									// }

                                    // echo $news . "<br>";
                                }
                            }
                        }
                    }

                    echo "</tbody>";
                    ?>
            </table>
        </section>
    </div>
</body>

</html>