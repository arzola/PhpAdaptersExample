<?php
require_once 'ManejadorDeBaseDeDatosInterface.php';
class BaseDeDatos
{
	private $db;
	
	public function __construct(MySQL $db)
	{
		$this->db = $db;
	}
	public function conectar()
	{
		$this->db->conectar();
	}
	public function desconectar()
	{
		$this->db->desconectar();
	}	
	public function ejecutar(SQL $sql)
	{
		return $this->db->ejecutar($sql);
	}
}
