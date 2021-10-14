<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.1.6 or newer
 *
 * @package		CodeIgniter
 * @author		EllisLab Dev Team
 * @copyright		Copyright (c) 2008 - 2014, EllisLab, Inc.
 * @copyright		Copyright (c) 2014 - 2015, British Columbia Institute of Technology (http://bcit.ca/)
 * @license		http://codeigniter.com/user_guide/license.html
 * @link		http://codeigniter.com
 * @since		Version 1.0
 * @filesource
 */

// ------------------------------------------------------------------------

/**
 * CodeIgniter Application Controller Class
 *
 * This class object is the super class that every library in
 * CodeIgniter will be assigned to.
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @category	Libraries
 * @author		EllisLab Dev Team
 * @link		http://codeigniter.com/user_guide/general/controllers.html
 */
class CI_Controller {

	private static $instance;
        
        public $user        = NULL;
        public $dirFoto     = "images/team/";        
        public $myData      = NULL;

	/**
	 * Constructor
	 */
	public function __construct()
	{
		self::$instance =& $this;

		// Assign all the class objects that were instantiated by the
		// bootstrap file (CodeIgniter.php) to local class variables
		// so that CI can run as one big super object.
		foreach (is_loaded() as $var => $class)
		{
			$this->$var =& load_class($class);
		}

		$this->load =& load_class('Loader', 'core');

		$this->load->initialize();
		
		log_message('debug', "Controller Class Initialized");
	}

	public static function &get_instance()
	{
		return self::$instance;
	}
        
        public function validaSesion($ajax,$admin)
	{
		$this->user = $this -> session -> userdata('datos_sesion');		
												
		if( $this->user == NULL )
                    {
                           $data['titulos']  = array("navegador" => "SILTEX Comercializadora", 
                                                     "ventana"   => "SILTEX Comercializadora",
                                                     "frase"     => "\"Hacer de lo simple algo complicado es com&uacute;n; hacer de lo complicado algo simple, incre&iacute;blemente simple, es creatividad\" <br>- Charles Mingus",
                                                     "titulo"    => "Ingreso al Portal SILTEX Comercializadora");		
                            $msj              = "Su sesión ha expirado, favor de ingresar al portal nuevamente";
                            $data['usuario']  = "";
                            $data['iconuser'] = "";
                            $data['foto']     = "";
                            $data['sesion']   = $msj;
                            
                            if($ajax=== NULL)
                                {    
                                $this->load->view('login',$data);
                                die($this->output->get_output());
                                }
                            else
                                { return array("session" => "E","msj"=>$msj); }
                    }
                else{
                    $this->user = $this -> session -> userdata('datos_sesion');                		
                    if ($this->user['0']['tipo']=="2" & $admin===TRUE)
                    {
                            $msj              = "Usted no cuenta con los privilegios necesarios para accesar a la sección solicitada";
                            $data['usuario']  = "";
                            $data['iconuser'] = "";
                            $data['foto']     = "";
                            $data['sesion']   = $msj;
                            $data['titulos']  = array("navegador" => "SILTEX Comercializadora", 
                                          "ventana"   => "SILTEX Comercializadora",
                                          "frase"     => "\"Hacer de lo simple algo complicado es com&uacute;n; hacer de lo complicado algo simple, incre&iacute;blemente simple, es creatividad\" <br>- Charles Mingus",
                                          "titulo"    => "Ingreso al Portal SILTEX Comercializadora");		

                            if($ajax=== NULL)
                            {    
                                $this->load->view('login',$data);
                                die($this->output->get_output());
                            }
                            else
                                { return array("session" => "P","msj"=>$msj); }
                    }
                    else {
                            $this->session->sess_update();        
                            $this->session->userdata['last_activity'] = time();
                            $datos_sesion = $this -> session -> userdata('datos_sesion');
                            $this->session->set_userdata('datos_sesion', $datos_sesion);
                            
                            $this->myData['usuario']  = element('nombre', $this->user['0'])." ".element('apellidos', $this->user['0']);
                            $this->myData['tipo']     = element('tipo'  , $this->user['0']);
                            $this->myData['iconuser'] = '<img src="'.base_url().'images/user.png"/>';
                            $this->myData['foto']     = '<img width="35" heigth="35" class="img-circle" src="'.base_url().$this->dirFoto.element('foto', $this->user['0']).'"/>';
                            return TRUE;
                         }
                    }
        }
        
        
           public function createFilter($param)
        {
            $this->load->database('siltek_con');       
            $this->load->model('md_cotizador');
            $this->load->model('md_catalogo');
            $this->load->model('md_usuario');
            $this->load->library('session');            
            $this->load->library('table');
            $this->load->library('Utils');
            $this->load->helper('array');
            
            $data['titulos'] = $param['titulos'];
		
            $data['usuario']  = $this->myData=== true ? $this->myData['usuario'] : "" ;
            $data['iconuser'] = $this->myData=== true ? $this->myData['iconuser'] : "";
                        
            $tmpl = array ( 'table_open'  => '<table id="grid" class="display compact nowrap" style="width:100%">' );
            $this->table->set_template($tmpl);

            $this -> table -> set_heading($param["colBandeja"]);
            $this -> table->add_row(' ');

            $data['grid']            = $this->table->generate();
            $data['registrosPagina'] = $param["registrosPagina"];
            $data['controlador']     = $param["controlador"];
            $data['numColGrid']      = $param["numColGrid"];
            $data['mensajeConfirm']  = $param["mensajeConfirm"];

            $filtrosTbl = "";
            $filtrosTbl = $filtrosTbl.form_open(base_url().$param["controlador"].'/paginarAX/', array('class' => 'formular sky-form', 'id' => $param["formaId"]));
            $filtrosTbl = $filtrosTbl.'<fieldset><legend id="togfiltrosForm">[<i class="fa fa-plus" id="imgfiltrosForm"> </i>] Filtros de Busqueda </legend>';
            $filtrosTbl = $filtrosTbl.'<div id="filtrosForm">';
            $filtrosTbl = $filtrosTbl.'<div class="row">                          
                                        <section class="col col-4">
                                              <label class="label">'.$param["f1Label"].'</label>
                                              <label class="input"><i class="icon-append fa fa-search"></i>'.
                                              form_input(array('class' 	=> 'validate[custom[onlyLetterNumber]] text-input',
                                                                'name' 		=> 'f1', 
                                                                'id' 		=> 'f1',
                                                                'size' 	 	=> '15',
                                                                'value' 	=> NULL,
                                                                'maxlength' => '30')).'
                                               <b class="tooltip tooltip-bottom-right">Parametro de Búsqueda</b>
                                              </label>
                                          </section>
                                          <section class="col col-4">
                                              <label class="label">'.$param["f2Label"].'</label>
                                              <label class="input"><i class="icon-append fa fa-search"></i>'.
                                              form_input(array('class' 	=> 'text-input',
                                                                'name' 		=> 'f2', 
                                                                'id' 		=> 'f2',
                                                                'size' 	 	=> '15',
                                                                'value' 	=> NULL,
                                                                'maxlength' => '30')).'
                                               <b class="tooltip tooltip-bottom-right">Parametro de Búsqueda</b>
                                              </label>
                                          </section>
                                           <section class="col col-4">
                                              <label class="label">'.$param["f3Label"].'</label>
                                              <label class="input"><i class="icon-append fa fa-search"></i>'.
                                              form_input(array('class' 	=> 'text-input',
                                                                'name' 		=> 'f3', 
                                                                'id' 		=> 'f3',
                                                                'size' 	 	=> '15',
                                                                'value' 	=> NULL,
                                                                'maxlength' => '40')).'
                                               <b class="tooltip tooltip-bottom-right">Parametro de Búsqueda</b>
                                              </label>
                                          </section>';
            $filtrosTbl = $filtrosTbl.'</div>';
                             
            if($param["controlador"]=='gestion')
            {                
                 $filtrosTbl = $filtrosTbl.'<div class="row">                          
                                                <section class="col col-4">
                                                      <label class="label">Fecha de Alta '.$param["f4Label"].br(1).'De: </label>
                                                      <label class="input"><i class="icon-append fa fa-search"></i>'.
                                                      form_input(array('class' 	=> 'text-input datepicker',
                                                                        'name' 		=> 'fechaIni', 
                                                                        'id' 		=> 'fechaIni',
                                                                        'size' 	 	=> '8',
                                                                        'value' 	=> NULL,
                                                                        'maxlength' => '20')).'
                                                       <b class="tooltip tooltip-bottom-right">Parametro de Búsqueda tipo calendario</b>
                                                      </label>
                                                </section>
                                                <section class="col col-4">
                                                      <label class="label">'.br(1).'Hasta: </label>
                                                      <label class="input"><i class="icon-append fa fa-search"></i>'.
                                                      form_input(array('class' 	=> 'text-input datepicker',
                                                                        'name' 		=> 'fechaFin', 
                                                                        'id' 		=> 'fechaFin',
                                                                        'size' 	 	=> '8',
                                                                        'value' 	=> NULL,
                                                                        'maxlength' => '20')).'
                                                       <b class="tooltip tooltip-bottom-right">Parametro de Búsqueda tipo calendario</b>
                                                      </label>
                                                </section>
                                             </div>';
            }
            elseif($param["controlador"]=='pedido')
            {
                $filtrosTbl = $filtrosTbl.'<div class="row">                          
                                                <section class="col col-4">
                                                      <label class="label">Fecha de Alta '.br(1).'De: </label>
                                                      <label class="input"><i class="icon-append fa fa-search"></i>'.
                                                      form_input(array('class' 	=> 'text-input datepicker',
                                                                        'name' 		=> 'fechaIni', 
                                                                        'id' 		=> 'fechaIni',
                                                                        'size' 	 	=> '8',
                                                                        'value' 	=> NULL,
                                                                        'maxlength' => '20')).'
                                                       <b class="tooltip tooltip-bottom-right">Parametro de Búsqueda tipo calendario</b>
                                                      </label>
                                                </section>
                                                <section class="col col-4">
                                                      <label class="label">'.br(1).'Hasta: </label>
                                                      <label class="input"><i class="icon-append fa fa-search"></i>'.
                                                      form_input(array('class' 	=> 'text-input datepicker',
                                                                        'name' 		=> 'fechaFin', 
                                                                        'id' 		=> 'fechaFin',
                                                                        'size' 	 	=> '8',
                                                                        'value' 	=> NULL,
                                                                        'maxlength' => '20')).'
                                                       <b class="tooltip tooltip-bottom-right">Parametro de Búsqueda tipo calendario</b>
                                                      </label>
                                                </section>
                                                <section class="col col-4">
                                                      <label class="label">'.$param["f4Label"].': </label>
                                                      <label class="select"><i class="icon-append"></i>    
                                                      '.form_dropdown('f4',$param["f4Select"],"0",'id="f4"').'
                                                      </label>
                                                     <label class="label">'.$param["f7Label"].': </label>
                                                         '.form_radio(array("name"=>"f7","id"=>"f7","value"=>"USD")).'USD'.nbs(4).form_radio(array("name"=>"f7","id"=>"f7","value"=>"MXN")).'MXN
                                                 </section>          
                                             </div>
                                             <div class="row">
                                             <section class="col col-3">
                                                      <label class="label">'.$param["f5Label"].': </label>
                                                      <label class="select"><i class="icon-append"></i>    
                                                      '.form_dropdown('f5',$param["f5Select"],"0",'id="f5"').'
                                                      </label>
                                                 </section>     
                                                 <section class="col col-3">
                                                      <label class="label">'.$param["f6Label"].': </label>
                                                      <label class="select"><i class="icon-append"></i>
                                                      '.form_dropdown('f6',$param["f6Select"],"0",'id="f6"').'
                                                      </label>
                                                 </section>     
                                                <section class="col col-3">
                                                      <label class="label">'.$param["f8Label"].'De $: </label>
                                                      <label class="input"><i class="icon-append fa fa-search"></i>'.
                                                                    form_input(array('class'     => ' text-input datepicker', 
                                                                                    'name'      => 'deF8', 
                                                                                    'id'        => 'deF8',
                                                                                    'value'     =>  '',
                                                                                    'size'      =>  '4',
                                                                                    'maxlength' => '10')).'
                                                       <b class="tooltip tooltip-bottom-right">Parametro de Búsqueda tipo calendario</b>
                                                      </label>
                                                </section>
                                                <section class="col col-3">
                                                      <label class="label">Hasta $: </label>
                                                      <label class="input"><i class="icon-append fa fa-search"></i>'.
                                                                    form_input(array('class'     => ' text-input datepicker', 
                                                                                    'name'      => 'aF8', 
                                                                                    'id'        => 'aF8',
                                                                                    'value'     =>  '',
                                                                                    'size'      =>  '4',
                                                                                    'maxlength' => '10')).'
                                                       <b class="tooltip tooltip-bottom-right">Parametro de Búsqueda tipo calendario</b>
                                                      </label>
                                                </section>
                                             </div>';                
            }
            elseif($param["controlador"]=='usuario')
            { $filtrosTbl = $filtrosTbl.''; }
            elseif($param["controlador"]=='cotizador')
            {   $filtrosTbl = $filtrosTbl."<div class='row'>
                                             <section class='col col-3'>
                                                       <label class='label'>&nbsp;</label>
                                                        <label class='input'>
                                                                <i class='icon-append fa ".$param["f5Image"]."'></i>".
                                                                form_input(array('class'       => 'text-input', 
                                                                                'name'        => 'f5', 
                                                                                'id'          => 'f5',
                                                                                'placeholder' => $param["f5Label"],                                                         
                                                                                'maxlength'   => '30'))."                                        
                                                        </label>
                                            </section>
                                            <section class='col col-3'>
                                                    <label class='label'>Fecha de Alta</label>
                                                    <label class='input'>
                                                            <i class='icon-append fa fa-calendar'></i>".
                                                           form_input(array('class'     => ' text-input datepicker', 
                                                                                'name'      => 'fechaIni', 
                                                                                'id'        => 'fechaIni',
                                                                                'value'     =>  '',
                                                                                'size'      =>  '8',
                                                                                'placeholder' => "De:",
                                                                                'maxlength' => '20'))."                                         
                                                    </label>
                                            </section>
                                            <section class='col col-3'>
                                                    <label class='label'>&nbsp;</label>
                                                    <label class='input'>
                                                            <i class='icon-append fa fa-calendar'></i>".
                                                           form_input(array('class'     => ' text-input datepicker', 
                                                                                'name'      => 'fechaFin', 
                                                                                'id'        => 'fechaFin',
                                                                                'value'     =>  '',
                                                                                'size'      =>  '8',
                                                                                'placeholder' => "Hasta:",
                                                                                'maxlength' => '20'))."                                         
                                                    </label>
                                            </section>";
             $filtrosTbl = $filtrosTbl."<section class='col col-3'>
                                                    <label class='label'>".$param["f4Label"]."</label>
                                                    <label class='select'>".form_dropdown('f4',$param["f4Select"],"0",'id="f4"')." 
                                                    <i></i>                             
                                                    </label>
                                        </section>"; 
             
             $filtrosTbl = $filtrosTbl."</div>";
            }
            else
            {    $filtrosTbl = $filtrosTbl.'<div class="row">                          
                                                <section class="col col-4">
                                                      <label class="label">Fecha de Alta '.br(1).'De: </label>
                                                      <label class="input"><i class="icon-append fa fa-search"></i>'.
                                                      form_input(array('class' 	=> 'text-input datepicker',
                                                                        'name' 		=> 'fechaIni', 
                                                                        'id' 		=> 'fechaIni',
                                                                        'size' 	 	=> '8',
                                                                        'value' 	=> NULL,
                                                                        'maxlength' => '20')).'
                                                       <b class="tooltip tooltip-bottom-right">Parametro de Búsqueda tipo calendario</b>
                                                      </label>
                                                </section>
                                                <section class="col col-4">
                                                      <label class="label">'.br(1).'Hasta: </label>
                                                      <label class="input"><i class="icon-append fa fa-search"></i>'.
                                                      form_input(array('class' 	=> 'text-input datepicker',
                                                                        'name' 		=> 'fechaFin', 
                                                                        'id' 		=> 'fechaFin',
                                                                        'size' 	 	=> '8',
                                                                        'value' 	=> NULL,
                                                                        'maxlength' => '20')).'
                                                       <b class="tooltip tooltip-bottom-right">Parametro de Búsqueda tipo calendario</b>
                                                      </label>
                                                </section>
                                                <section class="col col-4">
                                                      <label class="label">'.$param["f4Label"].nbs().' </label>
                                                      <label class="select"><i class="icon-append"></i>
                                                      '.form_dropdown('f4',$param["f4Select"],"0",'id="f4"').'
                                                      </label>    
                                                 </section>          
                                             </div>';
            }
            $filtrosTbl = $filtrosTbl.'<div class="row">'
                                    . '<section class="col col-4">';  
            $filtrosTbl = $filtrosTbl.'<a class="button color" href="javascript:submitFormFiltros(\''.$param["formaId"].'\',\''.$param['controlador'].'\',\''.$param['numColGrid'].'\',\''.$param['registrosPagina'].'\',\''.  base_url().'\');"><span>Buscar</span></a>'
                                      . '</secton><section class="col col-4">';            
            $filtrosTbl = $filtrosTbl.nbs(1).'<a class="button color" href="javascript:submitFormReset(\''.$param["formaId"].'\')"><span>Limpiar</span></a>';
            $filtrosTbl = $filtrosTbl.'</secton></div>';
            $filtrosTbl = $filtrosTbl.'</div>';
            $filtrosTbl = $filtrosTbl.'</fieldset>'.form_close();

            $data['filtrosTbl']  = $filtrosTbl ;        
            $data['accion']      = $param["accion"];
            $data['tipo']        = $param["tipo"];    
                
            return $data;
        }
        
}
// END Controller class

/* End of file Controller.php */
/* Location: ./system/core/Controller.php */