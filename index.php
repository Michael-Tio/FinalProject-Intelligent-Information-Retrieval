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
            <a href="evaluation.php">Evaluation</a>
        </nav>
        <section id="search">
            <div id="title">
                <h1>Welcome to Berita Lambe Turah</h1>
            </div>
            <div id="input">
                <form action="" method="get">
                    Keyword :
                    <i class="material-icons">search</i>
                    <input type="text" placeholder="Search" name="keyword" value="<?= (isset($_GET['keyword'])) ? $_GET['keyword'] : '' ?>" required>
                    <input type="submit" name="search" value="Find">
                    <br>
                    <div>
                        <input type="radio" name="similarity" value="euclidean" 
                        <?php if (isset($_GET['similarity']) && $_GET['similarity']=="euclidean") echo "checked";?>
                         required><label for="euclidean">Euclidean</label>
                        <input type="radio" name="similarity" value="cosine"
                        <?php if (isset($_GET['similarity']) && $_GET['similarity']=="cosine") echo "checked";?>
                        ><label for="cosine">Cosine</label>
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

            if (isset($_GET["search"])) {
                $stemmerFactory = new \Sastrawi\Stemmer\StemmerFactory();
                $stemmer = $stemmerFactory->createStemmer();

                $stopwordFactory = new \Sastrawi\StopWordRemover\StopWordRemoverFactory();
                $stopword = $stopwordFactory->createStopWordRemover();

                $i = 0;
                $sample_data = array();
                $judul = array();
                $con = mysqli_connect("localhost", "root", "", "berita");
                $sql_select = "SELECT * FROM training";
                $result = mysqli_query($con, $sql_select);

                $similarityArr = array();

                $sql = "";

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $sample_data[$i] = $row["clean_title"];
                        $judul[$i] = $row["title"];
                        $i++;
                    }
                    $outputStem = $stemmer->stem($_GET["keyword"]);
                    $outputStop = $stopword->remove($outputStem);
                    $sample_data[] = $outputStop;
                }

                $tf = new TokenCountVectorizer(new WhitespaceTokenizer());
                $tf->fit($sample_data);
                $tf->transform($sample_data);

                $tfidf = new TfIdfTransformer($sample_data);
                $tfidf->transform($sample_data);

                $euclidean = new Euclidean();
                $jum = count($sample_data);
                $hasil = 0.0;

                if ($_GET['similarity'] == "euclidean") {
                    for ($i = 0; $i < $jum - 1; $i++) {
                        $hasil = $euclidean->distance($sample_data[$i], $sample_data[$jum - 1]);
                        array_push($similarityArr, round($hasil, 3));
                    }
                    array_multisort($similarityArr, SORT_ASC, SORT_NUMERIC, $judul);

                } else if ($_GET['similarity'] == "cosine") {
                    for ($i = 0; $i < $jum - 1; $i++) {
                        $numerator = 0.0;
                        $denom_wkq = 0.0;
                        $denom_wkj = 0.0;
                        $denumerator = 0.0;
                        for ($x = 0; $x < count($sample_data[$i]); $x++) {
                            $numerator += $sample_data[$jum - 1][$x] * $sample_data[$i][$x];
                            $denom_wkq += pow($sample_data[$jum - 1][$x], 2);
                            $denom_wkj += pow($sample_data[$i][$x], 2);
                        }
                        $denumerator = sqrt($denom_wkq * $denom_wkj);
                        if ($denumerator != 0) {
                            $hasil = $numerator / $denumerator;
                        } else {
                            $hasil = 0.0;
                        }
                        array_push($similarityArr, round($hasil, 3));
                    }
                    array_multisort($similarityArr, SORT_DESC, SORT_NUMERIC, $judul);
                }

                //Query Expansion
                $topJuduls = array_slice($judul,0,3);//Ambil 3 berita teratas
                $topJudul_clean = array();
                foreach($topJuduls as $topJudul){//stem&stopword berita teratas
                    $topJudulStem = $stemmer->stem($topJudul);
                    $topJudulStop = $stopword->remove($topJudulStem);
                    $topJudul_clean[] = $topJudulStop;
                }

                $topJudul_clean[] = $outputStop;//memasukan clean search keyword kedalam berita

                $tf = new TokenCountVectorizer(new WhitespaceTokenizer());
                $tf->fit($topJudul_clean);
                $tf->transform($topJudul_clean);
                $vocabulary = $tf->getVocabulary();

                $tfidf = new TfIdfTransformer($topJudul_clean);
                $tfidf->transform($topJudul_clean);

                //Show table tf-id buat ngetest
                $i=1;
                echo "<b>TF-IDF</b><br><br>" ;
                echo "<table border='1'>";
                echo "<tr><th align='center'></th>";
                foreach($vocabulary as $term) echo "<th align='center'>".$term."</th>" ;
                echo "</tr>";
                foreach($topJudul_clean as $isi){
                if($i==count($topJudul_clean)) echo "<tr><td>Q</td>" ;
                else echo "<tr><td>D".$i."</td>" ;

                foreach($isi as $item) {
                    echo "<td>".round($item,1)."</td>";
                }
                echo "</tr>" ;
                $i++;
                }
                echo "</table><br><br>" ;

                //ambil relatedWord yang besarnya lebih dari 0.5
                $relatedWord = array();
                echo "<b>Related Keyword</b>";
                echo "<br>";
                for ($i=0; $i < count($topJudul_clean) - 1 ; $i++) { 
                    for ($j=0; $j < count($topJudul_clean[$i])- 1 ; $j++) { 
                        if ($topJudul_clean[$i][$j] > 0){
                            $relatedWord[] = ucfirst($vocabulary[$j]);
                        }
                   }
                }

                //tampilin hasil Related Keyword
                $arrSearchWord = explode(" ", $outputStop);
                echo "<br>";
                echo  $relatedWord[0] ." ". ucfirst($arrSearchWord[0]) ." ". ucfirst($arrSearchWord[1]);
                echo "<br>";
                echo ucfirst($arrSearchWord[0]) ." ". $relatedWord[1] ." ". ucfirst($arrSearchWord[1]);
                echo "<br>";
                echo ucfirst($arrSearchWord[0]) ." ". ucfirst($arrSearchWord[1]) ." ". $relatedWord[2];
                echo "<br>";
                echo "<table><thead>";
                echo "<tr><th>News Title</th><th>Similarity Score</th></tr>";
                echo "</thead><tbody>";

                for ($i = 0; $i < $jum - 1; $i++) {
                    echo "<tr><td>" . $judul[$i] . "</td>";
                    echo "<td>" . $similarityArr[$i] . "</td></tr>";
                }
                // for($i=0;$i<count($sample_data)-1;$i++) {
                //     $hasil = 0.0;
                //     if($_GET['similarity'] == "euclidean"){
                //         $hasil = $euclidean -> distance($sample_data[$i], $sample_data[0]);
                //     }else if($_GET['similarity'] == "cosine"){
                //         $hasil = CosineSimilarity::calc($sample_data[$i], $sample_data[0]);
                //     }
                //     echo "<tr><td>".$judul[$i]."</td>";
                //     echo "<td>" .round($hasil,3)."</td></tr>";
                // }
                echo "</tbody></table>";
                mysqli_close($con);
            }
            ?>
        </section>
    </div>
</body>

</html>