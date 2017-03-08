<?php 
	Class usuarioController extends Controller {
		public function __construct(){
			parent::__construct();
		}
		
		//listar usuarios
		public function index() {
			$objModel = $this-> loadModel('usuario');
			$this-> _view-> usuarios= $objModel-> listarUsuarios();
			
			$this-> _view-> renderizar('index',true);
		}
		
		//formulario editar usuario
		public function formEditar($idusuario =''){
			$objModel = $this-> loadModel('usuario');
			$this-> _view-> dataUsuario= $objModel-> formEditar($idusuario);
			$this-> _view-> renderizar('editarUsuario',true);
		}
		
		//editar usuario
		public function editar(){
			$idusuario = trim($_POST['idusuario']);
			$nombre = trim($_POST['nombre']);
			$email = trim($_POST['email']);
			$rol = $_POST['rol'];
			$fechareg = trim($_POST['fechareg']);
			
			$objModel = $this-> loadModel('usuario');
			$objModel-> editar($idusuario,$nombre,$email,$rol,$fechareg);
			
			$this-> redireccionar('usuario/index');
		}
		
		//formulario añadir un usuario
		public function formInsertar(){
			$this-> _view-> renderizar('insertarUsuario',true);
		}
		
		//insertar un usuario
		public function insertar(){
			$idusuario = trim($_POST['idusuario']);
			$nombre = trim($_POST['nombre']);
			$clave1 = trim($_POST['clave1']);
			$clave2 = trim($_POST['clave2']);
			$email = trim($_POST['email']);
			$rol = $_POST['rol'];
			
			if($clave1 == $clave2){
				$objModel = $this-> loadModel('usuario');
				$objModel-> insertar($idusuario,$nombre,$clave1,$email,$rol);
				$this-> redireccionar('index/panel');
			}
			//si las contraseñas son distintas, hace esto
			$this-> redireccionar('usuario/formInsertar');
			
		}
		
		public function eliminar($idusuario){
			$objModel = $this-> loadModel('usuario');
			$objModel-> eliminar($idusuario);
			$this-> redireccionar('usuario/index');
		}
		
	}

?>