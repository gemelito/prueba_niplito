<?php

class GuardarDatos {

  private $db;

  private $IDMATERIAL;
  private $IDCLIENTE;
  private $IDCODIGO;

  private $DESCRIPTION;
  private $UNIDADMEDIDA;
  private $PRECIO1;
  private $CANTIDAD;
  private $SUBTOTAL;
  private $IVA;
  private $TOTAL;

  public $errors = array();
	public $messages = array();


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
    $query = "SELECT * FROM clientes";
		$result = $this->db->QueryReturn($query);
		return $result;
  }

  public function AgregarDatos(){
    if (!isset($_POST['DESCRIPCION']) && !isset($_POST['UNIDADMEDIDA']) && !isset($_POST['PRECIO1']) &&
				!isset($_POST['RAZON_SOCIAL']) && !isset($_POST['RFC']) && !isset($_POST['CANTIDAD']) &&
				!isset($_POST['SUBTOTAL']) && !isset($_POST['IVA']) && !isset($_POST['TOTAL']) &&
        !isset($_POST['IDMATERIAL']) && !isset($_POST['IDCLIENTE']) && !isset($_POST['IDCODIGO'])) {
				$this->errors[] = "Error desconocido.";
			}elseif (empty($_POST['DESCRIPCION']) OR empty($_POST['UNIDADMEDIDA']) OR empty($_POST['PRECIO1']) OR
  				empty($_POST['RAZON_SOCIAL']) OR empty($_POST['RFC']) OR empty($_POST['CANTIDAD']) OR
  				empty($_POST['SUBTOTAL']) OR empty($_POST['IVA']) OR empty($_POST['TOTAL']) OR
  				empty($_POST['IDMATERIAL']) OR empty($_POST['IDCLIENTE']) OR empty($_POST['IDCODIGO'])) {
				$this->errors[] = "Se deben llenar todos los campos.";
			}elseif (!empty($_POST['DESCRIPCION']) && !empty($_POST['UNIDADMEDIDA']) && !empty($_POST['PRECIO1']) &&
  				!empty($_POST['RAZON_SOCIAL']) && !empty($_POST['RFC']) && !empty($_POST['CANTIDAD']) &&
  				!empty($_POST['SUBTOTAL']) && !empty($_POST['IVA']) && !empty($_POST['TOTAL']) &&
          !empty($_POST['IDMATERIAL']) && !empty($_POST['IDCLIENTE']) && !empty($_POST['IDCODIGO']) &&
        strlen($_POST['RFC']) == 15 ) {

        $this->IDMATERIAL = $this->db->ClearString($_POST['IDMATERIAL']);
  			$this->IDCLIENTE = $this->db->ClearString($_POST['IDCLIENTE']);
  			$this->IDCODIGO = $this->db->ClearString($_POST['IDCODIGO']);
        $this->DESCRIPCION = $this->db->ClearString($_POST['DESCRIPCION']);
				$this->UNIDADMEDIDA = $this->db->ClearString($_POST['UNIDADMEDIDA']);
				$this->PRECIO1 = $this->db->ClearString($_POST['PRECIO1']);
				$this->RAZON_SOCIAL = $this->db->ClearString($_POST['RAZON_SOCIAL']);
				$this->RFC = $this->db->ClearString($_POST['RFC']);
				$this->CANTIDAD = $this->db->ClearString($_POST['CANTIDAD']);
				$this->SUBTOTAL = $this->db->ClearString($_POST['SUBTOTAL']);
        $this->IVA = $this->db->ClearString($_POST['IVA']);
        $this->TOTAL = $this->db->ClearString($_POST['TOTAL']);

        $query_producto = "INSERT INTO productos (IDMATERIAL, DESCRIPCION, UNIDADMEDIDA, PRECIO1)
              VALUES ('{$this->IDMATERIAL}', '{$this->DESCRIPCION}', '{$this->UNIDADMEDIDA}', '{$this->PRECIO1}')";
				$result_producto = $this->db->QueryReturn($query_producto);

        $query_cliente = "INSERT INTO clientes (IDCLIENTE, RAZON_SOCIAL, RFC)
              VALUES ('{$this->IDCLIENTE}', '{$this->RAZON_SOCIAL}', '{$this->RFC}')";
				$result_cliente = $this->db->QueryReturn($query_cliente);


        $query_documento = "INSERT INTO documento (IDCODIGO, IDCLIENTE, RAZON_SOCIAL, RFC, SUBTOTAL, IVA, TOTAL)
              VALUES ('{$this->IDCODIGO}', '{$this->IDCLIENTE}', '{$this->RAZON_SOCIAL}', '{$this->RFC}', '{$this->SUBTOTAL}', '{$this->IVA}', '{$this->TOTAL}')";
				$result_documento = $this->db->QueryReturn($query_documento);


        $query_documentoreglon = "INSERT INTO documentoreglon (IDCODIGO, IDMATERIAL, UNIDAD_MEDIDA, CANTIDAD, PRECIO1)
              VALUES ('{$this->IDCODIGO}', '{$this->IDMATERIAL}', '{$this->UNIDADMEDIDA}', '{$this->CANTIDAD}', '{$this->PRECIO1}')";
				$result_documentoreglon = $this->db->QueryReturn($query_documentoreglon);

        if ($result_producto && $result_cliente && $result_documento && $result_documentoreglon)
          $this->messages[] = "Los datos fueron guardados correctamente.";
        else{
          $this->errors[] = "No se agregaron los datos intente otra vez.";
        }

			}




  }



}
?>
