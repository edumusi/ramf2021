<?php echo doctype('xhtml1-trans');?>
<html xmlns="http://www.w3.org/1999/xhtml" >
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="es-Es" xmlns="http://www.w3.org/1999/xhtml"> <!--<![endif]-->
<head>

<?php
$meta = array(
                    array('name' => 'author'          , 'content' => TITULO_NAVEGADOR),
                    array('name' => 'rights'          , 'content' => TITULO_NAVEGADOR),
                    array('name' => 'description'     , 'content' => 'Comercializadora.'),
                    array('name' => 'keywords'        , 'content' => 'importacion,asia,mexico,internacional,proyectos,aduana,aduanas'),
                    array('name' => 'Content-type'    , 'content' => 'text/html; charset=UTF-8', 'type' => 'equiv'),
                    array('name' => 'viewport'        , 'content' => 'width=device-width, initial-scale=1.0'),
                    array('name' => 'HandheldFriendly', 'content' => 'True')
            );

echo meta($meta); 

echo '<title>'. $titulos["navegador"] . '</title>';

echo link_tag( array('href' => 'css/font-awesome.css','rel' => 'stylesheet', 'type' => 'text/css') );
echo link_tag( array('href' => 'css/bootstrap.css'   ,'rel' => 'stylesheet', 'type' => 'text/css') );
echo link_tag( array('href' => 'css/plugins.css'     ,'rel' => 'stylesheet', 'type' => 'text/css') );
echo link_tag( array('href' => 'css/icofont.css'     ,'rel' => 'stylesheet', 'type' => 'text/css') );
echo link_tag( array('href' => 'css/style.css'       ,'rel' => 'stylesheet', 'type' => 'text/css') );
echo link_tag( array('href' => 'css/colors.css'      ,'rel' => 'stylesheet', 'type' => 'text/css') );
echo link_tag( array('href' => 'css/responsive.css'  ,'rel' => 'stylesheet', 'type' => 'text/css') );
//colorbox
echo link_tag(array('href' => 'css/colorbox.css','rel' => 'stylesheet', 'type' => 'text/css'));

?>

<script type="text/javascript" src="<?php echo base_url();?>js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/plugins.js"></script>

<!-- EMS Jquery -->
<script type="text/javascript" src="<?php echo base_url();?>js/webPageAjax.js"></script>
<!-- colorbox -->
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.colorbox.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.main.js"></script>

</head>

<body>

<!-- main container of all the page elements -->
<div id="wrapper">
    <!-- header of the page -->
    <header id="header" style="height: 72px;">
            <div class="container">				
                    <!-- header holder of the page -->
                    <div class="row header-holder">
                            <div class="col-xs-12">
                                    <div class="logo">
                                            <a href="<?php echo base_url();?>"><img src="<?php echo base_url();?>images/Logo.jpg" alt="Icon" class="img-responsive"></a>
                                    </div>
                                    <a href="#" class="nav-opener"><i class="fa fa-bars"></i></a>
                                    <!-- Nav of the page -->
                                    <nav id="nav">
                                            <ul class="list-unstyled">
                                                    <li class="active">
                                                            <a href="#">Home</a>									
                                                    </li>
                                                    <li> <a href="#titServicios">SERVICIOS</a> </li>
                                                    <li> <a href="#titNosotros">QUIÉNES SOMOS</a></li>
                                                    <li> <a href="#titContacto">CONTACTO</a></li>                                                   
                                                    <li> <a href="#titRastreo">RASTREO</a> </li>
                                                    <li><a href="<?php echo base_url();?>gestion/">Portal</a></li>
                                            </ul>
                                    </nav>
                                    <!-- Nav of the page end -->
                            </div>
                    </div>
                    <!-- header holder of the page end -->
            </div>
    </header>
    <!-- header of the page end -->