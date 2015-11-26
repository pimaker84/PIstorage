<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once('db_connections/connect.php');

/* 
 * Function that handels connection to a MySQL database
 */

function connecttoMysql()
{
    global $host, $username, $password, $dbname;
    
    try
    {
        $mysqli = new mysqli($host, $username, $password, $dbname);
        return $mysqli;
    }
    catch(Exception $e)
    {
        echo $e->getMessage();
        exit(0);
    }
}

/* 
 * Function that handels connection to a MongoDB database
 */

function connecttoMongodb()
{
    try
    {
       $mongodb = new MongoClient();
       return $mongodb;
    }
    catch (Exception $e)
    {
       echo $e->getMessage();
       exit(0);
    }
 
}


function scandirectory($dir)
{
    // create an array for directory content
    
    $dir_content = array();
    
    if(file_exists($dir)){
        foreach (scandir($dir) as $f){
            if(!$f || $f[0] == '.'){
                continue;
            }
            
            if(is_dir($dir . '/' . $f)){
                $dir_content[] = array(
                    "name" => $f,
                    "type" => "folder",
                    "path" => $dir . '/' .$f,
                    "items" => scandirectory($dir . '/' . $f)   
                );
            }
            else {
                $dir_content[] = array(
                    "name" => $f,
                    "type" => "file",
                    "path" => $dir . '/' . $f,
                    "size" => filesize($dir . '/' . $f)
                );
            }
            
        }
    }
    return $dir_content;
}


function uploadedfile($file)
{   
    chdir( "./storage" );
    $destination = getcwd();
    $filename = $file['name'];
    $file_tmp = $file['tmp_name'];
    //array that will show the file extension after .
    
    //move from the temp to actual
    if(move_uploaded_file($file['tmp_name'], $destination .'/'. $filename)){
        savetomongo($file);
    }
   


}
//works savage, dont forget to enlarge the file size in ini
function savetomongo($file)
{
   $mongocon = connecttoMongodb();
   
    
   $file_det = explode('.', $file['name']);
   $file_name = current($file_det);
   $file_ext = end($file_det);
   
   $document = array(
       "name" => $file_name,
       "full_name" => $file['name'],
       "extension" => $file_ext,
       "size" => $file['size'],
       "location" => getcwd(),
       "type" => $file['type']
   );
   
   
   // mongo stuff
   $db = $mongocon->storage;
   $collection = $db-> files;
   $collection->insert($document);
   
   $mongocon->close();
  
}
