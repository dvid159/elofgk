$(document).ready(function(){
   
    //Nuevo registro
    $('#addform').on('submit', function(e){
        e.preventDefault();
        $.ajax({
            type:"POST",
            url: "/asignacion-docentes",
            data: $("#addform").serialize(),
            success: function(resonse){
                console.log(resonse);
                M.toast({html: 'Grupo guardado exitosamente!', classes: 'rounded', inDuration: 5000});
                location.reload();
            },
            error: function(error){
                var datos = $("#addform").serialize();
                console.log(datos);
                console.log(error);
                console.log("ERROR");
            }
        });

    });

})
