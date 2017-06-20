<?php
class Empleado
{
     	
    public $apellido;
    public $contraseña;
    public static $contadorOperaciones=0;
	public $admin;

    

    public function __construct($apellido,$contraseña,$admin=0)
	{
        $this->apellido = $apellido;
		$this->contraseña = $contraseña;
		$this->admin = $admin;
		
	}

    public static function GuardarEnBase($obj)
	{
		$pdo = new PDO("mysql:host=localhost;dbname=estacionamiento;charset=utf8","root","");
		$resultado=$pdo->prepare("INSERT INTO empleados (apellido,contraseña,admin) VALUES (?,?,?)");
		$resultado->bindParam(1,$obj->apellido);
		$resultado->bindParam(2,$obj->contraseña);
		$resultado->bindParam(3,$obj->admin);

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
		$resultado=$pdo->query("SELECT apellido AS apellido,contraseña AS contraseña,admin AS admin,cantidadOp AS contadorOperaciones FROM empleados");
		
		//var_dump($registros);
		while($obj = $resultado->fetchObject("Empleado")) {
			array_push($ListaDeProductosBase,$obj);

}

		
		return $ListaDeProductosBase;
		
	}

    	public static function LoginEmp($obj)
	{
        
        $hora = date("Y-m-d H:i:s");
		$pdo = new PDO("mysql:host=localhost;dbname=estacionamiento;charset=utf8","root","");
		$resultado=$pdo->query("INSERT INTO login (apellido,hora) VALUES (?,?,?)");
		$resultado->bindParam(1,$obj->apellido);
        $resultado->bindParam(2,$hora);
		$resultado->execute();
		
	}
}