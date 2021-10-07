// JavaScript Document
var titAlert     = $("#companyName").val();

function submitForm(forma) 
{	
    $("#"+forma).validationEngine();
    if($("#"+forma).validationEngine('validate'))
       $("#"+forma).submit();		
}

function submitFormAX(baseURL,forma,id_in,accion)
{
    $("#confirm"+forma).removeClass("msjOk").removeClass("msjErr").addClass("msjconfirm").html("").show();
    $("#"+forma).validationEngine();
    if($("#"+forma).validationEngine('validate'))
    { 
    var status = $("#status"+$("#num_track").val()).val();
    
    $.ajax({data      : $("#"+forma).serialize(),
            url       : baseURL+'pedido/guardar/'+id_in+'/'+accion+'/'+forma+'/'+status,
            type      : 'post',
            dataType  : 'json',
            beforeSend: function () { $("#confirm"+forma).removeClass("msjOk").addClass("msjconfirm");
                                      $("#confirm"+forma).html("<img src=\""+baseURL+"images/loading.gif\"> Guardando seccion, espere por favor...");},
            success   : function (response) { 
                                      $("#confirm"+forma).removeClass("msjconfirm").addClass("msjOk");
                                      $("#confirm"+forma).html("<img src=\""+baseURL+"images/check.png\"> Seccion guardada exitosamente");
                                      $("#confirm"+forma).slideUp(12800);}, 
            error     : function(xhr, textStatus, error)
                            { jAlert("Ha ocurrido un error al guardar la seccion: " + xhr.statusText + " " + textStatus+" "+error,titAlert); 
                              $("#confirm"+forma).removeClass("msjconfirm").removeClass("msjOk").addClass("msjErr").html("<img src=\""+baseURL+"images/close.png\">Ocurrio un problema al guardar la seccion, intentelo mas tarde");}
           });
    }
}

function submitFormContactoAX(baseURL,mensaje,campoEmail) 
{
    var regExpEmail = new RegExp(/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/);
    var okRegExp    = regExpEmail.test($("#"+campoEmail).val());
    $("#"+mensaje).attr( "style", "color:#15BC57;" );
    $("#"+mensaje).html("");
    
    if(okRegExp === true)
    {  if(campoEmail==="emailBOL"){ boletinSusAX(baseURL); } else { contactoAX(baseURL); } }
    else
    { $("#"+mensaje).attr( "style", "color:red;" );
      $("#"+mensaje).html("<img src=\""+baseURL+"images/important.gif\"> Correo Electronico erroneo, favor de verificar e intentar de nuevo");
    }    
}


function submitFormReset(forma)
{
    $('#'+forma).each (function(){
    this.reset();
    });
}

function contactoAX(baseURL)
{
        var param = {"nameMSJ"      : $("#nameMSJ" ).val(),
                     "emailMSJ"     : $("#emailMSJ").val(), 
                     "dimMSJ"       : $("#dimMSJ"  ).val(), 
                     "coMSJ"        : $("#coMSJ"   ).val(),
                     "cdMSJ"        : $("#cdMSJ"   ).val(),
                     "msgMSJ"       : $("#msgMSJ"  ).val(),
                     "freight_type" : $("#freight_type").val(),
                     "terminoINCO"  : $("#terminoINCO" ).val()
                     };
        $.ajax({ 
		data	  : param,               
                url	  : baseURL+'gestion/contactoAX/',
                type	  : 'post',
				dataType  : 'json',
				beforeSend: function () 
				{   $("#mensajeContacto").attr( "style", "color:orange;" );
                                    $("#mensajeContacto").html("<img src=\""+baseURL+"images/loading.gif\"> Procesando su solicitud, espere por favor..."); },
                success:  function (response) 
				{	                                    
                                        $("#mensajeContacto").attr( "style", "color:#15BC57;" );
					$("#mensajeContacto").html("<img src=\""+baseURL+"images/info.gif\"> Hemos recibido su solicitud, a la brevedad nos comunicaremos con  usted");
					
					$("#nameMSJ" ).val("");
                                        $("#emailMSJ").val("");
                                        $("#dimMSJ"  ).val(""); 
                                        $("#coMSJ"   ).val("");
                                        $("#cdMSJ"   ).val("");
                                        $("#msgMSJ"  ).val("");
                                        $("#freight_type").val(0);
                                        $("#terminoINCO" ).val(0);
                                   
                }, 
				error: function(err)
				{alert("Ha ocurrido un error contactoAX: " + err.status + " " + err.statusText);}
        });			
}

function boletinSusAX(baseURL)
{
        var param = {"emailBOL" : $("#emailBOL").val()};
        $.ajax({ 
		data	  : param,               
                url	  : baseURL+'gestion/boletinSusAX/',
                type	  : 'post',
				dataType  : 'json',
				beforeSend: function () 
				{   $("#mensajeBoletin").attr( "style", "color:orange;" );
                                    $("#mensajeBoletin").html("<img src=\""+baseURL+"images/loading.gif\"> Procesando su solicitud, espere por favor..."); },
                success:  function (response) 
				{	                                    
                                        $("#mensajeBoletin").attr( "style", "color:#15BC57;" );
					$("#mensajeBoletin").html("<span class='icon'><i class='ti-info'></i></span> Hemos recibido su solicitud, a la brevedad nos comunicaremos con  usted");
					
					$("#emailBOL").val("");
                                   
                }, 
				error: function(err)
				{alert("Ha ocurrido un error contactoAX: " + err.status + " " + err.statusText);}
        });			
}

function submitFormRastreoAX(baseURL) 
{
    var regExpRef = new RegExp(/^[0-9]+$/);
    var okRegRef  = regExpRef.test($("#num_guia").val());
    
    $("#mensajeRastreo").attr( "style", "color:#15BC57;" );
    $("#mensajeRastreo").html("");
    
    if(okRegRef === true)
    {   traeRastreoAX(baseURL); } 
    else
    { $("#mensajeRastreo").attr( "style", "color:red; font-size: 15px;" );
      $("#mensajeRastreo").html("<br><center><span class='icon'><i class='icon_error-triangle_alt'></i></span> Referencia RAMF invalida: <strong>"+$("#num_guia").val()+"</strong>, favor de verificar e intentar de nuevo</center><br><br>");      
      $("#num_guia").val("");
    }    
}

function traeRastreoAX(baseURL)
{
    var param = {"num_guia" : $("#num_guia").val()};
    
    $.ajax({data  : param,               
            url	  : baseURL+'rastreo/traeRastreoAX/',
            type  : 'post',
            dataType  : 'json',
            beforeSend: function () 
            {   $("#mensajeRastreo").attr( "style", "color:orange;" );
                $("#mensajeRastreo").html("<img src=\""+baseURL+"images/loading.gif\"> Procesando su solicitud, espere por favor..."); 
            },
            success:  function (response) 
            {
                $("#num_guia").val("");
                $("#mensajeRastreo").html(response['encabezado']);
            }, 
            error: function(err)
            {alert("Ha ocurrido un error contactoAX: " + err.status + " " + err.statusText);}
    });			
}

function empty(e) {
                    switch(e) {
                        case "":                 
                        case null:
                        case false:
                        case typeof this === "undefined":
                            return "";
                                default : return e;
                    }
                }
function isEmpty(e) {
                    switch(e) {
                        case "":                 
                        case null:
                        case false:
                        case typeof this === "undefined":
                            return true;
                                default : return false;
                    }
                }