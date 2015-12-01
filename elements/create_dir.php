<?php

if(isset($_POST['dir_name'])){
    
   if($_POST['dir_name']!==''){
       $name = $_POST['dir_name'];
       $lenght = strlen($name);
       $newdir = sanitise($name, $lenght);
       
       chdir("storage");
       create_dir($newdir);
       
   }else{
       echo "Please enter the directory name";
   }
    
}
?>

<div class="col-lg-12">
<div class="panel-body">
    <form method="post" action="main.php?tab=storage&id=make_dir" class="form-inline">
  <div class="form-group">
    <label for="directory_name">Create Directory</label>
    <input type="text" name="dir_name" class="form-control" id="directory_name" placeholder="Name">
  </div>
  
  <button type="submit" class="btn btn-default">Create</button>
</form>
    
</div>
</div>