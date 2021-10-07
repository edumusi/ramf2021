<?php include("header_lg_admin.php"); ?>

<script type="text/javascript">

var href            = '<?php echo base_url(); ?>';
var registrosPagina = '<?php echo $registrosPagina; ?>';
var controlador     = '<?php echo $controlador; ?>';
var numColGrid      = '<?php echo $numColGrid; ?>';


$(document).ready(function() {   
	
        paginarAX(controlador,numColGrid,1,registrosPagina,href);
        
        $("#fechaIni").datepicker({dateFormat: 'yy-mm-dd'});        
        $("#fechaFin").datepicker({dateFormat: 'yy-mm-dd'});                        				
                
        $("#filtrosForm").toggle();
        $("#togfiltrosForm").click(function(){ var isHidden = $("#filtrosForm").is(":hidden");                                    
                                                if(isHidden) { $("#imgfiltrosForm").removeClass("fa-plus" ).addClass("fa-minus" ); 
                                                               $("#filtrosForm").show();
                                                             }
                                                else         { $("#imgfiltrosForm").removeClass("fa-minus").addClass("fa-plus"); 
                                                               $("#filtrosForm").hide();
                                                             }                                                
                                              });
        $("#togfiltrosForm").addClass("pointer");
                
} );

	
</script>   


<?php
        echo $filtrosTbl . br();        
	echo '<div class="row">';
        echo '<section class="col col-2"></section> 
              <section class="col col-4">
                    <span class="subtitulo">
                        <a href="'.base_url().$controlador.'/'.$accion.'/">
                         <img title="Agregar nuevo '.$tipo.' " src="'.base_url().'images/new.png"/> <img title="Agregar un nuevo '.$tipo.' al sistema" src="'.base_url().'images/portafolio.png"/>'.nbs(1).'Agregar un nuevo '.$tipo.'
                        </a>
                        '.$mensajeConfirm.'
                    </span><br><br>
               </section> 
               </div>
               <div class="row">
               <section class="col col-2"></section>
               <section class="col col-5"><center><header>'.$titulos['titulo'].'</header></center></section>
             </div>';
         echo br(2);
         echo '<div class="row">
              <section class="col col-11">';
        
         echo $grid;
	       
         echo br(1).'<div id="linksPaginar"></div><span id="spinPaginar"></span>
           </section>
            </div>';
        
        include("footer_admin.php"); 
?> 