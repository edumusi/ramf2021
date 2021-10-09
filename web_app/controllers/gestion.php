<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gestion extends CI_Controller {

	public  $user               = NULL;
	private $dirPlantillas      = "plantillas/";
	private $registros_x_pagina = 10;
	private $output_dir = "adjuntos/";
               
	
public function __construct()
    {
        parent::__construct();
        $this->load->database('MySQL_Conn');	
        $this->load->model   ('md_usuario'); 
		$this->load->model   ('md_cliente');        
		$this->load->model   ('md_pedido');       
		$this->load->library ('session');
		$this->load->helper  ('array');
		$this->load->library ('table');
		$this->load->library ('Utils');
    }
	
	private function validaSS()
	{
		$this->user = $this -> session -> userdata('datos_sesion');
		$data['titulos']  = array("navegador" => TITULO_NAVEGADOR, 
                                 "ventana"   => TITULO_VENTANA,
                          "frase"     => "\"Hacer de lo simple algo complicado es com&uacute;n; hacer de lo complicado algo simple, incre&iacute;blemente simple, es creatividad\" <br>- Charles Mingus",
                          "titulo"    => "Ingreso al Portal ".TITULO_VENTANA);		
												
		if( $this->user == NULL )
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
			
	public function download($id_pedido,$filename)
	{
		$this->load->helper('download');			

		$data = file_get_contents("./adjuntos/".$id_pedido."/".$filename, true);

		force_download($filename, $data);		
	}
	
	
	
	public function index()
	{
		$data['titulos']  = array("navegador" => TITULO_NAVEGADOR, 
                                          "ventana"   => TITULO_VENTANA,
                                          "frase"     => "\"Hacer de lo simple algo complicado es com&uacute;n; hacer de lo complicado algo simple, incre&iacute;blemente simple, es creatividad\" <br>- Charles Mingus",
                                          "titulo"    => "Ingreso al Portal ".TITULO_VENTANA);		
                $data['sesion'] = NULL;
		$this->load->view('vw_lg_gestion',$data);	
	}
			
	
	public function login()
	{		
        $this->load->library('form_validation');

        $this->form_validation->set_rules('usuario', 
                                          'Usuario', 
                                          'required|trim|min_length[4]');
        $this->form_validation->set_rules('pwd',
                                          'Contraseña', 
                                          'required|alpha_dash|trim|min_length[4]|'.
                                          'callback_autenticar['.$this->input->post('usuario').']');        
 
        $this->form_validation->set_message('required', 'Campo %s requerido');
	$this->form_validation->set_message('alpha_dash', 'El campo %s tiene caractres no permitidos');
	$this->form_validation->set_message('min_length', 'El Campo %s debe tener un minimo de %d Caracteres');
	   
	if ($this->form_validation->run() == FALSE)        
           { $this->index();      }
        else
			{
				$data['titulos']  = array("navegador" => TITULO_NAVEGADOR, 
                                          "ventana"   => TITULO_VENTANA,
                                          "frase"     => "\"Hacer de lo simple algo complicado es com&uacute;n; hacer de lo complicado algo simple, incre&iacute;blemente simple, es creatividad\" <br>- Charles Mingus",
                                          "titulo"    => "Ingreso al Portal ".TITULO_VENTANA);		
										 
				$data['usuario'] = element('nombre', $this->user['0'])." ".  element('apellidos', $this->user['0']);
				$data['iconuser'] = '<img src="'.base_url().'images/user.png"/>';
				$data['sesion'] = NULL;
				$this->load->view('vw_index',$data);
			}									
	}

	public function portal()
        {
        $data['titulos']  = array("navegador" => TITULO_NAVEGADOR, 
                                  "ventana"   => TITULO_VENTANA,
                                  "frase"     => "\"Hacer de lo simple algo complicado es com&uacute;n; hacer de lo complicado algo simple, incre&iacute;blemente simple, es creatividad\" <br>- Charles Mingus",
                                  "titulo"    => "Ingreso al Portal ".TITULO_NAVEGADOR);		

        $data['usuario'] = element('nombre', $this->user['0'])." ".  element('apellidos', $this->user['0']);
        $data['iconuser'] = '<img src="'.base_url().'images/user.png"/>';
        $data['sesion'] = NULL;
        $this->load->view('vw_index',$data);
        }
	
    public function autenticar($pwd, $usuario)
	{				
		$datos_sesion = $this->md_usuario->validaUsuario($usuario,$pwd);
				
		
		if ($datos_sesion==FALSE)							
			{
				$this->form_validation->set_message('autenticar', 'Usuario y/o Contraseña son incorrectos');
				 return FALSE;
			}	
		else
			{
				$this->session->set_userdata('datos_sesion', $datos_sesion);
				$this->user = $this->session->userdata('datos_sesion');															
				return TRUE;
			}
	}
	



public function nuevocliente()
{	
	$this->validaSS();
	$this->load->model('md_cotizador'); 
	 
	$mensajeConfirm = "";
	
	$data['usuario'] = element('nombre',$this->user['0'])." ".element('apellidos', $this->user['0']);
	$data['iconuser'] = '<img src="'.base_url().'images/user.png"/>';
	
	$data['titulos']  = array("navegador" => TITULO_NAVEGADOR, 
                                  "ventana"   => TITULO_VENTANA,
                                 "frase"     => "\"Hacer de lo simple algo complicado es com&uacute;n; hacer de lo complicado algo simple, incre&iacute;blemente simple, es creatividad\" <br>- Charles Mingus",
                                 "titulo"	 => "Formulario para ingresar a un nuevo Cliente");
							
	$data['accion'] 	  = "N";
	$data['cotizaciones'] = $this -> md_cotizador -> poblarSelect();
        $data['cliente']      = array('datos' => array(array('rfc'=>NULL, 'razon_social'=>NULL, 'correo'=>NULL, 'calle'=>NULL, 'numero'=>NULL, 'colonia'=>NULL, 'delegacion'=>NULL, 'estado'=>NULL, 'pais'=>NULL, 'cp'=>NULL)), 'contactos' => array() );
	
	$this->load->view('vw_lg_frm_cliente',$data);						
}

public function editacliente($rfc)
{	
	$this->validaSS();
	$this->load->model('md_cotizador'); 
	 
	$mensajeConfirm = "";
	
	$data['usuario'] = element('nombre', $this->user['0'])." ".element('apellidos', $this->user['0']);
	$data['iconuser'] = '<img src="'.base_url().'images/user.png"/>';
	
	$data['titulos']  = array("navegador" => TITULO_NAVEGADOR, 
                                  "ventana"   => TITULO_VENTANA,
                          "frase"     => "\"Hacer de lo simple algo complicado es com&uacute;n; hacer de lo complicado algo simple, incre&iacute;blemente simple, es creatividad\" <br>- Charles Mingus",
                                "titulo"	 => "Formulario para actualizar a un Cliente");
							
	$data['accion']		  = "A";
	$data['cliente'] 	  = $this -> traeDetalleCliente($rfc);
	$data['cotizaciones']     = $this -> md_cotizador -> poblarSelect();
	
	$this->load->view('vw_lg_frm_cliente',$data);						
}


public function guardarcliente()
{	
	$this->validaSS();
	$mensajeConfirm = "";
	
	$data['usuario'] = element('nombre', $this->user['0'])." ".element('apellidos', $this->user['0']);
	$data['iconuser'] = '<img src="'.base_url().'images/user.png"/>';
	
	$data['titulos']  = array("navegador" => TITULO_NAVEGADOR, 
                                  "ventana"   => TITULO_VENTANA,
                          "frase"     => "\"Hacer de lo simple algo complicado es com&uacute;n; hacer de lo complicado algo simple, incre&iacute;blemente simple, es creatividad\" <br>- Charles Mingus",
                                 "titulo"    => "Formulario para ingresar a un nuevo cliente");
						
	$this -> load -> model('md_cliente');				
	$accion 		 = $this -> input -> post('accion');
	$rfc 			 = $this -> input -> post('rfc');
	$nombre_cliente          = $this -> input -> post('nombre_cliente');
	$correo_principal        = $this -> input -> post('correo_p');
	$calle 			 = $this -> input -> post('calle');
	$numero 		 = $this -> input -> post('numero');
	$colonia 		 = $this -> input -> post('colonia');
	$delegacion              = $this -> input -> post('delegacion');
	$estado 		 = $this -> input -> post('estado');
	$pais 			 = $this -> input -> post('pais');
	$cp 			 = $this -> input -> post('cp');
	$dias_vencimiento= $this -> input -> post('dias_vencimiento');
	
	
	if($accion == "N")
	{									
		$this -> md_usuario -> insert_usuario_cliente($correo_principal,$nombre_cliente);
		$this -> md_cliente -> insert_cliente($rfc,$nombre_cliente,$correo_principal,$calle,$numero,$colonia,$delegacion,$estado,$pais,$cp,$dias_vencimiento);
		$mensajeConfirm = ": <strong>".$nombre_cliente."</strong> registrado ex&iacute;tosamente";
	}
	else
	{
		$rfc_ant = $this -> input -> post('rfc_ant');
		$this -> md_cliente -> delete_dc($rfc_ant);
		$this -> md_cliente -> updateClientePedido($rfc_ant,$rfc);
   		$this -> md_cliente -> update_cliente($rfc_ant,$rfc,$nombre_cliente,$correo_principal,$calle,$numero,$colonia,$delegacion,$estado,$pais,$cp,$dias_vencimiento);
		$mensajeConfirm = ": <strong>".$nombre_cliente."</strong> actualizado ex&iacute;tosamente";
	}
		
		
	$contactos = $this -> input -> post('num_dc');	
	for ($x = 0; $x <= $contactos; $x++) 
	{
		$contacto = $this -> input -> post('contacto'.$x);
		$tel 	  = $this -> input -> post('tel'.$x);
		$correo	  = $this -> input -> post('correo'.$x);
		if($contacto != "")
                    {$this ->  md_cliente -> insert_dc($rfc,$contacto,$tel,$correo);}
	}
			
	$this->consultaclientes($mensajeConfirm);
}


public function dc($rfc=0)
{
	$this->validaSS();
	$data['titulos']  = array("navegador" => TITULO_NAVEGADOR, 
                                 "ventana"   => TITULO_VENTANA,
                          "frase"     => "\"Hacer de lo simple algo complicado es com&uacute;n; hacer de lo complicado algo simple, incre&iacute;blemente simple, es creatividad\" <br>- Charles Mingus",
							 "titulo"    => "Detalle del cliente con RFC ".$rfc);
		
	$data['usuario'] = element('nombre', $this->user['0'])." ".element('apellidos', $this->user['0']);
	$data['iconuser'] = '<img src="'.base_url().'images/user.png"/>';
		
	$data['cliente'] = $this->traeDetalleCliente($rfc);
		
	$this->load->view('vw_lg_detalle_cliente',$data);
	
}

public function consultaclientes($mensajeConfirm="")
    {
     try{
            $this->validaSS();

            $param = array("titulo"          => "Cat&aacute;logo de Clientes",
                           "titulos"         =>array("navegador" => TITULO_NAVEGADOR, 
                                                    "ventana"   => TITULO_VENTANA,
                                                    "frase"     => "\"Hacer de lo simple algo complicado es com&uacute;n; hacer de lo complicado algo simple, incre&iacute;blemente simple, es creatividad\" <br>- Charles Mingus",
                                                    "titulo"    => "Cat&aacute;logo de Clientes "),
                           "colBandeja"      => array('','Raz&oacute;n Social','RFC', 'Correo Principal','Fecha de Alta', 'Acciones'),
                           "registrosPagina" => $this->registros_x_pagina,
                           "controlador"     => "gestion",
                           "numColGrid"      => "6",
                           "formaId"         => "filtrosCl",
                           "f1Label"         => "Raz&oacute;n Social",
                           "f1Image"         => "fa-user",
                           "f2Label"         => "RFC",
                           "f2Image"        => "fa-user",
                           "f3Label"         => "Correo Principal",
                           "f3Image"         => "fa-envelope-o",
                           "f4Label"         => "",
                           "f4Select"        => NULL,
                           "accion"          => "nuevocliente",
                           "tipo"            => "Cliente",
						   "mensajeConfirm"  => $mensajeConfirm
                          );

            $data = $this->createFilter($param);				  				        	     
            $data['usuario']  = element('nombre', $this->user['0'])." ".  element('apellidos', $this->user['0']);
            $data['iconuser'] = '<img src="'.base_url().'images/user.png"/>';
	
            $this->load->view('vw_lg_fil_pag',$data);
            
        } catch (Exception $e) {echo ' consultaclientes Excepción: ',  $e->getMessage(), "\n";}		
    }
                       
        
    public function paginarAX()
    {
        try{                        
            $pagina   = $this -> input -> post('pagina');
            $f1       = $this -> input -> post('f1');
            $f2       = $this -> input -> post('f2');
            $f3       = $this -> input -> post('f3');
            $f4       = $this -> input -> post('f4');
            $fechaIni = $this -> input -> post('fechaIni');
            $fechaFin = $this -> input -> post('fechaFin');
                         
            $grid = $this -> md_cliente-> traeClientesFiltros($this->registros_x_pagina,$pagina,$f1,$f2,$f3,$f4,$fechaIni,$fechaFin);            
            
            echo json_encode ($grid);                          
            
        } catch (Exception $e) {echo ' paginarAX Excepción: ',  $e->getMessage(), "\n";}		
    }

public function pg_clientes($offset=0, $mensajeConfirm=""){
		
		$this->validaSS();
		$this -> load -> library('pagination'); 
		
		$data['titulos']  = array("navegador" => TITULO_NAVEGADOR, 
                                           "ventana"   => TITULO_VENTANA,
                                          "frase"     => "\"Hacer de lo simple algo complicado es com&uacute;n; hacer de lo complicado algo simple, incre&iacute;blemente simple, es creatividad\" <br>- Charles Mingus",
					  "titulo"    => "Cat&aacute;logo de Clientes ".$mensajeConfirm);
		
		$data['usuario'] = element('nombre', $this->user['0'])." ".element('apellidos', $this->user['0']);
		$data['iconuser'] = '<img src="'.base_url().'images/user.png"/>';
												
		$registros_x_pagina = 10;				                     
						
		$clientes = $this -> md_cliente -> traeClientes($registros_x_pagina,$offset);
		
		$config['base_url']    = base_url().'/gestion/pg_clientes/';
		$config['total_rows']  = $clientes["conteo"];
		$config['per_page']    = $registros_x_pagina;
		$config['num_links']   = 10;	     	
						
	    $this->pagination->initialize($config);

	    $data['links']    = $this -> pagination -> create_links();				
				
		$tmpl = array ( 'table_open'  => '<table id="datagrid" class="display compact nowrap" style="width:100%">' );
		$this->table->set_template($tmpl);
         
        $header = array('','Raz&oacute;n Social','RFC', 'Correo Principal','Fecha de Alta', 'Acciones');

        $this -> table -> set_heading($header);
					
		$x = $offset;
		foreach($clientes["registros"] as $row)
		{	
			$x = $x + 1;
			$celda1 = array('data'  => $x									   ,'align'=>"center");
			$celda2 = array('data'  => $this->utils->revisaValorVacio($row['razon_social']),
							'align' => "left",'width'=>"200px");
			$celda3 = array('data'  => $this->utils->revisaValorVacio($row['rfc']),'align'=>"center");
			$celda4 = array('data'  => $this->utils->revisaValorVacio($row['correo']),'align'=>"center");
			$celda5 = array('data'  => $this->utils->revisaValorVacio($row['fecha_alta']),'align'=>"center");	
			$celda6 = array('data'  => '<a href="'.base_url().'gestion/dc/'.$row['rfc'].'">
									   <img title="Detalle Cliente" src="'.base_url().'images/detail.png"></a>		
									   	&nbsp;&nbsp;&nbsp;'.
									   '<a href="'.base_url().'gestion/editacliente/'.$row['rfc'].'">
									   <img title="Editar Cliente" src="'.base_url().'images/edit.png"></a>
									   	&nbsp;&nbsp;&nbsp;');
//										.
//									   '<a href="javascript:confirmaBorrado('.$row['rfc'].')">',
//									   'align'=>"center");
											
			$this->table->add_row(array($celda1,
										$celda2,
										$celda3,
										$celda4,
										$celda5,
										$celda6)
										);
		}		
			
		$data['controlador'] = "gestion";
		$data['accion'] 	 = "nuevocliente";
		$data['tipo'] 		 = "Cliente";
		$data['orden'] 		 = "asc";	
        $this->load->view('vw_lg_consulta',$data);
    }

	
public function salir()
{
	
	$data['titulos']  = array("navegador" => TITULO_NAVEGADOR, 
                                  "ventana"   => TITULO_VENTANA,
                                          "frase"     => "\"Hacer de lo simple algo complicado es com&uacute;n; hacer de lo complicado algo simple, incre&iacute;blemente simple, es creatividad\" <br>- Charles Mingus",
                                          "titulo"    => "Ingreso al Portal ".TITULO_VENTANA);		
	$data['sesion'] = NULL;
        
	$this->load->view('vw_lg_gestion',$data);

}


public function plantillas($accion="",$offset=0)
{	
	$this->validaSS();
	
	$data['usuario']  = element('nombre',$this->user['0'])." ".element('apellidos', $this->user['0']);
	$data['iconuser'] = '<img src="'.base_url().'images/user.png"/>';
        $data['tipo']     = element('tipo',$this->user['0']);
	
	$data['titulos']  = array("navegador" => TITULO_NAVEGADOR, 
                                 "ventana"   => TITULO_VENTANA,
                                 "frase"     => "\"Hacer de lo simple algo complicado es com&uacute;n; hacer de lo complicado algo simple, incre&iacute;blemente simple, es creatividad\" <br>- Charles Mingus",
                                 "titulo"     => "Recursos disponibles",
                                "formulario" => "Material oficial de ".TITULO_VENTANA);
        
        
        $documentos    = array();	
							
	if (is_dir("./".$this->dirPlantillas)) 
            {
                if ($dh = opendir("./".$this->dirPlantillas)) 
                 {
                    while (($file = readdir($dh)) !== false) 
                        if($file != "." && $file != "..")
                        $documentos[] = array('nombre' => $file,
                                              'link'   => "gestion/plantilla/".$file,								 
                                             );
                                            
                    closedir($dh);
                  }
            }
            
	$data['documentos'] = $documentos;
        
	$this->load->view('vw_lg_plantillas',$data);						
}

public function plantilla($nombre)
{
        $this->load->helper('download');        

        $data = file_get_contents("./".$this->dirPlantillas.$nombre);

        force_download($nombre, $data);		
}

public function	agregarPlantillaAX()
{
	if(isset($_FILES["myfile"]))
	{
		$ret = array();		
		$error =$_FILES["myfile"]["error"];
		//You need to handle  both cases
		//If Any browser does not support serializing of multiple files using FormData() 
		if(!is_array($_FILES["myfile"]["name"])) //single file
		{
			$fileName = $_FILES["myfile"]["name"];
			move_uploaded_file($_FILES["myfile"]["tmp_name"],$this->dirPlantillas.$fileName);
			
			$ret[]= $fileName;
		}
		else  //Multiple files, file[]
		{
		  $fileCount = count($_FILES["myfile"]["name"]);
		  for($i=0; $i < $fileCount; $i++)
		  {
			$fileName = $_FILES["myfile"]["name"][$i];
			move_uploaded_file($_FILES["myfile"]["tmp_name"][$i],$this->dirPlantillas.$fileName);
			$ret[]= $fileName;
		  }
		
		}
		echo json_encode($ret);
	 }
}


public function	borrarPlantillaAX()
{

	if(isset($_POST["op"]) && $_POST["op"] == "delete" && isset($_POST['name']))
	{
		$fileName =$_POST['name'];
		$filePath = $this->dirPlantillas. $fileName;
		if (file_exists($filePath)) 		
			unlink($filePath);
		
		echo "Deleted File ".$fileName."<br>";
	}
}

public function	renombrarPlantillaAX()
{	
try{	 
        $this->load -> library ('Utils');
    
	$extension     = $this -> input -> post('extension');
	$nombreArchivo = $this -> input -> post('nombreArchivo');	
	
	$nombreArchivo = $nombreArchivo.".".$extension;
	$nombreSenni   = $this->utils->generaNombrePlantilla($nombreArchivo);

	$r = rename ($this->dirPlantillas.$nombreArchivo,$this->dirPlantillas.$nombreSenni);		
				
	echo json_encode (array("nombreSenni" => $nombreSenni,
                                "icon"        => "",
                                "link"        => $this->dirPlantillas . $nombreSenni
                                ));
	
	
	} catch (Exception $e) { log_message('error', 'renombrarPlantillaAX Excepción:'.$e->getMessage()); }
}

public function	borraPlantillaCargadaAX()
{	
try{	
	$extension     = $this -> input -> post('extension');
	$nombreArchivo = $this -> input -> post('nombreArchivo');	
	
	$nombreArchivo = $nombreArchivo.".".$extension;
	$filePath = $this->dirPlantillas.'/'.$nombreArchivo;

	if (file_exists($filePath)) 		
		 unlink($filePath);	
				
	echo json_encode (array("$nombreArchivo"   => $nombreArchivo));
		
	} catch (Exception $e) { log_message('error', 'renombraAdjuntoAX Excepción:'.$e->getMessage()); }
}

public function	validaCampoDuplicadoAX()
{
	$this->load->model('md_cliente');
	$repetido = NULL;
	$valor = $this -> input -> post('valor');// valor capturado por el usuario
	$campo = $this -> input -> post('campo');// rfc, correo, nombre
	$tipo  = $this -> input -> post('tipo');// cliente o proveedor o usuario
	
        if($tipo ==="usuario" )
        {
            if($repetido == FALSE)
		$duplicado = array("duplicado"  => FALSE);	
            else	
		$duplicado = array("duplicado"  => TRUE,
                                    "apellidos"   	=> $repetido["0"]["apellidos"],
                                    "nombre"   	=> $repetido["0"]["nombre"],
                                    "correo"   	=> $repetido["0"]["correo"]);
        }
        else
        {
	$repetido = $this -> md_cliente -> validaDuplicidad($tipo,$campo,$valor);
	if($tipo == "clientes" & $campo == "correo" & $repetido == FALSE)
            { $repetido = $this -> md_cliente -> validaDuplicidad("usuarios",$campo,$valor); }
			
	if($repetido == FALSE)
        { $duplicado = array("duplicado"  => FALSE);	}
	else	
        { $duplicado = array("duplicado"  => TRUE,
						   "rfc"   	=> $repetido["0"]["rfc"],
						   "nombre"   	=> $repetido["0"]["razon_social"],
						   "correo"   	=> $repetido["0"]["correo"],
						   "calle"   	=> $this->utils->revisaValorVacio($repetido["0"]["calle"]),
						   "numero"     => $this->utils->revisaValorVacio($repetido["0"]["numero"]),
						   "colonia"    => $this->utils->revisaValorVacio($repetido["0"]["colonia"]),
						   "cp"   	=> $this->utils->revisaValorVacio($repetido["0"]["cp"]),
						   "delegacion" => $this->utils->revisaValorVacio($repetido["0"]["delegacion"]),
						   "estado"     => $this->utils->revisaValorVacio($repetido["0"]["estado"]),
						   "pais"       => $this->utils->revisaValorVacio($repetido["0"]["pais"]),
						   "id_prove"   => $this->utils->revisaValorVacio($repetido["0"]["id_prove"]));	
        }
        }	
	echo json_encode ($duplicado);

//	$this->load->view('vw_ajax',$data);
}

public function	notificacionesAX()
{
	$this->load->model('md_pedido');	

	echo json_encode ($this -> md_pedido -> creaNotificaciones());
}
	
	
private function traeDetalleCliente($rfc)
	{
		$this -> load -> model('md_cliente');
		
		$cliente   = $this -> md_cliente  -> traeDetalleClientePorEn($rfc,"clientes","c","*");
		$contactos = $this -> md_cliente  -> traeDetalleClientePorEn($rfc,"dcc","d","*");		
				
		return array('datos' => $cliente, 'contactos' => $contactos);					 
	}
	

public function	contactoAX()
{
 try{	$this->load->library('Cartero');
        $cartero = new Cartero();
 
        $nameMSJ = $this -> input -> post('nameMSJ');
        $emailMSJ= $this -> input -> post('emailMSJ');
        $dimMSJ  = $this->input->post('dimMSJ')===NULL?"":"<p align='justify'>Dimensiones <strong>".$this->input->post('dimMSJ')."</strong></p>";
        $coMSJ   = $this->input->post('coMSJ' )===NULL?"":"<p align='justify'>Ciudad Origen <strong>".$this->input->post('coMSJ')."</strong></p>";
        $cdMSJ   = $this->input->post('cdMSJ' )===NULL?"":"<p align='justify'>Ciudad Destino <strong>".$this->input->post('cdMSJ')."</strong></p>";
        $msgMSJ  = $this->input->post('msgMSJ')===NULL?"":"<p align='justify'>".$this->input->post('msgMSJ')."</strong></p>";
        $freight_type= $this->input->post('freight_type')=="0"?"":"<p align='justify'>Freight Type <strong>".$this->input->post('freight_type')."</strong></p>";
        $terminoINCO = $this->input->post('terminoINCO' )=="0"?"":"<p align='justify'><strong>".$this->input->post('terminoINCO')."</strong></p>";
		
	$subject  = "Cotización Express";	
	$message  = '
	<html>
	<head>
	<title>'.TITULO_NAVEGADOR.'</title>
	</head>
	<body>
	<hr>	
	<p align="justify">
	El posible cliente de nombre:'.$nameMSJ.' con correo de contacto: '.$emailMSJ.'</p>
        <p align="justify">Solicita la siguiente cotización Express:</p>
	'.$dimMSJ.$coMSJ.$cdMSJ.$freight_type.$terminoINCO.$msgMSJ.'
	<p align="justify"><strong>Saludos Cordiales</strong></p>
	<hr>
	<p>
	<span style="font-family:\'arial black\',\'avant garde\';font-size:large;color:#888888">
	<strong>  '.RAZON_SOCIAL.' </strong></span>
	</p>
	<p><span style="font-family:\'arial black\',\'avant garde\';font-size:small">
	<strong><span style="color:#888888">
	Tel. '.TEL_CONTACTO.'</span></strong></span></p>
	<p><span style="font-family:\'arial black\',\'avant garde\';font-size:small">
	<strong><span style="color:#888888">Dir.&nbsp;<strong>
	'.CEL_CONTACTO.'</strong></span></strong>
	</span></p>		
	<p><span style="font-family:\'arial black\',\'avant garde\';font-size:small">
	<strong><span style="color:#888888">e-m. 
	<a href="mailto:'.CORREO_CONTACTO.'" target="_blank">
	<span class="il">
	'.CORREO_CONTACTO.'</span></a></span></strong></span></p>
	<p><span style="font-family:\'arial black\',\'avant garde\';font-size:small">
	<strong><span style="color:#888888"><a href="http://'.URL_SITE.'" target="_blank">
	'.URL_SITE.'</a></span></strong></span></p>
	</body>
	</html>
	';		
	$cartero->clearEmail();  
        $cartero->setfromName("Portal ".NOMBRE_CORTO);
        $cartero->setto      (CORREO_CONTACTO);
        $cartero->setsubject ($subject);
        $cartero->setmessage ($message);
        $cartero->mandaCorreo();

	$fromName = NOMBRE_CORTO;
	$subject  = "Contacto ".NOMBRE_CORTO;	
	$message2  = '
	<html>
	<head>
	<title>'.TITULO_NAVEGADOR.'</title>
	</head>
	<body>
	<hr>
	<p align="left" style="font-family:\'arial black\',\'avant garde\';font-size:12px"><strong>
	Estimado '.$nameMSJ.',</strong></p>
	<p align="justify">
	Hemos recibido la información solicitada, a la brevedad nos comunicarémos con usted.</p>
	<p align="justify">Muchas gracias por ponerse en contacto con nosotros</p><br><br>
	<p align="justify"><strong>Saludos Cordiales</strong></p>
	<hr>
	<p>
	<span style="font-family:\'arial black\',\'avant garde\';font-size:large;color:#888888">
	<strong> '.RAZON_SOCIAL.' </strong></span>
	</p>
	<p><span style="font-family:\'arial black\',\'avant garde\';font-size:small">
	<strong><span style="color:#888888">
	Tel. '.TEL_CONTACTO.'</span></strong></span></p>
	<p><span style="font-family:\'arial black\',\'avant garde\';font-size:small">
	<strong><span style="color:#888888">Dir.&nbsp;<strong>
	'.CEL_CONTACTO.'</strong></span></strong>
	</span></p>		
	<p><span style="font-family:\'arial black\',\'avant garde\';font-size:small">
	<strong><span style="color:#888888">e-m. 
	<a href="mailto:'.CORREO_CONTACTO.'" target="_blank">
	<span class="il">
	'.CORREO_CONTACTO.'</span></a></span></strong></span></p>
	<p><span style="font-family:\'arial black\',\'avant garde\';font-size:small">
	<strong><span style="color:#888888"><a href="http://'.URL_SITE.'" target="_blank">
	'.URL_SITE.'</a></span></strong></span></p>
	</body>
	</html>
	';		

        $cartero->clearEmail();  
        $cartero->setfromName($fromName);
        $cartero->setto      ($emailMSJ);
        $cartero->setsubject ($subject);
        $cartero->setmessage ($message2);
        $cartero->mandaCorreo();
        
        unset($cartero);
                
	echo json_encode (TRUE);  
         
 } catch (Exception $e) { log_message('error', 'manda contactoAX Excepción:'.$e->getMessage()); }

}

public function	boletinSusAX()
{
 try{
      $this->load->model('md_usuario');	

      echo json_encode ($this->md_usuario->insert_boletin($this->input->post('emailBOL')));
         
	} catch (Exception $e) { log_message('error', 'manda boletinSusAX Excepción:'.$e->getMessage()); }					        
}
/************************
 * recuperarPwdAX AX INI
 ************************/
public function recuperarPwdAX()
{
try{
    $this->load->model('md_usuario');	
				
	$exiteCuenta = $this -> md_usuario -> verificaCuenta($this -> input -> post('correo'));
			
	if($exiteCuenta == FALSE)
        { $existe = array("existe"  => FALSE);      }
	else
	{	
            $existe = array("existe"  => TRUE);                        
            $fromName = NOMBRE_CORTO;
            $subject  = "Recuperar contraseña portal ".NOMBRE_CORTO;	
            $message  = '
            <html>
            <head>
            <title>'.TITULO_NAVEGADOR.'</title>
            </head>
            <body>
            <hr>
            <p align="left" style="font-family:\'arial black\',\'avant garde\';font-size:12px"><strong>
            Estimado '.$exiteCuenta[0]['nombre'].' '.$exiteCuenta[0]['apellidos'].',</strong></p>
            <p align="justify">
            Hemos recibido la petición de recuperar su contraseña, para poder ingresar al portal de '.TITULO_VENTANA.', 
            a continuación le proporcionamos los siguientes datos:</p>
            <p align="center">
            <strong>Usuario: </strong>'.$exiteCuenta[0]['correo'].'<br>
            <strong>Contraseña:</strong>'.$exiteCuenta[0]['pwd'].'<br><br><br>
            <a href="'.base_url().'gestion/" target="_blank"><strong>
            Ingresar</strong></a><br>
            </p><br>
            <p align="justify"><strong>Saludos Cordiales</strong></p>
            <hr>
            <p>
            <span style="font-family:\'arial black\',\'avant garde\';font-size:large;color:#888888">
            <strong> '.RAZON_SOCIAL.' </strong></span>
            </p>
            <p><span style="font-family:\'arial black\',\'avant garde\';font-size:small">
            <strong><span style="color:#888888">
            Tel. '.TEL_CONTACTO.'</span></strong></span></p>
            <p><span style="font-family:\'arial black\',\'avant garde\';font-size:small">
            <strong><span style="color:#888888">Dir.&nbsp;<strong>
            '.CEL_CONTACTO.'</strong></span></strong>
            </span></p>		
            <p><span style="font-family:\'arial black\',\'avant garde\';font-size:small">
            <strong><span style="color:#888888">e-m. 
            <a href="mailto:'.CORREO_CONTACTO.'" target="_blank">
            <span class="il">
            '.CORREO_CONTACTO.'</span></a></span></strong></span></p>
            <p><span style="font-family:\'arial black\',\'avant garde\';font-size:small">
            <strong><span style="color:#888888"><a href="http://'.URL_SITE.'" target="_blank">
            '.URL_SITE.'</a></span></strong></span></p>
            </body>
            </html>
            ';
            $this->load->library('Cartero');
            $cartero = new Cartero();
            $cartero->clearEmail();  
            $cartero->setfromName($fromName);
            $cartero->setto      ($exiteCuenta[0]['correo']);
            $cartero->setsubject ($subject);
            $cartero->setmessage ($message);
            $cartero->mandaCorreo();
            unset($cartero);
       }
			
	echo json_encode ($existe);
	               
    
    } catch (Exception $e) { log_message('error', "Excepción pwdForgotAX: ".$e); }  
}        
        

public function facturacion($mensajeConfirm="")
{
try{
		$this->validaSS();
		$this->load->helper('date');
		$this->load->model ('md_sat');

		$param = array( "titulos"         => array("navegador" => TITULO_NAVEGADOR, 
												   "ventana"   => TITULO_VENTANA,
												   "frase"     => "\"Hacer de lo simple algo complicado es com&uacute;n; hacer de lo complicado algo simple, incre&iacute;blemente simple, es creatividad\" <br>- Charles Mingus",
												   "titulo"    => "Facturas ".$mensajeConfirm),
					    "colBandeja"      => array('','Referencia RAMF','RFC','Raz&oacute;n Social', 'Total','Moneda','Fecha', 'Acciones'),
						"registrosPagina" => $this->registros_x_pagina,						
						"numColGrid"      => "6",
						"formaId"         => "filtrosCl",
						"f1Label"         => "Referencia ".TITULO_VENTANA,
						"f1Image"         => "fa-user",
						"f2Label"         => "RFC",
						"f2Image"         => "fa-user",
						"f3Label"         => "Razón Social",
						"f3Image"         => "fa-user",
						"f4Label"         => "Tipo",
						"f4Select"        => array(array("name"=>"f4", "id"=>"f4", "value"=>"FT" , "label"=>"Facturas timbradas", "icon" => "<i class='fa fa-file-pdf-o'></i>"),
												   array("name"=>"f4", "id"=>"f4", "value"=>"FSI", "label"=>"Facturas con saldo insoluto", "icon" => "<i class='fa fa-usd'></i>"),
												   array("name"=>"f4", "id"=>"f4", "value"=>"FE" , "label"=>"Timbrar Embarque/REP", "icon" => "<i class='fa fa-truck'></i>")
							  					  ),
						"controlador"     => "gestion",
						"accion"          => "facturas",
						"tipo"            => "Factura",
						"mensajeConfirm"  => $mensajeConfirm
						);

		$data = $this->createFilterFacturas($param);

		$data['titulos']  = array("navegador" => TITULO_NAVEGADOR, 
                                  "ventana"   => TITULO_VENTANA,
                                  "frase"     => "\"Hacer de lo simple algo complicado es com&uacute;n; hacer de lo complicado algo simple, incre&iacute;blemente simple, es creatividad\" <br>- Charles Mingus",
					  			  "titulo"    => "Facturas ".$mensajeConfirm);		
		$data['usuario']  = element('nombre', $this->user['0'])." ".element('apellidos', $this->user['0']);
		$data['iconuser'] = '<img src="'.base_url().'images/user.png"/>';

		$data['adjuntos']  		 = array();
		$data['usoCFDI']         = $this->md_sat->traeDatosUsosCFDI();
		$data['regimenFiscal']   = $this->md_sat->traeDatosRegimenFiscal();
		$data['metodoPago']      = $this->md_sat->traeMetodoPago();
		$data['formaPago']       = $this->md_sat->traeFormaPago();
		$data['monedaSAT']       = $this->md_sat->traeMonedaSAT();
		$data['tipoRelacion']	 = $this->md_sat->traeTipoRelacionSAT();
		$data['tipoComprobante'] = $this->md_sat->traeTiposComprobantesSAT();
		$data['fechaExpedicion'] = date('d/m/Y');
		
		$this->load->view('vw_lg_facturacion',$data);
	
	} catch (Exception $e) { log_message('error', 'facturacion Excepción:'.$e->getMessage()); }			
		
}//FACTURACION

public function rnomina($msj='')
	{
         try{
            $this->validaSS();
			$this->load->model('md_usuario');
			$this->load->model ('md_sat');

            $param = array("titulo"          => "Cat&aacute;logo de Empleados ".$msj,
                           "titulos"         => array("navegador" => TITULO_NAVEGADOR, 
                                          			  "ventana"   => TITULO_VENTANA,
                                                      "frase"     => "\"Hacer de lo simple algo complicado es com&uacute;n; hacer de lo complicado algo simple, incre&iacute;blemente simple, es creatividad\" <br>- Charles Mingus",
                                                      "titulo"    => "Cat&aacute;logo de Empleados ".$msj),
                           "colBandeja"      => array('','Nombre','Puesto', 'Correo','Fecha de Alta', 'Acciones'),
                           "registrosPagina" => $this->registros_x_pagina,
                           "controlador"     => "usuario",
                           "numColGrid"      => "6",
                           "formaId"         => "filtrosCl",
                           "f1Label"         => "Nombre",
                           "f1Image"         => "fa-user",                           
                           "f2Label"         => "Correo",
                           "f2Image"         => "fa-envelope-o",
						   "f3Label"         => "Puesto",
                           "f3Select"        => $this->md_usuario->traePuestos(),                           
                           "mensajeConfirm"  => $msj
                          );
            
            $data = $this->createFilterRNomina($param);				  				        	     
            $data['usuario']  = element('nombre', $this->user['0'])." ".  element('apellidos', $this->user['0']);
            $data['iconuser'] = '<img src="'.base_url().'images/user.png"/>';

			$data['fechaExpedicion']  = date('d/m/Y');
			$data['regimenFiscal']    = $this->md_sat->traeDatosRegimenFiscal();
			$data['nominaBanco']   	  = $this->md_sat->traeNominaBancoSAT();
			$data['periodicidadPago'] = $this->md_sat->traeNominaPeriodicidadPagoSAT();
			$data['riesgoPuesto']     = $this->md_sat->traeNominaRiesgoPuestoSAT();
			$data['tipoContrato']     = $this->md_sat->traeNominaTipoContratoSAT();
			$data['tipoHoras']   	  = $this->md_sat->traeNominaTipoHorasSAT();
			$data['tipoJornada']      = $this->md_sat->traeNominaTipoJornadaSAT();
			$data['tipoNomina']   	  = $this->md_sat->traeNominaTipoNominaSAT();
			$data['tipoRegimen']   	  = $this->md_sat->traeNominaTipoRegimenSAT();
			$data['sindicalizado']    = $this->md_sat->traeNominaSindicalizadoSAT();
			$data['percepcion'] 	  = $this->md_sat->traeNominaTipoPercepcionSAT();
			$data['deduccion']    	  = $this->md_sat->traeNominaTipoDeduccionSAT();
			$data['incapacidad']  	  = $this->md_sat->traeNominaTipoIncapacidadSAT();
			$data['otroPago']     	  = $this->md_sat->traeNominaTipoOtroPagoSAT();			
			$data['origenRecurso']    = $this->md_sat->traeNominaOrigenRecursoSAT();

			$tmpl = array ( 'table_open'  => '<table id="gridMisRecibos" class="display compact nowrap" style="width:100%">' );
            $this->table->set_template($tmpl);
            $this->table->set_heading( array('#','Fecha Pago','Pago Inicial', 'Pago Final','Acciones') );
            $this->table->add_row(' ');			
            $data['gridMisRecibos'] = $this->table->generate();			
	
            $this->load->view('vw_lg_rnomina',$data);

         } catch (Exception $e) {echo ' index Excepción: ',  $e->getMessage(), "\n";}		
	}//recibo nomina

	public function	datosReciboNominaAX($portal=NULL,$vp=NULL)
	{	
	Header('Access-Control-Allow-Origin: *');
	try{$this->load->model('md_usuario');
		$this->load->model ('md_sat');
		$this->load->model ('md_catalogo');
		
		$correo = $this->input->post('correo');					

		$emisior  = $this->md_catalogo->traeDatosFiscales(($portal == NULL ? RFC : RFC_SENNI), "rfc, RegistroPatronal, nombre_fiscal, domicilio_fiscal, cp_fiscal, correo_fiscal");
		$empleado = $this->md_usuario->traeDetalleUsuario($correo);
		$lastRN	  = $this->md_sat->traeUltimoIdReciboNomina($correo);		
		$recibo   = $this->md_sat->traeReciboNominaById($lastRN['id_recibo']);
		
		echo json_encode( array( "empleado"   => $empleado
								,"emisor"	  => $emisior 
								,"rn" 	  	  => $recibo
								,"dir"		  =>$this->output_dir
								,"vistaprevia"=>($vp == NULL ? "1":"0")
							)
						);
		
		} catch (Exception $e) { log_message('error', 'datosReciboNominaAX Excepción:'.$e->getMessage()); }	
	}//datosReciboNominaAX

	
	public function	timbrarRecNomAX($action="", $portal=NULL)
	{
	Header('Access-Control-Allow-Origin: *');	
	try{$this->load->model('md_usuario');
		$this->load->model('md_catalogo');
		$this->load->model('md_sat');	

		$this->load->library('Pdf');	
		$this->load->library('Contador'); 
		$this->load->library('zip');		
		$this->load->helper ('date');
		$this->load->helper ('file');
			
		$tipoComprobante = $this->md_sat->traeTipoComprobanteSAT(TIPOCOMP_FACT);
		$percepciones 	 = array_keys($this->md_sat->traeNominaTipoPercepcionSAT()) ;
		$deducciones     = array_keys($this->md_sat->traeNominaTipoDeduccionSAT()) ;
		$otrosPagos      = array_keys($this->md_sat->traeNominaTipoOtroPagoSAT()) ;
		$incapacidades   = array_keys($this->md_sat->traeNominaTipoIncapacidadSAT()) ;		

		$dirRecibo= str_replace(array("@",".","_","-"), "", $this->input->post('correo_emp'))."/";
		$resp 	  = NULL;
		$dbFiscal = $this->md_catalogo->traeDatosFiscales( ($portal == NULL ? RFC : RFC_SENNI), NULL);
		$dbFiscal['dir_cfdi'] = $this->output_dir . "recibosnomina/".$dirRecibo;
		if ( file_exists($this->output_dir . "recibosnomina/") == FALSE) 
		   { mkdir($this->output_dir . "recibosnomina/", 0755); 	     }
		if ( file_exists($this->output_dir . "recibosnomina/".$dirRecibo) == FALSE) 
		   { mkdir($this->output_dir . "recibosnomina/".$dirRecibo, 0755); 	     }	  		   		   
		
		$contador = new Contador();
		$contador->Init($dbFiscal, $portal);
		$datos = $contador->getconfigTimbrado();

		$datos['id_recibo'] = ( ($this->input->post('id_recibo')==NULL || $this->input->post('id_recibo')=='') ?substr(''.now(), -6):$this->input->post('id_recibo') );
		$datos['dir_cfdi']  = $dbFiscal['dir_cfdi'];

		$subTotalRN  = $this->input->post('TotalPercepciones') + $this->input->post('TotalOtrosPagos');
		$descuentoRN = $this->input->post('TotalDeducciones');
		$totalRN 	 = $subTotalRN - $descuentoRN;

		$datos['PDF'] = array();	
		$datos['PDF']['logo'] 	   = ($portal == NULL ? "Logo.jpg" : "LogoSenni.jpg");
		$datos['PDF']['logoWidth'] = ($portal == NULL ? "120" : "200");
		$datos['PDF']['logoHeight']= ($portal == NULL ? "75" : "80");

		$datos['PDF']['rsEmisor']  			 = $this->input->post('rsEmisor');		
		$datos['PDF']['tipocomprobanteDesc'] = 'Nomina';
		$datos['PDF']['emailEmisor']		 = $this->input->post('emailEmisor');
		$datos['PDF']['correo_emp']			 = $this->input->post('correo_emp');
		$datos['PDF']['regimen_fiscalDesc']  = 'General de Ley Personas Morales';
		$datos['PDF']['cpEmisor']			 = $this->input->post('cpEmisor');//'601';
		$datos['PDF']['forma_pagoDesc']  	 = 'Por definir';
		$datos['PDF']['metodo_pagoDesc']  	 = 'Pago en una sola exibición';

		$decimalTotal = null;
   		$wholeTotal   = null;
   		list($wholeTotal, $decimalTotal) = explode('.', number_format($totalRN, 2) );
		$datos['PDF']['totalConLetras']   	 = $this->utils->convertNumToChar( $totalRN ) . $decimalTotal.'/100 M.N. MXN';

		$datos['factura']['descuento'] 		  = $descuentoRN ;//'3000';
		$datos['factura']['fecha_expedicion'] = date('Y-m-d\TH:i:s', time() - 120);
		$datos['factura']['folio'] 			  = $datos['id_recibo'];
		$datos['factura']['forma_pago'] 	  = '99';		
		$datos['factura']['LugarExpedicion']  = $dbFiscal['cp_fiscal'];//'77712'; 		
		$datos['factura']['metodo_pago'] 	  = 'PUE';
		$datos['factura']['moneda'] 		  = 'MXN';
		$datos['factura']['serie'] 			  = ($portal == NULL ? SERIE_SAT : SERIE_SAT_SENNI);//'A';
		$datos['factura']['subtotal'] 		  = $subTotalRN;
		$datos['factura']['tipocambio'] 	  = '1';
		$datos['factura']['tipocomprobante']  = TIPOCOMP_RN;//'N';
		$datos['factura']['total'] 			  = $totalRN ;//'1500';
		$datos['factura']['RegimenFiscal']    = $this->input->post('regimen_fiscal');//'601';		
		$datos['tipo_jornada_emp']		      = $this->input->post('tipo_jornada_emp');
		$datos['sindi_emp']		      		  = $this->input->post('sindi_emp');
		$datos['tot_pag_dec_emp']  		      = $this->input->post('tot_pag_dec_emp')==NULL?0:$this->input->post('tot_pag_dec_emp');
        $datos['ano_serv_dec_emp']     		  = $this->input->post('ano_serv_dec_emp')==NULL?0:$this->input->post('ano_serv_dec_emp');
        $datos['ul_sueldo_dec_emp']     	  = $this->input->post('ul_sueldo_dec_emp')==NULL?0:$this->input->post('ul_sueldo_dec_emp');
        $datos['ing_acu_dec_emp']       	  = $this->input->post('ing_acu_dec_emp')==NULL?0:$this->input->post('ing_acu_dec_emp');
        $datos['ing_noacu_dec_emp'] 		  = $this->input->post('ing_noacu_dec_emp')==NULL?0:$this->input->post('ing_noacu_dec_emp');
		$datos['tipo_recibo'] 		  		  = $action; 
		
		$datos['receptor']['rfc'] 	  = $this->input->post('RFC');//'SOHM7509289MA';
		$datos['receptor']['nombre']  = $this->input->post('nombre_emp');//'Publico en General';
		$datos['receptor']['UsoCFDI'] = 'P01';

		$datos['conceptos'][0]['ClaveProdServ'] = '84111505';
		$datos['conceptos'][0]['cantidad'] 		= '1.00';
		$datos['conceptos'][0]['descripcion'] 	= 'Pago de nómina';
		$datos['conceptos'][0]['valorunitario'] = $subTotalRN;//'4500';
		$datos['conceptos'][0]['importe'] 		= $subTotalRN;//'4500';
		$datos['conceptos'][0]['ClaveUnidad'] 	= 'ACT';
		$datos['conceptos'][0]['Descuento'] 	= $descuentoRN;//'3000';
		
		// Obligatorios 
		$datos['nomina12']['TipoNomina'] 	   = $this->input->post('TipoNomina');//''O';
		$datos['nomina12']['FechaPago'] 	   = $this->fechaSAT( $this->input->post('FechaPago'), NULL  ) ;//'2016-10-31';
		$datos['nomina12']['FechaInicialPago'] = $this->fechaSAT( $this->input->post('FechaInicialPago'), NULL ) ;//'2016-10-16';
		$datos['nomina12']['FechaFinalPago']   = $this->fechaSAT( $this->input->post('FechaFinalPago'), NULL ) ;//'2016-10-31';
		$datos['nomina12']['NumDiasPagados']   = $this->input->post('NumDiasPagados');//''15';

		// Opcionales
		$datos['nomina12']['TotalPercepciones'] = $this->input->post('TotalPercepciones');//'4000';
		$datos['nomina12']['TotalOtrosPagos']   = $this->input->post('TotalOtrosPagos');//'500';
		$datos['nomina12']['TotalDeducciones']  = $this->input->post('TotalDeducciones');//'3000';
		
		// SUB NODOS OPCIONALES DE NOMINA [Emisor, Percepciones, Deducciones, OtrosPagos, Incapacidades]
		// Nodo Emisor, OPCIONALES
		$datos['nomina12']['Emisor']['RegistroPatronal'] = $this->input->post('RegistroPatronal');//'5525665412';
		$datos['nomina12']['Emisor']['RfcPatronOrigen']  = $this->input->post('rfcEmisor');//'AAA010101AAA';
		//$datos['nomina12']['Emisor']['origenRecursos']    = $this->input->post('origenRecursos');

		// SUB NODOS OBLIGATORIOS DE NOMINA [Receptor]
		// Obligatorios de Receptor
		$datos['nomina12']['Receptor']['ClaveEntFed']      = $this->input->post('cve_entidad_emp');//'JAL';
		$datos['nomina12']['Receptor']['Curp'] 			   = $this->input->post('Curp');//'CACF880922HJCMSR03';
		$datos['nomina12']['Receptor']['NumEmpleado'] 	   = $this->input->post('NumEmpleado');//'060';
		$datos['nomina12']['Receptor']['PeriodicidadPago'] = $this->input->post('periodo_emp');//'04';
		$datos['nomina12']['Receptor']['TipoContrato'] 	   = $this->input->post('tipo_contrato_emp');//'01';
		$datos['nomina12']['Receptor']['TipoRegimen'] 	   = $this->input->post('tipo_regimen_emp');//'02';
		
		// Opcionales de Receptor
		//$datos['nomina12']['Receptor']['Antiguedad'] = 'P21W';
		$datos['nomina12']['Receptor']['Banco'] 		 	     = $this->input->post('banco_emp');//'021';
		$datos['nomina12']['Receptor']['CuentaBancaria'] 		 = $this->input->post('cuenta_banco_emp');//'1234567890';
		$datos['nomina12']['Receptor']['FechaInicioRelLaboral']  = $this->fechaSAT( $this->input->post('FechaInicioRelLaboral'), NULL );//'2016-06-01';
		
		$datos['nomina12']['Receptor']['NumSeguridadSocial']     = $this->input->post('NumSeguridadSocial');//'04078873454';
		$datos['nomina12']['Receptor']['Puesto'] 				 = $this->input->post('puesto_emp');//'Desarrollador';
		$datos['nomina12']['Receptor']['RiesgoPuesto'] 		     = $this->input->post('riesgo_emp');//'2';
		$datos['nomina12']['Receptor']['SalarioBaseCotApor'] 	 = $this->input->post('SalarioBaseCotApor')==NULL?0:$this->input->post('SalarioBaseCotApor');//'435.50';
		$datos['nomina12']['Receptor']['SalarioDiarioIntegrado'] = $this->input->post('SalarioDiarioIntegrado')==NULL?0:$this->input->post('SalarioDiarioIntegrado');//'

		// NODO PERCEPCIONES
		// Totales Obligatorios
		$datos['nomina12']['Percepciones']['TotalGravado'] = $this->input->post('tot_gravado_emp')==NULL?0:$this->input->post('tot_gravado_emp');//'4000';
		$datos['nomina12']['Percepciones']['TotalExento']  = $this->input->post('tot_ext_emp')==NULL?0:$this->input->post('tot_ext_emp');//'0.00';
		// Totales Opcionales
		$datos['nomina12']['Percepciones']['TotalSueldos'] = $this->input->post('tot_sueldo_emp')==NULL?0:$this->input->post('tot_sueldo_emp');//'4000'

		// Agregar Percepciones (Todos obligatorios)
		$x = -1;
		foreach( $percepciones as $p )
			{	$percep = $this->input->post('percep'.$p);
				if( $percep != NULL )
				{	$x++;					
					$datos['nomina12']['Percepciones'][$x]['TipoPercepcion'] = $this->input->post('percep'.$p);
					$datos['nomina12']['Percepciones'][$x]['Clave'] 		 = $this->input->post('cve'.$p);
					$datos['nomina12']['Percepciones'][$x]['Concepto'] 		 = $this->input->post('con'.$p);
					$datos['nomina12']['Percepciones'][$x]['ImporteGravado'] = $this->input->post('per_ig'.$p)==NULL?0:$this->input->post('per_ig'.$p);
					$datos['nomina12']['Percepciones'][$x]['ImporteExento']  = $this->input->post('per_ie'.$p)==NULL?0:$this->input->post('per_ie'.$p);					
				}
			}					
			 
		// NODO DEDUCCIONES
		$datos['nomina12']['Deducciones']['TotalOtrasDeducciones']   = $this->input->post('tot_o_deduc_emp')==NULL?0:$this->input->post('tot_o_deduc_emp');//'2000'; // tot_o_deduc_emp
		$datos['nomina12']['Deducciones']['TotalImpuestosRetenidos'] = $this->input->post('tot_imp_ret_emp')==NULL?0:$this->input->post('tot_imp_ret_emp');//'1000'; // tot_imp_ret_emp
		// Agregar Deducciones (Todos obligatorios)
		$x = -1;
		foreach( $deducciones as $d )
			{	$deduc = $this->input->post('deduc'.$d);				
				if( $deduc != NULL )
				{	$x++;					
					$datos['nomina12']['Deducciones'][$x]['TipoDeduccion'] = $this->input->post('deduc'.$d);
					$datos['nomina12']['Deducciones'][$x]['Clave'] 		   = $this->input->post('dec_cve'.$d);
					$datos['nomina12']['Deducciones'][$x]['Concepto'] 	   = $this->input->post('dec_con'.$d);
					$datos['nomina12']['Deducciones'][$x]['Importe'] 	   = $this->input->post('dec_imp'.$d)==NULL?0:$this->input->post('dec_imp'.$d);
					$datos['nomina12']['Deducciones'][$x]['ir'] 	   	   = $this->input->post('dec_ir'.$d);
				}
			}
		// NODO OtrosPagos
		$x = -1;
		foreach( $otrosPagos as $op )
			{	$otrop = $this->input->post('op'.$op );				
				if( $otrop != NULL )
				{	$x++;										
					$datos['nomina12']['OtrosPagos'][$x]['TipoOtroPago'] = $this->input->post('op'.$op);
					$datos['nomina12']['OtrosPagos'][$x]['Clave'] 		 = $this->input->post('op_cve'.$op);
					$datos['nomina12']['OtrosPagos'][$x]['Concepto'] 	 = $this->input->post('op_con'.$op);
					$datos['nomina12']['OtrosPagos'][$x]['Importe'] 	 = $this->input->post('op_imp'.$op)==NULL?0:$this->input->post('op_imp'.$op);
				}
			}		
		//$datos['nomina12']['OtrosPagos'][0]['SubsidioAlEmpleo']['SubsidioCausado'] = '500.00';		

		// NODO Incapacidades
		$x = -1;
		foreach( $incapacidades as $in )
			{	$inca = $this->input->post('inc'.$in);				
				if( $inca != NULL )
				{	$x++;										
					$datos['nomina12']['Incapacidades'][$x]['TipoIncapacidad']  = $this->input->post('inc'.$in);
					$datos['nomina12']['Incapacidades'][$x]['DiasIncapacidad']  = $this->input->post('inc_dias'.$in)==NULL?0:$this->input->post('inc_dias'.$in);
					$datos['nomina12']['Incapacidades'][$x]['ImporteMonetario'] = $this->input->post('inc_imp'.$in)==NULL?0:$this->input->post('inc_imp'.$in);
				}
			}	

		$filename = TIPOCOMP_RN."_".$datos['receptor']['rfc']."_".$datos['id_recibo'].".pdf";
		$datos['filename'] = $filename;
//log_message('error', 'VER:'.var_export($datos, true));
		switch ($action) 
		{
		case "vp":
				$datos['uuid'] 			 = NULL; 
				$datos['fecha_timbrado'] = NULL;				

				$this->md_sat->insert_recibo_nomina($datos);
								
				$filename = "VP_".$filename;
				$this->generatePDF_ReciboNomina( $datos['dir_cfdi'] . $filename
												, array("rn" => $datos, "r" => array("archivo_png"=>"images/blank.png", "representacion_impresa_certificado_no"=>"","representacion_impresa_sello"=>"","representacion_impresa_selloSAT"=>"","representacion_impresa_certificadoSAT"=>"","folio_fiscal"=>"","representacion_impresa_cadena"=>"" ) ) 
												, 'vw_pdf_recibonom'
												);				
				$resp = array( "pdf"  => $filename, "dir" => $datos['dir_cfdi'], "vistaprevia"=>"1" );
		break;	
		case "timb":
				$datos['complemento']      = 'nomina12'; 
				$datos['validacion_local'] = 'NO';
				log_message('error', 'datos:'.var_export($datos, true));
				$resp = $contador->Facturar($datos); 	
				log_message('error', 'resp:'.var_export($resp, true));
				//$debug_export = var_export($resp, true);
				if (count($resp['success']) != 0)
				{												
					$datos['emisor']['nombre_fiscal'] = $dbFiscal['nombre_fiscal'];
					$datos['emisor']['cp_fiscal'] 	  = $dbFiscal['cp_fiscal'];
					$datos['emisor']['correo_fiscal'] = $dbFiscal['correo_fiscal'];
					
					$datos['uuid'] = $resp['success']["uuid"];

					$datos['representacion_impresa_certificado_no'] = $resp['success']["representacion_impresa_certificado_no"];
					$datos['representacion_impresa_sello'] 		 	= $resp['success']["representacion_impresa_sello"];
					$datos['representacion_impresa_selloSAT'] 		= $resp['success']["representacion_impresa_selloSAT"];				
					$datos['representacion_impresa_cadena'] 		= $resp['success']["representacion_impresa_cadena"];
					
					$datos['fecha_timbrado'] = str_replace(":", "-", $resp['success']["representacion_impresa_fecha_timbrado"]);							

					$this->generatePDF_ReciboNomina( $datos['dir_cfdi'] . $filename
													, array("rn" => $datos, "r" => array("archivo_png"=>$resp['success']['archivo_png'], "representacion_impresa_certificado_no"=>$datos['representacion_impresa_certificado_no'],"representacion_impresa_sello"=>$datos['representacion_impresa_sello'],"representacion_impresa_selloSAT"=>$datos["representacion_impresa_selloSAT"],"representacion_impresa_cadena"=>$datos["representacion_impresa_cadena"],"folio_fiscal"=>$resp['success']["representacion_impresa_certificado_no"],"fecha_timbrado"=>$datos["fecha_timbrado"],"uuid"=>$datos["uuid"] )) 
													, 'vw_pdf_recibonom'
													); 

					$respRN = array("fileName" => TIPOCOMP_RN."_".$datos['receptor']['rfc']."_".$datos['id_recibo'].'.zip', "pathFile" => CONTROLLER_FAC.$datos['dir_cfdi'].TIPOCOMP_RN."_".$datos['receptor']['rfc']."_".$datos['id_recibo'].'.zip', "pathFileZip" => CONTROLLER_FAC.$datos['dir_cfdi'], "pathFileFull" => FCPATH.$datos['dir_cfdi'].TIPOCOMP_RN."_".$datos['receptor']['rfc']."_".$datos['id_recibo'].'.zip');					
					$datos['filename'] = $respRN['fileName'];
					
					$this->zip->add_data($filename, file_get_contents(FCPATH . $datos['dir_cfdi'] . $filename));					
					$this->zip->add_data(TIPOCOMP_RN."_".$datos['receptor']['rfc']."_".$datos['id_recibo'].".xml", file_get_contents(FCPATH . $resp['success']['archivo_xml']));									
					// create zip file on server
					$this->zip->archive($respRN["pathFileFull"]);

					if ( file_exists( $respRN['pathFile'] ) )
						{ unlink($respRN['pathFile']); } 

					$resp = array('sucess' => NULL );
					
					if($portal == NULL)
                      { $this->md_sat->insert_recibo_nomina($datos); 
						$resp['portal'] = NULL;
					  }
					else  
					  { $resp['datos'] 	  = $datos;
						$resp['pathFile'] = $respRN['pathFile'];
						$resp['filename'] = $respRN['fileName'];
						$resp['pathFileZip'] = $respRN['pathFileZip'];						
						$resp['portal']   = $portal;
					  }
					$resp['vistaprevia']     = "0";
					$resp['success']['pdf']  = $datos['dir_cfdi'] . $filename;
					$resp['success']['uuid'] = $datos['uuid'];					
				}					
		break;
		}

		echo json_encode( $resp );
		
		} catch (Exception $e) { log_message('error', 'timbrarRecNomAX Excepción:'.$e->getMessage()); }	

	}//timbrarRecNomAX


	private function fechaSAT($fecha, $time)
	{  
	try{			
		if($fecha == NULL || $fecha == '')
		  { return NULL; } 
		else
		{
			$fe_yymmdd = $this->utils->arrayDateFormat( $fecha ); 
			$date = new DateTime();				
			$date->setDate($fe_yymmdd['year'], $fe_yymmdd['month'], $fe_yymmdd['day']);
			
			if($time == NULL)
			{ return $date->format('Y-m-d'); 	}
			else 
			{ return $date->format('Y-m-d\TH:i:s'); 	}
		}
		} catch (Exception $e) { log_message('error', 'fechaSAT Excepción:'.$e->getMessage()); }	
	}//fechaSAT

	private function generatePDF_ReciboNomina($pathFileName, $pdfContent, $view)
	{	
	try{
		$this->load->library('Pdf');		
		$this->load->helper( 'file');

		$html = $this->load->view($view, $pdfContent, true );
		$this->pdf->generate($html, $pathFileName, FALSE);

	} catch (Exception $e) { log_message('error', 'generatePDF_ReciboNomina Excepción:'.$e->getMessage()); }	
	}
	

public function createFilterFacturas($param)
        {            
            $this->load->library('session');            
            $this->load->library('table');
            $this->load->library('Utils');
            $this->load->helper('array');
            
            $data['titulos'] = $param['titulos'];
		
            $data['usuario']  = $this->myData=== true ? $this->myData['usuario'] : "" ;
            $data['iconuser'] = $this->myData=== true ? $this->myData['iconuser'] : "";
            
            $tmpl = array ( 'table_open'  => '<table id="grid" class="display compact nowrap" style="width:100%">' );
            $this->table->set_template($tmpl);
            $this->table->set_heading($param["colBandeja"]);
            $this->table->add_row(' ');

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
                                        <section class="col col-2">
                                              <label class="label">'.$param["f1Label"].'</label>
                                              <label class="input"><i class="icon-append fa fa-search"></i>'.
                                              form_input(array('class' 	=> 'validate[custom[onlyLetterNumber]] text-input',
                                                                'name' 		=> 'f1', 
                                                                'id' 		=> 'f1',
                                                                'size' 	 	=> '10',
                                                                'value' 	=> NULL,
                                                                'maxlength' => '30')).'
                                               <b class="tooltip tooltip-bottom-right">Parametro de Búsqueda</b>
                                              </label>
                                          </section>
										  <section class="col col-2">
                                              <label class="label">Folio</label>
                                              <label class="input"><i class="icon-append fa fa-search"></i>'.
                                              form_input(array('class' 	=> 'validate[custom[onlyLetterNumber]] text-input',
                                                                'name' 		=> 'f4', 
                                                                'id' 		=> 'f4',
                                                                'size' 	 	=> '8',
                                                                'value' 	=> NULL,
                                                                'maxlength' => '20')).'
                                               <b class="tooltip tooltip-bottom-right">Parametro de Búsqueda</b>
                                              </label>
                                          </section>
                                          <section class="col col-3">
                                              <label class="label">'.$param["f2Label"].'</label>
                                              <label class="input"><i class="icon-append fa fa-search"></i>'.
                                              form_input(array('class' 	=> 'validate[custom[onlyLetterNumber]] text-input',
                                                                'name' 		=> 'f2', 
                                                                'id' 		=> 'f2',
                                                                'size' 	 	=> '15',
                                                                'value' 	=> NULL,
                                                                'maxlength' => '30')).'
                                               <b class="tooltip tooltip-bottom-right">Parametro de Búsqueda</b>
                                              </label>
                                          </section>
                                           <section class="col col-3">
                                              <label class="label">'.$param["f3Label"].'</label>
                                              <label class="input"><i class="icon-append fa fa-search"></i>'.
                                              form_input(array('class' 	=> 'validate[custom[onlyLetterNumber]] text-input',
                                                                'name' 		=> 'f3', 
                                                                'id' 		=> 'f3',
                                                                'size' 	 	=> '15',
                                                                'value' 	=> NULL,
                                                                'maxlength' => '40')).'
                                               <b class="tooltip tooltip-bottom-right">Parametro de Búsqueda</b>
                                              </label>
                                          </section>
										  <section class="col col-2">    
											</section>';
            $filtrosTbl = $filtrosTbl.'</div>';
                                         
			$filtrosTbl = $filtrosTbl.'<div class="row">  
											<section class="col col-3">													
													<label class="label">'.$param["f4Label"].': </label> ';
														foreach ( $param["f4Select"] as &$c )  
																{ $filtrosTbl = $filtrosTbl.'<label class="toggle">'.form_radio( array("name" => $c['name'],"id" => $c['id'],"value" => $c['value']) ).''.$c['icon'].'<small>'.$c['label'].'</small></label>'; }
			$filtrosTbl = $filtrosTbl.'		</section>
											<section class="col col-1"> </section>											       
											<section class="col col-3">
													<label class="label">De: </label>
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
											<section class="col col-3">
													<label class="label">Hasta: </label>
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
											<section class="col col-2">    
											</section>										         
											</div>
											';
            
            $filtrosTbl = $filtrosTbl.'<div class="row">
										<section class="col col-2">'.nbs().'</section>'
                                    . '  <section class="col col-4">';  
            $filtrosTbl = $filtrosTbl.'		<a class="button color" href="javascript:submitFormFiltrosFacturas(\''.$param["formaId"].'\',\''.$param['registrosPagina'].'\',\''.  base_url().'\');"><span>Buscar</span></a>'
                                      .' </secton>									     
									  	 <section class="col col-4">';            
            $filtrosTbl = $filtrosTbl.'		<a class="button color" href="javascript:submitFormReset(\''.$param["formaId"].'\')"><span>Limpiar</span></a>';
            $filtrosTbl = $filtrosTbl.'  </secton>
										 <section class="col col-2">'.nbs().'</section>
									   </div>';
            $filtrosTbl = $filtrosTbl.'</div>';
            $filtrosTbl = $filtrosTbl.'</fieldset>'.form_close();

            $data['filtrosTbl']  = $filtrosTbl ;        
            $data['accion']      = $param["accion"];
            $data['tipo']        = $param["tipo"];    
                
            return $data;

        }// CREATE FILTROS FACTURACION

		public function paginarFacturasAX()
		{
			try{$this->load->model('md_sat');

				$grid  = null;
				$resp  = null;
				
				$param = array("pagina"   => $this->input->post('pagina'),
						  	   "tipo"  	  => $this->input->post('tipo'),
							   "f1"       => $this->input->post('f1'),
							   "f2"       => $this->input->post('f2'),
							   "f3"       => $this->input->post('f3'),		
							   "f4"       => $this->input->post('f4'),		
							   "fechaIni" => $this->input->post('fechaIni'),
							   "fechaFin" => $this->input->post('fechaFin'),
							   "export"   => $this->input->post('export') 
							  );

				switch ( $param['tipo'] ) 
				{
	 			case "FT":					 
				case "FSI":					
					$grid = $this->md_sat->traeFacturasTimbradasFiltros($this->registros_x_pagina, $param);
					$resp = $this->zipExcelFacturasAX($grid, $param);
					 break;
				case "FE":
					$resp  = $this->md_sat->traePedidosParaFacturarFiltros($this->registros_x_pagina, $param);
					break;
				}
				
				echo json_encode ( $resp );
			
			} catch (Exception $e) { log_message('error', 'paginarFacturasAX Excepción:'.$e->getMessage()); }

		}//paginarFacturasAX


		public function createFilterRNomina($param)
        {            
            $this->load->library('session');            
            $this->load->library('table');
            $this->load->library('Utils');
            $this->load->helper('array');
            
            $data['titulos'] = $param['titulos'];
		
            $data['usuario']  = $this->myData=== true ? $this->myData['usuario'] : "" ;
            $data['iconuser'] = $this->myData=== true ? $this->myData['iconuser'] : "";
            
            $tmpl = array ( 'table_open'  => '<table id="grid" class="display compact nowrap" style="width:100%">' );
            $this->table->set_template($tmpl);
            $this->table->set_heading($param["colBandeja"]);
            $this->table->add_row(' ');

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
                                          <section class="col col-3">
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
                                           <section class="col col-3">
                                              <label class="label">'.$param["f3Label"].'</label>                                              
											  <label class="select"><i class="icon-append"></i>    
                                                    '.form_dropdown('f3',$param["f3Select"],"0",'id="f3"').'
                                              </label>
                                          </section>
										  <section class="col col-2">    
											</section>';
            $filtrosTbl = $filtrosTbl.'</div>';

            $filtrosTbl = $filtrosTbl.'<div class="row">
										<section class="col col-2">'.nbs().'</section>'
                                    . '  <section class="col col-4">';  
									$filtrosTbl = $filtrosTbl.'		<a class="button color" href="javascript:paginarRNominasAX(\'1\',\''.$param['registrosPagina'].'\',\''.base_url().'\');"><span>Buscar</span></a>'
                                      .' </secton>									     
									  	 <section class="col col-4">';            
            $filtrosTbl = $filtrosTbl.'		<a class="button color" href="javascript:submitFormReset(\''.$param["formaId"].'\')"><span>Limpiar</span></a>';
            $filtrosTbl = $filtrosTbl.'  </secton>
										 <section class="col col-2">'.nbs().'</section>
									   </div>';
            $filtrosTbl = $filtrosTbl.'</div>';
            $filtrosTbl = $filtrosTbl.'</fieldset>'.form_close();

            $data['filtrosTbl']  = $filtrosTbl ;

            return $data;

        }// CREATE FILTROS RNOMINAS

		public function paginarRNominasAX()
		{
			try{$this->load->model('md_usuario');
				$this->validaSS();
				$grid  = null;
				$resp  = null;

				$param = array("pagina"   => $this->input->post('pagina'),						  	   
							   "f1"       => $this->input->post('f1'),
							   "f2"       => ( $this->user['0']['tipo'] == PERFIL_ADMIN ? $this->input->post('f2') : $this->user['0']['correo'] ),
							   "f3"       => $this->input->post('f3')== "0"?NULL:$this->input->post('f3'),									 						   
							  );

				$resp = $this->md_usuario->traeUsuariosFiltros(10, $param['pagina'], $param['f1'], $param['f2'], $param['f3'] );

				echo json_encode ( $resp );
			
			} catch (Exception $e) { log_message('error', 'paginarRNominasAX Excepción:'.$e->getMessage()); }

		}//paginarRNominasAX

		public function paginarMisRecibosNominasAX()
		{
			try{$this->load->model('md_sat');

				$grid  = null;
				$resp  = null;
				
				$param = array("pagina"   => $this->input->post('pagina'),
							   "correo"   => $this->input->post('correo'),
							   "fechaIni" => $this->utils->senniDateFormat( $this->input->post('fechaIni') ),
							   "fechaFin" => $this->utils->senniDateFormat( $this->input->post('fechaFin') )							   
							  );

				$resp = $this->md_sat->traeRecibosNominasFiltros(10, $param );

				echo json_encode ( $resp );
			
			} catch (Exception $e) { log_message('error', 'paginarMisRecibosNominasAX Excepción:'.$e->getMessage()); }

		}//paginarMisRecibosNominasAX


		private function zipExcelFacturasAX($grid, $param)
		{
			$this->load->library('zip');			
			$this->load->model('md_pedido');
			$this->load->helper ('file');

			$resp = null;
			try{
 			if ( $param['export'] == null )
			     {  $resp = $grid; 		  }

			else {  $title   = $param['tipo']=="FT" ? "Facturas Timbradas" : "Facturas Saldo Insoluto";
					$tiFile  = $param['tipo']=="FT" ? "FacturasTimbradas"  : "FacturasSaldoInsoluto";
					$resp 	 = array("fileName" => $tiFile.'.zip', "pathFile" => $this->output_dir.$tiFile.'.zip', "pathFileFull" => FCPATH.$this->output_dir.$tiFile.'.zip');
					$respExc = $this->reportExcelAXFacturas($param, $grid, $param['tipo'], $title, $tiFile);

					$this->zip->read_file(FCPATH.$respExc['pathFile']);
					$this->zip->add_dir('PDF');
					$this->zip->add_dir('REP');
					foreach ($grid["registros"] as $r)
							{   //FACTURA
								$facturas = $this->md_pedido->traeAdjuntosFactura($r['id_pedido']);
								foreach ($facturas   as $f)
								{
									$path = FCPATH.$f['adjunto'];								
									$this->zip->add_data('PDF/' . $f['filename'], file_get_contents($path));
									$pathXML     = str_replace(".pdf", "_cfdi3_3.xml", $path);
									$filenameXML = str_replace(".pdf", "_cfdi3_3.xml", $f['filename']);
									if ( file_exists( $pathXML ) )
									   { $this->zip->add_data('PDF/' . $filenameXML, file_get_contents( $pathXML )); }
								} 

								//REP
								$reps = $this->md_pedido->traeAdjuntosREP($r['id_pedido']);								
								foreach ($reps as $r)
								{	$path = FCPATH.$r['adjunto'];									
									$this->zip->add_data('REP/'.$r['filename'], file_get_contents($path));
								}
							}
					// create zip file on server
					$this->zip->archive($resp["pathFileFull"]);

					if ( file_exists( $respExc['pathFile'] ) )
						{ unlink($respExc['pathFile']); } 
				 }

			} catch (Exception $e) { log_message('error', 'zipExcelFacturasAX Excepción:'.$e->getMessage()); }

			return $resp;

		}// private zipFacturasAX

		public function zipFacturaAX()
		{											
			$this->load->library('zip');			
			$this->load->model('md_pedido');
			$resp = null;

			try{	$id_pedido = $this->input->post('id_pedido');
					$resp 	   = array("fileName" => 'Factura'.$id_pedido.'.zip', "pathFile" => $this->output_dir.'Factura'.$id_pedido.'.zip', "pathFileFull" => FCPATH.$this->output_dir.'Factura'.$id_pedido.'.zip');
					log_message('error', 'VER 3: '.$resp['pathFileFull'] );
					//FACTURAS
					$facturas = $this->md_pedido->traeAdjuntosFactura($id_pedido);
					//REP
					$reps = $this->md_pedido->traeAdjuntosREP($id_pedido);
					
					if( sizeof($facturas) != 0  ){ $this->zip->add_dir('PDF'); }
					if( sizeof($reps) != 0      ){ $this->zip->add_dir('REP'); }
					
					foreach ($facturas as $f)
					{
						$path = FCPATH.$f['adjunto'];								
						$this->zip->add_data('PDF/' . $f['filename'], file_get_contents($path));
						$pathXML     = str_replace(".pdf", "_cfdi3_3.xml", $path);
						$filenameXML = str_replace(".pdf", "_cfdi3_3.xml", $f['filename']);
						if ( file_exists( $pathXML ) )
						   { $this->zip->add_data('PDF/' . $filenameXML, file_get_contents( $pathXML )); }
					} 

					foreach ($reps as $r)
					{	$path = FCPATH.$r['adjunto'];
						$this->zip->add_data('REP/'.$r['filename'], file_get_contents($path));
					}							
					// create zip file on server
					$this->zip->archive($resp["pathFileFull"]);					

			} catch (Exception $e) { log_message('error', 'zipFacturaAX Excepción:'.$e->getMessage()); }
			
			echo json_encode ($resp);			

		}// public zipFacturaAX



		private function reportExcelAXFacturas($param, $data, $tipo, $title, $tiFile)
		{
			$this->load->helper('date');
			$this->load->helper('html');
			$this->load->helper('url' );        
			$this->load->library('Excel');
			
			$dataInput = array();
			try{
			$expFile    = "";
			$hoy        = date('Y-m-d H:i:s');

			$nameFile = "Reporte".$tiFile.".xlsx" ;
			$pathFile =  $this->output_dir ;
			$iconFile =  "images/ExcelLogo.png" ;
			$columnsTitles = array("# FOLIO", "EMBARQUE", "RFC", "RAZON SOCIAL", "FECHA", "DESCUENTO", "SUBTOTAL", "IMPUESTOS", "TOTAL", "MONEDA", "TIPO CAMBIO", "METODO PAGO", "FORMA PAGO", "USO CDFI", "NOTAS", "FOLIO FISCAL" );
			
			if ( file_exists( $pathFile . $nameFile) )
			   { unlink( $pathFile . $nameFile );    }

			if( empty( $data ) )
			{ $expFile = "No se encontraron registros para exportar"; }  
			else    
			{ 
				$tituloReporte = "Reporte ".$title;    
					
				$objPHPExcel = new Excel();			
				$objPHPExcel->getProperties()
							->setCreator    (TITULO_NAVEGADOR)                
							->setTitle      ($tituloReporte)
							->setSubject    (TITULO_NAVEGADOR)                         
							->setKeywords   ($title)
							->setCategory   ($title)
							->setLastModifiedBy("Portal ".TITULO_NAVEGADOR) 
							;
			
				$estiloTituloReporte = array('font'      => array('name'        => 'Verdana', 'bold' => true, 'italic' => false, 'strike' => false, 'size' => 15, 'color' => array('rgb' => 'FFFFFF')) ,
											 'fill'      => array('type'        => PHPExcel_Style_Fill::FILL_SOLID, 'color' => array('rgb' => '58595B')),
											 'borders'   => array('allborders'  => array( 'style' => PHPExcel_Style_Border::BORDER_NONE)),
											 'alignment' => array( 'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'rotation' => 0, 'wrap' => TRUE )
											);
			
				$estiloTituloColumnas = array('font'     => array('name'       => 'Arial', 'bold' => true, 'color' => array('rgb' => 'FFFFFF') ),
											 'fill'      => array('type'       => PHPExcel_Style_Fill::FILL_SOLID, 'color' => array('rgb' => 'A81F24')),
											 'borders'   => array('top'        => array('style' => PHPExcel_Style_Border::BORDER_MEDIUM, 'color' => array( 'rgb' => '58595B')), 'bottom' => array('style' => PHPExcel_Style_Border::BORDER_MEDIUM, 'color' => array( 'rgb' => '58595B')) ),
											 'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, 'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => TRUE)
											);
				$estiloSubTituloColumnas = array('font'      => array('name'       => 'Arial', 'color' => array('rgb' => '000000'),'size' => 8 ),
											//     'fill'    => array('type' => PHPExcel_Style_Fill::FILL_SOLID, 'color' => array('rgb' => 'FFFFFF')),
											//     'borders' => array('right' => array('style' => PHPExcel_Style_Border::BORDER_THIN  )
											//                       ,'bottom' => array('style' => PHPExcel_Style_Border::BORDER_THIN  ) ),
												'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT, 'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => TRUE)
											);

				$estiloHoraReporte = array('font'      => array('name'       => 'Arial', 'color' => array('rgb' => '000000'),'size' => 7 ),
										   'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT, 'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => TRUE)
										  );
			
				$estiloInformacion = new PHPExcel_Style();
				$estiloInformacion->applyFromArray( array('font'    => array('name' => 'Arial', 'color' => array('rgb' => '000000'),'size' => 8 ),
										 				// 'fill'    => array('type' => PHPExcel_Style_Fill::FILL_SOLID, 'color' => array('rgb' => 'FFFFFF')),
														  //'borders' => array('left' => array('style' => PHPExcel_Style_Border::BORDER_THIN , 'color' => array('rgb' => '000000') ) )   
														  'borders' => array('right'  => array('style' => PHPExcel_Style_Border::BORDER_THIN, 'color' => array('rgb' => '58595B')  )
											                       			,'left'   => array('style' => PHPExcel_Style_Border::BORDER_THIN, 'color' => array('rgb' => '58595B')  ) 
																		 	,'bottom' => array('style' => PHPExcel_Style_Border::BORDER_THIN, 'color' => array('rgb' => '58595B')  ) 
																			,'top'    => array('style' => PHPExcel_Style_Border::BORDER_THIN, 'color' => array('rgb' => '58595B')  ) 
																		   ),
														));
			
				$objPHPExcel->getActiveSheet()->setTitle($title);
				$objPHPExcel->setActiveSheetIndex(0)
							->mergeCells('A1:J1')
							->mergeCells('A2:E2')
							->mergeCells('F2:P4')
							->mergeCells('A3:E3')                        
							->mergeCells('A4:E4')
							->mergeCells('A5:P5')
							;

				$objPHPExcel->setActiveSheetIndex(0)
							->setCellValue('A1', $tituloReporte) 
							->setCellValue('A2', $param['f1']==NULL?"":"Embarque: ".$param['f1']) 
							->setCellValue('A3', $param['f2']==NULL?($param['f3']==NULL?"":"Cliente: ".$param['f3']):"Cliente: ".$param['f2'] ) 
							->setCellValue('A4', $param['fechaIni']==NULL?"":"Facturas del ".$param['fechaIni']." al ".$param['fechaFin'] ) 
							->setCellValue('A5', "Reporte al corte de: ".$hoy ) 
							->setCellValue('F2', "") 
							->setCellValue('A6', $columnsTitles[0])
							->setCellValue('B6', $columnsTitles[1])
							->setCellValue('C6', $columnsTitles[2])
							->setCellValue('D6', $columnsTitles[3])
							->setCellValue('E6', $columnsTitles[4])
							->setCellValue('F6', $columnsTitles[5])
							->setCellValue('G6', $columnsTitles[6])
							->setCellValue('H6', $columnsTitles[7])
							->setCellValue('I6', $columnsTitles[8])
							->setCellValue('J6', $columnsTitles[9])
							->setCellValue('K6', $columnsTitles[10])
							->setCellValue('L6', $columnsTitles[11])
							->setCellValue('M6', $columnsTitles[12])
							->setCellValue('N6', $columnsTitles[13])
							->setCellValue('O6', $columnsTitles[14])
							->setCellValue('P6', $columnsTitles[15])							
							;

				$objDrawing = new PHPExcel_Worksheet_Drawing();
				$objDrawing->setName('Logo');
				$objDrawing->setDescription('Logo '.TITULO_NAVEGADOR);
				$objDrawing->setPath('images/Logo.png');
				$objDrawing->setCoordinates('F2');                      
				//setOffsetX works properly
				$objDrawing->setOffsetX(170); 
				$objDrawing->setOffsetY(1);                
				//set width, height
				$objDrawing->setWidth(150);
				$objDrawing->setHeight(80); 
				$objDrawing->setWorksheet($objPHPExcel->setActiveSheetIndex(0));

				$objPHPExcel->getActiveSheet()->getRowDimension('2')->setRowHeight(35);
				$objPHPExcel->getActiveSheet()->getRowDimension('1')->setRowHeight(25);
				/*** CONTENIDO*/
				$numCelda = 6;
				foreach ($data["registros"] as $r)
				{ $numCelda++; 
				$objPHPExcel->getActiveSheet()->getRowDimension($numCelda)->setRowHeight(40);
				$objPHPExcel->setActiveSheetIndex(0)         				
				->setCellValue('A'.$numCelda, ($r['folio']==-1 ? $r['id_factura'] : $r['serie'].$r['folio'] ) )
							->setCellValue('B'.$numCelda, $r['id_pedido'] )
							->setCellValue('C'.$numCelda, $r['rfc'] )
							->setCellValue('D'.$numCelda, $r['nombre'] )
							->setCellValue('E'.$numCelda, $r['fecha_factura'] )
							->setCellValue('F'.$numCelda, number_format($r['descuento'] ,2, '.', ',' )." %")
							->setCellValue('G'.$numCelda, "$".number_format($r['subtotal'] ,2, '.', ',' ))
							->setCellValue('H'.$numCelda, "$".number_format($r['importe_imp'] ,2, '.', ',' ))
							->setCellValue('I'.$numCelda, "$".number_format($r['total'] ,2, '.', ',' ))
							->setCellValue('J'.$numCelda, $r['moneda'])
							->setCellValue('K'.$numCelda, "$".number_format($r['tipocambio'] ,2, '.', ',' ))
							->setCellValue('L'.$numCelda, $r['metodo_pago']." ".$r['metodo_pagoDesc'])
							->setCellValue('M'.$numCelda, $r['forma_pago']." ".$r['forma_pagoDesc'])
							->setCellValue('N'.$numCelda, $r['UsoCFDI']." ".$r['UsoCFDIDesc'])
							->setCellValue('O'.$numCelda, $r['notas'])
							->setCellValue('P'.$numCelda, $r['uuid'])
							;
				} 
				$objPHPExcel->getActiveSheet()->getStyle('A1:P1')->applyFromArray($estiloTituloReporte);
				$objPHPExcel->getActiveSheet()->getStyle('A6:P6')->applyFromArray($estiloTituloColumnas);
				$objPHPExcel->getActiveSheet()->getStyle('A3:A4')->applyFromArray($estiloSubTituloColumnas);
				$objPHPExcel->getActiveSheet()->getStyle('A2')->applyFromArray($estiloSubTituloColumnas);
				$objPHPExcel->getActiveSheet()->getStyle('F2')->applyFromArray($estiloSubTituloColumnas);
				$objPHPExcel->getActiveSheet()->getStyle('A5')->applyFromArray($estiloHoraReporte);
				$objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion, "A7:P".$numCelda);
				$objPHPExcel->getActiveSheet()->getStyle("A7:P".$numCelda)->applyFromArray(array('alignment' =>  array('horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_JUSTIFY, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => TRUE )));
				
				for($i = 'A'; $i <= 'P'; $i++){ $objPHPExcel->setActiveSheetIndex(0)->getColumnDimension($i)->setAutoSize(TRUE); }
				// Inmovilizar paneles
				$objPHPExcel->getActiveSheet(0)->freezePaneByColumnAndRow(0,7);

				$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');            
				$objWriter->save($pathFile . $nameFile);				
			}
						
			return array("fileName" => $nameFile, "pathFile" => $pathFile . $nameFile );

			} catch (Exception $e) { log_message('error', 'reportExcelAXFacturas Excepción:'.$e->getMessage()); }	

		}//


		public function	validaListaNegraSATAX()
		{
			$this->load->model('md_sat');
			
			$rfc = $this->input->post('rfc');// 
						
			$resp = $this->md_sat->validaListaNegraSAT($rfc);
			
			echo json_encode ($resp);

		}

		public function	pagarFacturaAX()
		{
			try{
			$this->load->model('md_sat');
			
			$rfc = $this->input->post('rfc');// 
						
			$resp = $this->md_sat->validaListaNegraSAT($rfc);
			
			echo json_encode ($resp);
			
			} catch (Exception $e) { log_message('error', 'pagarFacturaAX Excepción:'.$e->getMessage()); }	
		}

		public function	cancelarFacturaAX($portal=NULL)
		{
		Header('Access-Control-Allow-Origin: *');	
		try{
			$this->load->model('md_sat');
			$this->load->model('md_catalogo');
			$this->load->library('Contador'); 
						
log_message('error', 'portal:'.$portal);
			$contador = new Contador();
			$uuid 	  = NULL;
			$datos	  = array();
			$resp 	  = array();

			if( $portal == NULL)
			{
				$idFactura = $this->input->post('idFactura');// 
				$factura   = $this->md_sat->traeFacturaByIdFactura($idFactura);
				$uuid 	   = $factura["uuid"];
			}
			else
			{ $uuid = $this->input->post('uuid'); }

			$dbFiscal = $this->md_catalogo->traeDatosFiscales( ($portal == NULL ? RFC : RFC_SENNI), NULL);
			$dbFiscal['dir_cfdi'] = $this->output_dir . $uuid . "/";
			$contador->Init($dbFiscal, $portal);
			$datosFacturacion 		 = $contador->getconfigTimbrado();
			$datos['PAC']['usuario'] = $datosFacturacion['PAC']['usuario'];
			$datos['PAC']['pass']    = $datosFacturacion['PAC']['pass'];
			$datos['modulo']	 	 = "cancelacion2018"; 
			$datos['accion']     	 = "cancelar";                                                  
			$datos["produccion"] 	 = PROD_FAC; 			
			$datos["uuid"] 	     	 = $uuid;
			$datos["rfc"]        	 = $datosFacturacion['emisor']['rfc'];
			$datos["password"]   	 = $datosFacturacion['conf']['pass'];
			$datos["b64Cer"]     	 = $datosFacturacion['conf']['cer'];
			$datos["b64Key"]     	 = $datosFacturacion['conf']['key'];
log_message('error', 'DATOS: '.var_export($datos, true));				
		    $resp = $contador->Cancelar($datos);

	//		if (count($resp['success']) != 0)
			//{
				$resp = array('sucess' => NULL );
				$resp['success']['status'] = STATUS_CANCELADA;
				if( $portal == NULL)
                  { $this->md_sat->actualizaFacturaByUUID($uuid, array("status" => STATUS_CANCELADA)); 
					$resp['success']['id_factura'] = $idFactura;					
				  }								
			//}
		
			echo json_encode ($resp);
			
			} catch (Exception $e) { log_message('error', 'cancelarFacturaAX Excepción:'.$e->getMessage()); }	
		}

 
		public function traeUuidCfdiRelAX()
		{
		try{
			$this->load->model('md_sat');	
			
			$uuid    = $this->input->post('uuid');
			$factura = $this->md_sat->traeFacturaByUUID($uuid); 		

			echo json_encode( $factura );
			
			} catch (Exception $e) { log_message('error', 'traeUuidCfdiRelAX Excepción:'.$e->getMessage()); }	

		}//traeUuidCfdiRelAX
		
}//Controller

