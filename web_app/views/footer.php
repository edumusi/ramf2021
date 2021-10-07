 <!-- FOOTER -->

 <!-- footer of the page -->
<footer id="footer" class="bg-full" style="background-image: url(<?php echo base_url();?>images/img13.jpg);">
        <!-- footer holder of the page -->
        <div class="footer-holder container">
                <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-3">
                                <h3>NUESTROS VALORES</h3>
                                <p>Respeto | Honestidad | Compromiso | Profesionalismo | Innovación | Actitud de Servicio</p>
                                <!-- Socail network of the page -->
                                <ul class="list-unstyled socail-network">
                                        <li><a href="#"><i class="social_facebook"></i></a></li>
                                        <li><a href="#"><i class="social_googleplus"></i></a></li>
                                        <li><a href="#"><i class="social_twitter"></i></a></li>
                                        <li><a href="#"><i class="social_linkedin"></i></a></li>
                                        <li><a href="#"><i class="social_pinterest"></i></a></li>
                                </ul>
                                <!-- Socail network of the page end -->
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-3">
                                <h3 class="mar">Nuestos Servicios</h3>
                                <!-- f nav of the page -->
                                <ul class="list-unstyled f-nav">
                                        <li>Flete Internacional</li>
                                        <li>Revisión de Origen</li>
                                        <li>Consultoría en comercio Exterior</li>
                                        <li>Almacenaje</li>
                                        <li>Distribución</li>
                                        <li>Seguro de Carga</li>
                                </ul>
                                <!-- f nav of the page end -->
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-3">
                                <h3>Nuestra Oficinas</h3>
                                <!-- contact list of the page -->
                                <ul class="list-unstyled contactlist">
                                        <li>
                                                <span class="icon ti-map-alt"></span>
                                                <address><?php echo DIR1_CONTACTO;?><br><?php echo DIR2_CONTACTO;?></address>
                                        </li>
                                        <li>
                                                <span class="icon ti-headphone-alt"></span>
                                                <span class="tel">
                                                        <a href="tel:<?php echo TEL_CONTACTO;?>"><?php echo TEL_CONTACTO;?></a>
                                                        <a href="tel:<?php echo CEL_CONTACTO;?>"><?php echo CEL_CONTACTO;?></a>
                                                </span>
                                        </li>
                                        <li>
                                                <span class="icon ti-email"></span>
                                                <span class="mail">
                                                        <a href="mailto:<?php echo CORREO_CONTACTO;?>"><?php echo CORREO_CONTACTO;?></a>
                                                        <a href="mailto:<?php echo CORREO2_CONTACTO;?>"><?php echo CORREO2_CONTACTO;?></a>
                                                </span>
                                        </li>
                                </ul>
                                <!-- contact list of the page end -->
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-3">
                                <h3>Suscríbase a nuestro boletín informativo</h3>
                                <p>Suscríbase a nuestra lista de distribución para hacerle llegar información actualizada y relevante.</p>
                                <!-- subscribe form of the page -->
                                <form action="#" class="subscribe-form">
                                    <span id="mensajeBoletin"></span>
                                        <fieldset>
                                                <input type="email" name="emailBOL" id="emailBOL" class="form-control" placeholder="Email">                                                
                                                <?php echo '<a href="javascript:submitFormContactoAX(\''.base_url().'\',\'mensajeBoletin\',\'emailBOL\');" class="btn-primary md-round text-center text-uppercase">suscribirse <i class="fa fa-envelope-o"></i></a>'?>
                                        </fieldset>
                                </form>
                                <!-- subscribe form of the page end -->
                        </div>
                </div>
        </div>
        <!-- footer area of the page -->
        <div class="footer-area">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 text-center">
                            <p>Copyrights © <?php echo date("Y");?> <?php echo TITULO_NAVEGADOR;?> All Rights Reserved. Powered by CONVIVERE</p>
                    </div>
                </div>
            </div>
        </div>
</footer>
<!-- footer of the page end -->

        <span id="back-top" class="text-center md-round fa fa-angle-up"></span>
        <!-- loader of the page -->
        <div id="loader" class="loader-holder">
                <div class="block"><img src="images/svg/bars.svg" width="60" alt="loader"></div>
        </div>
</div>
<!-- main container of all the page elements end -->
<a id="newsletter-hiddenlink" href="#popup1" class="lightbox" style="display: none;">Newsletter</a>
<!-- popup-holder of the page start here -->
<div class="popup-holder">
        <div id="popup1" class="lightbox">
                <!-- newsletter-block of the page start here -->
                <div class="newsletter-block bg-full" style="background-image: url(images/img42.jpg);">
                        <div class="holder text-center">
                                <h2 class="main-heading text-uppercase">Subscribe</h2>
                                <p>Subscribe to our mailing list to get the updates to your email inbox.</p>
                        </div>
                        <div class="bg-light block">
                                <form action="#" class="newsletter-form">
                                        <fieldset>
                                                <input type="email" class="form-control" placeholder="your email here">
                                                <button type="submit"><i class="fa fa-paper-plane-o"></i></button>
                                        </fieldset>
                                </form>
                        </div>
                </div>
                <!-- newsletter-block of the page end here -->
        </div>
</div>
<!-- popup-holder of the page end here -->
 

</body>
</html>