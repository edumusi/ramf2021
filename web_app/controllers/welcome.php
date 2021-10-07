<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

        private $output_dir = "adjuntos/";
	
	public function index()
	{
            $this->load->database('MySQL_Conn' );        
            $this->load->model   ('md_catalogo');
            $this->load->library ('table');
            $this->load->library ('Utils');
            
            $data['titulos']  = array("navegador" => TITULO_NAVEGADOR, 
                                    "ventana"   => TITULO_VENTANA,
                                    "frase"     => "\"Hacer de lo simple algo complicado es com&uacute;n; hacer de lo complicado algo simple, incre&iacute;blemente simple, es creatividad\" <br>- Charles Mingus",
                                    "titulo"    => "Ingreso al Portal ".TITULO_NAVEGADOR);            
            $data['iconuser']    = "";
            $data['usuario']     = "";
            $data['sesion']      = "";
            $data['foto']        = "";
            $data['terminosINCO']= $this->md_catalogo->poblarSelect("terminos");
            $data['freightType'] = $this->md_catalogo->poblarSelect("freight_type");
            
            $this->load->view('home',$data);
    }
    
public function test()
{
try{        
        $this->load->library('Contador'); 
        $this->load->database('MySQL_Conn' );        
        $this->load->model   ('md_catalogo');
        echo "HOLA CONTADOR".br(1);
               
        $id_pedido = 1545186278;
        $portal = "SENNI";
        $dbFiscal = $this->md_catalogo->traeDatosFiscales( ($portal == NULL ? RFC : RFC_SENNI), NULL);
        $dbFiscal['dir_cfdi'] = $this->output_dir . $id_pedido . '/cfdi/';    
        
        $contador = new Contador();
        $contador->Init($dbFiscal, $portal);
        
        $datos = $contador->getconfigTimbrado();        
       // Datos de la Factura
        $datos['factura']['condicionesDePago'] = 'CONTADO';
        $datos['factura']['descuento']        = '0.00';//YA
        $datos['factura']['fecha_expedicion'] = date('Y-m-d\TH:i:s', time() - 120);//YA
        $datos['factura']['folio']            = '659155';
        $datos['factura']['forma_pago']       = '04';//YA
        $datos['factura']['LugarExpedicion']  = '77712';//YA
        $datos['factura']['metodo_pago']      = 'PUE';
        $datos['factura']['moneda']           = 'MXN';//YA
        $datos['factura']['serie']            = 'A';
        $datos['factura']['subtotal']         = 215.51;
        $datos['factura']['tipocambio']       = 1;
        $datos['factura']['tipocomprobante']  = 'I';
        $datos['factura']['total']            = 249.99;
        $datos['factura']['RegimenFiscal']    = '601';//YA
/*        
        $datos['CfdisRelacionados']['TipoRelacion'] = '01';
        $datos['CfdisRelacionados']['UUID'][0]      = 'A39DA66B-52CA-49E3-879B-5C05185B0EF7';
*/
        // Datos del Receptor
        $datos['receptor']['rfc']     = 'SOHM7509289MA';//YA
        $datos['receptor']['nombre']  = 'Pu&blico en General';//YA
        $datos['receptor']['UsoCFDI'] = 'G03';//YA

        // Se agregan los conceptos
        $datos['conceptos'][0]['cantidad']      = 1.00;
        $datos['conceptos'][0]['unidad']        = 'PIEZA';
        $datos['conceptos'][0]['ID']            = "M7390Z";
        $datos['conceptos'][0]['descripcion']   = "taxi";
        $datos['conceptos'][0]['valorunitario'] = 215.51;
        $datos['conceptos'][0]['importe']       = 215.51;
        $datos['conceptos'][0]['ClaveProdServ'] = '53102700';
        $datos['conceptos'][0]['ClaveUnidad']   = 'H87';

        $datos['conceptos'][0]['Impuestos']['Traslados'][0]['Base']       = 215.51;
        $datos['conceptos'][0]['Impuestos']['Traslados'][0]['Impuesto']   = '002';
        $datos['conceptos'][0]['Impuestos']['Traslados'][0]['TipoFactor'] = 'Tasa';
        $datos['conceptos'][0]['Impuestos']['Traslados'][0]['TasaOCuota'] = '0.160000';
        $datos['conceptos'][0]['Impuestos']['Traslados'][0]['Importe']    = 34.48;
        /*
        $datos['conceptos'][1]['cantidad'] = 1.000;
        $datos['conceptos'][1]['unidad'] = 'PIEZA';
        $datos['conceptos'][1]['ID'] = "SPC764XZ";
        $datos['conceptos'][1]['descripcion'] = "BALATAS FRN/DIS TRAS.CHEVROLET ASTRA";
        $datos['conceptos'][1]['valorunitario'] = 464.61;
        $datos['conceptos'][1]['importe'] = 464.61;
        $datos['conceptos'][1]['ClaveProdServ'] = '25171700';
        $datos['conceptos'][1]['ClaveUnidad'] = 'H87';

        $datos['conceptos'][1]['Impuestos']['Traslados'][0]['Base'] = 464.61;
        $datos['conceptos'][1]['Impuestos']['Traslados'][0]['Impuesto'] = '002';
        $datos['conceptos'][1]['Impuestos']['Traslados'][0]['TipoFactor'] = 'Tasa';
        $datos['conceptos'][1]['Impuestos']['Traslados'][0]['TasaOCuota'] = '0.160000';
        $datos['conceptos'][1]['Impuestos']['Traslados'][0]['Importe'] = 74.34;*/

        // Se agregan los Impuestos
        $datos['impuestos']['translados'][0]['impuesto']   = '002';
        $datos['impuestos']['translados'][0]['tasa']       = '0.160000';
        $datos['impuestos']['translados'][0]['importe']    = 34.48;
        $datos['impuestos']['translados'][0]['TipoFactor'] = 'Tasa';

        $datos['impuestos']['TotalImpuestosTrasladados'] = 34.48;

    echo "<pre>DATOS: ";
    print_r($datos);
    echo "</pre>";
    $respTimb = $contador->Facturar($datos);
   /* echo "<pre>RESP: ";
    print_r($respTimb);
    echo "</pre>";       */
    log_message('error', 'respTimb:'.var_export($respTimb, true));
    
        } catch (Exception $e) {log_message('error', 'test Excepción:'.$e->getMessage()); }	

        $this->load->view('test',$datos);

	}// test

    /*
    public function test()
	{
                $this->load->library('Contador');  
        $data['foto'] = "test";
        echo "<pre>";
                print_r(get_loaded_extensions());
        echo "<pre/>";  
        
        $this->load->view('test',$data);
	}
*/////
}
