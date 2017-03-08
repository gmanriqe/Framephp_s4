<?php 
	Class indexController extends Controller {
		
		public function __construct(){
			parent::__construct();
		}
		
		public function index(){
			$this-> _view-> renderizar('index',true);
		}
		
		public function login(){
			$usuario = $_POST['usuario'];
			$clave = $_POST['clave'];
			
			$objModel = $this-> loadModel('usuario');
			if( $objModel-> autenticar($usuario,$clave) ){
				$_SESSION['usuario'] = $usuario;
				$this-> redireccionar ('index/panel');
			}else {
				$this-> _view-> renderizar('index',true);
			}
		}
		
		public function panel(){
			if( isset( $_SESSION['usuario'] )){
				$this-> _view-> renderizar('panel',true); 
			}else {
				$this-> redireccionar('index/index');
			}
		}
		
		public function logout(){
			unset($_SESSION['usuario']);
			$this-> redireccionar('index/index');
		}
	}

?>