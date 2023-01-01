
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
                    <br>
                    <div>
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

                    $i=0;
                    $sample_data = array();
                    $judul = array();
                    $con = mysqli_connect("localhost" ,"root" ,"","berita");
                    $sql_select = "SELECT * FROM training";
                    $result = mysqli_query($con,$sql_select);

                    $sql = "";

                    if (mysqli_num_rows($result)>0) {
                        while($row = mysqli_fetch_assoc($result)) {
                            $sample_data[$i] = $row["clean_title"];
                            $judul[$i] = $row["title"];
                            $i++;
                        }

                        $outputStem = $stemmer->stem($_POST["keyword"]);
                        $outputStop = $stopword->remove($outputStem);
                        $sample_data[] = $outputStop;

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
                    $jum = count($sample_data);
                    if($_POST['similarity'] == "euclidean"){
                        for($i=0;$i<$jum-1;$i++) {
                            $hasil = 0.0;
                            $hasil = $euclidean -> distance($sample_data[$i], $sample_data[$jum-1]);
                            echo "<tr><td>".$judul[$i]."</td>";
                            echo "<td>" .round($hasil,3)."</td></tr>";
                        }
                    }else if($_POST['similarity'] == "cosine"){
                        for($i=0; $i<$jum-1; $i++){
                            $numerator = 0.0;
                            $denom_wkq = 0.0;
                            $denom_wkj = 0.0;
                            $denumerator = 0.0;
                            for($x=0; $x<count($sample_data[$i]); $x++){
                                $numerator += $sample_data[$jum-1][$x] * $sample_data[$i][$x];
                                $denom_wkq += pow($sample_data[$jum-1][$x], 2);
                                $denom_wkj += pow($sample_data[$i][$x], 2);
                            }
                            $denumerator = sqrt($denom_wkq*$denom_wkj);
                            if($denumerator != 0)
                            {
                                $result = $numerator / $denumerator;
                            }
                            else{
                                $result = 0;
                            }
                            echo "<tr><td>".$judul[$i]."</td>";
                            echo "<td>" .round($result,3)."</td></tr>";
                        }
                    }
                    // for($i=0;$i<count($sample_data)-1;$i++) {
                    //     $hasil = 0.0;
                    //     if($_POST['similarity'] == "euclidean"){
                    //         $hasil = $euclidean -> distance($sample_data[$i], $sample_data[0]);
                    //     }else if($_POST['similarity'] == "cosine"){
                    //         $hasil = CosineSimilarity::calc($sample_data[$i], $sample_data[0]);
                    //     }
                    //     echo "<tr><td>".$judul[$i]."</td>";
                    //     echo "<td>" .round($hasil,3)."</td></tr>";
                    // }

                    echo "</table>";
                    mysqli_close($con);
                }
            ?>
        </section>
    </div>
</body>

</html>
