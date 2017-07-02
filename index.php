<?php session_start(); ?>
<!DOCTYPE html>

<html>
    <head>
 <meta charset="utf-8" />
         <title>Login</title>
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
  </style><!--background-size: cover;  Para expander la imagen background-image: url("http://www.fondos7.net/thumbs/9812_2.jpg"  background-attachment: fixed;);-->
    </head> 
  
  <div class="container">
  <div class="row">
    <div class="col-md-offset-4 col-md-4 col-md-offset-4 col-xs-offset-3 col-xs-6 col-xs-offset-3" style="color:#141414;background-color:white;border-style: solid; border-color: grey;">
  <form action="index.php" method="post">
      <h3 style="text-align:center;font-family: 'Verdana';color:#141414;"><b>Login</b></h3><br>
    <div class="col-md-offset-2 col-md-4 col-xs-offset-2 col-xs-3"> <b style="text-align:center">Usuario:</b></div><div><input type="text" name="usuario" required ></div><br>
    <div class="col-md-offset-2 col-md-4 col-xs-offset-2 col-xs-3"> <b style="text-align:center">Contraseña:</b></div><div><input type="password" name="contraseña" required ></div>

      
				<br>
           <div class="col-md-offset-5 col-md-7"> <input style="color:white;background-color:#191919;border-color:grey;" type="submit" value="Entrar"></div><br>
</form>
<br>
</div>
</div>
</div>
	<?php
if(isset($_POST['usuario']) && isset($_POST['contraseña'])){
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
		$cds = $client->call('UsuarioExistente', array($_POST['usuario'],$_POST['contraseña']));
//print_r($client);

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
          
          $_SESSION["usuario"]=$cds[0];
          	//	var_dump($_SESSION);

          if($cds[2]==0)
       // header("Location: ./principal.php");
die("<script>location.href = 'http://localhost/ESTACIONAMIENTO_2017/principal.php'</script>");       
 else
        {
          $_SESSION["admin"]=1;
        //   header("Location: ./principalAdmin.php");
           die("<script>location.href = 'http://localhost/ESTACIONAMIENTO_2017/principalAdmin.php'</script>");
        }
       
        }
			
		}
    }
}
	?>
   </body>
   </html>