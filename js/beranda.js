$(document).ready(function(){
    $('.menu').click(function(){
        const menu = $(this).attr('id');
        if(menu == "beranda"){
            $('#formBody').load('../components/form-beranda.php');
        }else if(menu == "registrasi"){
            $('#formBody').load('../components/form-registrasi.php');
        }else if(menu == "cetak"){
            $('#formBody').load('../components/form-cetak.php');
        }else if(menu == "berobat"){
            $('#formBody').load('../components/form-berobat.php');
        }else if(menu == "data"){
            $('#formBody').load('../components/form-datapasien.php');
        }else if(menu == "laporan"){
            $('#formBody').load('../components/form-laporan.php');
        }else if(menu == "profil"){
            $('#formBody').load('../components/form-profil.php');
        }
    });

    $('#formBody').load('../components/form-beranda.php');



});