<?php require_once 'functions/functions.php'; ?>

<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
session_start();

//check if ther exist in the session, otherwise redirct to index page

if(!isset($_SESSION['username']))
{
    //destroy the session
    session_destroy();
    
    //redirect to limit access to this resource
    header("Location: index.php");
}
?>

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
 <!-- Static navbar -->
    <nav class="navbar navbar-default navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">PIstorage</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="main.php?tab=storage">Files</a></li>
            <li><a href="main.php?tab=layout">Admin</a></li>
            <li><a href="#contact">Contact</a></li>
      
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="">Logout</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
 

        
        
<?php

 if(isset($_GET['tab'])){
       
        $page = $_GET['tab'];
        
        if($page == 'storage'){
           
            include 'tabs/storage_management.php';
                          
        }  
        if($page == 'layout'){
            include 'tabs/layout.php';
        }
    }else{
        include 'tabs/storage_content.php';
    }
 
 ?>
                
      
        
        <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="scripts/jquery-2.1.4.min.js"></script>
    <script src="scripts/bootstrap.min.js"></script>
    <script src="scripts/main.js"></script>
    <script src="scripts/angular.min.js"></script>
    </body>
</html>