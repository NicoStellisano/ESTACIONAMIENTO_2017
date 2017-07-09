<?php
require_once "verificarAdmin.php"; 


?>
<!DOCTYPE html>
<html>
    <head>
 <meta charset="utf-8" />
         <title>Operaciones</title>
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
   <body onload="TraerCocheras()" data-spy="scroll" data-target=".navbar" data-offset="50" style="
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




<br>
 
<br>


<div id="divTabla"></div>

<div id="myModal" class="modal fade" role="dialog"  >
  <div class="modal-dialog" style="left:0%" >

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Insertar</h4>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
       <table class="table" style='border:none; text-align: left;'>
            <tr style='border:none'><td style='border:none'><input type="text" placeholder="Cochera" name="cochera" id="cochera" disabled></td></tr>
            <tr style='border:none'><td style='border:none'><input type="text" placeholder="Patente" name="patente" id="patente"></td></tr>
            <tr style='border:none'><td style='border:none'><input type="color" placeholder="Color" name="color" id="color"></td></tr>
            <tr style='border:none'><td style='border:none'><input type="text" placeholder="Marca" name="marca" id="marca"></td></tr>
           <tr style='border:none;text-align:right;'><td style='border:none;text-align:right;'><input style="text-align:right;" type="file" id="archivo" name="archivo"></td> </tr>
            <tr style='border:none'><td style='border:none'><input type="button" id="enviar" value="Insertar" onclick="modificar()"></td> </tr>

        </table>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


<div id="myModal2" class="modal fade" role="dialog"  >
  <div class="modal-dialog" style="left:0%" >

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Ver Auto</h4>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
       <table class="table" style='border:none; text-align: left;'>
            <tr style='border:none'><td style='border:none'>Cochera</td><td style='border:none'><input type="text" placeholder="Cochera" name="cochera2" id="cochera2" disabled></td></tr>
            <tr style='border:none'><td style='border:none'>Patente</td><td style='border:none'><input type="text" placeholder="Patente" name="patente2" id="patente2" disabled></td></tr>
            <tr style='border:none'><td style='border:none'>Color</td><td style='border:none'><input type="color" placeholder="Color" name="color2" id="color2" disabled></td></tr>
            <tr style='border:none'><td style='border:none'>Marca</td><td style='border:none'><input type="text" placeholder="Marca" name="marca2" id="marca2" disabled></td></tr>
            <tr style='border:none'><td style='border:none'>Foto</td><td style='border:none'><img  name="foto2" id="foto2" disabled></td></tr>
            <tr style='border:none'><td style='border:none'>Ingreso</td><td style='border:none'><input type="text" placeholder="Ingreso" name="ingreso2" id="ingreso2" disabled></td></tr>
           

        </table>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<div id="myModal3" class="modal fade" role="dialog"  >
  <div class="modal-dialog" style="left:0%" >

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Ver Auto</h4>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
       <table class="table" style='border:none; text-align: left;'>
            <tr style='border:none'><td style='border:none'>Cochera</td><td style='border:none'><input type="text" placeholder="Cochera" name="cochera3" id="cochera3" disabled></td></tr>
            <tr style='border:none'><td style='border:none'>Patente</td><td style='border:none'><input type="text" placeholder="Patente" name="patente3" id="patente3" disabled></td></tr>
            <tr style='border:none'><td style='border:none'>Color</td><td style='border:none'><input type="color" placeholder="Color" name="color3" id="color3" disabled></td></tr>
            <tr style='border:none'><td style='border:none'>Marca</td><td style='border:none'><input type="text" placeholder="Marca" name="marca3" id="marca3" disabled></td></tr>
            <tr style='border:none'><td style='border:none'>Foto</td><td style='border:none'><img  name="foto3" id="foto3" disabled></td></tr>
            <tr style='border:none'><td style='border:none'>Ingreso</td><td style='border:none'><input type="text" placeholder="Ingreso" name="ingreso3" id="ingreso3" disabled></td></tr>
            <tr style='border:none'><td style='border:none'>Egreso</td><td style='border:none'><input type="text" placeholder="Egreso" name="egreso3" id="egreso3" disabled></td></tr>
            <tr style='border:none'><td style='border:none'>Pago</td><td style='border:none'><input type="text" placeholder="Pago" name="pago3" id="pago3" disabled></td></tr>
            <tr style='border:none'><td style='border:none'><input type="button" id="enviar" value="Aceptar" onclick="location.reload();"></td> </tr>

             

        </table>
        </div>
      </div>
      <div class="modal-footer">
        
      </div>
    </div>

  </div>
</div>


</body>

</html>

