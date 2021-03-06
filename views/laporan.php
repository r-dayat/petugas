<?php
    session_start();
    if(!isset($_SESSION["login"])){
        header("Location: ../index.php");
        exit;
    }  
    require "functions.php";
    $namafaskes = query("SELECT * FROM ms_namafaskes");

    $query = "SELECT d.tglberobat, a.nik, a.nama, b.nama_gender, a.alamat, c.nama_faskes, d.keluhan
                FROM tb_pasien a
                JOIN ms_gender b ON a.gender = b.id_gender
                JOIN ms_namafaskes c ON a.nama_faskes = c.id_namafaskes
                JOIN tb_berobat d ON a.nik = d.nik
                ORDER BY d.tglberobat DESC
                ";

    $pasien = query($query);   


    if(isset($_POST["cari"])){
        $tglberobat = $_POST["tglberobat"];
        $query1 = "SELECT d.tglberobat, a.nik, a.nama, b.nama_gender, a.alamat, c.nama_faskes, d.keluhan
                FROM tb_pasien a
                JOIN ms_gender b ON a.gender = b.id_gender
                JOIN ms_namafaskes c ON a.nama_faskes = c.id_namafaskes
                JOIN tb_berobat d ON a.nik = d.nik
                WHERE d.tglberobat = '$tglberobat'
                ORDER BY d.tglberobat DESC";
        $pasien = query($query1);
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
<body style="margin-bottom: 40px;">
    <header>
        <div id="jumbotron-popay" class="jumbotron-popay">
        <?php include './../components/navbar-petugas.php';?></div>
    </header>

    <main>
    <section class="laporan">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-8 offset-sm-1">
                        <p>Daftar Pasien yang telah daftar untuk berobat</p>
                    </div>
                </div>
                <div class="row">
                    <dvi class="col-sm-4 offset-sm-1">
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="keyword">NIK / Nama Pasien</label>
                                <input type="text" name="keywordlap" id="keywordlap" class="form-control-sm" autofocus autocomplete="off" placeholder="Masukkan NIK / Nama Pasien">
                            </div>
                            <div class="form-group">
                                <label for="namaPasien">Tanggal</label>
                                <input type="date" name="tglberobat" id="tglberobat" class="form-control-sm">
                            </div>
                            <button type="submit" name="cari" id="cari" class="btn btn-primary">Cari</button>
                        </form>
                    </dvi>
                </div>

                
            
        <div id="formBody" class="form-body">
            <div class="row">
                    <div class="col-sm-10 offset-sm-1">
                        <div class="table-responsive-sm">
                            <table class="table table-bordered table-hover">
                                <thead class="thead-dark text-center">
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal Berobat</th>
                                        <th>NIK Pasien</th>
                                        <th>Nama Pasien</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Alamat</th>
                                        <th>Nama Faskes</th>
                                        <th>Keluhan</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                <?php $i=1; ?>
                                    <?php foreach($pasien as $row) : ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $row["tglberobat"] ?></td>
                                        <td><?php echo $row["nik"] ?></td>
                                        <td><?php echo $row["nama"] ?></td>
                                        <td><?php echo $row["nama_gender"] ?></td>
                                        <td><?php echo $row["alamat"] ?></td>
                                        <td><?php echo $row["nama_faskes"] ?></td>
                                        <td><?php echo $row["keluhan"] ?></td>
                                    </tr>
                                    <?php $i++;?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <div class="container-fluid">
                
            </div>
        </section>
    </main>

    <footer>
        <div id="footer-popay">
        <?php include './../components/footer-popay.php';?>
        </div>
    </footer>

    
    <script src="../js/jquery-3.5.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/livesearch.js"></script>
</body>
</html>