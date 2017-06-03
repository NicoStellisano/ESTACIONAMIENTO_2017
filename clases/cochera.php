<?php
class Cochera
{
    public $auto;
 	public static $contadorUso=0;
    public $piso;
  	public $discapacidad;
    public $numeroCochera;

    public function __construct($auto,$piso,$discapacidad,$numeroCochera)
	{
        $contadorUso+=1;
		$this->auto = $auto;
		$this->piso = $piso;
		$this->discapacidad = $discapacidad;
		$this->numeroCochera = $numeroCochera;
	}
}