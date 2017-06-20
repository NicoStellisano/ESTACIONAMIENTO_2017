<?php 
	require_once('./lib/nusoap.php'); 
	require_once('../AccesoDatos.php');
	require_once('../clases/empleado.php');
	$server = new nusoap_server(); 

	$server->configureWSDL('WebService Con PDO', 'urn:ws'); 

///**********************************************************************************************************///								
//REGISTRO METODO SIN PARAMETRO DE ENTRADA Y PARAMETRO DE SALIDA 'ARRAY de ARRAYS'
	$server->register('UsuarioExistente',                	
						array('apellido' => 'xsd:string', 			// PARAMETROS DE ENTRADA
					  'contraseña' => 'xsd:string'), 
						array('return' => 'xsd:Array'),   
						'urn:ws',                		
						'urn:ws#UsuarioExistente',             
						'rpc',                        		
						'encoded',                    		
						'Obtiene el usuario sí existe'    			
					);


	function UsuarioExistente($apellido,$contraseña) {
		
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
		
		$sql = "SELECT apellido,contraseña,admin
				FROM empleados";

		$consulta = $objetoAccesoDato->RetornarConsulta($sql);
		$consulta->execute();

		$lista= $consulta->fetchall();
		foreach ($lista as $item) {
			if($item['apellido']==$apellido && $item['contraseña']==$contraseña)
			{
				$resultado= [];
				$resultado[0]=$apellido;
				$resultado[1]=$contraseña;
				$resultado[2]=$item['admin'];
				return $resultado;
			}
		}
		return NULL;
		
	}
///**********************************************************************************************************///								

	$HTTP_RAW_POST_DATA = file_get_contents("php://input");	
	$server->service($HTTP_RAW_POST_DATA);
