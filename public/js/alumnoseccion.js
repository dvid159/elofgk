$(document).ready(function(){

    $('#clases').change(function (e){

        var clase = $('#clases').val();

        if(clase!="sin-elegir"){

            $.ajax({
                url:"/asignacion-alumnos/"+clase,
                method:'GET',
                dataType:'json',
                success: function(response){
                
                    $secciones = response['seccionesxclase'];
                    $alumnos = response['alumnos'];
                    $alumxsec = response['alumnosxseccion'];

                    console.log($secciones);
                    cargarSecciones($secciones);
                    cargarAlumnos($alumnos,$secciones);
                    cargarAsignados($alumxsec,$secciones);
                },
                error: function(error){            
                   console.log(error);
                }
            });
        }

    });

    $('#btnguardar').click(function(){

        var contadorderegistros = 0;

        $listadoxclase = $('tbody').children('tr');
        
        for(var i=0; i<$listadoxclase.length; i++){
            if (!$('input[name="'+$listadoxclase[i]['id']+'"]').is(':disabled')) {
                if ($('input[name="'+$listadoxclase[i]['id']+'"]').is(':checked')) {
                    contadorderegistros = contadorderegistros+1;
                }
            }
        } 

        var contador = 0;
        
        for(var i=0; i<$listadoxclase.length; i++){

            var flotante = 0;

            if (!$('input[name="'+$listadoxclase[i]['id']+'"]').is(':disabled')) {

                if ($('input[name="'+$listadoxclase[i]['id']+'"]').is(':checked')) {

        
                    if ($('input[name="'+$listadoxclase[i]['id']+'-flotante"]').is(':checked')) {
                        flotante =1;
                    }
    
                    var carnet = $listadoxclase[i]['id'];
                    var seccion = $('input[name="'+$listadoxclase[i]['id']+'"]:checked').val();
                    var token = $("meta[name='csrf-token']").attr("content");
                    
                     $.ajax({
                        type: "POST",
                        url: "/asignacion-alumnos",
                        data: {
                            "carnet": carnet,
                            "seccion": seccion,
                            "flotante": flotante,
                            "_token": token
                        },
                        success: function(response){
                            M.toast({html: 'Registro guardado exitosamente!', classes: 'rounded', inDuration: 5000});    
                            contador = contador+1;
                            if(contador==contadorderegistros){
                                location.reload();
                            }
                        },
                        error: function(error){
                            console.log(error);
                        }
                    });
                    

                }

            }
        } 
    
    });
        
});

function cargarSecciones(sec){ 

    $('#filaSecciones').empty();
    $('<th></th>',{text:'ALUMNO', style:'width: 40%'}).appendTo('#filaSecciones');
    sec.forEach(element => {
        var textocortado = element['id_seccion'].split('-');
        $('<th></th>',{text: textocortado[0]}).appendTo('#filaSecciones');
    });
    $('<th></th>',{text: 'Flotante'}).appendTo('#filaSecciones');

}


function cargarAlumnos(alum,secciones){

    var count = Object.keys(secciones).length;
    $('#tablaBody').empty();


    alum.forEach(element => {
   
        $('<tr></tr>',{id: element['carnet_alumno']}).appendTo('#tablaBody');

        var nombre = element['nombres']+' '+element['apellidos'];
        var ids = element['carnet_alumno'];
        $('<td></td>',{text: nombre}).appendTo('#'+ids);


        for(var i=0;i<count;i++){
        
            $('<td><label><input name="'+element['carnet_alumno']+'" class="'+secciones[i]['id_seccion']+'" value="'+secciones[i]['id_seccion']+'"  type="radio" /><span></span></label></td>').appendTo('#'+ids);
        }

        $('<td><label><input type="checkbox" name="'+element['carnet_alumno']+'-flotante" /><span></span></label></td>').appendTo('#'+ids);

    });

}


function cargarAsignados(asignados,secciones){

    var count = Object.keys(secciones).length;

    asignados.forEach(element => {
   
        $('#'+element['carnet_alumno']+' .'+element['id_seccion']).attr('checked','checked');
        $('#'+element['carnet_alumno']+'-flotante').attr('disabled','disabled');

        for(var i=0;i<count;i++){
        
            $('#'+element['carnet_alumno']+' .'+secciones[i]['id_seccion']).attr('disabled','disabled');
        }

        if(element['flotante']==true){
            $('input[name="'+element['carnet_alumno']+'-flotante"]').attr('checked','checked');
        }

        $('input[name="'+element['carnet_alumno']+'-flotante"]').attr('disabled','disabled');
        
    });



}