<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class HelperController
{ 
    
public function createTblFilter($param)
    {
    $filtrosTbl = "";
    
    switch ($param["controlador"]){

    case "expediente":
        $filtrosTbl = $filtrosTbl. '<div class="body-filtros">';
        $attributes = array('class' => 'sky-form', 'id' => $param["formaId"]);
        $filtrosTbl = $filtrosTbl.form_open(base_url().$param["controlador"].'/paginarAX/', $attributes);       
        $filtrosTbl = $filtrosTbl. form_fieldset();
        $filtrosTbl = $filtrosTbl."<div class='row'>
                            <section class='col col-3'>
                                    <label class='input'>
                                            <i class='icon-append fa ".$param["f1Image"]."'></i>".
                                            form_input(array('class'       => 'validate[custom[onlyLetterNumber]] text-input', 
                                                             'name'        => 'f1', 
                                                             'id'          => 'f1',
                                                             'placeholder' =>  $param["f1Label"],                                                         
                                                             'maxlength'   => '30'))."                                         
                                    </label>
                            </section>
                             <section class='col col-3'>
                                    <label class='input'>
                                            <i class='icon-append fa ".$param["f6Image"]."'></i>".
                                            form_input(array('class'       => 'validate[custom[onlyLetterNumber]] text-input', 
                                                             'name'        => 'f6', 
                                                             'id'          => 'f6',
                                                             'placeholder' => $param["f6Label"],                                                         
                                                             'maxlength'   => '30'))."                                        
                                    </label>
                            </section>
                            <section class='col col-3'>
                                    <label class='input'>
                                            <i class='icon-append fa ".$param["f4Image"]."'></i>".
                                            form_input(array('class'       => 'validate[custom[onlyLetterNumber]] text-input', 
                                                             'name'        => 'f4', 
                                                             'id'          => 'f4',
                                                             'placeholder' => $param["f4Label"],                                                         
                                                             'maxlength'   => '30'))."                                        
                                    </label>
                            </section>
                            <section class='col col-3'>
                                    <label class='input'>
                                            <i class='icon-append fa ".$param["f5Image"]."'></i>".
                                            form_input(array('class'       => 'validate['.$param["f5Class1"].'] text-input '.$param["f5Class2"].'', 
                                                             'name'        => 'f5', 
                                                             'id'          => 'f5',
                                                             'placeholder' => $param["f5Label"],
                                                             'maxlength'   => '30'))."                                        
                                    </label>
                            </section>
                            </div>

                            <div class='row'>
                            <section class='col col-5'>
                                    <label class='input'>
                                            <i class='icon-append fa ".$param["f3Image"]."'></i>".
                                            form_input(array('class'       => 'validate[custom[onlyLetterNumber]] text-input', 
                                                             'name'        => 'f3', 
                                                             'id'          => 'f3',
                                                             'placeholder' => $param["f3Label"],                                                         
                                                             'maxlength'   => '30'))."                                        
                                    </label>
                            </section>
                            <section class='col col-5'>
                                    <label class='input'>
                                            <i class='icon-append fa ".$param["f7Image"]."'></i>".
                                            form_input(array('class'       => 'validate[custom[onlyLetterNumber]] text-input', 
                                                             'name'        => 'f7', 
                                                             'id'          => 'f7',
                                                             'placeholder' => $param["f7Label"],                                                         
                                                             'maxlength'   => '30'))."                                        
                                    </label>
                            </section>
                            <section class='col col-2'>
                                    <label class='input'>
                                            <i class='icon-append fa ".$param["f2Image"]."'></i>".
                                            form_input(array('class'       => 'validate['.$param["f5Class1"].'] text-input '.$param["f5Class2"].'', 
                                                             'name'        => 'f2', 
                                                             'id'          => 'f2',
                                                             'placeholder' => $param["f2Label"],
                                                             'maxlength'   => '30'))."                                        
                                    </label>
                            </section>
                            </div>

                            <div class='row'>                        
                            <section>
                                 <label class='label col col-1'>Status</label>
                                   <div class='inline-group'>"
                                           .$param["status"].
                                   "</div>
                                   <a class='button' href='javascript:submitFiltros(\"".$param["formaId"]."\",\"".$param["controlador"]."\",\"".$param["gridId"]."\",registrosPagina,href);'>Buscar</a>
                                   <a class='button button-secondary' href='javascript:resetFiltros(\"".$param["valorIniStatus"]."\");'>Limpiar</a>
                            </section>                        
                            </div>
            ";   
        $filtrosTbl = $filtrosTbl. form_fieldset_close();    
        $filtrosTbl = $filtrosTbl. form_close();
        $filtrosTbl = $filtrosTbl. '</div>';
        break;
    case "cotizacion":
        $filtrosTbl = $filtrosTbl. '<div class="body-filtros">';
        $attributes = array('class' => 'sky-form', 'id' => $param["formaId"]);
        $filtrosTbl = $filtrosTbl.form_open(base_url().$param["controlador"].'/paginarAX/', $attributes);       
        $filtrosTbl = $filtrosTbl. form_fieldset();
        $filtrosTbl = $filtrosTbl."<div class='row'>
                            <section class='col col-6'>
                                    <label class='input'>
                                            <i class='icon-append fa ".$param["f1Image"]."'></i>".
                                            form_input(array('class'       => 'validate[custom[onlyLetterNumber]] text-input', 
                                                             'name'        => 'f1', 
                                                             'id'          => 'f1',
                                                             'placeholder' =>  $param["f1Label"],                                                         
                                                             'maxlength'   => '30'))."                                         
                                    </label>
                            </section>
                             <section class='col col-6'>
                                    <label class='input'>
                                            <i class='icon-append fa ".$param["f2Image"]."'></i>".
                                            form_input(array('class'       => 'validate[custom[onlyLetterNumber]] text-input', 
                                                             'name'        => 'f2', 
                                                             'id'          => 'f2',
                                                             'placeholder' => $param["f2Label"],                                                         
                                                             'maxlength'   => '30'))."                                        
                                    </label>
                            </section>
                            </div>

                            <div class='row'>
                            <section class='col col-6'>
                                    <label class='input'>
                                            <i class='icon-append fa ".$param["f3Image"]."'></i>".
                                            form_input(array('class'       => 'validate[custom[onlyLetterNumber]] text-input', 
                                                             'name'        => 'f3', 
                                                             'id'          => 'f3',
                                                             'placeholder' => $param["f3Label"],                                                         
                                                             'maxlength'   => '30'))."                                        
                                    </label>
                            </section>
                            <section class='col col-3'>
                                    <label class='input'>
                                            <i class='icon-append fa ".$param["f4Image"]."'></i>".
                                            form_input(array('class'       => 'validate[custom[onlyLetterNumber]] text-input', 
                                                             'name'        => 'f4', 
                                                             'id'          => 'f4',
                                                             'placeholder' => $param["f4Label"],                                                         
                                                             'maxlength'   => '30'))."                                        
                                    </label>
                            </section>
                            <section class='col col-3'>
                                    <label class='input'>
                                            <i class='icon-append fa ".$param["f5Image"]."'></i>".
                                            form_input(array('class'       => 'validate['.$param["f5Class1"].'] text-input '.$param["f5Class2"].'', 
                                                             'name'        => 'f5', 
                                                             'id'          => 'f5',
                                                             'placeholder' => $param["f5Label"],
                                                             'maxlength'   => '30'))."                                        
                                    </label>
                            </section>
                            </div>

                            <div class='row'>                        
                            <section>
                                 <label class='label col col-1'>Status</label>
                                   <div class='inline-group'>"
                                           .$param["status"].
                                   "</div>
                                   <a class='button' href='javascript:submitFiltros(\"".$param["formaId"]."\",\"".$param["controlador"]."\",\"".$param["gridId"]."\",registrosPagina,href);'>Buscar</a>
                                   <a class='button button-secondary' href='javascript:resetFiltros(\"".$param["valorIniStatus"]."\");'>Limpiar</a>
                            </section>                        
                            </div>
            ";   
        $filtrosTbl = $filtrosTbl. form_fieldset_close();    
        $filtrosTbl = $filtrosTbl. form_close();
        $filtrosTbl = $filtrosTbl. '</div>';        
        break;            
        
        }//switch
    return $filtrosTbl;
    }
        
        
public function createGrid($param)
    {


    }
}//helper controller
