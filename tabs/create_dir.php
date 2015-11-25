<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//$cwd = getcwd();
            
            // change directory to the storage folder
            
            chdir( "./storage" );
            
if(isset($_POST['dir_name'])){
    
    $dir = $_POST['dir_name'];
    $cwd = getcwd();
    // if the name is set, then create a directory
    mkdir($cwd . "/" . $dir);
}
           
?>

<div class="panel panel-default">
<div class="panel-body">
    <form method="post" action="main.php?tab=storage" class="form-inline">
  <div class="form-group">
    <label for="directory_name">Create Directory</label>
    <input type="text" name="dir_name" class="form-control" id="directory_name" placeholder="Name">
  </div>
  
  <button type="submit" class="btn btn-default">Create</button>
</form>
    
</div>
    </div>