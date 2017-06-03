<?php
class Empleado
{
     	
    public $apellido;
    public $contraseña;
    public static $contadorOperaciones=0;

    

    public function __construct($apellido,$contraseña)
	{
        $this->apellido = $apellido;
		$this->contraseña = $contraseña;
		
	}

    public static function GuardarEnBase($obj)
	{
		$pdo = new PDO("mysql:host=localhost;dbname=estacionamiento;charset=utf8","root","");
		$resultado=$pdo->prepare("INSERT INTO empleados (apellido,contraseña) VALUES (?,?)");
		$resultado->bindParam(1,$obj->apellido);
		$resultado->bindParam(2,$obj->contraseña);
		$resultado->execute();
	}

     public static function ModificarBase($obj,$pass)
	{
		$pdo = new PDO("mysql:host=localhost;dbname=estacionamiento;charset=utf8","root","");
		$resultado=$pdo->prepare("UPDATE empleados SET contraseña=? WHERE apellido=?");
		$resultado->bindParam(1,$pass);
		$resultado->bindParam(2,$obj->apellido);
		$resultado->execute();
	}

     public static function Despedir($obj)
	{
		$pdo = new PDO("mysql:host=localhost;dbname=estacionamiento;charset=utf8","root","");
		$resultado=$pdo->prepare("DELETE FROM empleados WHERE apellido = ?");
		$resultado->bindParam(1,$obj->apellido);
		$resultado->execute();
	}



	public static function TraerTodosEmpleadosBase()
	{
		$ListaDeProductosBase = array();
		$pdo = new PDO("mysql:host=localhost;dbname=estacionamiento;charset=utf8","root","");
		$resultado=$pdo->query("SELECT apellido AS apellido,contraseña AS contraseña,cantidadOp AS contadorOperaciones FROM empleados");
		
		//var_dump($registros);
		while($obj = $resultado->fetchObject("Empleado")) {
			array_push($ListaDeProductosBase,$obj);

}

		
		return $ListaDeProductosBase;
		
	}

    	public static function LoginEmp($obj)
	{
        $dia= date("d:m");
        $hora = date("H:i"); 

		$pdo = new PDO("mysql:host=localhost;dbname=estacionamiento;charset=utf8","root","");
		$resultado=$pdo->query("INSERT INTO empleados (apellido,dia,hora) VALUES (?,?,?)");
		$resultado->bindParam(1,$obj->apellido);
		$resultado->bindParam(2,$dia);
        $resultado->bindParam(3,$hora);
		$resultado->execute();
		
	}
}