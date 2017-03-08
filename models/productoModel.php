<?php 
	Class productoModel extends Model {
		
		public function __construct(){
			parent::__construct();
		}
		
		public function listarProductos() {
			$sql = 'SELECT * FROM Products';
			$resultado = $this-> _db-> query($sql) or die('Error: '.$sql);
			return $resultado;
		}
		
		public function insertar($productCode,$productName,$productLine,$productScale,$productVendor,$productDescription,$quantityInStock,$buyPrice,$MSRP){
			$sql = "INSERT INTO Products set productCode = '$productCode',
											 productName = '$productName',
											 productLine = '$productLine',
											 productScale = '$productScale',
											 productVendor = '$productVendor',
											 productDescription = '$productDescription',
											 quantityInStock = $quantityInStock,
											 buyPrice = $buyPrice,
											 MSRP = $MSRP";
			$this-> _db-> query($sql) or die ('Error: '.$sql);
			return;
		}
		
		public function formEditar($productCode){
			$sql = "SELECT * FROM Products WHERE productCode = '$productCode'";
			$result = $this-> _db-> query($sql) or die ('Error: '.$sql);
			$reg = null;
			
			if( $result-> num_rows){
				$reg = $result-> fetch_object();			
			}
			return $reg;
		}
		
		public function editar($productCode,$productName,$productLine,$productScale,$productVendor,$productDescription,$quantityInStock,$buyPrice,$MSRP){
			$sql = "UPDATE Products set productName = '$productName',
										productLine = '$productLine',
										productScale = '$productScale',
										productVendor = '$productVendor',
										productDescription = '$productDescription',
										quantityInStock = $quantityInStock,
										buyPrice = $buyPrice,
										MSRP = $MSRP
										WHERE productCode = '$productCode'";
			$result = $this-> _db-> query($sql) or die ('Error: '.$sql);
			return $result;
		}
		
		public function eliminar($productCode){
			$sql = "DELETE from Products WHERE productCode = '$productCode' ";
			$this-> _db-> query($sql) or die ('Error: '.$sql);
			return;
		}
	}

?>