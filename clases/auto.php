<?php
session_start();
require_once "AccesoDatos.php"; 
require_once "empleado.php"; 
require_once "cochera.php";
date_default_timezone_set("America/Argentina/Buenos_Aires");
class Auto
{
    public $cochera;
 	public $patente;
    public $color;
  	public $marca;
	public $foto;
    public $ingreso;//Date
    public $egreso=NULL;//Date
    public $pago=NULL;

    public function __construct($cochera,$patente,$color,$marca,$foto=NULL,$ingreso=NULL,$egreso=NULL,$pago=NULL)
	{
        $this->cochera = $cochera;
		$this->patente = $patente;
		$this->color = $color;
		$this->marca = $marca;
		$this->foto = $foto;
		$this->ingreso = $ingreso;
		$this->egreso = $egreso;
		$this->pago = $pago;
	}

     public static function GuardarEnBase($obj,$usuario)
	{
		     
		$hora= date("Y-m-d H:i:s");
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
		$obj->ingreso=$hora;
		$sql = "INSERT INTO autos (cochera,patente,color,marca,foto,ingreso) 
				VALUES ('$obj->cochera','$obj->patente','$obj->color','$obj->marca','$obj->foto','$obj->ingreso')";

		$consulta = $objetoAccesoDato->RetornarConsulta($sql);
		$consulta->execute();

		Cochera::InsertarAuto($obj);
		Empleado::AumentarContador($usuario);

		return TRUE;
	}

     public static function Egreso($patente,$usuario,$costos)
	{
        

$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
	
		$sql = "SELECT * FROM autos
				WHERE patente='$patente'";

		$consulta = $objetoAccesoDato->RetornarConsulta($sql);
		$consulta->execute();

		$precio=0;
		$obj=$consulta->fetchall(PDO::FETCH_ASSOC);

		$auto= new Auto($obj[0]["cochera"],$obj[0]["patente"],$obj[0]["color"],$obj[0]["marca"],$obj[0]["foto"],$obj[0]["ingreso"],$obj[0]["egreso"],$obj[0]["pago"]);
		$ing=$auto->ingreso;
		$eg= date("Y-m-d H:i:s");
		$segundos = abs(strtotime($ing) - strtotime($eg));
        $horas = ceil($segundos/60/60);
   	   $dias = intval($horas/24);
		  if($dias>=1)
		  {
		  $precio+=$dias*$costos["estadia"];
		  
		  }else{
			  $dias=0;
		  }
		   
	   $horasRestantes=$horas-($dias*24);
	   if($horasRestantes>=12)
	   {
			$precio+=$costos["mestadia"];
			$horasRestantes-=12;
	   }
	   $precio+=$horasRestantes*$costos["hora"];

	   $auto->egreso=$eg;
		$auto->pago=$precio;
		Cochera::SaleAuto($auto);
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
		
		$sql = "UPDATE autos SET egreso='$auto->egreso',pago='$auto->pago',cochera=NULL WHERE patente='$auto->patente'";

		$consulta = $objetoAccesoDato->RetornarConsulta($sql);
		$consulta->execute();

		
		Empleado::AumentarContador($usuario);

		return $auto;
	
	}


public static function TraerPorPatente($patente)
{
	$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
	
		$sql = "SELECT * FROM autos
				WHERE patente='$patente'";

		$consulta = $objetoAccesoDato->RetornarConsulta($sql);
		$consulta->execute();
		return $consulta->fetchall(PDO::FETCH_ASSOC);
}

	public static function TraerTodos()
	{
		
$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
		
		$sql = "SELECT * FROM autos";

		$consulta = $objetoAccesoDato->RetornarConsulta($sql);
		$consulta->execute();

		$ListaDeProductosBase = array();
		
		$obj=$consulta->fetchall(PDO::FETCH_ASSOC);
			for ($i=0; $i < count($obj); $i++) { 
				# code...
			
			
			$auto= new Auto($obj[$i]["cochera"],$obj[$i]["patente"],$obj[$i]["color"],$obj[$i]["marca"],$obj[$i]["foto"],$obj[$i]["ingreso"],$obj[$i]["egreso"],$obj[$i]["pago"]);
			array_push($ListaDeProductosBase,$auto);
			

}

		
		return $ListaDeProductosBase;
		
	}

   
}