ERROR - 06-10-2021 23:07:26 --> VER:array (
  'dir_cfdi' => 'adjuntos/1520967401/cfdi/',
  'version_cfdi' => '3.3',
  'cfdi' => 'adjuntos/1520967401/cfdi/E_B_6_cfdi3_3.xml',
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
    'rfc' => 'SLO150219HS8',
    'nombre' => 'SENNI LOGISTICS, S.A. DE C.V.',
  ),
  'id_factura' => '1633410324',
  'id_pedido' => '1520967401',
  'factPDF' => 
  array (
    'logo' => 'LogoSenni.jpg',
    'logoWidth' => '200',
    'logoHeight' => '80',
    'RegimenFiscalDesc' => 
    array (
      'Descripcion' => 'General de Ley Personas Morales',
    ),
    'notas' => '',
    'totalConLetras' => 'CINCUENTA ',
    'tipocomprobanteDesc' => 'Egreso',
    'tipoRelacionDesc' => 'Devolución de mercancía sobre facturas o traslados previos
',
    'notasCfdiRel' => 'test',
    'translados' => 
    array (
      0 => 
      array (
        'base' => 0,
      ),
    ),
    'UsoCFDIDesc' => 
    array (
      'Descripcion' => 'Gastos en general',
    ),
    'emailReceptor' => 'jbalcazar@cablenetwork.net',
    'cpReceptor' => '09030',
  ),
  'factura' => 
  array (
    'LugarExpedicion' => '03400',
    'RegimenFiscal' => '601',
    'folio' => '6',
    'fecha_expedicion' => '2021-10-06T23:07:26',
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
    'moneda' => 'USD',
    'serie' => 'B',
    'subtotal' => '50.00',
    'tipocambio' => '19.00000',
    'total' => '50.00',
    'tipocomprobante' => 'E',
  ),
  'CfdisRelacionados' => 
  array (
    'TipoRelacion' => '03',
    'UUID' => 
    array (
      0 => '7eb3b9a1-bf6f-4ece-b0fc-6c0335daaf8c',
    ),
  ),
  'receptor' => 
  array (
    'rfc' => 'CMC971021NL9',
    'nombre' => 'CNA de R.L. de C.V.',
    'UsoCFDI' => 'G03',
  ),
  'conceptos' => 
  array (
    0 => 
    array (
      'cantidad' => '1',
      'unidad' => 'SERVICIO',
      'ID' => '9918',
      'descripcion' => 'cfdi',
      'valorunitario' => '50.00',
      'importe' => '50.00',
      'ClaveProdServ' => '78121603',
      'ClaveUnidad' => 'E48',
      'Impuestos' => 
      array (
        'Traslados' => 
        array (
          0 => 
          array (
            'Base' => '50.00',
            'Impuesto' => '002',
            'TipoFactor' => 'Tasa',
            'TasaOCuota' => '0.000000',
            'Importe' => '0.00',
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
      'ID' => '9918',
      'descripcion' => 'cfdi',
      'valorunitario' => '50.00',
      'importe' => '50.00',
      'ClaveProdServ' => '78121603',
      'ClaveUnidad' => 'E48',
      'sumaIVA' => '0',
      'Impuestos' => 
      array (
        'Traslados' => 
        array (
          0 => 
          array (
            'Base' => '50.00',
            'Impuesto' => '002',
            'TipoFactor' => 'Tasa',
            'TasaOCuota' => '0.000000',
            'Importe' => '0.00',
          ),
        ),
      ),
    ),
  ),
  'impuestos' => 
  array (
    'translados' => 
    array (
      1 => 
      array (
        'impuesto' => '002',
        'tasa' => '0.000000',
        'importe' => 0.0,
        'TipoFactor' => 'Tasa',
      ),
    ),
    'TotalImpuestosTrasladados' => 0,
  ),
  'pdf' => 
  array (
    'rfc' => 'SLO150219HS8',
    'RegistroPatronal' => '1234',
    'nombre_fiscal' => 'SENNI LOGISTICS, S.A. DE C.V.',
    'domicilio_fiscal' => 'Andalucía #54 103 Col. Álamos, CP 03400 Benito Juárez México D.F. ',
    'cp_fiscal' => '03400',
    'correo_fiscal' => 'facturacion@senni.com.mx',
    'domicilio' => 'Andalucía #54 103 Col. Álamos, CP 03400 Benito Juárez México D.F.',
    'PAC_USUARIO' => 'DEMO700101XXX',
    'PAC_PWD' => 'DEMO700101XXX',
    'CSD_CER' => 'XIA190128J61.cer.pem',
    'CSD_KEY' => 'XIA190128J61.key.pem',
    'CSD_PWD' => '12345678a',
    'dir_cfdi' => 'adjuntos/1520967401/',
  ),
)
ERROR - 06-10-2021 23:07:26 --> Severity: Notice  --> Undefined index: __MF_VERSION_CFDI__ /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/lib/nodos/cfdi/cfdi.php 11
ERROR - 06-10-2021 23:07:26 --> Severity: Notice  --> Undefined index: __MF_VERSION_CFDI__ /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/lib/utils/alias.php 14
ERROR - 06-10-2021 23:07:26 --> Severity: Notice  --> Undefined index: __MF_VERSION_CFDI__ /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/lib/nodos/cfdi/cfdi.php 79
ERROR - 06-10-2021 23:07:26 --> Severity: Notice  --> Undefined index: codigo_mf_numero /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/lib/nodos/cfdi/cfdi.php 158
ERROR - 06-10-2021 23:07:26 --> Severity: Notice  --> Undefined variable: __mf_rfc_pruebas__ /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/lib/nodos/cfdi/cfdi.php 355
ERROR - 06-10-2021 23:07:29 --> Severity: Notice  --> Undefined index: url /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/lib/nodos/cfdi/cfdi.php 448
ERROR - 06-10-2021 23:07:30 --> Severity: Notice  --> A non well formed numeric value encountered /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/sdk272.php 1062
ERROR - 06-10-2021 23:07:30 --> Severity: Notice  --> A non well formed numeric value encountered /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/sdk272.php 1062
ERROR - 06-10-2021 23:07:30 --> Severity: Notice  --> Undefined index: xml_solo_firmado /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/sdk272.php 861
ERROR - 06-10-2021 23:07:30 --> Severity: Notice  --> Undefined index: modo_panama /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/sdk272.php 1814
ERROR - 06-10-2021 23:07:30 --> Severity: Notice  --> Undefined index: xml_sin_firmar /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/sdk272.php 924
ERROR - 06-10-2021 23:33:10 --> VER:array (
  'dir_cfdi' => 'adjuntos/1520967401/cfdi/',
  'version_cfdi' => '3.3',
  'cfdi' => 'adjuntos/1520967401/cfdi/I_B_6_cfdi3_3.xml',
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
    'rfc' => 'SLO150219HS8',
    'nombre' => 'SENNI LOGISTICS, S.A. DE C.V.',
  ),
  'id_factura' => '1633410324',
  'id_pedido' => '1520967401',
  'factPDF' => 
  array (
    'logo' => 'LogoSenni.jpg',
    'logoWidth' => '200',
    'logoHeight' => '80',
    'RegimenFiscalDesc' => 
    array (
      'Descripcion' => 'General de Ley Personas Morales',
    ),
    'notas' => '',
    'totalConLetras' => 'CINCUENTA ',
    'tipocomprobanteDesc' => 'Ingreso
',
    'tipoRelacionDesc' => 'Sustitución de los CFDI previos
',
    'notasCfdiRel' => 'test',
    'translados' => 
    array (
      0 => 
      array (
        'base' => 0,
      ),
    ),
    'UsoCFDIDesc' => 
    array (
      'Descripcion' => 'Gastos en general',
    ),
    'emailReceptor' => 'jbalcazar@cablenetwork.net',
    'cpReceptor' => '09030',
  ),
  'factura' => 
  array (
    'LugarExpedicion' => '03400',
    'RegimenFiscal' => '601',
    'folio' => '6',
    'fecha_expedicion' => '2021-10-06T23:33:10',
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
    'moneda' => 'USD',
    'serie' => 'B',
    'subtotal' => '50.00',
    'tipocambio' => '19.00000',
    'total' => '50.00',
    'tipocomprobante' => 'I',
  ),
  'CfdisRelacionados' => 
  array (
    'TipoRelacion' => '04',
    'UUID' => 
    array (
      0 => 'fb8b21e9-ae03-4613-aebd-6e98e584778d',
    ),
  ),
  'receptor' => 
  array (
    'rfc' => 'CMC971021NL9',
    'nombre' => 'CNA de R.L. de C.V.',
    'UsoCFDI' => 'G03',
  ),
  'conceptos' => 
  array (
    0 => 
    array (
      'cantidad' => '1',
      'unidad' => 'SERVICIO',
      'ID' => '9918',
      'descripcion' => 'cfdi',
      'valorunitario' => '50.00',
      'importe' => '50.00',
      'ClaveProdServ' => '78121603',
      'ClaveUnidad' => 'E48',
      'Impuestos' => 
      array (
        'Traslados' => 
        array (
          0 => 
          array (
            'Base' => '50.00',
            'Impuesto' => '002',
            'TipoFactor' => 'Tasa',
            'TasaOCuota' => '0.000000',
            'Importe' => '0.00',
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
      'ID' => '9918',
      'descripcion' => 'cfdi',
      'valorunitario' => '50.00',
      'importe' => '50.00',
      'ClaveProdServ' => '78121603',
      'ClaveUnidad' => 'E48',
      'sumaIVA' => '0',
      'Impuestos' => 
      array (
        'Traslados' => 
        array (
          0 => 
          array (
            'Base' => '50.00',
            'Impuesto' => '002',
            'TipoFactor' => 'Tasa',
            'TasaOCuota' => '0.000000',
            'Importe' => '0.00',
          ),
        ),
      ),
    ),
  ),
  'impuestos' => 
  array (
    'translados' => 
    array (
      1 => 
      array (
        'impuesto' => '002',
        'tasa' => '0.000000',
        'importe' => 0.0,
        'TipoFactor' => 'Tasa',
      ),
    ),
    'TotalImpuestosTrasladados' => 0,
  ),
  'pdf' => 
  array (
    'rfc' => 'SLO150219HS8',
    'RegistroPatronal' => '1234',
    'nombre_fiscal' => 'SENNI LOGISTICS, S.A. DE C.V.',
    'domicilio_fiscal' => 'Andalucía #54 103 Col. Álamos, CP 03400 Benito Juárez México D.F. ',
    'cp_fiscal' => '03400',
    'correo_fiscal' => 'facturacion@senni.com.mx',
    'domicilio' => 'Andalucía #54 103 Col. Álamos, CP 03400 Benito Juárez México D.F.',
    'PAC_USUARIO' => 'DEMO700101XXX',
    'PAC_PWD' => 'DEMO700101XXX',
    'CSD_CER' => 'XIA190128J61.cer.pem',
    'CSD_KEY' => 'XIA190128J61.key.pem',
    'CSD_PWD' => '12345678a',
    'dir_cfdi' => 'adjuntos/1520967401/',
  ),
)
ERROR - 06-10-2021 23:33:10 --> Severity: Notice  --> Undefined index: __MF_VERSION_CFDI__ /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/lib/nodos/cfdi/cfdi.php 11
ERROR - 06-10-2021 23:33:10 --> Severity: Notice  --> Undefined index: __MF_VERSION_CFDI__ /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/lib/utils/alias.php 14
ERROR - 06-10-2021 23:33:10 --> Severity: Notice  --> Undefined index: __MF_VERSION_CFDI__ /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/lib/nodos/cfdi/cfdi.php 79
ERROR - 06-10-2021 23:33:10 --> Severity: Notice  --> Undefined index: codigo_mf_numero /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/lib/nodos/cfdi/cfdi.php 158
ERROR - 06-10-2021 23:33:10 --> Severity: Notice  --> Undefined variable: __mf_rfc_pruebas__ /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/lib/nodos/cfdi/cfdi.php 355
ERROR - 06-10-2021 23:33:16 --> Severity: Notice  --> Undefined index: url /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/lib/nodos/cfdi/cfdi.php 448
ERROR - 06-10-2021 23:33:17 --> Severity: Notice  --> A non well formed numeric value encountered /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/sdk272.php 1062
ERROR - 06-10-2021 23:33:17 --> Severity: Notice  --> A non well formed numeric value encountered /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/sdk272.php 1062
ERROR - 06-10-2021 23:33:17 --> Severity: Notice  --> Undefined index: xml_solo_firmado /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/sdk272.php 861
ERROR - 06-10-2021 23:33:17 --> Severity: Notice  --> Undefined index: modo_panama /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/sdk272.php 1814
ERROR - 06-10-2021 23:33:17 --> Severity: Notice  --> Undefined index: xml_sin_firmar /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/sdk272.php 924
ERROR - 06-10-2021 23:43:31 --> VER:array (
  'dir_cfdi' => 'adjuntos/1520967401/cfdi/',
  'version_cfdi' => '3.3',
  'cfdi' => 'adjuntos/1520967401/cfdi/I_B_6_cfdi3_3.xml',
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
    'rfc' => 'SLO150219HS8',
    'nombre' => 'SENNI LOGISTICS, S.A. DE C.V.',
  ),
  'id_factura' => 1633581811,
  'id_pedido' => '1520967401',
  'factPDF' => 
  array (
    'logo' => 'LogoSenni.jpg',
    'logoWidth' => '200',
    'logoHeight' => '80',
    'RegimenFiscalDesc' => 
    array (
      'Descripcion' => 'General de Ley Personas Morales',
    ),
    'notas' => '',
    'totalConLetras' => 'UN',
    'tipocomprobanteDesc' => 'Ingreso
',
    'tipoRelacionDesc' => 'Sustitución de los CFDI previos
',
    'notasCfdiRel' => 'test',
    'translados' => 
    array (
      0 => 
      array (
        'base' => 0,
      ),
    ),
    'UsoCFDIDesc' => 
    array (
      'Descripcion' => 'Gastos en general',
    ),
    'emailReceptor' => 'jbalcazar@cablenetwork.net',
    'cpReceptor' => '09030',
  ),
  'factura' => 
  array (
    'LugarExpedicion' => '03400',
    'RegimenFiscal' => '601',
    'folio' => '6',
    'fecha_expedicion' => '2021-10-06T23:43:31',
    'descuento' => '0.0',
    'forma_pago' => '03',
    'forma_pagoDesc' => 
    array (
      'Descripcion' => 'Transferencia electrónica de fondos',
    ),
    'metodo_pago' => 'PPD',
    'metodo_pagoDesc' => 
    array (
      'Descripcion' => 'Pago en parcialidades o diferido',
    ),
    'moneda' => 'USD',
    'serie' => 'B',
    'subtotal' => '1.00',
    'tipocambio' => '19',
    'total' => '1.00',
    'tipocomprobante' => 'I',
  ),
  'CfdisRelacionados' => 
  array (
    'TipoRelacion' => '04',
    'UUID' => 
    array (
      0 => 'fb8b21e9-ae03-4613-aebd-6e98e584778d',
    ),
  ),
  'receptor' => 
  array (
    'rfc' => 'CMC971021NL9',
    'nombre' => 'CNA de R.L. de C.V.',
    'UsoCFDI' => 'G03',
  ),
  'conceptos' => 
  array (
    0 => 
    array (
      'cantidad' => '1',
      'unidad' => 'SERVICIO',
      'ID' => '9970',
      'descripcion' => 'cfdi rel',
      'valorunitario' => '1.00',
      'importe' => '1.00',
      'ClaveProdServ' => '78121603',
      'ClaveUnidad' => 'E48',
      'Impuestos' => 
      array (
        'Traslados' => 
        array (
          0 => 
          array (
            'Base' => '1.00',
            'Impuesto' => '002',
            'TipoFactor' => 'Tasa',
            'TasaOCuota' => '0.000000',
            'Importe' => '0.00',
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
      'ID' => '9970',
      'descripcion' => 'cfdi rel',
      'valorunitario' => '1.00',
      'importe' => '1.00',
      'ClaveProdServ' => '78121603',
      'ClaveUnidad' => 'E48',
      'sumaIVA' => '0',
      'Impuestos' => 
      array (
        'Traslados' => 
        array (
          0 => 
          array (
            'Base' => '1.00',
            'Impuesto' => '002',
            'TipoFactor' => 'Tasa',
            'TasaOCuota' => '0.000000',
            'Importe' => '0.00',
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
        'tasa' => '0.000000',
        'importe' => 0.0,
        'TipoFactor' => 'Tasa',
      ),
    ),
    'TotalImpuestosTrasladados' => 0,
  ),
  'pdf' => 
  array (
    'rfc' => 'SLO150219HS8',
    'RegistroPatronal' => '1234',
    'nombre_fiscal' => 'SENNI LOGISTICS, S.A. DE C.V.',
    'domicilio_fiscal' => 'Andalucía #54 103 Col. Álamos, CP 03400 Benito Juárez México D.F. ',
    'cp_fiscal' => '03400',
    'correo_fiscal' => 'facturacion@senni.com.mx',
    'domicilio' => 'Andalucía #54 103 Col. Álamos, CP 03400 Benito Juárez México D.F.',
    'PAC_USUARIO' => 'DEMO700101XXX',
    'PAC_PWD' => 'DEMO700101XXX',
    'CSD_CER' => 'XIA190128J61.cer.pem',
    'CSD_KEY' => 'XIA190128J61.key.pem',
    'CSD_PWD' => '12345678a',
    'dir_cfdi' => 'adjuntos/1520967401/',
  ),
)
ERROR - 06-10-2021 23:43:31 --> Severity: Notice  --> Undefined index: __MF_VERSION_CFDI__ /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/lib/nodos/cfdi/cfdi.php 11
ERROR - 06-10-2021 23:43:31 --> Severity: Notice  --> Undefined index: __MF_VERSION_CFDI__ /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/lib/utils/alias.php 14
ERROR - 06-10-2021 23:43:31 --> Severity: Notice  --> Undefined index: __MF_VERSION_CFDI__ /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/lib/nodos/cfdi/cfdi.php 79
ERROR - 06-10-2021 23:43:31 --> Severity: Notice  --> Undefined index: codigo_mf_numero /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/lib/nodos/cfdi/cfdi.php 158
ERROR - 06-10-2021 23:43:31 --> Severity: Notice  --> Undefined variable: __mf_rfc_pruebas__ /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/lib/nodos/cfdi/cfdi.php 355
ERROR - 06-10-2021 23:43:33 --> Severity: Notice  --> Undefined index: url /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/lib/nodos/cfdi/cfdi.php 448
ERROR - 06-10-2021 23:43:35 --> Severity: Notice  --> A non well formed numeric value encountered /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/sdk272.php 1062
ERROR - 06-10-2021 23:43:35 --> Severity: Notice  --> A non well formed numeric value encountered /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/sdk272.php 1062
ERROR - 06-10-2021 23:43:35 --> Severity: Notice  --> Undefined index: xml_solo_firmado /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/sdk272.php 861
ERROR - 06-10-2021 23:43:35 --> Severity: Notice  --> Undefined index: modo_panama /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/sdk272.php 1814
ERROR - 06-10-2021 23:43:35 --> Severity: Notice  --> Undefined index: xml_sin_firmar /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/sdk272.php 924
ERROR - 06-10-2021 23:49:38 --> conceptos:array (
  0 => 
  array (
    'cantidad' => '1',
    'unidad' => 'SERVICIO',
    'ID' => '2943',
    'descripcion' => 'FLETE INTERNACIONAL ',
    'valorunitario' => '138512.22',
    'importe' => '138512.22',
    'ClaveProdServ' => '78121603',
    'ClaveUnidad' => 'E48',
    'Impuestos' => 
    array (
      'Traslados' => 
      array (
        0 => 
        array (
          'Base' => '138512.22',
          'Impuesto' => '002',
          'TipoFactor' => 'Tasa',
          'TasaOCuota' => '0.000000',
          'Importe' => '0.00',
        ),
      ),
    ),
  ),
)
ERROR - 06-10-2021 23:49:38 --> impuestos:array (
  'translados' => 
  array (
    0 => 
    array (
      'impuesto' => '002',
      'tasa' => '0.000000',
      'importe' => 0.0,
      'TipoFactor' => 'Tasa',
    ),
  ),
  'TotalImpuestosTrasladados' => 0,
)
ERROR - 06-10-2021 23:49:38 --> VER:array (
  'dir_cfdi' => 'adjuntos/1592945300/cfdi/',
  'version_cfdi' => '3.3',
  'cfdi' => 'adjuntos/1592945300/cfdi/I_B_2_cfdi3_3.xml',
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
    'rfc' => 'RLO180430B68',
    'nombre' => 'RAMF LOGISTICS SA DE CV',
  ),
  'id_factura' => 1633582178,
  'id_pedido' => '1592945300',
  'factPDF' => 
  array (
    'logo' => 'Logo.jpg',
    'logoWidth' => '120',
    'logoHeight' => '75',
    'RegimenFiscalDesc' => 
    array (
      'Descripcion' => 'General de Ley Personas Morales',
    ),
    'notas' => '',
    'tipocomprobanteDesc' => 'Ingreso
',
    'totalConLetras' => 'CIENTO TREINTA Y OCHO MIL QUINIENTOS DOCE ',
    'translados' => 
    array (
      0 => 
      array (
        'base' => 0,
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
    'folio' => 2,
    'fecha_expedicion' => '2021-10-06T23:49:38',
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
    'moneda' => 'USD',
    'serie' => 'B',
    'subtotal' => '138512.22',
    'tipocambio' => '18',
    'tipocomprobante' => 'I',
    'total' => '138512.22',
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
      'ID' => '2943',
      'descripcion' => 'FLETE INTERNACIONAL ',
      'valorunitario' => '138512.22',
      'importe' => '138512.22',
      'ClaveProdServ' => '78121603',
      'ClaveUnidad' => 'E48',
      'Impuestos' => 
      array (
        'Traslados' => 
        array (
          0 => 
          array (
            'Base' => '138512.22',
            'Impuesto' => '002',
            'TipoFactor' => 'Tasa',
            'TasaOCuota' => '0.000000',
            'Importe' => '0.00',
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
      'ID' => '2943',
      'descripcion' => 'FLETE INTERNACIONAL ',
      'valorunitario' => '138512.22',
      'importe' => '138512.22',
      'ClaveProdServ' => '78121603',
      'ClaveUnidad' => 'E48',
      'sumaIVA' => '0',
      'Impuestos' => 
      array (
        'Traslados' => 
        array (
          0 => 
          array (
            'Base' => '138512.22',
            'Impuesto' => '002',
            'TipoFactor' => 'Tasa',
            'TasaOCuota' => '0.000000',
            'Importe' => '0.00',
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
        'tasa' => '0.000000',
        'importe' => 0.0,
        'TipoFactor' => 'Tasa',
      ),
    ),
    'TotalImpuestosTrasladados' => 0,
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
    'dir_cfdi' => 'adjuntos/1592945300/',
  ),
)
ERROR - 06-10-2021 23:49:38 --> Severity: Notice  --> Undefined index: __MF_VERSION_CFDI__ /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/lib/nodos/cfdi/cfdi.php 11
ERROR - 06-10-2021 23:49:38 --> Severity: Notice  --> Undefined index: __MF_VERSION_CFDI__ /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/lib/utils/alias.php 14
ERROR - 06-10-2021 23:49:38 --> Severity: Notice  --> Undefined index: __MF_VERSION_CFDI__ /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/lib/nodos/cfdi/cfdi.php 79
ERROR - 06-10-2021 23:49:38 --> Severity: Notice  --> Undefined index: codigo_mf_numero /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/lib/nodos/cfdi/cfdi.php 158
ERROR - 06-10-2021 23:49:38 --> Severity: Notice  --> Undefined variable: __mf_rfc_pruebas__ /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/lib/nodos/cfdi/cfdi.php 355
ERROR - 06-10-2021 23:49:40 --> Severity: Notice  --> Undefined index: url /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/lib/nodos/cfdi/cfdi.php 448
ERROR - 06-10-2021 23:49:43 --> Severity: Notice  --> A non well formed numeric value encountered /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/sdk272.php 1062
ERROR - 06-10-2021 23:49:43 --> Severity: Notice  --> A non well formed numeric value encountered /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/sdk272.php 1062
ERROR - 06-10-2021 23:49:43 --> Severity: Notice  --> Undefined index: xml_solo_firmado /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/sdk272.php 861
ERROR - 06-10-2021 23:49:43 --> Severity: Notice  --> Undefined index: modo_panama /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/sdk272.php 1814
ERROR - 06-10-2021 23:49:43 --> Severity: Notice  --> Undefined index: xml_sin_firmar /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/sdk272.php 924
ERROR - 06-10-2021 23:50:57 --> VER:array (
  'dir_cfdi' => 'adjuntos/1592945300/cfdi/',
  'version_cfdi' => '3.3',
  'cfdi' => 'adjuntos/1592945300/cfdi/I_B_3_cfdi3_3.xml',
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
    'rfc' => 'RLO180430B68',
    'nombre' => 'RAMF LOGISTICS SA DE CV',
  ),
  'id_factura' => 1633582257,
  'id_pedido' => '1592945300',
  'factPDF' => 
  array (
    'logo' => 'Logo.jpg',
    'logoWidth' => '120',
    'logoHeight' => '75',
    'RegimenFiscalDesc' => 
    array (
      'Descripcion' => 'General de Ley Personas Morales',
    ),
    'notas' => '',
    'totalConLetras' => 'CIENTO SESENTA  MIL SEISCIENTOS SETENTA Y CUATRO',
    'tipocomprobanteDesc' => 'Ingreso
',
    'tipoRelacionDesc' => 'Sustitución de los CFDI previos
',
    'notasCfdiRel' => 'test',
    'translados' => 
    array (
      0 => 
      array (
        'base' => 22161.95,
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
    'folio' => 3,
    'fecha_expedicion' => '2021-10-06T23:50:57',
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
    'subtotal' => '138512.22',
    'tipocambio' => '1',
    'total' => '160674.17',
    'tipocomprobante' => 'I',
  ),
  'CfdisRelacionados' => 
  array (
    'TipoRelacion' => '04',
    'UUID' => 
    array (
      0 => '32aada36-73a3-4399-981f-689e042f9b70',
    ),
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
      'ID' => '2944',
      'descripcion' => 'FLETE NACIONAL',
      'valorunitario' => '138512.22',
      'importe' => '138512.22',
      'ClaveProdServ' => '78121603',
      'ClaveUnidad' => 'E48',
      'Impuestos' => 
      array (
        'Traslados' => 
        array (
          0 => 
          array (
            'Base' => '138512.22',
            'Impuesto' => '002',
            'TipoFactor' => 'Tasa',
            'TasaOCuota' => '0.160000',
            'Importe' => '22161.95',
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
      'ID' => '2944',
      'descripcion' => 'FLETE NACIONAL',
      'valorunitario' => '138512.22',
      'importe' => '138512.22',
      'ClaveProdServ' => '78121603',
      'ClaveUnidad' => 'E48',
      'sumaIVA' => '1',
      'Impuestos' => 
      array (
        'Traslados' => 
        array (
          0 => 
          array (
            'Base' => '138512.22',
            'Impuesto' => '002',
            'TipoFactor' => 'Tasa',
            'TasaOCuota' => '0.160000',
            'Importe' => '22161.95',
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
        'importe' => 22161.95,
        'TipoFactor' => 'Tasa',
      ),
    ),
    'TotalImpuestosTrasladados' => 22161.95,
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
    'dir_cfdi' => 'adjuntos/1592945300/',
  ),
)
ERROR - 06-10-2021 23:50:57 --> Severity: Notice  --> Undefined index: __MF_VERSION_CFDI__ /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/lib/nodos/cfdi/cfdi.php 11
ERROR - 06-10-2021 23:50:57 --> Severity: Notice  --> Undefined index: __MF_VERSION_CFDI__ /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/lib/utils/alias.php 14
ERROR - 06-10-2021 23:50:57 --> Severity: Notice  --> Undefined index: __MF_VERSION_CFDI__ /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/lib/nodos/cfdi/cfdi.php 79
ERROR - 06-10-2021 23:50:57 --> Severity: Notice  --> Undefined index: codigo_mf_numero /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/lib/nodos/cfdi/cfdi.php 158
ERROR - 06-10-2021 23:50:57 --> Severity: Notice  --> Undefined variable: __mf_rfc_pruebas__ /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/lib/nodos/cfdi/cfdi.php 355
ERROR - 06-10-2021 23:51:00 --> Severity: Notice  --> Undefined index: url /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/lib/nodos/cfdi/cfdi.php 448
ERROR - 06-10-2021 23:51:02 --> Severity: Notice  --> A non well formed numeric value encountered /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/sdk272.php 1062
ERROR - 06-10-2021 23:51:02 --> Severity: Notice  --> A non well formed numeric value encountered /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/sdk272.php 1062
ERROR - 06-10-2021 23:51:02 --> Severity: Notice  --> Undefined index: xml_solo_firmado /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/sdk272.php 861
ERROR - 06-10-2021 23:51:02 --> Severity: Notice  --> Undefined index: modo_panama /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/sdk272.php 1814
ERROR - 06-10-2021 23:51:02 --> Severity: Notice  --> Undefined index: xml_sin_firmar /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/sdk272.php 924
ERROR - 06-10-2021 23:54:12 --> VER:array (
  'dir_cfdi' => 'adjuntos/1592945300/cfdi/',
  'version_cfdi' => '3.3',
  'cfdi' => 'adjuntos/1592945300/cfdi/I_B_4_cfdi3_3.xml',
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
    'rfc' => 'RLO180430B68',
    'nombre' => 'RAMF LOGISTICS SA DE CV',
  ),
  'id_factura' => 1633582452,
  'id_pedido' => '1592945300',
  'factPDF' => 
  array (
    'logo' => 'Logo.jpg',
    'logoWidth' => '120',
    'logoHeight' => '75',
    'RegimenFiscalDesc' => 
    array (
      'Descripcion' => 'General de Ley Personas Morales',
    ),
    'notas' => '',
    'totalConLetras' => 'CIENTO SESENTA  MIL SEISCIENTOS SETENTA Y CUATRO',
    'tipocomprobanteDesc' => 'Ingreso
',
    'tipoRelacionDesc' => 'Sustitución de los CFDI previos
',
    'notasCfdiRel' => 'test',
    'translados' => 
    array (
      0 => 
      array (
        'base' => 22161.95,
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
    'folio' => 4,
    'fecha_expedicion' => '2021-10-06T23:54:12',
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
    'subtotal' => '138512.22',
    'tipocambio' => '1',
    'total' => '160674.17',
    'tipocomprobante' => 'I',
  ),
  'CfdisRelacionados' => 
  array (
    'TipoRelacion' => '04',
    'UUID' => 
    array (
      0 => '32aada36-73a3-4399-981f-689e042f9b70',
    ),
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
      'ID' => '2944',
      'descripcion' => 'FLETE NACIONAL',
      'valorunitario' => '138512.22',
      'importe' => '138512.22',
      'ClaveProdServ' => '78121603',
      'ClaveUnidad' => 'E48',
      'Impuestos' => 
      array (
        'Traslados' => 
        array (
          0 => 
          array (
            'Base' => '138512.22',
            'Impuesto' => '002',
            'TipoFactor' => 'Tasa',
            'TasaOCuota' => '0.160000',
            'Importe' => '22161.95',
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
      'ID' => '2944',
      'descripcion' => 'FLETE NACIONAL',
      'valorunitario' => '138512.22',
      'importe' => '138512.22',
      'ClaveProdServ' => '78121603',
      'ClaveUnidad' => 'E48',
      'sumaIVA' => '1',
      'Impuestos' => 
      array (
        'Traslados' => 
        array (
          0 => 
          array (
            'Base' => '138512.22',
            'Impuesto' => '002',
            'TipoFactor' => 'Tasa',
            'TasaOCuota' => '0.160000',
            'Importe' => '22161.95',
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
        'importe' => 22161.95,
        'TipoFactor' => 'Tasa',
      ),
    ),
    'TotalImpuestosTrasladados' => 22161.95,
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
    'dir_cfdi' => 'adjuntos/1592945300/',
  ),
)
ERROR - 06-10-2021 23:54:12 --> Severity: Notice  --> Undefined index: __MF_VERSION_CFDI__ /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/lib/nodos/cfdi/cfdi.php 11
ERROR - 06-10-2021 23:54:12 --> Severity: Notice  --> Undefined index: __MF_VERSION_CFDI__ /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/lib/utils/alias.php 14
ERROR - 06-10-2021 23:54:12 --> Severity: Notice  --> Undefined index: __MF_VERSION_CFDI__ /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/lib/nodos/cfdi/cfdi.php 79
ERROR - 06-10-2021 23:54:12 --> Severity: Notice  --> Undefined index: codigo_mf_numero /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/lib/nodos/cfdi/cfdi.php 158
ERROR - 06-10-2021 23:54:12 --> Severity: Notice  --> Undefined variable: __mf_rfc_pruebas__ /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/lib/nodos/cfdi/cfdi.php 355
ERROR - 06-10-2021 23:54:15 --> Severity: Notice  --> Undefined index: url /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/lib/nodos/cfdi/cfdi.php 448
ERROR - 06-10-2021 23:54:17 --> Severity: Notice  --> A non well formed numeric value encountered /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/sdk272.php 1062
ERROR - 06-10-2021 23:54:17 --> Severity: Notice  --> A non well formed numeric value encountered /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/sdk272.php 1062
ERROR - 06-10-2021 23:54:17 --> Severity: Notice  --> Undefined index: xml_solo_firmado /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/sdk272.php 861
ERROR - 06-10-2021 23:54:17 --> Severity: Notice  --> Undefined index: modo_panama /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/sdk272.php 1814
ERROR - 06-10-2021 23:54:17 --> Severity: Notice  --> Undefined index: xml_sin_firmar /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/sdk272.php 924
ERROR - 06-10-2021 23:57:37 --> VER:array (
  'dir_cfdi' => 'adjuntos/1592945300/cfdi/',
  'version_cfdi' => '3.3',
  'cfdi' => 'adjuntos/1592945300/cfdi/I_B_5_cfdi3_3.xml',
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
    'rfc' => 'RLO180430B68',
    'nombre' => 'RAMF LOGISTICS SA DE CV',
  ),
  'id_factura' => 1633582657,
  'id_pedido' => '1592945300',
  'factPDF' => 
  array (
    'logo' => 'Logo.jpg',
    'logoWidth' => '120',
    'logoHeight' => '75',
    'RegimenFiscalDesc' => 
    array (
      'Descripcion' => 'General de Ley Personas Morales',
    ),
    'notas' => '',
    'totalConLetras' => 'CIENTO SESENTA  MIL SEISCIENTOS SETENTA Y CUATRO',
    'tipocomprobanteDesc' => 'Ingreso
',
    'tipoRelacionDesc' => 'Sustitución de los CFDI previos
',
    'notasCfdiRel' => 'test',
    'translados' => 
    array (
      0 => 
      array (
        'base' => 22161.95,
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
    'folio' => 5,
    'fecha_expedicion' => '2021-10-06T23:57:37',
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
    'subtotal' => '138512.22',
    'tipocambio' => '1',
    'total' => '160674.17',
    'tipocomprobante' => 'I',
  ),
  'CfdisRelacionados' => 
  array (
    'TipoRelacion' => '04',
    'UUID' => 
    array (
      0 => '32aada36-73a3-4399-981f-689e042f9b70',
    ),
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
      'ID' => '2944',
      'descripcion' => 'FLETE NACIONAL',
      'valorunitario' => '138512.22',
      'importe' => '138512.22',
      'ClaveProdServ' => '78121603',
      'ClaveUnidad' => 'E48',
      'Impuestos' => 
      array (
        'Traslados' => 
        array (
          0 => 
          array (
            'Base' => '138512.22',
            'Impuesto' => '002',
            'TipoFactor' => 'Tasa',
            'TasaOCuota' => '0.160000',
            'Importe' => '22161.95',
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
      'ID' => '2944',
      'descripcion' => 'FLETE NACIONAL',
      'valorunitario' => '138512.22',
      'importe' => '138512.22',
      'ClaveProdServ' => '78121603',
      'ClaveUnidad' => 'E48',
      'sumaIVA' => '1',
      'Impuestos' => 
      array (
        'Traslados' => 
        array (
          0 => 
          array (
            'Base' => '138512.22',
            'Impuesto' => '002',
            'TipoFactor' => 'Tasa',
            'TasaOCuota' => '0.160000',
            'Importe' => '22161.95',
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
        'importe' => 22161.95,
        'TipoFactor' => 'Tasa',
      ),
    ),
    'TotalImpuestosTrasladados' => 22161.95,
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
    'dir_cfdi' => 'adjuntos/1592945300/',
  ),
)
ERROR - 06-10-2021 23:57:37 --> Severity: Notice  --> Undefined index: __MF_VERSION_CFDI__ /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/lib/nodos/cfdi/cfdi.php 11
ERROR - 06-10-2021 23:57:37 --> Severity: Notice  --> Undefined index: __MF_VERSION_CFDI__ /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/lib/utils/alias.php 14
ERROR - 06-10-2021 23:57:37 --> Severity: Notice  --> Undefined index: __MF_VERSION_CFDI__ /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/lib/nodos/cfdi/cfdi.php 79
ERROR - 06-10-2021 23:57:37 --> Severity: Notice  --> Undefined index: codigo_mf_numero /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/lib/nodos/cfdi/cfdi.php 158
ERROR - 06-10-2021 23:57:37 --> Severity: Notice  --> Undefined variable: __mf_rfc_pruebas__ /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/lib/nodos/cfdi/cfdi.php 355
ERROR - 06-10-2021 23:57:39 --> Severity: Notice  --> Undefined index: url /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/lib/nodos/cfdi/cfdi.php 448
ERROR - 06-10-2021 23:57:39 --> Severity: Notice  --> A non well formed numeric value encountered /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/sdk272.php 1062
ERROR - 06-10-2021 23:57:39 --> Severity: Notice  --> A non well formed numeric value encountered /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/sdk272.php 1062
ERROR - 06-10-2021 23:57:39 --> Severity: Notice  --> Undefined index: xml_solo_firmado /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/sdk272.php 861
ERROR - 06-10-2021 23:57:39 --> Severity: Notice  --> Undefined index: modo_panama /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/sdk272.php 1814
ERROR - 06-10-2021 23:57:39 --> Severity: Notice  --> Undefined index: xml_sin_firmar /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/sdk272.php 924
