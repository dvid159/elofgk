$(document).ready(function(){

    $(".edit").click(function(){
        $('#ModalEditRecord').modal('open');
        
    });
// ------------------------------------------------------------------------
    $(".resume").click(function(){
        var id = $(this).data("id");
        console.log(id);

        $.ajax(
        {                
            url:"/record_escolar/"+id,
            method:'GET',
            dataType:'json',
            success:function(data)
            {
                console.log(data);
            },
            error: function(error){
                console.log(error);
                console.log("ERROR");
            }
        });

        $('#ModalResumeRecord').modal('open');
    });
    
    // ----------------------------------------------
    $(".exitAdd").click(function(){
        $('#ModalEditRecord').modal('close');    
    });
    // ----------------------------------------------
    $(".exitResume").click(function(){
        $('#ModalResumeRecord').modal('close');    
    });
    //--------------------------------------------------
    $(".PResume").click(function(){        
        $('#ModalEditRecord').modal('open');
        $('#ModalResumeRecord').modal('close');
    });
    



    $('#editform').on('submit', function(e){
        e.preventDefault();
        $.ajax({
            type:"POST",
            url: "/record_escolar",
            data: $("#editform").serialize(),
            success: function(resonse){
                console.log(resonse);
                console.log('Notas guardadas exitosamente!');
                M.toast({html: 'Notas guardadas exitosamente!', classes: 'rounded', inDuration: 5000});
               // location.reload();
            },
            error: function(error){
                console.log(error);
                console.log("ERROR");
            }
        });
    });
//-------------------------------------------------------------------------------------------
    
//-------------------------------------------------------------------------------------
});

 //-----------seccion de keypress------------------//
    
    
function showName(e) {
    //See notes about 'which' and 'key'
    if (e.keyCode == 13) {
        document.getElementById("lblNombre").value="" ;
        document.getElementById("lblNombre").value="nombre de alumno" ;
    }
}

//------------------------------------------------//

