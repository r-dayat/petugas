<?php

$conn = mysqli_connect("localhost:3307", "root", "", "pelayanan_kesehatan");
// $conn = mysqli_connect("popay-apps.online", "popayapp_altafbeta", "Password11!!", "popayapp_pelayanan_kesehatan");

function query($query){
    global $conn;
   $result = mysqli_query($conn, $query);
   $rows = [];
   while($row = mysqli_fetch_assoc($result)){
       $rows[] = $row;
   }
   return $rows;
}

function cari($datas){
    $nik = $datas;
    $query = "SELECT * FROM tb_pasien
                WHERE
                nik = '$nik'
                ";

    return query($query);          
}

function update($datas){
    global $conn;
    $nokk = htmlspecialchars(str_replace(" ","",$datas["nokk"]));
    $nik = htmlspecialchars(str_replace(" ","",$datas["nik"]));
    $nama = htmlspecialchars(ucwords(strtolower($datas["nama"])));
    $gender = $datas["gender"];
    $tempatlahir = htmlspecialchars(ucwords(strtolower($datas["tempatlahir"])));
    $tgllahir = $datas["tgllahir"];
    $alamat = htmlspecialchars(ucwords(strtolower($datas["alamat"])));

    $querycek = "SELECT * FROM tb_pasien WHERE nik = '$nik' AND nokk = '$nokk'";

    $result = mysqli_query($conn, $querycek);
    if(mysqli_fetch_assoc($result)){
        return false;
    }

    $query = "UPDATE tb_pasien SET
                nama = '$nama',
                gender = '$gender',
                tempatlahir = '$tempatlahir',
                tgllahir = '$tgllahir',
                alamat = '$alamat'
            WHERE nokk = '$nokk' AND nik = '$nik'
    ";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function insert($datas){
    global $conn;
    $nokk = htmlspecialchars(str_replace(" ","",$datas["nokk"]));
    $nik = htmlspecialchars(str_replace(" ","",$datas["nik"]));
    $nama = htmlspecialchars(ucwords(strtolower($datas["nama"])));
    $gender = $datas["gender"];
    $tempatlahir = htmlspecialchars(ucwords(strtolower($datas["tempatlahir"])));
    $tgllahir = $datas["tgllahir"];
    $alamat = htmlspecialchars(ucwords(strtolower($datas["alamat"])));
    $faskes = $datas["faskes"];
    $namafaskes = $datas["namafaskes"];

    $querycek = "SELECT nik FROM tb_pasien WHERE nik = '$nik' AND nokk = '$nokk'";

    $result = mysqli_query($conn, $querycek);
    
    if(mysqli_fetch_assoc($result)){
        return false;
    }

    $query = "INSERT INTO tb_pasien VALUES
                ('$nik','$nokk','$nama','$gender','$tempatlahir','$tgllahir','$alamat','','','$faskes','$namafaskes')
                ";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);

}

function loginpetugas($datas){
    global $conn;

    $username = $datas["username"];
    $password = $datas["password"];
    

    $query = "SELECT * FROM tb_petugas WHERE username = '$username' AND isActive = 1
                ";
    
    $result = mysqli_query($conn, $query);
    

    if(mysqli_num_rows($result) === 1){
        $row = mysqli_fetch_assoc($result);
        if(password_verify($password, $row["passwd"])){
            return true;
        }else{
            return false;
        }
    }
}

function insertBerobat($datas){
    global $conn;
    $nik = htmlspecialchars(str_replace(" ","",$datas["nik"]));
    $nama = htmlspecialchars(ucwords(strtolower($datas["nama"])));
    $gender = $datas["gender"];
    $alamat = htmlspecialchars(ucwords(strtolower($datas["alamat"])));
    $tglberobat = $datas["tglberobat"];
    $keluhan = htmlspecialchars(ucwords(strtolower($datas["keluhan"])));
    $faskes = $datas["faskes"];
    $namafaskes = $datas["namafaskes"];



    $query = "INSERT INTO tb_berobat VALUES
                ('','$nik','$nama','$gender','$keluhan','$tglberobat','$faskes','$namafaskes','$alamat')    
             ";

    mysqli_query($conn, $query);
    
    return mysqli_affected_rows($conn);
}

function updateProfil($datas){
    global $conn;
    $nokk = htmlspecialchars(str_replace(" ","",$datas["nokk"]));
    $nik = htmlspecialchars(str_replace(" ","",$datas["nik"]));
    $nama = htmlspecialchars(ucwords(strtolower($datas["nama"])));
    $gender = $datas["gender"];
    $tempatlahir = htmlspecialchars(ucwords(strtolower($datas["tempatlahir"])));
    $tgllahir = $datas["tgllahir"];
    $alamat = htmlspecialchars(ucwords(strtolower($datas["alamat"])));
    

    $querycek = "SELECT * FROM tb_pasien WHERE nik = '$nik'";

    $result = mysqli_query($conn, $querycek);
    
    $row = mysqli_fetch_assoc($result);

    if($result){  
        if($nik != $row["nik"]){
            return false;
        } 
    }
    
    $query = "UPDATE tb_pasien SET
                nama = '$nama',
                gender = '$gender',
                tempatlahir = '$tempatlahir',
                tgllahir = '$tgllahir',
                alamat = '$alamat'
            WHERE nokk = '$nokk' AND nik = '$nik'
    ";
    
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}



?>