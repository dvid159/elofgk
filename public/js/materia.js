$(document).ready(function(){
    //Nuevo registro
    $('#addform').on('submit', function(e){
        e.preventDefault();
        $.ajax({
            type:"POST",
            url: "/admin/materias",
            data: $("#addform").serialize(),
            success: function(resonse){
                console.log(resonse);
                M.toast({html: 'Materia guardada exitosamente!', classes: 'rounded', inDuration: 5000});
                location.reload();
            },
            error: function(error){
                console.log(error);
                console.log("ERROR");
            }
        });
    });

    //Obtener registro y llenar modal
    $(".edit").click(function(){
        var id = $(this).data("id");
        console.log(id);
        $.ajax(
        {
            url:"/admin/materias/"+id,
            method:'GET',
            dataType:'json',
            success:function(data)
            {
                console.log(data);
                $('#lblId').val(data[0].id_materia);
                $('#editform #lblMateria').val(data[0].nombre_materia);

                M.updateTextFields();
                $('#ModalEdit').modal('open');
            }
        });
    });


    //Actualizar registro
    $('#editform').on('submit', function(e){
        e.preventDefault();

        console.log($('#lblId').val());
        var id = $('#lblId').val();

        $.ajax({
            type:"PUT",
            url: "/admin/materias/"+id,
            data: $("#editform").serialize(),
            success: function(resonse){
                console.log(resonse);
                M.toast({html: 'Materia actualizada exitosamente!', classes: 'rounded', inDuration: 5000});
                location.reload();
            },
            error: function(error){
                console.log(error);
                console.log("ERROR");
            }
        });
    });

    //Eliminar registro
    $(".delete").click(function(){
        var id = $(this).data("id");
        var token = $("meta[name='csrf-token']").attr("content");

        var confirm= alertify.confirm('Departamentos','Confirmar Eliminacion?',null,null).set('labels', {ok:'Confirmar', cancel:'Cancelar'});

		confirm.set('onok', function(){
            $.ajax(
            {
                url: "/admin/materias/"+id,
                type: 'DELETE',
                data: {
                    "id": id,
                    "_token": token
                },
                success: function (resonse){
                    alertify.success('Materia eliminada exitosamente!');
                    window.setInterval(location.reload(), 5000);
                    location.reload();
                },
                    error: function(error){
                    console.log("ERROR");
                }
            });

        });

        confirm.set('oncancel', function(){
			alertify.error('Eliminacion Cancelada!');
		})
    });

});



