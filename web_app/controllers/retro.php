<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Retro extends CI_Controller {

public $user = NULL;
	
public function __construct()
{
	parent::__construct();
	
	$this->load->database('MySQL_Conn');
	$this->load->model   ('md_retro');
	$this->load->model   ('md_pedido');
	$this->load->library ('session');	
	$this->load->library ('table');
	$this->load->library ('Utils');
        $this->load->helper  ('array');
}
	
public function encuesta($id_pedido=0)
{		
        $data['titulos']  = array("navegador" => TITULO_NAVEGADOR, 
                                          "ventana"   => TITULO_VENTANA,
                                          "frase"     => "\"Hacer de lo simple algo complicado es com&uacute;n; hacer de lo complicado algo simple, incre&iacute;blemente simple, es creatividad\" <br>- Charles Mingus",
                                          "titulo"    => "Ingreso al Portal ".TITULO_NAVEGADOR);
	$data['encuesta']  = TRUE;
	$data['id_pedido'] = $id_pedido;
	
	$this->load->view('vw_lg_retro',$data);					
}
	
public function guardar()
{		
        $data['titulos']  =array("navegador" => TITULO_NAVEGADOR, 
                                          "ventana"   => TITULO_VENTANA,
                                          "frase"     => "\"Hacer de lo simple algo complicado es com&uacute;n; hacer de lo complicado algo simple, incre&iacute;blemente simple, es creatividad\" <br>- Charles Mingus",
                                          "titulo"    => "Ingreso al Portal ".TITULO_NAVEGADOR);
							 
	$this->load->helper('date');
			 
	$hoy 			  = date('Y-m-d H:i:s');	
	$calidad_servicio = $this -> input -> post('calif');
	$comentarios 	  = $this -> input -> post('comen');
	$sugerencias 	  = $this -> input -> post('sugerencia');
	$id_pedido 	  = $this -> input -> post('id_pedido');
        $correo           = "";
	
	$this ->  md_retro -> insert_retro($id_pedido,$correo,$calidad_servicio,$comentarios,$sugerencias,$hoy);
			
	$data['encuesta'] = FALSE;
	
	$this->load->view('vw_lg_retro',$data);		
 
}

public function noti($num_guia)
{		
	$this->validaSS();	
	$data['usuario'] = element('nombre', $this->user['0'])." ".  element('apellidos', $this->user['0']);
	$data['iconuser'] = '<img src="'.base_url().'images/user.png"/>';
	
	$this -> md_pedido -> notificacionRevisada($num_guia,element('correo', $this->user['0']));
				
	$this->pg_coti(0,"");

}

private function validaSS()
	{
		$this->user = $this -> session -> userdata('datos_sesion');
		$data['titulos']  = array("navegador" => TITULO_NAVEGADOR, 
                                          "ventana"   => TITULO_VENTANA,
                                          "frase"     => "\"Hacer de lo simple algo complicado es com&uacute;n; hacer de lo complicado algo simple, incre&iacute;blemente simple, es creatividad\" <br>- Charles Mingus",
                                          "titulo"    => "Ingreso al Portal ".TITULO_NAVEGADOR);
												
		if( $this->user == NULL)
		{
			$data['sesion'] = "Su sesión ha expirado";
			$this->load->view('vw_lg_gestion',$data);
			die($this->output->get_output());
		}
		else		
			if ($this->user['0']['tipo']=="C")
			{
				$data['sesion'] = "Usted no cuenta con los privilegios necesarios para accesar a la sección
								   solicitada";
				$this->load->view('vw_index',$data);
				die($this->output->get_output());
			}
	}

public function consultar()
{		
	$this->validaSS();	
	$data['usuario'] = element('nombre', $this->user['0'])." ".  element('apellidos', $this->user['0']);
	$data['iconuser'] = '<img src="'.base_url().'images/user.png"/>';
			
	$this->pg_coti(0,"");

}
	
public function pg_coti($offset=0)
{	
	$this->validaSS();
	$this -> load -> library('pagination');
        $data['titulos']  = array("navegador" => TITULO_NAVEGADOR, 
                                    "ventana"   => TITULO_VENTANA,
                                    "frase"     => "\"Hacer de lo simple algo complicado es com&uacute;n; hacer de lo complicado algo simple, incre&iacute;blemente simple, es creatividad\" <br>- Charles Mingus",
                                    "titulo"    => "Ingreso al Portal ".TITULO_NAVEGADOR);

	$data['usuario']  = element('nombre', $this->user['0'])." ".element('apellidos', $this->user['0']);
	$data['iconuser'] = '<img src="'.base_url().'images/user.png"/>';	
	
	$url_a_paginar = '/retro/pg_retro/';
	$registros_x_pagina = 10;		
					   	
	$retro = $this -> md_retro -> traeRetro($registros_x_pagina,$offset);
	
	$config['base_url'] = base_url().$url_a_paginar;
	$config['total_rows'] = $retro["conteo"];
	
	$config['per_page'] = $registros_x_pagina;
	$config['num_links'] = 5;
	
	$this -> pagination -> initialize($config);					
                    
	$data['links']   = $this -> pagination -> create_links();	
	$tmpl = array ( 'table_open'  => '<table id="datagrid" class="display compact" cellspacing="0" width="100%">' );
	$this->table->set_template($tmpl);
	 
	$header = array('','Fecha Alta','Pedido','Calificaci&oacute;n','Sugerencia','Comentario');
	$this -> table -> set_heading($header);
	
	$x = $offset;
	foreach($retro["registros"] as $row)
	{
		$x = $x + 1;
		$calidad = $this->utils->revisaValorVacio($row['calidad_servicio']);
		$calidadStr="";
		switch ($calidad) {
                        case 5: $calidadStr="Excelente";         break;
                        case 4: $calidadStr="Bueno";             break;
                        case 3: $calidadStr="Regular";           break;
                        case 2: $calidadStr="Malo";              break;
                        case 1: $calidadStr="Pesimo";            break;
                        case 0: $calidadStr="No hubo respuesta"; break;										
		}
		
		$celda1 = array('data'  => $x									   ,'align'=>"center");
	 	$celda2 = array('data'  => $row['fecha_alta'],'align'=>"center");		
		$celda3 = array('data'  => '<a href="'.base_url().'pedido/detalle/'.$row['id_pedido'].'">'.
								   $this->utils->revisaValorVacio($row['id_pedido']).'</a>','align'=>"center");
	 	$celda4 = array('data'  => $calidadStr,'align'=>"center");
		$celda5 = array('data'  => $this->utils->revisaValorVacio($row['sugerencias']),'align'=>"left");
		$celda6 = array('data'  => $this->utils->revisaValorVacio($row['comentarios']),'align'=>"left");

		$this->table->add_row(array($celda1, $celda2, $celda3, $celda4, $celda5, $celda6) );
	}
	
	$data['controlador'] = "reto";
	$data['orden']       = "desc";	
        
   $this->load->view('vw_lg_consulta',$data);
}
		
}

