<?php
class Auto
{
    public $cochera;
 	public $patente;
    public $color;
  	public $marca;
    public $ingreso;//Date
    public $egreso=NULL;//Date
    public $pago=NULL;

    public function __construct($cochera,$patente,$color,$marca,$ingreso)
	{
        $this->cochera = $cochera;
		$this->patente = $patente;
		$this->color = $color;
		$this->marca = $marca;
		$this->ingreso = $ingreso;
	}

     public static function GuardarEnBase($obj)
	{
        $dia= date("d:m");
        $hora= date("Y-m-d H:i:s");
		$pdo = new PDO("mysql:host=localhost;dbname=estacionamiento;charset=utf8","root","");
		$resultado=$pdo->prepare("INSERT INTO autos (cochera,patente,dia,ingreso,marca,color) VALUES (?,?,?,?,?,?)");
		$resultado->bindParam(1,$obj->cochera);
		$resultado->bindParam(2,$obj->patente);
        $resultado->bindParam(3,$dia);
		$resultado->bindParam(4,$hora);
        $resultado->bindParam(5,$obj->marca);
		$resultado->bindParam(6,$obj->color);
		$resultado->execute();
	}

     public static function Egreso($obj,$pass,$costos)
	{
        $eg= date("Y-m-d H:i:s");


		$pdo = new PDO("mysql:host=localhost;dbname=estacionamiento;charset=utf8","root","");
        $ing = $pdo->prepare("SELECT ingreso FROM autos WHERE patente=?", PDO::FETCH_ASSOC);
        $resultado->bindParam(1,$obj->patente);

        $dteDiff  = $ing->diff($eg[0]);
        $tiempoDif =(float)$dteDiff->format("%H");
        $precio;
        if($tiempoDif>12)
        {
            $precio= $tiempoDif*$costos["hora"];
        }else if ($tiempoDif<24)
        {
            $precio= (((int)$tiempoDif/24)*$costos["estadia"])+($tiempoDif-(($tiempoDif/24)*24))//REVISAR!
            //$precio= ($tiempoDif*$costos["mestadia"])+(($tiempoDif-12)*$costos["hora"]);

        }else if()


		$resultado=$pdo->prepare("UPDATE autos SET egreso=?,pago=? WHERE patente=?");
		$resultado->bindParam(1,$pass);
		$resultado->bindParam(2,$obj->apellido);
    	$resultado->bindParam(3,$obj->apellido);

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