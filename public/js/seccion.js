$(document).ready(function(){
    //Nuevo registro
    $('#addform').on('submit', function(e){
        e.preventDefault();
        $.ajax({
            type:"POST",
            url: "/admin/secciones",
            data: $("#addform").serialize(),
            success: function(resonse){
                console.log(resonse);
                M.toast({html: 'Seccion guardada exitosamente!', classes: 'rounded', inDuration: 5000});
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
            url:"/admin/secciones/"+id,
            method:'GET',
            dataType:'json',
            success:function(data)
            {
                console.log(data);

                $('#editform #lblSeccion').val(data[0].id_seccion);
                $('#editform #clases').val(data[0].id_class);
                $('#editform #lblIngreso').val(data[0].anho);
                $('#editform #lblDescripcion').val(data[0].descripcion);

                M.updateTextFields();
                $('select').formSelect();
                $('#ModalEdit').modal('open');
            }
        });
    });


    //Actualizar registro
    $('#editform').on('submit', function(e){
        e.preventDefault();

        var id = $('#editform #lblSeccion').val();

        $.ajax({
            type:"PUT",
            url: "/admin/secciones/"+id,
            data: $("#editform").serialize(),
            success: function(resonse){
                console.log(resonse);
                M.toast({html: 'Seccion actualizada exitosamente!', classes: 'rounded', inDuration: 5000});
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

        var confirm= alertify.confirm('Secciones','Confirmar Eliminacion?',null,null).set('labels', {ok:'Confirmar', cancel:'Cancelar'});

		confirm.set('onok', function(){
            $.ajax(
            {
                url: "/admin/secciones/"+id,
                type: 'DELETE',
                data: {
                    "id": id,
                    "_token": token
                },
                success: function (resonse){
                    alertify.success('Seccion eliminada exitosamente!');
                    window.setInterval(location.reload(), 5000)
                },
                    error: function(error){
                    console.log(error);
                }
            });

        });

		confirm.set('oncancel', function(){
			alertify.error('Eliminacion Cancelada!');
		})
    });

});
