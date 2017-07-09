<?php
require_once "AccesoDatos.php"; 
if(isset($_POST["estado"]))
{
	print("si");
	Empleado::Suspender($_POST["usuario"],$_POST["estado"]);

} 
if(isset($_POST["desp"]))
{
	echo ("si");
	Empleado::Despedir($_POST["usuario"]);
}
date_default_timezone_set("America/Argentina/Buenos_Aires");
class Empleado
{
     	
	public $usuario;
    public $apellido;
    public $contraseña;
    public $contadorOperaciones=0;
	public $admin;
	public $suspendido;

    

    public function __construct($usuario,$apellido,$contraseña,$admin=0,$contadorOperaciones=0,$suspendido=0)
	{
		$this->usuario=$usuario;
        $this->apellido = $apellido;
		$this->contraseña = $contraseña;
		$this->admin = $admin;
	    $this->contadorOperaciones = $contadorOperaciones;

        $this->suspendido = $suspendido;


		
	}

	public static function AumentarContador($usuario)
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
	
		$sql = "SELECT * FROM empleados
				WHERE usuario='$usuario'";

		$consulta = $objetoAccesoDato->RetornarConsulta($sql);
		$consulta->execute();

		$obj=$consulta->fetchall(PDO::FETCH_ASSOC);
		$cont = $obj[0]["cantidadOp"];

		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
		$cantTotal= $cont+1;
		$sql = "UPDATE empleados SET cantidadOp='$cantTotal' WHERE usuario='$usuario'";

		$consulta = $objetoAccesoDato->RetornarConsulta($sql);
		$consulta->execute();
		return TRUE;
	}

    public static function GuardarEnBase($obj)
	{ 
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
	
		$sql = "INSERT INTO empleados (usuario,apellido,contraseña,admin) 
				VALUES ('$obj->usuario','$obj->apellido','$obj->contraseña','$obj->admin')";

		$consulta = $objetoAccesoDato->RetornarConsulta($sql);
		$consulta->execute();
		return ("Observe los cambios en la base");
	}

     public static function ModificarBase($usuario,$contrasenia)
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
		
		$sql = "UPDATE empleados SET contraseña='$contrasenia' WHERE usuario='$usuario'";

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
		
		$sql = "SELECT * FROM empleados";

		$consulta = $objetoAccesoDato->RetornarConsulta($sql);
		$consulta->execute();

		$ListaDeProductosBase = array();
		
		$obj=$consulta->fetchall(PDO::FETCH_ASSOC);
			for ($i=0; $i < count($obj); $i++) { 
				# code...
			
			
			$emp= new Empleado($obj[$i]["usuario"],$obj[$i]["apellido"],$obj[$i]["contraseña"],intval($obj[$i]["admin"]),$obj[$i]["cantidadOp"],intval($obj[$i]["suspendido"]));
			array_push($ListaDeProductosBase,$emp);
			
 
}

		
		return $ListaDeProductosBase;
		
	}

	public static function CrearTabla()
	{
		$lista= Empleado::TraerTodosEmpleadosBase();
		
		$tabla='<table class="table" > <thead style="background-color:black;color:lightgreen"> <th>Usuario </th> <th> Apellido </th> <th> Contraseña</th><th> Admin</th><th> Contador Operaciones</th><th> Suspendido</th><th>Acción</th> </thead>';

		for ($i=0; $i < count($lista) ; $i++) { 
		
			$estado;
			if($lista[$i]->suspendido==0)
			{
				$estado=1;
				$tabla.= "<tr style='background-color:lightgreen'><td>".$lista[$i]->usuario."</td>";
			}
			else
			{
				$estado=0;
				$tabla.= "<tr style='background-color:IndianRed'><td>".$lista[$i]->usuario."</td>";
			}

        $tabla.= "<td>".$lista[$i]->apellido."</td>";
        $tabla.= "<td>".$lista[$i]->contraseña."</td>";
		$tabla.= "<td>".$lista[$i]->admin."</td>";
        $tabla.= "<td>".$lista[$i]->contadorOperaciones."</td>";
        $tabla.= "<td>".$lista[$i]->suspendido."</td>";
		
		if($lista[$i]->admin!=1)
        $tabla.="<td><input type='button' value='Suspender'  id='".$i."' class='btn btn-info' onclick='Suspender(\"".$lista[$i]->usuario."\",".$estado.")'><input type='button' value='Despedir' id='".$i."' class='btn btn-danger' onclick='Despedir(\"".$lista[$i]->usuario."\")'></td></tr>";
		else
		$tabla.="<td></td></tr>";
             
		}
		return ("<div>".$tabla."</div>");

	}

    	public static function LoginEmp($usuario)
		{ 
			
			date_default_timezone_set("America/Argentina/Buenos_Aires");
			$hora = date("Y-m-d H:i:s");
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
			
			$sql = "INSERT INTO login (usuario,hora) VALUES ('$usuario','$hora')";

			$consulta = $objetoAccesoDato->RetornarConsulta($sql);
			$consulta->execute();

	
		
		}

		public static function TraerLogins()
		{
$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
		
		$sql = "SELECT * FROM login";

		$consulta = $objetoAccesoDato->RetornarConsulta($sql);
		$consulta->execute();

		$ListaDeProductosBase = array();
		
		$obj=$consulta->fetchall(PDO::FETCH_ASSOC);
			for ($i=0; $i < count($obj); $i++) { 	
			$log= new StdClass;
			$log->usuario=$obj[$i]["usuario"];
			$log->hora=$obj[$i]["hora"];
			array_push($ListaDeProductosBase,$log);
			
}

		
		return $ListaDeProductosBase;
		
	}
}