<?php

class SQL
{
	private $consulta;
	private $campos = array();
	private $tablas = array();
	private $wheres = array();
	private $orders = array();
	
	public function addCampo($campo)
	{
		$this->campos[] = $campo;
	}
	public function addTabla($tabla)
	{
		$this->tablas[] = $tabla;
	}
	public function addWhere($where)
	{
		$this->wheres[] = $where;
	}
	public function addOrder($or)
	{
		$this->orders[] = $or;
	}
	private function make()
	{
		$this->consulta = 'SELECT ';
		foreach($this->campos as $campo){
			$cadenaCampos.= ' '.$campo.', ';
		}
		$this->consulta.= substr($cadenaCampos,0,strlen($cadenaCampos)-2);
		$this->consulta.= ' FROM ';
		foreach($this->tablas as $tabla){
			$cadenaTablas.= ' '.$tabla.', ';
		}
		$this->consulta.= substr($cadenaTablas,0,strlen($cadenaTablas)-2);
		if(count($this->wheres)!=0){
			$this->consulta.= ' WHERE ';
			foreach($this->wheres as $where){
				$cadenaWheres.= ''.$where.' AND ';
			}
			$this->consulta.= substr($cadenaWheres,0,strlen($cadenaWheres)-4);
		}
		if(count($this->orders)!=0){
			$this->consulta.= ' ORDER BY ';
			foreach($this->orders as $order){
				$cadenaOrders.= ''.$order.', ';
			}
			$this->consulta.= substr($cadenaOrders,0,strlen($cadenaOrders)-2);
		}
		return $this->consulta;
	}
	public function get()
	{
		return $this->make();
	}
	public function toString()
	{
		return $this->make();
	}
}
