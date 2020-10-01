<?php
    // session_start();
    require "../views/functions.php";
    $faskes = query("SELECT * FROM ms_faskes");
    $namafaskes = query("SELECT * FROM ms_namafaskes");
    $genders = query("SELECT * FROM ms_gender");

    // if(isset($_SESSION["login"])){
        // $email = $_SESSION["email"];
        // $pasien = query("SELECT * FROM tb_pasien WHERE email = '$email'")[0];

        if(isset($_POST["bberobat"])){
            if(insertBerobat($_POST) > 0){
                echo'<div class="alert alert-success alert-dismissible fade show" style="margin-top: 40px">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>Sukses!</strong> Daftar berobat Pasien berhasil.
                            </div>';
            }else{
                echo'<div class="alert alert-danger alert-dismissible fade show" style="margin-top: 40px">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Gagal!</strong> Daftar berobat Pasien gagal.
                </div>';
            }
    
    
        }


?>


<section class="form-berobat">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6 offset-sm-3 text-center">
                        <p>Silahkan lengkapi data Pasien dibawah sini</p>
                    </div>
                </div>
                <div class="row">
                    <dvi class="col-sm-4 offset-sm-4">
                        <form action="" method="post">
                        <div class="form-group">
                            <label for="nik">NIK Pasien</label>
                            <input type="text" name="nik" id="nik" class="form-control" onkeypress="if (event.keyCode == 13 || event.which == 13) event.preventDefault();" placeholder="Masukkan NIK Pasien">
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama Pasien</label>
                            <input type="text" name="nama" id="nama" class="form-control" onkeypress="if (event.keyCode == 13 || event.which == 13) event.preventDefault();" placeholder="Masukkan Nama Pasien">
                        </div>
                        <div class="form-group">
                                <label for="gender">Jenis Kelamin</label>
                                <select name="gender" id="gender" class="form-control">
                                    <option value="">-- Jenis Kelamin --</option>
                                    <?php foreach($genders as $gender) :?>   
                                        <option value="<?php echo $gender["id_gender"]; ?>"><?php echo $gender["nama_gender"]; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        <div class="form-group">
                            <label for="nama">Alamat Pasien</label>
                            <input type="text" name="alamat" id="alamat" class="form-control" onkeypress="if (event.keyCode == 13 || event.which == 13) event.preventDefault();" placeholder="Masukkan Alamat Pasien">
                        </div>
                        <div class="form-group">
                                <label for="faskes">Faskes</label>
                                <select name="faskes" id="faskes" class="form-control">
                                    <option value="">-- Fasilitas Kesehatan --</option>
                                    <?php foreach($faskes as $jfaskes) :?>
                                        <?php if($pasien["faskes"] == $jfaskes["id_faskes"]): ?>
                                            <?php $select = "selected"; ?>
                                        <?php else: ?>
                                            <?php $select = ""; ?>
                                        <?php endif; ?>    
                                    <option <?php echo $select ?> value="<?php echo $jfaskes["id_faskes"]; ?>"><?php echo $jfaskes["jenis_faskes"]; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="namafaskes">Nama Faskes</label>
                                <select name="namafaskes" id="namafaskes" class="form-control">
                                    <option value="">-- Nama Fasilitas Kesehatan --</option>
                                    <?php foreach($namafaskes as $nfaskes) :?>
                                        <?php if($pasien["nama_faskes"]==$nfaskes["id_namafaskes"]): ?>
                                            <?php $select = "selected"; ?>
                                        <?php else: ?>
                                            <?php $select = ""; ?>
                                        <?php endif; ?>
                                    <option <?php echo $select ?> value="<?php echo $nfaskes["id_namafaskes"]; ?>"><?php echo $nfaskes["nama_faskes"]; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tgbberobat">Tanggal Berobat</label>
                                <input type="date" name="tglberobat" id="tglberobat" onkeypress="if (event.keyCode == 13 || event.which == 13) event.preventDefault();" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="keluhan">Keluhan</label>
                                <textarea class="form-control" name="keluhan" id="keluhan" rows="2"></textarea>
                            </div>
                            <button type="submit" name="bberobat" id="bberobat" class="btn btn-success" style="margin-bottom: 70px;">Daftar</button>
                        </form>
                    </dvi>
                </div>
            </div>
        </section>