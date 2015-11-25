<?php require_once 'functions/functions.php'; ?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<?php
if(isset($_POST['upload'])){
    $destination = __DIR__ . '/upload/';
    if($_FILES['file_name']['error'] == 0){
        move_uploaded_file($_FILES['file_name']['tmp_name'], $destination . $_FILES['file_name']['name']);
    }
    print_r($_FILES);
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
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a href="#" class="navbar-brand">PIstorage</a>
                </div>
                
                <div>
                    <ul class="nav navbar-nav">
                        <li><a href="main.php?tab=storage">STORAGE</a></li>
                        <li><a href="#">ADMIN</a></li>
                        <li><a href="#">SETTINGS</a></li>
                        
                    </ul>
                </div>
            </div>
        </nav>
        
<?php
 if(isset($_GET['tab'])){
        
        $page = $_GET['tab'];
        
        if($page == 'storage'){
           
            include 'tabs/create_dir.php';
            
            
            
            
        }
        
       
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