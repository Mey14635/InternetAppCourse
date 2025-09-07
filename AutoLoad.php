<?php
require 'Config.php';
//specify directories to search for classes
$directory=array("Global","Layouts","Forms" ,);
spl_autoload_register(function($class_name) use ($directory){
    foreach($directory as $dir){
       
        if(file_exists($dir."/".$class_name.".php")){
            require $dir."/".$class_name.".php";
        
        }
    }
});
//create instances without manually including their files 
$simple=new Simple();
$layouts=new Layouts();
$forms=new Forms(); 
?>