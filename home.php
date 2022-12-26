<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="styles/home.css">
        <title>Home - IIR Project</title>
    </head>
    <body>
        <header>
            <div class="header-title">
                <h1>IIR Project - Group 3</h1>
            </div>
        </header>
        <nav class="navbar">
            <a class="nav-item" href="">Home</a>
            <a class="nav-item" href="crawling.php">Crawling</a>
            <a class="nav-item" href="classification.php">Classification</a>
            <a class="nav-item" href="evaluation.php">Evaluation</a>
        </nav>
        <section>
            <form action="" method="get">
                <h2>Welcome to Googel</h2><br>
                <div class="search">
                    <span>Keyword:</span>
                    <div class="search-textbox">
                        <i class="fa-solid fa-magnifying-glass"></i>
                        <input type="search" name="search" class="search-text" placeholder="Search" required>
                    </div>
                    <input type="submit" name="submit" class="search-submit" value="Find">
                </div>
            </form>
        </section>
    </body>
</html>