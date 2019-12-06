$(document).ready(function(){
    //Nuevo registro
    $('#addform').on('submit', function(e){
        e.preventDefault();
        $.ajax({
            type:"POST",
            url: "/municipios",
            data: $("#addform").serialize(),
            success: function(resonse){
                console.log(resonse);
                console.log('Municipio guardado exitosamente!');
                M.toast({html: 'Municipio guardado exitosamente!', classes: 'rounded', inDuration: 5000});
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
            url:"/municipios/"+id,
            method:'GET',
            dataType:'json',
            success:function(data)
            {
                $('#lblId').val(data[0].id_municipio);
                $('#departamento').val(data[0].id_departamento);
                $('#lblMunicipio').val(data[0].municipio);

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
            url: "/municipios/"+id,
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

        var confirm= alertify.confirm('Municipios','Confirmar Eliminacion?',null,null).set('labels', {ok:'Confirmar', cancel:'Cancelar'});

		confirm.set('onok', function(){
            $.ajax(
            {
                url: "municipios/"+id,
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
