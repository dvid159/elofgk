$(document).ready(function(){
    //Nuevo registro
    $('#addform').on('submit', function(e){
        e.preventDefault();
        $.ajax({
            type:"POST",
            url: "/admin/aptitudes",
            data: $("#addform").serialize(),
            success: function(resonse){
                console.log(resonse);
                M.toast({html: 'Aptitud guardada exitosamente!', classes: 'rounded', inDuration: 5000});
                location.reload();
            },
            error: function(error){
                M.toast({html: 'Verifique que los campos esten llenos', classes: 'rounded', inDuration: 5000});
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
            url:"/admin/aptitudes/"+id,
            method:'GET',
            dataType:'json',
            success:function(data)
            {
                console.log(data);

                $('#editform #lblId').val(data[0].id_aptitud);
                $('#editform #lblAptitud').val(data[0].nombre_aptitud);
                $('#editform #criterio').val(data[0].id_criterio);

                M.updateTextFields();
                $('select').formSelect();
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
            url: "/admin/aptitudes/"+id,
            data: $("#editform").serialize(),
            success: function(resonse){
                console.log(resonse);
                M.toast({html: 'Aptitud actualizada exitosamente!', classes: 'rounded', inDuration: 5000});
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

        var confirm= alertify.confirm('Aptitud','Confirmar Eliminacion?',null,null).set('labels', {ok:'Confirmar', cancel:'Cancelar'});

		confirm.set('onok', function(){
            $.ajax(
            {
                url: "/admin/aptitudes/"+id,
                type: 'DELETE',
                data: {
                    "id": id,
                    "_token": token
                },
                success: function (resonse){
                    alertify.success('Aptitud eliminada exitosamente!');
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
