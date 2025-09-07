<?php
//include the class file
require 'AutoLoad.php';
//create instances
$layouts->header($config);  
$forms->signin();
$layouts->footer($config);

?>