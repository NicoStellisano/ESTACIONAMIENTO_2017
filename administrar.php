<?php
switch($_POST["op"])
{
   
    case "logout":
    session_start();
    session_destroy();
    echo "OK";
    break;

    case "color":
    session_start();
    setcookie("ColorCookie-".$_SESSION["usuario"],$_POST["color"],time()+3600);
    
    echo "OK";
    break;

default:
echo "NO OK";
break;
}


?>