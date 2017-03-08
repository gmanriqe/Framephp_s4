<?php 
	Class usuarioModel extends Model {
		public function __construct(){
			parent::__construct();
		}
		
		public function autenticar($usuario,$clave){
			$sql = "SELECT * FROM usuarios WHERE idusuario='$usuario' and clave=SHA1('$clave')";
			$result = $this-> _db-> query($sql) or die('Error '.$sql);
			
			if($result->num_rows){
				return true;
			}else {
				return false;
			}
		}
		
		public function listarUsuarios() {
			$sql = 'SELECT idusuario,nombre,email,rol,fechareg FROM usuarios';
			$result = $this-> _db-> query($sql) or die('Error '.$sql);
			return $result;
		}
		
		public function formEditar($idusuario) {
			$sql = "SELECT * FROM usuarios WHERE idusuario = '$idusuario'";
			$result = $this-> _db-> query($sql) or die ('Error '.$sql);
			$reg = null;
			
			if($result -> num_rows){
				$reg = $result-> fetch_object();
			}
			return $reg;
		}
		
		public function editar($idusuario,$nombre,$email,$rol,$fechareg){
			$sql = "UPDATE usuarios SET nombre = '$nombre',
										email = '$email',
										rol = '$rol',
										fechareg = '$fechareg' 
										WHERE idusuario = '$idusuario'";
			$result = $this-> _db-> query($sql) or die('Error '.$sql);
			return $result;
		}
		
		public function insertar($idusuario,$nombre,$clave,$email,$rol){
			$sql = "INSERT INTO usuarios SET idusuario = '$idusuario',
									  nombre = '$nombre',
									  clave = SHA1('$clave'),
									  email = '$email',
									  rol = '$rol',
									  fechareg = now()";
			
			$this-> _db-> query($sql) or die ('Error: '.$sql);
			return;						  		
		}
		
		public function eliminar($idusuario){
			$sql = "DELETE FROM usuarios WHERE idusuario = '$idusuario'";
			$result = $this-> _db-> query($sql) or die('Error: '.$sql);
			return;
		}
	}
?>