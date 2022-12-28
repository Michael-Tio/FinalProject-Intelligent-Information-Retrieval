<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="styles/classification.css">
    <title>Classification - IIR Project</title>
</head>

<body>
    <header>
        <div class="header-title">
            <h1>IIR Project - Group 3</h1>
        </div>
    </header>
    <nav class="navbar">
        <a class="nav-item" href="index.php">Home</a>
        <a class="nav-item" href="crawl.php">Crawling</a>
        <a class="nav-item" href="#">Classification</a>
        <a class="nav-item" href="evaluation.php">Evaluation</a>
    </nav>
    <section>
        <form action="" method="get">
            <h2>News Classification using the KNN</h2><br>
            <div class="search">
                <span>Keyword:</span>
                <div class="search-item">
                    <div class="search-textbox">
                        <i class="fa-solid fa-magnifying-glass"></i>
                        <input type="keyword" name="keyword" class="search-text" placeholder="Search" required>
                    </div>
                </div>
                <input type="submit" name="crawl" class="search-submit" value="Enter">
            </div>
            <br>
            <div>
                <input type="radio" name="news_portal" id="okezone" value="okezone" checked required><label
                    for="okezone">Okezone</label>
                <input type="radio" name="news_portal" id="cnn" value="cnn"><label for="cnn">CNN</label>
            </div>
        </form>
    </section>
    <section>
        <table>
            <thead style="font-weight: bold;">
                <tr>
                    <td>Title</td>
                    <td>Date</td>
                    <td>Original Category</td>
                    <td>System Classification</td>
                </tr>
            </thead>
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

                if (isset($_GET['crawl']) && isset($_GET['news_portal'])) {
                    $stemmerFactory = new \Sastrawi\Stemmer\StemmerFactory();
                    $stemmer = $stemmerFactory->createStemmer();
                    $stopwordFactory = new \Sastrawi\StopWordRemover\StopWordRemoverFactory();
                    $stopword = $stopwordFactory->createStopWordRemover();

                    //Crawls News Data
                    $stemNews = $stemmer->stem($_GET['keyword']);
                    $stopNews = $stopword->remove($stemNews);

                    if ($_GET['news_portal'] == 'okezone') {
                        $key = str_replace(" ", "%20", $_GET["keyword"]);
                        $command = "python okezone.py " . $key;

                        //Retrieve Training Data from Database
                        $con = mysqli_connect("localhost", "root", "", "berita");
                        $res = $con->query("SELECT * FROM training");

                        while ($row = $res->fetch_assoc()) {
                            if($row['portal'] == "okezone"){
                                $sample_data[] = $row['clean_title'];
                                $category[] = $row['category'];
                            }
                        }
                        $data_train = $sample_data;
                    } else {
                        $key = str_replace(" ", "+", $_GET['keyword']);
                        $command = "python cnnidn.py " . $key;

                        //Retrieve Training Data from Database
                        $con = mysqli_connect("localhost", "root", "", "berita");
                        $res = $con->query("SELECT * FROM training");

                        while ($row = $res->fetch_assoc()) {
                            if($row['portal'] == "cnn"){
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

                        $sql = "INSERT INTO `testing`(`title`, `date`, `original_category`, `classification`) VALUES ('" . $data[0] . "','" . $data[1] . "','" . $data[2] . "','" . $classfication . "')";
                        mysqli_query($con, $sql);

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
        </table>
    </section>
</body>

</html>