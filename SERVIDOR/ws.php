<?php 
	require_once('./lib/nusoap.php'); 
	require_once('../clases/AccesoDatos.php');
	require_once('../clases/empleado.php');
	$server = new nusoap_server(); 

	$server->configureWSDL('WebService Con PDO', 'urn:ws'); 

/*$server->wsdl->addComplexType(
									'Empleado',
									'complexType',
									'struct',
									'all',
									'',
									array('usuario' => array('name' => 'usuario', 'type' => 'xsd:string'),
										  'apellido' => array('name' => 'apellido', 'type' => 'xsd:string'),
										  'contraseña' => array('name' => 'contraseña', 'type' => 'xsd:string'),
										  'admin' => array('name' => 'admin', 'type' => 'xsd:int')
										 )
								);*/
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

	$server->register('Insertar',                	
						array('usuario' => 'xsd:string', 			// PARAMETROS DE ENTRADA
					  'apellido' => 'xsd:string', 			// PARAMETROS DE ENTRADA
					  'contrasenia' => 'xsd:string', 			// PARAMETROS DE ENTRADA
					  'admin' => 'xsd:string'),			// PARAMETROS DE ENTRADA					 
						array('return' => 'xsd:string'),   
						'urn:ws',                		
						'urn:ws#Insertar',             
						'rpc',                        		
						'encoded',                    		
						'Inserta usuario'    			
					);
	$server->register('CambiarContraseniaa',                	
						array('usuario' => 'xsd:string', 			// PARAMETROS DE ENTRADA
					  'contraseña' => 'xsd:string'), 
						array('return' => 'xsd:string'),   
						'urn:ws',                		
						'urn:ws#CambiarContraseña',             
						'rpc',                        		
						'encoded',                    		
						'Cambia la contraseña'    			
					);

$server->register('Despedir',                	
						array('usuario' => 'xsd:string'),			// PARAMETROS DE ENTRADA
					
						array('return' => 'xsd:string'),   
						'urn:ws',                		
						'urn:ws#Despedir',             
						'rpc',                        		
						'encoded',                    		
						'Despide al usuario'    			
					);

$server->register('Suspender',                	
						array('usuario' => 'xsd:string',
						'estado' => 'xsd:int'),			// PARAMETROS DE ENTRADA
						array('return' => 'xsd:string'),   
						'urn:ws',                		
						'urn:ws#Suspender',             
						'rpc',                        		
						'encoded',                    		
						'Suspende al usuario'    			
					);

$server->register('Tabla',                	
						array(),			// PARAMETROS DE ENTRADA
						array('return' => 'xsd:string'),   
						'urn:ws',                		
						'urn:ws#Tabla',             
						'rpc',                        		
						'encoded',                    		
						'Crea una tabla'    			
					);
					



	function UsuarioExistente($usuario,$contraseña) {
		
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
		
		$sql = "SELECT usuario,apellido,contraseña,admin,suspendido
				FROM empleados";

		$consulta = $objetoAccesoDato->RetornarConsulta($sql);
		$consulta->execute();

		$lista= $consulta->fetchall();
		foreach ($lista as $item) {
			if($item['usuario']==$usuario && $item['contraseña']==$contraseña && $item['suspendido']==0)
			{
				$resultado= [];
				$resultado[0]=$usuario;
				$resultado[1]=$contraseña;
				$resultado[2]=$item['admin'];

				  

				return $resultado;
			}
		}
		return NULL;
		
	}

	function Insertar($usuario,$apellido,$contrasenia,$admin)
	{
		
		$obj=new Empleado($usuario,$apellido,$contrasenia,intval($admin));
		$string= Empleado::GuardarEnBase($obj);
		
		return $string;
	}

	function CambiarContrasenia($usuario,$contraseña)
	{
		return Empleado::ModificarBase($usuario,$contraseña);		
	}

	function Despedir($usuario)
	{
		return Empleado::Despedir($usuario);
	}

	function Suspender($usuario,$estado)
	{
		return Empleado::Suspender($usuario,$estado);
	}

	function Tabla()
	{
		$string= Empleado::CrearTabla();
		
		return $string;
	}
///**********************************************************************************************************///								

	$HTTP_RAW_POST_DATA = file_get_contents("php://input");	
	$server->service($HTTP_RAW_POST_DATA);
