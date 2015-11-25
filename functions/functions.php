<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once('db_connections/connect.php');



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