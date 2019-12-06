$(document).ready(function(){

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
            $("#editform #idm").val(resultado[0]);
        }
      });

    function cargarCentroEscolar(){
        var cearray = schools;
        var datace = {};

        for(var i=0; i<cearray.length; i++){
            datace[cearray[i].codigo_centro_educativo+"-"+cearray[i].nombre_centro_educativo]=null;
        }
        console.log(cearray);
        return datace;
    }

    $('#autocompleteCE').autocomplete({
        data: cargarCentroEscolar(),
        limit: 5,
        onAutocomplete: function(texto){
            var resultado = texto.split("-");
            $("#editform #idce").val(resultado[0]);
        }
    });

    // ------------------------------------------------
    //Cargar DATOS
    var id = $('#carnet_alumno').val();
    var ce = "";

    $.ajax(
    {
        url:"/alumnos/"+id,
        method:'GET',
        dataType:'json',
        success:function(data)
        {
            console.log(data);

            //Municipios & Centros Escolares
            var municipiosarray = municipios;
            var cearray = schools;

            for(var i=0; i<municipiosarray.length; i++){
                if(municipiosarray[i].id_municipio == data[0].id_municipio){
                    $("#autocompleteMunicipio").val(municipiosarray[i].id_municipio+"-"+municipiosarray[i].municipio);
                }
            }

            for(var i=0; i<cearray.length; i++){
                if(cearray[i].codigo_centro_educativo == data[0].codigo_centro_educativo){
                    $("#autocompleteCE").val(cearray[i].codigo_centro_educativo+"-"+cearray[i].nombre_centro_educativo);
                }
            }

           if(data[0].sexo == 'F'){
               $('#editform #sexo')[0].checked = true;
            }else{
                $('#editform #sexo')[1].checked = true;
            }

            $('#nombres').val(data[0].nombres);
            $('#apellidos').val(data[0].apellidos);
            $('#fecha').val(data[0].fecha_nacimiento);
            $('#direccion').val(data[0].direccion);
            $('#tel').val(data[0].telefono);
            $("#idm").val(data[0].id_municipio);
            $("#idce").val(data[0].codigo_centro_educativo);
            $("#turno").val(data[0].turno_educativo);
            $("#clase").val(data[0].id_class);
            $("#estado").val(data[0].estado);
            M.updateTextFields();
            $('select').formSelect();

            ce = data[0].codigo_centro_educativo;
        }
    });

    //Nuevo Tipo Responsable
    $('#addTipoResponsable').on('submit', function(e){
        e.preventDefault();
        $.ajax({
            type:"POST",
            url: "/tiporesponsable",
            data: $("#addTipoResponsable").serialize(),
            success: function(resonse){
                console.log(resonse);
                M.toast({html: 'Tipo de Responsable guardado exitosamente!', classes: 'rounded', inDuration: 5000});
                location.reload();
            },
            error: function(error){
                console.log(error);
            }
        });
    });

    //Nuevo Responsable
    $('#addResponsable').on('submit', function(e){
        e.preventDefault();
        $.ajax({
            type:"POST",
            url: "/responsables",
            data: $("#addResponsable").serialize(),
            success: function(resonse){
                console.log(resonse);
                M.toast({html: 'Responsable guardado exitosamente!', classes: 'rounded', inDuration: 5000});
                location.reload();
            },
            error: function(error){
                console.log(error);
            }
        });
    });

    //Nueva Ocupacion
    $('#addOcupacion').on('submit', function(e){
        e.preventDefault();
        $.ajax({
            type:"POST",
            url: "/ocupaciones",
            data: $("#addOcupacion").serialize(),
            success: function(resonse){
                console.log(resonse);
                M.toast({html: 'Ocupacion guardada exitosamente!', classes: 'rounded', inDuration: 5000});
                location.reload();
            },
            error: function(error){
                console.log(error);
            }
        });
    });

    //Update
    $('#editform').on('submit', function(e){
        e.preventDefault();

        if(ce != $("#editform #idce"))
        {
            console.log('Diferentes');
            $.ajax({
                type:"POST",
                url: "/bitacoras",
                data: $("#editform").serialize(),
                success: function(resonse){
                    console.log(resonse);
                },
                error: function(error){
                    console.log(error);
                }
            });
        }

        $.ajax({
            type:"PUT",
            url: "/alumnos/"+id,
            data: $("#editform").serialize(),
            success: function(resonse){
                console.log(resonse);
                M.toast({html: 'Alumno actualizado exitosamente!', classes: 'rounded', inDuration: 5000});
                //location.reload();
            },
            error: function(error){
                console.log(error);
                console.log("ERROR");
            }
        });
    });

});
