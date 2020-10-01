<?php
    
    require 'functions.php';
    $faskes = query("SELECT * FROM ms_faskes");
    $namafaskes = query("SELECT * FROM ms_namafaskes");
    $genders = query("SELECT * FROM ms_gender");

        

                if(isset($_POST["bregistrasi"])){
                    if(insert($_POST) > 0){
                        echo'<div class="alert alert-success alert-dismissible fade show" style="margin-top: 40px">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>Sukses!</strong> Data Pasien berhasil diregistrasi.
                            </div>';
                    }else{
                        echo'<div class="alert alert-danger alert-dismissible fade show" style="margin-top: 40px">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>Gagal!</strong> Data Pasien gagal diregistrasi, mohon cek NIK pasien.
                            </div>';
                    }
                }
                    

?>



<section class="registrasi-pasien">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6 offset-sm-3 text-center">
                        <p>Silahkan Registrasi Data Pasien baru dibawah sini</p>
                        <div class="alert alert-info alert-dismissible fade show">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>Info!</strong> Registrasi ini hanya untuk pasien baru.
                        </div>
                    </div>
                </div>
                <div class="row">
                    <dvi class="col-sm-4 offset-sm-4">
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="nokk">Nomor KK</label>
                                <input type="text" name="nokk" id="nokk" class="form-control" multiple onkeypress="if (event.keyCode == 13 || event.which == 13) event.preventDefault();" placeholder="Masukkan Nomor KK Pasien">
                            </div>
                            <div class="form-group">
                                <label for="nik">NIK</label>                         
                                <input type="text" name="nik" id="nik" class="form-control" onkeypress="if (event.keyCode == 13 || event.which == 13) event.preventDefault();" placeholder="Masukkan NIK Pasien">
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama Lengkap</label>
                                <input type="text" name="nama" id="nama" class="form-control" onkeypress="if (event.keyCode == 13 || event.which == 13) event.preventDefault();" placeholder="Masukkan nama lengkap Pasien">
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
                                <label for="tempatlahir">Tempat Lahir</label>
                                <input type="text" name="tempatlahir" id="tempatlahir" class="form-control" onkeypress="if (event.keyCode == 13 || event.which == 13) event.preventDefault();" placeholder="Masukkan tempat lahir Pasien">
                            </div>
                            <div class="form-group">
                                <label for="tgllahir">Tanggal Lahir</label>
                                <input type="date" name="tgllahir" id="tgllahir" class="form-control" onkeypress="if (event.keyCode == 13 || event.which == 13) event.preventDefault();" placeholder="Masukkan tanggal lahir Pasien">
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input type="text" name="alamat" id="alamat" class="form-control" onkeypress="if (event.keyCode == 13 || event.which == 13) event.preventDefault();" placeholder="Masukkan alamat Pasien">
                            </div>
                            <div class="form-group">
                                <label for="faskes">Faskes</label>
                                <select name="faskes" id="faskes" class="form-control">
                                    <option value="">-- Fasilitas Kesehatan --</option>
                                    <?php foreach($faskes as $jfaskes) :?> 
                                        <option value="<?php echo $jfaskes["id_faskes"]; ?>"><?php echo $jfaskes["jenis_faskes"]; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="namafaskes">Nama Faskes</label>
                                <select name="namafaskes" id="namafaskes" class="form-control">
                                    <option value="">-- Nama Fasilitas Kesehatan --</option>
                                    <?php foreach($namafaskes as $nfaskes) :?>
                                    <option value="<?php echo $nfaskes["id_namafaskes"]; ?>"><?php echo $nfaskes["nama_faskes"]; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <button type="submit" id="bregistrasi" name="bregistrasi" class="btn btn-primary">Daftar</button>               
                        </form>
                    </dvi>
                </div>
            </div>
        </section>