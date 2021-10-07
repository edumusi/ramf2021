<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Cartero
 *
 * @author edumu
 */
class GestorExcel {
    
    var $name;
    var $icon;
    var $path;
    var $data;
    var $columnsTitles;
    var $objPHPExcel;
   
    
function __construct()
{        

}
    
public function setname($param)
{ $this->name = $param; }

public function getname()
{ return $this->name; }

public function seticon($param)
{ $this->icon = $param; }

public function geticon()
{ return $this->icon; }

public function getpath()
{ return $this->path; }

public function setpath($param)
{ $this->path = $param; }

public function setdata($param)
{ $this->data = $param; }

public function getdata()
{ return $this->data; }

public function setcolumnsTitles($param)
{ $this->columnsTitles = $param; }

public function getcolumnsTitles()
{ return $this->columnsTitles; }


public function generaReportaIVA()
{	
try{    	
    $objPHPExcel = new PHPExcel();

    if (file_exists( $this->path + $this->name) )
        unlink( $this->path + $this->name);
        
    return $this->name;

   }catch (Exception $e) { log_message('error', "Excepción generaReportaIVA:" . $e->getMessage()); }            
}

}//CLASS