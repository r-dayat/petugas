<?php
    session_start();  
    if(!isset($_SESSION["login"])){
        header("Location: ../index.php");
        exit;
    }    
?>

<!DOCTYPE html>
<html lang="en" style="position: relative;">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../styles/style.css">
    <title>Popay</title>
</head>
<body style="margin-bottom: 80px;">
    <header>
        <div id="jumbotron-popay" class="jumbotron-popay">
        <?php include './../components/navbar-petugas.php';?></div>
    </header>

    <main>
        <div id="formBody" class="form-body">
        <?php include './../components/form-registrasi.php';?></div>
        </div>
    </main>

    <footer>
        <div id="footer-popay">
        <?php include './../components/footer-popay.php';?>
        </div>
    </footer>

    
    <script src="../js/jquery-3.5.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <!-- <script src="../js/beranda.js"></script> -->
</body>
</html>