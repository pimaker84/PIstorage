<?php require_once 'functions/functions.php'; ?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->



<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        
        <!-- Bootstrap core CSS -->
        <link href="styles/bootstrap.min.css" rel="stylesheet" media="screen">
        <link rel="stylesheet" href="styles/main.css"
        <title></title>
    </head>
    <body>
        <div class="container">
          
            <div class="well">
                <form method="post" action="index.php">
                <fieldset>
                    <legend>Login</legend>
                    <input type="text" name="username" class="form-control" placeholder="username">
                    <input type="password" name="password" class="form-control" placeholder="passowrd">
                    <input type="submit" name="log_sub" class="btn btn-primary" value="login">
                </fieldset>
            </form>
                </div>
            
        </div>
  
    
        
        
         <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="scripts/jquery-2.1.4.min.js"></script>
    <script src="scripts/bootstrap.min.js"></script>
    <script src="scripts/main.js"></script>
    <script src="scripts/angular.min.js"></script>
    
    </body>
</html>
