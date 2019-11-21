$(document).ready(function(){    
    //Nuevo registro
    $('#addform').on('submit', function(e){
        e.preventDefault();

        $.ajax({
            type:"POST",
            url: "/admin/empleados",
            data: $("#addform").serialize(),
            success: function(resonse){
                console.log(resonse);
                M.toast({html: 'Empleado guardado exitosamente!', classes: 'rounded', inDuration: 5000});
                location.reload();
            },
            error: function(error){
                M.toast({html: 'Varifique que todos los campos esten llenos correctamente!', classes: 'rounded', inDuration: 5000});
                var datos = $("#addform").serialize();
                console.log(datos);
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
            url:"/admin/empleados/"+id,
            method:'GET',
            dataType:'json',
            success:function(data)
            {
                console.log(data);

                $('#editform #lblNombre').val(data[0].nombres);
                $('#editform #lblApellido').val(data[0].apellidos);

                if(data[0].sexo == 'F')
                {
                    $('#editform #sexo')[0].checked = true;
                }else
                {
                    $('#editform #sexo')[1].checked = true;
                }

                $('#editform #fecha').val(data[0].fecha_nacimiento);
                $('#editform #lblDUI').val(data[0].dui);
                $('#editform #lblNIT').val(data[0].nit);
                $('#editform #lblCarnet').val(data[0].carnet_empleado);
                $('#editform #cargo').val(data[0].id_cargo);
                $('#editform #lblTelefono').val(data[0].telefono);
                $('#editform #municipio').val(data[0].id_municipio);
                $('#editform #lblDireccion').val(data[0].direccion);
                $('#editform #lblObservaciones').val(data[0].observaciones);

                M.updateTextFields();
                $('select').formSelect();
                $('#ModalEdit').modal('open');

            }
        });
    });


    //Actualizar registro
    $('#editform').on('submit', function(e){
        e.preventDefault();

        console.log($('#editform #lblCarnet').val());
        var id = $('#editform #lblCarnet').val();

        $.ajax({
            type:"PUT",
            url: "/admin/empleados/"+id,
            data: $("#editform").serialize(),
            success: function(resonse){
                M.toast({html: 'Empleado actualizado exitosamente!', classes: 'rounded', inDuration: 5000});
                $('#ModalEdit').modal('close');
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

        var confirm= alertify.confirm('Municipios','Confirmar Eliminacion?',null,null).set('labels', {ok:'Confirmar', cancel:'Cancelar'});

		confirm.set('onok', function(){
            $.ajax(
            {
                url: "/admin/empleados/"+id,
                type: 'DELETE',
                data: {
                    "id": id,
                    "_token": token
                },
                success: function (resonse){
                    console.log("Empleado eliminado exitosamente!");
                    alertify.success('Empleado eliminado exitosamente!');
                    window.setInterval(location.reload(), 5000)
                },
                    error: function(error){
                    console.log(error);
                }
            });

        });

		confirm.set('oncancel', function(){
			alertify.success('Eliminacion Cancelada!');
		})
    });

});
