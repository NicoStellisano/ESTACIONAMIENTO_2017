<?php
class Estacionamiento
{
    public $cocheras[18];
 	
    public $empleados[];
  

    public function __construct($cochera,$patente,$color,$marca,$ingreso)
	{
        $this->cochera = $cochera;
		
	}
}