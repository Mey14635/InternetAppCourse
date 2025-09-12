<?php
require 'Config.php';
//Database connection 
$mysqli=new mysqli($config['DB_HOST'],$config['DB_USER'],$config['DB_PASS'],$config['DB_NAME']);
if($mysqli->connect_error){
    echo "Failed to connect to MySQL: ".$mysqli->connect_error;
    exit();
}
else{
    echo "Connected to database successfully.<br>";
}
