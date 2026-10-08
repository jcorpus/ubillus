$(function(){
    $(document).on("submit", "#login", function(e){
        e.preventDefault();

        var form = $('#login')[0];
        var formData = new FormData(form);
        formData.append("login", 1);
        
        $.ajax({
            type: 'POST',
            url: 'model/usuario.php',
            data: formData,
            contentType: false,
            processData: false,
            dataType:'json',
            success: function (data) {
                if(data["respuesta"]=='OK'){
                    alert(data["mensaje"]);
                    var delay = 1000; 
                    setTimeout(function(){ window.location = "admin.php"; }, delay);
                }else {
                    alert(data["mensaje"]);
                }
            },
            error: function (jqxhr, status, exception) {
                console.log('Exception: ', exception);
            }
        });


    });



});

