<?php
     $html = "<html>";
     $meta = array(  array('name' => 'author', 'content' => NOMBRE_CORTO),
                     array('name' => 'Content-type', 'content' => 'text/html; charset=UTF-8', 'type' => 'equiv')
                  );
      
     $html = $html ."<head>";
     $html = $html . meta($meta);
     $html = $html . '<link rel="STYLESHEET" href="css/formatos_pdf.css" type="text/css">';     
     $html = $html . "</head>"; 
  
   $html = $html .'<body marginwidth="0" marginheight="0">'
                    .  '<div class="header">'
                    .  '<div style="width: 100%;">
                          <table align="center" style="width: 100%;">
                          <tbody>
                          <tr> <td width="" class="center" rowspan="2" ><img src="images/LogoEncabezado.jpg" width="80px" height="60px"/></td>
                            <td width="" class="center" style="font-size: 9pt;"><strong>'.$datosSL[0]['nombre_fiscal'].'</strong></td>
                            <td width="" class="center" rowspan="2" style="font-size: 10pt;"><div class="recuadroGris"><strong>NUM COTIZACIÓN</strong><br><strong>#'.$this->input->post('id_coti').br(1).$fechaCoti.'</strong></div></td>
                          </tr>
                          <tr> 
                            <td width="" class="center"  style="font-size: 8pt;">'.$datosSL[0]['domicilio'].'</td>                            
                            </tr>
                          </tbody>
                          </table>
							          </div>'
                    .  '</div>'
                    .  '<div class="footer">
                          <table align="center" style="width: 100%;">
                          <tbody>
                          <tr> <td width="40%" class="center" >NUESTORS VALORES</td>
                               <td width="23%" class="center" style="font-size: 12pt;" rowspan="2"><div class="page-number"></div></td>
                               <td width="37%" class="left" style="font-size: 9pt; text-align: left;" rowspan="2"><span style="font-weight:bold;">Tel.'.nbs(1).$atentamente['telAdmin'].'</span>
                                                                                                 '.br(1).' <span style="font-weight:bold;">Cel.'.nbs(1).$atentamente["celAdmin"].'</span>'              
                                                                                                  .br(1).' <span style="font-weight:bold;">'.$atentamente["correoAdmin"].'</span>'
                                                                                                  .br(1).' <span style="font-weight:bold;">'.URL_SITE.'</span> </td></tr>
                               </td>
                          </tr>
                          <tr> <td width="40%" class="left" style="font-size: 8pt; text-align: left;" >Respeto | Honestidad | Compromiso | Profesionalismo | Innovación | Actitud de Servicio</td>
                          </tr>
                          </tbody>
                          </table>'
                    .  '</div>'
                    .  br(1).'<table cellspacing="0" align="center" cellpadding="0" width="100%">'                    
                    .    '<tr><td colspan="2" width="100%"><span style="font-weight:bold;text-align: left;">Atte.'.nbs(1).$prospecto["prosp_nombre"].'</span></td></tr>'
                    .    '<tr><td width="40%"><span style="font-weight:bold; text-align: left;">'.$prospecto["prosp_empresa"].'</span></td><td width="60%" style="font-size: 11pt; text-align: right;" >'.$prospecto["asunto"].'</td></tr>'
                    .    '<tr><td colspan="2" width="100%">'.br(1).'<p style="font-size:9x;text-align: justify;">'.$templateCotizacion[0]['parrafo_inicial'].'</p></td></tr>'
                    .  '</table>'.br(1);

      $html = $html . $servicios; 

  $slStr ="";
  for ($s = 0; $s <= $sl["slAtte"]; $s++)
      { $slStr = $slStr.'<p>&nbsp;</p>'; }

   $firma = $atentamente["firmaAdmin"]==NULL || $atentamente["firmaAdmin"]==""?"null.jpg":$atentamente["firmaAdmin"];                    
   $html = $html .$slStr.'<table cellspacing="0" align="center" cellpadding="0" width="100%">'                 
                 .    '<tr><td class="CotiIzquierdaBold"><p style="font-weight:bold;">Atentamente.</p></td></tr>'
                 .    '<tr><td class="CotiIzquierdaBold"><img border=0 width="120px" height="80px" src="images/firmas/'.$firma.'"/></td></tr>'              
                 .    '<tr><td class="CotiIzquierdaBold"><span style="font-weight:bold;">'.$atentamente["nombreAdmin"].'</span></td></tr>'
                 .    '<tr><td class="CotiIzquierdaBold"><span style="font-weight:bold;">'.RAZON_SOCIAL_FULL.'</span></td></tr>
                 <table cellspacing="0" align="center" cellpadding="0" width="100%">'
                 .    '<tr><td width="50%" class="CotiIzquierdaBold">'.br(1).'<span style="font-weight:bold;">Tel.'.nbs(1).'<img border=0 src="images/tel.jpg"/>'.nbs(1).$atentamente["telAdmin"].'</span></td>'
                 .    '    <td width="50%" class="CotiIzquierdaBold">'.br(1).'<span style="font-weight:bold;">Cel.'.nbs(1).'<img border=0 src="images/cel.jpg"/> '.nbs(1).$atentamente["celAdmin"].'</span></td></tr>'              
                 .    '<tr><td width="50%" class="CotiIzquierdaBold"><span style="font-weight:bold;">'.nbs(1).'<img border=0 src="images/mail.jpg" /> '.nbs(1).'<a href="mailTo:'.$atentamente["correoAdmin"].'" style="color:#7D141A;">'.$atentamente["correoAdmin"].'</a></span></td>'
                 .    '    <td width="50%" class="CotiIzquierdaBold"><span style="font-weight:bold;">'.nbs(1).'<img border=0 src="images/inicio.jpg"/>'.nbs(1).'<a href="'.base_url().'" style="color:#7D141A;">'.URL_SITE.'</a></span></td></tr>'
                 . '</body></html>'
                 ;
     
     echo  $html;
?>
