$(document).ready(function() {
    $('#select').change(function(){
        var lang = $('#select').val();
            $.post("../../guest/isAuth/script.php", {
                lang,
            },function(data){
                location.replace("");
            });
    });
});