<?php
include("../vendor/autoload.php");
use myapp\database;
use myapp\time;
//use myapp\disp;
//use myapp\run;




$app=Database::instance();
$app->addroute();
$app->run();
//$run=run();
//$run->run();
//$dispatch=addroute();
//$dispatch->addroute();
