<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require_once './vendor/autoload.php';
require_once './clases/AccesoDatos.php';
require_once './clases/auto.php';
require_once './clases/empleado.php';
require_once './clases/cochera.php';


$config['displayErrorDetails'] = true;
$config['addContentLengthHeader'] = false;
/*

¡La primera línea es la más importante! A su vez en el modo de 
desarrollo para obtener información sobre los errores
 (sin él, Slim por lo menos registrar los errores por lo que si está utilizando
  el construido en PHP webserver, entonces usted verá en la salida de la consola 
  que es útil).

  La segunda línea permite al servidor web establecer el encabezado Content-Length, 
  lo que hace que Slim se comporte de manera más predecible.
*/

$app = new \Slim\App(["settings" => $config]);

//IMPLEMENTAR
//GET -> TRAER TODOS
$app->get('/auto', function(Request $request, Response $response) {
 $obj = Auto::TraerTodos();
 $cocheras= Cochera::UsoCocheras();
 $ListaObj= array();
 array_push($ListaObj,$obj);
 array_push($ListaObj,$cocheras);
     
	$response->getBody()->write(json_encode($ListaObj));

    return $response;
});

$app->post('/emp[/]', function(Request $request, Response $response) {
 $array=$request->getParsedBody();
 
Empleado::ModificarBase($array["usuario"],$array["contrasenia"]);
    

    $response->getBody()->write("Cambiada la contraseña");

    return $response;
});

$app->get('/login', function(Request $request, Response $response) {

 $obj= Empleado::TraerLogins();
 
     
	$response->getBody()->write(json_encode($obj));

    return $response;
});
//GET -> TRAER UNO
$app->get('/auto/{patente}', function(Request $request, Response $response) {
 $patente=$request->getAttribute('patente');
 
 $obj = Auto::TraerPorPatente($patente);
     
	$response->getBody()->write(json_encode($obj));

    return $response;
});
//POST -> INSERTAR (CON FOTO)
$app->post('/auto[/]', function(Request $request, Response $response) {
 $array=$request->getParsedBody();
 
 $miauto;

  	$archivos = $request->getUploadedFiles();
      if($archivos["foto"]!=NULL)
      {
          $destino= "./fotos/";
    	$nombreAnterior=$archivos['foto']->getClientFilename();
    	$extension= explode(".", $nombreAnterior);
	    $extension=array_reverse($extension);

  	    $archivos['foto']->moveTo($destino.$array["patente"].".".$extension[0]);
        $miauto=new Auto($array["cochera"],$array["patente"],$array["color"],$array["marca"],$array["patente"].".".$extension[0]);
      Auto::GuardarEnBase($miauto,$_SESSION["usuario"]);
      }else
      {
          $miauto=new Auto($array["cochera"],$array["patente"],$array["color"],$array["marca"],NULL);
      Auto::GuardarEnBase($miauto,$_SESSION["usuario"]);
          
      }
    

    $response->getBody()->write(json_encode($miauto));

    return $response;
});

$app->post('/login/{usuario}', function(Request $request, Response $response) {
 $usuario=$request->getAttribute("usuario");
  $obj = Empleado::LoginEmp($usuario);
     
	$response->getBody()->write(json_encode($obj));

    return $response;
});
//PUT -> MODIFICAR
/*$app->put('/apirest/auto[/]', function(Request $request, Response $response) {
 $array=$request->getParsedBody();
 
 
cd::Actualizar($array["id"],$array["titulo"],$array["anio"],$array["cantante"],NULL);
     
	$response->getBody()->write("Consulte su base de datos para ver los cambios");

    return $response;
});*/
//DELETE -> ELIMINAR
$app->delete('/auto/{patente}', function(Request $request, Response $response) {
 $patente=$request->getAttribute('patente');
 $costos=array();
 $costos["estadia"]=170;
 $costos["mestadia"]=90;
 $costos["hora"]=10;
 $obj=Auto::Egreso($patente,$_SESSION["usuario"],$costos);
     
	$response->getBody()->write(json_encode($obj));

    return $response;
});


// ACA

$app->get('/cochera', function(Request $request, Response $response) {
 $obj = Cochera::TraerTodos();
     
	$response->getBody()->write(json_encode($obj));

    return $response;
});
//GET -> TRAER UNO
$app->get('/cochera/{numero}', function(Request $request, Response $response) {
 $numero=$request->getAttribute('numero');
 
 $obj = Cochera::TraerPorNumero($numero);
     
	$response->getBody()->write(json_encode($obj));

    return $response;
});
//POST -> INSERTAR 
$app->post('/cochera[/]', function(Request $request, Response $response) {
 $array=$request->getParsedBody();

     $micochera=new Cochera(intval($array["piso"]),intval($array["discapacidad"]),intval($array["numero"]));
    Cochera::AgregarCochera($micochera);
	
    $response->getBody()->write(json_encode($micochera));

    return $response;
});
/*
//DELETE -> ELIMINAR
$app->delete('/auto/{id}', function(Request $request, Response $response) {
 $patente=$request->getAttribute('patente');
 $costos["estadia"]=170;
 $costos["mestadia"]=90;
 $costos["hora"]=10;
 Auto::Egreso($patente,$_SESSION["usuario"],$costos);
     
	$response->getBody()->write("Consulte su base de datos para ver los cambios");

    return $response;
});*/

$app->run();