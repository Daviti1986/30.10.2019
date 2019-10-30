<?php

include("./vendor/autoload.php");
use myapp\database;
use myapp\time;


$db= new database;
echo $db->connect();