$(document).ready(function(){
    //Nuevo registro
    $('#addform').on('submit', function(e){
        e.preventDefault();
        $.ajax({
            type:"POST",
            url: "/school",
            data: $("#addform").serialize(),
            success: function(resonse){
                console.log(resonse);
                console.log('Centro Educativo guardado exitosamente!');
                M.toast({html: 'Centro Educativo guardado exitosamente!', classes: 'rounded', inDuration: 5000});
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
            url:"/school/"+id,
            method:'GET',
            dataType:'json',
            success:function(data)
            {
                console.log(data);
                console.log(data[0].codigo_centro_educativo);

                $('#editform #lblCodigo').val(data[0].codigo_centro_educativo);
                $('#editform #id_municipio').val(data[0].id_municipio);
                $('#editform #lblTelefono').val(data[0].telefono);
                $('#editform #sector').val(data[0].sector);
                $('#editform #categoria').val(data[0].categoria);
                $('#editform #zona').val(data[0].zona);
                $('#editform #lblNombre').val(data[0].nombre_centro_educativo);
                $('#editform #lblDireccion').val(data[0].direccion);
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

        console.log($('#editform #lblCodigo').val());
        var id = $('#editform #lblCodigo').val();

        $.ajax({
            type:"PUT",
            url: "/school/"+id,
            data: $("#editform").serialize(),
            success: function(resonse){
                console.log($("#editform").serialize());
                console.log('Municipio actualizado exitosamente!');
                M.toast({html: 'Municipio actualizado exitosamente!', classes: 'rounded', inDuration: 5000});
                $('#ModalEdit').modal('close');
                //location.reload();
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

        var confirm= alertify.confirm('Municipios','Confirmar Eliminacion?',null,null).set('labels', {ok:'Confirmar', cancel:'Cancelar'});

		confirm.set('onok', function(){
            $.ajax(
            {
                url: "school/"+id,
                type: 'DELETE',
                data: {
                    "id": id,
                    "_token": token
                },
                success: function (resonse){
                    console.log("Municipio eliminado exitosamente!");
                    alertify.success('Municipio eliminado exitosamente!');
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
