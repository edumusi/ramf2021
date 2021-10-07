<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
define('FILE_READ_MODE' , 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE'  , 0755);
define('DIR_WRITE_MODE' , 0777);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

define('FOPEN_READ'                         , 'rb' );
define('FOPEN_READ_WRITE'                   , 'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE'     , 'wb' ); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE'                 , 'ab' );
define('FOPEN_READ_WRITE_CREATE'            , 'a+b');
define('FOPEN_WRITE_CREATE_STRICT'          , 'xb' );
define('FOPEN_READ_WRITE_CREATE_STRICT'     , 'x+b');

define('RAZON_SOCIAL_FULL', 'RAMF Logistics S.A. DE C.V.' );
define('RAZON_SOCIAL'     , 'RAMF Logistics S.A. DE C.V.' );
define('RFC'              , 'RLO180430B68' ); 
define('URL_SITE'         , 'www.ramf-log.com.mx' );
define('TITULO_NAVEGADOR' , 'RAMF Logistics');
define('TITULO_VENTANA'   , 'RAMF Logistics' );
define('NOMBRE_CORTO'     , 'RAMF' );
define('CORREO_DOMINIO'   ,'@ramf-log.com.mx');
define('CORREO_CONTACTO'  ,'direccion@ramf-log.com');
define('CORREO2_CONTACTO' ,'trafico@ramf-log.com');
define('DIR1_CONTACTO'    ,'CDMX');
define('DIR2_CONTACTO'    ,'MÉXICO, C.P. 03650');
define('TEL_CONTACTO'     ,'(+52)55-72-61-03-58');
define('CEL_CONTACTO'     ,'(+52)55-72-61-03-32');

define('RS_SENNI'         , 'SENNI Logistics S.A. DE C.V.' );
define('RFC_SENNI'        , 'SLO150219HS8' );
define('URL_SITE_SENNI'   , 'www.senni.com.mx' );
 
define('PROCENTAJE_COMISION_VENTAS', 10);
define('PERFIL_ADMIN'     , 'A');
define('PROCENTAJE_COMISION_OPERACIONES', 1 );

define('IMPUESTO'       , 'IVA');
define('TIPOCOMP_FACT'  , 'Ingreso');
define('TIPOCOMP_PAGO'  , 'Pago');
define('SERIE_SAT'      , 'B'); 
define('SERIE_SAT_SENNI', 'B');
define('SERIE_SAT_PAGO' , 'P');
define('TIPOCOMP_RN'    , 'N');
define('STATUS_TIMBRADA','TIMBRADA');
define('STATUS_CANCELADA','CANCELADA');
define('TASA_IVA','0.160000');
define('TASA_IVA_CERO','0.000000');

define('STATUS_ELIMINADO', 102);
define('DOC_PUBLICO', 103);
/* End of file constants.php */
/* Location: ./application/config/constants.php */