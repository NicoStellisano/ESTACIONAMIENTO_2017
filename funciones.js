




function Registro()
{
    
    

    $.ajax({
        		type: 'POST',url:"empleados.php",dataType:"text",data:"tabla="+'1',async:true})			
				
				.done(function(resultado) {		 
				
                    
             $(document).ready(function()
             {
                  $("#frm1").submit();
             }
             );
		})
		.fail(function (jqXHR, textStatus, errorThrown) {
        alert("Hubo un error en el sistema, intente más tarde");
    }); 
    return true;
}
function Suspender(usuario,estado)
{   
     $.ajax({
        		type: 'POST',url:"clases/empleado.php",dataType:"text",data:"usuario="+usuario+"&estado="+estado,async:true})			
				
				.done(function(resultado) {		 
                
                   window.location.assign("empleados.php");
				
		})
		.fail(function (jqXHR, textStatus, errorThrown) {
        alert("Hubo un error en el sistema, intente más tarde");
    }); 

}

function Despedir(usuario)
{
    
     $.ajax({
        		type: 'POST',url:"clases/empleado.php",dataType:"text",data:"usuario="+usuario+"&desp="+'1',async:true})			
				
				.done(function(resultado) {		 
                console.log(resultado);
                  window.location.assign("empleados.php");
				
		})
		.fail(function (jqXHR, textStatus, errorThrown) {
        alert("Hubo un error en el sistema, intente más tarde");
    }); 
}


function BackColor(element,color)
{
 var elemento = $('#'+element).css("background-color",color);
}

function logout()
{
    
    $.ajax({
         type: 'POST',//GET o POST. GET DEFAULT.
        url: "administrar.php",//PAGINA DESTINO DE LA PETICION
        dataType: "text",//INDICA EL TIPO QUE SE ESPERA RECIBIR DESDE EL SERVIDOR (XML, HTML, TEXT, JSON, SCRIPT) 
        data: "&op="+"logout",//DATO A SER ENVIADO AL SERVIDOR. TIPO: OBJETO, STRING, ARRAY.
        async: true
    })
   .done(function (resultado) {//RECUPERO LA RESPUESTA DEL SERVIDOR EN 'RESULTADO', DE ACUERDO AL DATATYPE.
		
        if(resultado=="OK")
       window.location.href="index.php";
       
	})
	.fail(function (jqXHR, textStatus, errorThrown) {
        alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
    });  
}

function Color()
{
 $color=$("#col").val();
     $.ajax({
         type: 'POST',//GET o POST. GET DEFAULT.
        url: "administrar.php",//PAGINA DESTINO DE LA PETICION
        dataType: "text",//INDICA EL TIPO QUE SE ESPERA RECIBIR DESDE EL SERVIDOR (XML, HTML, TEXT, JSON, SCRIPT) 
        data:"color="+$color+"&op="+"color",//DATO A SER ENVIADO AL SERVIDOR. TIPO: OBJETO, STRING, ARRAY.
        async: true
    })
   .done(function (resultado) {//RECUPERO LA RESPUESTA DEL SERVIDOR EN 'RESULTADO', DE ACUERDO AL DATATYPE.
		
        if(resultado=="OK")
     window.location.href=window.location.href;
       
	})
	.fail(function (jqXHR, textStatus, errorThrown) {
        alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
    });  
}
/*
function TraerAutos(){

    var pagina = "http://localhost/ESTACIONAMIENTO_2017/apirest/auto";// REVISAR !!!

    $.ajax({
        type: 'GET',
        url: pagina,
        dataType: "json",
        async: true
    })
    .done(function (objJson) {

        var tablaEncabezado = "<table border='1' class='table'>";
        tablaEncabezado += "<tr><th>PATENTE</th><th>COCHERA</th><th>INGRESO</th><th>EGRESO</th><th>PAGO</th></tr>";
        var tablaCuerpo = "";
        var tablaPie = "</tr></html>";

        for(var i=0;i<objJson.length;i++){
            tablaCuerpo += "<tr><td>"+objJson[i].id+"</td><td>"+objJson[i].titel;
            tablaCuerpo += "</td><td>"+objJson[i].interpret+"</td><td>"+objJson[i].jahr;
            tablaCuerpo += "</td><td><img height='50px' width='50px' src='../fotos/"+objJson[i].titel+".jpg'>";
            tablaCuerpo += "</td><td><a href='#' data-id='"+objJson[i].id+"' onclick='administrarModificar("+objJson[i].id+")' data-toggle='modal' data-target='#myModal' class='open-Modal'>MODIFICAR</a>&nbsp;";
            tablaCuerpo += "&nbsp;<a href='#' onclick='eliminar("+objJson[i].id+")'>ELIMINAR</a></td></tr>";
        }

        $("#divTabla").html(tablaEncabezado+tablaCuerpo+tablaPie);

    })
    .fail(function (jqXHR, textStatus, errorThrown) {
        alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
    });    

}*/

function TraerLogin()
{
    var pagina = "http://stellisano.esy.es/login";// REVISAR !!!

    $.ajax({
        type: 'GET',
        url: pagina,
        dataType: "json",
        async: true
    })
    .done(function (objJson) {

        var tablaEncabezado =  "<h1 style='text-align:center'>Logins de Usuarios</h1>"+"<table style='width:25%;text-align:center; margin-left:auto; margin-right:auto; class='table'>";
        tablaEncabezado += "<tr style='background-color:black;color:lightgreen;text-align:center'><th style='text-align:center'>USUARIO</th><th style='text-align:center'>DIA Y HORA DE LOGIN</th></tr>";
        var tablaCuerpo = "";
        
        for(var i=0;i<objJson.length;i++){

            tablaCuerpo += "<tr style='background-color:lightblue'><td class='info'>"+objJson[i].usuario+"</td><td class='info'>"+objJson[i].hora+"</td></tr>";
            
             
        }

        tablaCuerpo+="</table>";
        
        $("#divTabla").html(tablaEncabezado+tablaCuerpo);

    })
    .fail(function (jqXHR, textStatus, errorThrown) {
        console.log(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
    });    

}

function CambiarPass(usuario)
{
     var pagina = "http://stellisano.esy.es/emp";

    var formData = new FormData();
	
	formData.append("usuario",usuario);
    formData.append("contrasenia",$("#contraseniax").val());
    $.ajax({
       type: 'POST',
        url: pagina,
        dataType: "json",
		cache: false,
		contentType: false,
		processData: false,
        data: formData,
        async: true
    })
    .done(function (objJson) {

       // $("#id").val(objJson[0].id);
       alert("Contraseña Cambiada");
               location.reload();


    })
    .fail(function (jqXHR, textStatus, errorThrown) {
       alert("Contraseña Cambiada");
       location.reload();
    });    
}

function AutosYCocheras()
{
    var pagina = "http://stellisano.esy.es/auto";// REVISAR !!!

    $.ajax({
        type: 'GET',
        url: pagina,
        dataType: "json",
        async: true
    })
    .done(function (objJson) {

        var tablaEncabezado =  "<h1 style='text-align:center'>Autos</h1>"+"<table class='table'>";
        tablaEncabezado += "<tr style='background-color:black;color:lightgreen'><th>PATENTE</th><th>COCHERA</th><th>INGRESO</th><th>EGRESO</th><th>PAGO</th></tr>";
        var tablaCuerpo = "";
        var listaAuto = objJson[0];
        for(var i=0;i<listaAuto.length;i++){
            
            tablaCuerpo += "<tr style='background-color:lightgreen'><td>"+listaAuto[i].patente+"</td><td>"+listaAuto[i].cochera+"</td><td>"+listaAuto[i].ingreso;
            
            tablaCuerpo += "</td><td>"+listaAuto[i].egreso+"</td><td>"+listaAuto[i].pago+"</td></tr>";
            
         
          
        }

        tablaCuerpo+="</table>";
        
        $("#divTabla").html(tablaEncabezado+tablaCuerpo);

console.log(objJson[1]);
         var tablaEncabezado2 =  "<h1 style='text-align:center'>Cocheras Utilizadas</h1>"+"<table class='table'>";
        tablaEncabezado2 += "<tr style='background-color:black;color:lightgreen'><th>NUMERO</th><th>AUTO</th><th>PISO</th><th>DISCAPACIDAD</th><th>CONTADOR USO</th></tr>";
        var tablaCuerpo2 = "";
        var cocheras = objJson[1];

        tablaCuerpo2+= "<tr><td style='background-color:yellow;text-align:center' colspan='5'>La cochera más utilizada es:</td></tr>";
       tablaCuerpo2 += "<tr style='background-color:lightgreen'><td>"+cocheras[0].numero+"</td><td>"+cocheras[0].auto+"</td><td>"+cocheras[0].piso;
       tablaCuerpo2 += "</td><td>"+cocheras[0].discapacidad+"</td><td>"+cocheras[0].contadorUso+"</td></tr>";
        tablaCuerpo2+= "<tr></tr>";

       tablaCuerpo2+= "<tr><td style='background-color:yellow;text-align:center' colspan='5'>La cochera menos utilizada es:</td></tr>";
       tablaCuerpo2 += "<tr style='background-color:IndianRed'><td>"+cocheras[1].numero+"</td><td>"+cocheras[1].auto+"</td><td>"+cocheras[1].piso;
       tablaCuerpo2 += "</td><td>"+cocheras[1].discapacidad+"</td><td>"+cocheras[1].contadorUso+"</td></tr>";
 tablaCuerpo2+= "<tr></tr>";
tablaCuerpo2+= "<tr><td style='background-color:yellow;text-align:center' colspan='5'>Las cocheras que no fueron utilizadas son:</td></tr>";
var list= cocheras[2];
        for(var i=0;i<list.length;i++){
            
          tablaCuerpo2 += "<tr style='background-color:IndianRed'><td>"+list[i].numero+"</td><td>"+list[i].auto+"</td><td>"+list[i].piso;
       tablaCuerpo2 += "</td><td>"+list[i].discapacidad+"</td><td>"+list[i].contadorUso+"</td></tr>";
            
         
          
        }

        tablaCuerpo2+="</table>";
        
        $("#divTabla2").html(tablaEncabezado2+tablaCuerpo2);

    })
    .fail(function (jqXHR, textStatus, errorThrown) {
        console.log(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
    });    

}

function TraerCocheras(){

    var pagina = "http://stellisano.esy.es/cochera";// REVISAR !!!

    $.ajax({
        type: 'GET',
        url: pagina,
        dataType: "json",
        async: true
    })
    .done(function (objJson) {

        var tablaEncabezado = "<table class='table'>";
        tablaEncabezado += "<tr style='background-color:black;color:lightgreen'><th>NUMERO</th><th>AUTO</th><th>PISO</th><th>DISCAPACIDAD</th><th>CONTADOR USO</th><th>ACCION</th></tr>";
        var tablaCuerpo = "";

        for(var i=0;i<objJson.length;i++){
            if(objJson[i].auto==null)
            tablaCuerpo += "<tr style='background-color:lightgreen'><td>"+objJson[i].numero+"</td><td>"+objJson[i].auto+"</td><td>"+objJson[i].piso;
            else
            tablaCuerpo += "<tr style='background-color:IndianRed'><td>"+objJson[i].numero+"</td><td><a href='#' onclick='VerAuto(\""+objJson[i].auto+"\")' data-toggle='modal'  data-target='#myModal2' class='open-Modal'>"+objJson[i].auto+"</a></td><td>"+objJson[i].piso;
            if(objJson[i].discapacidad==1)
            tablaCuerpo += "</td><td style='color:white'>"+objJson[i].discapacidad+"</td><td>"+objJson[i].contadorUso;
            else
            tablaCuerpo += "</td><td>"+objJson[i].discapacidad+"</td><td>"+objJson[i].contadorUso;
            tablaCuerpo += "</td><td><a class='btn btn-success' href='#' data-id='"+objJson[i].numero+"' onclick='administrarModificar("+objJson[i].numero+")' data-toggle='modal'  data-target='#myModal' class='open-Modal'>Insertar Auto</a>&nbsp;";
            tablaCuerpo += "&nbsp;<a class='btn btn-danger' href='#' data-toggle='modal'  data-target='#myModal3' class='open-Modal' onclick='Egresar(\""+objJson[i].auto+"\")'>Egreso</a></td></tr>";
          
        }

        tablaCuerpo+="</table>";
        
        $("#divTabla").html(tablaEncabezado+tablaCuerpo);

    })
    .fail(function (jqXHR, textStatus, errorThrown) {
        alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
    });    



}


function administrarModificar(id){

    var pagina = "http://stellisano.esy.es/cochera/"+id;

    $.ajax({
        type: 'GET',
        url: pagina,
        dataType: "json",
        async: true
    })
    .done(function (objJson) {

       // $("#id").val(objJson[0].id);
       console.log(objJson);
       $("#cochera").val(objJson[0].numero);
       

    })
    .fail(function (jqXHR, textStatus, errorThrown) {
        alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
    });    
}

function VerAuto(patente){

    var pagina = "http://stellisano.esy.es/auto/"+patente;

    $.ajax({
        type: 'GET',
        url: pagina,
        dataType: "json",
        async: true
    })
    .done(function (objJson) {

       // $("#id").val(objJson[0].id);
       console.log(objJson);
       $("#cochera2").val(objJson[0].cochera);
       $("#patente2").val(objJson[0].patente);
       $("#color2").val(objJson[0].color);
       $("#marca2").val(objJson[0].marca);
       $("#ingreso2").val(objJson[0].ingreso);

       var origen = "./fotos/"+objJson[0].foto;
       if(origen!="./fotos/")
       document.getElementById("foto2").src = origen;
       

       document.getElementById("foto2").style.height = "100px";
       document.getElementById("foto2").style.width = "100px";


    })
    .fail(function (jqXHR, textStatus, errorThrown) {
        alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
    });    
}



function modificar(){

  /*  if(!confirm("Seguro de insertar?"))
        return;*/

    var pagina = "http://stellisano.esy.es/auto";
    
	var foto = $("#archivo").val();
    var formData = new FormData();
	formData.append("cochera",$("#cochera").val());
	formData.append("patente",$("#patente").val());
	formData.append("color",$("#color").val());
    formData.append("marca",$("#marca").val());
    if(foto!=="")
    {
        var archivo = $("#archivo")[0];  	
	    formData.append("foto",archivo.files[0]);
    }else
    {
        formData.append("foto",null);
    }
	



    $.ajax({
        type: 'POST',
        url: pagina,
        dataType: "json",
		cache: false,
		contentType: false,
		processData: false,
        data: formData,
        async: true
    })
    .done(function (objJson) {

       /* $("#divMensaje").css("display", "block");
        $("#spanMensaje").removeClass("label label-danger");
        $("#spanMensaje").addClass("label label-success");
        $("#spanMensaje").html("Elemento modificado exitosamente!!!");
        $("#btnModificar").css("display", "none");*/

       location.reload();

    })
    .fail(function (jqXHR, textStatus, errorThrown) {
      
      location.reload();
    });    

}

function LoginEm(usuario)
{
     var pagina = "http://stellisano.esy.es/login/"+usuario;

    $.ajax({
        type: 'POST',
        url: pagina,
        dataType: "json",
        async: true
    })
    .done(function (objJson) {

  

    })
    .fail(function (jqXHR, textStatus, errorThrown) {
        alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
    });    
}

function Egresar(patente){

    if(!confirm("Seguro de eliminar el elemento con patente="+patente+"?"))
        return;

    var pagina = "http://stellisano.esy.es/auto/"+patente;

    $.ajax({
        type: 'DELETE',
        url: pagina,
        dataType: "json",
        
        async: true
    })
    .done(function (objJson) {

             console.log(objJson);
       $("#cochera3").val(objJson.cochera);
       $("#patente3").val(objJson.patente);
       $("#color3").val(objJson.color);
       $("#marca3").val(objJson.marca);
       $("#ingreso3").val(objJson.ingreso);
       $("#egreso3").val(objJson.egreso);
       $("#pago3").val(objJson.pago);


       var origen = "./fotos/"+objJson.foto;
       if(origen!="./fotos/")
       document.getElementById("foto3").src = origen;
       

       document.getElementById("foto3").style.height = "100px";
       document.getElementById("foto3").style.width = "100px";

    })
    .fail(function (jqXHR, textStatus, errorThrown) {
             location.reload();
    });    

}