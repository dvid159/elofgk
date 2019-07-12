$(document).ready(function(){

    $(".edit").click(function(){
        $('#ModalEditRecord').modal('open');
        
    });
    // ----------------------------------------------
    $(".resume").click(function(){
        $('#ModalResumeRecord').modal('open');
    });
    
    // ----------------------------------------------
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
    
    });