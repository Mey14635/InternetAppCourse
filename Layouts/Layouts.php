<?php
require 'Config.php';
class Layouts {
    public function Header($config){
        
        echo "<header><h1>".$config['site_name']."</h1></header>";    
    }
    public function Footer($config) {

        echo "<footer>
        <p>Copyright &copy; ".$config['site_name']." ".date("Y")." All rights reserved</p>
        </footer>";
    }
}
?>
