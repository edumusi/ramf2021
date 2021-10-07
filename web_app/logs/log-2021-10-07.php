<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

ERROR - 07-10-2021 12:56:44 --> datos:array (
  'dir_cfdi' => 'adjuntos/1584469490/cfdi/',
  'version_cfdi' => '3.3',
  'cfdi' => 'adjuntos/1584469490/cfdi/RLO180430B68_cfdi3_3.xml',
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
  'id_factura' => '1633059885',
  'id_pedido' => '1584469490',
  'factPDF' => 
  array (
    'logo' => 'Logo.jpg',
    'logoWidth' => '120',
    'logoHeight' => '75',
    'RegimenFiscalDesc' => 
    array (
      'Descripcion' => 'General de Ley Personas Morales',
    ),
    'tipocomprobanteDesc' => 'Pago',
    'UsoCFDIDesc' => 
    array (
      'Descripcion' => 'Por definir',
    ),
    'emailReceptor' => 'compras@greda.com',
    'cpReceptor' => '54713',
  ),
  'factura' => 
  array (
    'LugarExpedicion' => '03650',
    'RegimenFiscal' => '601',
    'folio' => '1633059885-1',
    'fecha_expedicion' => '2021-10-07T12:54:44',
    'subtotal' => '0',
    'total' => '0',
    'moneda' => 'XXX',
    'serie' => 'P',
    'tipocomprobante' => 'P',
  ),
  'rep' => 
  array (
    'parcial_rep' => '1',
    'fecha_rep' => '2021/10/7',
    'moneda_rep' => 'USD',
    'tc_rep' => '22',
    'monto_rep' => '20000',
    'forma_pago_rep' => '03',
    'forma_pago_rep_desc' => 'Transferencia electrónica de fondos',
    'facturaTipoCambio' => '0',
    'id_pedido' => '1584469490',
  ),
  'receptor' => 
  array (
    'UsoCFDI' => 'P01',
    'rfc' => 'GCE171024CQ0',
    'nombre' => 'GREDA CERAMICOS S.A DE C.V ',
  ),
  'conceptos' => 
  array (
    0 => 
    array (
      'ClaveProdServ' => '84111506',
      'cantidad' => '1',
      'ClaveUnidad' => 'ACT',
      'descripcion' => 'Pago',
      'valorunitario' => '0.0',
      'importe' => '0.0',
    ),
  ),
  'pagos10' => 
  array (
    'Pagos' => 
    array (
      0 => 
      array (
        'FechaPago' => '2021-10-7',
        'FormaDePagoP' => '2021/10/7',
        'MonedaP' => 'USD',
        'Monto' => '20000',
        'NumOperacion' => '',
        'RfcEmisorCtaOrd' => '',
        'CtaOrdenante' => '',
        'RfcEmisorCtaBen' => '',
        'CtaBeneficiario' => '',
        'DoctoRelacionado' => 
        array (
          0 => 
          array (
            'IdDocumento' => 'b0040e84-5bd4-406a-8707-2d9fb9476dea',
            'Serie' => 'B',
            'Folio' => '1',
            'MonedaDR' => 'USD',
            'MetodoDePagoDR' => 'PUE',
            'NumParcialidad' => '1',
            'ImpSaldoAnt' => 22953.45,
            'ImpPagado' => '20000',
            'ImpSaldoInsoluto' => '2953.4500000000007',
          ),
        ),
      ),
    ),
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
    'dir_cfdi' => 'adjuntos/1584469490/',
  ),
)
ERROR - 07-10-2021 12:56:44 --> Severity: Notice  --> Undefined index: __MF_VERSION_CFDI__ /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/lib/nodos/cfdi/cfdi.php 11
ERROR - 07-10-2021 12:56:44 --> Severity: Notice  --> Undefined index: __MF_VERSION_CFDI__ /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/lib/utils/alias.php 14
ERROR - 07-10-2021 12:56:44 --> Severity: Notice  --> Undefined index: __MF_VERSION_CFDI__ /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/lib/nodos/cfdi/cfdi.php 79
ERROR - 07-10-2021 12:56:44 --> Severity: Notice  --> Undefined index: codigo_mf_numero /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/lib/nodos/cfdi/cfdi.php 158
ERROR - 07-10-2021 12:56:44 --> Severity: Notice  --> Undefined variable: __mf_rfc_pruebas__ /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/lib/nodos/cfdi/cfdi.php 355
ERROR - 07-10-2021 12:56:46 --> Severity: Notice  --> Undefined index: url /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/lib/nodos/cfdi/cfdi.php 448
ERROR - 07-10-2021 12:56:48 --> Severity: Notice  --> A non well formed numeric value encountered /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/sdk272.php 1062
ERROR - 07-10-2021 12:56:48 --> Severity: Notice  --> A non well formed numeric value encountered /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/sdk272.php 1062
ERROR - 07-10-2021 12:56:48 --> Severity: Notice  --> Undefined index: xml_solo_firmado /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/sdk272.php 861
ERROR - 07-10-2021 12:56:48 --> Severity: Notice  --> Undefined index: modo_panama /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/sdk272.php 1814
ERROR - 07-10-2021 12:56:48 --> Severity: Notice  --> Undefined index: xml_sin_firmar /opt/lampstack-7.2.25-0/apache2/htdocs/ramf/web_app/third_party/sdk2/sdk272.php 924
ERROR - 07-10-2021 12:56:48 --> resp:array (
  'error' => 
  array (
  ),
  'success' => 
  array (
    'cfdi' => '<?xml version="1.0" encoding="UTF-8"?>
<cfdi:Comprobante xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:cfdi="http://www.sat.gob.mx/cfd/3" xsi:schemaLocation="http://www.sat.gob.mx/cfd/3 http://www.sat.gob.mx/sitio_internet/cfd/3/cfdv33.xsd " Version="3.3" LugarExpedicion="03650" Folio="1633059885-1" Fecha="2021-10-07T12:54:44" SubTotal="0" Total="0" Moneda="XXX" Serie="P" TipoDeComprobante="P" Certificado="MIIFyDCCA7CgAwIBAgIUMzAwMDEwMDAwMDA0MDAwMDI0NDMwDQYJKoZIhvcNAQELBQAwggErMQ8wDQYDVQQDDAZBQyBVQVQxLjAsBgNVBAoMJVNFUlZJQ0lPIERFIEFETUlOSVNUUkFDSU9OIFRSSUJVVEFSSUExGjAYBgNVBAsMEVNBVC1JRVMgQXV0aG9yaXR5MSgwJgYJKoZIhvcNAQkBFhlvc2Nhci5tYXJ0aW5lekBzYXQuZ29iLm14MR0wGwYDVQQJDBQzcmEgY2VycmFkYSBkZSBjYWRpejEOMAwGA1UEEQwFMDYzNzAxCzAJBgNVBAYTAk1YMRkwFwYDVQQIDBBDSVVEQUQgREUgTUVYSUNPMREwDwYDVQQHDAhDT1lPQUNBTjERMA8GA1UELRMIMi41LjQuNDUxJTAjBgkqhkiG9w0BCQITFnJlc3BvbnNhYmxlOiBBQ0RNQS1TQVQwHhcNMTkwNjE3MjA0MDUxWhcNMjMwNjE3MjA0MDUxWjCB7zEqMCgGA1UEAxMhWEVOT04gSU5EVVNUUklBTCBBUlRJQ0xFUyBTIERFIENWMSowKAYDVQQpEyFYRU5PTiBJTkRVU1RSSUFMIEFSVElDTEVTIFMgREUgQ1YxKjAoBgNVBAoTIVhFTk9OIElORFVTVFJJQUwgQVJUSUNMRVMgUyBERSBDVjElMCMGA1UELRMcWElBMTkwMTI4SjYxIC8gS0FITzY0MTEwMUIzOTEeMBwGA1UEBRMVIC8gS0FITzY0MTEwMUhOVExLUzA2MSIwIAYDVQQLExlYZW5vbiBJbmR1c3RyaWFsIEFydGljbGVzMIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAiJQ5YcSgjwsGf29+3go7VGdtMZCcH9wUpn46ZMAlFwUojnCPTvwJ3+cSwjqJnw8ahr3DuRwekvGR4BJAb5b9Xi8kyoiWtwcGOSWxO38Bp9J1e/BO9HMbQBPAtLDuG47oqnH8zWLOeaoYRJDpARw4RX1ko2+9tbj0ntBtM7Vk1E8EWiA/h2Meq0LIv1+ySGTUrEW46FM01J5pzELv5XupBghuJxR5DG9fiOW7u3dR5s3tZoVLwA1KdjJtY0mmnfCwxg6i5AqhvY+FAI5D6CF6/lHA8PWg63WasvrhuIv70xCLjgPT/j00ZcPrLvBf1DefGVic980Ch/SDvC+MdJ1F5wIDAQABox0wGzAMBgNVHRMBAf8EAjAAMAsGA1UdDwQEAwIGwDANBgkqhkiG9w0BAQsFAAOCAgEACjfTPoKY2N5MxjmAMltd5XZCV1vgAwEtrIRYTodhE8R0Tp1QanAXb0luPyBv5hIXWK4VqAI4fcTtP+n7kkrwfha6ErkPWFNJWJm8ZsMmby/3WgVoJkOFyRYQqr5Il3N6wMa5kiDBtDRbqB3iEXmvtrvjWSHyxAER+zo3jWGFlhBZ0nQNRtjx8sPFihVc5TUH682HJiU4oWvT63Dnra8ncqiW/uCuY86crnUq0fW7Lw/3+PY5xXjNxR/Hh3sUPITfJrGaLWurD1J9npr9yGAJ6t9zrhhZnepIC0DUMc5+j4pg1DrO32jzwUOLQqErDizh84NoJCWwbg+US8wi3zD0ZKiDv7XsTNWAW2Ap2JkzykKHjFTZiEm3uZOkJNfcu3o+kefr5HfXFT+iN9K5FUEhaQwgUeZBRJ8V5F6gmhz3d6ixVbiZoFNhYR8e2k8gF9gGrVMrEbJGQrl+6+ZYQLFiauXeG7fu1svk19PuyredRJGnseJqyV4RzcRGhJA+cLnmpdDOTEhignnvnhEuY6HVRYYXhOTyeeluET7KRCxbJGqO7TdWgjrHL3HRbNE4NY5GAdOZuLaWxElG5ZVCHqtG0Nh7UQAhcz+EKyZBAewv5XuH0OomZXw6mM2mY2soL6z1224NusM8/BbJcYTQUlAEKblEChhGK1XlxiVOU2nc9KE=" NoCertificado="30001000000400002443" Sello="gFw6JbuTcEObVrwlpJ39XrYTeT2ob1Xdndb1a8zYJWk9upQIyZyW0qcHwtZHho7Qa64uPmlzRfrfOsp1IIx7wWO+9sSkvRDVDWd1bDTxo7VpSlXAO9dxJAOiwC87BBwDEOm0PuXSLYEHdLPPLFoFBmyKJuna/Qr1QsHd4GimBx10RjK1BcKmBIHr85+s0jqFfEcvlutx100xKQdW4yhzZxrUegewVSqldYmTYjODIdOYdtsWRfRubCdBhUePL5kzMZtlhv5i1AOVSnTXk75Rb6l6fuVMY7A6dERsv+L3FhIPXIbmM7Omt6Ep5w0vXDWCz+gxn+QPCuOGYDGXCpleFQ==">
  <cfdi:Emisor Rfc="XIA190128J61" Nombre="ACCEM SERVICIOS EMPRESARIALES SC" RegimenFiscal="601"/>
  <cfdi:Receptor UsoCFDI="P01" Rfc="GCE171024CQ0" Nombre="GREDA CERAMICOS S.A DE C.V"/>
  <cfdi:Conceptos>
    <cfdi:Concepto ClaveProdServ="84111506" Cantidad="1" ClaveUnidad="ACT" Descripcion="Pago" ValorUnitario="0.0" Importe="0.0"/>
  </cfdi:Conceptos>
  <cfdi:Complemento>
    <tfd:TimbreFiscalDigital xmlns:tfd="http://www.sat.gob.mx/TimbreFiscalDigital" xsi:schemaLocation="http://www.sat.gob.mx/TimbreFiscalDigital http://www.sat.gob.mx/sitio_internet/cfd/TimbreFiscalDigital/TimbreFiscalDigitalv11.xsd" Version="1.1" UUID="f305ae2f-48b1-4b12-b655-fd3d2626e092" FechaTimbrado="2021-10-07T12:56:48" RfcProvCertif="SPR190613I52" SelloCFD="gFw6JbuTcEObVrwlpJ39XrYTeT2ob1Xdndb1a8zYJWk9upQIyZyW0qcHwtZHho7Qa64uPmlzRfrfOsp1IIx7wWO+9sSkvRDVDWd1bDTxo7VpSlXAO9dxJAOiwC87BBwDEOm0PuXSLYEHdLPPLFoFBmyKJuna/Qr1QsHd4GimBx10RjK1BcKmBIHr85+s0jqFfEcvlutx100xKQdW4yhzZxrUegewVSqldYmTYjODIdOYdtsWRfRubCdBhUePL5kzMZtlhv5i1AOVSnTXk75Rb6l6fuVMY7A6dERsv+L3FhIPXIbmM7Omt6Ep5w0vXDWCz+gxn+QPCuOGYDGXCpleFQ==" NoCertificadoSAT="30001000000400002495" SelloSAT="b2zFgjlycAxgit5HchswOZLFWtEWCCFIuxKbBtHziuehJEQk7hnrfaItpQND1z3s7V0A9Mlce2wKzyy9NsyJZGkUlsprYIfFmzN6YMxUWzCGVx5qy2Ni0XwEDt+y0lwlsUI02cfH0X+awpQzpwAEuJUGzGwG1HyCRf8x0pyGQS2NqZihvG3/MYGYorxUHqCdF9TdY/kulS9URQMQSixzj0JKx0Q+yl7ESbRiqpXxw20U6tF67T2ANuJA3htPT2Rb+VjkGKLrbBs0XoxIqTIIJFg9Y5B9OGmf4BSwygpDju4oJCiOwjsQbZ3YWhhrHq2RiA5xBaEf3jpKOPApyxKsow=="/>
  </cfdi:Complemento>
</cfdi:Comprobante>
',
    'png' => 'iVBORw0KGgoAAAANSUhEUgAAANQAAADUAQMAAADeEJ9bAAAABlBMVEX///8AAABVwtN+AAACFElEQVRYhe2YUW7DMAxDdQPe/5a6ASdSTrLtO/woUHdr17wAkW2Kklf1HR8+SDYINAsAiWpdirF579blJtg9f/hSjumC8IQh6mA6y4ieUOYWz7/jDIWZ/izxfJJhJjzv0PR1W/3dh7eZhPNv/NHZ28xjIlA8I+L5/XU9wOa5CgYS0yz2SAnSb4xJSdS33Vv9SFcxNnvazs6yH0hVc3PFmGTkRfaElZus7ihr762yREmqbUaOzWPlOHR6Km/WF4KMx1vtQnOnJl85tkqaGdt/LOTbewJMi6yXfVXalarONiSY5k3nR8nMrSWgY0x1CrSdKjnL9nPlUYDtVKcGD6fTkrhzJcCcI3q8LBynZiHHNgblpJPUuE8wCbZa1eRVpFwn+4kzwMpmaou1i6/VxpiW1uvsCuwejpcZJJifDbeltj2Lizm2mwm3i2U16bNirLm12D4uo8Vt5RG2alJqSr/qGh1cjjk93CReJqTGMcZOKm4g7op5d28Jpu10FzUv63dNIcdUHEsurlicnm44Uux0Ng7Eho6j4xSrtbrdXe/zE0uAnRq1J14VYxQf6b7P1KmpD96a5frPuxUOsNWTj7zFU6se9b7P9qzmlri35XfHGGOe755DLVyf2RhkPorKUrdYeSWuvi7FXKlmmWv39+o1Usxbi/2XCfaEmGPr4QoAPI3pYxPvM65wq/d0qAV4eqkA+44PHj/e8IEdeQK86AAAAABJRU5ErkJggg==',
    'idpac' => 1,
    'pac' => 3,
    'produccion' => 'NO',
    'codigo_mf_numero' => 0,
    'codigo_mf_texto' => '[MODO PRUEBAS] OK',
    'mensaje_original_pac_json' => '{"data":{"tfd":"<?xml version=\\"1.0\\" encoding=\\"utf-8\\"?><tfd:TimbreFiscalDigital xsi:schemaLocation=\\"http://www.sat.gob.mx/TimbreFiscalDigital http://www.sat.gob.mx/sitio_internet/cfd/TimbreFiscalDigital/TimbreFiscalDigitalv11.xsd\\" Version=\\"1.1\\" UUID=\\"f305ae2f-48b1-4b12-b655-fd3d2626e092\\" FechaTimbrado=\\"2021-10-07T12:56:48\\" RfcProvCertif=\\"SPR190613I52\\" SelloCFD=\\"gFw6JbuTcEObVrwlpJ39XrYTeT2ob1Xdndb1a8zYJWk9upQIyZyW0qcHwtZHho7Qa64uPmlzRfrfOsp1IIx7wWO+9sSkvRDVDWd1bDTxo7VpSlXAO9dxJAOiwC87BBwDEOm0PuXSLYEHdLPPLFoFBmyKJuna/Qr1QsHd4GimBx10RjK1BcKmBIHr85+s0jqFfEcvlutx100xKQdW4yhzZxrUegewVSqldYmTYjODIdOYdtsWRfRubCdBhUePL5kzMZtlhv5i1AOVSnTXk75Rb6l6fuVMY7A6dERsv+L3FhIPXIbmM7Omt6Ep5w0vXDWCz+gxn+QPCuOGYDGXCpleFQ==\\" NoCertificadoSAT=\\"30001000000400002495\\" SelloSAT=\\"b2zFgjlycAxgit5HchswOZLFWtEWCCFIuxKbBtHziuehJEQk7hnrfaItpQND1z3s7V0A9Mlce2wKzyy9NsyJZGkUlsprYIfFmzN6YMxUWzCGVx5qy2Ni0XwEDt+y0lwlsUI02cfH0X+awpQzpwAEuJUGzGwG1HyCRf8x0pyGQS2NqZihvG3/MYGYorxUHqCdF9TdY/kulS9URQMQSixzj0JKx0Q+yl7ESbRiqpXxw20U6tF67T2ANuJA3htPT2Rb+VjkGKLrbBs0XoxIqTIIJFg9Y5B9OGmf4BSwygpDju4oJCiOwjsQbZ3YWhhrHq2RiA5xBaEf3jpKOPApyxKsow==\\" xmlns:tfd=\\"http://www.sat.gob.mx/TimbreFiscalDigital\\" xmlns:xsi=\\"http://www.w3.org/2001/XMLSchema-instance\\" />"},"status":"success"}',
    'cancelada' => 'NO',
    'saldo' => 993614,
    'uuid' => 'f305ae2f-48b1-4b12-b655-fd3d2626e092',
    'servidor' => '1',
    'ejecucion' => 317.03200000000004,
    'debug' => '',
    'abortar' => false,
    'archivo_xml' => 'adjuntos/1584469490/cfdi/RLO180430B68_cfdi3_3.xml',
    'archivo_png' => 'adjuntos/1584469490/cfdi/RLO180430B68_cfdi3_3.png',
    'representacion_impresa_cadena' => '||1.1|f305ae2f-48b1-4b12-b655-fd3d2626e092|2021-10-07T12:56:48|gFw6JbuTcEObVrwlpJ39XrYTeT2ob1Xdndb1a8zYJWk9upQIyZyW0qcHwtZHho7Qa64uPmlzRfrfOsp1IIx7wWO+9sSkvRDVDWd1bDTxo7VpSlXAO9dxJAOiwC87BBwDEOm0PuXSLYEHdLPPLFoFBmyKJuna/Qr1QsHd4GimBx10RjK1BcKmBIHr85+s0jqFfEcvlutx100xKQdW4yhzZxrUegewVSqldYmTYjODIdOYdtsWRfRubCdBhUePL5kzMZtlhv5i1AOVSnTXk75Rb6l6fuVMY7A6dERsv+L3FhIPXIbmM7Omt6Ep5w0vXDWCz+gxn+QPCuOGYDGXCpleFQ==|30001000000400002495||',
    'representacion_impresa_certificado_no' => '30001000000400002443',
    'representacion_impresa_fecha_timbrado' => 
    SimpleXMLElement::__set_state(array(
       0 => '2021-10-07T12:56:48',
    )),
    'representacion_impresa_sello' => 
    SimpleXMLElement::__set_state(array(
       0 => 'gFw6JbuTcEObVrwlpJ39XrYTeT2ob1Xdndb1a8zYJWk9upQIyZyW0qcHwtZHho7Qa64uPmlzRfrfOsp1IIx7wWO+9sSkvRDVDWd1bDTxo7VpSlXAO9dxJAOiwC87BBwDEOm0PuXSLYEHdLPPLFoFBmyKJuna/Qr1QsHd4GimBx10RjK1BcKmBIHr85+s0jqFfEcvlutx100xKQdW4yhzZxrUegewVSqldYmTYjODIdOYdtsWRfRubCdBhUePL5kzMZtlhv5i1AOVSnTXk75Rb6l6fuVMY7A6dERsv+L3FhIPXIbmM7Omt6Ep5w0vXDWCz+gxn+QPCuOGYDGXCpleFQ==',
    )),
    'representacion_impresa_selloSAT' => 
    SimpleXMLElement::__set_state(array(
       0 => 'b2zFgjlycAxgit5HchswOZLFWtEWCCFIuxKbBtHziuehJEQk7hnrfaItpQND1z3s7V0A9Mlce2wKzyy9NsyJZGkUlsprYIfFmzN6YMxUWzCGVx5qy2Ni0XwEDt+y0lwlsUI02cfH0X+awpQzpwAEuJUGzGwG1HyCRf8x0pyGQS2NqZihvG3/MYGYorxUHqCdF9TdY/kulS9URQMQSixzj0JKx0Q+yl7ESbRiqpXxw20U6tF67T2ANuJA3htPT2Rb+VjkGKLrbBs0XoxIqTIIJFg9Y5B9OGmf4BSwygpDju4oJCiOwjsQbZ3YWhhrHq2RiA5xBaEf3jpKOPApyxKsow==',
    )),
    'representacion_impresa_certificadoSAT' => 
    SimpleXMLElement::__set_state(array(
       0 => '30001000000400002495',
    )),
  ),
)
