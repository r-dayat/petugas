<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/style.css">
    <title>Popay</title>
</head>
<body>
    <header>
        <div id="jumbotron-popay" class="jumbotron-popay">
        <?php include 'components/jumbotron-popay.php';?>
        </div>
    </header>

    <main>
        <div id="formIndex">
            <?php include 'components/form-login.php';?>
        </div>
    </main>

    <footer>
        <div id="footer-popay">
        <?php include 'components/footer-popay.php';?>
        </div>
    </footer>

    
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>