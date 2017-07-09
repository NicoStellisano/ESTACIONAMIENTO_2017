<?php
require_once "verificarAdmin.php"; 


?>
<!DOCTYPE html>
<html>
    <head>
 <meta charset="utf-8" />
         <title>Empleados</title>
        <script type="text/javascript" src="//code.jquery.com/jquery-latest.js"></script>

        <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">
<script type="text/javascript" src="funciones.js"></script>
  <style type="text/css">
  body
  {
      
     
       padding-top:70px;
      
  }
  table, th, td {
   border: 1px solid black;
   font-weight: bold;
}
  </style><!--background-size: cover;  Para expander la imagen background-image: url("http://www.fondos7.net/thumbs/9812_2.jpg"  background-attachment: fixed;);-->
    </head> 
   <body onload="TraerLogin()" data-spy="scroll" data-target=".navbar" data-offset="50" style="
 <?php 
 if(isset($_COOKIE['ColorCookie-'.$_SESSION['usuario']]))
{
    echo 'background-color:'.$_COOKIE['ColorCookie-'.$_SESSION['usuario']];
} ?>">

      <nav class="navbar navbar-inverse navbar-fixed-top" style="height:50px;border-color:grey;border-style:dotted;border-width:2px;background-color:#191919" role="navigation" >
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li ><a style="color:white;padding-bottom: 11px" href="principalAdmin.php" id="Inicio" onmouseover="BackColor(this.id,'black')" onmouseout="BackColor(this.id,'#191919')"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>  Inicio <span class="sr-only">(current)</span></a></li>
        <li><a style="color:white;padding-bottom: 11px" href="empleados.php" id="Empleados" onmouseover="BackColor(this.id,'black')" onmouseout="BackColor(this.id,'#191919')">Empleados <span class="sr-only">(current)</span></a></li>
             <li><a style="color:white;padding-bottom: 11px" href="autos.php" id="Autos" onmouseover="BackColor(this.id,'black')" onmouseout="BackColor(this.id,'#191919')">Autos<span class="sr-only">(current)</span></a></li>
             <li><a style="color:white;padding-bottom: 11px" href="opadmin.php" id="Operaciones" onmouseover="BackColor(this.id,'black')" onmouseout="BackColor(this.id,'#191919')">Operaciones<span class="sr-only">(current)</span></a></li>

      <form class="navbar-form navbar-left">
        <div class="form-group">


        <a class="btn" style="color:white;padding-bottom: 11px" onclick="logout()" onmouseover="BackColor(this.id,'black')" id="Logout" onmouseout="BackColor(this.id,'#191919')">  Salir</a>
      <span style="color:orange;background-color:#191919" >Bienvenido administrador <strong> <?php echo $_SESSION["usuario"]; ?></strong> </span>
     
      </form>
    
    </div>
  </div>
</nav>
<form action="empleados.php" method="post" name="frm2" id="frm2" >
   <table style='margin-left:auto; margin-right:auto;text-align:left;background-color:white' >
<tr><td><input type="text" placeholder="Usuario" name="usuario" id="usuario"></td></tr>
<tr><td><input type="text" placeholder="Apellido" name="apellido" id="apellido"></td></tr>
<tr><td><input type="password" placeholder="Contraseña" name="contrasenia" id="contrasenia"></td></tr>
<tr><td><select name="admin" id="admin">
  <option value="0">Empleado</option>
  <option value="1">Administrador</option></td></tr>


<tr><td><input type="submit" value="Agregar Empleado"></td></tr>

     </table>
<br>
</form>
<div id="divTabla"></div>
<br> <br>
  <form action="empleados.php" method="post" name="frm1" id="frm1" >
<input type="hidden" id="tabla" name="tabla">
<center><input type="submit" style='text-align:center' class="btn btn-info" value="Lista Empleados"></center>
</form>

<br>
 
<br>


<div id="divResultado"></div>
	<?php
if(isset($_POST['tabla'])|| isset($_POST['apellido'])){
		require_once('./SERVIDOR/lib/nusoap.php');
		require_once('clases/AccesoDatos.php');
		require_once('clases/empleado.php');

		$host = 'http://localhost/ESTACIONAMIENTO_2017/SERVIDOR/ws.php';
		
		$client = new nusoap_client($host . '?wsdl');
    $client->soap_defencoding = 'UTF-8';  

		$err = $client->getError();
		if ($err) {
			echo '<h2>ERROR EN LA CONSTRUCCION DEL WS:</h2><pre>' . $err . '</pre>';
			die();
		}

//INVOCO AL METODO DE MI WS		
$cds;
if(isset($_POST['tabla']))
{
		$cds = $client->call('Tabla', array());
} else if(isset($_POST['apellido']))
{
  
    	$cds = $client->call('Insertar', array($_POST['usuario'],$_POST['apellido'],$_POST['contrasenia'],$_POST['admin']));
}
        // var_dump($cds); // print_r($client);


		if ($client->fault) {
			echo '<h2>ERROR AL INVOCAR METODO:</h2><pre>';
			print_r($cds);
			echo '</pre>';
		} else {
			$err = $client->getError();
			if ($err) {
				echo '<h2>ERROR EN EL CLIENTE:</h2><pre>' . $err . '</pre>';
			} 
			else {
        if($cds!=NULL)
        {
          
         echo $cds;
          	//	var_dump($_SESSION);

         
       
        }
			
		}
    }
}
	?>
</body>
</html>