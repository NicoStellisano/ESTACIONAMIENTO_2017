<?php
require_once "AccesoDatos.php"; 
if(isset($_POST["estado"]))
{
	print("si");
	Empleado::Suspender($_POST["usuario"],$_POST["estado"]);

}else if(isset($_POST["usuario"]))
{
	Empleado::Despedir($_POST["usuario"]);
}
class Empleado
{
     	
	public $usuario;
    public $apellido;
    public $contraseña;
<<<<<<< HEAD
    public $contadorOperaciones=0;
	public $admin;
	public $suspendido;

    

    public function __construct($usuario,$apellido,$contraseña,$admin=0,$contadorOperaciones=0,$suspendido=0)
=======
    public static $contadorOperaciones=0;
	public $admin;

    

    public function __construct($apellido,$contraseña,$admin=0)
>>>>>>> origin/master
	{
		$this->usuario=$usuario;
        $this->apellido = $apellido;
		$this->contraseña = $contraseña;
		$this->admin = $admin;
<<<<<<< HEAD
        $this->suspendido = $suspendido;

=======
>>>>>>> origin/master
		
	}

    public static function GuardarEnBase($obj)
<<<<<<< HEAD
	{ 
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
		$usuario=$obj->apellido.rand(1000,5000);
		$sql = "INSERT INTO empleados (usuario,apellido,contraseña,admin) 
				VALUES ('$usuario','$obj->apellido','$obj->contraseña',$obj->admin)";

		$consulta = $objetoAccesoDato->RetornarConsulta($sql);
		$consulta->execute();
		return "Observe los cambios en la base";
=======
	{
		$pdo = new PDO("mysql:host=localhost;dbname=estacionamiento;charset=utf8","root","");
		$resultado=$pdo->prepare("INSERT INTO empleados (apellido,contraseña,admin) VALUES (?,?,?)");
		$resultado->bindParam(1,$obj->apellido);
		$resultado->bindParam(2,$obj->contraseña);
		$resultado->bindParam(3,$obj->admin);

		$resultado->execute();
>>>>>>> origin/master
	}

     public static function ModificarBase($usuario,$pass)
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
		
		$sql = "UPDATE empleados SET contraseña='$pass' WHERE usuario='$usuario'";

		$consulta = $objetoAccesoDato->RetornarConsulta($sql);
		$consulta->execute();
		return "Observe los cambios en la base";

	}

     public static function Despedir($usuario)
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
		
		$sql = "DELETE FROM empleados WHERE usuario='$usuario'";

		$consulta = $objetoAccesoDato->RetornarConsulta($sql);
		$consulta->execute();
		return "Observe los cambios en la base";
	}

 public static function Suspender($usuario,$estado)
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
		
		$sql = "UPDATE empleados SET suspendido=$estado WHERE usuario='$usuario'";

		$consulta = $objetoAccesoDato->RetornarConsulta($sql);
		$consulta->execute();
		return "Observe los cambios en la base";

	}


	public static function TraerTodosEmpleadosBase()
	{
$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
		
		$sql = "SELECT usuario,apellido AS apellido,contraseña AS contraseña,admin AS admin,cantidadOp AS contadorOperaciones,suspendido FROM empleados";

		$consulta = $objetoAccesoDato->RetornarConsulta($sql);
		$consulta->execute();

		$ListaDeProductosBase = array();
<<<<<<< HEAD
	//	$pdo = new PDO("mysql:host=localhost;dbname=estacionamiento;charset=utf8","root","");
	//	$resultado=$pdo->query("SELECT usuario,apellido AS apellido,contraseña AS contraseña,admin AS admin,cantidadOp AS contadorOperaciones FROM empleados");
=======
		$pdo = new PDO("mysql:host=localhost;dbname=estacionamiento;charset=utf8","root","");
		$resultado=$pdo->query("SELECT apellido AS apellido,contraseña AS contraseña,admin AS admin,cantidadOp AS contadorOperaciones FROM empleados");
>>>>>>> origin/master
		
		//var_dump($registros);
		
		$obj=$consulta->fetchall(PDO::FETCH_ASSOC);
			for ($i=0; $i < count($obj); $i++) { 
				# code...
			
			
			$emp= new Empleado($obj[$i]["usuario"],$obj[$i]["apellido"],$obj[$i]["contraseña"],intval($obj[$i]["admin"]),intval($obj[$i]["contadorOperaciones"]),intval($obj[$i]["suspendido"]));
			array_push($ListaDeProductosBase,$emp);
			

}

		
		return $ListaDeProductosBase;
		
	}

	public static function CrearTabla()
	{
<<<<<<< HEAD
		$lista= Empleado::TraerTodosEmpleadosBase();
		
		$tabla='<table class="table" > <thead> <th>Usuario </th> <th> Apellido </th> <th> Contraseña</th><th> Admin</th><th> Contador Operaciones</th><th> Suspendido</th><th>Acción</th> </thead>';

		for ($i=0; $i < count($lista) ; $i++) { 
		$tabla.= "<tr><td>".$lista[$i]->usuario."</td>";
        $tabla.= "<td>".$lista[$i]->apellido."</td>";
        $tabla.= "<td>".$lista[$i]->contraseña."</td>";
		$tabla.= "<td>".$lista[$i]->admin."</td>";
        $tabla.= "<td>".$lista[$i]->contadorOperaciones."</td>";
        $tabla.= "<td>".$lista[$i]->suspendido."</td>";
		$estado;
		if($lista[$i]->suspendido==0)
		{
			$estado=1;
			}
			else
			{
				$estado=0;
		}
        $tabla.="<td><input type='button' value='Suspender'  id='".$i."' class='btn btn-info' onclick='Suspender(\"".$lista[$i]->usuario."\",".$estado.")'><input type='button' value='Despedir' id='".$i."' class='btn btn-danger' onclick='Despedir(\"".$lista[$i]->usuario."\")'></td></tr>";
             
		}
		return ("<div>".$tabla."</div>");

	}

    	public static function LoginEmp($obj)
	{
=======
>>>>>>> origin/master
        
        $hora = date("Y-m-d H:i:s");
		$pdo = new PDO("mysql:host=localhost;dbname=estacionamiento;charset=utf8","root","");
		$resultado=$pdo->query("INSERT INTO login (apellido,hora) VALUES (?,?,?)");
		$resultado->bindParam(1,$obj->apellido);
        $resultado->bindParam(2,$hora);
		$resultado->execute();
		
	}
}