<?php
session_start();
if(!isset($_SESSION["usuario"]))
{
   
    
    header("location:index.php");
}

if(isset($_SESSION["admin"]))
{
    header("location:principalAdmin.php");
}
?>