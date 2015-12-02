<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once ('../functions/functions.php');


$huj = "kutas hujowy";
$kut = sanitise($huj, 12);
echo $kut;