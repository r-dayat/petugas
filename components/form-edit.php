<?php
    require 'functions.php';
    $faskes = query("SELECT * FROM ms_faskes");
    $namafaskes = query("SELECT * FROM ms_namafaskes");
    $genders = query("SELECT * FROM ms_gender");


        if($pasien = cari($_GET["nik"])){
                $pasien = $pasien[0];
                $nik = $pasien["nik"];
                $nokk = $pasien["nokk"];
                $nama = $pasien["nama"];
                $tempatlahir = $pasien["tempatlahir"];
                $tgllahir = $pasien["tgllahir"];
                $alamat = $pasien["alamat"];
        }

        
        

        if(isset($_POST["btnupdate"])){
                if(updateProfil($_POST) > 0){
                    echo'<div class="alert alert-success alert-dismissible fade show" style="margin-top: 40px">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>Sukses!</strong> Data Pasien berhasil diupdate.
                            </div>';
                }else{
                    echo'<div class="alert alert-danger alert-dismissible fade show" style="margin-top: 40px">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>Gagal!</strong> Data Pasien gagal diupdate.
                            </div>';
                }
        }
            
    //}else{
        
    //}

?>



<section class="register-pasien">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6 offset-sm-3 text-center">
                            <p>Silahkan Update Data Pasien dibawah sini</p>
                    </div>
                </div>
                <div class="row">
                    <dvi class="col-sm-4 offset-sm-4">
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="nokk">Nomor KK</label>
                                <input type="text" name="nokk" id="nokk" class="form-control" multiple onkeypress="if (event.keyCode == 13 || event.which == 13) event.preventDefault();" value="<?php echo($nokk) ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="nik">NIK</label>                         
                                <input type="text" name="nik" id="nik" value="<?php echo($nik) ?>" class="form-control" onkeypress="if (event.keyCode == 13 || event.which == 13) event.preventDefault();" readonly>
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama Lengkap</label>
                                <input type="text" name="nama" id="nama" value="<?php echo($nama) ?>" class="form-control" onkeypress="if (event.keyCode == 13 || event.which == 13) event.preventDefault();">
                            </div>
                            <div class="form-group">
                                <label for="gender">Jenis Kelamin</label>
                                <select name="gender" id="gender" class="form-control">
                                    <option value="">-- Jenis Kelamin --</option>
                                    <?php foreach($genders as $gender) :?>
                                        <?php if($pasien["gender"] == $gender["id_gender"]): ?>
                                            <?php $select = "selected"; ?>
                                        <?php else: ?>
                                            <?php $select = ""; ?>
                                        <?php endif; ?>   
                                    <option <?php echo $select ?> value="<?php echo $gender["id_gender"]; ?>"><?php echo $gender["nama_gender"]; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tempatlahir">Tempat Lahir</label>
                                <input type="text" name="tempatlahir" id="tempatlahir" value="<?php echo($tempatlahir) ?>" class="form-control" onkeypress="if (event.keyCode == 13 || event.which == 13) event.preventDefault();" placeholder="Masukkan tempat lahir Anda">
                            </div>
                            <div class="form-group">
                                <label for="tgllahir">Tanggal Lahir</label>
                                <input type="date" name="tgllahir" id="tgllahir" class="form-control" onkeypress="if (event.keyCode == 13 || event.which == 13) event.preventDefault();" value="<?php echo($tgllahir) ?>" placeholder="Masukkan tanggal lahir Anda">
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input type="text" name="alamat" id="alamat" value="<?php echo($alamat) ?>" class="form-control" onkeypress="if (event.keyCode == 13 || event.which == 13) event.preventDefault();" placeholder="Masukkan alamat Anda">
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
                            <button type="submit" id="btnupdate" name="btnupdate" class="btn btn-primary">Update</button>               
                        </form>
                    </dvi>
                </div>
            </div>
        </section>