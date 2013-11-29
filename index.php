<?php
require_once 'BaseDeDatos.php';
require_once 'MySql.php';
require_once 'SQL.php';

abstract class Index
{
	public function run()
	{
		$db = new BaseDeDatos(new MySql('localhost','root','','shop'));
		$db->conectar();
		
		$consulta = new SQL();
		$consulta->addTabla('clientes');
			$consulta->addCampo('razon');
			$consulta->addCampo('nombre');
			$consulta->addCampo('apellidos');
		//$consulta->addWhere("nombre = 'Pepito'");
		$consulta->addOrder("razon DESC");
		$datos = $db->ejecutar($consulta);
		foreach($datos as $val){
			echo $val['nombre']." ".$val['apellidos']."<br>";
		}
	}
}

Index::run();
