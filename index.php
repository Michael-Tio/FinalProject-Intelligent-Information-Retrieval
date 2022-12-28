
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | Lambe Turah</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div id="container">
        <nav>
            <a href="index.php" class="active">Home</a> |
            <a href="crawl.php">Crawling</a> |
            <a href="classification.php">Classification</a> |
            <a href="">Evaluation</a>
        </nav>
        <section id="search">
            <div id="title">
                <h1>Welcome to Berita Lambe Turah</h1> 
            </div>
            <div id="input">
                <form action="" method="post">
                    Keyword :
                    <i class="material-icons">search</i>
                    <input type="text" placeholder="Search" name="keyword">
                    <input type="submit" name="search" value="Find">
                    <br><br>
                    <div style="margin-right: 450px;">
                        <input type="radio" name="similarity"  
                        value="euclidean" required>Euclidean
                        <input type="radio" name="similarity" 
                        value="cosine">Cosine
                    </div>
                </form>
            </div>
        </section>
        <section id="result">
            <?php
                require_once __DIR__ . '/vendor/autoload.php';
                require 'CosineSimilarity.php';

                use Phpml\FeatureExtraction\TokenCountVectorizer;
                use Phpml\Tokenization\WhitespaceTokenizer;
                use Phpml\FeatureExtraction\TfIdfTransformer;
                use Phpml\Math\Distance\Euclidean;

                if(isset($_POST["search"])) {
                    $stemmerFactory = new \Sastrawi\Stemmer\StemmerFactory();
                    $stemmer = $stemmerFactory->createStemmer();

                    $stopwordFactory =new \Sastrawi\StopWordRemover\StopWordRemoverFactory();
                    $stopword = $stopwordFactory->createStopWordRemover();

                    $i=1;
                    $sample_data = array();
                    $judul = array();
                    $con = mysqli_connect("localhost" ,"root" ,"","berita");
                    $sql_select = "SELECT * FROM training";
                    $result = mysqli_query($con,$sql_select);

                    $sql = "";

                    if (mysqli_num_rows($result)>0) {
                        $outputStem = $stemmer->stem($_POST["keyword"]);
                        $outputStop = $stopword->remove($outputStem);
                        $sample_data[0] = $outputStop;

                        while($row = mysqli_fetch_assoc($result)) {
                            $sample_data[$i] = $row["clean_title"];
                            $judul[$i] = $row["title"];
                            $i++;
                        }

                        $tf = new TokenCountVectorizer(new WhitespaceTokenizer());
                        $tf->fit($sample_data);
                        $tf->transform($sample_data);

                        $tfidf = new TfIdfTransformer($sample_data);
                        $tfidf->transform($sample_data);
                    }


                    echo "<table border='1'>";
                    echo "<th align='center'>News Title</th>";
                    echo "<th align='center'>Similarity Score</th></tr>";

                    $euclidean = new Euclidean();
                    for($i=1;$i<count($sample_data);$i++) {
                        $hasil = 0.0;
                        if($_POST['similarity'] == "euclidean"){
                            $hasil = $euclidean -> distance($sample_data[$i], $sample_data[0]);
                        }else if($_POST['similarity'] == "cosine"){
                            $hasil = CosineSimilarity::calc($sample_data[$i], $sample_data[0]);
                        }
                        echo "<tr><td>".$judul[$i]."</td>";
                        echo "<td>" .round($hasil,3)."</td></tr>";
                    }

                    echo "</table>";
                    mysqli_close($con);
                }
            ?>
        </section>
    </div>
</body>

</html>
