function Registro()
{
    var nombre = $("#nombre").val();
    var apellido= $("#apellido").val();
    var contraseña= $("#contraseña").val();
    var email= $("#mail").val();
    var pais= $("#pais").val();
    var user={"nombre":nombre,"apellido":apellido,"contraseña":contraseña,"email":email,"pais":pais};
    

    $.ajax({
        		type: 'POST',url:"admin.php",dataType:"text",data:{Usuario:user},async:true})			
				
				.done(function(resultado) {		 
				if(resultado==true)
                {

                }else{

                }
				
		})
		.fail(function (jqXHR, textStatus, errorThrown) {
        alert("Hubo un error en el sistema, intente más tarde");
    }); 
    return true;
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
      alert("Exito");
       
	})
	.fail(function (jqXHR, textStatus, errorThrown) {
        alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
    });  
}