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
            <a href="">Classification</a> |
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
                    <input type="text" placeholder="Search">
                    <input type="submit" value="Find">
                    <div>
                        <input type="radio" name="similarity" value="euclidean" checked>Euclidean
                        <input type="radio" name="similarity" value="cosine">Cosine
                    </div>
                </form>
            </div>
        </section>
        <section>
            <?php
                require_once __DIR__ . '/vendor/autoload.php ';
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
                    $con = mysqli_connect("localhost" ,"root" ,"","news");
                    $sql_select = "SELECT title,clean_data FROM contents";
                    $result = mysqli_query($con,$sql_select);

                    $sql = "";

                    if (mysqli_num_rows($result)>0) {
                    $outputStem = $stemmer->stem($_POST["keyword"]);
                    $outputStop = $stopword->remove($outputStem);
                    $sample_data[0] = $outputStop;

                    while($row = mysqli_fetch_assoc($result)) {
                        $sample_data[$i] = $row["clean_data"];
                        $judul[$i] = $row["title"];
                        $i++;
                    }

                    $tf =new TokenCountVectorizer(new WhitespaceTokenizer());
                    $tf->fit($sample_data);
                    $tf->transform($sample_data);

                    $tfidf = new TfIdfTransformer($sample_data);
                    $tfidf->transform($sample_data);
                    }

                    //Chebyshev
                    // for($i=1;$i<count($sample_data);$i++) {
                    // $hasil = 0.0;
                    // for($x=0;$x<count($sample_data[$i]);$x++){
                    //     if(abs($sample_data[0][$x] - $sample_data[$i][$x])>$hasil){
                    //     $hasil = abs($sample_data[0][$x] -$sample_data[$i][$x]);
                    //     }
                    // }

                    // $sql = 'UPDATE contents SET similarity = "'. round($hasil,2). '" WHERE title = "'. $judul[$i].'"';
                    // mysqli_query($con, $sql);
                    // }

                    if($_POST['similarity'] == "euclidean"){
                        //Euclidean
                        echo "test";
                    }else if($_POST['similarity'] == "cosine"){
                        //cosine

                    }

                    echo "<table border='1'>";
                    echo "<th align='center'>News Title</th>";
                    echo "<th align='center'>News Link</th>";
                    echo "<th align='center'>Similarity Score</th>c/tr>";

                    $sql_select = "SELECT title,link,similarity FROM contents ORDER BY similarity asc";
                    $result = mysqli_query($con, $sql_select);

                    if(mysqli_num_rows($result) >0) {
                        while($row = mysqli_fetch_assoc($result)){
                            echo "<tr><td>".$row["title"]."</td>";
                            echo "<td>" .$row["link"]. "</td>";
                            echo "<td>" .$row["similarity"]."</td></tr>";
                        }
                    }

                    echo "</table>";
                    mysqli_close($con);
                }
            ?>
        </section>
    </div>
</body>

</html>
