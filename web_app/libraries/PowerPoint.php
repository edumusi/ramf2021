<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
  
require_once APPPATH."/third_party/PHPPowerPoint.php";
require_once APPPATH."/third_party/PHPPowerPoint/IOFactory.php";

  
class PowerPoint extends PHPPowerPoint { 
    public function __construct() { 
        parent::__construct(); 
    } 
}

?>