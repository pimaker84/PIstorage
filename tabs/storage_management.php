

<div class="sidebar-brand">
    <ul class="sidebar-nav">
        <li><a href="main.php?tab=storage&id=make_dir">Add Directory</a></li>
        <li><a href="main.php?tab=storage&id=upload">Upload File</a></li>
        <li><a href="main.php?tab=storage&id=show">Show Files</a></li>
      
    </ul>
</div>



<?php

 if(isset($_GET['id'])){
        
        $element = $_GET['id'];
        
        if($element == 'make_dir'){
           
            include 'elements/create_dir.php';                  
        }
        if($element == 'upload'){
            
            include 'elements/upload_file.php';
        }
        if($element =='show'){
            include 'elements/show.php';
        }
       
    }
?>