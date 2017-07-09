<?php
require_once "verificar.php"; 

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
  </style><!--background-size: cover;  Para expander la imagen background-image: url("http://www.fondos7.net/thumbs/9812_2.jpg"  background-attachment: fixed;);-->
    </head> 
   <body data-spy="scroll" data-target=".navbar" data-offset="50" style="
 <?php 
 if(isset($_COOKIE['ColorCookie-'.$_SESSION['usuario']]))
{
    echo 'background-color:'.$_COOKIE['ColorCookie-'.$_SESSION['usuario']];
} ?>">

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
        <li ><a style="color:white;padding-bottom: 11px" href="principalAdmin.php" id="Inicio" onmouseover="BackColor(this.id,'black')" onmouseout="BackColor(this.id,'#191919')"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>  Inicio <span class="sr-only">(current)</span></a></li>
        <li><a style="color:white;padding-bottom: 11px" href="operaciones.php" id="Empleados" onmouseover="BackColor(this.id,'black')" onmouseout="BackColor(this.id,'#191919')">Operaciones <span class="sr-only">(current)</span></a></li>
     
      <form class="navbar-form navbar-left">
        <div class="form-group">


        <a class="btn" style="color:white;padding-bottom: 11px" onclick="logout()" onmouseover="BackColor(this.id,'black')" id="Logout" onmouseout="BackColor(this.id,'#191919')">  Salir</a>
      <span style="color:orange;background-color:#191919" >Bienvenido empleado <strong> <?php echo $_SESSION["usuario"]; ?></strong> </span>
     
      </form>
    
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<br>
<table class='table' style='width:35%' border='1'>
<tr>
<td><h3 style='font-weight:bold'>Elige tu color de fondo</h3></td>
<td><input type="color" id="col" onchange="Color()"></td></tr>



<tr><td colspan="2"><h2 style='font-weight:bold'>Cambio de contraseña</h2></td></tr>
<br>
<tr><td><h4>Contraseña nueva:</h4><input type='text' id='contraseniax' name='contraseniax' ></td>
<td><input type='button' value="Cambiar Contraseña" onclick="CambiarPass('<?php echo $_SESSION["usuario"];?>')"></td></tr>
</table>
<div id="divResultado"></div>
</body>
</html>