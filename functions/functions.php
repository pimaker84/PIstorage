<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once('db_connections/connect.php');
require_once 'defines.php';

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


/**
 * Function to login for the admin
 * Function return true if the admin
 * is successfully identified using provided
 * username and password, Otherwise return false.
 *
 * @param $username
 * @param $password
 * @return true if successful login, otherwise false.
 */
function login($username, $password)
{
    $mysqli = connecttoMysql();
    
   $username = sanitise($username, 40); 
   $password = sanitise($password, 40);
    //$password = sha1($password);
    $result = false; 
    
    //check if there is an error connecting to database
    if($mysqli->connect_errno)
        echo "Failed to connect to MySql:-> " .  $mysqli->connect_error;

    /* Create and execute statement to get the result set/Statement Object */
    if($stmt = $mysqli->query("SELECT username, password FROM users WHERE username = '$username' AND password = '$password'"))
    {
        //iterator to match the results
        while($row = $stmt->fetch_array(MYSQLI_ASSOC))
        {
            if($row['username'] == $username && $row['password'] == $password)
            {
                $result = true;
                break;
            }
        }
    }
    else
    {
        echo "Error -> " . $mysqli->error;
        $result = false; 
    }
    
    $mysqli->close();
    
    return $result;
}

// function that scans given directory and returns all files and folders contained within directory
function scandirectory($dir)
{
    // create an array for directory content
    
    $dir_content = array();
    
    if(file_exists($dir)){
        foreach (scandir($dir) as $f){
            if(!$f || $f[0] == '.'){
                continue;
            }
            
            if(is_dir($dir . DS . $f)){
                $dir_content[] = array(
                    "name" => $f,
                    "type" => "folder",
                    "path" => $dir . DS .$f,
                    "items" => scandirectory($dir . DS . $f)   
                );
            }
            else {
                $dir_content[] = array(
                    "name" => $f,
                    "type" => "file",
                    "path" => $dir . DS . $f,
                    "size" => filesize($dir . DS . $f)
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



/**
* Function to Sanitize or clean to avoid SQL Injections
* Even after this cleaning and house-keeping, Parameter
* binding is used with MySqLI Prepare statements to ensure
* there will be no SQL Injections. 
* 
* @param $string - string to be cleaned
* @param $max - maximum length of string
*/
function sanitise($string, $max)
{
   //preserved only needed characters
   $string = substr($string, 0, $max);

   //strip html                     
   $string = strip_tags($string);

   //convert entities special characters
   $string = htmlspecialchars($string);

   //remove white spaces
   $string = trim(rtrim(ltrim($string)));

   return $string;
}

/**
* 
* 
* 
* @param 
*/
function dirnavigator()
{
    
}