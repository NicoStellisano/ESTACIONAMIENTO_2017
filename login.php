<!DOCTYPE html>
<html>
    <head>
 <meta charset="utf-8" />
         <title>Registro</title>
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
   <body data-spy="scroll" data-target=".navbar" data-offset="50">

        <nav class="navbar navbar-inverse navbar-fixed-top" style="height:50px;border-color:grey;border-style:dotted;border-width:2px;background-color:#191919" role="navigation" >
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <!-- <a class="navbar-brand" href="index.html">
        <img class="img-circle" width="50" height="30" src="https://s-media-cache-ak0.pinimg.com/736x/33/b8/69/33b869f90619e81763dbf1fccc896d8d.jpg" >
      </a>-->
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li ><a style="color:white;padding-bottom: 11px" href="index.html" id="Inicio" onmouseover="BackColor(this.id,'black')" onmouseout="BackColor(this.id,'#191919')"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>  Inicio <span class="sr-only">(current)</span></a></li>
        <li><a style="color:white;padding-bottom: 11px" href="productos.html" id="Productos" onmouseover="BackColor(this.id,'black')" onmouseout="BackColor(this.id,'#191919')">Productos <span class="sr-only">(current)</span></a></li>
        <li><a style="color:white;padding-bottom: 11px" href="contacto.html" id="Contacto" onmouseover="BackColor(this.id,'black')" onmouseout="BackColor(this.id,'#191919')">Contacto<span class="sr-only">(current)</span></a></li>
        <li class="dropdown">
          <a style="color:white;padding-bottom: 11px" class="dropdown-toggle" data-toggle="dropdown" id="Carreras" onmouseover="BackColor(this.id,'black')" onmouseout="BackColor(this.id,'#191919')" role="button" aria-haspopup="true" aria-expanded="false">Carreras <span class="caret" style="color:lawngreen;"></span></a>
          <ul class="dropdown-menu" style="background-color:#191919;">                  
            <li><a style="color:white;background-color:#191919" onmouseover="BackColor(this.id,'black')" onmouseout="BackColor(this.id,'#191919')" id="Programacion" href="programacion.html">Programación</a></li>
            <li style="background-color:white;" role="separator" class="divider"></li>
            <li><a style="color:white;background-color:#191919" onmouseover="BackColor(this.id,'black')" onmouseout="BackColor(this.id,'#191919')" id="Sociologia" href="sociologia.html">Sociología</a></li>
          </ul>
        </li>
      </ul>
      <form class="navbar-form navbar-left" >
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button style="color:white;background-color:#191919;border-color:grey;" onmouseover="BackColor(this.id,'black')" id="Buscar" onmouseout="BackColor(this.id,'#191919')" type="submit" class="btn btn-default">Buscar</button>
      </form>
     <ul class="nav navbar-nav navbar-right">

        <li ><a style="color:white;padding-bottom: 11px" href="registro.html" onmouseover="BackColor(this.id,'black')" id="Registrarse" onmouseout="BackColor(this.id,'#191919')"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>  Registrarse</a></li> 
       <li style="padding-right:65px"><button  onclick="window.location.href='login.html'" onmouseover="BackColor(this.id,'black')" id="Login" onmouseout="BackColor(this.id,'#191919')" style="background-color:#191919;border-color:grey;border-style:solid;border-width:1px;color:white" class="btn btn-default navbar-btn" ><strong><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Iniciar Sesión </strong></button></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
  <div class="container">
  <div class="row">
    <div class="col-md-offset-4 col-md-4 col-md-offset-4 col-xs-offset-3 col-xs-6 col-xs-offset-3" style="color:#141414;background-color:white;border-style: solid; border-color: grey;">
  <form action="login.php" method="post">
      <h3 style="text-align:center;font-family: 'Verdana';color:#141414;"><b>Login</b></h3><br>
    <div class="col-md-offset-2 col-md-4 col-xs-offset-2 col-xs-3"> <b style="text-align:center">Apellido:</b></div><div><input type="text" name="apellido" required ></div><br>
    <div class="col-md-offset-2 col-md-4 col-xs-offset-2 col-xs-3"> <b style="text-align:center">Contraseña:</b></div><div><input type="password" name="contraseña" required ></div>

      
				<br>
           <div class="col-md-offset-5 col-md-7"> <input style="color:white;background-color:#191919;border-color:grey;" type="submit" value="Entrar"></div><br>
</form>
<br>
</div>
</div>
</div>
	<?php
if(isset($_POST['apellido']) && isset($_POST['contraseña'])){
		require_once('./SERVIDOR/lib/nusoap.php');
		require_once('AccesoDatos.php');
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
		$cds = $client->call('UsuarioExistente', array($_POST['apellido'],$_POST['contraseña']));

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
          session_start();
          $_SESSION["usuario"]=$cds[0];
          	//	var_dump($_SESSION);
/*
          if($cds[2]==0)
        header("Location: ./principal.php");
        else
        {
          $_SESSION["admin"]=1;
           header("Location: ./principalAdmin.php");
        }*/
       
        }
			
		}
    }
}
	?>
   </body>
   </html>