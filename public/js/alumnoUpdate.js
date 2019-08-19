$(document).ready(function(){

    //Cargar DATOS
    $id = $('#lblId').val();
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
    });

});
