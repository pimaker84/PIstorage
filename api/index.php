<?php

/* 
 * In theory, REST is not tied to the web, but its almost always implemented as such, and was inspired by HTTP.
 * As a result, REST can be used wherever HTTP can.
 * 
 * code ref: http://codewiz.biz/article/post/guide+to+building+a+rest+api+with+php+and+apache
 */
require_once ('../functions/functions.php');

require 'vendor/autoload.php';
$app = new \Slim\Slim();
 
$app->get('/', function() use($app) {
    $app->response->setStatus(200);
    echo "Welcome to Slim 3.0 based API";
}); 
 
$app->run();
?>
    
