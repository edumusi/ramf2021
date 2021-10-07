<?php include("header_lg_admin.php");

  echo form_open(base_url().'gestion/login/', array('class' => 'sky-form', 'id' => 'login','name' => 'login'));
?>
<div class='row'>
    <section class="col col-2"></section>
    <section class="col col-7"><center><br><br><br>
        <img  src="<?php echo base_url();?>images/img23.jpg"/>
        </center><br><br><br>
    </section>
    <section class="col col-2"></section>
</div>                                	      


<div class="row errorMsg">		
<?php 
	echo br(1);
	echo $sesion;
	echo br(1);
?>
</div>   
         
<?php 
    echo form_close();
    include("footer_admin.php"); 
 ?>  