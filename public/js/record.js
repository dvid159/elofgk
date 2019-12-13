$(document).ready(function () {
   // console.log(alumnos_noveno)
    $("select[required]").css({display: "block", height: 0, padding: 0, width: 0, position: 'absolute'});
    $(".edit").click(function () {
        $('#ModalEditRecord').modal('open');
        $('#lblCarnet').focus();
    });

    //---------------------Datos para cargar tabla principal-------------------------------------------------
    
    var a_noveno = llenarBaseInicial(alumnos_noveno);
    $("#Tnoveno").append(a_noveno);
    var a_primero = llenarBaseInicial(alumnos_primero);
    $("#Tprimero").append(a_primero);
    var a_segundo = llenarBaseInicial(alumnos_segundo);
    $("#Tsegundo").append(a_segundo);
    //--------------------------------------------------------------------------------------------------------------------------------------------------------
    

    //----------------Crear tabla resumen ----------------------------------------------------------------------------------------
    $('.resume').click(function() {
        var id = $(this).data("id");
      
        var grado = $(".item-grado.active").attr('id');

        //$info = array(['id','grado']);
        var array = [id, grado];
        console.log(array);
        $.ajax(
            {
                url: "/admin/record_escolar/" + id,
                method: 'GET',
                data: {'array': JSON.stringify(array)},
                // dataType: 'json',
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


    $('.prom').click(function(){
       var grado = $(".item-grado.active").attr('id');  
       var data = $(this).data("id").split("/");
       data.push(grado);
       var id = data[0];
    //    var id = data[0];

        console.log(data,id);        

        $.ajax(
            {
                url:"/admin/record_escolar/"+ id +"/edit",
                method:'GET',
                data:{'data': JSON.stringify(data)},
                success:function(data){
                    console.log(data);
                    $('#lblCarnet').val(data[0].carnet_alumno);
                    $('#lblNombre').val(data[0].nombres+' '+data[0].apellidos);

                    for( i = 0; i < 4 ; i++){

                        if(data[i].id_materia == 2){
                            $('#mat_nota').val(data[i].nota);
                        }else if(data[i].id_materia == 7){
                            $('#cien_nota').val(data[i].nota);
                        }else if(data[i].id_materia == 6){
                            $('#leng_nota').val(data[i].nota);
                        }else if(data[i].id_materia == 8){
                            $('#soc_nota').val(data[i].nota);
                        }
                    }
                    $('#grado').val(grado);
                    $('#periodo').val(data[0].id_periodo);
                    $('select').formSelect();

                 $('#ModalEditRecord').modal('open');


                },error: function (error) {
                    console.log(error);
                    console.log("ERROR");
                }

        });
    });


    //----------------actualizar tabla por clase(select)---------------------------------------------------------------------------------
    //-------------------NOVENO---------------------------------------------
    $('.materialSelect1').change(function (e) {
        if($('.materialSelect1').val() != "all"){
        var clase = $('.materialSelect1').val().split("-");        
        data_tabla = document.getElementById('dataTable');
        buscarPNombre(clase[1], data_tabla);
        }else{
            buscarPNombre("",data_tabla)
    }
        
    });
    //---------------- PRIMER AÑO-------------------------------------------
    $('.materialSelect2').change(function (e) {
        if($('.materialSelect2').val() != "all"){
        var clase = $('.materialSelect2').val().split("-");
        data_tabla = document.getElementById('dataTable2');
        buscarPNombre(clase[1], data_tabla); 
        }else{
            buscarPNombre("",data_tabla)
        }
       
    });
    //-------------------SEGUNDO AÑO-----------------------------------------
    $('.materialSelect3').change(function (e) {
        if($('.materialSelect3').val() != "all"){
        var clase = $('.materialSelect3').val().split("-");
        data_tabla = document.getElementById('dataTable3');
        buscarPNombre(clase[1], data_tabla); 
        }else{
            buscarPNombre("",data_tabla)
        }
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
            url: "/admin/record_escolar",
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
        data_tabla = document.getElementById('dataTable');
        buscarPNombre(key, data_tabla);           
    });
    
    $('#nombre_recordP').keyup(function(e){
        var key = $('#nombre_recordP').val().toLowerCase();
        data_tabla = document.getElementById('dataTable2');
        buscarPNombre(key, data_tabla);
    });

    $('#nombre_recordS').keyup(function(e){
        var key = $('#nombre_recordS').val().toLowerCase();
        data_tabla = document.getElementById('dataTable3');
        buscarPNombre(key, data_tabla);       
    });

//--------------------------------busqueda de alumno en guardar notas--------------------------------------------//
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
                }else{
                    $('#lblNombre').val("Alumno no encontrado");
                }


            }
            
        }
        

    });
    //--------------------------------------------------------------------------------------------------------//

    //--------------------- funciones aparte---------------------------//
    function calcularPromedio(n1, n2, n3, n4) {
    var p = (parseInt(n1) + parseInt(n2) + parseInt(n3) + parseInt(n4));
    return ((p) / 4);
    }

    function llenarBaseInicial(tabla_alumno){
        var zdata = "";
        
        for(var x = 0; x < tabla_alumno.length; x = x+0){
            var carnet = tabla_alumno[x].carnet_alumno;
            var period = 0;
            zdata += '<tr>'+
                '<td><a  href="#" data-id="' + tabla_alumno[x].carnet_alumno + '" class="resume">' + tabla_alumno[x].carnet_alumno + '</a> </td>' +
                '<td>' + tabla_alumno[x].nombres + '-' + tabla_alumno[x].apellidos + '</td>';
                var PFF = 0;
                for(var z = 0; z < 16; z = z+0){
                    
                    if( x < tabla_alumno.length){
                    if(carnet == tabla_alumno[x].carnet_alumno ){
                        var PF =  calcularPromedio(tabla_alumno[x].nota, tabla_alumno[x+1].nota, tabla_alumno[x+2].nota, tabla_alumno[x+3].nota);
                        PFF += PF;
                        if(PF <= 5){
                            zdata += '<td  style="text-align:center;"><a href=# data-id="'+ tabla_alumno[x].carnet_alumno + "/"+ tabla_alumno[x].id_periodo +'" data-toggle="tooltip" title="Matematica:'+ tabla_alumno[x].nota +'&#10;Lenguaje:' + tabla_alumno[x+1].nota +'&#10;Ciencias:'+ tabla_alumno[x+2].nota +'&#10;Sociales:'+ tabla_alumno[x+3].nota +'" class="prom" style="text-align:center; color: red" >' + PF +'</a> </td>';
                        }else{zdata += '<td style="text-align:center;"><a href=# data-id="'+ tabla_alumno[x].carnet_alumno + "/"+ tabla_alumno[x].id_periodo +'" data-toggle="tooltip" title="Matematica:'+ tabla_alumno[x].nota +'&#10;Lenguaje:' + tabla_alumno[x+1].nota +'&#10;Ciencias:'+ tabla_alumno[x+2].nota +'&#10;Sociales:'+ tabla_alumno[x+3].nota +'" class="prom" style="color: black" >'+ PF +'</a> </td>';}
                        
                    period++;   
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
                PFF = (PFF/period).toFixed(2);
                zdata += '<td style="text-align:center;">'+ PFF +'</td>';
                zdata += '</tr>';
               
        }
    
        return zdata;
    }
    
    function llenarBaseFiltrada(tabla_alumno, clase){
        var zdata = "";
    
        for(var x = 0; x < tabla_alumno.length; x = x+0){
            if(tabla_alumno[x].id_class == clase || clase == "all"){
            var carnet = tabla_alumno[x].carnet_alumno;
    
            zdata += '<tr>'+
                '<td><a  href="#" data-id="'+tabla_alumno[x].carnet_alumno+'" class="resume">' + tabla_alumno[x].carnet_alumno + '</a> </td>' +
                '<td>' + tabla_alumno[x].nombres + '-' + tabla_alumno[x].apellidos + '</td>';
                var PFF = 0;
                for(var z = 0; z < 16; z = z+0){
                    
                    if( x < tabla_alumno.length){
                    if(carnet == tabla_alumno[x].carnet_alumno ){
                        var PF =  calcularPromedio(tabla_alumno[x].nota, tabla_alumno[x+1].nota, tabla_alumno[x+2].nota, tabla_alumno[x+3].nota);
                        PFF += PF;
                        if(PF <= 5){
                            zdata += '<td style="text-align:center; color: red">'+ PF +'</td>';
                        }else{zdata += '<td style="text-align:center;">'+ PF +'</td>';
                              }
                        
                       
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
        return zdata;
    }

    function buscarPNombre(clase, table){
    var tabla = table;
    var busqueda = clase;
    var cellsOfRow="";
    var found=false;
    var compareWith="";
    for (var i = 1; i < tabla.rows.length; i++) {
        cellsOfRow = tabla.rows[i].getElementsByTagName('td');
        found = false;
        for (var j = 0; j < cellsOfRow.length && !found; j++) { 
            compareWith = cellsOfRow[j].innerHTML.toLowerCase(); 
            if (busqueda.length == 0 || (compareWith.indexOf(busqueda) > -1))
            {
                found = true;
            }
        }
        if(found)
        {
            tabla.rows[i].style.display = '';
        } else {
            tabla.rows[i].style.display = 'none';
        }
    }
}

    //-------------------------key press formulario ingreso de notas----------------------------------------//
    function showName(e) {
    //  See notes about 'which' and 'key'
      if (e.keyCode == 13) {
          document.getElementById("lblNombre").value = "";
          document.getElementById("lblNombre").value = "nombre de alumno";
      }
    }
  
});

/**
 * ------------------------------------------Metodos borrados----------------------------------------------------*
 * -------------busqueda por filtro de nombre------------------
 * // $("#Tprimero").empty();
        // var zdata = "";
    
        // for(var x = 0; x < alumnos_primero.length; x = x+0){
        //     if (alumnos_primero[x].nombres.toLowerCase().indexOf(key,0) >= 0 || alumnos_primero[x].apellidos.toLowerCase().indexOf(key,0) >= 0) {
        //     var carnet = alumnos_primero[x].carnet_alumno;
    
        //     zdata += '<tr>'+
        //         '<td><a  href="#" data-id="' + alumnos_primero[x].carnet_alumno + '" class="resume">' + alumnos_primero[x].carnet_alumno + '</a> </td>' +
        //         '<td>' + alumnos_primero[x].nombres + '-' + alumnos_primero[x].apellidos + '</td>';
        //         var PFF = 0;
        //         for(var z = 0; z < 16; z = z+0){
                    
        //             if( x < alumnos_primero.length){
        //             if(carnet == alumnos_primero[x].carnet_alumno ){
        //                 var PF =  calcularPromedio(alumnos_primero[x].nota, alumnos_primero[x+1].nota, alumnos_primero[x+2].nota, alumnos_primero[x+3].nota);
        //                 PFF += PF;
        //                 if(PF <= 5){
        //                     zdata += '<td style="text-align:center; color: red">'+ PF +'</td>';
        //                 }else{zdata += '<td style="text-align:center;">'+ PF +'</td>';}
                        
                       
        //             }else{ 
        //               x = x - 4;
        //                 zdata += '<td style="text-align:center;">-</td>'; 
        //                 }
        //             }else{ 
        //                 zdata += '<td style="text-align:center;">-</td>'; 
        //                 }
        //             z = z + 4
        //             x = x + 4;                  
        //         }
        //         PFF = (PFF/4).toFixed(2);
        //         zdata += '<td style="text-align:center;">'+ PFF +'</td>';
        //         zdata += '</tr>';
        //     }else{                
        //         x = x+4}
               
        // }
        // $("#Tprimero").append(zdata);
 * 
 */





