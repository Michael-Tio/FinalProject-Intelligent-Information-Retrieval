<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style.css">

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js">
    </script>
    <title>Evaluation | Lambe Turah</title>
</head>

<body>
    <div id="container">
        <nav>
            <a href="index.php">Home</a> |
            <a href="crawl.php">Crawling</a> |
            <a href="classification.php">Classification</a> |
            <a href="evaluation.php" class="active">Evaluation</a>
        </nav>
        <section id="search">
            <div id="title">
                <h1>Evaluation Result</h1>
            </div>
        </section>
        <section id="result">
            <?php
            require_once __DIR__ . '/vendor/autoload.php';
            include_once('simple_html_dom.php');

            $con = mysqli_connect("localhost", "root", "", "berita");
            $sql = "";

            $title_Arr = array();
            $oriCategory_Arr = array();
            $classificationRes_Arr = array();
            $result_Arr = array();
            $correctCount = 0;
            $wrongCount = 0;
            $status = "";

            echo "<table><thead>";
            echo "<tr><th>Title</th><th>Original Category</th><th>System Classification</th><th>Result</th></tr>";
            echo "</thead><tbody>";

            $sql = "SELECT title, original_category, classification FROM testing";
            $result = $con->query($sql);

            while ($row = $result->fetch_assoc()) {
                $title_Arr[] = $row['title'];
                $oriCategory_Arr[] = $row['original_category'];
                $classificationRes_Arr[] = $row['classification'];
            }

            $totalData = count($oriCategory_Arr);

            for ($i = 0; $i < $totalData; $i++) {
                if ($oriCategory_Arr[$i] == $classificationRes_Arr[$i]) {
                    $status = "Correct";
                    $correctCount++;
                } else {
                    $status = "Wrong";
                    $wrongCount++;
                }
                array_push($result_Arr, $status);
                echo "<tr>";
                echo "<td>" . $title_Arr[$i] . "</td>";
                echo "<td>" . $oriCategory_Arr[$i] . "</td>";
                echo "<td>" . $classificationRes_Arr[$i] . "</td>";
                echo "<td>" . $result_Arr[$i] . "</td>";
                echo "</tr>";
            }

            $correctAccuracy = round(($correctCount / $totalData) * 100, 2);
            $wrongAccuracy = round(($wrongCount / $totalData) * 100, 2);
            echo "</tbody>";
            ?>

            <script type="text/javascript">
                google.charts.load('current', {
                    'packages': ['corechart']
                });
                google.charts.setOnLoadCallback(drawChart);

                function drawChart() {
                    var data = google.visualization.arrayToDataTable([
                        ['Result', 'Count'],
                        <?php
                            echo "['Correct', ".$correctAccuracy."]," ;
                            echo "['Wrong', ".$wrongAccuracy."]" ;
                        ?>
                        
                    ]);
                    var chart = new google.visualization.PieChart(document.getElementById('piechart'));
                    chart.draw(data);
                }
            </script>

            <div id="piechart" style="width: 400px; height: 250px; margin: auto; "></div>
        </section>
    </div>
</body>

</html>