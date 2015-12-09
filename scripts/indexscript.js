$(document).ready(function(){
    $("#login-dialog").dialog({
        autoOpen: false
    });
    
    $("#login").click(function(){
       $('#login-dialog').dialog("open"); 
    });
});