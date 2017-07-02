<<<<<<< HEAD
<?php session_start(); ?>
<!DOCTYPE html>

<html>
    <head>
 <meta charset="utf-8" />
         <title>Login</title>
=======
﻿<!DOCTYPE html>
<html>
    <head>
 <meta charset="utf-8" />
         <title>Registro</title>
>>>>>>> origin/master
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
<<<<<<< HEAD
  
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
=======
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
      <form class="navbar-form navbar-left">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button style="color:white;background-color:#191919;border-color:grey;" onmouseover="BackColor(this.id,'black')" id="Buscar" onmouseout="BackColor(this.id,'#191919')" type="submit" class="btn btn-default">Buscar</button>
      </form>
     <ul class="nav navbar-nav navbar-right">

        <li ><a style="color:white;padding-bottom: 11px" href="registro.html" onmouseover="BackColor(this.id,'black')" id="Registrarse" onmouseout="BackColor(this.id,'#191919')"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>  Registrarse</a></li> 
<<<<<<< HEAD
       <li style="padding-right:65px"><button  onclick="window.location.href='login.php'" onmouseover="BackColor(this.id,'black')" id="Login" onmouseout="BackColor(this.id,'#191919')" style="background-color:#191919;border-color:grey;border-style:solid;border-width:1px;color:white" class="btn btn-default navbar-btn" ><strong><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Iniciar Sesión </strong></button></li>
=======
       <li style="padding-right:65px"><button  onclick="window.location.href='login.html'" onmouseover="BackColor(this.id,'black')" id="Login" onmouseout="BackColor(this.id,'#191919')" style="background-color:#191919;border-color:grey;border-style:solid;border-width:1px;color:white" class="btn btn-default navbar-btn" ><strong><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Iniciar Sesión </strong></button></li>
>>>>>>> origin/master
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<div class="container-fluid">
    <div class="row row-centered">
      <div class="col-md-12">- </div>
      <div class="col-md-12">- </div>
      <div class="col-md-12">- </div>
        <div class="col-md-offset-3 col-md-6 col-md-offset-3" style="background-color:#141414;border-style: solid; border-color: grey;">
          <h1 style="text-align:center;font-family: 'Verdana';color:white"><strong>Noticias</strong></h1>
          <div  style="border-style: dotted;;background-color:white;"><blockquote style="border-left: 0;" class="blockquote">
            <h2 align="left" style="font-family: 'New Century Schoolbook, serif';font-weight: bold;color:#141414 ">Crisis en Santa Cruz: Cristina Kirchner se fue de Río Gallegos y se instaló en El Calafate</h2>
            <p class="mb-0" font-family="Times New Roman" style="text-align:center;font-family: 'Times New Roman', Times, serif;color:#141414"> <br>Desde el sábado por la tarde,
              Cristina Kirchner permaneció en su residencia de la calle Mascarello 441 en la costanera local, junto a su hija Florencia y su nieta Helena. 
              Transcurrieron doce horas hasta que regresó a su propiedad. El viernes por la noche estuvo en la residencia de su cuñada y mandataria provincial, 
              acompañada de la beba de 18 meses y dos mujeres más que trabajan en la residencia.<br><br>

              La manifestación reclamando por la crisis que vive Santa Cruz, 
              tuvo su momento de mayor tensión cuando un grupo de manifestantes ingresaron a los jardines de la propiedad.
              Fueron varios minutos de enfrentamiento con la policía provincial, que terminó con tres heridos de balas de gomas y destrozos en la casa.
              Recién el sábado por la tarde, la ex Mandataria volvió a su chalet.
              </p><footer class="blockquote-footer">Nicolás Stellisano</footer> </blockquote>
         </div>

          <div  style="border-style: dotted;;background-color:white;"><blockquote class="blockquote" style="border-left: 0;">
            <h2 align="left" style="font-family: 'New Century Schoolbook, serif';font-weight: bold;color:#141414 ">Para Diego Maradona "hay que meter una granada en la AFA y hacerla toda nueva"</h2>
            <p class="mb-0" font-family="Times New Roman" style="text-align:center;font-family: 'Times New Roman', Times, serif;color:#141414"> <br>También le tiró a Sebastián Verón,
              con quien había discutido en el entretiempo del último partido que organizó el Papa Francisco en Roma,
              en octubre de 2016: "Le digo a (Daniel) Angelici que Verón no está capacitado para ser director de selecciones nacionales.
              No sé si hay que designar a un exjugador, pero sí a alguien que sepa elegir jugadores de cada categoría y enseñe".
              Y añadió: "No creo que ningún jugador pueda hoy, a través de su conocimiento, meterse en la AFA. Sí puede dar consejos".<br><br>

              Con respecto a la Selección, Maradona dijo que "lo de (Jorge) Sampaoli está inflado", y agregó: "Estamos jodidos sin Messi.
               Pero el jugador argentino siempre tiene un plus. Confío en eso". "Yo ya hice carrera y me divertí mucho adentro de la cancha.
                Ahora Messi tiene que hacer lo mismo. No hay comparación", aclaró luego en declaraciones a radio Rivadavia.
              </p><footer class="blockquote-footer">Nicolás Stellisano</footer> </blockquote>
         </div>


      </div>  
  </div>
</div>

    </body>

</html>
>>>>>>> origin/master
