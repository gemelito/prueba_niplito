<?php

class Reporte{

  private $db;

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

  public function ReportePorProductor(){
    $query = "SELECT productos.IDMATERIAL, productos.DESCRIPCION,
    documentoreglon.CANTIDAD as TOTALA_PIEZAS_VENDIDAS,
    SUM(productos.PRECIO1) as SUBTOTAL_TOTAL FROM productos
    INNER JOIN documentoreglon ON documentoreglon.IDMATERIAL = productos.IDMATERIAL
    GROUP BY productos.IDMATERIAL";
    $result = $this->db->QueryReturn($query);
    return $result;
  }

  public function ReporteCliente(){
    if(isset($this->RFC) && is_string($this->RFC) && strlen($this->RFC) == 15){
      $query= "SELECT documento.* FROM clientes
      INNER JOIN (SELECT documento.IDCLIENTE, documento.RFC, documento.RAZON_SOCIAL,
        documento.SUBTOTAL,documento.TOTAL, COUNT(documento.IDCLIENTE) total_ventas
        FROM documento where documento.RFC = '{$this->RFC}') documento
        ON clientes.RFC = '{$this->RFC}' limit 1 ";
        $result = $this->db->QueryReturn($query);
        $objects = $result->fetch_object();
        return $objects;
    }
  }

}
?>
