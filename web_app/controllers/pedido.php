<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pedido extends CI_Controller {

	public  $user 		= NULL;
	private $output_dir = "adjuntos/";
    private $registros_x_pagina = 10;
	
	public function __construct()
    {
        parent::__construct();
		
        $this->load -> database('MySQL_Conn');
        $this->load -> model   ('md_pedido');
		$this->load -> model   ('md_cliente');
		$this->load -> model   ('md_catalogo');
		$this->load -> model   ('md_sat');
		$this->load -> library ('session');
		$this->load -> library ('table');
		$this->load -> library ('Utils');
		$this->load -> helper  ('array');
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
	
	public function index()
	{
		$data['titulos']  = array("navegador" => TITULO_NAVEGADOR, 
                                 "ventana"   => TITULO_VENTANA,
                          "frase"     => "\"Hacer de lo simple algo complicado es com&uacute;n; hacer de lo complicado algo simple, incre&iacute;blemente simple, es creatividad\" <br>- Charles Mingus",
					 "titulo"    => "Formulario para ingresar un nuevo Embarque");
						
		$this->load->view('vw_frm_rastreo',$data);		
	}

public function editar($num_guia=0)
{
try{
	$this->validaSS();
	date_default_timezone_set('America/Mexico_City');
	$this->load->model('md_proveedor');
	$this->load->model('md_cotizador'); 
	$this->load->helper('date');
	
	$data['titulos']  = array("navegador" => TITULO_NAVEGADOR, 
                                 "ventana"    => TITULO_VENTANA,
                                  "frase"     => "\"Hacer de lo simple algo complicado es com&uacute;n; hacer de lo complicado algo simple, incre&iacute;blemente simple, es creatividad\" <br>- Charles Mingus",
			 	 "titulo"     => "Formulario para modificar el Embarque con referencia ".NOMBRE_CORTO.": <strong>".$num_guia."</strong>");
	
	
	$data['usuario']  = element('nombre', $this->user['0'])." ".element('apellidos', $this->user['0']);
	$data['iconuser'] = '<img src="'.base_url().'images/user.png"/>';
		
	$data['regreso_v']           = $this -> md_catalogo -> poblarSelect("regreso_v");
	$data['verificacion_origen'] = $this -> md_catalogo -> poblarSelect("verificacion_o");	
	$data['carta_garantia']      = $this -> md_catalogo -> poblarSelect("carta_garantia");
	$data['carta_no']            = $this -> md_catalogo -> poblarSelect("carta_no");
    $data['tipo_embarque']       = $this -> md_catalogo -> poblarSelect("tipo_embarque");
	$data['status']              = $this -> md_catalogo -> poblarSelect("status");
	$data['segdoc']              = $this -> md_catalogo -> poblarSelect("segdoc");
	$data['tipos_servicio']      = $this -> md_catalogo -> poblarSelect("tipo_servicio");
	$data['tipos_contenedor']    = $this -> md_catalogo -> poblarSelect("tipo_contenedor");
	$data['clientes']            = $this -> md_cliente  -> poblarSelect();
	$data['cotizaciones']        = $this -> md_cotizador -> poblarSelect();
	$data['terminosINCO']        = $this -> md_catalogo  -> poblarSelect("terminos");
	$data['id_pedido']           = $num_guia;
	$data['accion']              = "E";
	$data['pedido']              = $this->traeDetallePedido($num_guia, $data['tipos_servicio']);
    $data['adjuntos']      		 = $this->md_pedido->traeAdjuntosPedido($num_guia);
	$data['carrier']             = $this->md_proveedor->poblarSelect("0");		
	$data['usoCFDI']             = $this->md_sat->traeDatosUsosCFDI();
	$data['regimenFiscal']       = $this->md_sat->traeDatosRegimenFiscal();
	$data['metodoPago']      	 = $this->md_sat->traeMetodoPago();
	$data['formaPago']       	 = $this->md_sat->traeFormaPago();
	$data['monedaSAT']       	 = $this->md_sat->traeMonedaSAT();
	$data['tipoRelacion']	 	 = $this->md_sat->traeTipoRelacionSAT();
	$data['tipoComprobante'] 	 = $this->md_sat->traeTiposComprobantesSAT();
	$data['fechaExpedicion']     = date('d/m/Y');

		
	$this->load->view('vw_lg_frm_ped',$data);
		
	} catch (Exception $e) {echo 'editar PEdido Excepción: ',  $e->getMessage(), "\n";}
}




/***
	Metodo Principal del controlador para cargar los datos necesarios la formulario de un nuevo pedido
****/	
public function nuevo()
{	
	$this->validaSS();
	date_default_timezone_set('America/Mexico_City');
	$this->load->helper('date');
	$this->load->model('md_proveedor');
	$this->load->model('md_cotizador'); 
	
	$data['usuario']  = element('nombre', $this->user['0'])." ".element('apellidos', $this->user['0']);
	$data['iconuser'] = '<img src="'.base_url().'images/user.png"/>';
	
	$data['titulos']  = array("navegador" => TITULO_NAVEGADOR, 
                                 "ventana"   => TITULO_VENTANA,
                                  "frase"     => "\"Hacer de lo simple algo complicado es com&uacute;n; hacer de lo complicado algo simple, incre&iacute;blemente simple, es creatividad\" <br>- Charles Mingus",
                                  "titulo"    => "Formulario para ingresar un nuevo Embarque");
							 	
	$data['carrier']             = $this -> md_proveedor -> poblarSelect("0");
	$data['regreso_v']           = $this -> md_catalogo  -> poblarSelect("regreso_v");
	$data['verificacion_origen'] = $this -> md_catalogo  -> poblarSelect("verificacion_o");	
	$data['carta_garantia']      = $this -> md_catalogo  -> poblarSelect("carta_garantia");
	$data['carta_no']            = $this -> md_catalogo  -> poblarSelect("carta_no");
    $data['tipo_embarque']  	 = $this -> md_catalogo  -> poblarSelect("tipo_embarque");
	$data['status']              = $this -> md_catalogo  -> poblarSelect("status");
	$data['segdoc']              = $this -> md_catalogo  -> poblarSelect("segdoc");
	$data['tipos_servicio']      = $this -> md_catalogo  -> poblarSelect("tipo_servicio");
	$data['tipos_contenedor']    = $this -> md_catalogo -> poblarSelect("tipo_contenedor");
	$data['clientes'] 	     	 = $this -> md_cliente   -> poblarSelect();
	$data['cotizaciones']        = $this -> md_cotizador -> poblarSelect();
	$data['terminosINCO']        = $this -> md_catalogo  -> poblarSelect("terminos");
	$data['id_pedido']           = now();    
	$data['accion']		     	 = "N";
    $data['pedido']              = array('encabezado' => array(array('correo'=>NULL, 'rfc'=>NULL, 'status'=>NULL, 'carrier'=>NULL, 'folio_factura'=>NULL, 'adjunto_factura'=>NULL, 'fecha_alta'=>NULL, 'fecha_modificacion'=>NULL, 'ins_envio'=>NULL, 'ins_booking'=>NULL, 'num_booking'=>NULL, 'num_contenedor'=>1, 'num_mbl'=>NULL, 'adjunto_mbl'=>NULL, 'num_hbl'=>NULL, 'adjunto_hbl'=>NULL, 'vessel_voyage'=>NULL, 'shipper'=>NULL, 'revalidar_aa'=>NULL, 'num_contenedor'=>NULL, 'carta_garantia'=>47, 'carta_no'=>NULL, 'monto_carta_no'=>NULL, 'adjunto_le'=>NULL, 'adjunto_facturaP'=>NULL, 'adjunto_poliza'=>NULL, 'adjunto_cartaporte'=>NULL, 'profit_origen'=>NULL, 'profit'=>NULL, 'comision_ventas'=>NULL, 'comision_operaciones'=>NULL, 'id_carrier'=>NULL, 'id_coti'=>NULL, 'moneda'=>NULL, 'tipo_cambio'=>NULL, 'tipo_embarque'=>NULL, 'id_cg'=>NULL,'id_carta_no'=>NULL,'costo_tot'=>NULL,'venta_tot'=>NULL,'pol'=>NULL,'pod1'=>NULL,'pod2'=>NULL,'etd'=>NULL, 'agente_proveedor'=>NULL,'orden_compra'=>NULL, 'referencia_proveedor'=>NULL,'eta'=>NULL,'flagHeaderSaved'=>0,'status_track'=>NULL,'total_costos_mxn'=>NULL, 'total_costos_usd'=>NULL, 'total_ventas_mxn'=>NULL, 'total_ventas_usd'=>NULL)), 
									 	 'aduana' 	  => array(array('agencia'=>NULL, 'tiempo'=>NULL)) , 
										 'flete' 	  => array(array('id_flete'=>NULL, 'id_pedido'=>NULL, 'tipo_servicio'=>NULL, 'etd'=>NULL, 'eta'=>NULL, 'verificacion_origen'=>NULL,'id_v_o'=>NULL)) ,
										 'producto'   => array() ,
										 'rastreo'	  => array() ,
										 'seguro'	  => array(array('id_seguro'=>NULL, 'id_pedido'=>NULL, 'costo'=>NULL, 'venta'=>NULL, 'iva'=>NULL, 'cobertura'=>NULL)) ,
										 'transporte' => array(array('id_transporte'=>NULL, 'id_pedido'=>NULL, 'regreso_vacio'=>NULL, 'costo'=>NULL, 'venta'=>NULL, 'iva'=>NULL, 'salida_puerto'=>NULL, 'maniobras'=>NULL, 'contacto_almacen'=>NULL, 'entrega'=>NULL,'id_regreso_v'=>NULL)),
										 'numCargos' => 0,
										);	
	$data['adjuntos']  			= array();
	$data['usoCFDI']            = $this->md_sat->traeDatosUsosCFDI();
	$data['regimenFiscal']      = $this->md_sat->traeDatosRegimenFiscal();
	$data['metodoPago']      	= $this->md_sat->traeMetodoPago();
	$data['formaPago']       	= $this->md_sat->traeFormaPago();
	$data['monedaSAT']       	= $this->md_sat->traeMonedaSAT();
	$data['tipoRelacion']	 	= $this->md_sat->traeTipoRelacionSAT();
	$data['tipoComprobante'] 	= $this->md_sat->traeTiposComprobantesSAT();
	$data['fechaExpedicion']    = date('d/m/Y');
								
	$this->load->view('vw_lg_frm_ped',$data);
}

/***
	Metodo Principal del controlador para Guargar y acturalizar un pedido
****/
public function guardar($id_in, $accion, $forma)
{	
try{
	$this->validaSS();
	$this->load->library('email');
	$this->load->library('word');
	$this->load->helper('date');	
		
	$this->load->model('md_aduana');
	$this->load->model('md_flete');
	$this->load->model('md_producto');
	$this->load->model('md_seguro');
	$this->load->model('md_transporte');
	$this->load->model('md_rastreo');

	$this->load->helper('date');	
			
	$this->user 	  = $this->session->userdata('datos_sesion');	
	$data['usuario']  = element('nombre', $this->user['0'])." ".  element('apellidos', $this->user['0']);
	$data['iconuser'] = '<img src="'.base_url().'images/user.png"/>';
	$correo 	  	  = element('correo', $this->user['0']); 
	$hoy              = date('Y-m-d H:i:s');
    $id_pedido        = $id_in;	
	$fecha_alta       = $hoy;

       switch ($forma) 
        {
         case "ENC": 
            $carta_garantia = 0;//$this -> input -> post('carta_garantia');
            $carta_no       = NULL;
            $monto_carta_no = NULL;
/*
            if($carta_garantia === "48") // regla de negocio
            {
                $carta_no	= $this -> input -> post('carta_no');
                $monto_carta_no = $this -> input -> post('monto_carta_no');
			}
*/
            $rfc                = $this -> input -> post('rfc');
            $carrier            = $this -> input -> post('carrier');
            $shipper            = $this -> input -> post('shipper');
            $num_booking        = $this -> input -> post('num_booking');            
            $num_mbl            = $this -> input -> post('num_mbl');
            $num_hbl            = $this -> input -> post('num_hbl');            
            $ins_envio          = $this -> input -> post('ins_envio');
            $ins_booking        = $this -> input -> post('ins_booking');
            $revalidar_aa       = $this -> input -> post('revalidar_aa');
            $num_contenedor     = $this -> input -> post('num_contenedor');
            $id_coti            = $this -> input -> post('cotis');
			$etd 			    = $this->utils->senniDateFormat( $this->input->post('etd') ); 
			$eta 			    = $this->utils->senniDateFormat( $this->input->post('eta') );
			$tipo_embarque      = $this -> input -> post('tipo_embarque');         
			$pol      			= $this -> input -> post('pol');            
			$pod1      			= $this -> input -> post('pod1');            
			$pod2      			= $this -> input -> post('pod2');    			
			$status 		    = $this->input->post('status_track');
			$agente_proveedor 	= $this->input->post('agente_proveedor');
			$orden_compra 		= $this->input->post('orden_compra');
			$referencia_proveedor = $this->input->post('referencia_proveedor');			
			
            if($accion == "E")
              { $this -> md_pedido -> actualizaPedido($id_in, array('status_track'=>$status,'correo' => $correo,'fecha_modificacion' => $fecha_alta,'rfc' => $rfc,'carrier' => $carrier,'shipper' => $shipper,'carta_garantia' => $carta_garantia,'carta_no' => $carta_no,'monto_carta_no'=> $monto_carta_no,'num_booking' => $num_booking,'num_mbl' => $num_mbl,'num_hbl' => $num_hbl,'ins_envio' => $ins_envio,'ins_booking' => $ins_booking,'revalidar_aa'=> $revalidar_aa,'id_coti' => $id_coti,'tipo_embarque'=>$tipo_embarque,'pol'=>$pol,'pod1'=>$pod1,'pod2'=>$pod2, 'etd'=>$etd, 'eta'=>$eta, 'agente_proveedor'=>$agente_proveedor,'orden_compra'=>$orden_compra, 'referencia_proveedor'=>$referencia_proveedor)); } 
            else
              { $this -> md_pedido -> insertaPedido(array('id_pedido'=> $id_in,'status_track'=>$status,'correo' => $correo,'fecha_alta' => $fecha_alta,'rfc' => $rfc,'carrier' => $carrier,'shipper' => $shipper,'carta_garantia' => $carta_garantia,'carta_no' => $carta_no,'monto_carta_no'=> $monto_carta_no,'num_booking' => $num_booking,'num_mbl' => $num_mbl,'num_hbl' => $num_hbl,'ins_envio' => $ins_envio,'ins_booking' => $ins_booking,'revalidar_aa'=> $revalidar_aa,'id_coti' => $id_coti,'tipo_embarque'=>$tipo_embarque,'pol'=>$pol,'pod1'=>$pod1,'pod2'=>$pod2, 'etd'=>$etd, 'eta'=>$eta, 'agente_proveedor'=>$agente_proveedor,'orden_compra'=>$orden_compra, 'referencia_proveedor'=>$referencia_proveedor )); } 
 
         break;
		 case "PROD": 
			
			$vessel_voyage      = $this -> input -> post('vessel_voyage');	
			$this -> md_pedido -> actualizaPedido($id_pedido, array('vessel_voyage' => $vessel_voyage)); 

            $this -> md_producto -> delete_producto($id_pedido);
            $productos = $this -> input -> post('num_prod');

            for ($x = 0; $x <= $productos; $x++) 
            {
                $nombre    		 = $this->input->post('nombre'.$x);
				$qty_contenedor  = $this->input->post('qty_contenedor'.$x);
				$tipo_contenedor = $this->input->post('tipo_contenedor '.$x);
                $commodity 		 = $this->input->post('commodity'.$x);
                $peso  	   	     = $this->input->post('peso'.$x);
                $tipo_servicio   = $this->input->post('tipo_servicio'.$x);

                if($nombre != "")	
                  { $this->md_producto->insert_producto($id_pedido,$nombre,$qty_contenedor,$tipo_contenedor,$commodity,$peso,$tipo_servicio); }
            }
         break;
         case "FLET": 
			
            $this -> md_flete -> delete_flete($id_pedido);
			$verificacion_origen = $this -> input -> post('verificacion_origen');			
			$moneda              = $this -> input -> post('moneda');
            $tipo_cambio         = $this -> input -> post('tipo_cambio');
			$total_costos_mxn 	 = $this->input->post('total_costos_mxn');
			$total_costos_usd 	 = $this->input->post('total_costos_usd');
			$total_ventas_mxn 	 = $this->input->post('total_ventas_mxn');
			$total_ventas_usd 	 = $this->input->post('total_ventas_usd');
            $tipos_servicio      = $this -> md_catalogo -> poblarServicios("tipo_servicio","TS");
            $cargos              = array();
            $cargosIVA           = array();
            $terminos            = array();
			$fletes              = array();
			
            $this -> md_pedido -> delete_pedido_termino($id_pedido);
            $this -> md_pedido -> delete_pedido_cargo($id_pedido);
            $this -> md_pedido -> delete_pedido_concepto($id_pedido);	

			$this -> md_pedido -> actualizaPedido($id_in,array('moneda'=> $moneda,'tipo_cambio'=>$tipo_cambio, 'total_costos_mxn'=>$total_costos_mxn, 'total_costos_usd'=>$total_costos_usd, 'total_ventas_mxn'=>$total_ventas_mxn, 'total_ventas_usd'=>$total_ventas_usd)); 
			
			foreach($tipos_servicio as $llave => $valor)
            {
                if ($llave != 0 )
                { 
                    $numconceptos = $this -> input -> post($llave.'numconceptos');								
                    for ($x = 0; $x <= $numconceptos; $x++) 
                    {
                        $concep      = $this -> input -> post($llave.'concep'.$x);
                        $concep_dato = $this -> input -> post($llave.'concep_dato'.$x);
                        if ($concep != "")
                        { $this ->  md_pedido -> insert_pedido_concepto($concep,$concep_dato,$llave,$id_pedido);}
                    }

                    $numcargos = $this -> input -> post($llave.'numcargos');						
                    for ($x = 0; $x <= $numcargos; $x++) 
                    {
                        $cargo 	 = $this -> input -> post($llave.'cargoV'.$x);
                        $importe = $this -> input -> post($llave.'importeV'.$x);
                        $unidad  = $this -> input -> post($llave.'unidadV'.$x);
                        $iva 	 = $this -> input -> post($llave.'ivaV'.$x);						
						$status  = $this -> input -> post($llave.'statusV'.$x)==""?NULL:$this -> input -> post($llave.'statusV'.$x);						
                        if ($cargo != "")
                        {
							$subtotal = $importe * $unidad;
							$this->md_pedido->insert_pedido_cargo($cargo, $importe, $unidad, $subtotal, NULL, NULL, "VENTA", $iva, $llave, $status, $id_pedido);
                            if($iva == "1")
                                { $cargosIVA[] = array('servicio' => $valor,'cargo' => $cargo,'importe' => $importe); }
                            else
                                { $cargos[]    = array('servicio' => $valor,'cargo' => $cargo,'importe' => $importe); }
                        }
					}
					
					$numcostos = $this -> input -> post($llave.'numcostos');
                    for ($x = 0; $x <= $numcostos; $x++) 
                    {
                        $cargo 	 = $this -> input -> post($llave.'cargoC'.$x);
                        $importe = $this -> input -> post($llave.'importeC'.$x);
                        $unidad  = $this -> input -> post($llave.'unidadC'.$x);
                        $iva 	 = $this -> input -> post($llave.'ivaC'.$x);
						$monedaC = $this -> input -> post($llave.'monedaC'.$x);
						$tipoC   = $this -> input -> post($llave.'tipo_cambioC'.$x);
						log_message('error', 'monedaC: '.$monedaC);
						log_message('error', 'tipoC: '.$tipoC);
                        if ($cargo != "")
                        {
							$subtotal = $importe * $unidad;
							$this->md_pedido->insert_pedido_cargo($cargo, $importe, $unidad, $subtotal, $monedaC, $tipoC, "COSTO", $iva, $llave, NULL, $id_pedido);

                            if($iva == "1")
                                { $cargosIVA[] = array('servicio' => $valor,'cargo' => $cargo,'importe' => $importe); }
                            else
                                { $cargos[]    = array('servicio' => $valor,'cargo' => $cargo,'importe' => $importe); }
                        }
						
                    }

                    $numterminos  = $this -> input -> post($llave.'numterminos');			
                    for ($x = 0; $x <= $numterminos; $x++) 
                    {
                        $termino      = $this -> input -> post($llave.'termino'.$x);								
                        $termino_dato = $this -> input -> post($llave.'termino_dato'.$x);
                        if ($termino != "")
                        {
                            $this ->  md_pedido -> insert_pedido_termino($termino,$termino_dato,$llave,$id_pedido);
                            if($x == 0)
                                { $termino_dato = $this->md_catalogo->traeDescOpcion($this -> input -> post($llave.'termino_dato'.$x)); }
                            $terminos[] = array('servicio' => $valor,'termino' => $termino,'termino_dato' => $termino_dato);
                        }
                    }												
                }
             $this->guardaProfitAX($id_in,"FLET");   
            }
         break;
         case "DAA":
            
         break;     
         case "TRAN": 
            $this ->  md_seguro     -> delete_seguro($id_pedido);
            $this ->  md_transporte -> delete_transporte($id_pedido);
            $costoSeg  = $this -> input -> post('costo_s');
            $cobertura = $this -> input -> post('cobertura');
            $ivaSeg    = $this -> input -> post('iva_s');
            $ventaSeg  = $this -> input -> post('venta_s');

            $this ->  md_seguro -> insert_seguro($id_pedido,$costoSeg,$ventaSeg,$ivaSeg,$cobertura);
            if($ventaSeg != NULL)
            {
                if($ivaSeg == "1")
                    { $cargosIVA[] = array('servicio' => ' ','cargo' => 'SEGURO','importe' => $ventaSeg); }
                else
                    { $cargos[]    = array('servicio' => ' ','cargo' => 'SEGURO','importe'  => $ventaSeg); }
            }

            $regreso_vacio    = $this -> input -> post('regreso_v');
            $costo            = $this -> input -> post('costo_tt');	
            $salida_puerto    = $this -> input -> post('salida_puerto');
            $maniobras        = $this -> input -> post('maniobras');
            $contacto_almacen = $this -> input -> post('contacto_almacen');
            $entrega          = $this -> input -> post('entrega');	
            $iva              = $this -> input -> post('iva_tt');
            $venta            = $this -> input -> post('venta_tt');            

            if($venta != NULL)
            {
                if($iva == "1")
                { $cargosIVA[] = array('servicio' => ' ','cargo' => 'TRANSPORTE','importe' => $venta); }
                else
                { $cargos[]    = array('servicio' => ' ','cargo' => 'TRANSPORTE','importe'=> $venta); }
            }
            
            $this ->  md_transporte -> insert_transporte($id_pedido,$regreso_vacio,$costo,$venta,$iva,$salida_puerto,$maniobras,$contacto_almacen,$this->utils->senniDateFormat($entrega));
            
            $this->guardaProfitAX($id_in,"TRAN");
         break;
         case "TRAC": 
            $movs             = $this->input->post('num_track');           
            $mandarPrefactura = FALSE;
			$mandarRetro      = FALSE;
			$mandarNoti       = FALSE;
			$notiStatus       = array();
            
            $this->md_rastreo->delete_rastreo($id_pedido);
            
            for ($x = 0; $x <= $movs; $x++) 
            {				  
				$status = $this->input->post('status'.$x);
				if($status != "" & $status != "0")
				{ 
					$fecha_r       = $this->utils->senniDateFormat( $this->input->post('fecha_r'.$x) ); 
					$descripcion   = $this->input->post('descripcion'.$x);
					$observaciones = $this->input->post('observaciones'.$x);
					$noti 	 	   = $this->input->post('noti_track'.$x) != "1" ? "0" : "1";
					$notiStatus[]  = array('status'=> $status,'fecha_r' => $fecha_r,'descripcion' => $descripcion,'observaciones'=> $observaciones,'noti'=>$noti);
					$this->md_rastreo->insert_rastreo($id_pedido,$status,$descripcion,$fecha_r,$observaciones,$noti); 
				}
            }            
            $this -> md_pedido -> actualizaPedido($id_in,array('status_track'=>$status,'fecha_modificacion' => $fecha_alta));
          

            if ($mandarRetro == TRUE)
            {
                $cliente = $this->md_cliente->traeDetalleClientePorEn($rfc,"clientes","c","*");
                $this->mandarCorreoRetro($id_pedido,$cliente[0]['razon_social'],$cliente[0]['correo'],$correo,CORREO_CONTACTO);
			}

         break;
         case "PROF": 
             $this->guardaProfitAX($id_in,"");             
         break;
        }	
echo json_encode(array("id_in"=>$id_in,"accion"=>$accion,"forma"=>$forma));                

} catch (Exception $e) { log_message('error', 'guardar pedido Excepción:'.$e->getMessage()); }	
}

private function guardaProfitAX($id_in,$forma)
{
 try
 { 
    $profit_origen	= $this -> input -> post('profit_origen'.$forma);
    $profit             = $this -> input -> post('profit_c'.$forma);
    $costo_tot          = $this -> input -> post('costo_t'.$forma);
    $venta_tot          = $this -> input -> post('venta_t'.$forma);
    $comision_ventas   = $this -> input -> post('comision_ventas'.$forma);
    $comision_operaciones = $this -> input -> post('comision_operaciones'.$forma);
    $this -> md_pedido -> actualizaPedido($id_in,array('profit_origen'=>$profit_origen,'profit' => $profit,'costo_tot' => $costo_tot,'venta_tot' => $venta_tot,'comision_ventas' => $comision_ventas,'comision_operaciones' => $comision_operaciones));
 } catch (Exception $e) {echo ' guardar Excepción: ',  $e, "\n";}
}


public function downloadPF($filename)
	{
		$this->load->helper('download');			

		$data = file_get_contents("./".$this->output_dir."/prefactura/".$filename);

		force_download($filename, $data);	
	}

public function	borraPFAX()
{
		
	$fileName = $this -> input -> post('nombreArchivo');
	$dir 	  = $this->output_dir."prefactura/";	
	$filePath = $dir . $fileName . '.pdf';
	
	if (file_exists($filePath)) 		
		unlink($filePath);		
}

public function borrar($num_guia=0)
{		

try{
	$this->validaSS();
	$this ->  md_pedido -> borra_pedido($num_guia);	
	
	$this->pg_pedidos(0,". Embarque con referencia SILTEX <strong>".$id_pedido.'</strong> elimando exit&oacute;samente!');
	} catch (Exception $e) {echo 'editar PEdido Excepción: ',  $e->getMessage(), "\n";}

}

public function detalle($num_guia=0,$noti="",$tipoN="")
{	
	$this->validaSS();	
	$data['titulos']  = array("navegador" => TITULO_NAVEGADOR, 
                                  "ventana"   => TITULO_VENTANA,
                                  "frase"     => "\"Hacer de lo simple algo complicado es com&uacute;n; hacer de lo complicado algo simple, incre&iacute;blemente simple, es creatividad\" <br>- Charles Mingus",
				  "titulo"    => "Detalle del Embarque con referencia SILTEX: <strong>".$num_guia."</strong>");
	
	
	$data['usuario'] = element('nombre', $this->user['0'])." ".element('apellidos', $this->user['0']);
	$data['iconuser'] = '<img src="'.base_url().'images/user.png"/>';
	
	if ($noti != "")
	{
		$data['noti'] = $noti;
		$data['tipoN'] = $tipoN;
		$this -> md_pedido -> notificacionRevisada($num_guia,element('correo', $this->user['0']));
		 
	}
			
	$data['pedido'] = $this->traeDetallePedido($num_guia, $this->md_catalogo->poblarServicios("tipo_servicio","TS"));
	$data['ligaCoti'] = '<a href="'.base_url().'cotizador/editar/'.$data['pedido']['encabezado'][0]['id_coti'].'" >cotización</a>';
		
	$this->load->view('vw_lg_detalle_ped',$data);

}


public function consulta($mensajeConfirm="")
{
    $this->load->model('md_proveedor');
    try{
        $this->validaSS();
	
	$param = array("titulo"          => "Bandeja de Embarques ".$mensajeConfirm,
                       "titulos"         =>array("navegador" => TITULO_NAVEGADOR, 
                                                 "ventana"   => TITULO_VENTANA,
                                                    "frase"     => "\"Hacer de lo simple algo complicado es com&uacute;n; hacer de lo complicado algo simple, incre&iacute;blemente simple, es creatividad\" <br>- Charles Mingus",
                                                    "titulo"    => "Bandeja de Embarques ".$mensajeConfirm),
                       "colBandeja"      => array(' ','Referencia '.NOMBRE_CORTO,'Status','Cliente', 'Gu&iacute;a Master','Adjuntos','Acciones'),
                       "registrosPagina" => $this->registros_x_pagina,
                       "controlador"     => "pedido",
                       "numColGrid"      => "6",
                       "formaId"         => "filtrosPed",
                       "f1Label"         => "Referencia ".NOMBRE_CORTO,
                       "f1Image"         => "fa fa-truck",
                       "f2Label"         => "Guía Master",
                       "f2Image"         => "fa fa-folder-open",
                       "f3Label"         => "Guía House",
                       "f3Image"         => "fa fa-folder",
                       "f4Label"         => "Status",
                       "f4Select"        => $this -> md_catalogo  -> poblarSelect("status"),
                       "f5Label"         => "Cliente",
                       "f5Select"        => $this -> md_cliente   -> poblarSelect(),
                       "f6Label"         => "Carrier",
                       "f6Select"        => $this -> md_proveedor -> poblarSelect("0"),                                   
                       "f7Label"         => "Moneda",
                       "f8Label"         => "Profit",
                       "accion"          => "nuevo",
					   "tipo"            => "Embarque",
					   "mensajeConfirm"  => $mensajeConfirm
                      );
       
        $data = $this->createFilter($param);				  				        	     
        $data['usuario']  = element('nombre', $this->user['0'])." ".  element('apellidos', $this->user['0']);
        $data['iconuser'] = '<img src="'.base_url().'images/user.png"/>';
	   
        $this->load->view('vw_lg_fil_pag',$data);
      } catch (Exception $e) {echo ' consulta Excepción: ',  $e->getMessage(), "\n";}	
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
            $f5       = $this -> input -> post('f5');
            $f6       = $this -> input -> post('f6');
            $f7       = $this -> input -> post('f7');
            $deF8     = $this -> input -> post('deF8');
            $aF8      = $this -> input -> post('aF8');
            
                         
            $grid = $this -> md_pedido-> traePedidosFiltros($this->registros_x_pagina,$pagina,$f1,$f2,$f3,$f4,$f5,$f6,$f7,$fechaIni,$fechaFin,$deF8,$aF8);
            
            echo json_encode ($grid);                          
            
        } catch (Exception $e) {echo ' paginarAX Excepción: ',  $e->getMessage(), "\n";}		
    } 
	
public function pg_pedidos($offset=0, $mensajeConfirm="")
{	
	$this->validaSS();
	$this -> load -> library('pagination');
	$data['titulos']  = array("navegador" => TITULO_NAVEGADOR, 
                                  "ventana"   => TITULO_VENTANA,
                                  "frase"     => "\"Hacer de lo simple algo complicado es com&uacute;n; hacer de lo complicado algo simple, incre&iacute;blemente simple, es creatividad\" <br>- Charles Mingus",
				  "frase"     => "Servicios Integrales Especializados en Log&iacute;stica");
	
	$this->user 			  = $this->session->userdata('datos_sesion');
	$data['usuario']  = element('nombre', $this->user['0'])." ".element('apellidos', $this->user['0']);
	$data['iconuser'] = '<img src="'.base_url().'images/user.png"/>';
	$tipo_u 		  =  "".element('tipo', $this->user['0']);
			  			
	if ($tipo_u == "A")
           { $tipo_u = ""; }
	else
           { $tipo_u= element('correo', $this->user['0']); }
	
	$url_a_paginar = '/pedido/pg_pedidos/';
	$registros_x_pagina = 10;		
					   	
	$pedidos = $this -> md_pedido -> traePedidos($tipo_u,$registros_x_pagina,$offset);
	
	$config['base_url']   = base_url().$url_a_paginar;
	$config['total_rows'] = $pedidos["conteo"];
	
	$config['per_page']   = $registros_x_pagina;
	$config['num_links']  = 5;
	
	$this -> pagination -> initialize($config);					
                    
	$data['links']   = $this -> pagination -> create_links();	
	
	$tmpl = array ( 'table_open'  => '<table id="datagrid" class="display compact nowrap" style="width:100%">' );
	$this->table->set_template($tmpl);
	 
	$header = array(' ','Referencia '.NOMBRE_CORTO,'Status','Cliente', 'Gu&iacute;a Master', 
					'Adjuntos','Acciones');
	$this -> table -> set_heading($header);	
	$x = $offset;
	
	foreach($pedidos["registros"] as $row)
	{		
            $x = $x + 1;		
            $celda1  = array('data'  => $x,'align'=>"center");		
            $celda2  = array('data'  => $row['id_pedido'],'align'=>"center");
            $celda3  = array('data'  => $this->utils->revisaValorVacio($row['status'])      ,'align'=>"left");
            $celda4  = array('data'  => $this->utils->revisaValorVacio($row['razon_social']), 'align'=>"left",'width'=>"200px");
            $celda6  = array('data'  => $this->utils->revisaValorVacio($row['num_mbl'])     , 'align'=>"left",'width'=>"130px");
            $celda10 = array('data' => array());
            $celda11 = array('data' => '<a href="'.base_url().'pedido/detalle/'.$row['id_pedido'].'">
                                                               <img title="Detalle Embarque" src="'.base_url().'images/detail.png" width="20px"></a>
                                                               &nbsp;'.
                                                               '<a href="'.base_url().'pedido/editar/'.$row['id_pedido'].'">
                                                               <img title="Editar Embarque" src="'.base_url().'images/edit.png" width="20px"></a>
                                                               &nbsp;'.
                                                               '<img class="boton_confirm" title="Borrar Embarque" id="'.$row['id_pedido'].'" 
                                                               src="'.base_url().'/images/erase2.png" width="20px">'
                                                               ,'align'=>"center");

            $this->table->add_row(array($celda1,
                                        $celda2,
                                        $celda3,
                                        $celda4,
                                        $celda6,
                                        $celda10,
                                        $celda11)
                                        );
	}

   $data['accion'] 	= "nuevo";
   $data['tipo'] 	= "Embarque";
   $data['controlador'] = "pedido";
   $data['orden'] 	= "desc";	
   $this->load->view('vw_lg_consulta',$data);
}


public function	agregaArchivoAdjuntoAX()
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
			move_uploaded_file($_FILES["myfile"]["tmp_name"],$this->output_dir.$fileName);
			
			$ret[]= $fileName;
		}
		else  //Multiple files, file[]
		{
		  $fileCount = count($_FILES["myfile"]["name"]);
		  for($i=0; $i < $fileCount; $i++)
		  {
			$fileName = $_FILES["myfile"]["name"][$i];
			move_uploaded_file($_FILES["myfile"]["tmp_name"][$i],$this->output_dir.$fileName);
			$ret[]= $fileName;
		  }
		
		}
		echo json_encode($ret);
	 }
}


public function	borraArchivoAdjuntoAX()
{

	if(isset($_POST["op"]) && $_POST["op"] == "delete" && isset($_POST['name']))
	{
		$fileName =$_POST['name'];
		$filePath = $this->output_dir. $fileName;
		if (file_exists($filePath)) 		
			unlink($filePath);
		
		echo "Deleted File ".$fileName."<br>";
	}
}

public function	renombraAdjuntoAX()
{	
try{	
	$extension     	   = $this -> input -> post('extension');
	$nombreArchivo 	   = $this -> input -> post('nombreArchivo');
	$id_pedido     	   = $this -> input -> post('id_pedido');
	$tipoDoc           = $this -> input -> post('tipoDoc');
	$nombreTipoArchivo = $this->utils->generaNombrePDF($this -> input -> post('nombreTipoArchivo')); 
	$desc_adjunto 	   = $this -> input -> post('nombreTipoArchivo');

	$nombreArchivo = $nombreArchivo.".".$extension;
	$nombreSenni   = $nombreTipoArchivo.'_'.$id_pedido.".".$extension;
    $pathFile      = $this->output_dir.$id_pedido.'/'.$nombreSenni;
        
	if (file_exists($this->output_dir.$id_pedido) == FALSE) 
	   { mkdir($this->output_dir.$id_pedido, 0755); 	  }    
	
	$r = rename ($this->output_dir.$nombreArchivo, $pathFile);		
	$id_adjunto = $this->md_pedido->insert_pedido_adjunto( array('adjunto'=>$pathFile,'SEGURIDAD'=>$tipoDoc,'desc_adjunto'=>$desc_adjunto,'id_pedido'=>$id_pedido) );
                
	echo json_encode (array("nombreSenni" => $nombreSenni,
							"id_pedido"   => $id_pedido,
							"tipoDoc"     => $tipoDoc,
							"desc_adjunto"=> $desc_adjunto,
							"id_adjunto"  => $id_adjunto,
							"result"      => $r  
							));
	
	} catch (Exception $e) {echo 'renombraAdjuntoAX Excepción: ',  $e->getMessage(), "\n";}	
}


public function	borraAdjuntoCargadoAX()
{	
try{	
	$extension     = $this -> input -> post('extension');
	$nombreArchivo = $this -> input -> post('nombreArchivo');
	$id_pedido     = $this -> input -> post('id_pedido');
	$opcionTA      = $this -> input -> post('opcionTA');
        $id_adjunto    = $this -> input -> post('id_adjunto');
	
	$nombreArchivo = $nombreArchivo.".".$extension;
	$filePath      = (strpos($nombreArchivo, 'adjunto') === 0)? $nombreArchivo : $this->output_dir.$id_pedido.'/'.$nombreArchivo;

	if (file_exists($filePath) )
           { unlink($filePath);	   }
	if ( $id_adjunto =='0')
            { $campo ="";
                switch (true) { case (strpos($nombreArchivo, "MBL")!== false) : $this->md_pedido->actualizaPedido($id_pedido,array("adjunto_mbl" => NULL)); break;     
                                case (strpos($nombreArchivo, "HBL")!== false) : $this->md_pedido->actualizaPedido($id_pedido,array("adjunto_hbl" => NULL)); break;     
                                case (strpos($nombreArchivo, "Factura_Producto")!== false) : $this->md_pedido->actualizaPedido($id_pedido,array("adjunto_facturaP" => NULL));  break;     
                                case (strpos($nombreArchivo, "Lista_")!== false) : $this->md_pedido->actualizaPedido($id_pedido,array("adjunto_le" => NULL));  break;     
                                case (strpos($nombreArchivo, "Poliza")!== false) : $this->md_pedido->actualizaPedido($id_pedido,array("adjunto_poliza" => NULL));  break;     
                                case (strpos($nombreArchivo, "Factura_SENNI")!== false) : $this->md_pedido->actualizaPedido($id_pedido,array("adjunto_factura" => NULL));  break;     
                              }               
            }
        else
            { $this->md_pedido->delete_pedido_adjunto($id_pedido, $id_adjunto); }
        
	echo json_encode (array("opcionTA" => $opcionTA, 'id_pedido'=>$id_pedido, 'id_adjunto'=>$id_adjunto));
	
	} catch (Exception $e) {echo 'renombraAdjuntoAX Excepción: ',  $e->getMessage(), "\n";}	
}



public function	datosTimbrarAX($portal=NULL)
{	

try{$this->load->model('md_pedido' );
	$this->load->model('md_cliente');
	$this->load->model('md_catalogo');
	
	$id_pedido  = $this->input->post('id_pedido');	

	$rfcCliente = $this->input->post('rfc');
	$conceptos = $this->md_pedido  ->traeCargosTimbrarAX($id_pedido);	
	$moneda    = $this->md_pedido  ->traeMonedaTimbrarAX($id_pedido);
	$cliente   = $this->md_cliente ->traeDatosFiscales($rfcCliente);    
	
	$emisior   = $this->md_catalogo->traeDatosFiscales(($portal == NULL ? RFC : RFC_SENNI), "rfc, nombre_fiscal, domicilio_fiscal, cp_fiscal, correo_fiscal");
	$adjuntoFac= $this->md_pedido  ->traeAdjuntosFacturaREP($id_pedido);	
	$factura   = $this->md_sat 	   ->traeFacturaVistaPreviaById($id_pedido);
	$cfdiRel   = $this->md_sat 	   ->traeFacturaCfdiRelById($id_pedido);

	if(empty($factura)) 
		 {	$vp = NULL;
			$facturaCon = array(); 
		 } 
	else {
			$vp = $factura['uuid'];
			$facturaCon = $this->md_sat->traeFacturaConceptosById($factura['id_factura'] );
		 } 	

	$facturaREP = $this->md_sat->traeFacturaPagosByIdPedido($id_pedido);	
	
	 
	echo json_encode( array( "cliente"   => $cliente
							,"conceptos" => $conceptos
							,"moneda"	 => $moneda
							,"emisor"	 => $emisior 
							,"adjuntoFac"=> $adjuntoFac
							,"factura"	 => $factura
							,"facturaCon"=> $facturaCon
							,"facturaREP"=> $facturaREP
							,"cfdiRel"   => $cfdiRel
							,"dir"		  =>$this->output_dir.$id_pedido.'/cfdi/'
							,"vistaprevia"=>($vp == NULL ? "1":"0")
						   )
					);
	
	} catch (Exception $e) { log_message('error', 'datosTimbrarAX Excepción:'.$e->getMessage()); }	
}


public function	timbrarAX($id_pedido=0, $action="", $portal=NULL)
{
date_default_timezone_set('America/Mexico_City');
Header('Access-Control-Allow-Origin: *');	
try{$this->load->model('md_pedido' );
	$this->load->model('md_cliente');
	$this->load->model('md_catalogo');
	$this->load->model('md_sat');	

	$this->load->library('Pdf');	
	$this->load->library('Contador'); 	

	$this->load->helper('file');
	$this->load->helper('date');

	$regimen_fiscal  	   = $this->input->post('regimen_fiscal');
	$numConceptosConCveSAT = $this->input->post('numConceptosConCveSAT');
 
	$dbFiscal 			  = $this->md_catalogo->traeDatosFiscales( ($portal == NULL ? RFC : RFC_SENNI), NULL);
	$tipoComprobante	  = $this->md_sat->traeTipoComprobanteSAT(TIPOCOMP_FACT);
	$impuesto			  = $this->md_sat->traeImpuestoSAT(IMPUESTO);

	$flagTasaSinIVA			 = FALSE;
	$flagTasaIVA			 = FALSE;
	$ImpuestoTransTasaIVA    = 0;
	$ImpuestoTransTasaSinIVA = 1;

	$dbFiscal['dir_cfdi'] = $this->output_dir . $id_pedido . "/";
	
	$fe_yymmdd = $this->utils->arrayDateFormat( $this->input->post('fecha_expedicion') ); 
	$date = new DateTime();	
	$date->setDate($fe_yymmdd['year'], $fe_yymmdd['month'], $fe_yymmdd['day']);
	$fechaExpedicion = $date->format('Y-m-d\TH:i:s'); 
 
	$resp     = NULL;	
	$contador = new Contador();	
	$contador->Init($dbFiscal, $portal);	
	
	$datos = $contador->getconfigTimbrado();   

	// Datos de la Factura
	$datos['id_factura'] = $this->input->post('id_factura')==NULL ? now() : $this->input->post('id_factura'); 
	$datos['id_pedido']  = $id_pedido;
	$datos['factPDF']    = array();	

	$datos['factPDF']['logo'] 	   = ($portal == NULL ? "Logo.jpg" : "LogoSenni.jpg");
	$datos['factPDF']['logoWidth'] = ($portal == NULL ? "120" : "200");
	$datos['factPDF']['logoHeight']= ($portal == NULL ? "75" : "80");	

	$datos['factura']['LugarExpedicion']  = $dbFiscal['cp_fiscal'];//'77712';		
	$datos['factura']['RegimenFiscal']    = $this->input->post('regimen_fiscal');//'601';
	$datos['factPDF']['RegimenFiscalDesc']= $this->md_sat->traeDescRegimenFiscal($this->input->post('regimen_fiscal'));		
	
	if($action == "vistaprevia" || $action == "timbrar") // FACTURA
	{		
		$datos['factura']['folio']            = $action == "vistaprevia"? "0" : $portal == NULL ? $this->md_sat->traeFolioConseutivo() : $this->input->post('folio') ;	
		$datos['factura']['fecha_expedicion'] = $fechaExpedicion;//$fechaExpedicion;//date('Y-m-d\TH:i:s', time() - 120);
		$datos['factura']['descuento']        = $this->input->post('descuentoSAT');//'0.00';
		$datos['factPDF']['notas']            = $this->input->post('notasFactura');//249.99;
		$datos['factura']['forma_pago']       = $this->input->post('forma_pago');//'04';
		$datos['factura']['forma_pagoDesc']   = $this->md_sat->traeFormaPagoDesc( $this->input->post('forma_pago') );
		$datos['factura']['metodo_pago']      = $this->input->post('metodo_pago');//'PUE';
		$datos['factura']['metodo_pagoDesc']  = $this->md_sat->traeMetodoPagoDesc( $this->input->post('metodo_pago') );
		$datos['factura']['moneda']           = $this->input->post('monedaSAT');//'MXN';
		$datos['factura']['serie']            = ($portal == NULL ? SERIE_SAT : SERIE_SAT_SENNI);//'A';
		$datos['factura']['subtotal']         = $this->input->post('subtotalSAT');//215.51;
		$datos['factura']['tipocambio']       = $this->input->post('tcSAT');//1;
		$datos['factura']['tipocomprobante']  = substr($tipoComprobante['sat_TipoDeComprobante'], 0, 1);
		$datos['factPDF']['tipocomprobanteDesc']= $tipoComprobante['Descripcion']; 
		$datos['factura']['total']            = $this->input->post('totalSAT');//249.99;
		$datos['factPDF']['totalConLetras']   = $this->utils->convertNumToChar( $this->input->post('totalSAT') );
		
		// Datos del Receptor
		$datos['receptor']['rfc']      = $this->input->post('rfcReceptor');//'SOHM7509289MA';
		$datos['receptor']['nombre']   = $this->input->post('rsReceptor');//'Pu&blico en General';
	
		// Datos de los conceptos			
		$y = -1;
		for ($x = 0; $x <= $numConceptosConCveSAT; $x++) 
			{	
				$concep = $this->input->post('conSATCodigo'.$x);
				if($concep != "")	
					{  
						$y++;
						$impConcepto = $this->input->post('conSATsubtot'.$x);						

						$datos['conceptos'][$y]['cantidad']      = $this->input->post('conSATCantidad'.$x);
						$datos['conceptos'][$y]['unidad']        = $this->input->post('conSATUM'.$x); //'PIEZA';
						//$datos['conceptos'][$y]['ID']            = $this->input->post('conSATID'.$x);//"M7390Z";
						$datos['conceptos'][$y]['descripcion']   = $this->input->post('conSATCargo'.$x);
						$datos['conceptos'][$y]['valorunitario'] = $this->input->post('conSATValorUni'.$x);//215.51;
						$datos['conceptos'][$y]['importe']       = $impConcepto;
						$datos['conceptos'][$y]['ClaveProdServ'] = $this->input->post('conSATCodigo'.$x);						
						$datos['conceptos'][$y]['ClaveUnidad']   = $this->input->post('conSATCveUnidad'.$x);
						
						$datos['pdfconceptos'][$y]['cantidad']      = $this->input->post('conSATCantidad'.$x);
						$datos['pdfconceptos'][$y]['unidad']        = $this->input->post('conSATUM'.$x); //'PIEZA';
						$datos['pdfconceptos'][$y]['ID']            = $this->input->post('conSATID'.$x);//"M7390Z";
						$datos['pdfconceptos'][$y]['descripcion']   = $this->input->post('conSATCargo'.$x);
						$datos['pdfconceptos'][$y]['valorunitario'] = $this->input->post('conSATValorUni'.$x);//215.51;
						$datos['pdfconceptos'][$y]['importe']       = $impConcepto;
						$datos['pdfconceptos'][$y]['ClaveProdServ'] = $this->input->post('conSATCodigo'.$x);
						$datos['pdfconceptos'][$y]['ClaveUnidad']   = $this->input->post('conSATCveUnidad'.$x);
						$datos['pdfconceptos'][$y]['sumaIVA']   	= $this->input->post('conSATIVA'.$x);
						
						//Datos de Impuestos
						if($this->input->post('conSATIVA'.$x) == "1")
						{
							$flagTasaIVA    = TRUE;
							$tasa['Factor'] = 'Tasa';
							$tasa['sat_TasaOCuota_Valor_Maximo'] = TASA_IVA;
							$ivaConcepto = $this->utils->toFixed( floatval($tasa['sat_TasaOCuota_Valor_Maximo']) * $impConcepto, 2);
							$ImpuestoTransTasaIVA += $ivaConcepto;

						} 
						else
						{
							$flagTasaSinIVA = TRUE;
							$tasa['Factor'] = 'Tasa';
							$tasa['sat_TasaOCuota_Valor_Maximo'] = TASA_IVA_CERO;							
							$ivaConcepto = '0.00';
						}
						//Datos de Impuestos
						$datos['conceptos'][$y]['Impuestos']['Traslados'][0]['Base']       = $impConcepto;
						$datos['conceptos'][$y]['Impuestos']['Traslados'][0]['Impuesto']   = $impuesto['sat_Impuesto'];//'002';
						$datos['conceptos'][$y]['Impuestos']['Traslados'][0]['TipoFactor'] = $tasa['Factor'];//'Tasa';
						$datos['conceptos'][$y]['Impuestos']['Traslados'][0]['TasaOCuota'] = $tasa['sat_TasaOCuota_Valor_Maximo'];//'0.160000';
						$datos['conceptos'][$y]['Impuestos']['Traslados'][0]['Importe']    = $ivaConcepto;

						$datos['pdfconceptos'][$y]['Impuestos']['Traslados'][0]['Base']       = $impConcepto;
						$datos['pdfconceptos'][$y]['Impuestos']['Traslados'][0]['Impuesto']   = $impuesto['sat_Impuesto'];//'002';
						$datos['pdfconceptos'][$y]['Impuestos']['Traslados'][0]['TipoFactor'] = $tasa['Factor'];//'Tasa';
						$datos['pdfconceptos'][$y]['Impuestos']['Traslados'][0]['TasaOCuota'] = $tasa['sat_TasaOCuota_Valor_Maximo'];//'0.160000';
						$datos['pdfconceptos'][$y]['Impuestos']['Traslados'][0]['Importe']    = $ivaConcepto;//34.48;							
					}
			}

		// Se agregan los Impuestos FACTURA	
		$indiceTranslados = -1;
		if($flagTasaIVA == TRUE)
		{
			$indiceTranslados++;
			$datos['impuestos']['translados'][$indiceTranslados]['impuesto']   = $impuesto['sat_Impuesto'];
			$datos['impuestos']['translados'][$indiceTranslados]['tasa'] 	   = TASA_IVA;
			$datos['impuestos']['translados'][$indiceTranslados]['importe']    = $this->utils->toFixed($ImpuestoTransTasaIVA,2 );
			$datos['impuestos']['translados'][$indiceTranslados]['TipoFactor'] = 'Tasa';
		}
		if($flagTasaSinIVA == TRUE)
		{
			$indiceTranslados++;
			$datos['impuestos']['translados'][$indiceTranslados]['impuesto']   = $impuesto['sat_Impuesto'];
			$datos['impuestos']['translados'][$indiceTranslados]['tasa']       = TASA_IVA_CERO;
			$datos['impuestos']['translados'][$indiceTranslados]['importe']    = 0.00;
			$datos['impuestos']['translados'][$indiceTranslados]['TipoFactor'] = 'Tasa';	
		}		
		$datos['impuestos']['TotalImpuestosTrasladados'] = $this->utils->toFixed($ImpuestoTransTasaIVA,2 );
		$datos['factPDF']['translados'][0]['base'] 	   	 = $this->utils->toFixed($ImpuestoTransTasaIVA,2 );

		// Datos del Receptor
		$datos['receptor']['UsoCFDI']  	 = $this->input->post('uso_cfdi');//'G03';
		$datos['factPDF']['UsoCFDIDesc'] = $this->md_sat->traeDescUsosCFDI($this->input->post('uso_cfdi'));	
	}
	else //REP
	{
		$datos['rep']['parcial_rep']    	  = $this->input->post('parcial_rep');					
		$datos['factura']['fecha_expedicion'] = date('Y-m-d\TH:i:s', time() - 120);
		$datos['factura']['subtotal'] 		  = '0';
		$datos['factura']['total'] 			  = '0';
		$datos['factura']['moneda'] 		  = 'XXX';				
		$datos['factura']['serie']            = SERIE_SAT_PAGO;//'P';				
		$datos['factura']['tipocomprobante']  = SERIE_SAT_PAGO;	
		$datos['factPDF']['tipocomprobanteDesc']= TIPOCOMP_PAGO; 		
		
		// Datos del Receptor
		$datos['receptor']['UsoCFDI']  	 = 'P01';
		$datos['factPDF']['UsoCFDIDesc'] = $this->md_sat->traeDescUsosCFDI('P01');

		//REP		
		$datos['rep']['moneda_rep']     = $this->input->post('moneda_rep');
		$datos['rep']['tc_rep']   	    = $this->input->post('tc_rep') == "" ? 1 : $this->input->post('tc_rep') ;
		$datos['rep']['monto_rep']      = $this->input->post('monto_rep');
		$datos['rep']['forma_pago_rep'] = $this->input->post('forma_pago_rep');		
		$datos['rep']['forma_pago_rep_desc'] = $this->md_sat->traeFormaPagoDesc( $this->input->post('forma_pago_rep') )["Descripcion"];
		$datos['rep']['facturaTipoCambio'] = $this->input->post('tcSAT');//1;
		$fe_yymmdd = $this->utils->arrayDateFormat( $this->input->post('fecha_rep') ); 
		$date = new DateTime();	
		$date->setDate($fe_yymmdd['year'], $fe_yymmdd['month'], $fe_yymmdd['day']);
		$fecha_rep = $date->format('Y-m-d\TH:i:s');
		$datos['rep']['fecha_rep']      = $fecha_rep;
		$datos['rep']['id_pedido']      = $id_pedido;		

		// Conceptos (valores por default)
		$datos['conceptos'][0]['ClaveProdServ'] = '84111506';
		$datos['conceptos'][0]['cantidad'] 		= '1';
		$datos['conceptos'][0]['ClaveUnidad'] 	= 'ACT';
		$datos['conceptos'][0]['descripcion'] 	= "Pago";
		$datos['conceptos'][0]['valorunitario'] = '0.0';
		$datos['conceptos'][0]['importe'] 		= '0.0';

		// Complemento de Pagos 1.0
		$datos['pagos10']['Pagos'][0]['FechaPago']	  = $datos['rep']['fecha_rep'];
		$datos['pagos10']['Pagos'][0]['FormaDePagoP'] = $datos['rep']['forma_pago_rep'];
		$datos['pagos10']['Pagos'][0]['MonedaP']	  = $datos['rep']['moneda_rep'] ;
		if ( $datos['rep']['moneda_rep'] =="USD")
		   { $datos['pagos10']['Pagos'][0]['TipoCambioP']  = $datos['rep']['tc_rep'] ; }
		$datos['pagos10']['Pagos'][0]['Monto']		  = $this->utils->toFixed( floatval( $datos['rep']['monto_rep'] ), 2 );

		$datos['pagos10']['Pagos'][0]['NumOperacion'] 	 = $this->input->post('NumOperacion');
		$datos['pagos10']['Pagos'][0]['RfcEmisorCtaOrd'] = $this->input->post('RfcEmisorCtaOrd');
		$datos['pagos10']['Pagos'][0]['CtaOrdenante']	 = $this->input->post('CtaOrdenante');
		$datos['pagos10']['Pagos'][0]['RfcEmisorCtaBen'] = $this->input->post('RfcEmisorCtaBen');
		$datos['pagos10']['Pagos'][0]['CtaBeneficiario'] = $this->input->post('CtaBeneficiario');

		$id_factura = $this->input->post('facturaPedido');
		if( $portal == NULL)
          {			
			$factura    = $this->md_sat->traeFacturaByIdFactura($id_factura);			
			$datos['id_factura'] = $factura['id_factura'];
			$datos['receptor']['rfc']    = $factura['rfc'];
			$datos['receptor']['nombre'] = $factura['nombre']; 
			$datos['factura']['folio']   = ($factura['folio']=="-1"?$factura['id_factura']:$factura['folio']) ."-".$datos['rep']['parcial_rep'];
			$datos["pagos10"]["Pagos"][0]["DoctoRelacionado"][0]["Folio"] 			 = ($factura['folio']=="-1"?$factura['id_factura']:$factura['folio']);
 
			$datos["pagos10"]["Pagos"][0]["DoctoRelacionado"][0]["IdDocumento"] 	 = $factura['uuid'];
			$datos["pagos10"]["Pagos"][0]["DoctoRelacionado"][0]["Serie"] 			 = $factura['serie'];			
			$datos["pagos10"]["Pagos"][0]["DoctoRelacionado"][0]["MonedaDR"] 		 = $factura['moneda'];
		
			if ( $datos['rep']['moneda_rep'] != $factura['moneda'])
			   { $datos['pagos10']['Pagos'][0]['DoctoRelacionado'][0]['TipoCambioDR'] = $factura['tipocambio'];}
			$datos["pagos10"]["Pagos"][0]["DoctoRelacionado"][0]["MetodoDePagoDR"]   = $factura['metodo_pago'];
		  }
		else 
			{
				$datos['id_factura'] = $this->input->post('id_facturaREP');
				$datos['factura']['folio'] = ($this->input->post('id_pedidoREP')=="-1"?$this->input->post('id_factura'):$this->input->post('id_pedidoREP')) ."-".$datos['rep']['parcial_rep'];
				$datos["pagos10"]["Pagos"][0]["DoctoRelacionado"][0]["Folio"] 			 = ($this->input->post('id_pedidoREP')=="-1"?$this->input->post('id_factura'):$this->input->post('id_pedidoREP')); 
				$datos["pagos10"]["Pagos"][0]["DoctoRelacionado"][0]["IdDocumento"] 	 = $this->input->post('uuidREP');
				$datos["pagos10"]["Pagos"][0]["DoctoRelacionado"][0]["Serie"] 			 = $this->input->post('serieREP');				
				$datos["pagos10"]["Pagos"][0]["DoctoRelacionado"][0]["MonedaDR"] 		 = $this->input->post('monedaREP');

				if ( $datos['rep']['moneda_rep'] != $this->input->post('monedaREP'))
			   	   { $datos["pagos10"]["Pagos"][0]["DoctoRelacionado"][0]["TipoCambioDR"] 	 = $this->input->post('tipocambioREP'); }
				$datos["pagos10"]["Pagos"][0]["DoctoRelacionado"][0]["MetodoDePagoDR"]   = $this->input->post('metodo_pagoREP');
				
				$datos['receptor']['rfc']    = $this->input->post('rfcReceptorREP');
				$datos['receptor']['nombre'] = $this->input->post('rsReceptorREP');
			}

	    $datos["pagos10"]["Pagos"][0]["DoctoRelacionado"][0]["NumParcialidad"]   = $datos['rep']['parcial_rep'];
	    $datos["pagos10"]["Pagos"][0]["DoctoRelacionado"][0]["ImpSaldoAnt"]      = $this->utils->toFixed( floatval($datos['rep']['monto_rep'] + $this->input->post('si'.$id_factura) ) , 2);
	    $datos["pagos10"]["Pagos"][0]["DoctoRelacionado"][0]["ImpPagado"] 		 = $this->utils->toFixed( floatval($datos['rep']['monto_rep'] ) , 2);
	    $datos["pagos10"]["Pagos"][0]["DoctoRelacionado"][0]["ImpSaldoInsoluto"] = $this->utils->toFixed( floatval($this->input->post('si'.$id_factura) ) , 2);		
	}
		
	$datos['factPDF']['emailReceptor'] = $this->input->post('emailReceptor');
	$datos['factPDF']['cpReceptor']    = $this->input->post('cpReceptor');	

	$datos['pdf'] = $dbFiscal;	
	
	$filename = $datos['factura']['tipocomprobante']."_".$datos['factura']['serie']."_".$datos['factura']['folio'].".pdf";
	$xmlname  = $datos['factura']['tipocomprobante']."_".$datos['factura']['serie']."_".$datos['factura']['folio']."_cfdi3_3.xml"; 
	// Ruta del XML Timbrado
	$datos['cfdi'] = $datos['dir_cfdi'] . $xmlname;

	switch ($action) 
	{
	 case "vistaprevia":
			$datos['factura']['uuid'] = NULL;
			$datos['factura']['representacion_impresa_certificado_no'] = NULL;
			$datos['factura']['fecha_timbrado']  = NULL;
			$datos['factura']['status'] = "VPF";

			$this->md_sat->insert_factura_timbrada($datos);

			$filename = "PREFACTURA_".$filename;
			$datos['emisor']['rfc'] 	  	  = $dbFiscal['rfc'];
			$datos['emisor']['nombre_fiscal'] = $dbFiscal['nombre_fiscal'];
			$datos['emisor']['cp_fiscal'] 	  = $dbFiscal['cp_fiscal'];
			$datos['emisor']['correo_fiscal'] = $dbFiscal['correo_fiscal'];			
			$this->generatePDF_Factura( $datos['dir_cfdi'] . $filename
									  , array("f" => $datos, "r" => array("archivo_png"=>"images/blank.png", "representacion_impresa_certificado_no"=>"","representacion_impresa_sello"=>"","representacion_impresa_selloSAT"=>"","representacion_impresa_certificadoSAT"=>"","representacion_impresa_cadena"=>"","folio_fiscal"=>"","fecha_timbrado"=>""  ) ) 
									  , 'vw_pdf_prefactura'
									  );
			$resp = array( "pdf"  => $filename, "dir" => $datos['dir_cfdi'], "vistaprevia"=>"1", "id_factura"=>$datos['id_factura'] );
	 break;	
	 case "timbrar":						 			
			if (PROD_FAC == 'NO')
			{
				// Datos del Emisor
				$datos['emisor']['rfc'] = 'XIA190128J61'; //RFC DE PRUEBA
				$datos['emisor']['nombre'] = 'ACCEM SERVICIOS EMPRESARIALES SC';  // EMPRESA DE PRUEBA
			}
log_message('error', 'datos:'.var_export($datos, true));
			$resp = $contador->Facturar($datos); 		
log_message('error', 'resp:'.var_export($resp, true));		
			if (count($resp['success']) != 0)
			{				
				$datos['emisor']['nombre_fiscal'] = $dbFiscal['nombre_fiscal'];
				$datos['emisor']['cp_fiscal'] 	  = $dbFiscal['cp_fiscal'];
				$datos['emisor']['correo_fiscal'] = $dbFiscal['correo_fiscal'];
				$datos['factura']['uuid'] = $resp['success']["uuid"];
				$datos['factura']['representacion_impresa_certificado_no'] = $resp['success']["representacion_impresa_certificado_no"];
				$datos['factura']['representacion_impresa_sello'] = $resp['success']["representacion_impresa_sello"];
				$datos['factura']['representacion_impresa_selloSAT'] = $resp['success']["representacion_impresa_selloSAT"];				
				$datos['factura']['representacion_impresa_cadena'] = $resp['success']["representacion_impresa_cadena"];
				$datos['factura']['representacion_impresa_certificadoSAT'] = $resp['success']["representacion_impresa_certificadoSAT"];
				$datos['factura']['fecha_timbrado'] = str_replace(":", "-", $resp['success']["representacion_impresa_fecha_timbrado"]);
				$datos['factura']['status'] = STATUS_TIMBRADA;
				
				if( $portal == NULL)
                    {
						$templateFactura = "vw_pdf_prefactura";
						$resp['factura'] = $datos['factura'];
						$this->generatePDF_Factura( $datos['dir_cfdi'] . $filename
													, array("f" => $datos, "r" => array("archivo_png"=>$resp['success']['archivo_png'], "representacion_impresa_certificado_no"=>$datos['factura']['representacion_impresa_certificado_no'],"representacion_impresa_sello"=>$datos['factura']['representacion_impresa_sello'],"representacion_impresa_selloSAT"=>$datos['factura']["representacion_impresa_selloSAT"],"representacion_impresa_cadena"=>$datos['factura']["representacion_impresa_cadena"],"representacion_impresa_certificadoSAT"=>$datos['factura']['representacion_impresa_certificadoSAT'],"folio_fiscal"=>$datos['factura']["uuid"],"fecha_timbrado"=>$datos['factura']["fecha_timbrado"],"uuid"=>$datos['factura']["uuid"] )) 
													, $templateFactura
													); 

						$this->md_sat->insert_factura_timbrada($datos);
						$this->md_pedido->insert_pedido_adjunto( array('adjunto'=>$datos['dir_cfdi'] . $filename, 'SEGURIDAD'=>"103",'desc_adjunto'=>"FACTURA RAMF " . $filename, 'id_pedido'=>$datos['id_pedido'],'tipo'=>'FACTURA', 'uuid'=>$datos['factura']['uuid'], 'filename'=>$filename ) );
				    }
				else{						
						
						$templateFactura = "vw_pdf_prefactura_SENNI";
						$this->generatePDF_Factura( $datos['dir_cfdi'] . $filename
													, array("f" => $datos, "r" => array("archivo_png"=>$resp['success']['archivo_png'], "representacion_impresa_certificado_no"=>$datos['factura']['representacion_impresa_certificado_no'],"representacion_impresa_sello"=>$datos['factura']['representacion_impresa_sello'],"representacion_impresa_selloSAT"=>$datos['factura']["representacion_impresa_selloSAT"],"representacion_impresa_cadena"=>$datos['factura']["representacion_impresa_cadena"],"representacion_impresa_certificadoSAT"=>$datos['factura']['representacion_impresa_certificadoSAT'],"folio_fiscal"=>$datos['factura']["uuid"],"fecha_timbrado"=>$datos['factura']["fecha_timbrado"],"uuid"=>$datos['factura']["uuid"] )) 
													, $templateFactura
													); 
				    }	  
					
				$resp = array('sucess' => NULL );
				$resp['pathFile'] = CONTROLLER_FAC.$datos['dir_cfdi'];															
				$resp['portal']   = $portal;
				$resp['vistaprevia'] = "0";
				$resp['filename'] = $filename;	
				$resp['xmlname']  = $xmlname;	
				$resp['success']['pdf']  = $datos['dir_cfdi'] . $filename;
				$resp['success']['xml']  = $datos['dir_cfdi'] . $xmlname;
				$resp['success']['uuid'] = $datos['factura']['uuid'];
				$resp['success']['id_factura'] = $datos['id_factura'];
				$resp['success']['folio'] 	   = $datos['factura']['folio'];
				$resp['success']['ImpSaldoInsoluto'] = $datos['factura']['total'];
				$resp['datos'] = $datos;
				$resp['id_factura']=$datos['id_factura'];
				$resp['factura']['total'] = $datos['factura']['total'] ;
			}					
	 break;			
	 case "vp_rep":
			$filename = "VISTAPREVIA_REP_".$datos['factura']['folio'].".pdf";

			$datos['emisor']['rfc'] 	  	  = $dbFiscal['rfc'];
			$datos['emisor']['nombre_fiscal'] = $dbFiscal['nombre_fiscal'];
			$datos['emisor']['cp_fiscal'] 	  = $dbFiscal['cp_fiscal'];
			$datos['emisor']['correo_fiscal'] = $dbFiscal['correo_fiscal'];
			$datos['rep']['path_pdf']         = $datos['dir_cfdi'] . $filename;

			$this->generatePDF_Factura( $datos['rep']['path_pdf']
									  , array("p" => $datos, "r" => array("archivo_png"=>"images/blank.png", "representacion_impresa_certificado_no"=>"","representacion_impresa_sello"=>"","representacion_impresa_selloSAT"=>"","representacion_impresa_certificadoSAT"=>"","folio_fiscal"=>"","uuid"=>"" ) ) 
									  , 'vw_pdf_rep'
									  );
			$resp = array( "pdf"  => $filename, "dir" => $datos['dir_cfdi']);
	 break;
	 case "timbrar_rep":
			if (PROD_FAC == 'NO') 
				{
					// Datos del Emisor
					$datos['emisor']['rfc'] = 'XIA190128J61'; //RFC DE PRUEBA
					$datos['emisor']['nombre'] = 'ACCEM SERVICIOS EMPRESARIALES SC';  // EMPRESA DE PRUEBA
				}			

			// SE ESPECIFICA EL COMPLEMENTO
			$datos['complemento'] 	   = 'pagos10';
			$datos['validacion_local'] = 'NO';
log_message('error', 'datos REP:'.var_export($datos, true));
			$resp = $contador->Facturar($datos); 		
log_message('error', 'resp REP:'.var_export($resp, true));
			if (count($resp['success']) != 0)
			{
			$filename = "REP_".$datos['factura']['folio'].".pdf";
			$datos['rep']['path_pdf'] = $filename; 

			//$debug_export = var_export($resp, true);			
			$datos['emisor']['nombre_fiscal'] = $dbFiscal['nombre_fiscal'];
			$datos['emisor']['cp_fiscal'] 	  = $dbFiscal['cp_fiscal'];
			$datos['emisor']['correo_fiscal'] = $dbFiscal['correo_fiscal'];

			$datos['factura']['uuid'] = $resp['success']["uuid"];
			$datos['factura']['representacion_impresa_certificado_no'] = $resp['success']["representacion_impresa_certificado_no"];
			$datos['factura']['representacion_impresa_sello']    = $resp['success']["representacion_impresa_sello"];
			$datos['factura']['representacion_impresa_selloSAT'] = $resp['success']["representacion_impresa_selloSAT"];				
			$datos['factura']['representacion_impresa_cadena']   = $resp['success']["representacion_impresa_cadena"];
			$datos['factura']['fecha_timbrado'] = str_replace(":", "-", $resp['success']["representacion_impresa_fecha_timbrado"]);				
			
			$this->generatePDF_Factura( $datos['dir_cfdi'] . $filename
									  , array("p" => $datos, "r" => array("archivo_png"=>$resp['success']['archivo_png'], "representacion_impresa_certificado_no"=>$datos['factura']['representacion_impresa_certificado_no'],"representacion_impresa_sello"=>$datos['factura']['representacion_impresa_sello'],"representacion_impresa_selloSAT"=>$datos['factura']["representacion_impresa_selloSAT"],"representacion_impresa_cadena"=>$datos['factura']["representacion_impresa_cadena"],"representacion_impresa_certificadoSAT"=>$resp['success']["representacion_impresa_certificadoSAT"],"folio_fiscal"=>$resp['success']["representacion_impresa_certificado_no"],"fecha_timbrado"=>$datos['factura']["fecha_timbrado"],"uuid"=>$datos['factura']["uuid"] ) ) 
									  , 'vw_pdf_rep'
									  );
						
			$resp = array('sucess' => NULL );
				if( $portal == NULL)
                    {
						$resp['factura']   = $datos['factura'];						
						log_message('error', 'resp:'.$resp['id_factura'] );
						log_message('error', 'datos:'.$datos['id_factura'] );						
						$this->md_sat->insert_rep_timbrada($datos);
						$this->md_sat->actualizaFactura($datos['id_factura'], array('saldo_insoluto'=>$datos["pagos10"]["Pagos"][0]["DoctoRelacionado"][0]["ImpSaldoInsoluto"],'num_parcialidades' => $datos['rep']['parcial_rep']) );
						$this->md_pedido->insert_pedido_adjunto( array('adjunto'=>$datos['dir_cfdi'] . $filename,'SEGURIDAD'=>"103",'desc_adjunto'=>"REP ".$filename,'id_pedido'=>$datos['rep']['id_pedido'],'tipo'=>'REP', "uuid"=>$datos['factura']['uuid'],"filename"=>$filename ) );
				    }
				else{
						$resp['datos'] 	  = $datos;
						$resp['pathFile'] = CONTROLLER_FAC.$datos['dir_cfdi'];															
						$resp['portal']   = $portal;
				    }	 

			$resp['success']['pdf'] = $datos['dir_cfdi'] . $filename;
			$resp['filename'] 	    = $filename;	
			$resp['success']['moneda_rep'] = $datos['rep']['moneda_rep'];
			$resp['success']['forma_pago_rep_desc'] = $datos['rep']['forma_pago_rep_desc'];
			$resp['success']['monto_rep'] = $datos['rep']['monto_rep'];			
			$resp['success']['NumParcialidad'] = $datos["pagos10"]["Pagos"][0]["DoctoRelacionado"][0]["NumParcialidad"];
			$resp['success']['ImpSaldoInsoluto'] = $datos["pagos10"]["Pagos"][0]["DoctoRelacionado"][0]["ImpSaldoInsoluto"];
			$resp['success']['fecha'] = $datos['rep']['fecha_rep'];
			} 		
	 break;	
	}

	echo json_encode( $resp );
	
	} catch (Exception $e) { log_message('error', 'timbrarAX Excepción:'.$e->getMessage()); }	
}


public function	timbrarCfdiRelAX($id_pedido=0, $action="", $portal=NULL)
{
Header('Access-Control-Allow-Origin: *');	
try{$this->load->model('md_pedido' );
	$this->load->model('md_cliente');
	$this->load->model('md_catalogo');
	$this->load->model('md_sat');	
	$this->load->library('Pdf');	
	$this->load->library('Contador'); 	
	$this->load->helper('file');
	$this->load->helper('date');

	$regimen_fiscal  	   = $this->input->post('regimen_fiscal');
	$numConceptosConCveSAT = $this->input->post('numConceptosConCveSAT');
	$dbFiscal 			   = $this->md_catalogo->traeDatosFiscales( ($portal == NULL ? RFC : RFC_SENNI), NULL);
	$tipoComprobante	   = $this->md_sat->traeTipoComprobanteSATbyTipo( $this->input->post('tipo_comprobante') );
	$impuesto			   = $this->md_sat->traeImpuestoSAT(IMPUESTO);
	
	$flagTasaSinIVA			 = FALSE;
	$flagTasaIVA			 = FALSE;
	$ImpuestoTransTasaIVA    = 0;
	$ImpuestoTransTasaSinIVA = 1;

	$dbFiscal['dir_cfdi']  = $this->output_dir . $id_pedido . "/";
	
	$fe_yymmdd = $this->utils->arrayDateFormat( $this->input->post('fecha_expedicion') ); 
	$date = new DateTime();	
	$date->setDate($fe_yymmdd['year'], $fe_yymmdd['month'], $fe_yymmdd['day']);
	$fechaExpedicion = $date->format('Y-m-d\TH:i:s'); 
 
	$resp     = NULL;	

	$contador = new Contador();	
	$contador->Init($dbFiscal, $portal);	
	
	$datos = $contador->getconfigTimbrado();   
	
	// Datos de la Factura
	$datos['id_factura'] = $this->input->post('id_factura')==NULL ? now() : $this->input->post('id_factura'); 
	$datos['id_pedido']  = $id_pedido;
	$datos['factPDF']    = array();	

	$datos['factPDF']['logo'] 	   		  = ($portal == NULL ? "Logo.jpg" : "LogoSenni.jpg");
	$datos['factPDF']['logoWidth'] 		  = ($portal == NULL ? "120" : "200");
	$datos['factPDF']['logoHeight']		  = ($portal == NULL ? "75" : "80");	
	$datos['factura']['LugarExpedicion']  = $dbFiscal['cp_fiscal'];//'77712';		
	$datos['factura']['RegimenFiscal']    = $this->input->post('regimen_fiscal');//'601';
	$datos['factPDF']['RegimenFiscalDesc']= $this->md_sat->traeDescRegimenFiscal($this->input->post('regimen_fiscal'));					
	$datos['factura']['folio']            = ($action === "vp_cfdirel" ? "0" : ($portal == NULL ? $this->md_sat->traeFolioConseutivo() : $this->input->post('folio'))) ;	

	$datos['factura']['fecha_expedicion'] = $fechaExpedicion;//$fechaExpedicion;//date('Y-m-d\TH:i:s', time() - 120);
	$datos['factura']['descuento']        = $this->input->post('descuentoSAT');//'0.00';
	$datos['factPDF']['notas']            = $this->input->post('notasFactura');//249.99;
	$datos['factura']['forma_pago']       = $this->input->post('forma_pago');//'04';
	$datos['factura']['forma_pagoDesc']   = $this->md_sat->traeFormaPagoDesc( $this->input->post('forma_pago') );
	$datos['factura']['metodo_pago']      = $this->input->post('metodo_pago');//'PUE';
	$datos['factura']['metodo_pagoDesc']  = $this->md_sat->traeMetodoPagoDesc( $this->input->post('metodo_pago') );
	$datos['factura']['moneda']           = $this->input->post('monedaSAT');//'MXN';
	$datos['factura']['serie']            = ($portal == NULL ? SERIE_SAT : SERIE_SAT_SENNI);//'A';
	$datos['factura']['subtotal']         = $this->input->post('subtotalSAT');//215.51;
	$datos['factura']['tipocambio']       = $this->input->post('tcSAT');//1;	
	$datos['factura']['total']            = $this->input->post('totalSAT');//249.99;
	$datos['factPDF']['totalConLetras']   = $this->utils->convertNumToChar( $this->input->post('totalSAT') );	

	//CFDI Relacionados
	$datos['factura']['tipocomprobante']        = substr($tipoComprobante['sat_TipoDeComprobante'], 0, 1);	
	$datos['factPDF']['tipocomprobanteDesc']    = $tipoComprobante['Descripcion']; 
	$tipoRelacion     = $this->input->post('tipo_relacion');
	$tipoRelacionDesc = $this->md_sat->traeTipoRelacionSATbyTipo( $tipoRelacion  );	
	$datos['CfdisRelacionados']['TipoRelacion'] = $tipoRelacion;	
	$datos['factPDF']['tipoRelacionDesc']       = $tipoRelacionDesc['Descripcion'];
	$datos['factPDF']['notasCfdiRel']           = $this->input->post('notasCfdiRel');
	$cfdiRelTot = $this->input->post('cfdiRelTot');	
	
	for($i=1; $i <= $cfdiRelTot; $i++)
	   { $datos['CfdisRelacionados']['UUID'][($i-1)] = $this->input->post('CfdiRelSel'.$i); }

	if( $cfdiRelTot ==0) { $datos['CfdisRelacionados']['UUID'] = array(); }
	

	// Datos del Receptor
	$datos['receptor']['rfc']      = $this->input->post('rfcReceptor');//'SOHM7509289MA';
	$datos['receptor']['nombre']   = $this->input->post('rsReceptor');//'Pu&blico en General';
	
	// Datos de los conceptos			
	$y = -1;
	for ($x = 0; $x <= $numConceptosConCveSAT; $x++) 
		{	
			$concep = $this->input->post('conSATCodigo'.$x);
			
			if($concep != "")	
				{   $y++;
					$impConcepto = $this->input->post('conSATsubtot'.$x);					

					$datos['conceptos'][$y]['cantidad']      = $this->input->post('conSATCantidad'.$x);
					$datos['conceptos'][$y]['unidad']        = $this->input->post('conSATUM'.$x); //'PIEZA';
					//$datos['conceptos'][$y]['ID']            = $this->input->post('conSATID'.$x);//"M7390Z";
					$datos['conceptos'][$y]['descripcion']   = $this->input->post('conSATCargo'.$x);
					$datos['conceptos'][$y]['valorunitario'] = $this->input->post('conSATValorUni'.$x);//215.51;
					$datos['conceptos'][$y]['importe']       = $impConcepto;
					$datos['conceptos'][$y]['ClaveProdServ'] = $this->input->post('conSATCodigo'.$x);						
					$datos['conceptos'][$y]['ClaveUnidad']   = $this->input->post('conSATCveUnidad'.$x);
					
					$datos['pdfconceptos'][$y]['cantidad']      = $this->input->post('conSATCantidad'.$x);
					$datos['pdfconceptos'][$y]['unidad']        = $this->input->post('conSATUM'.$x); //'PIEZA';
					$datos['pdfconceptos'][$y]['ID']            = $this->input->post('conSATID'.$x);//"M7390Z";
					$datos['pdfconceptos'][$y]['descripcion']   = $this->input->post('conSATCargo'.$x);
					$datos['pdfconceptos'][$y]['valorunitario'] = $this->input->post('conSATValorUni'.$x);//215.51;
					$datos['pdfconceptos'][$y]['importe']       = $impConcepto;
					$datos['pdfconceptos'][$y]['ClaveProdServ'] = $this->input->post('conSATCodigo'.$x);
					$datos['pdfconceptos'][$y]['ClaveUnidad']   = $this->input->post('conSATCveUnidad'.$x);
					$datos['pdfconceptos'][$y]['sumaIVA']   	= $this->input->post('conSATIVA'.$x);
												
						//Datos de Impuestos
						if($this->input->post('conSATIVA'.$x) == "1")
						{
							$flagTasaIVA    = TRUE;
							$tasa['Factor'] = 'Tasa';
							$tasa['sat_TasaOCuota_Valor_Maximo'] = TASA_IVA;
							$ivaConcepto = $this->utils->toFixed( floatval($tasa['sat_TasaOCuota_Valor_Maximo']) * $impConcepto, 2);
							$ImpuestoTransTasaIVA += $ivaConcepto;

						} 
						else
						{
							$flagTasaSinIVA = TRUE;
							$tasa['Factor'] = 'Tasa';
							$tasa['sat_TasaOCuota_Valor_Maximo'] = TASA_IVA_CERO;							
							$ivaConcepto = '0.00';
						}
						
						//Datos de Impuestos
						$datos['conceptos'][$y]['Impuestos']['Traslados'][0]['Base']       = $impConcepto;
						$datos['conceptos'][$y]['Impuestos']['Traslados'][0]['Impuesto']   = $impuesto['sat_Impuesto'];//'002';
						$datos['conceptos'][$y]['Impuestos']['Traslados'][0]['TipoFactor'] = $tasa['Factor'];//'Tasa';
						$datos['conceptos'][$y]['Impuestos']['Traslados'][0]['TasaOCuota'] = $tasa['sat_TasaOCuota_Valor_Maximo'];//'0.160000';
						$datos['conceptos'][$y]['Impuestos']['Traslados'][0]['Importe']    = $ivaConcepto;

						$datos['pdfconceptos'][$y]['Impuestos']['Traslados'][0]['Base']       = $impConcepto;
						$datos['pdfconceptos'][$y]['Impuestos']['Traslados'][0]['Impuesto']   = $impuesto['sat_Impuesto'];//'002';
						$datos['pdfconceptos'][$y]['Impuestos']['Traslados'][0]['TipoFactor'] = $tasa['Factor'];//'Tasa';
						$datos['pdfconceptos'][$y]['Impuestos']['Traslados'][0]['TasaOCuota'] = $tasa['sat_TasaOCuota_Valor_Maximo'];//'0.160000';
						$datos['pdfconceptos'][$y]['Impuestos']['Traslados'][0]['Importe']    = $ivaConcepto;//34.48;							
				}
		}	
	// Se agregan los Impuestos FACTURA		
	$indiceTranslados = -1;
	if($flagTasaIVA == TRUE)
	{
		$indiceTranslados++;
		$datos['impuestos']['translados'][$indiceTranslados]['impuesto']   = $impuesto['sat_Impuesto'];
		$datos['impuestos']['translados'][$indiceTranslados]['tasa'] 	   = TASA_IVA;
		$datos['impuestos']['translados'][$indiceTranslados]['importe']    = $this->utils->toFixed($ImpuestoTransTasaIVA,2 );
		$datos['impuestos']['translados'][$indiceTranslados]['TipoFactor'] = 'Tasa';
	}
	if($flagTasaSinIVA == TRUE)
	{
		$indiceTranslados++;
		$datos['impuestos']['translados'][$indiceTranslados]['impuesto']   = $impuesto['sat_Impuesto'];
		$datos['impuestos']['translados'][$indiceTranslados]['tasa']       = TASA_IVA_CERO;
		$datos['impuestos']['translados'][$indiceTranslados]['importe']    = 0.00;
		$datos['impuestos']['translados'][$indiceTranslados]['TipoFactor'] = 'Tasa';	
	}
	$datos['impuestos']['TotalImpuestosTrasladados'] = $this->utils->toFixed($ImpuestoTransTasaIVA,2 );
	$datos['factPDF']['translados'][0]['base'] 	   	 = $this->utils->toFixed($ImpuestoTransTasaIVA,2 );
	
	// Datos del Receptor
	$datos['receptor']['UsoCFDI']  	   = $this->input->post('uso_cfdi');//'G03';
	$datos['factPDF']['UsoCFDIDesc']   = $this->md_sat->traeDescUsosCFDI($this->input->post('uso_cfdi'));					
	$datos['factPDF']['emailReceptor'] = $this->input->post('emailReceptor');
	$datos['factPDF']['cpReceptor']    = $this->input->post('cpReceptor');	

	$datos['pdf'] = $dbFiscal;	
	
	$filename = $datos['factura']['tipocomprobante']."_".$datos['factura']['serie']."_".$datos['factura']['folio'].".pdf";
	$xmlname  = $datos['factura']['tipocomprobante']."_".$datos['factura']['serie']."_".$datos['factura']['folio']."_cfdi3_3.xml"; 

	switch ($action) 
	{
	 case "vp_cfdirel":
			$datos['factura']['uuid'] = NULL;
			$datos['factura']['representacion_impresa_certificado_no'] = NULL;
			$datos['factura']['fecha_timbrado']  = NULL;
			$datos['factura']['status'] = "VPF";
			
			$this->md_sat->borraVistaPreviaFactura( $datos['id_pedido'] );
			$this->md_sat->insert_factura_timbrada($datos);
			$this->md_sat->inserta_cfdiRel($datos);
			
		
			$filename = "PREFACTURA_".$filename;
			$datos['emisor']['rfc'] 	  	  = $dbFiscal['rfc'];
			$datos['emisor']['nombre_fiscal'] = $dbFiscal['nombre_fiscal'];
			$datos['emisor']['cp_fiscal'] 	  = $dbFiscal['cp_fiscal'];
			$datos['emisor']['correo_fiscal'] = $dbFiscal['correo_fiscal'];			
			
			$this->generatePDF_Factura( $datos['dir_cfdi'] . $filename
									  , array("f" => $datos, "r" => array("archivo_png"=>"images/blank.png", "representacion_impresa_certificado_no"=>"","representacion_impresa_sello"=>"","representacion_impresa_selloSAT"=>"","representacion_impresa_certificadoSAT"=>"","representacion_impresa_cadena"=>"","folio_fiscal"=>"","fecha_timbrado"=>""  ) ) 
									  , 'vw_pdf_prefactura_cfdi_rel_'
									  );

			$resp = array( "pdf"  => $filename, "dir" => $datos['dir_cfdi'], "vistaprevia"=>"1", "id_factura"=>$datos['id_factura'] );
	 break;	
	 case "timbrarcfdirel":			
			// Ruta del XML Timbrado
			$datos['cfdi'] = $datos['dir_cfdi'] . $xmlname; 			
			if (PROD_FAC == 'NO')
			{   // Datos del Emisor
				$datos['emisor']['rfc']    = 'XIA190128J61'; //RFC DE PRUEBA
				$datos['emisor']['nombre'] = 'ACCEM SERVICIOS EMPRESARIALES SC';  // EMPRESA DE PRUEBA
			}
log_message('error', 'datos CFDI REL:'.var_export($datos, true));
			$resp = $contador->Facturar($datos); 		
log_message('error', 'resp CFDI REL:'.var_export($resp, true));	
			if (count($resp['success']) != 0)
			{				
				$datos['emisor']['nombre_fiscal'] = $dbFiscal['nombre_fiscal'];
				$datos['emisor']['cp_fiscal'] 	  = $dbFiscal['cp_fiscal'];
				$datos['emisor']['correo_fiscal'] = $dbFiscal['correo_fiscal'];
				$datos['factura']['uuid'] = $resp['success']["uuid"];
				$datos['factura']['representacion_impresa_certificado_no'] = $resp['success']["representacion_impresa_certificado_no"];
				$datos['factura']['representacion_impresa_sello'] = $resp['success']["representacion_impresa_sello"];
				$datos['factura']['representacion_impresa_selloSAT'] = $resp['success']["representacion_impresa_selloSAT"];				
				$datos['factura']['representacion_impresa_cadena'] = $resp['success']["representacion_impresa_cadena"];
				$datos['factura']['representacion_impresa_certificadoSAT'] = $resp['success']["representacion_impresa_certificadoSAT"];
				$datos['factura']['fecha_timbrado'] = str_replace(":", "-", $resp['success']["representacion_impresa_fecha_timbrado"]);
				$datos['factura']['status'] = STATUS_TIMBRADA;
				
				if( $portal == NULL)
                    {
						$templateFactura = "vw_pdf_prefactura_cfdi_rel_";
						$resp['factura'] = $datos['factura'];
						$this->generatePDF_Factura( $datos['dir_cfdi'] . $filename
													, array("f" => $datos, "r" => array("archivo_png"=>$resp['success']['archivo_png'], "representacion_impresa_certificado_no"=>$datos['factura']['representacion_impresa_certificado_no'],"representacion_impresa_sello"=>$datos['factura']['representacion_impresa_sello'],"representacion_impresa_selloSAT"=>$datos['factura']["representacion_impresa_selloSAT"],"representacion_impresa_cadena"=>$datos['factura']["representacion_impresa_cadena"],"representacion_impresa_certificadoSAT"=>$datos['factura']['representacion_impresa_certificadoSAT'],"folio_fiscal"=>$datos['factura']["uuid"],"fecha_timbrado"=>$datos['factura']["fecha_timbrado"],"uuid"=>$datos['factura']["uuid"] )) 
													, $templateFactura
													);  
log_message('error', 'VER:'.var_export($datos, true));
						$this->md_sat->insert_factura_timbrada($datos);
						$this->md_pedido->insert_pedido_adjunto( array('adjunto'=>$datos['dir_cfdi'] . $filename, 'SEGURIDAD'=>"103",'desc_adjunto'=>"FACTURA RAMF " . $filename, 'id_pedido'=>$datos['id_pedido'],'tipo'=>'FACTURA', 'uuid'=>$datos['factura']['uuid'], 'filename'=>$filename ) );
				    }
				else{
						$templateFactura = "vw_pdf_prefactura_cfdi_rel_SENNI";
						$this->generatePDF_Factura( $datos['dir_cfdi'] . $filename
													, array("f" => $datos, "r" => array("archivo_png"=>$resp['success']['archivo_png'], "representacion_impresa_certificado_no"=>$datos['factura']['representacion_impresa_certificado_no'],"representacion_impresa_sello"=>$datos['factura']['representacion_impresa_sello'],"representacion_impresa_selloSAT"=>$datos['factura']["representacion_impresa_selloSAT"],"representacion_impresa_cadena"=>$datos['factura']["representacion_impresa_cadena"],"representacion_impresa_certificadoSAT"=>$datos['factura']['representacion_impresa_certificadoSAT'],"folio_fiscal"=>$datos['factura']["uuid"],"fecha_timbrado"=>$datos['factura']["fecha_timbrado"],"uuid"=>$datos['factura']["uuid"] )) 
													, $templateFactura
													); 
				    }	  
				
										
				$resp = array('sucess' => NULL );
				$resp['pathFile'] = CONTROLLER_FAC.$datos['dir_cfdi'];															
				$resp['portal']   = $portal;
				$resp['vistaprevia'] = "0";
				$resp['filename'] = $filename;	
				$resp['xmlname']  = $xmlname;	
				$resp['success']['pdf']  = $datos['dir_cfdi'] . $filename;
				$resp['success']['xml']  = $datos['dir_cfdi'] . $xmlname;
				$resp['success']['uuid'] = $datos['factura']['uuid'];
				$resp['success']['id_factura'] = $datos['id_factura'];
				$resp['success']['folio'] 	   = $datos['factura']['folio'];
				$resp['success']['ImpSaldoInsoluto'] = $datos['factura']['total'];
				$resp['datos'] = $datos;
			}					
	 break;
	}

	echo json_encode( $resp );
	
	} catch (Exception $e) { log_message('error', 'timbrarCfdiRelAX Excepción:'.$e->getMessage()); }	
}//timbrarCfdiRelAX


private function generatePDF_Factura($pathFileName, $pdfContent, $view)
{	
try{
	$this->load->library('Pdf');		
	$this->load->helper( 'file');

	$html = $this->load->view($view, $pdfContent, true );
	$this->pdf->generate($html, $pathFileName, FALSE);

   } catch (Exception $e) { log_message('error', 'generatePDF_Factura Excepción:'.$e->getMessage()); }	
}
	
public function	cveProdSAT_AX()
{	
try{$this->load->model('md_sat' );	

	$search = $this->input->post('search');

	$cveProdSAT = $this->md_sat->searchCveProdServSAT($search);

	echo json_encode( $cveProdSAT );
	
	} catch (Exception $e) { log_message('error', 'cveProdSATAX Excepción:'.$e->getMessage()); }	
}


public function	cveUnidadSAT_AX()
{	
try{$this->load->model('md_sat' );	

	$search = $this->input->post('search');

	$cveUnidadSAT = $this->md_sat->searchCveUnidadSAT($search);

	echo json_encode( $cveUnidadSAT );
	
	} catch (Exception $e) { log_message('error', 'cveUnidadSATAX Excepción:'.$e->getMessage()); }	
}

public function	uuidCfdiRel_AX()
{	
try{$this->load->model('md_sat' );	

	$search      = $this->input->post('search');
	$uuidCfdiRel = $this->md_sat->searchUuidCfdiRelSAT($search);

	echo json_encode( $uuidCfdiRel );
	
	} catch (Exception $e) { log_message('error', 'uuidCfdiRel_AX Excepción:'.$e->getMessage()); }	
}

private function traeDetallePedido($num_guia, $tipos_servicio)
	{
		$this -> load -> model('md_rastreo');
		$this -> load -> model('md_flete');
		
		$encabezado = $this -> md_pedido  -> traeDetallePorEn($num_guia,
                                                                        "pedidos",
                                                                        "p",
                                                                        "p.id_pedido,s.opcion_catalogo 		
                                                                        as status,p.status_track, p.rfc, 
                                                                        cl.razon_social,
                                                                        c.opcion_catalogo as 
                                                                        carrier,p.num_mbl,
                                                                        p.shipper, cg.opcion_catalogo 		
                                                                        as cg, tcg.opcion_catalogo as 
                                                                        carta_no, p.monto_carta_no,
                                                                        p.ins_booking, p.id_coti,
                                                                        p.ins_envio,
                                                                        p.vessel_voyage, p.num_hbl, 
                                                                        p.num_contenedor, 
                                                                        p.num_booking, p.carrier as 
                                                                        id_carrier, p.carta_no,
                                                                        p.carta_garantia ,															
                                                                        p.adjunto_mbl, p.adjunto_hbl, p.adjunto_facturaP, 
                                                                        p.adjunto_le, p.adjunto_factura,p.adjunto_poliza,p.adjunto_cartaporte,
                                                                        p.profit_origen,p.profit,p.costo_tot,p.venta_tot,p.comision_ventas,p.comision_operaciones,
                                                                        p.id_coti,p.moneda,p.tipo_cambio, p.tipo_embarque, te.opcion_catalogo as te_desc, p.revalidar_aa, p.pol, p.pod1, p.pod2", "DATE_FORMAT(`p`.`eta`,'%d/%m/%Y') as eta, DATE_FORMAT(`p`.`etd`,'%d/%m/%Y') as etd, agente_proveedor, orden_compra, referencia_proveedor, (1) as flagHeaderSaved, total_costos_mxn, total_costos_usd, total_costos_mxn, total_ventas_usd, total_ventas_mxn");
		$aduana 	= $this -> md_pedido  -> traeDetallePorEn($num_guia,"aduana","a","*", NULL);
		$flete 		= $this -> md_flete   -> traeDetallePorEn($num_guia,"flete","f","f.tipo_servicio, 
                                                                                                cf.opcion_catalogo 
                                                                                                as veri_o,
                                                                                                f.verificacion_origen as id_v_o",
                                                                                                "DATE_FORMAT(`f`.`etd`,'%d/%m/%Y') as etd, 																																																									
                                                                                                 DATE_FORMAT(`f`.`eta`,'%d/%m/%Y') as eta");
		$producto 	= $this -> md_pedido  -> traeDetallePorEn($num_guia,"productos","p","*", NULL);
		$rastreo 	= $this -> md_rastreo -> traeRastreoPor($num_guia);
		$seguro 	= $this -> md_pedido  -> traeDetallePorEn($num_guia,"seguro","s","*", NULL);
		$numCargos  = $this -> md_pedido  -> traeNumCargos($num_guia);
		$transporte = $this -> md_pedido  -> traeDetallePorEn($num_guia,
                                                                    "transporte",
                                                                    "t",
                                                                    "t.costo, t.venta,t.iva, t.salida_puerto, 
                                                                    t.maniobras,ct.opcion_catalogo as regreso_v, 
                                                                    t.contacto_almacen, t.entrega,
                                                                    t.regreso_vacio as id_regreso_v", 	
                                                                    "DATE_FORMAT(`t`.`entrega`,'%d/%m/%Y') as entrega");

		$servicios = array();		
		//while (list($llave, $valor) = each($tipos_servicio)) 
		foreach($tipos_servicio as $llave => $valor)
		{
			if ($llave != 0 )
			{
			  $pedido_conceptos = $this -> md_pedido -> traeDetalleCoti($num_guia,$llave,"pedido_conceptos","co","co.concepto, co.descripcion, 
			  																			  co.tipo_servicio");
			  $pedido_cargos 	= $this -> md_pedido -> traeDetalleCoti($num_guia,$llave,"pedido_cargos","ca","ca.cargo, ca.importe,ca.costo, 
			  																				ca.tipo_servicio,ca.iva");
			  $pedido_terminos  = $this -> md_pedido -> traeDetalleCoti($num_guia,$llave,"pedido_terminos","ct","ct.termino, ct.descripcion, 
			  																			  ct.tipo_servicio,c.opcion_catalogo as descINCO");
			  $servicios[] = array('id_servicio' 	    => $llave,
									 'servicio' 	    => $valor,
									 'pedido_conceptos' => $pedido_conceptos,
									 'pedido_cargos'    => $pedido_cargos,
									 'pedido_terminos'  => $pedido_terminos);				
			}			
		}        																  				
		return array('encabezado'  => $encabezado, 
					  'aduana' 	   => $aduana, 
					  'flete' 	   => $flete,
					  'producto'   => $producto,
					  'rastreo'	   => $rastreo,
					  'seguro'	   => $seguro,
					  'transporte' => $transporte,
					  'servicios'  => $servicios,
					  'numCargos'  => $numCargos);
	}
	

public function test()
{
	
	$this->load->library('word');
	$this->load->helper('date');	
	$encabezado = array();
	$encabezado[0] = array('id_pedido' 	    => '1436282212',
						   'etd'  			=> '01/06/2015',
						   'vessel_voyage'  => 'vessel_voyage',
						   'pol'  			=> 'VERA',
						   'pod'  			=> 'Acapulco',
						   'mbl'  			=> '123456789',
						   'hbl'  			=> '987654321',
					   );
	$cargos = array();
	$cargoArray = array('cargo'    => $cargo,
							   	    'importe'  => $importe
							  	   );
	$cargos[0] = array('cargo'    => "FLETE ",
							   	    'importe'  => '1231'
							  	   );
	$cargos[1] = array('cargo'    => "sdsd ",
							   	    'importe'  => '3435'
							  	   );						  			   
	echo "r: ".$this->mandaPrefactura("SENNITI1234567","eduardo.ms@senni.com.mx",$encabezado,$cargos);
	echo "bien";
/*	echo "r: ".$this->mandarCorreoRetro("1435776993",
										"Pito Perez",
										"eduardo.munoz.siller@gmail.com",
										"eduardo.ms@senni.com.mx",NULL);
*/										
}	

	
	private function mandaPrefactura($rfc,$correo,$encabezado,$fletes,$terminos,$cargos,$cargosIVA)
	{
	 try{		
		
		$cliente    = $this->md_cliente->traeDetalleClientePorEn($rfc,"clientes","c","*");		
						
		$datosSL    = $this->md_pedido->traeDatosSL();
		$cuentasSL  = $this->md_pedido->traeCuentasSL($datosSL[0]['rfc']);

		$preFactura = $this->generarPDF_Prefactura($encabezado,$fletes,$terminos,$cargos,$cargosIVA,$cliente,$datosSL,$cuentasSL);

		$id_pedido  = $encabezado[0]['id_pedido'];
		$to 	    = $cliente[0]['correo'];
		$cc  	    = $correoEjecutivoCuenta;
		$bcc 	    = NULL;
		$r 	    = $this->mandarCorreoPrefactura($id_pedido,$cliente[0]['razon_social'],$to,$cc,$bcc,$preFactura['dirFileName']);

		return $r;
				
	 } catch (Exception $e) {echo 'manda Prefactura Excepción: ',  $e->getMessage(), "\n";}		
	}
	
	
	private function generarPDF_Prefactura($encabezado,$fletes,$terminos,$cargos,$cargosIVA,$cliente,$datosSL,$cuentasSL)
	{
	 try
	 {
		$this->load->helper('date');
		$this->load->library('dompdf_gen');
		$this->load->helper( 'file');
		
		$dir 	    = $this->output_dir."prefactura/";			
		$now 	    = new DateTime();
		$fechaPF    = $now->format('d-F-Y');
		$filename   = 'preFactura_'.$encabezado[0]['id_pedido'].'.pdf';		
		$fechaPFStr = $this->utils->traduceMeses($fechaPF);
	
		$data['fechaPF']    = $fechaPFStr;			
		$data['encabezado'] = $encabezado;
		$data['fletes']     = $fletes;
		$data['terminos']   = $terminos;
		$data['cargos']     = $cargos;
		$data['cargosIVA']  = $cargosIVA;
		$data['cliente']    = $cliente;
		$data['datosSL']    = $datosSL;
		$data['cuentasSL']  = $cuentasSL;
		
		$html = $this->load->view( 'vw_pdf_prefactura' , $data , true );
		
		$pdfContent = $this->utils->pdf_create($html,'',FALSE);
		$accion = write_file($dir.$filename, $pdfContent);
		
		return array("filename"    => $filename,
                             "dirFileName" => $dir.$filename
                            );
		
	 } catch (Exception $e) {echo 'Pedido Genera Prefactura Excepción: ',  $e->getMessage(), "\n";}	
	}

	
	private function mandarCorreoPrefactura($id_pedido,$nombre_cliente,$to,$cc,$bcc,$preFactura)
	{
		$this->load->library('email');
		
		$config['protocol']  = "smtp";
		$config['smtp_host'] = "mail.senni.com.mx";
		$config['smtp_port'] = "26";
		$config['smtp_user'] = CORREO_CONTACTO; 
		$config['smtp_pass'] = "ventas$2016";
		$config['charset']   = "UTF8";
		$config['mailtype']  = "html";		
		$config['wordwrap']  = TRUE;
		$config['priority']  = 2;

		$this->email->clear();
		$this->email->initialize($config);

		$fromMail = CORREO_CONTACTO;
		$fromName = NOMBRE_CORTO;
		$subject  = "Su embarque se encuentra próximo a arribar";	
		$message  = '
		<html>
		<head>
		<title>'.TITULO_NAVEGADOR.'</title>
		</head>
		<body>
		<hr>
		<p align="left" style="font-family:\'arial black\',\'avant garde\';font-size:12px"><strong>'
		.$nombre_cliente.',</strong></p>
		<p align="justify">
		Antes que nada reciba un cordial saludo de nuestra parte, el siguiente correo es para 
		informarle que su 
		embarque con referencia '.NOMBRE_CORTO.' <a href="'.base_url().'rastreo/pf/'.$id_pedido.'" target="_blank"><strong>
		'.$id_pedido.'</strong></a>, se encuentra próximo a arribar, por ello le 
		hacemos llegar la 
		Pre-Factura, adjuntada a este correo, para que pueda validar sus datos fiscales. </p>
		<p align="justify">Agradeceremos responder por este medio la correcta información contenida en dicha 
		Pre-Factura</p><br>
		<p align="justify">Para conocer más información acerca de su embarque, dar click 
		<a href="'.base_url().'rastreo/pf/'.$id_pedido.'" target="_blank">aquí</a></p><br>
		<p align="justify"><strong>Saludos Cordiales</strong></p>
		<hr>
		<p>
		<span style="font-family:\'arial black\',\'avant garde\';font-size:large;color:#888888">
		<strong> '.RAZON_SOCIAL.' </strong></span>
		</p>	
		<p><span style="font-family:\'arial black\',\'avant garde\';font-size:small">
		<strong><span style="color:#888888">Telefono <strong>
		'.CEL_CONTACTO.'</strong></span></strong>
		</span></p>
                <p><span style="font-family:\'arial black\',\'avant garde\';font-size:small">
		<strong><span style="color:#888888">'.DIR1_CONTACTO.' 
                 <br>'.DIR2_CONTACTO.'</span></strong>
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
		
		$this->email->from($fromMail, $fromName);
		$this->email->to($to);
		
		if( $cc != NULL)
                    { $this->email->cc($cc);   }
			
		if( $bcc != NULL)		
                    { $this->email->bcc($bcc); }
		
		$this->email->subject($subject);		
		$this->email->message($message);	
		$this->email->attach($preFactura);	
				
		$r = $this->email->send();
		
	//	echo $this->email->print_debugger();	
		return $r;	
	}
	
	private function mandarCorreoRetro($id_pedido,$nombre_cliente,$to,$cc,$bcc)
	{
		$this->load->library('email');
		
		$config['protocol']  = "smtp";
		$config['smtp_host'] = "mail.senni.com.mx";
		$config['smtp_port'] = "26";
		$config['smtp_user'] = CORREO_CONTACTO; 
		$config['smtp_pass'] = "ventas$2016";
		$config['charset']   = "UTF8";
		$config['mailtype']  = "html";		
		$config['wordwrap']  = TRUE;
		$config['priority']  = 2;
		
		$this->email->clear();
		$this->email->initialize($config);

		$fromMail = CORREO_CONTACTO;
		$fromName = NOMBRE_CORTO;
		$subject  = "Encuesta de Satisfacción";	
		$message  = '
		<html>
		<head>
		<title>'.TITULO_NAVEGADOR.'</title>
		</head>
		<body>
		<hr>
		<p align="left" style="font-family:\'arial black\',\'avant garde\';font-size:12px"><strong>Estimado '
		.$nombre_cliente.',</strong></p>
		<p align="justify">
		Esperamos que nuestro servicio haya sido de su agrado y contemos con su preferencia para futuras ocasiones.
		</p> 
		<p align="justify">
		Le agradecéremos profundamente, si nos regala unos minutos más, de su tiempo para contestar la siguiente 
		encuesta, es muy breve. no le tomará más de 5 mins.<br><br>
		<center>
			<a href="'.base_url().'retro/encuesta/'.$id_pedido.'" target="_blank"><strong>
			Encuesta de Satisfacción</strong></a>
		</center>
		</p>
		<br><br>
		<p align="justify"><strong>Saludos Cordiales</strong></p>
		<hr>
		<p>
		<span style="font-family:\'arial black\',\'avant garde\';font-size:large;color:#888888">
		<strong> '.RAZON_SOCIAL.' </strong></span>
		</p>	
		<p><span style="font-family:\'arial black\',\'avant garde\';font-size:small">
		<strong><span style="color:#888888">Telefono;<strong>
		'.CEL_CONTACTO.'</strong></span></strong>
		</span></p>
                <p><span style="font-family:\'arial black\',\'avant garde\';font-size:small">
		<strong><span style="color:#888888">'.DIR1_CONTACTO.'
                 <br>'.DIR2_CONTACTO.'</span></strong>
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
		
		$this->email->from($fromMail, $fromName);
		$this->email->to($to);
	
		if( $cc != NULL)
                  { $this->email->cc($cc);  }

		if( $bcc != NULL)		
                  { $this->email->bcc($bcc); }
		
		$this->email->subject($subject);		
		$this->email->message($message);
	
		$r = $this->email->send();
		
//		echo $this->email->print_debugger();	
		return $r;	
	}
}


