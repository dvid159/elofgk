$(document).ready(function(){
   
    //Nuevo registro
    $('#addform').on('submit', function(e){
        
        var textmateria = $('select[name="materia"] option:selected').text();
        textmateria = textmateria.slice(0,3);
        textmateria = textmateria.toUpperCase();
        $("#idmat").val(textmateria);

        e.preventDefault();
        $.ajax({
            type:"POST",
            url: "/admin/asignacion-docentes",
            data: $("#addform").serialize(),
            success: function(resonse){

                M.toast({html: 'Grupo guardado exitosamente!', classes: 'rounded', inDuration: 5000});
                location.reload();
            },
            error: function(error){
                var datos = $("#addform").serialize();
                console.log(datos);
                console.log(error);

            }
        });
    });

})
 