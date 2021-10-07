ERROR - 07-09-2021 13:19:30 --> VER:array (
  'dir_cfdi' => 'adjuntos/1592945548/cfdi/',
  'version_cfdi' => '3.3',
  'cfdi' => 'adjuntos/1592945548/cfdi/I_R_1631038770_cfdi3_3.xml',
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
    'rfc' => 'LAN7008173R5',
    'nombre' => 'ACCEM SERVICIOS EMPRESARIALES SC',
  ),
  'id_factura' => 1631038770,
  'id_pedido' => '1592945548',
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
    'totalConLetras' => 'UN',
    'translados' => 
    array (
      0 => 
      array (
        'base' => '0.16',
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
    'condicionesDePago' => 'CONTADO',
    'folio' => 1631038770,
    'fecha_expedicion' => '2021-09-07T13:19:30',
    'descuento' => '0.0',
    'forma_pago' => '02',
    'forma_pagoDesc' => 
    array (
      'Descripcion' => 'Cheque nominativo',
    ),
    'metodo_pago' => 'PUE',
    'metodo_pagoDesc' => 
    array (
      'Descripcion' => 'Pago en una sola exhibición',
    ),
    'moneda' => 'MXN',
    'serie' => 'R',
    'subtotal' => '1.00',
    'tipocambio' => '1',
    'tipocomprobante' => 'I',
    'total' => '1.16',
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
      'ID' => '2931',
      'descripcion' => 'flete',
      'valorunitario' => '1.00',
      'importe' => '1.00',
      'ClaveProdServ' => '71123002',
      'ClaveUnidad' => 'E48',
      'Impuestos' => 
      array (
        'Traslados' => 
        array (
          0 => 
          array (
            'Base' => '1.00',
            'Impuesto' => '002
',
            'TipoFactor' => 'Tasa',
            'TasaOCuota' => '0.160000 ',
            'Importe' => 0.16,
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
      'ID' => '2931',
      'descripcion' => 'flete',
      'valorunitario' => '1.00',
      'importe' => '1.00',
      'ClaveProdServ' => '71123002',
      'ClaveUnidad' => 'E48',
      'sumaIVA' => '1',
      'Impuestos' => 
      array (
        'Traslados' => 
        array (
          0 => 
          array (
            'Base' => '1.00',
            'Impuesto' => '002
',
            'TipoFactor' => 'Tasa',
            'TasaOCuota' => '0.160000 ',
            'Importe' => 0.16,
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
        'impuesto' => '002
',
        'tasa' => '0.160000 ',
        'importe' => '0.16',
        'TipoFactor' => 'Tasa',
      ),
    ),
    'TotalImpuestosTrasladados' => '0.16',
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
    'dir_cfdi' => 'adjuntos/1592945548/',
  ),
)
ERROR - 07-09-2021 13:19:30 --> Severity: Notice  --> Undefined index: __MF_VERSION_CFDI__ /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/lib/nodos/cfdi/cfdi.php 11
ERROR - 07-09-2021 13:19:30 --> Severity: Notice  --> Undefined index: codigo_mf_numero /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/lib/nodos/cfdi/cfdi.php 61
ERROR - 07-09-2021 13:19:30 --> Severity: Notice  --> Undefined variable: __mf_rfc_pruebas__ /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/lib/nodos/cfdi/cfdi.php 322
ERROR - 07-09-2021 13:19:31 --> Severity: Notice  --> Undefined index: url /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/lib/nodos/cfdi/cfdi.php 414
ERROR - 07-09-2021 13:19:33 --> Severity: Notice  --> A non well formed numeric value encountered /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/sdk272.php 1037
ERROR - 07-09-2021 13:19:33 --> Severity: Notice  --> A non well formed numeric value encountered /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/sdk272.php 1037
ERROR - 07-09-2021 13:21:43 --> VER:array (
  'dir_cfdi' => 'adjuntos/1592945548/cfdi/',
  'version_cfdi' => '3.3',
  'cfdi' => 'adjuntos/1592945548/cfdi/I_R_1631038903_cfdi3_3.xml',
  'xml_debug' => '/opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/timbrados/sin_timbrar_ejemplo_factura.xml',
  'PAC' => 
  array (
    'usuario' => 'DEMO700101XXX',
    'pass' => 'DEMO700101XXX',
    'produccion' => 'NO',
  ),
  'conf' => 
  array (
    'cer' => '/opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/certificados/lan7008173r5.cer',
    'key' => '/opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/certificados/lan7008173r5.key',
    'pass' => '',
  ),
  'emisor' => 
  array (
    'rfc' => 'LAN7008173R5',
    'nombre' => 'ACCEM SERVICIOS EMPRESARIALES SC',
  ),
  'id_factura' => 1631038903,
  'id_pedido' => '1592945548',
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
    'totalConLetras' => 'UN',
    'translados' => 
    array (
      0 => 
      array (
        'base' => '0.16',
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
    'condicionesDePago' => 'CONTADO',
    'folio' => 1631038903,
    'fecha_expedicion' => '2021-09-07T13:21:43',
    'descuento' => '0.0',
    'forma_pago' => '02',
    'forma_pagoDesc' => 
    array (
      'Descripcion' => 'Cheque nominativo',
    ),
    'metodo_pago' => 'PUE',
    'metodo_pagoDesc' => 
    array (
      'Descripcion' => 'Pago en una sola exhibición',
    ),
    'moneda' => 'MXN',
    'serie' => 'R',
    'subtotal' => '1.00',
    'tipocambio' => '1',
    'tipocomprobante' => 'I',
    'total' => '1.16',
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
      'ID' => '2931',
      'descripcion' => 'flete',
      'valorunitario' => '1.00',
      'importe' => '1.00',
      'ClaveProdServ' => '71123002',
      'ClaveUnidad' => 'E48',
      'Impuestos' => 
      array (
        'Traslados' => 
        array (
          0 => 
          array (
            'Base' => '1.00',
            'Impuesto' => '002
',
            'TipoFactor' => 'Tasa',
            'TasaOCuota' => '0.160000 ',
            'Importe' => 0.16,
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
      'ID' => '2931',
      'descripcion' => 'flete',
      'valorunitario' => '1.00',
      'importe' => '1.00',
      'ClaveProdServ' => '71123002',
      'ClaveUnidad' => 'E48',
      'sumaIVA' => '1',
      'Impuestos' => 
      array (
        'Traslados' => 
        array (
          0 => 
          array (
            'Base' => '1.00',
            'Impuesto' => '002
',
            'TipoFactor' => 'Tasa',
            'TasaOCuota' => '0.160000 ',
            'Importe' => 0.16,
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
        'impuesto' => '002
',
        'tasa' => '0.160000 ',
        'importe' => '0.16',
        'TipoFactor' => 'Tasa',
      ),
    ),
    'TotalImpuestosTrasladados' => '0.16',
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
    'CSD_CER' => 'lan7008173r5.cer',
    'CSD_KEY' => 'lan7008173r5.key',
    'CSD_PWD' => '',
    'dir_cfdi' => 'adjuntos/1592945548/',
  ),
)
ERROR - 07-09-2021 13:21:43 --> Severity: Notice  --> Undefined index: __MF_VERSION_CFDI__ /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/lib/nodos/cfdi/cfdi.php 11
ERROR - 07-09-2021 13:21:43 --> Severity: Notice  --> Undefined index: codigo_mf_numero /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/lib/nodos/cfdi/cfdi.php 61
ERROR - 07-09-2021 13:21:43 --> Severity: Notice  --> Undefined variable: __mf_rfc_pruebas__ /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/lib/nodos/cfdi/cfdi.php 322
ERROR - 07-09-2021 13:21:44 --> Severity: Notice  --> Undefined index: url /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/lib/nodos/cfdi/cfdi.php 414
ERROR - 07-09-2021 13:21:45 --> Severity: Notice  --> A non well formed numeric value encountered /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/sdk272.php 1037
ERROR - 07-09-2021 13:21:45 --> Severity: Notice  --> A non well formed numeric value encountered /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/sdk272.php 1037
ERROR - 07-09-2021 13:32:20 --> VER:array (
  'dir_cfdi' => 'adjuntos/1592945548/cfdi/',
  'version_cfdi' => '3.3',
  'cfdi' => 'adjuntos/1592945548/cfdi/I_R_1631039540_cfdi3_3.xml',
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
  'id_factura' => 1631039540,
  'id_pedido' => '1592945548',
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
    'totalConLetras' => 'UN',
    'translados' => 
    array (
      0 => 
      array (
        'base' => '0.16',
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
    'condicionesDePago' => 'CONTADO',
    'folio' => 1631039540,
    'fecha_expedicion' => '2021-09-07T13:32:20',
    'descuento' => '0.0',
    'forma_pago' => '02',
    'forma_pagoDesc' => 
    array (
      'Descripcion' => 'Cheque nominativo',
    ),
    'metodo_pago' => 'PUE',
    'metodo_pagoDesc' => 
    array (
      'Descripcion' => 'Pago en una sola exhibición',
    ),
    'moneda' => 'MXN',
    'serie' => 'R',
    'subtotal' => '1.00',
    'tipocambio' => '1',
    'tipocomprobante' => 'I',
    'total' => '1.16',
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
      'ID' => '2931',
      'descripcion' => 'flete',
      'valorunitario' => '1.00',
      'importe' => '1.00',
      'ClaveProdServ' => '71123002',
      'ClaveUnidad' => 'E48',
      'Impuestos' => 
      array (
        'Traslados' => 
        array (
          0 => 
          array (
            'Base' => '1.00',
            'Impuesto' => '002
',
            'TipoFactor' => 'Tasa',
            'TasaOCuota' => '0.160000 ',
            'Importe' => 0.16,
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
      'ID' => '2931',
      'descripcion' => 'flete',
      'valorunitario' => '1.00',
      'importe' => '1.00',
      'ClaveProdServ' => '71123002',
      'ClaveUnidad' => 'E48',
      'sumaIVA' => '1',
      'Impuestos' => 
      array (
        'Traslados' => 
        array (
          0 => 
          array (
            'Base' => '1.00',
            'Impuesto' => '002
',
            'TipoFactor' => 'Tasa',
            'TasaOCuota' => '0.160000 ',
            'Importe' => 0.16,
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
        'impuesto' => '002
',
        'tasa' => '0.160000 ',
        'importe' => '0.16',
        'TipoFactor' => 'Tasa',
      ),
    ),
    'TotalImpuestosTrasladados' => '0.16',
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
    'dir_cfdi' => 'adjuntos/1592945548/',
  ),
)
ERROR - 07-09-2021 13:32:20 --> Severity: Notice  --> Undefined index: __MF_VERSION_CFDI__ /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/lib/nodos/cfdi/cfdi.php 11
ERROR - 07-09-2021 13:32:20 --> Severity: Notice  --> Undefined index: codigo_mf_numero /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/lib/nodos/cfdi/cfdi.php 61
ERROR - 07-09-2021 13:32:20 --> Severity: Notice  --> Undefined variable: __mf_rfc_pruebas__ /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/lib/nodos/cfdi/cfdi.php 322
ERROR - 07-09-2021 13:32:21 --> Severity: Notice  --> Undefined index: url /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/lib/nodos/cfdi/cfdi.php 414
ERROR - 07-09-2021 13:32:22 --> Severity: Warning  --> unlink(/opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/tmp/f4b6aaff874e90e2a9a489c798bee4f4.xml): No such file or directory /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/lib/nodos/cfdi/cfdi.php 537
ERROR - 07-09-2021 13:32:22 --> Severity: Notice  --> A non well formed numeric value encountered /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/sdk272.php 1037
ERROR - 07-09-2021 13:32:22 --> Severity: Notice  --> A non well formed numeric value encountered /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/sdk272.php 1037
ERROR - 07-09-2021 12:05:44 --> 404 Page Not Found --> adjuntos
ERROR - 07-09-2021 12:05:51 --> 404 Page Not Found --> adjuntos
ERROR - 07-09-2021 12:06:03 --> 404 Page Not Found --> adjuntos
ERROR - 07-09-2021 12:08:08 --> Query error: Expression #1 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'ramf_bd.f.fecha_timbrado' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by
ERROR - 07-09-2021 20:10:14 --> Severity: Notice  --> Undefined index: __MF_VERSION_CFDI__ /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/lib/nodos/cfdi/cfdi.php 11
ERROR - 07-09-2021 20:10:14 --> Severity: Notice  --> Undefined index: codigo_mf_numero /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/lib/nodos/cfdi/cfdi.php 61
ERROR - 07-09-2021 20:10:14 --> Severity: Notice  --> Undefined variable: __mf_rfc_pruebas__ /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/lib/nodos/cfdi/cfdi.php 322
ERROR - 07-09-2021 20:10:15 --> Severity: Notice  --> Undefined index: url /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/lib/nodos/cfdi/cfdi.php 414
ERROR - 07-09-2021 20:10:19 --> Severity: Notice  --> A non well formed numeric value encountered /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/sdk272.php 1037
ERROR - 07-09-2021 20:10:19 --> Severity: Notice  --> A non well formed numeric value encountered /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/sdk272.php 1037
