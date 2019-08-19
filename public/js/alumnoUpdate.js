$(document).ready(function(){

    //Cargar DATOS
    $id = $('#lblId').val();
    console.log($id);

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

});
