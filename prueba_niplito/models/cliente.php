<?php


class Cliente {

  private $db;

  private $IDCLIENTE;
  private $RAZON_SOCIAL;
  private $RFC;

  public function __construct(){
		$this->db = $this->Conexion();
	}

  public function Conexion(){
		return new Config();
	}

	public function Set($atributo, $contenido){
		$this->$atributo = $contenido;
	}

  public function MostrarClientes(){
    $query = "SELECT DISTINCT clientes.IDCLIENTE, clientes.RAZON_SOCIAL, clientes.RFC FROM clientes";
		$result = $this->db->QueryReturn($query);
		return $result;
  }

  public function BuscarCliente(){
    $query = "SELECT DISTINCT clientes.IDCLIENTE, clientes.RAZON_SOCIAL, clientes.RFC FROM clientes WHERE clientes.RFC = '{$this->RFC}' ";
		$result = $this->db->QueryReturn($query);
    return $result;
  }


}


?>
