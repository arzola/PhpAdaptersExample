<?php

interface ManejadorDeBaseDeDatosInterface
{
	public function conectar();
	public function desconectar();
	public function ejecutar(SQL $sql);
}
