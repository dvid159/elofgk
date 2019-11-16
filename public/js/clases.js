$(document).ready(function(){
    //Nuevo registro
    $('#addform').on('submit', function(e){
        e.preventDefault();
        $.ajax({
            type:"POST",
            url: "/admin/clases",
            data: $("#addform").serialize(),
            success: function(resonse){
                console.log(resonse);
                console.log('Class guardada exitosamente!');
                M.toast({html: 'Class guardada exitosamente!', classes: 'rounded', inDuration: 5000});
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
            url:"/admin/clases/"+id,
            method:'GET',
            dataType:'json',
            success:function(data)
            {
                console.log(data);
                $('#editform #lblClass').val(data[0].id_class);
                $('#editform #lblIngreso').val(data[0].anho_ingreso);
                $('#editform #lblEgreso').val(data[0].anho_egreso);
                $('#editform #lblDescripcion').val(data[0].descripcion);

                M.updateTextFields();
                $('#ModalEdit').modal('open');
            }
        });
    });


    //Actualizar registro
    $('#editform').on('submit', function(e){
        e.preventDefault();

        console.log($('#editform #lblClass').val());
        var id = $('#editform #lblClass').val();

        $.ajax({
            type:"PUT",
            url: "/admin/clases/"+id,
            data: $("#editform").serialize(),
            success: function(resonse){
                console.log(resonse);
                console.log('Municipio actualizado exitosamente!');
                M.toast({html: 'Municipio actualizado exitosamente!', classes: 'rounded', inDuration: 5000});
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

        var confirm= alertify.confirm('Class','Confirmar Eliminacion?',null,null).set('labels', {ok:'Confirmar', cancel:'Cancelar'});

		confirm.set('onok', function(){
            $.ajax(
            {
                url: "/admin/clases/"+id,
                type: 'DELETE',
                data: {
                    "id": id,
                    "_token": token
                },
                success: function (resonse){
                    console.log("Class eliminada exitosamente!");
                    alertify.success('Class eliminada exitosamente!');
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
