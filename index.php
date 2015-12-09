<?php session_start(); ?>
<?php require_once 'functions/functions.php'; ?>


<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
//check for login 
if(isset($_POST['username'], $_POST['password'])) {

    
    if(login($_POST['username'], $_POST['password']))
    {
        //Add username to session
        $_SESSION['username'] = $_POST['username'];
        
        //redirect to main
        header("Location: main.php");   
    }
    else 
    {
        echo "Wrong username or password";
    }
}

?>


<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <script src="scripts/jquery-2.1.4.min.js"></script>
        <script src="scripts/jquery-ui.min.js"></script>
        <script src="scripts/indexscript.js"></script>
        <!-- Bootstrap core CSS -->
        <link href="styles/bootstrap.min.css" rel="stylesheet" media="screen">
        <link rel="stylesheet" href="styles/main.css">
        
        <title></title>
    </head>
    <body>
        <div id="header">
            
        </div>
        <div>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label=""><span>&times;</span></button>
                <h3 class="modal-title">PISTORAGE<small>.login<small></h3>
            </div>
            <div class="modal-body">
                 <form class="col-md-12 center-block" method="post" action="index.php">
                <div class="form-group">
                    <input type="text" name="username" class="form-control input-lg" placeholder="username">    
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control input-lg" placeholder="password">
                </div>
                <div class="form-group">
                    <input type="submit" name="log_sub" class="btn btn-block btn-lg btn-primary" value="Login">     
                </div>
            </form>
            </div>
            <div class="modal-footer">Login with facebook</div>
        </div>
    </div>
</div>
  
    
        
        
         <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
 
    <script src="scripts/bootstrap.min.js"></script>
    
    
    </body>
</html>
