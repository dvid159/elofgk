$(document).ready(function () {
    console.log(alumnos_noveno)
    $("select[required]").css({display: "block", height: 0, padding: 0, width: 0, position: 'absolute'});
    $(".edit").click(function () {
        $('#ModalEditRecord').modal('open');
        $('#lblCarnet').focus();
    });

    //---------------------Datos para cargar tabla principal-------------------------------------------------
    
    var zdata = "";
    
    for(var x = 0; x < alumnos_noveno.length; x = x+0){
        var carnet = alumnos_noveno[x].carnet_alumno;

        zdata += '<tr>'+
            '<td><a  href="#" data-id="' + alumnos_noveno[x].carnet_alumno + '" class="resume">' + alumnos_noveno[x].carnet_alumno + '</a> </td>' +
            '<td>' + alumnos_noveno[x].nombres + '-' + alumnos_noveno[x].apellidos + '</td>';
            var PFF = 0;
            for(var z = 0; z < 16; z = z+0){
                
                if( x < alumnos_noveno.length){
                if(carnet == alumnos_noveno[x].carnet_alumno ){
                    var PF =  calcularPromedio(alumnos_noveno[x].nota, alumnos_noveno[x+1].nota, alumnos_noveno[x+2].nota, alumnos_noveno[x+3].nota);
                    PFF += PF;
                    if(PF <= 5){
                        zdata += '<td style="text-align:center; color: red">'+ PF +'</td>';
                    }else{zdata += '<td style="text-align:center;">'+ PF +'</td>';}
                    
                   
                }else{ 
                  x = x - 4;
                    zdata += '<td style="text-align:center;">-</td>'; 
                    }
                }else{ 
                    zdata += '<td style="text-align:center;">-</td>'; 
                    }
                z = z + 4
                x = x + 4;                  
            }
            PFF = (PFF/4).toFixed(2);
            zdata += '<td style="text-align:center;">'+ PFF +'</td>';
            zdata += '</tr>';
           
    }
    $("#Tnoveno").append(zdata);
    

    //--------------------------------------------------------------------------------------------------------------------------------------------------------
    var zdata = "";
    
    for(var x = 0; x < alumnos_primero.length; x = x+0){
        var carnet = alumnos_primero[x].carnet_alumno;

        zdata += '<tr>'+
            '<td><a  href="#" data-id="' + alumnos_primero[x].carnet_alumno + '" class="resume">' + alumnos_primero[x].carnet_alumno + '</a> </td>' +
            '<td>' + alumnos_primero[x].nombres + '-' + alumnos_primero[x].apellidos + '</td>';
            var PFF = 0;
            for(var z = 0; z < 16; z = z+0){
                
                if( x < alumnos_primero.length){
                if(carnet == alumnos_primero[x].carnet_alumno ){
                    var PF =  calcularPromedio(alumnos_primero[x].nota, alumnos_primero[x+1].nota, alumnos_primero[x+2].nota, alumnos_primero[x+3].nota);
                    PFF += PF;
                    if(PF <= 5){
                        zdata += '<td style="text-align:center; color: red">'+ PF +'</td>';
                    }else{zdata += '<td style="text-align:center;">'+ PF +'</td>';}
                    
                   
                }else{ 
                  x = x - 4;
                    zdata += '<td style="text-align:center;">-</td>'; 
                    }
                }else{ 
                    zdata += '<td style="text-align:center;">-</td>'; 
                    }
                z = z + 4
                x = x + 4;                  
            }
            PFF = (PFF/4).toFixed(2);
            zdata += '<td style="text-align:center;">'+ PFF +'</td>';
            zdata += '</tr>';
           
    }
    $("#Tprimero").append(zdata);

    //----------------------------------------------------------------------------------------------------------------------------------------------------
    var zdata = "";
    if(alumnos_segundo.length > 0){
    for(var x = 0; x < alumnos_segundo.length; x = x+0){
        var carnet = alumnos_segundo[x].carnet_alumno;

        zdata += '<tr>'+
            '<td><a  href="#" data-id="' + alumnos_segundo[x].carnet_alumno + '" class="resume">' + alumnos_segundo[x].carnet_alumno + '</a> </td>' +
            '<td>' + alumnos_segundo[x].nombres + '-' + alumnos_segundo[x].apellidos + '</td>';
            var PFF = 0;
            for(var z = 0; z < 16; z = z+0){
                
                if( x < alumnos_segundo.length){
                if(carnet == alumnos_segundo[x].carnet_alumno ){
                    var PF =  calcularPromedio(alumnos_segundo[x].nota, alumnos_segundo[x+1].nota, alumnos_segundo[x+2].nota, alumnos_segundo[x+3].nota);
                    PFF += PF;
                    if(PF <= 5){
                        zdata += '<td style="text-align:center; color: red">'+ PF +'</td>';
                    }else{zdata += '<td style="text-align:center;">'+ PF +'</td>';}
                    
                   
                }else{ 
                  x = x - 4;
                    zdata += '<td style="text-align:center;">-</td>'; 
                    }
                }else{ 
                    zdata += '<td style="text-align:center;">-</td>'; 
                    }
                z = z + 4
                x = x + 4;                  
            }
            PFF = (PFF/4).toFixed(2);
            zdata += '<td style="text-align:center;">'+ PFF +'</td>';
            zdata += '</tr>';
           
    }

    }else{zdata += '<tr> <td colspan="7" style="text-align:center;"> -NO EXISTEN REGISTROS- </td></tr>';
}
    $("#Tsegundo").append(zdata);
    //---------------------------------------------------------------------------------------------------------------------------------------------------
    



    //----------------Crear tabla resumen ----------------------------------------------------------------------------------------
    $('.resume').click(function () {
        var id = $(this).data("id");
        console.log(id);

        $.ajax(
            {
                url: "/record_escolar/" + id,
                method: 'GET',
                dataType: 'json',
                success: function (data) {
                    console.log(data);
                    console.log(data[0].length);
                    $('#Rcarnet').empty();
                    $('#Rname').empty();
                    $("#dataTableResumen").empty();


                    $('#Rcarnet').append(data[0][0].carnet_alumno);
                    $('#Rname').append(data[0][0].nombres + ' ' + data[0][0].apellidos);

                    var per = 1;
                    var prom;
                    var reg = '<thead>' +
                        '<tr>' +
                        '<th data-field="Periodo" style="text-align:center; ">PERIODO</th>' +
                        '<th data-field="materia1" style="text-align:center; ">MATEMATICA</th>' +
                        '<th data-field="materia2" style="text-align:center; ">CIENCIAS</th>' +
                        '<th data-field="materia3" style="text-align:center; ">LENGUAJE</th>' +
                        '<th data-field="materia4" style="text-align:center; ">SOCIALES</th>' +
                        '<th data-field="PP" style="text-align:center; ">PP</th>' +
                        '</tr>' +
                        '</thead>';

                    for (var i = 0; i < data[0].length; i = i + 4) {
                        prom = calcularPromedio(data[0][i].nota, data[0][i + 1].nota, data[0][i + 2].nota, data[0][i + 3].nota);
                        reg += '<tr>' +
                            '<th style="text-align:center;"> <a href="#" class="PResume">' + per + '</a></th>' +
                            '<td style="text-align:center;">' + data[0][i].nota + '</td>' +
                            '<td style="text-align:center;">' + data[0][i + 1].nota + '</td>' +
                            '<td style="text-align:center;">' + data[0][i + 2].nota + '</td>' +
                            '<td style="text-align:center;">' + data[0][i + 3].nota + '</td>' +
                            '<td style="text-align:center;">' + prom + '</td>' +
                            '</tr>';
                        per++;
                    }

                    $("#dataTableResumen").append(reg);
                    $('#ModalResumeRecord').modal('open');
                },
                error: function (error) {
                    console.log(error);
                    console.log("ERROR");
                }
            });


    });
    //----------------actualizar tabla por clase(select)---------------------------------------------------------------------------------
    //-------------------NOVENO---------------------------------------------
    $('.materialSelect1').change(function (e) {
        var clase = $('.materialSelect1').val();        
    $("#Tnoveno").empty();
        var zdata = "";
    
    for(var x = 0; x < alumnos_noveno.length; x = x+0){
        if(alumnos_noveno[x].id_class == clase || clase == "all"){
        var carnet = alumnos_noveno[x].carnet_alumno;

        zdata += '<tr>'+
            '<td><a  href="#" data-id="' + alumnos_noveno[x].carnet_alumno + '" class="resume">' + alumnos_noveno[x].carnet_alumno + '</a> </td>' +
            '<td>' + alumnos_noveno[x].nombres + '-' + alumnos_noveno[x].apellidos + '</td>';
            var PFF = 0;
            for(var z = 0; z < 16; z = z+0){
                
                if( x < alumnos_noveno.length){
                if(carnet == alumnos_noveno[x].carnet_alumno ){
                    var PF =  calcularPromedio(alumnos_noveno[x].nota, alumnos_noveno[x+1].nota, alumnos_noveno[x+2].nota, alumnos_noveno[x+3].nota);
                    PFF += PF;
                    if(PF <= 5){
                        zdata += '<td style="text-align:center; color: red">'+ PF +'</td>';
                    }else{zdata += '<td style="text-align:center;">'+ PF +'</td>';}
                    
                   
                }else{ 
                  x = x - 4;
                    zdata += '<td style="text-align:center;">-</td>'; 
                    }
                }else{ 
                    zdata += '<td style="text-align:center;">-</td>'; 
                    }
                z = z + 4
                x = x + 4;                  
            }
            PFF = (PFF/4).toFixed(2);
            zdata += '<td style="text-align:center;">'+ PFF +'</td>';
            zdata += '</tr>';
        }else{            
            x = x+4} 
        console.log(zdata);
    }
    
    $("#Tnoveno").append(zdata);

    });
    //---------------- PRIMER AÑO-------------------------------------------
    $('.materialSelect2').change(function (e) {
        var clase = $('.materialSelect2').val();
        $("#Tprimero").empty();
        var zdata = "";
    
        for(var x = 0; x < alumnos_primero.length; x = x+0){
            if(alumnos_primero[x].id_class == clase || clase == "all"){
            var carnet = alumnos_primero[x].carnet_alumno;
    
            zdata += '<tr>'+
                '<td><a  href="#" data-id="' + alumnos_primero[x].carnet_alumno + '" class="resume">' + alumnos_primero[x].carnet_alumno + '</a> </td>' +
                '<td>' + alumnos_primero[x].nombres + '-' + alumnos_primero[x].apellidos + '</td>';
                var PFF = 0;
                for(var z = 0; z < 16; z = z+0){
                    
                    if( x < alumnos_primero.length){
                    if(carnet == alumnos_primero[x].carnet_alumno ){
                        var PF =  calcularPromedio(alumnos_primero[x].nota, alumnos_primero[x+1].nota, alumnos_primero[x+2].nota, alumnos_primero[x+3].nota);
                        PFF += PF;
                        if(PF <= 5){
                            zdata += '<td style="text-align:center; color: red">'+ PF +'</td>';
                        }else{zdata += '<td style="text-align:center;">'+ PF +'</td>';}
                        
                       
                    }else{ 
                      x = x - 4;
                        zdata += '<td style="text-align:center;">-</td>'; 
                        }
                    }else{ 
                        zdata += '<td style="text-align:center;">-</td>'; 
                        }
                    z = z + 4
                    x = x + 4;                  
                }
                PFF = (PFF/4).toFixed(2);
                zdata += '<td style="text-align:center;">'+ PFF +'</td>';
                zdata += '</tr>';
            }else{                
                x = x+4}
               
        }
        $("#Tprimero").append(zdata);
    

    });
    //-------------------SEGUNDO AÑO-----------------------------------------
    $('.materialSelect3').change(function (e) {
        var clase = $('.materialSelect3').val();
        $("#Tsegundo").empty();
        var zdata = "";
    if(alumnos_segundo.length > 0){
    for(var x = 0; x < alumnos_segundo.length; x = x+0){
        if(alumnos_primero[x].id_class == clase || clase == "all"){
        var carnet = alumnos_segundo[x].carnet_alumno;

        zdata += '<tr>'+
            '<td><a  href="#" data-id="' + alumnos_segundo[x].carnet_alumno + '" class="resume">' + alumnos_segundo[x].carnet_alumno + '</a> </td>' +
            '<td>' + alumnos_segundo[x].nombres + '-' + alumnos_segundo[x].apellidos + '</td>';
            var PFF = 0;
            for(var z = 0; z < 16; z = z+0){
                
                if( x < alumnos_segundo.length){
                if(carnet == alumnos_segundo[x].carnet_alumno ){
                    var PF =  calcularPromedio(alumnos_segundo[x].nota, alumnos_segundo[x+1].nota, alumnos_segundo[x+2].nota, alumnos_segundo[x+3].nota);
                    PFF += PF;
                    if(PF <= 5){
                        zdata += '<td style="text-align:center; color: red">'+ PF +'</td>';
                    }else{zdata += '<td style="text-align:center;">'+ PF +'</td>';}
                    
                   
                }else{ 
                  x = x - 4;
                    zdata += '<td style="text-align:center;">-</td>'; 
                    }
                }else{ 
                    zdata += '<td style="text-align:center;">-</td>'; 
                    }
                z = z + 4
                x = x + 4;                  
            }
            PFF = (PFF/4).toFixed(2);
            zdata += '<td style="text-align:center;">'+ PFF +'</td>';
            zdata += '</tr>';
        }else{           
            x = x+4}
    }

    }else{zdata += '<tr> <td colspan="7" style="text-align:center;"> -NO EXISTEN REGISTROS- </td></tr>';
}
    $("#Tsegundo").append(zdata);
    });
    // ---------------Termina actualizar tabla por clase-------------------------------------------------------------------------

    //--------------------------------------------------------------------------------------------------------------------------
    $(".exitAdd").click(function () {        
        $('#ModalEditRecord').modal('close');
    });
    // -----------------------------------------------------
    $(".exitResume").click(function () {
        $('#ModalResumeRecord').modal('close');
    });
    //------------------------------------------------------
    $(".PResume").click(function () {
        $('#ModalEditRecord').modal('open');
        $('#ModalResumeRecord').modal('close');
    });
    //-------------------Guardar notas----------------------------------------------------------------- 
    $('#editform').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "/record_escolar",
            data: $("#editform").serialize(),
            success: function (resonse) {
                console.log(resonse);
                console.log('Notas guardadas exitosamente!');
                M.toast({ html: 'Notas guardadas exitosamente!', classes: 'rounded', inDuration: 5000 });
                // location.reload();
            },
           
            error: function (error) {
                M.toast({ html: 'VERIFIQUE QUE LOS DATOS ESTEN CORRECTOS', classes: 'rounded', inDuration: 4000 });
                console.log(error);
                console.log("ERROR");
            }
        });
    });
    //-------------------------------------------------------------------------------------

    //------------------------------------Seccion de keypress------------------------------------------------//        
    //-----------------------key press busqueda por nombre---------------------------------------------------//
    $('#nombre_recordN').keyup(function(e){
        var key = $('#nombre_recordN').val().toLowerCase();
        

        $("#Tnoveno").empty();
        var zdata = "";
    
    for(var x = 0; x < alumnos_noveno.length; x = x+0){
        if (alumnos_noveno[x].nombres.toLowerCase().indexOf(key,0) >= 0 || alumnos_noveno[x].apellidos.toLowerCase().indexOf(key,0) >= 0) {
        var carnet = alumnos_noveno[x].carnet_alumno;

        zdata += '<tr>'+
            '<td><a  href="#" data-id="' + alumnos_noveno[x].carnet_alumno + '" class="resume">' + alumnos_noveno[x].carnet_alumno + '</a> </td>' +
            '<td>' + alumnos_noveno[x].nombres + '-' + alumnos_noveno[x].apellidos + '</td>';
            var PFF = 0;
            for(var z = 0; z < 16; z = z+0){
                
                if( x < alumnos_noveno.length){
                if(carnet == alumnos_noveno[x].carnet_alumno ){
                    var PF =  calcularPromedio(alumnos_noveno[x].nota, alumnos_noveno[x+1].nota, alumnos_noveno[x+2].nota, alumnos_noveno[x+3].nota);
                    PFF += PF;
                    if(PF <= 5){
                        zdata += '<td style="text-align:center; color: red">'+ PF +'</td>';
                    }else{zdata += '<td style="text-align:center;">'+ PF +'</td>';}
                    
                   
                }else{ 
                  x = x - 4;
                    zdata += '<td style="text-align:center;">-</td>'; 
                    }
                }else{ 
                    zdata += '<td style="text-align:center;">-</td>'; 
                    }
                z = z + 4
                x = x + 4;                  
            }
            PFF = (PFF/4).toFixed(2);
            zdata += '<td style="text-align:center;">'+ PFF +'</td>';
            zdata += '</tr>';
        }else{            
            x = x+4} 
        console.log(zdata);
    }
    
    $("#Tnoveno").append(zdata);

           
    });

    $('#nombre_recordP').keyup(function(e){
        var key = $('#nombre_recordP').val().toLowerCase();
          
        $("#Tprimero").empty();
        var zdata = "";
    
        for(var x = 0; x < alumnos_primero.length; x = x+0){
            if (alumnos_primero[x].nombres.toLowerCase().indexOf(key,0) >= 0 || alumnos_primero[x].apellidos.toLowerCase().indexOf(key,0) >= 0) {
            var carnet = alumnos_primero[x].carnet_alumno;
    
            zdata += '<tr>'+
                '<td><a  href="#" data-id="' + alumnos_primero[x].carnet_alumno + '" class="resume">' + alumnos_primero[x].carnet_alumno + '</a> </td>' +
                '<td>' + alumnos_primero[x].nombres + '-' + alumnos_primero[x].apellidos + '</td>';
                var PFF = 0;
                for(var z = 0; z < 16; z = z+0){
                    
                    if( x < alumnos_primero.length){
                    if(carnet == alumnos_primero[x].carnet_alumno ){
                        var PF =  calcularPromedio(alumnos_primero[x].nota, alumnos_primero[x+1].nota, alumnos_primero[x+2].nota, alumnos_primero[x+3].nota);
                        PFF += PF;
                        if(PF <= 5){
                            zdata += '<td style="text-align:center; color: red">'+ PF +'</td>';
                        }else{zdata += '<td style="text-align:center;">'+ PF +'</td>';}
                        
                       
                    }else{ 
                      x = x - 4;
                        zdata += '<td style="text-align:center;">-</td>'; 
                        }
                    }else{ 
                        zdata += '<td style="text-align:center;">-</td>'; 
                        }
                    z = z + 4
                    x = x + 4;                  
                }
                PFF = (PFF/4).toFixed(2);
                zdata += '<td style="text-align:center;">'+ PFF +'</td>';
                zdata += '</tr>';
            }else{                
                x = x+4}
               
        }
        $("#Tprimero").append(zdata);

    });

    $('#nombre_recordS').keyup(function(e){
        var key = $('#nombre_recordS').val().toLowerCase();
        var alumN = alumnos_segundo;
        var Z = "";
        $('#Tsegundo').empty();

        for (var x = 0; x < alumN.length; x++) {
            if (alumN[x].nombres.toLowerCase().indexOf(key,0) >= 0) {
                Z += '<tr>' +
                    '<td><a  href="#" data-id="' + alumN[x].carnet_alumno + '" class="resume">' + alumN[x].carnet_alumno + '</a> </td>' +
                    '<td>' + alumN[x].nombres + '-' + alumN[x].apellidos + '</td>' +
                    '<td style="text-align:center;">-</td>' +
                    '<td style="text-align:center;">-</td>' +
                    '<td style="text-align:center;">-</td>' +
                    '<td style="text-align:center;">-</td>' +
                    '</tr>';
            }
        }
        $("#Tsegundo").append(Z);       
    });


    $('#lblCarnet').keyup(function(e){
        $('#lblNombre').val("");
        if($('#lblCarnet').val().length == 14){
            
            var carnt = $('#lblCarnet').val();
            var alumnos = alumnos_all;
            for (var x = 0; x < alumnos.length; x++){
                if(alumnos[x].carnet_alumno.toLowerCase() == carnt.toLowerCase()){
                    $('#lblNombre').val(alumnos[x].nombres +' '+ alumnos[x].apellidos);
                    var long = alumnos[x].nombres;
                    console.log(long);
                }


            }
            
        }
        

    });
    //--------------------------------------------------------------------------------------------------------//




    
});


//-------------------------key press formulario ingreso de notas----------------------------------------//
function showName(e) {
  //  See notes about 'which' and 'key'
    if (e.keyCode == 13) {
        document.getElementById("lblNombre").value = "";
        document.getElementById("lblNombre").value = "nombre de alumno";
    }
}



//------------------------------------------------//
function calcularPromedio(n1, n2, n3, n4) {
    var p = (parseInt(n1) + parseInt(n2) + parseInt(n3) + parseInt(n4));
    return ((p) / 4);
}
