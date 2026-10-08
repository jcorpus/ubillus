$(document).ready(function() {
    cargarPersonas();
    $(".agregar-pariente").click(function(){
        // $(".container").append("<select class='js-example-basic-single form-control' name='state'></select>");
        // cargarPersonas();
    });
});

function cargarPersonas(){
    $( ".select2" ).select2({
        ajax: {
            url: "persona.php",
            dataType: 'json',
            type: 'get',
            delay: 250,
            data: function (params) {
                return {
                    select:1,
                    q: params.term // search term
                };
            },
            processResults: function (data) {
                return {
                    results: $.map(data, function(obj) {
                        return { id: obj.id, text: obj.text };
                    })
                };
            },
            cache: true
        },
        minimumInputLength: 2
    });
}