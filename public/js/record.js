$(document).ready(function(){

    $(".edit").click(function(){
        $('#ModalEditRecord').modal('open');
        
    });
// ------------------------------------------------------------------------
    $(".resume").click(function(){
        var id = $(this).data("id");
        console.log(id);

        $.ajax(
        {                
            url:"/record_escolar/"+id,
            method:'GET',
            dataType:'json',
            success:function(data)
            {
                console.log(data);               
                console.log(data[0].length);
                $('#Rcarnet').empty();
                $('#Rname').empty();
                $("#dataTableResumen").empty();


               $('#Rcarnet').append(data[0][0].carnet_alumno);
               $('#Rname').append(data[0][0].nombres+' '+ data[0][0].apellidos);               
               
               var per = 1;
               var prom;
               var reg = '<thead>'+                            
                           '<tr>'+                                                             
                               '<th data-field="Periodo" style="text-align:center; ">PERIODO</th>'+
                               '<th data-field="materia1" style="text-align:center; ">MATEMATICA</th>'+
                               '<th data-field="materia2" style="text-align:center; ">CIENCIAS</th>'+
                               '<th data-field="materia3" style="text-align:center; ">LENGUAJE</th>'+
                               '<th data-field="materia4" style="text-align:center; ">SOCIALES</th>'+
                               '<th data-field="PP" style="text-align:center; ">PP</th>'+
                           '</tr>'+
                       '</thead>';            

            for(var i = 0; i < data[0].length; i = i+4){
                prom = calcularPromedio(data[0][i].nota,data[0][i+1].nota,data[0][i+2].nota,data[0][i+3].nota);                                                 
                    reg+= '<tr>'+
                            '<th style="text-align:center;"> <a href="#" class="PResume">'+ per +'</a></th>'+
                            '<td style="text-align:center;">'+data[0][i].nota+'</td>'+
                            '<td style="text-align:center;">'+data[0][i+1].nota+'</td>'+
                            '<td style="text-align:center;">'+data[0][i+2].nota+'</td>'+
                            '<td style="text-align:center;">'+data[0][i+3].nota+'</td>'+                            
                            '<td style="text-align:center;">'+prom+'</td>'+                            
                           '</tr>';
                    per++;                                                             
            }
              
            $("#dataTableResumen").append(reg);           
            $('#ModalResumeRecord').modal('open');
            },
            error: function(error){
                console.log(error);
                console.log("ERROR");
            }
        });

       
    });
    //----------------atualizar tabla por clase---------------------------------------------------------------------------------
    $('.materialSelect1').change(function (e){
        var clase = $('.materialSelect1').val();
        console.log(clase)
        $.ajax(
            {   
                type:'PUT',                                    
                url:"/record_escolar/"+clase,                       
                dataType:'json',
                success:function(data)
                {
                    console.log(data);  
                },
                error: function(error){
                    console.log(error);
                    console.log("ERROR");
                }
            
            });        
        });

            $('.materialSelect2').change(function (e){   
                var clase = $('.materialSelect2').val();
                $.ajax(
                    {                
                        type: 'PUT',        
                        url:"/record_escolar/"+clase, 
                        dataType:'json',
                        success:function(data)
                        {
        
                        },
                        error: function(error){
                            console.log(error);
                            console.log("ERROR");
                        }
                    
                    });      
        });

            $('.materialSelect3').change(function (e){   
                var clase = $('.materialSelect3').val();
                $.ajax(
                    {    
                        type: 'PUT',        
                        url:"/record_escolar/"+clase,                        
                        dataType:'json',
                        success:function(data)
                        {
        
                        },
                        error: function(error){
                            console.log(error);
                            console.log("ERROR");
                        }
                    
                    });
    });

    // ----------------------------------------------------------------
    $(".exitAdd").click(function(){
        $('#ModalEditRecord').modal('close');    
    });
    // ----------------------------------------------
    $(".exitResume").click(function(){
        $('#ModalResumeRecord').modal('close');    
    });
    //--------------------------------------------------
    $(".PResume").click(function(){        
        $('#ModalEditRecord').modal('open');
        $('#ModalResumeRecord').modal('close');
    });
   //------------------------------------------------------ 

    $('#editform').on('submit', function(e){
        e.preventDefault();
        $.ajax({
            type:"POST",
            url: "/record_escolar",
            data: $("#editform").serialize(),
            success: function(resonse){
                console.log(resonse);
                console.log('Notas guardadas exitosamente!');
                M.toast({html: 'Notas guardadas exitosamente!', classes: 'rounded', inDuration: 5000});
               // location.reload();
            },
            error: function(error){
                console.log(error);
                console.log("ERROR");
            }
        });
    });    
//-------------------------------------------------------------------------------------
});

 //-----------seccion de keypress------------------//        
function showName(e) {
    //See notes about 'which' and 'key'
    if (e.keyCode == 13) {
        document.getElementById("lblNombre").value="" ;
        document.getElementById("lblNombre").value="nombre de alumno" ;
    }
}
//------------------------------------------------//
function calcularPromedio(n1, n2, n3, n4){
    var p = (parseInt(n1) + parseInt(n2) + parseInt(n3) + parseInt(n4));    
    return((p)/4);
    }
