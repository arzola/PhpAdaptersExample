<?php
require_once 'ManejadorDeBaseDeDatosInterface.php';

class MySql implements ManejadorDeBaseDeDatosInterface
{
	private $host;
	private $user;
	private $pass;
	private $db;
	private $datos = array();
	
	public function __construct()
	{
		$args = func_get_args();
		$this->host = $args[0];
		$this->user = $args[1];
		$this->pass = $args[2];
		$this->db = $args[3];
	}
	public function conectar()
	{
		mysql_connect($this->host,$this->user,$this->pass);
		mysql_select_db($this->db);
	}
	public function desconectar()
	{
		mysql_close();
	}
	public function ejecutar(SQL $sql)
	{
		$consulta = mysql_query($sql->get());
		while($row = mysql_fetch_assoc($consulta)){
			$datos[] = $row;
		}
		return $datos;
	}
}
