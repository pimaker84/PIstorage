<?php


$dir = ("storage");
chdir($dir);

//returns an array of all files and folders within given directory

$directories = scandir(dirname($dir));
echo '<pre>';
print_r($directories);
echo '</pre>';
