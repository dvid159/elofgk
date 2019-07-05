$(document).ready(function(){



    
    $('#addform').on('submit', function(e){
        e.preventDefault();
        $.ajax({
            type:"POST",
            url: "/alumnos",
            data: $("#addform").serialize(),
            success: function(resonse){
                console.log(resonse);
                console.log('Departamento guardado exitosamente!');
                M.toast({html: 'Departamento guardado exitosamente!', classes: 'rounded', inDuration: 5000});
               // location.reload();
            },
            error: function(error){
                console.log(error);
                console.log("ERROR");
            }
        });
    });



    

});