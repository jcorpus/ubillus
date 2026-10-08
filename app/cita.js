$( document ).ready(function() {
    $("#disponibilidadfilas").on("click",".btn-seleccionar",function(){
        var c_iddetalleprogramacion = $(".iddetalleprogramacion",$(this).parent().parent()).val();
        // console.log(c_idprod);
        var idpaciente = $("#idpaciente").val();
        var asunto = $("#asunto").val();
        var idservicio = $("#idservicio").val();

        $.ajax({
            method:'post',
            url:'model/cita.php',
            data:{
                c_iddetalleprogramacion:c_iddetalleprogramacion,
                idpaciente:idpaciente,
                asunto:asunto,
                idservicio:idservicio,
                submit: 1,
            },
            dataType:'text',
            success:function (data) {
                console.log(data);
                if(data=="OK"){
                    location.reload();
                }
            }
        });
    });



    $('#buscardisponibilidad').click(function () {
        var idespecialidad = $("#idespecialidad").val();
        var idservicio = $("#idservicio").val();
        var iddoctor = $("#iddoctor").val();
        var fechacita = $("#fechacita").val();
        // var assetList = $('#disponibilidadfilas');  
        $.ajax({
            method:'post',
            url:'model/cita.php',
            data:{
                iddoctor:iddoctor,
                // idespecialidad:idespecialidad,
                fechacita:fechacita,
                mostrardisponibilidad: 1,
            },
            dataType:'json',
            success:function (data) {
                $(".filasdisponibilidad").remove();
                $.each(data, function(i)
                {
                    $('#disponibilidadfilas > tbody:last-child').append(
                        '<tr class="filasdisponibilidad">'// need to change closing tag to an opening `<tr>` tag.
                        +'<td>F-'+data[i]["DetProgMedId"]+'<input type="hidden" class="iddetalleprogramacion" value="'+data[i]["DetProgMedId"]+'"></td>'
                        +'<td>'+data[i]["DetProgMedFecha"]+'</td>'
                        +'<td>'+data[i]["DetProgMedHora"]+'</td>'
                        +'<td><button type="button" class="btn btn-primary btn-sm btn-seleccionar">Seleccionar</button></td>'
                        +'</tr>');
                });
            }
        });
    });

    $("#idespecialidad").change(function(){
        var idespecialidad = $(this).val();
        var indexSelect = $(this).prop('selectedIndex');
        // $(".select2-servicio").val(null).trigger("change");
        $(".select2-servicio").empty().trigger('change')
        $(".select2-medico").empty().trigger('change')
        if(indexSelect>0){
            cargarServicio(idespecialidad);
            cargarMedico(idespecialidad);
        } else {
            idespecialidad = 0;
            cargarServicio(idespecialidad);
            cargarMedico(idespecialidad);
        }
    });

    $(".select2-servicio").select2({
        placeholder: "Seleccionar un Servicio",
    });
    $(".select2-medico").select2({
        placeholder: "Seleccionar un Medico",
    });


    function cargarServicio(id){
        $( ".select2-servicio" ).select2({
            placeholder: "Seleccionar un Servicio",
            ajax: {
                url: "model/cita.php",
                dataType: 'json',
                type: 'post',
                delay: 250,
                data: function (params) {
                    return {
                        select_servicio:1,
                        q: params.term, // search term
                        espId: id
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
            minimumInputLength: 0
        });
    }
    function cargarMedico(id){
        $( ".select2-medico" ).select2({
            placeholder: "Seleccionar un Medico",
            ajax: {
                url: "model/cita.php",
                dataType: 'json',
                type: 'post',
                delay: 250,
                data: function (params) {
                    return {
                        select_medico:1,
                        q: params.term, // search term
                        espId: id
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
            minimumInputLength: 0
        });
    }
});

