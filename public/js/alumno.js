$(document).ready(function(){


    //Cargar DATOS
<<<<<<< HEAD
  /*  $id = $('#lblId').val();
    console.log($id);

    $.ajax(
    {
        url:"/alumnos/"+id,
        method:'GET',
        dataType:'json',
        success:function(data)
        {
            console.log(data);
        }
    }); */
=======
    // $id = $('#lblId').val();
    // console.log($id);

    // $.ajax(
    // {
    //     url:"/alumnos/"+id,
    //     method:'GET',
    //     dataType:'json',
    //     success:function(data)
    //     {
    //         console.log(data);
    //     }
    // });
>>>>>>> 0eec00b3e11533b8ec5cbc391b728b0843c9250f

    //----------------------
    function cargarmunicipios(){
        var municipiosarray = municipios;
        var datamuni = {};

        for(var i=0; i<municipiosarray.length; i++){
            datamuni[municipiosarray[i].id_municipio+"-"+municipiosarray[i].municipio]=null;
        }
        return datamuni;
    }

    $('#autocompleteMunicipio').autocomplete({
        data: cargarmunicipios(),
        limit: 5,
        onAutocomplete: function(texto){
            var resultado = texto.split("-");
            $("#addform #idm").val(resultado[0]);
        }
      });

    function cargarCentroEscolar(){
        var cearray = schools;
        var datace = {};

        for(var i=0; i<cearray.length; i++){
            datace[cearray[i].codigo_centro_educativo+"-"+cearray[i].nombre_centro_educativo]=null;
        }
        
        return datace;
    }

    $('#autocompleteCE').autocomplete({
        data: cargarCentroEscolar(),
        limit: 5,
        onAutocomplete: function(texto){
            var resultado = texto.split("-");
            $("#addform #idce").val(resultado[0]);
        }
    });

    $('#addform').on('submit', function(e){
        e.preventDefault();
        $.ajax({
            type:"POST",
            url: "/alumnos",
            data: $("#addform").serialize(),
            success: function(resonse){
                M.toast({html: 'Alumno guardado exitosamente!', classes: 'rounded', inDuration: 5000});
               // location.reload();
            },
            error: function(error){
                console.log(error);
                console.log("ERROR");
            }
        });
    });
});