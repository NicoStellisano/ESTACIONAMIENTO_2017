<?php
session_start();
if(!isset($_SESSION["usuario"]) || !isset($_SESSION["admin"]))
{
    header("location:index.php");
}
?>