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