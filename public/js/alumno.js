$(document).ready(function(){

    function cargarmunicipios(){
        var municipiosarray = municipios;
        var datamuni = {};

        for(var i=0; i<municipiosarray.length; i++){
            datamuni[municipiosarray[i].id_municipio+"-"+municipiosarray[i].municipio]=null;
        }
        console.log(datamuni);
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
        console.log(datace);
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
