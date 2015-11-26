



<?php

if(isset($_POST['upload'])){
    // file error 0 means no error
    
    if($_FILES['file_name']['error'] == 0){
        
    $file = $_FILES['file_name'];
    uploadedfile($file);   
    }
    
    
}

/*if(isset($_POST['upload'])){
    $destination = getcwd()."/storage";
    if($_FILES['file_name']['error'] == 0){
        
        $file = $_FILES['file_name'];
        
    // extract file properties
        $file_name = $file['name'];
        $file_location = getcwd();
        $file_size = $file['size'];
        $file_type = $file['type'];
        
        if(move_uploaded_file($_FILES['file_name']['tmp_name'], $_FILES['file_name']['name'])){
            $new_file = array(
                "name" => $file_name,
                "location" => $file_location,
                "type" => $file_type,
                "size" => $file_size
            );
            
            $mongocon = connecttoMongodb();
            $db = $mongocon->storage;
            $collection = $db->files;
            
            $collection->insert($new_file);
            
            $mongocon->close();
            
        }
        
        
    }
    
    
    
}*/



?>


<div class="row">
            <div class="col-lg-12">
                <form class="form-inline"  action="main.php?tab=storage&id=upload" method="post" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="file">Select a file to upload</label>
                    <input type="file" name="file_name">
                 
                  </div>
                    <input type="submit" name="upload" class="btn btn-lg btn-primary" value="Upload">
                </form>
            </div>
          </div>
