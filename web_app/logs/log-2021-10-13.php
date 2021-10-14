<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

ERROR - 13-10-2021 21:29:11 --> datos:array (
  'dir_cfdi' => 'adjuntos/1547764193/cfdi/',
  'version_cfdi' => '3.3',
  'cfdi' => 'adjuntos/1547764193/cfdi/I_B_10_cfdi3_3.xml',
  'xml_debug' => '/opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/timbrados/sin_timbrar_ejemplo_factura.xml',
  'PAC' => 
  array (
    'usuario' => 'DEMO700101XXX',
    'pass' => 'DEMO700101XXX',
    'produccion' => 'NO',
  ),
  'conf' => 
  array (
    'cer' => '/opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/certificados/XIA190128J61.cer.pem',
    'key' => '/opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/certificados/XIA190128J61.key.pem',
    'pass' => '12345678a',
  ),
  'emisor' => 
  array (
    'rfc' => 'XIA190128J61',
    'nombre' => 'ACCEM SERVICIOS EMPRESARIALES SC',
  ),
  'id_factura' => '1634178525',
  'id_pedido' => '1547764193',
  'factPDF' => 
  array (
    'logo' => 'Logo.jpg',
    'logoWidth' => '120',
    'logoHeight' => '75',
    'RegimenFiscalDesc' => 
    array (
      'Descripcion' => 'General de Ley Personas Morales',
    ),
    'notas' => 'test',
    'tipocomprobanteDesc' => 'Ingreso
',
    'totalConLetras' => 'DOSCIENTOS SETENTA Y CINCO MIL TRESCIENTOS CUARENTA Y SEIS',
    'translados' => 
    array (
      0 => 
      array (
        'base' => 16923.69,
      ),
    ),
    'UsoCFDIDesc' => 
    array (
      'Descripcion' => 'Gastos en general',
    ),
    'emailReceptor' => 'compras@greda.com',
    'cpReceptor' => '54713',
  ),
  'factura' => 
  array (
    'LugarExpedicion' => '03650',
    'RegimenFiscal' => '601',
    'folio' => 10,
    'fecha_expedicion' => '2021-10-13T21:29:11',
    'descuento' => '0.0',
    'forma_pago' => '03',
    'forma_pagoDesc' => 
    array (
      'Descripcion' => 'Transferencia electrónica de fondos',
    ),
    'metodo_pago' => 'PUE',
    'metodo_pagoDesc' => 
    array (
      'Descripcion' => 'Pago en una sola exhibición',
    ),
    'moneda' => 'MXN',
    'serie' => 'B',
    'subtotal' => '258423.12',
    'tipocambio' => '1',
    'tipocomprobante' => 'I',
    'total' => '275346.82',
  ),
  'receptor' => 
  array (
    'rfc' => 'GCE171024CQ0',
    'nombre' => 'GREDA CERAMICOS S.A DE C.V ',
    'UsoCFDI' => 'G03',
  ),
  'conceptos' => 
  array (
    0 => 
    array (
      'cantidad' => '1',
      'unidad' => 'SERVICIO',
      'descripcion' => 'FLETE INTERNACIONAL ',
      'valorunitario' => '152649.94',
      'importe' => '152649.94',
      'ClaveProdServ' => '78121603',
      'ClaveUnidad' => 'E48',
      'Impuestos' => 
      array (
        'Traslados' => 
        array (
          0 => 
          array (
            'Base' => '152649.94',
            'Impuesto' => '002',
            'TipoFactor' => 'Tasa',
            'TasaOCuota' => '0.000000',
            'Importe' => '0.00',
          ),
        ),
      ),
    ),
    1 => 
    array (
      'cantidad' => '1',
      'unidad' => 'SERVICIO',
      'descripcion' => 'FLETE NACIONAL',
      'valorunitario' => '101766.62',
      'importe' => '101766.62',
      'ClaveProdServ' => '78121603',
      'ClaveUnidad' => 'E48',
      'Impuestos' => 
      array (
        'Traslados' => 
        array (
          0 => 
          array (
            'Base' => '101766.62',
            'Impuesto' => '002',
            'TipoFactor' => 'Tasa',
            'TasaOCuota' => '0.160000',
            'Importe' => '16282.65',
          ),
        ),
      ),
    ),
    2 => 
    array (
      'cantidad' => '1',
      'unidad' => 'SERVICIO',
      'descripcion' => 'GASTOS LOCALES',
      'valorunitario' => '4006.56',
      'importe' => '4006.56',
      'ClaveProdServ' => '78121603',
      'ClaveUnidad' => 'E48',
      'Impuestos' => 
      array (
        'Traslados' => 
        array (
          0 => 
          array (
            'Base' => '4006.56',
            'Impuesto' => '002',
            'TipoFactor' => 'Tasa',
            'TasaOCuota' => '0.160000',
            'Importe' => '641.04',
          ),
        ),
      ),
    ),
  ),
  'pdfconceptos' => 
  array (
    0 => 
    array (
      'cantidad' => '1',
      'unidad' => 'SERVICIO',
      'ID' => '2970',
      'descripcion' => 'FLETE INTERNACIONAL ',
      'valorunitario' => '152649.94',
      'importe' => '152649.94',
      'ClaveProdServ' => '78121603',
      'ClaveUnidad' => 'E48',
      'sumaIVA' => '0',
      'Impuestos' => 
      array (
        'Traslados' => 
        array (
          0 => 
          array (
            'Base' => '152649.94',
            'Impuesto' => '002',
            'TipoFactor' => 'Tasa',
            'TasaOCuota' => '0.000000',
            'Importe' => '0.00',
          ),
        ),
      ),
    ),
    1 => 
    array (
      'cantidad' => '1',
      'unidad' => 'SERVICIO',
      'ID' => '2971',
      'descripcion' => 'FLETE NACIONAL',
      'valorunitario' => '101766.62',
      'importe' => '101766.62',
      'ClaveProdServ' => '78121603',
      'ClaveUnidad' => 'E48',
      'sumaIVA' => '1',
      'Impuestos' => 
      array (
        'Traslados' => 
        array (
          0 => 
          array (
            'Base' => '101766.62',
            'Impuesto' => '002',
            'TipoFactor' => 'Tasa',
            'TasaOCuota' => '0.160000',
            'Importe' => '16282.65',
          ),
        ),
      ),
    ),
    2 => 
    array (
      'cantidad' => '1',
      'unidad' => 'SERVICIO',
      'ID' => '2972',
      'descripcion' => 'GASTOS LOCALES',
      'valorunitario' => '4006.56',
      'importe' => '4006.56',
      'ClaveProdServ' => '78121603',
      'ClaveUnidad' => 'E48',
      'sumaIVA' => '1',
      'Impuestos' => 
      array (
        'Traslados' => 
        array (
          0 => 
          array (
            'Base' => '4006.56',
            'Impuesto' => '002',
            'TipoFactor' => 'Tasa',
            'TasaOCuota' => '0.160000',
            'Importe' => '641.04',
          ),
        ),
      ),
    ),
  ),
  'impuestos' => 
  array (
    'translados' => 
    array (
      0 => 
      array (
        'impuesto' => '002',
        'tasa' => '0.160000',
        'importe' => 16923.69,
        'TipoFactor' => 'Tasa',
      ),
      1 => 
      array (
        'impuesto' => '002',
        'tasa' => '0.000000',
        'importe' => 0.0,
        'TipoFactor' => 'Tasa',
      ),
    ),
    'TotalImpuestosTrasladados' => 16923.69,
  ),
  'pdf' => 
  array (
    'rfc' => 'RLO180430B68',
    'RegistroPatronal' => '1234',
    'nombre_fiscal' => 'RAMF LOGISTICS SA DE CV',
    'domicilio_fiscal' => 'TAJIN 668, Col LETRAN VALLE, BENITO JUAREZ, CDMX, MÉXICO, 03650',
    'cp_fiscal' => '03650',
    'correo_fiscal' => 'facturacion@ramf-log.com',
    'domicilio' => 'TAJIN 668, Col LETRAN VALLE, BENITO JUAREZ, CDMX, MÉXICO, 03650',
    'PAC_USUARIO' => 'DEMO700101XXX',
    'PAC_PWD' => 'DEMO700101XXX',
    'CSD_CER' => 'XIA190128J61.cer.pem',
    'CSD_KEY' => 'XIA190128J61.key.pem',
    'CSD_PWD' => '12345678a',
    'dir_cfdi' => 'adjuntos/1547764193/',
  ),
)
ERROR - 13-10-2021 21:29:11 --> Severity: Notice  --> Undefined index: __MF_VERSION_CFDI__ /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/lib/nodos/cfdi/cfdi.php 11
ERROR - 13-10-2021 21:29:11 --> Severity: Notice  --> Undefined index: __MF_VERSION_CFDI__ /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/lib/utils/alias.php 14
ERROR - 13-10-2021 21:29:11 --> Severity: Notice  --> Undefined index: __MF_VERSION_CFDI__ /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/lib/nodos/cfdi/cfdi.php 79
ERROR - 13-10-2021 21:29:11 --> Severity: Notice  --> Undefined index: codigo_mf_numero /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/lib/nodos/cfdi/cfdi.php 158
ERROR - 13-10-2021 21:29:11 --> Severity: Notice  --> Undefined variable: __mf_rfc_pruebas__ /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/lib/nodos/cfdi/cfdi.php 355
ERROR - 13-10-2021 21:29:14 --> Severity: Notice  --> Undefined index: url /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/lib/nodos/cfdi/cfdi.php 448
ERROR - 13-10-2021 21:29:17 --> Severity: Notice  --> A non well formed numeric value encountered /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/sdk272.php 1062
ERROR - 13-10-2021 21:29:17 --> Severity: Notice  --> A non well formed numeric value encountered /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/sdk272.php 1062
ERROR - 13-10-2021 21:29:17 --> Severity: Notice  --> Undefined index: xml_solo_firmado /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/sdk272.php 861
ERROR - 13-10-2021 21:29:17 --> Severity: Notice  --> Undefined index: modo_panama /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/sdk272.php 1814
ERROR - 13-10-2021 21:29:17 --> Severity: Notice  --> Undefined index: xml_sin_firmar /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/sdk272.php 924
ERROR - 13-10-2021 21:29:17 --> Severity: Warning  --> file_put_contents(/opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/timbrados/sin_timbrar_ejemplo_factura.xml): failed to open stream: Permission denied /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/sdk272.php 930
ERROR - 13-10-2021 21:29:17 --> resp:array (
  'error' => 
  array (
    0 => '{"message":"CFDI33118 - El campo Total no corresponde con la suma del subtotal, menos los descuentos aplicables, más las contribuciones recibidas (impuestos trasladados - federales o locales, derechos, productos, aprovechamientos, aportaciones de seguridad social, contribuciones de mejoras) menos los impuestos retenidos.","messageDetail":". ValorEsperado: 275346.81 ValorReportado: 275346.82","data":null,"status":"error"}',
    1 => 'a:15:{s:4:"cfdi";s:0:"";s:3:"png";s:0:"";s:5:"idpac";i:1;s:3:"pac";i:3;s:10:"produccion";s:2:"NO";s:16:"codigo_mf_numero";i:2;s:15:"codigo_mf_texto";s:311:"CFDI33118 - El campo Total no corresponde con la suma del subtotal, menos los descuentos aplicables, más las contribuciones recibidas (impuestos trasladados - federales o locales, derechos, productos, aprovechamientos, aportaciones de seguridad social, contribuciones de mejoras) menos los impuestos retenidos.";s:25:"mensaje_original_pac_json";s:425:"{"message":"CFDI33118 - El campo Total no corresponde con la suma del subtotal, menos los descuentos aplicables, más las contribuciones recibidas (impuestos trasladados - federales o locales, derechos, productos, aprovechamientos, aportaciones de seguridad social, contribuciones de mejoras) menos los impuestos retenidos.","messageDetail":". ValorEsperado: 275346.81 ValorReportado: 275346.82","data":null,"status":"error"}";s:9:"cancelada";s:2:"SI";s:5:"saldo";i:993614;s:4:"uuid";s:0:"";s:8:"servidor";s:1:"2";s:9:"ejecucion";d:163.64199999999997;s:5:"debug";s:12:""ID: 296428"";s:7:"abortar";b:1;}',
    2 => 'ARCHIVOS DEBUG : /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/tmp/ ultimo_error.xml  ultimo_error_datos.xml  ultimo_error_datos.ini  ultimo_error_respuesta.txt ',
  ),
  'success' => 
  array (
  ),
)
ERROR - 13-10-2021 22:35:18 --> VER I
ERROR - 13-10-2021 22:35:18 --> VER II
ERROR - 13-10-2021 22:35:18 --> VER III
ERROR - 13-10-2021 22:35:18 --> VER IV
ERROR - 13-10-2021 22:35:22 --> datos:array (
  'dir_cfdi' => 'adjuntos/1547764193/cfdi/',
  'version_cfdi' => '3.3',
  'cfdi' => 'adjuntos/1547764193/cfdi/I_B_10_cfdi3_3.xml',
  'xml_debug' => '/opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/timbrados/sin_timbrar_ejemplo_factura.xml',
  'PAC' => 
  array (
    'usuario' => 'DEMO700101XXX',
    'pass' => 'DEMO700101XXX',
    'produccion' => 'NO',
  ),
  'conf' => 
  array (
    'cer' => '/opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/certificados/XIA190128J61.cer.pem',
    'key' => '/opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/certificados/XIA190128J61.key.pem',
    'pass' => '12345678a',
  ),
  'emisor' => 
  array (
    'rfc' => 'XIA190128J61',
    'nombre' => 'ACCEM SERVICIOS EMPRESARIALES SC',
  ),
  'id_factura' => '1634178525',
  'id_pedido' => '1547764193',
  'factPDF' => 
  array (
    'logo' => 'Logo.jpg',
    'logoWidth' => '120',
    'logoHeight' => '75',
    'RegimenFiscalDesc' => 
    array (
      'Descripcion' => 'General de Ley Personas Morales',
    ),
    'notas' => 'test',
    'tipocomprobanteDesc' => 'Ingreso
',
    'totalConLetras' => 'DOSCIENTOS SETENTA Y CINCO MIL TRESCIENTOS CUARENTA Y SEIS',
    'translados' => 
    array (
      0 => 
      array (
        'base' => 16923.69,
      ),
    ),
    'UsoCFDIDesc' => 
    array (
      'Descripcion' => 'Gastos en general',
    ),
    'emailReceptor' => 'compras@greda.com',
    'cpReceptor' => '54713',
  ),
  'factura' => 
  array (
    'LugarExpedicion' => '03650',
    'RegimenFiscal' => '601',
    'folio' => 10,
    'fecha_expedicion' => '2021-10-13T22:35:22',
    'descuento' => '0.0',
    'forma_pago' => '03',
    'forma_pagoDesc' => 
    array (
      'Descripcion' => 'Transferencia electrónica de fondos',
    ),
    'metodo_pago' => 'PUE',
    'metodo_pagoDesc' => 
    array (
      'Descripcion' => 'Pago en una sola exhibición',
    ),
    'moneda' => 'MXN',
    'serie' => 'B',
    'subtotal' => '258423.12',
    'tipocambio' => '1.00000',
    'tipocomprobante' => 'I',
    'total' => '275346.81',
  ),
  'receptor' => 
  array (
    'rfc' => 'GCE171024CQ0',
    'nombre' => 'GREDA CERAMICOS S.A DE C.V ',
    'UsoCFDI' => 'G03',
  ),
  'conceptos' => 
  array (
    0 => 
    array (
      'cantidad' => '1',
      'unidad' => 'SERVICIO',
      'descripcion' => 'FLETE INTERNACIONAL ',
      'valorunitario' => '152649.94',
      'importe' => '152649.94',
      'ClaveProdServ' => '78121603',
      'ClaveUnidad' => 'E48',
      'Impuestos' => 
      array (
        'Traslados' => 
        array (
          0 => 
          array (
            'Base' => '152649.94',
            'Impuesto' => '002',
            'TipoFactor' => 'Tasa',
            'TasaOCuota' => '0.000000',
            'Importe' => '0.00',
          ),
        ),
      ),
    ),
    1 => 
    array (
      'cantidad' => '1',
      'unidad' => 'SERVICIO',
      'descripcion' => 'FLETE NACIONAL',
      'valorunitario' => '101766.62',
      'importe' => '101766.62',
      'ClaveProdServ' => '78121603',
      'ClaveUnidad' => 'E48',
      'Impuestos' => 
      array (
        'Traslados' => 
        array (
          0 => 
          array (
            'Base' => '101766.62',
            'Impuesto' => '002',
            'TipoFactor' => 'Tasa',
            'TasaOCuota' => '0.160000',
            'Importe' => '16282.65',
          ),
        ),
      ),
    ),
    2 => 
    array (
      'cantidad' => '1',
      'unidad' => 'SERVICIO',
      'descripcion' => 'GASTOS LOCALES',
      'valorunitario' => '4006.56',
      'importe' => '4006.56',
      'ClaveProdServ' => '78121603',
      'ClaveUnidad' => 'E48',
      'Impuestos' => 
      array (
        'Traslados' => 
        array (
          0 => 
          array (
            'Base' => '4006.56',
            'Impuesto' => '002',
            'TipoFactor' => 'Tasa',
            'TasaOCuota' => '0.160000',
            'Importe' => '641.04',
          ),
        ),
      ),
    ),
  ),
  'pdfconceptos' => 
  array (
    0 => 
    array (
      'cantidad' => '1',
      'unidad' => 'SERVICIO',
      'ID' => '2970',
      'descripcion' => 'FLETE INTERNACIONAL ',
      'valorunitario' => '152649.94',
      'importe' => '152649.94',
      'ClaveProdServ' => '78121603',
      'ClaveUnidad' => 'E48',
      'sumaIVA' => '0',
      'Impuestos' => 
      array (
        'Traslados' => 
        array (
          0 => 
          array (
            'Base' => '152649.94',
            'Impuesto' => '002',
            'TipoFactor' => 'Tasa',
            'TasaOCuota' => '0.000000',
            'Importe' => '0.00',
          ),
        ),
      ),
    ),
    1 => 
    array (
      'cantidad' => '1',
      'unidad' => 'SERVICIO',
      'ID' => '2971',
      'descripcion' => 'FLETE NACIONAL',
      'valorunitario' => '101766.62',
      'importe' => '101766.62',
      'ClaveProdServ' => '78121603',
      'ClaveUnidad' => 'E48',
      'sumaIVA' => '1',
      'Impuestos' => 
      array (
        'Traslados' => 
        array (
          0 => 
          array (
            'Base' => '101766.62',
            'Impuesto' => '002',
            'TipoFactor' => 'Tasa',
            'TasaOCuota' => '0.160000',
            'Importe' => '16282.65',
          ),
        ),
      ),
    ),
    2 => 
    array (
      'cantidad' => '1',
      'unidad' => 'SERVICIO',
      'ID' => '2972',
      'descripcion' => 'GASTOS LOCALES',
      'valorunitario' => '4006.56',
      'importe' => '4006.56',
      'ClaveProdServ' => '78121603',
      'ClaveUnidad' => 'E48',
      'sumaIVA' => '1',
      'Impuestos' => 
      array (
        'Traslados' => 
        array (
          0 => 
          array (
            'Base' => '4006.56',
            'Impuesto' => '002',
            'TipoFactor' => 'Tasa',
            'TasaOCuota' => '0.160000',
            'Importe' => '641.04',
          ),
        ),
      ),
    ),
  ),
  'impuestos' => 
  array (
    'translados' => 
    array (
      0 => 
      array (
        'impuesto' => '002',
        'tasa' => '0.160000',
        'importe' => 16923.69,
        'TipoFactor' => 'Tasa',
      ),
      1 => 
      array (
        'impuesto' => '002',
        'tasa' => '0.000000',
        'importe' => 0.0,
        'TipoFactor' => 'Tasa',
      ),
    ),
    'TotalImpuestosTrasladados' => 16923.69,
  ),
  'pdf' => 
  array (
    'rfc' => 'RLO180430B68',
    'RegistroPatronal' => '1234',
    'nombre_fiscal' => 'RAMF LOGISTICS SA DE CV',
    'domicilio_fiscal' => 'TAJIN 668, Col LETRAN VALLE, BENITO JUAREZ, CDMX, MÉXICO, 03650',
    'cp_fiscal' => '03650',
    'correo_fiscal' => 'facturacion@ramf-log.com',
    'domicilio' => 'TAJIN 668, Col LETRAN VALLE, BENITO JUAREZ, CDMX, MÉXICO, 03650',
    'PAC_USUARIO' => 'DEMO700101XXX',
    'PAC_PWD' => 'DEMO700101XXX',
    'CSD_CER' => 'XIA190128J61.cer.pem',
    'CSD_KEY' => 'XIA190128J61.key.pem',
    'CSD_PWD' => '12345678a',
    'dir_cfdi' => 'adjuntos/1547764193/',
  ),
)
ERROR - 13-10-2021 22:35:22 --> Severity: Notice  --> Undefined index: __MF_VERSION_CFDI__ /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/lib/nodos/cfdi/cfdi.php 11
ERROR - 13-10-2021 22:35:22 --> Severity: Notice  --> Undefined index: __MF_VERSION_CFDI__ /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/lib/utils/alias.php 14
ERROR - 13-10-2021 22:35:22 --> Severity: Notice  --> Undefined index: __MF_VERSION_CFDI__ /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/lib/nodos/cfdi/cfdi.php 79
ERROR - 13-10-2021 22:35:22 --> Severity: Notice  --> Undefined index: codigo_mf_numero /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/lib/nodos/cfdi/cfdi.php 158
ERROR - 13-10-2021 22:35:22 --> Severity: Notice  --> Undefined variable: __mf_rfc_pruebas__ /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/lib/nodos/cfdi/cfdi.php 355
ERROR - 13-10-2021 22:35:24 --> Severity: Notice  --> Undefined index: url /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/lib/nodos/cfdi/cfdi.php 448
ERROR - 13-10-2021 22:35:27 --> Severity: Notice  --> A non well formed numeric value encountered /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/sdk272.php 1062
ERROR - 13-10-2021 22:35:27 --> Severity: Notice  --> A non well formed numeric value encountered /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/sdk272.php 1062
ERROR - 13-10-2021 22:35:27 --> Severity: Notice  --> Undefined index: xml_solo_firmado /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/sdk272.php 861
ERROR - 13-10-2021 22:35:27 --> Severity: Notice  --> Undefined index: modo_panama /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/sdk272.php 1814
ERROR - 13-10-2021 22:35:27 --> Severity: Notice  --> Undefined index: xml_sin_firmar /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/sdk272.php 924
ERROR - 13-10-2021 22:35:27 --> Severity: Warning  --> file_put_contents(/opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/timbrados/sin_timbrar_ejemplo_factura.xml): failed to open stream: Permission denied /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/sdk272.php 930
ERROR - 13-10-2021 22:35:27 --> resp:array (
  'error' => 
  array (
    0 => '{"message":"CFDI33113 - El campo TipoCambio no tiene el valor 1 y la moneda indicada es MXN.","messageDetail":" ValorEsperado: 1 ValorReportado: 1.00000","data":null,"status":"error"}',
    1 => 'a:15:{s:4:"cfdi";s:0:"";s:3:"png";s:0:"";s:5:"idpac";i:1;s:3:"pac";i:3;s:10:"produccion";s:2:"NO";s:16:"codigo_mf_numero";i:2;s:15:"codigo_mf_texto";s:80:"CFDI33113 - El campo TipoCambio no tiene el valor 1 y la moneda indicada es MXN.";s:25:"mensaje_original_pac_json";s:183:"{"message":"CFDI33113 - El campo TipoCambio no tiene el valor 1 y la moneda indicada es MXN.","messageDetail":" ValorEsperado: 1 ValorReportado: 1.00000","data":null,"status":"error"}";s:9:"cancelada";s:2:"SI";s:5:"saldo";i:993614;s:4:"uuid";s:0:"";s:8:"servidor";s:1:"2";s:9:"ejecucion";d:822.798;s:5:"debug";s:12:""ID: 296548"";s:7:"abortar";b:1;}',
    2 => 'ARCHIVOS DEBUG : /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/tmp/ ultimo_error.xml  ultimo_error_datos.xml  ultimo_error_datos.ini  ultimo_error_respuesta.txt ',
  ),
  'success' => 
  array (
  ),
)
ERROR - 13-10-2021 22:35:56 --> datos:array (
  'dir_cfdi' => 'adjuntos/1547764193/cfdi/',
  'version_cfdi' => '3.3',
  'cfdi' => 'adjuntos/1547764193/cfdi/I_B_10_cfdi3_3.xml',
  'xml_debug' => '/opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/timbrados/sin_timbrar_ejemplo_factura.xml',
  'PAC' => 
  array (
    'usuario' => 'DEMO700101XXX',
    'pass' => 'DEMO700101XXX',
    'produccion' => 'NO',
  ),
  'conf' => 
  array (
    'cer' => '/opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/certificados/XIA190128J61.cer.pem',
    'key' => '/opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/certificados/XIA190128J61.key.pem',
    'pass' => '12345678a',
  ),
  'emisor' => 
  array (
    'rfc' => 'XIA190128J61',
    'nombre' => 'ACCEM SERVICIOS EMPRESARIALES SC',
  ),
  'id_factura' => '1634178525',
  'id_pedido' => '1547764193',
  'factPDF' => 
  array (
    'logo' => 'Logo.jpg',
    'logoWidth' => '120',
    'logoHeight' => '75',
    'RegimenFiscalDesc' => 
    array (
      'Descripcion' => 'General de Ley Personas Morales',
    ),
    'notas' => 'test',
    'tipocomprobanteDesc' => 'Ingreso
',
    'totalConLetras' => 'DOSCIENTOS SETENTA Y CINCO MIL TRESCIENTOS CUARENTA Y SEIS',
    'translados' => 
    array (
      0 => 
      array (
        'base' => 16923.69,
      ),
    ),
    'UsoCFDIDesc' => 
    array (
      'Descripcion' => 'Gastos en general',
    ),
    'emailReceptor' => 'compras@greda.com',
    'cpReceptor' => '54713',
  ),
  'factura' => 
  array (
    'LugarExpedicion' => '03650',
    'RegimenFiscal' => '601',
    'folio' => 10,
    'fecha_expedicion' => '2021-10-13T22:35:56',
    'descuento' => '0.0',
    'forma_pago' => '03',
    'forma_pagoDesc' => 
    array (
      'Descripcion' => 'Transferencia electrónica de fondos',
    ),
    'metodo_pago' => 'PUE',
    'metodo_pagoDesc' => 
    array (
      'Descripcion' => 'Pago en una sola exhibición',
    ),
    'moneda' => 'MXN',
    'serie' => 'B',
    'subtotal' => '258423.12',
    'tipocambio' => '1.000',
    'tipocomprobante' => 'I',
    'total' => '275346.81',
  ),
  'receptor' => 
  array (
    'rfc' => 'GCE171024CQ0',
    'nombre' => 'GREDA CERAMICOS S.A DE C.V ',
    'UsoCFDI' => 'G03',
  ),
  'conceptos' => 
  array (
    0 => 
    array (
      'cantidad' => '1',
      'unidad' => 'SERVICIO',
      'descripcion' => 'FLETE INTERNACIONAL ',
      'valorunitario' => '152649.94',
      'importe' => '152649.94',
      'ClaveProdServ' => '78121603',
      'ClaveUnidad' => 'E48',
      'Impuestos' => 
      array (
        'Traslados' => 
        array (
          0 => 
          array (
            'Base' => '152649.94',
            'Impuesto' => '002',
            'TipoFactor' => 'Tasa',
            'TasaOCuota' => '0.000000',
            'Importe' => '0.00',
          ),
        ),
      ),
    ),
    1 => 
    array (
      'cantidad' => '1',
      'unidad' => 'SERVICIO',
      'descripcion' => 'FLETE NACIONAL',
      'valorunitario' => '101766.62',
      'importe' => '101766.62',
      'ClaveProdServ' => '78121603',
      'ClaveUnidad' => 'E48',
      'Impuestos' => 
      array (
        'Traslados' => 
        array (
          0 => 
          array (
            'Base' => '101766.62',
            'Impuesto' => '002',
            'TipoFactor' => 'Tasa',
            'TasaOCuota' => '0.160000',
            'Importe' => '16282.65',
          ),
        ),
      ),
    ),
    2 => 
    array (
      'cantidad' => '1',
      'unidad' => 'SERVICIO',
      'descripcion' => 'GASTOS LOCALES',
      'valorunitario' => '4006.56',
      'importe' => '4006.56',
      'ClaveProdServ' => '78121603',
      'ClaveUnidad' => 'E48',
      'Impuestos' => 
      array (
        'Traslados' => 
        array (
          0 => 
          array (
            'Base' => '4006.56',
            'Impuesto' => '002',
            'TipoFactor' => 'Tasa',
            'TasaOCuota' => '0.160000',
            'Importe' => '641.04',
          ),
        ),
      ),
    ),
  ),
  'pdfconceptos' => 
  array (
    0 => 
    array (
      'cantidad' => '1',
      'unidad' => 'SERVICIO',
      'ID' => '2970',
      'descripcion' => 'FLETE INTERNACIONAL ',
      'valorunitario' => '152649.94',
      'importe' => '152649.94',
      'ClaveProdServ' => '78121603',
      'ClaveUnidad' => 'E48',
      'sumaIVA' => '0',
      'Impuestos' => 
      array (
        'Traslados' => 
        array (
          0 => 
          array (
            'Base' => '152649.94',
            'Impuesto' => '002',
            'TipoFactor' => 'Tasa',
            'TasaOCuota' => '0.000000',
            'Importe' => '0.00',
          ),
        ),
      ),
    ),
    1 => 
    array (
      'cantidad' => '1',
      'unidad' => 'SERVICIO',
      'ID' => '2971',
      'descripcion' => 'FLETE NACIONAL',
      'valorunitario' => '101766.62',
      'importe' => '101766.62',
      'ClaveProdServ' => '78121603',
      'ClaveUnidad' => 'E48',
      'sumaIVA' => '1',
      'Impuestos' => 
      array (
        'Traslados' => 
        array (
          0 => 
          array (
            'Base' => '101766.62',
            'Impuesto' => '002',
            'TipoFactor' => 'Tasa',
            'TasaOCuota' => '0.160000',
            'Importe' => '16282.65',
          ),
        ),
      ),
    ),
    2 => 
    array (
      'cantidad' => '1',
      'unidad' => 'SERVICIO',
      'ID' => '2972',
      'descripcion' => 'GASTOS LOCALES',
      'valorunitario' => '4006.56',
      'importe' => '4006.56',
      'ClaveProdServ' => '78121603',
      'ClaveUnidad' => 'E48',
      'sumaIVA' => '1',
      'Impuestos' => 
      array (
        'Traslados' => 
        array (
          0 => 
          array (
            'Base' => '4006.56',
            'Impuesto' => '002',
            'TipoFactor' => 'Tasa',
            'TasaOCuota' => '0.160000',
            'Importe' => '641.04',
          ),
        ),
      ),
    ),
  ),
  'impuestos' => 
  array (
    'translados' => 
    array (
      0 => 
      array (
        'impuesto' => '002',
        'tasa' => '0.160000',
        'importe' => 16923.69,
        'TipoFactor' => 'Tasa',
      ),
      1 => 
      array (
        'impuesto' => '002',
        'tasa' => '0.000000',
        'importe' => 0.0,
        'TipoFactor' => 'Tasa',
      ),
    ),
    'TotalImpuestosTrasladados' => 16923.69,
  ),
  'pdf' => 
  array (
    'rfc' => 'RLO180430B68',
    'RegistroPatronal' => '1234',
    'nombre_fiscal' => 'RAMF LOGISTICS SA DE CV',
    'domicilio_fiscal' => 'TAJIN 668, Col LETRAN VALLE, BENITO JUAREZ, CDMX, MÉXICO, 03650',
    'cp_fiscal' => '03650',
    'correo_fiscal' => 'facturacion@ramf-log.com',
    'domicilio' => 'TAJIN 668, Col LETRAN VALLE, BENITO JUAREZ, CDMX, MÉXICO, 03650',
    'PAC_USUARIO' => 'DEMO700101XXX',
    'PAC_PWD' => 'DEMO700101XXX',
    'CSD_CER' => 'XIA190128J61.cer.pem',
    'CSD_KEY' => 'XIA190128J61.key.pem',
    'CSD_PWD' => '12345678a',
    'dir_cfdi' => 'adjuntos/1547764193/',
  ),
)
ERROR - 13-10-2021 22:35:56 --> Severity: Notice  --> Undefined index: __MF_VERSION_CFDI__ /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/lib/nodos/cfdi/cfdi.php 11
ERROR - 13-10-2021 22:35:56 --> Severity: Notice  --> Undefined index: __MF_VERSION_CFDI__ /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/lib/utils/alias.php 14
ERROR - 13-10-2021 22:35:56 --> Severity: Notice  --> Undefined index: __MF_VERSION_CFDI__ /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/lib/nodos/cfdi/cfdi.php 79
ERROR - 13-10-2021 22:35:56 --> Severity: Notice  --> Undefined index: codigo_mf_numero /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/lib/nodos/cfdi/cfdi.php 158
ERROR - 13-10-2021 22:35:56 --> Severity: Notice  --> Undefined variable: __mf_rfc_pruebas__ /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/lib/nodos/cfdi/cfdi.php 355
ERROR - 13-10-2021 22:35:58 --> Severity: Notice  --> Undefined index: url /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/lib/nodos/cfdi/cfdi.php 448
ERROR - 13-10-2021 22:36:02 --> Severity: Notice  --> A non well formed numeric value encountered /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/sdk272.php 1062
ERROR - 13-10-2021 22:36:02 --> Severity: Notice  --> A non well formed numeric value encountered /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/sdk272.php 1062
ERROR - 13-10-2021 22:36:02 --> Severity: Notice  --> Undefined index: xml_solo_firmado /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/sdk272.php 861
ERROR - 13-10-2021 22:36:02 --> Severity: Notice  --> Undefined index: modo_panama /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/sdk272.php 1814
ERROR - 13-10-2021 22:36:02 --> Severity: Notice  --> Undefined index: xml_sin_firmar /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/sdk272.php 924
ERROR - 13-10-2021 22:36:02 --> Severity: Warning  --> file_put_contents(/opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/timbrados/sin_timbrar_ejemplo_factura.xml): failed to open stream: Permission denied /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/sdk272.php 930
ERROR - 13-10-2021 22:36:02 --> resp:array (
  'error' => 
  array (
    0 => '{"message":"CFDI33113 - El campo TipoCambio no tiene el valor 1 y la moneda indicada es MXN.","messageDetail":" ValorEsperado: 1 ValorReportado: 1.000","data":null,"status":"error"}',
    1 => 'a:15:{s:4:"cfdi";s:0:"";s:3:"png";s:0:"";s:5:"idpac";i:1;s:3:"pac";i:3;s:10:"produccion";s:2:"NO";s:16:"codigo_mf_numero";i:2;s:15:"codigo_mf_texto";s:80:"CFDI33113 - El campo TipoCambio no tiene el valor 1 y la moneda indicada es MXN.";s:25:"mensaje_original_pac_json";s:181:"{"message":"CFDI33113 - El campo TipoCambio no tiene el valor 1 y la moneda indicada es MXN.","messageDetail":" ValorEsperado: 1 ValorReportado: 1.000","data":null,"status":"error"}";s:9:"cancelada";s:2:"SI";s:5:"saldo";i:993614;s:4:"uuid";s:0:"";s:8:"servidor";s:1:"3";s:9:"ejecucion";d:296.184;s:5:"debug";s:12:""ID: 296549"";s:7:"abortar";b:1;}',
    2 => 'ARCHIVOS DEBUG : /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/tmp/ ultimo_error.xml  ultimo_error_datos.xml  ultimo_error_datos.ini  ultimo_error_respuesta.txt ',
  ),
  'success' => 
  array (
  ),
)
ERROR - 13-10-2021 22:36:18 --> datos:array (
  'dir_cfdi' => 'adjuntos/1547764193/cfdi/',
  'version_cfdi' => '3.3',
  'cfdi' => 'adjuntos/1547764193/cfdi/I_B_10_cfdi3_3.xml',
  'xml_debug' => '/opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/timbrados/sin_timbrar_ejemplo_factura.xml',
  'PAC' => 
  array (
    'usuario' => 'DEMO700101XXX',
    'pass' => 'DEMO700101XXX',
    'produccion' => 'NO',
  ),
  'conf' => 
  array (
    'cer' => '/opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/certificados/XIA190128J61.cer.pem',
    'key' => '/opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/certificados/XIA190128J61.key.pem',
    'pass' => '12345678a',
  ),
  'emisor' => 
  array (
    'rfc' => 'XIA190128J61',
    'nombre' => 'ACCEM SERVICIOS EMPRESARIALES SC',
  ),
  'id_factura' => '1634178525',
  'id_pedido' => '1547764193',
  'factPDF' => 
  array (
    'logo' => 'Logo.jpg',
    'logoWidth' => '120',
    'logoHeight' => '75',
    'RegimenFiscalDesc' => 
    array (
      'Descripcion' => 'General de Ley Personas Morales',
    ),
    'notas' => 'test',
    'tipocomprobanteDesc' => 'Ingreso
',
    'totalConLetras' => 'DOSCIENTOS SETENTA Y CINCO MIL TRESCIENTOS CUARENTA Y SEIS',
    'translados' => 
    array (
      0 => 
      array (
        'base' => 16923.69,
      ),
    ),
    'UsoCFDIDesc' => 
    array (
      'Descripcion' => 'Gastos en general',
    ),
    'emailReceptor' => 'compras@greda.com',
    'cpReceptor' => '54713',
  ),
  'factura' => 
  array (
    'LugarExpedicion' => '03650',
    'RegimenFiscal' => '601',
    'folio' => 10,
    'fecha_expedicion' => '2021-10-13T22:36:18',
    'descuento' => '0.0',
    'forma_pago' => '03',
    'forma_pagoDesc' => 
    array (
      'Descripcion' => 'Transferencia electrónica de fondos',
    ),
    'metodo_pago' => 'PUE',
    'metodo_pagoDesc' => 
    array (
      'Descripcion' => 'Pago en una sola exhibición',
    ),
    'moneda' => 'MXN',
    'serie' => 'B',
    'subtotal' => '258423.12',
    'tipocambio' => '1',
    'tipocomprobante' => 'I',
    'total' => '275346.81',
  ),
  'receptor' => 
  array (
    'rfc' => 'GCE171024CQ0',
    'nombre' => 'GREDA CERAMICOS S.A DE C.V ',
    'UsoCFDI' => 'G03',
  ),
  'conceptos' => 
  array (
    0 => 
    array (
      'cantidad' => '1',
      'unidad' => 'SERVICIO',
      'descripcion' => 'FLETE INTERNACIONAL ',
      'valorunitario' => '152649.94',
      'importe' => '152649.94',
      'ClaveProdServ' => '78121603',
      'ClaveUnidad' => 'E48',
      'Impuestos' => 
      array (
        'Traslados' => 
        array (
          0 => 
          array (
            'Base' => '152649.94',
            'Impuesto' => '002',
            'TipoFactor' => 'Tasa',
            'TasaOCuota' => '0.000000',
            'Importe' => '0.00',
          ),
        ),
      ),
    ),
    1 => 
    array (
      'cantidad' => '1',
      'unidad' => 'SERVICIO',
      'descripcion' => 'FLETE NACIONAL',
      'valorunitario' => '101766.62',
      'importe' => '101766.62',
      'ClaveProdServ' => '78121603',
      'ClaveUnidad' => 'E48',
      'Impuestos' => 
      array (
        'Traslados' => 
        array (
          0 => 
          array (
            'Base' => '101766.62',
            'Impuesto' => '002',
            'TipoFactor' => 'Tasa',
            'TasaOCuota' => '0.160000',
            'Importe' => '16282.65',
          ),
        ),
      ),
    ),
    2 => 
    array (
      'cantidad' => '1',
      'unidad' => 'SERVICIO',
      'descripcion' => 'GASTOS LOCALES',
      'valorunitario' => '4006.56',
      'importe' => '4006.56',
      'ClaveProdServ' => '78121603',
      'ClaveUnidad' => 'E48',
      'Impuestos' => 
      array (
        'Traslados' => 
        array (
          0 => 
          array (
            'Base' => '4006.56',
            'Impuesto' => '002',
            'TipoFactor' => 'Tasa',
            'TasaOCuota' => '0.160000',
            'Importe' => '641.04',
          ),
        ),
      ),
    ),
  ),
  'pdfconceptos' => 
  array (
    0 => 
    array (
      'cantidad' => '1',
      'unidad' => 'SERVICIO',
      'ID' => '2970',
      'descripcion' => 'FLETE INTERNACIONAL ',
      'valorunitario' => '152649.94',
      'importe' => '152649.94',
      'ClaveProdServ' => '78121603',
      'ClaveUnidad' => 'E48',
      'sumaIVA' => '0',
      'Impuestos' => 
      array (
        'Traslados' => 
        array (
          0 => 
          array (
            'Base' => '152649.94',
            'Impuesto' => '002',
            'TipoFactor' => 'Tasa',
            'TasaOCuota' => '0.000000',
            'Importe' => '0.00',
          ),
        ),
      ),
    ),
    1 => 
    array (
      'cantidad' => '1',
      'unidad' => 'SERVICIO',
      'ID' => '2971',
      'descripcion' => 'FLETE NACIONAL',
      'valorunitario' => '101766.62',
      'importe' => '101766.62',
      'ClaveProdServ' => '78121603',
      'ClaveUnidad' => 'E48',
      'sumaIVA' => '1',
      'Impuestos' => 
      array (
        'Traslados' => 
        array (
          0 => 
          array (
            'Base' => '101766.62',
            'Impuesto' => '002',
            'TipoFactor' => 'Tasa',
            'TasaOCuota' => '0.160000',
            'Importe' => '16282.65',
          ),
        ),
      ),
    ),
    2 => 
    array (
      'cantidad' => '1',
      'unidad' => 'SERVICIO',
      'ID' => '2972',
      'descripcion' => 'GASTOS LOCALES',
      'valorunitario' => '4006.56',
      'importe' => '4006.56',
      'ClaveProdServ' => '78121603',
      'ClaveUnidad' => 'E48',
      'sumaIVA' => '1',
      'Impuestos' => 
      array (
        'Traslados' => 
        array (
          0 => 
          array (
            'Base' => '4006.56',
            'Impuesto' => '002',
            'TipoFactor' => 'Tasa',
            'TasaOCuota' => '0.160000',
            'Importe' => '641.04',
          ),
        ),
      ),
    ),
  ),
  'impuestos' => 
  array (
    'translados' => 
    array (
      0 => 
      array (
        'impuesto' => '002',
        'tasa' => '0.160000',
        'importe' => 16923.69,
        'TipoFactor' => 'Tasa',
      ),
      1 => 
      array (
        'impuesto' => '002',
        'tasa' => '0.000000',
        'importe' => 0.0,
        'TipoFactor' => 'Tasa',
      ),
    ),
    'TotalImpuestosTrasladados' => 16923.69,
  ),
  'pdf' => 
  array (
    'rfc' => 'RLO180430B68',
    'RegistroPatronal' => '1234',
    'nombre_fiscal' => 'RAMF LOGISTICS SA DE CV',
    'domicilio_fiscal' => 'TAJIN 668, Col LETRAN VALLE, BENITO JUAREZ, CDMX, MÉXICO, 03650',
    'cp_fiscal' => '03650',
    'correo_fiscal' => 'facturacion@ramf-log.com',
    'domicilio' => 'TAJIN 668, Col LETRAN VALLE, BENITO JUAREZ, CDMX, MÉXICO, 03650',
    'PAC_USUARIO' => 'DEMO700101XXX',
    'PAC_PWD' => 'DEMO700101XXX',
    'CSD_CER' => 'XIA190128J61.cer.pem',
    'CSD_KEY' => 'XIA190128J61.key.pem',
    'CSD_PWD' => '12345678a',
    'dir_cfdi' => 'adjuntos/1547764193/',
  ),
)
ERROR - 13-10-2021 22:36:18 --> Severity: Notice  --> Undefined index: __MF_VERSION_CFDI__ /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/lib/nodos/cfdi/cfdi.php 11
ERROR - 13-10-2021 22:36:18 --> Severity: Notice  --> Undefined index: __MF_VERSION_CFDI__ /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/lib/utils/alias.php 14
ERROR - 13-10-2021 22:36:18 --> Severity: Notice  --> Undefined index: __MF_VERSION_CFDI__ /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/lib/nodos/cfdi/cfdi.php 79
ERROR - 13-10-2021 22:36:18 --> Severity: Notice  --> Undefined index: codigo_mf_numero /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/lib/nodos/cfdi/cfdi.php 158
ERROR - 13-10-2021 22:36:18 --> Severity: Notice  --> Undefined variable: __mf_rfc_pruebas__ /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/lib/nodos/cfdi/cfdi.php 355
ERROR - 13-10-2021 22:36:20 --> Severity: Notice  --> Undefined index: url /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/lib/nodos/cfdi/cfdi.php 448
ERROR - 13-10-2021 22:36:24 --> Severity: Notice  --> A non well formed numeric value encountered /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/sdk272.php 1062
ERROR - 13-10-2021 22:36:24 --> Severity: Notice  --> A non well formed numeric value encountered /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/sdk272.php 1062
ERROR - 13-10-2021 22:36:24 --> Severity: Notice  --> Undefined index: xml_solo_firmado /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/sdk272.php 861
ERROR - 13-10-2021 22:36:24 --> Severity: Notice  --> Undefined index: modo_panama /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/sdk272.php 1814
ERROR - 13-10-2021 22:36:24 --> Severity: Notice  --> Undefined index: xml_sin_firmar /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/sdk272.php 924
ERROR - 13-10-2021 22:36:24 --> Severity: Warning  --> file_put_contents(/opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/timbrados/sin_timbrar_ejemplo_factura.xml): failed to open stream: Permission denied /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/sdk272.php 930
ERROR - 13-10-2021 22:36:24 --> resp:array (
  'error' => 
  array (
  ),
  'success' => 
  array (
    'cfdi' => '<?xml version="1.0" encoding="UTF-8"?>
<cfdi:Comprobante xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:cfdi="http://www.sat.gob.mx/cfd/3" xsi:schemaLocation="http://www.sat.gob.mx/cfd/3 http://www.sat.gob.mx/sitio_internet/cfd/3/cfdv33.xsd " Version="3.3" LugarExpedicion="03650" Folio="10" Fecha="2021-10-13T22:36:18" FormaPago="03" MetodoPago="PUE" Moneda="MXN" Serie="B" SubTotal="258423.12" TipoCambio="1" TipoDeComprobante="I" Total="275346.81" Certificado="MIIFyDCCA7CgAwIBAgIUMzAwMDEwMDAwMDA0MDAwMDI0NDMwDQYJKoZIhvcNAQELBQAwggErMQ8wDQYDVQQDDAZBQyBVQVQxLjAsBgNVBAoMJVNFUlZJQ0lPIERFIEFETUlOSVNUUkFDSU9OIFRSSUJVVEFSSUExGjAYBgNVBAsMEVNBVC1JRVMgQXV0aG9yaXR5MSgwJgYJKoZIhvcNAQkBFhlvc2Nhci5tYXJ0aW5lekBzYXQuZ29iLm14MR0wGwYDVQQJDBQzcmEgY2VycmFkYSBkZSBjYWRpejEOMAwGA1UEEQwFMDYzNzAxCzAJBgNVBAYTAk1YMRkwFwYDVQQIDBBDSVVEQUQgREUgTUVYSUNPMREwDwYDVQQHDAhDT1lPQUNBTjERMA8GA1UELRMIMi41LjQuNDUxJTAjBgkqhkiG9w0BCQITFnJlc3BvbnNhYmxlOiBBQ0RNQS1TQVQwHhcNMTkwNjE3MjA0MDUxWhcNMjMwNjE3MjA0MDUxWjCB7zEqMCgGA1UEAxMhWEVOT04gSU5EVVNUUklBTCBBUlRJQ0xFUyBTIERFIENWMSowKAYDVQQpEyFYRU5PTiBJTkRVU1RSSUFMIEFSVElDTEVTIFMgREUgQ1YxKjAoBgNVBAoTIVhFTk9OIElORFVTVFJJQUwgQVJUSUNMRVMgUyBERSBDVjElMCMGA1UELRMcWElBMTkwMTI4SjYxIC8gS0FITzY0MTEwMUIzOTEeMBwGA1UEBRMVIC8gS0FITzY0MTEwMUhOVExLUzA2MSIwIAYDVQQLExlYZW5vbiBJbmR1c3RyaWFsIEFydGljbGVzMIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAiJQ5YcSgjwsGf29+3go7VGdtMZCcH9wUpn46ZMAlFwUojnCPTvwJ3+cSwjqJnw8ahr3DuRwekvGR4BJAb5b9Xi8kyoiWtwcGOSWxO38Bp9J1e/BO9HMbQBPAtLDuG47oqnH8zWLOeaoYRJDpARw4RX1ko2+9tbj0ntBtM7Vk1E8EWiA/h2Meq0LIv1+ySGTUrEW46FM01J5pzELv5XupBghuJxR5DG9fiOW7u3dR5s3tZoVLwA1KdjJtY0mmnfCwxg6i5AqhvY+FAI5D6CF6/lHA8PWg63WasvrhuIv70xCLjgPT/j00ZcPrLvBf1DefGVic980Ch/SDvC+MdJ1F5wIDAQABox0wGzAMBgNVHRMBAf8EAjAAMAsGA1UdDwQEAwIGwDANBgkqhkiG9w0BAQsFAAOCAgEACjfTPoKY2N5MxjmAMltd5XZCV1vgAwEtrIRYTodhE8R0Tp1QanAXb0luPyBv5hIXWK4VqAI4fcTtP+n7kkrwfha6ErkPWFNJWJm8ZsMmby/3WgVoJkOFyRYQqr5Il3N6wMa5kiDBtDRbqB3iEXmvtrvjWSHyxAER+zo3jWGFlhBZ0nQNRtjx8sPFihVc5TUH682HJiU4oWvT63Dnra8ncqiW/uCuY86crnUq0fW7Lw/3+PY5xXjNxR/Hh3sUPITfJrGaLWurD1J9npr9yGAJ6t9zrhhZnepIC0DUMc5+j4pg1DrO32jzwUOLQqErDizh84NoJCWwbg+US8wi3zD0ZKiDv7XsTNWAW2Ap2JkzykKHjFTZiEm3uZOkJNfcu3o+kefr5HfXFT+iN9K5FUEhaQwgUeZBRJ8V5F6gmhz3d6ixVbiZoFNhYR8e2k8gF9gGrVMrEbJGQrl+6+ZYQLFiauXeG7fu1svk19PuyredRJGnseJqyV4RzcRGhJA+cLnmpdDOTEhignnvnhEuY6HVRYYXhOTyeeluET7KRCxbJGqO7TdWgjrHL3HRbNE4NY5GAdOZuLaWxElG5ZVCHqtG0Nh7UQAhcz+EKyZBAewv5XuH0OomZXw6mM2mY2soL6z1224NusM8/BbJcYTQUlAEKblEChhGK1XlxiVOU2nc9KE=" NoCertificado="30001000000400002443" Sello="G8AUJ2d+s0maYq/TuqmuYSlAnc0VfIxBk46Afd8Q0YS/M8uA/2vPP1QhO5TNP4F60dhzC9ckLSGjzqYO0TfcA6dlkE0WOD0f9mRStp5IyLAfouiUuSXx+znFTR/Fp24e2Rh88H7nGe/FjEFXGmCPO0NBrQJgcti2u2YhlEl11N0Jvd7t423LA2AdqvX2M3Q5hZ9cW3BIDHN6oLHt4gYsWfdyTI/5ZBNBSa1UvdN6sbBIlC77/VsgCgbcoHXiZinq+sHI8HZoJsEnsJvqfJCm4B0e9uohNv12BZBUhLoHE3WMvVG3tjkjudE6GIH6qkpocmza5o2DBa+gliasNbs5rg==">
  <cfdi:Emisor Rfc="XIA190128J61" Nombre="ACCEM SERVICIOS EMPRESARIALES SC" RegimenFiscal="601"/>
  <cfdi:Receptor Rfc="GCE171024CQ0" Nombre="GREDA CERAMICOS S.A DE C.V" UsoCFDI="G03"/>
  <cfdi:Conceptos>
    <cfdi:Concepto Cantidad="1" Unidad="SERVICIO" Descripcion="FLETE INTERNACIONAL" ValorUnitario="152649.94" Importe="152649.94" ClaveProdServ="78121603" ClaveUnidad="E48">
      <cfdi:Impuestos>
        <cfdi:Traslados>
          <cfdi:Traslado Base="152649.94" Impuesto="002" TipoFactor="Tasa" TasaOCuota="0.000000" Importe="0.00"/>
        </cfdi:Traslados>
      </cfdi:Impuestos>
    </cfdi:Concepto>
    <cfdi:Concepto Cantidad="1" Unidad="SERVICIO" Descripcion="FLETE NACIONAL" ValorUnitario="101766.62" Importe="101766.62" ClaveProdServ="78121603" ClaveUnidad="E48">
      <cfdi:Impuestos>
        <cfdi:Traslados>
          <cfdi:Traslado Base="101766.62" Impuesto="002" TipoFactor="Tasa" TasaOCuota="0.160000" Importe="16282.65"/>
        </cfdi:Traslados>
      </cfdi:Impuestos>
    </cfdi:Concepto>
    <cfdi:Concepto Cantidad="1" Unidad="SERVICIO" Descripcion="GASTOS LOCALES" ValorUnitario="4006.56" Importe="4006.56" ClaveProdServ="78121603" ClaveUnidad="E48">
      <cfdi:Impuestos>
        <cfdi:Traslados>
          <cfdi:Traslado Base="4006.56" Impuesto="002" TipoFactor="Tasa" TasaOCuota="0.160000" Importe="641.04"/>
        </cfdi:Traslados>
      </cfdi:Impuestos>
    </cfdi:Concepto>
  </cfdi:Conceptos>
  <cfdi:Impuestos TotalImpuestosTrasladados="16923.69">
    <cfdi:Traslados>
      <cfdi:Traslado Impuesto="002" TasaOCuota="0.160000" Importe="16923.69" TipoFactor="Tasa"/>
      <cfdi:Traslado Impuesto="002" TasaOCuota="0.000000" Importe="0" TipoFactor="Tasa"/>
    </cfdi:Traslados>
  </cfdi:Impuestos>
  <cfdi:Complemento>
    <tfd:TimbreFiscalDigital xmlns:tfd="http://www.sat.gob.mx/TimbreFiscalDigital" xsi:schemaLocation="http://www.sat.gob.mx/TimbreFiscalDigital http://www.sat.gob.mx/sitio_internet/cfd/TimbreFiscalDigital/TimbreFiscalDigitalv11.xsd" Version="1.1" UUID="35aed8d4-5ad2-4487-a476-f99d72a5491d" FechaTimbrado="2021-10-13T22:36:23" RfcProvCertif="SPR190613I52" SelloCFD="G8AUJ2d+s0maYq/TuqmuYSlAnc0VfIxBk46Afd8Q0YS/M8uA/2vPP1QhO5TNP4F60dhzC9ckLSGjzqYO0TfcA6dlkE0WOD0f9mRStp5IyLAfouiUuSXx+znFTR/Fp24e2Rh88H7nGe/FjEFXGmCPO0NBrQJgcti2u2YhlEl11N0Jvd7t423LA2AdqvX2M3Q5hZ9cW3BIDHN6oLHt4gYsWfdyTI/5ZBNBSa1UvdN6sbBIlC77/VsgCgbcoHXiZinq+sHI8HZoJsEnsJvqfJCm4B0e9uohNv12BZBUhLoHE3WMvVG3tjkjudE6GIH6qkpocmza5o2DBa+gliasNbs5rg==" NoCertificadoSAT="30001000000400002495" SelloSAT="EgcRBJFO8PxxQClJrWDic67HifZhmjydU/Y+2o0kT/5PdUSvth9Rrk0nP7SZ2x5CcE+4iPr57385wzpfL1MsoPQNv98sdiFip8ep5r7uzyrvBjpXLXN1HRfLWOt3GPlJ7R/mStGx1diRo9q+4zQpjGEAsBkwp2COXrjnzJGMJQpjEbj3NQGyoU0WX5FnNxn+k4TX9hOy0t1K3yA9atyIi2pEdrPxf8UlG4X4Q69cj/l/e0Gopbz6ZkZpzz7R4pwa6MDRftybWCqvOZCJsZzYeQa8oUMJ5Uc7+61POXhbVz79/UJo8G3P2/ffURJUB2jBvVMlQSIJVAhAUKID0R1pMw=="/>
  </cfdi:Complemento>
</cfdi:Comprobante>
',
    'png' => 'iVBORw0KGgoAAAANSUhEUgAAAOQAAADkAQMAAACymRrOAAAABlBMVEX///8AAABVwtN+AAACVklEQVRYhe2YW3LEMAgEuQH3vyU3IEwj25v8jz+2okr8UHurKAQDUsT/+PLR3RWduW9Z1R3FpJfOVRNRlT0o5jp35r1UzzlmHWMqMa3eoGNVRqU+m9EZL9EcU8ag+ZsvtCBvUD0rCGYd5mUw93BTPP93/IpJD91PTtTjhcsTXirva9WFe4JvaCsG7FRRllpzLhuCCjwzxedjmMzAPDmlOu00ZVkoz1gOPfQGnpfOs5w/jld2r5pdzjBSLXXznqzEUbZ0U8yYf2aSVSj9ptxUAoovtBQTclK1vN1hozPd3FfMMCxvq5w0iTmqlBafKpJ2usJN2GMYdtUjaDYqnZaSlHJta/VkwB3uLoqoBHklU6SmqRgIM1U9JtgaDVP92DkznfRirJoq6agft4q66BbHPlWSTqyfSumjtB9qufr0IfVZNXy0FGPI5xFyXW+rfBTtrqSvXsdsgxBmuj5HyK7eL9E4M91eoIu2utZItShhpnT0SZVUkqtsEfBuSpj1Vkk5BKs2Gqw0UMxeqxr9rKcL8tHdScg4xfy2uLczjFTVuGi+UmRhxpVlNsq+WI+no2b9+w2KlMmk4l6n9bRTSuRpt5K+pJ6gs9Gkw1wFo8NWkt+/NFLllaRle/rcTdxllpE2nZ9CgGKp535qmY1uQvfu3ppDH4qGm7L8TWaj2tJQtudmqi5ke808XcHuXN2UbmBj/aioMuzOfB/tPWRBOzVNl1v9Cq2zS9UxYnAWcdUyL+WQJ3KPt/pj92SknKoh3drFkGT5cQrhokTdnqXtxu1s3dz0f3zx+AE6mQVbPW8EdgAAAABJRU5ErkJggg==',
    'idpac' => 1,
    'pac' => 3,
    'produccion' => 'NO',
    'codigo_mf_numero' => 0,
    'codigo_mf_texto' => '[MODO PRUEBAS] OK',
    'mensaje_original_pac_json' => '{"data":{"tfd":"<?xml version=\\"1.0\\" encoding=\\"utf-8\\"?><tfd:TimbreFiscalDigital xsi:schemaLocation=\\"http://www.sat.gob.mx/TimbreFiscalDigital http://www.sat.gob.mx/sitio_internet/cfd/TimbreFiscalDigital/TimbreFiscalDigitalv11.xsd\\" Version=\\"1.1\\" UUID=\\"35aed8d4-5ad2-4487-a476-f99d72a5491d\\" FechaTimbrado=\\"2021-10-13T22:36:23\\" RfcProvCertif=\\"SPR190613I52\\" SelloCFD=\\"G8AUJ2d+s0maYq/TuqmuYSlAnc0VfIxBk46Afd8Q0YS/M8uA/2vPP1QhO5TNP4F60dhzC9ckLSGjzqYO0TfcA6dlkE0WOD0f9mRStp5IyLAfouiUuSXx+znFTR/Fp24e2Rh88H7nGe/FjEFXGmCPO0NBrQJgcti2u2YhlEl11N0Jvd7t423LA2AdqvX2M3Q5hZ9cW3BIDHN6oLHt4gYsWfdyTI/5ZBNBSa1UvdN6sbBIlC77/VsgCgbcoHXiZinq+sHI8HZoJsEnsJvqfJCm4B0e9uohNv12BZBUhLoHE3WMvVG3tjkjudE6GIH6qkpocmza5o2DBa+gliasNbs5rg==\\" NoCertificadoSAT=\\"30001000000400002495\\" SelloSAT=\\"EgcRBJFO8PxxQClJrWDic67HifZhmjydU/Y+2o0kT/5PdUSvth9Rrk0nP7SZ2x5CcE+4iPr57385wzpfL1MsoPQNv98sdiFip8ep5r7uzyrvBjpXLXN1HRfLWOt3GPlJ7R/mStGx1diRo9q+4zQpjGEAsBkwp2COXrjnzJGMJQpjEbj3NQGyoU0WX5FnNxn+k4TX9hOy0t1K3yA9atyIi2pEdrPxf8UlG4X4Q69cj/l/e0Gopbz6ZkZpzz7R4pwa6MDRftybWCqvOZCJsZzYeQa8oUMJ5Uc7+61POXhbVz79/UJo8G3P2/ffURJUB2jBvVMlQSIJVAhAUKID0R1pMw==\\" xmlns:tfd=\\"http://www.sat.gob.mx/TimbreFiscalDigital\\" xmlns:xsi=\\"http://www.w3.org/2001/XMLSchema-instance\\" />"},"status":"success"}',
    'cancelada' => 'NO',
    'saldo' => 993614,
    'uuid' => '35aed8d4-5ad2-4487-a476-f99d72a5491d',
    'servidor' => '1',
    'ejecucion' => 355.365,
    'debug' => '',
    'abortar' => false,
    'archivo_xml' => 'adjuntos/1547764193/cfdi/I_B_10_cfdi3_3.xml',
    'archivo_png' => 'adjuntos/1547764193/cfdi/I_B_10_cfdi3_3.png',
    'representacion_impresa_cadena' => '||1.1|35aed8d4-5ad2-4487-a476-f99d72a5491d|2021-10-13T22:36:23|G8AUJ2d+s0maYq/TuqmuYSlAnc0VfIxBk46Afd8Q0YS/M8uA/2vPP1QhO5TNP4F60dhzC9ckLSGjzqYO0TfcA6dlkE0WOD0f9mRStp5IyLAfouiUuSXx+znFTR/Fp24e2Rh88H7nGe/FjEFXGmCPO0NBrQJgcti2u2YhlEl11N0Jvd7t423LA2AdqvX2M3Q5hZ9cW3BIDHN6oLHt4gYsWfdyTI/5ZBNBSa1UvdN6sbBIlC77/VsgCgbcoHXiZinq+sHI8HZoJsEnsJvqfJCm4B0e9uohNv12BZBUhLoHE3WMvVG3tjkjudE6GIH6qkpocmza5o2DBa+gliasNbs5rg==|30001000000400002495||',
    'representacion_impresa_certificado_no' => '30001000000400002443',
    'representacion_impresa_fecha_timbrado' => 
    SimpleXMLElement::__set_state(array(
       0 => '2021-10-13T22:36:23',
    )),
    'representacion_impresa_sello' => 
    SimpleXMLElement::__set_state(array(
       0 => 'G8AUJ2d+s0maYq/TuqmuYSlAnc0VfIxBk46Afd8Q0YS/M8uA/2vPP1QhO5TNP4F60dhzC9ckLSGjzqYO0TfcA6dlkE0WOD0f9mRStp5IyLAfouiUuSXx+znFTR/Fp24e2Rh88H7nGe/FjEFXGmCPO0NBrQJgcti2u2YhlEl11N0Jvd7t423LA2AdqvX2M3Q5hZ9cW3BIDHN6oLHt4gYsWfdyTI/5ZBNBSa1UvdN6sbBIlC77/VsgCgbcoHXiZinq+sHI8HZoJsEnsJvqfJCm4B0e9uohNv12BZBUhLoHE3WMvVG3tjkjudE6GIH6qkpocmza5o2DBa+gliasNbs5rg==',
    )),
    'representacion_impresa_selloSAT' => 
    SimpleXMLElement::__set_state(array(
       0 => 'EgcRBJFO8PxxQClJrWDic67HifZhmjydU/Y+2o0kT/5PdUSvth9Rrk0nP7SZ2x5CcE+4iPr57385wzpfL1MsoPQNv98sdiFip8ep5r7uzyrvBjpXLXN1HRfLWOt3GPlJ7R/mStGx1diRo9q+4zQpjGEAsBkwp2COXrjnzJGMJQpjEbj3NQGyoU0WX5FnNxn+k4TX9hOy0t1K3yA9atyIi2pEdrPxf8UlG4X4Q69cj/l/e0Gopbz6ZkZpzz7R4pwa6MDRftybWCqvOZCJsZzYeQa8oUMJ5Uc7+61POXhbVz79/UJo8G3P2/ffURJUB2jBvVMlQSIJVAhAUKID0R1pMw==',
    )),
    'representacion_impresa_certificadoSAT' => 
    SimpleXMLElement::__set_state(array(
       0 => '30001000000400002495',
    )),
  ),
)
ERROR - 13-10-2021 22:36:24 --> VER I
ERROR - 13-10-2021 22:36:24 --> VER II
ERROR - 13-10-2021 22:36:24 --> VER III
ERROR - 13-10-2021 22:36:24 --> VER IV
ERROR - 13-10-2021 20:39:51 --> monedaC: 
ERROR - 13-10-2021 20:39:51 --> tipoC: 
ERROR - 13-10-2021 20:39:51 --> monedaC: 
ERROR - 13-10-2021 20:39:51 --> tipoC: 
ERROR - 13-10-2021 20:39:51 --> monedaC: MXN
ERROR - 13-10-2021 20:39:51 --> tipoC: 1.000
ERROR - 13-10-2021 20:39:51 --> monedaC: MXN
ERROR - 13-10-2021 20:39:51 --> tipoC: 1.000
ERROR - 13-10-2021 20:39:51 --> monedaC: MXN
ERROR - 13-10-2021 20:39:51 --> tipoC: 1.000
ERROR - 13-10-2021 20:39:51 --> monedaC: 
ERROR - 13-10-2021 20:39:51 --> tipoC: 
ERROR - 13-10-2021 20:39:51 --> monedaC: 
ERROR - 13-10-2021 20:39:51 --> tipoC: 
ERROR - 13-10-2021 20:39:51 --> monedaC: 
ERROR - 13-10-2021 20:39:51 --> tipoC: 
ERROR - 13-10-2021 20:39:51 --> monedaC: 
ERROR - 13-10-2021 20:39:51 --> tipoC: 
ERROR - 13-10-2021 20:40:17 --> monedaC: 
ERROR - 13-10-2021 20:40:17 --> tipoC: 
ERROR - 13-10-2021 20:40:17 --> monedaC: 
ERROR - 13-10-2021 20:40:17 --> tipoC: 
ERROR - 13-10-2021 20:40:17 --> monedaC: MXN
ERROR - 13-10-2021 20:40:17 --> tipoC: 1.000
ERROR - 13-10-2021 20:40:17 --> monedaC: MXN
ERROR - 13-10-2021 20:40:17 --> tipoC: 1.000
ERROR - 13-10-2021 20:40:17 --> monedaC: MXN
ERROR - 13-10-2021 20:40:17 --> tipoC: 1.000
ERROR - 13-10-2021 20:40:17 --> monedaC: 
ERROR - 13-10-2021 20:40:17 --> tipoC: 
ERROR - 13-10-2021 20:40:17 --> monedaC: 
ERROR - 13-10-2021 20:40:17 --> tipoC: 
ERROR - 13-10-2021 20:40:17 --> monedaC: 
ERROR - 13-10-2021 20:40:17 --> tipoC: 
ERROR - 13-10-2021 20:40:17 --> monedaC: 
ERROR - 13-10-2021 20:40:17 --> tipoC: 
ERROR - 13-10-2021 22:40:54 --> VER I
ERROR - 13-10-2021 22:40:54 --> VER II
ERROR - 13-10-2021 22:40:54 --> VER III
ERROR - 13-10-2021 22:40:54 --> VER IV
