<?php 
	Class productoController extends Controller {
		
		public function __construct(){
			parent::__construct();
		}
		
		public function index(){
		}
		
		public function listar(){
			$objModel = $this-> loadModel('producto');
			$this-> _view -> dataProducto = $objModel-> listarProductos();
			$this-> _view -> renderizar('index',true);
		}
		
		public function formInsertar() {
			$this-> _view-> renderizar('insertarProducto',true);
			
		}
		
		public function insertar(){
			$productCode = trim($_POST['productCode']);
			$productName = trim($_POST['productName']);
			$productLine = trim($_POST['productLine']);
			$productScale = trim($_POST['productScale']);
			$productVendor = trim($_POST['productVendor']);
			$productDescription = trim($_POST['productDescription']);
			$quantityInStock = trim($_POST['quantityInStock']);
			$buyPrice = trim($_POST['buyPrice']);
			$MSRP = trim($_POST['MSRP']);
			
			$objModel = $this-> loadModel('producto');
			$objModel-> insertar($productCode,$productName,$productLine,$productScale,$productVendor,$productDescription,$quantityInStock,$buyPrice,$MSRP);
			
			$this-> redireccionar('producto/listar');
		}
		
		public function formEditar($productCode=''){
			$objModel = $this-> loadModel('producto');
			$this-> _view-> datosProductos = $objModel-> formEditar($productCode);
			$this-> _view-> renderizar('editarProducto',true);
		}
		
		public function editar(){
			$productCode = trim($_POST['productCode']);
			$productName = trim($_POST['productName']);
			$productLine = trim($_POST['productLine']);
			$productScale = trim($_POST['productScale']);
			$productVendor = trim($_POST['productVendor']);
			$productDescription = trim($_POST['productDescription']);
			$quantityInStock = trim($_POST['quantityInStock']);
			$buyPrice = trim($_POST['buyPrice']);
			$MSRP = trim($_POST['MSRP']);
			
			$objModel = $this-> loadModel('producto');
			$objModel-> editar($productCode,$productName,$productLine,$productScale,$productVendor,$productDescription,$quantityInStock,$buyPrice,$MSRP);
			$this-> redireccionar('producto/listar');
		}
		
		public function eliminar($productCode){
			$objModel = $this-> loadModel('producto');
			$objModel-> eliminar($productCode);
			
			$this-> redireccionar('producto/listar');
		}
		
	}
	
?>