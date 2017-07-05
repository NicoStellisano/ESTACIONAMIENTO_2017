




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

}
function agregar(){

    var pagina = "http://localhost:8080/apirest_ABM_conFoto/apirest/cd";
	var foto = $("#archivo").val();
	
	if(foto === "")
	{
		return;
	}

	var archivo = $("#archivo")[0];
	var formData = new FormData();
	formData.append("foto",archivo.files[0]);
	formData.append("titulo",$("#titulo").val());
	formData.append("cantante",$("#cantante").val());
	formData.append("anio",$("#año").val());

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

        alert("Elemento agregado exitosamente!!!");     
        window.location.assign("http://localhost:8080/apirest_ABM_conFoto/apirest/paginas/traerTodos.html");   

    })
    .fail(function (jqXHR, textStatus, errorThrown) {
    });    

}
function administrarModificar(id){

    var pagina = "http://localhost:8080/apirest_ABM_conFoto/apirest/cd/"+id;

    $.ajax({
        type: 'GET',
        url: pagina,
        dataType: "json",
        async: true
    })
    .done(function (objJson) {

       // $("#id").val(objJson[0].id);
       $("#id").val(objJson[0].id);
        $("#titulo").val(objJson[0].titel);
        $("#cantante").val(objJson[0].interpret);
        $("#año").val(objJson[0].jahr);

    })
    .fail(function (jqXHR, textStatus, errorThrown) {
        alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
    });    
}

function modificar(){

    if(!confirm("Seguro de modificar?"))
        return;

    var pagina = "http://localhost:8080/apirest_ABM_conFoto/apirest/cd/";

    $.ajax({
        type: 'PUT',
        url: pagina,
        dataType: "json",
        data: {
            id : $("#id").val(),
            titulo : $("#titulo").val(),
            anio : $("#año").val(),
            cantante : $("#cantante").val()
            
        },
        async: true
    })
    .done(function (objJson) {

       /* $("#divMensaje").css("display", "block");
        $("#spanMensaje").removeClass("label label-danger");
        $("#spanMensaje").addClass("label label-success");
        $("#spanMensaje").html("Elemento modificado exitosamente!!!");
        $("#btnModificar").css("display", "none");*/

        traerTodos();

    })
    .fail(function (jqXHR, textStatus, errorThrown) {
      
      window.location.assign(window.location.href);
    });    

}
function eliminar(id){

    if(!confirm("Seguro de eliminar el elemneto con id="+id+"?"))
        return;

    var pagina = "http://localhost:8080/apirest_ABM_conFoto/apirest/cd/"+id;

    $.ajax({
        type: 'DELETE',
        url: pagina,
        dataType: "json",
        
        async: true
    })
    .done(function (objJson) {

        traerTodos();
    })
    .fail(function (jqXHR, textStatus, errorThrown) {
        alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
    });    

}