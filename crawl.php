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

                        // $sql = "INSERT INTO training('title', 'clean_title', 'category', 'date', 'portal') VALUES ('".$data[0]."','".$outputStop."','".$data[2]."','".$data[1]."','okezone')";
                        $sql = "INSERT INTO training(title, clean_title, category, date, portal) VALUES (?, ?, ?, ?, ?)";
                        $stmt = $con->prepare($sql);
                        $stmt->bind_param('sssss', $data[0], $outputStop, $data[2], $data[1], $portal);
                        $stmt->execute();
                        // mysqli_query($con,$sql);
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
                        
                        // $sql = "INSERT INTO training('title', 'clean_title', 'category', 'date', 'portal') VALUES ('".$data[0]."','".$outputStop."','".$data[2]."','".$data[1]."','cnn')";
                        // mysqli_query($con,$sql);

                        $sql = "INSERT INTO training(title, clean_title, category, date, portal) VALUES (?, ?, ?, ?, ?)";
                        $stmt = $con->prepare($sql);
                        $stmt->bind_param('sssss', $data[0], $outputStop, $data[2], $data[1], $portal);
                        $stmt->execute();
                    }
                
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
                    // $html1 = setCURL("https://www.google.com/search?q=cnnindonesia.com" . $keyCNN);
                    // $dom1 = new simple_html_dom();
                    // $dom2 = new simple_html_dom();
                    // $dom3 = new simple_html_dom();
                    // $dom1->load($html1);

                    // foreach ($dom1->find("a[href^=/url?]") as $search) {
                    //     $link = $search->href;
                    //     $content = file_get_html('https://www.google.com/' . $link);
                    //     $dom2->load($content);

                    //     $realLink = $dom2->find('a', 0)->href;

                    //     $news = file_get_html($realLink);
                    //     $dom3->load($news);

                    //     if($dom3->find('h1[class="title"]',0)->innertext)
                    //     {
                    //         echo $title = $dom3->find('h1[class="title"]',0)->innertext;
                    //         echo '<br>';
                    //     }
                    //     else{
                    //         continue;
                    //     }

                    //     if($dom3->find('div[class="date"]',0)->innertext)
                    //     {
                    //         echo $date = $dom3->find('div[class="date"]',0)->innertext;
                    //         echo '<br>';
                    //     }
                    //     else{
                    //         continue;
                    //     }

                    //     if($dom3->find('a[class="gtm_breadcrumb_subkanal"]',0)->innertext)
                    //     {
                    //         echo $category = $dom3->find('a[class="gtm_breadcrumb_subkanal"]',0)->innertext;
                    //         echo '<br>';
                    //     }
                    //     else{
                    //         continue;
                    //     }

                    //     if (!empty($search->plaintext)) {

                    //         // $realTitle = $dom2->find('h1',2)->innertext;
                    //         // echo $realTitle;
                
                    //         // if (strpos($search->href, "cnnindonesia.com/tag/") !== false or strpos($search->href, "google.com") !== false) {
                    //         //     continue;
                    //         // } else {
                    //         //     $cnnLink = substr($search->href, 7);
                    //         //     // echo $cnnLink . "<br>";
                    //         //     // $html = file_get_html($cnnLink);
                    //         //     $html = setCURL($cnnLink);
                    //         //     $news = new simple_html_dom();
                    //         //     $news->load($html);
                    //         //     $cnnArticle = $news->find("a", 0)->href;
                
                    //         //     // $html2 = file_get_html($cnnArticle);
                    //         //     $html2 = setCURL($cnnArticle);
                    //         //     $new = new simple_html_dom();
                    //         //     $new->load($html2);
                
                    //         //     $cnnTitle = $new->find("h1[class='title']", 0)->innertext;
                    //         //     echo $cnnTitle . "<br>";
                
                    //         // if($news->find('h1[class="title"]',0)->innertext)
                    //         // {
                    //         // 	$title = $news->find('h1[class="title"]',0)->innertext;
                    //         //     echo $title . "<br>";
                    //         // }
                    //         // else{
                    //         // 	continue;
                    //         // }
                
                    //         // echo $news . "<br>";
                    //         //}
                    //     }
                    // }
                }

                echo "</tbody></table>";
                mysqli_close($con);
                ?>
        </section>
    </div>
</body>

</html>