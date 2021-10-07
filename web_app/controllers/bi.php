<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bi extends CI_Controller {
    public  $user 		= NULL;
    public $registros_x_pagina = 10;
    private $output_dir = "adjuntos/";
    
    
    public function __construct()
    {
        parent::__construct();
        
        $this->load->database('MySQL_Conn');  
        $this->load->model('md_bi');        
        $this->load->model('md_catalogo');        
        $this->load->model('md_cliente');
        $this->load->library('session');        
        $this->load->library('table');
        $this->load->library('Utils');  
        $this->load->library('GestorExcel');      
        $this->load->helper('array');
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
	
    public function index($msj=null)
    {   $this->validaSS();
        $data['clientes']= $this->md_cliente -> poblarSelect();
        $data['pol']     = $this->md_catalogo-> poblarPaisDeOrigen();
        $data['titulos'] = array("navegador" => TITULO_NAVEGADOR, 
                                 "ventana"   => TITULO_VENTANA,
                                "frase"     => "Servicios Integrales Especializados en Log&iacute;stica",
                                "titulo"    => "Menu Business Intelligence");	
	
	    $data['usuario']  = element('nombre', $this->user['0'])." ".element('apellidos', $this->user['0']);
	    $data['iconuser'] = '<img src="'.base_url().'images/user.png"/>';

        $this->load->view('vw_bi',$data);
    }
            
    
    public function reportExcelAXIVA()
    {
        $this->load->helper('date');
        $this->load->helper('html');
        $this->load->helper('url' );        
        $this->load->library('Excel');
  
        $dataInput = array();
        try{
        $expFile    = "";                
        $dataInput  = array("rfc" => $this->input->post('rfc'), "paramDe" => $this->utils->senniDateFormat($this->input->post('paramDe')), "paramHasta" => $this->utils->senniDateFormat($this->input->post('paramHasta')), "iva_venta" => $this->input->post('iva_venta'), "iva_costo" => $this->input->post('iva_costo') );
        //$dataInput  = array("rfc" => null, "paramDe" => $this->utils->senniDateFormat("01/06/2020"), "paramHasta" => $this->utils->senniDateFormat("31/07/2020"), "iva_venta" => "NO", "iva_costo" => "NO" );
        $dataReport = $this->md_bi->reportExcelAXIVA( $dataInput );
        $hoy        = date('Y-m-d H:i:s');
        $nameFile = "Reporte_Excel_IVA.xlsx" ;
        $pathFile =  $this->output_dir ;
        $iconFile =  "images/ExcelLogo.png" ;
        $columnsTitles =  array("Cliente", "No Booking", "Concepto", "Tipo", "Importe", "Moneda", "Tipo de Cambio") ;
        
        if ( file_exists( $pathFile . $nameFile) )
           { unlink( $pathFile . $nameFile );    }

        if( empty($dataReport) )
          { $expFile = "No se encontraron registros para exportar"; }  
        else    
          { 
            $tituloReporte = "Reporte Conceptos de Venta y Costo con IVA";    
                
            $objPHPExcel   = new Excel();
         
            $objPHPExcel->getProperties()
                        ->setCreator    ("RAMF Logistics")                
                        ->setTitle      ($tituloReporte)
                        ->setSubject    ("Portal RAMF Logistics") 
                        ->setDescription("Reporte Excel de conceptos con IVA")
                        ->setKeywords   ("Cargos, Ventas, Costos, IVA")
                        ->setCategory   ("Reporte Excel de conceptos con IVA")
                        ->setLastModifiedBy("Portal RAMF Logistics") 
                        ;
          
            $estiloTituloReporte = array('font'      => array('name'        => 'Verdana', 'bold' => true, 'italic' => false, 'strike' => false, 'size' => 16, 'color' => array('rgb' => 'FFFFFF')) ,
                                         'fill'      => array('type'        => PHPExcel_Style_Fill::FILL_SOLID, 'color' => array('rgb' => '000000')),
                                         'borders'   => array('allborders'  => array( 'style' => PHPExcel_Style_Border::BORDER_NONE)),
                                         'alignment' => array( 'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'rotation' => 0, 'wrap' => TRUE )
                                        );
        
            $estiloTituloColumnas = array('font'      => array('name'       => 'Arial', 'bold' => true, 'color' => array('rgb' => 'FFFFFF') ),
                                          'fill'      => array('type'       => PHPExcel_Style_Fill::FILL_GRADIENT_LINEAR, 'rotation' => 90, 'startcolor' => array('rgb' => 'CB0B0B'), 'endcolor' => array('rgb' => 'F5B093') ),
                                          'borders'   => array('top'        => array('style' => PHPExcel_Style_Border::BORDER_MEDIUM, 'color' => array( 'rgb' => 'EE7A48')), 'bottom' => array('style' => PHPExcel_Style_Border::BORDER_MEDIUM, 'color' => array( 'rgb' => 'EE7A48')) ),
                                          'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, 'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => TRUE)
                                        );

            $estiloHoraReporte = array('font'      => array('name'       => 'Arial', 'color' => array('rgb' => '000000'),'size' => 7 ),
                                       'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, 'vertical'  => PHPExcel_Style_Alignment::VERTICAL_BOTTOM, 'wrap' => TRUE)
                                       );

            $estiloInformacion = new PHPExcel_Style();
            $estiloInformacion->applyFromArray( array('font'    => array('name' => 'Arial', 'color' => array('rgb' => '000000')),
                                                      'fill'    => array('type' => PHPExcel_Style_Fill::FILL_SOLID, 'color' => array('rgb' => 'FFFFFF')),
                                                      'borders' => array('left' => array('style' => PHPExcel_Style_Border::BORDER_THIN , 'color' => array('rgb' => 'EE7A48') ), 'bottom' => array('style' => PHPExcel_Style_Border::BORDER_THIN , 'color' => array('rgb' => 'EE7A48') ) )   
                                                     ));
        
            $objPHPExcel->getActiveSheet()->setTitle('Reporte Excel IVA');
            $objPHPExcel->setActiveSheetIndex(0)
                        ->mergeCells('A1:G1')
                        ->mergeCells('A2:G2');

            $objPHPExcel->setActiveSheetIndex(0)
                        ->setCellValue('A1', $tituloReporte) 
                        ->setCellValue('A2', $hoy)
                        ->setCellValue('A3', $columnsTitles[0])
                        ->setCellValue('B3', $columnsTitles[1])
                        ->setCellValue('C3', $columnsTitles[2])
                        ->setCellValue('D3', $columnsTitles[3])
                        ->setCellValue('E3', $columnsTitles[4])
                        ->setCellValue('F3', $columnsTitles[5])
                        ->setCellValue('G3', $columnsTitles[6])
                        ;
            $objDrawing = new PHPExcel_Worksheet_Drawing();
            $objDrawing->setName('Logo');
            $objDrawing->setDescription('Logo RAMF Logistics');
            $objDrawing->setPath('images/Logo.png');
            $objDrawing->setCoordinates('A2');                      
            //setOffsetX works properly
            $objDrawing->setOffsetX(1); 
            $objDrawing->setOffsetY(1);                
            //set width, height
            $objDrawing->setWidth(150); 
            $objDrawing->setHeight(60); 
            $objDrawing->setWorksheet($objPHPExcel->setActiveSheetIndex(0));

            $objPHPExcel->getActiveSheet()->getRowDimension('2')->setRowHeight(60);
            $objPHPExcel->getActiveSheet()->getRowDimension('1')->setRowHeight(25);
            
            /*** CONTENIDO*/
            $numCelda = 3;
            foreach ($dataReport as $r)
            { $numCelda++;
              $objPHPExcel->getActiveSheet()->getRowDimension($numCelda)->setRowHeight(40);
              $objPHPExcel->setActiveSheetIndex(0)                          
                          ->setCellValue('A'.$numCelda, $r['rfc'] . " " . $r['razon_social'])
                          ->setCellValue('B'.$numCelda, $r['num_booking'])
                          ->setCellValue('c'.$numCelda, $r['cargo'])
                          ->setCellValue('D'.$numCelda, $r['tipo'])
                          ->setCellValue('E'.$numCelda, "$".number_format($r['importe'] ,2, '.', ',' ))
                          ->setCellValue('F'.$numCelda, $r['moneda'])
                          ->setCellValue('G'.$numCelda, "$".number_format($r['tipo_cambio'] ,2, '.', ',' ))
                          ;
            }
            $objPHPExcel->getActiveSheet()->getStyle('A1:G1')->applyFromArray($estiloTituloReporte);
            $objPHPExcel->getActiveSheet()->getStyle('A2'   )->applyFromArray($estiloHoraReporte);
            $objPHPExcel->getActiveSheet()->getStyle('A3:G3')->applyFromArray($estiloTituloColumnas);
            $objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion, "A4:G".$numCelda);
            $objPHPExcel->getActiveSheet()->getStyle("A4:G".$numCelda)->applyFromArray(array('alignment' =>  array('horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_JUSTIFY, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => TRUE )));
            
            for($i = 'A'; $i <= 'G'; $i++){ $objPHPExcel->setActiveSheetIndex(0)->getColumnDimension($i)->setAutoSize(TRUE); }
            // Inmovilizar paneles
            $objPHPExcel->getActiveSheet(0)->freezePaneByColumnAndRow(0,4);

            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');            
            $objWriter->save($pathFile . $nameFile);
            
            $paramImg = array('src' => $iconFile, 'alt' => $nameFile, 'width' => '25', 'height'=> '25','title' => $nameFile, );
            $expFile  = anchor($pathFile . $nameFile, img( $paramImg ).nbs().$nameFile, 'title="'.$nameFile.'"') ;
          }
        
        echo json_encode (array("expFile" => $expFile ));

        } catch (Exception $e) { log_message('error', 'reportExcelAX Excepción:'.$e->getMessage()); }	
    }
    
    
    public function reportExcelAXEDOCTA()
    {
        $this->load->helper('date');
        $this->load->helper('html');
        $this->load->helper('url' );        
        $this->load->library('Excel');
  
        $dataInput = array();
        try{
        $expFile    = "";
        $hoy        = date('Y-m-d H:i:s');
        $dataInput  = array("rfc" => $this->input->post('rfc'), "paramDe" => $this->utils->senniDateFormat($this->input->post('paramDe')), "paramHasta" => $this->utils->senniDateFormat($this->input->post('paramHasta')) );
       // $dataInput  = array("rfc" => null, "paramDe" => $this->utils->senniDateFormat("01/06/2020"), "paramHasta" => $this->utils->senniDateFormat("31/07/2020"));
        $dataReport = $this->md_bi->reportExcelAXEDOCTA( $dataInput );
        
        $nameFile = "Reporte_Excel_EDOCTA.xlsx" ;
        $pathFile =  $this->output_dir ;
        $iconFile =  "images/ExcelLogo.png" ;
        $columnsTitles = array("BOOKING", "TYPE", "MONTO","MONEDA","TC","VENCIMIENTO", "ESTATUS", "FOLIO", "ORIGEN", "NOTAS");
        
        if ( file_exists( $pathFile . $nameFile) )
           { unlink( $pathFile . $nameFile );    }

        if( empty($dataReport) )
          { $expFile = "No se encontraron registros para exportar"; }  
        else    
          { 
            $tituloReporte = "Reporte con el Estado de Cuenta por Cliente";    
                
            $objPHPExcel   = new Excel();
         
            $objPHPExcel->getProperties()
                        ->setCreator    ("RAMF Logistics")                
                        ->setTitle      ($tituloReporte)
                        ->setSubject    ("Portal RAMF Logistics")                         
                        ->setKeywords   ("Estado de Cuenta ")
                        ->setCategory   ("Estado de Cuenta ")
                        ->setLastModifiedBy("Portal RAMF Logistics") 
                        ;
          
            $estiloTituloReporte = array('font'      => array('name'        => 'Verdana', 'bold' => true, 'italic' => false, 'strike' => false, 'size' => 15, 'color' => array('rgb' => 'FFFFFF')) ,
                                         'fill'      => array('type'        => PHPExcel_Style_Fill::FILL_SOLID, 'color' => array('rgb' => '000000')),
                                         'borders'   => array('allborders'  => array( 'style' => PHPExcel_Style_Border::BORDER_NONE)),
                                         'alignment' => array( 'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'rotation' => 0, 'wrap' => TRUE )
                                        );
        
            $estiloTituloColumnas = array('font'      => array('name'       => 'Arial', 'bold' => true, 'color' => array('rgb' => 'FFFFFF') ),
                                          'fill'      => array('type'       => PHPExcel_Style_Fill::FILL_GRADIENT_LINEAR, 'rotation' => 90, 'startcolor' => array('rgb' => 'CB0B0B'), 'endcolor' => array('rgb' => 'F5B093') ),
                                          'borders'   => array('top'        => array('style' => PHPExcel_Style_Border::BORDER_MEDIUM, 'color' => array( 'rgb' => 'EE7A48')), 'bottom' => array('style' => PHPExcel_Style_Border::BORDER_MEDIUM, 'color' => array( 'rgb' => 'EE7A48')) ),
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
            $estiloInformacion->applyFromArray( array('font'    => array('name' => 'Arial', 'color' => array('rgb' => '000000')),
                                                      'fill'    => array('type' => PHPExcel_Style_Fill::FILL_SOLID, 'color' => array('rgb' => 'FFFFFF')),
                                                      'borders' => array('left' => array('style' => PHPExcel_Style_Border::BORDER_THIN , 'color' => array('rgb' => 'EE7A48') ) )   
                                                     ));
        
            $objPHPExcel->getActiveSheet()->setTitle('Estado de Cuenta');
            $objPHPExcel->setActiveSheetIndex(0)
                        ->mergeCells('A1:J1')
                        ->mergeCells('A2:E2')
                        ->mergeCells('F2:J4')
                        ->mergeCells('A3:E3')                        
                        ->mergeCells('A4:E4')
                        ;

            $objPHPExcel->setActiveSheetIndex(0)
                        ->setCellValue('A1', $tituloReporte) 
                        ->setCellValue('A2', $dataReport[0]['rfc'] ." ". $dataReport[0]['razon_social']) 
                        ->setCellValue('A3', $dataReport[0]['DIR1'] ) 
                        ->setCellValue('A4', $dataReport[0]['DIR2'] ) 
                        ->setCellValue('A5', $hoy ) 
                        ->setCellValue('F2', "RAMF LOGISTICS") 
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
                        ;

            $objDrawing = new PHPExcel_Worksheet_Drawing();
            $objDrawing->setName('Logo');
            $objDrawing->setDescription('Logo RAMF Logistics');
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
            foreach ($dataReport as $r)
            { $numCelda++; 
              $objPHPExcel->getActiveSheet()->getRowDimension($numCelda)->setRowHeight(40);
              $objPHPExcel->setActiveSheetIndex(0)                          
                          ->setCellValue('A'.$numCelda, $r['num_booking'])
                          ->setCellValue('B'.$numCelda, $r['commodity'])
                          ->setCellValue('C'.$numCelda, "$".number_format($r['importe'] ,2, '.', ',' ))
                          ->setCellValue('D'.$numCelda, $r['moneda'])
                          ->setCellValue('E'.$numCelda, "$".number_format($r['tipo_cambio'] ,2, '.', ',' ))                          
                          ->setCellValue('F'.$numCelda, $r['vencimiento'])                          
                          ->setCellValue('G'.$numCelda, $r['status_track'])
                          ->setCellValue('H'.$numCelda, $r['id_pedido'])
                          ->setCellValue('I'.$numCelda, $r['pol'])
                          ->setCellValue('J'.$numCelda, $r['ins_envio'])
                          ;
            } 
            $objPHPExcel->getActiveSheet()->getStyle('A1:J1')->applyFromArray($estiloTituloReporte);
            $objPHPExcel->getActiveSheet()->getStyle('A6:J6')->applyFromArray($estiloTituloColumnas);
            $objPHPExcel->getActiveSheet()->getStyle('A3:A4')->applyFromArray($estiloSubTituloColumnas);
            $objPHPExcel->getActiveSheet()->getStyle('A2')->applyFromArray($estiloSubTituloColumnas);
            $objPHPExcel->getActiveSheet()->getStyle('F2')->applyFromArray($estiloSubTituloColumnas);
            $objPHPExcel->getActiveSheet()->getStyle('A5')->applyFromArray($estiloHoraReporte);
            $objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion, "A7:J".$numCelda);
            $objPHPExcel->getActiveSheet()->getStyle("A7:J".$numCelda)->applyFromArray(array('alignment' =>  array('horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_JUSTIFY, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => TRUE )));
            
            for($i = 'A'; $i <= 'J'; $i++){ $objPHPExcel->setActiveSheetIndex(0)->getColumnDimension($i)->setAutoSize(TRUE); }
            // Inmovilizar paneles
            $objPHPExcel->getActiveSheet(0)->freezePaneByColumnAndRow(0,7);

            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');            
            $objWriter->save($pathFile . $nameFile);
            
            $paramImg = array('src' => $iconFile, 'alt' => $nameFile, 'width' => '25', 'height'=> '25','title' => $nameFile, );
            $expFile  = anchor($pathFile . $nameFile, img( $paramImg ).nbs().$nameFile, 'title="'.$nameFile.'"') ;
          }
          /*$expFile  ="RFC: ".$dataInput["rfc"]." DE: ".$dataInput["paramDe"]." HASTA: ".$dataInput["paramHasta"];
          $expFile  =$expFile. "RFCparam : ".$this->input->post('rfc')." DEparam: ".$this->input->post('paramDe')." HASTAparam: ".$this->input->post('paramHasta');
          */
        echo json_encode (array("expFile" => $expFile ));

        } catch (Exception $e) { log_message('error', 'reportExcelAXEDOCTA Excepción:'.$e->getMessage()); }	
    }

    public function reportExcelAXORIGEN()
    {
        $this->load->helper('date');
        $this->load->helper('html');
        $this->load->helper('url' );        
        $this->load->library('Excel');
  
        $dataInput = array();
        try{
        $expFile    = "";                
        $dataInput  = array("origen" => $this->input->post('origen'), "paramDe" => $this->utils->senniDateFormat($this->input->post('paramDeORIGEN')), "paramHasta" => $this->utils->senniDateFormat($this->input->post('paramHastaORIGEN')) );
//        $dataInput  = array("origen" => "VIRACOPOSA", "paramDe" => $this->utils->senniDateFormat("01/04/2020"), "paramHasta" => $this->utils->senniDateFormat("31/09/2020") );
        $dataReport = $this->md_bi->reportExcelAXORIGEN( $dataInput );
        
        $hoy      = date('Y-m-d H:i:s');
        $nameFile = "Reporte_Excel_ORIGEN.xlsx" ;
        $pathFile =  $this->output_dir ;
        $iconFile =  "images/ExcelLogo.png" ;
        $columnsTitles =  array("MBL", "HBL", "SHIPPER","AGENTE", "# CONT", "ETD", "ETA", "POL", "POD", "DESCARGA", "CONTENEDOR", "ESTATUS", "FECHA DE ENTREGA", "SERVICIO");
        
        if ( file_exists( $pathFile . $nameFile) )
           { unlink( $pathFile . $nameFile );    }

        if( empty($dataReport) )
          { $expFile = "No se encontraron registros para exportar"; }  
        else    
          {  
            $tituloReporte = "Reporte de los Embarques por País de Orígen";    
                
            $objPHPExcel   = new Excel();
         
            $objPHPExcel->getProperties()
                        ->setCreator    ("RAMF Logistics")                
                        ->setTitle      ($tituloReporte)
                        ->setSubject    ("Portal RAMF Logistics")                         
                        ->setKeywords   ("País de Origen, POL, POD")
                        ->setCategory   ("País de Origen")
                        ->setLastModifiedBy("Portal RAMF Logistics") 
                        ;
          
            $estiloTituloReporte = array('font'      => array('name'        => 'Verdana', 'bold' => true, 'italic' => false, 'strike' => false, 'size' => 16, 'color' => array('rgb' => 'FFFFFF')) ,
                                         'fill'      => array('type'        => PHPExcel_Style_Fill::FILL_SOLID, 'color' => array('rgb' => '000000')),
                                         'borders'   => array('allborders'  => array( 'style' => PHPExcel_Style_Border::BORDER_NONE)),
                                         'alignment' => array( 'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'rotation' => 0, 'wrap' => TRUE )
                                        );
        
            $estiloTituloColumnas = array('font'      => array('name'       => 'Arial', 'bold' => true, 'color' => array('rgb' => 'FFFFFF') ),
                                          'fill'      => array('type'       => PHPExcel_Style_Fill::FILL_GRADIENT_LINEAR, 'rotation' => 90, 'startcolor' => array('rgb' => 'CB0B0B'), 'endcolor' => array('rgb' => 'F5B093') ),
                                          'borders'   => array('top'        => array('style' => PHPExcel_Style_Border::BORDER_MEDIUM, 'color' => array( 'rgb' => 'EE7A48')), 'bottom' => array('style' => PHPExcel_Style_Border::BORDER_MEDIUM, 'color' => array( 'rgb' => 'EE7A48')) ),
                                          'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, 'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => TRUE)
                                        );

            $estiloHoraReporte = array('font'      => array('name'       => 'Arial', 'color' => array('rgb' => '000000'),'size' => 7 ),
                                       'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, 'vertical'  => PHPExcel_Style_Alignment::VERTICAL_BOTTOM, 'wrap' => TRUE)
                                       );

            $estiloInformacion = new PHPExcel_Style();
            $estiloInformacion->applyFromArray( array('font'    => array('name' => 'Arial', 'color' => array('rgb' => '000000')),
                                                      'fill'    => array('type' => PHPExcel_Style_Fill::FILL_SOLID, 'color' => array('rgb' => 'FFFFFF')),
                                                      'borders' => array('left' => array('style' => PHPExcel_Style_Border::BORDER_THIN , 'color' => array('rgb' => 'EE7A48') ) )   
                                                     ));
        
            $objPHPExcel->getActiveSheet()->setTitle('Reporte País de Origen');
            $objPHPExcel->setActiveSheetIndex(0)
                        ->mergeCells('A1:J1')
                        ->mergeCells('A2:M2');

            $objPHPExcel->setActiveSheetIndex(0)
                        ->setCellValue('A1', $tituloReporte) 
                        ->setCellValue('A2', $hoy) 
                        ->setCellValue('A3', $columnsTitles[0])
                        ->setCellValue('B3', $columnsTitles[1])
                        ->setCellValue('C3', $columnsTitles[2])
                        ->setCellValue('D3', $columnsTitles[3])
                        ->setCellValue('E3', $columnsTitles[4])
                        ->setCellValue('F3', $columnsTitles[5])
                        ->setCellValue('G3', $columnsTitles[6])
                        ->setCellValue('H3', $columnsTitles[7])
                        ->setCellValue('I3', $columnsTitles[8])
                        ->setCellValue('J3', $columnsTitles[9])
                        ->setCellValue('K3', $columnsTitles[10])
                        ->setCellValue('L3', $columnsTitles[11])
                        ->setCellValue('M3', $columnsTitles[12])
                        ;
            $objDrawing = new PHPExcel_Worksheet_Drawing();
            $objDrawing->setName('Logo');
            $objDrawing->setDescription('Logo RAMF Logistics');
            $objDrawing->setPath('images/Logo.png');
            $objDrawing->setCoordinates('A2');                      
            //setOffsetX works properly
            $objDrawing->setOffsetX(1); 
            $objDrawing->setOffsetY(1);                
            //set width, height
            $objDrawing->setWidth(150); 
            $objDrawing->setHeight(60); 
            $objDrawing->setWorksheet($objPHPExcel->setActiveSheetIndex(0));

            $objPHPExcel->getActiveSheet()->getRowDimension('2')->setRowHeight(60);
            $objPHPExcel->getActiveSheet()->getRowDimension('1')->setRowHeight(25);

            /*** CONTENIDO*/
            $numCelda = 3;
            foreach ($dataReport as $r)
            { $numCelda++;
              $objPHPExcel->getActiveSheet()->getRowDimension($numCelda)->setRowHeight(40);
              $objPHPExcel->setActiveSheetIndex(0)                          
                          ->setCellValue('A'.$numCelda, $r['num_mbl'] )
                          ->setCellValue('B'.$numCelda, $r['num_hbl'])
                          ->setCellValue('c'.$numCelda, $r['shipper'])
                          ->setCellValue('D'.$numCelda, "-")
                          ->setCellValue('E'.$numCelda, $r['num_contenedor'])
                          ->setCellValue('F'.$numCelda, $r['pedido_etd'])
                          ->setCellValue('G'.$numCelda, $r['pedido_eta'])
                          ->setCellValue('H'.$numCelda, $r['pol'])
                          ->setCellValue('I'.$numCelda, $r['pod1'])
                          ->setCellValue('J'.$numCelda, "")
                          ->setCellValue('K'.$numCelda, $r['ins_envio'])
                          ->setCellValue('L'.$numCelda, $r['status_track'])
                          ->setCellValue('M'.$numCelda, $r['entrega'])
                          ;
            }
            $objPHPExcel->getActiveSheet()->getStyle('A1:M1')->applyFromArray($estiloTituloReporte);
            $objPHPExcel->getActiveSheet()->getStyle('A3:M3')->applyFromArray($estiloTituloColumnas);
            $objPHPExcel->getActiveSheet()->getStyle('A2')->applyFromArray($estiloHoraReporte);
            $objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion, "A4:M".$numCelda);
            $objPHPExcel->getActiveSheet()->getStyle("A4:M".$numCelda)->applyFromArray(array('alignment' =>  array('horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_JUSTIFY, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => TRUE )));
            
            for($i = 'A'; $i <= 'M'; $i++){ $objPHPExcel->setActiveSheetIndex(0)->getColumnDimension($i)->setAutoSize(TRUE); }
            // Inmovilizar paneles
            $objPHPExcel->getActiveSheet(0)->freezePaneByColumnAndRow(0,4);

            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');            
            $objWriter->save($pathFile . $nameFile);
            
            $paramImg = array('src' => $iconFile, 'alt' => $nameFile, 'width' => '25', 'height'=> '25','title' => $nameFile, );
            $expFile  = anchor($pathFile . $nameFile, img( $paramImg ).nbs().$nameFile, 'title="'.$nameFile.'"') ;
          }
        
        echo json_encode (array("expFile" => $expFile ));

        } catch (Exception $e) { log_message('error', 'reportExcelAXORIGEN Excepción:'.$e->getMessage()); }	
    }
        



    public function dataForChartAX()
{try{/*$tipo       = "CL";
     $typeParam  = "razon_social";
     $typeParamII= "P";
     $paramDe    = $this->utils->senniDateFormat("01/12/2018");
     $paramHasta = $this->utils->senniDateFormat("01/01/2019");
     */
     $tipo       = $this->input->post('type');//"SE";//"VD";
     $typeParam  = $this->input->post('typeParam');//NULL;//"V";
     $typeParamII= $this->input->post('typeParamII');//NULL;//"V";
     $paramDe    = $this->utils->senniDateFormat($this->input->post('paramDe'));//$this->utils->senniDateFormat("01/12/2018");
     $paramHasta = $this->utils->senniDateFormat($this->input->post('paramHasta'));//$this->utils->senniDateFormat("31/12/2018");
     $subtitulo  = (!empty($paramDe) & !empty($paramHasta) ? "Reporte generado del ".$paramDe." al  ".$paramHasta : date("Y"));
     $tipos_servicio = $this->md_catalogo->poblarServicios("tipo_servicio","TS");

    switch ($tipo) 
    {
     case "SE":
         $dataChart = $this->md_bi->chartServices($paramDe, $paramHasta, $tipos_servicio);             
         $data = array( "data"       => $dataChart['series'] 
                       ,"categories" => $dataChart['categories']
                      );
     break;
     case "CL":         
         $subtitulo = $subtitulo.(empty($typeParam) ? "" : (($typeParam==="nombre") ? " por Cliente" : " por Cliente")) . (empty($typeParamII) ? "" : (($typeParamII==="N") ? " en número de servicios" : " en Profit"));
         $data      = $this->md_bi->chartCustomer($paramDe, $paramHasta, $typeParam, $typeParamII);                 
     break;
     case "CT":         
         $subtitulo = $subtitulo.(empty($typeParam)?"":($typeParam==="es"?" Encuestas de Satisfacción" :" Servicios "));         
         $data      = array("data" => $this->md_bi->chartStatus($paramDe, $paramHasta,$typeParam) );
     break;
     case "VD":
         $subtitulo = $subtitulo.(empty($typeParam) ? "" : ( $typeParam === "V"?" Ventas" :" Operaciones "));
         $dataChart = $this->md_bi->chartVendedor($paramDe, $paramHasta, $typeParam);         
         $data      = array( "data"       => $dataChart['series'] 
                            ,"categories" => $dataChart['categories']
                           );
     break; 
     default: $data= array();  break;
    }
    
    echo json_encode(array("data"=>$data,"subtitulo"=>$subtitulo) );

 } catch (Exception $e) {log_message('error', 'CHART Excepción:'.$e->getMessage()); }	

}


}//cONTROLLER
