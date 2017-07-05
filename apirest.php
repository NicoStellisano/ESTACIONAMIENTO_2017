<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require './vendor/autoload.php';
require './clases/AccesoDatos.php';
require './clases/auto.php';
require './clases/empleado.php';


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
$app->get('/apirest/auto', function(Request $request, Response $response) {
 $obj = Auto::TraerTodos();
     
	$response->getBody()->write(json_encode($obj));

    return $response;
});
//GET -> TRAER UNO
$app->get('/apirest/auto/{patente}', function(Request $request, Response $response) {
 $id=$request->getAttribute('patente');
 
 $obj = cd::TraerPorID($id);
     
	$response->getBody()->write(json_encode($obj));

    return $response;
});
//POST -> INSERTAR (CON FOTO)
$app->post('/apirest/auto[/]', function(Request $request, Response $response) {
 $array=$request->getParsedBody();
 $destino= "./fotos/";
 
 
     
$micd = new cd();
  	$micd->titel=$array["titulo"];
  	$micd->interpret=$array["cantante"];
  	$micd->jahr=$array["anio"];
   
  	

  	$archivos = $request->getUploadedFiles();


	$nombreAnterior=$archivos['foto']->getClientFilename();
     $micd->foto=$nombreAnterior;
     $micd->InsertarElCdParametros();
	$extension= explode(".", $nombreAnterior);
	$extension=array_reverse($extension);

  	$archivos['foto']->moveTo($destino.$array["titulo"].".".$extension[0]);
    $response->getBody()->write(json_encode($micd));

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
$app->delete('/apirest/auto/{id}', function(Request $request, Response $response) {
 $id=$request->getAttribute('id');
 
 cd::EliminarPorID($id);
     
	$response->getBody()->write("Consulte su base de datos para ver los cambios");

    return $response;
});


$app->run();