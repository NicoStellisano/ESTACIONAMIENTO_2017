<?php
date_default_timezone_set("America/Argentina/Buenos_Aires");
class Cochera
{
	public $numero;
    public $auto;
	public $piso;
	public $discapacidad;
 	public $contadorUso=0;
    

    public function __construct($numero,$auto=NULL,$piso,$discapacidad,$contadorUso=0)
	{
		$this->auto = $auto;
		$this->piso = $piso;
		$this->discapacidad = $discapacidad;
		$this->numero = $numero;
		$this->contadorUso=$contadorUso;
	}

	public static function AgregarCochera($cochera)
	{ 
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
		$sql = "INSERT INTO cocheras (numero,piso,discapacidad) 
				VALUES ('$cochera->numero','$cochera->piso','$cochera->discapacidad')";
		$consulta = $objetoAccesoDato->RetornarConsulta($sql);
		$consulta->execute();
		return TRUE;
	}

     public static function InsertarAuto($auto)
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
	
		$sql = "SELECT * FROM cocheras
				WHERE numero='$auto->cochera'";

		$consulta = $objetoAccesoDato->RetornarConsulta($sql);
		$consulta->execute();
		$coch= $consulta->fetchall(PDO::FETCH_ASSOC);
        $cont= $coch[0]["contadorUso"]+1;	

		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();	
		$sql = "UPDATE cocheras SET auto='$auto->patente' , contadorUso='$cont' WHERE numero='$auto->cochera'";
		$consulta = $objetoAccesoDato->RetornarConsulta($sql);
		$consulta->execute();
		
		return TRUE;

	}

     public static function SaleAuto($auto)
	{
	   

		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();	

		$sql = "UPDATE cocheras SET auto=NULL WHERE numero='$auto->cochera'";
		$consulta = $objetoAccesoDato->RetornarConsulta($sql);
		$consulta->execute();

		return TRUE;
	}

public static function TraerPorNumero($numero)
{
	$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
	
		$sql = "SELECT * FROM cocheras
				WHERE numero='$numero'";

		$consulta = $objetoAccesoDato->RetornarConsulta($sql);
		$consulta->execute();
		return $consulta->fetchall(PDO::FETCH_ASSOC);
}

	public static function UsoCocheras()
	{
		
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();		
		$sql = "SELECT * FROM cocheras";
		$consulta = $objetoAccesoDato->RetornarConsulta($sql);
		$consulta->execute();

		$ListaDeProductosBase = array();
		
		$obj=$consulta->fetchall(PDO::FETCH_ASSOC);
			for ($i=0; $i < count($obj); $i++) { 		
			$coch= new Cochera(intval($obj[$i]["numero"]),$obj[$i]["auto"],intval($obj[$i]["piso"]),intval($obj[$i]["discapacidad"]),intval($obj[$i]["contadorUso"]));
			array_push($ListaDeProductosBase,$coch);
	}	
	$max=0;
	$min=9999999;
	$ceros=array();
	$maxC;
	$minC;
	
		for ($i=0; $i <count($ListaDeProductosBase) ; $i++) { 
			
			if($ListaDeProductosBase[$i]->contadorUso>$max)
			{
			$maxC=$ListaDeProductosBase[$i];
			$max=$ListaDeProductosBase[$i]->contadorUso;
			}
			
			if($ListaDeProductosBase[$i]->contadorUso<$min)
			{
			$minC=$ListaDeProductosBase[$i];
			$min=$ListaDeProductosBase[$i]->contadorUso;
			}

			
			
			if($ListaDeProductosBase[$i]->contadorUso==0)
			array_push($ceros,$ListaDeProductosBase[$i]);
		}
		$Lista=array();
		array_push($Lista,$maxC);
		array_push($Lista,$minC);
		array_push($Lista,$ceros);
		
		
		return $Lista;		
	
	}

	public static function TraerTodos()
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();		
		$sql = "SELECT * FROM cocheras";
		$consulta = $objetoAccesoDato->RetornarConsulta($sql);
		$consulta->execute();

		$ListaDeProductosBase = array();
		
		$obj=$consulta->fetchall(PDO::FETCH_ASSOC);
			for ($i=0; $i < count($obj); $i++) { 		
			$coch= new Cochera(intval($obj[$i]["numero"]),$obj[$i]["auto"],intval($obj[$i]["piso"]),intval($obj[$i]["discapacidad"]),intval($obj[$i]["contadorUso"]));
			array_push($ListaDeProductosBase,$coch);
}	
		return $ListaDeProductosBase;		
	}
}