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
        <title></title>
    </head>
    <body>
        
        <form action="upload.php" method="post" enctype="multipart/form-data">
            <label for="filename">Select File</label>       
            <input type="file" name="file_name" id="filename"><br>
            <input type="submit" name="upload" value="Upload File"><br>
        
       </form>
    </body>
</html>