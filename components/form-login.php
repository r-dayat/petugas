<?php
    session_start();
    require 'views/functions.php';

    
    if(isset($_SESSION["login"])){
        header("Location: views/beranda.php");
        exit;
    }

    if(isset($_POST["login"])){
        
        if(loginpetugas($_POST) > 0){
            $_SESSION["login"] = true;
            $_SESSION["username"] = $_POST["username"];
            header("Location: views/beranda.php");
            exit;
        }else{
            $error = true;
        }

    }

?>

            <section class="form-login">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6 offset-sm-3 text-center">
                            <p>Selamat Datang di Pelayanan Kesehatan Kota Solok</p>
                            <?php if(isset($error)) : ?>
                                <p style="color: red; font-style: italic">Username / Password Anda salah!</p>
                            <?php endif; ?> 
                        </div>
                    </div>
                    <div class="row">
                        <dvi class="col-sm-4 offset-sm-4">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" name="username" id="username" class="form-control" placeholder="Masukkan Username Anda">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan Password Anda">
                                </div>
                                <button type="submit" name="login" id="login" class="btn btn-primary">Login</button>
                            </form>
                        </dvi>
                    </div>
                </div>
            </section>
