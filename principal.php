<?php
require_once "verificar.php"; 
var_dump($_SESSION["usuario"]);

?>
<html>
<head>
<meta charset="utf-8">
<<<<<<< HEAD
        <script type="text/javascript" src="//code.jquery.com/jquery-latest.js"></script>
=======
<script src="jquery.js" type="text/javascript"></script>
>>>>>>> origin/master
<script src="funciones.js" type="text/javascript"></script>
</head>
<body style="
 <?php 
 if(isset($_COOKIE['ColorCookie-'.$_SESSION['usuario']]))
{
    echo 'background-color:'.$_COOKIE['ColorCookie-'.$_SESSION['usuario']];
} ?>">
<br>
<input type="button" onclick="logout()" value="Salir"><br>
<input type="color" id="col"><input type="button" onclick="Color()" value="Aceptar">

<div id="divResultado"></div>
</body>
</html>
