<script>    

$(document).ready(function(){
  $("#origen").combobox();   
});//document ready


</script>


<?php 
echo form_open(base_url().'gestion/genera/', array('id' => 'formORIGEN','name' => 'formORIGEN'));

    echo '<fieldset> 
            <div class="row">    
            <section class="col col-4"><label class="label">País de Origen:</label>'.
             form_dropdown('origen', $pol, "", 'id="origen" class="validate[custom[requiredInFunction]]"').'
             </label>
            </section>
              <section class="col col-2"><label class="label">De:</label>
                                         <label class="input"><i class="icon-append fa fa-calendar"></i>
                                         '.form_input(array('class'     => 'validate[required] text-input chartIni', 
                                                            'name'      => 'paramDeORIGEN', 
                                                            'id'        => 'paramDeORIGEN',                                                                                             
                                                            'maxlength' => '40')).'                 
                                        <b class="tooltip tooltip-bottom-right">Fecha de Inicio para generar el Reporte</b>
                                        </label>
              </section>
              <section class="col col-2"><label class="label">Hasta:</label>
                                         <label class="input"><i class="icon-append fa fa-calendar"></i>
                                         '.form_input(array('class'     => 'validate[required] text-input chartFin', 
                                                            'name'      => 'paramHastaORIGEN', 
                                                            'id'        => 'paramHastaORIGEN',                                                                                             
                                                            'maxlength' => '40')).'
                                        <b class="tooltip tooltip-bottom-right">Fecha Final para generar el Reporte</b>
                                        </label>                                                                
              </section>
              <section class="col col-3">
                <a class=\'button\' href=\'javascript:submitReportExcelAX("'.base_url().'","ORIGEN");\'>Generar reporte</a>                
              </section
             </div>         
           </fieldset>';
echo form_close();

echo '
     <fieldset> 
       <div class="row">          
         <section class="col col-11">
            <div id="homeReportExcelORIGEN" ></div>
         </section>
        </div>         
      </fieldset>  
      
     ';

 

?>
