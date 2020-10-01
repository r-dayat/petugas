$(document).ready(function(){
    $('#keyword').on('keyup', function() {
        $('#formBody').load('../functions/pasien.php?keyword=' + $('#keyword').val());
    })

    $('#keywordlap').on('keyup', function() {
        $('#formBody').load('../functions/vlaporan.php?keyword=' + $('#keywordlap').val());
    })



});