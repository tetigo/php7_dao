<?php
	class Usuario{
		private $idusuario;
		private $deslogin;
		private $dessenha;
		private $dtcadastro;

		public function getIdUsuario(){
			return $this->idusuario;
		}
		public function getDesLogin(){
			return $this->deslogin;
		}
		public function getDesSenha(){
			return $this->dessenha;
		}
		public function getDTCadastro(){
			return $this->dtcadastro;
		}
		public function setIdUsuario($value){
			$this->idusuario = $value;
		}
		public function setDesLogin($value){
			$this->deslogin = $value;
		}
		public function setDesSenha($value){
			$this->dessenha = $value;
		}
		public function setDTCadastro($value){
			$this->dtcadastro = $value;
		}

		public function loadByID($id){
			$dao = new DAO();
			$results = $dao->select("select * from tb_usuarios where idusuario = :ID", array(':ID' => $id));
			if(count($results) > 0){
				$linha = $results[0];
				$this->setData($linha);
			}
		}

		public function __toString(){
			return json_encode(array(
				'idusuario' => $this->getIdUsuario(),
				'deslogin' => $this->getDesLogin(),
				'dessenha' => $this->getDesSenha(),
				'dtcadastro' => $this->getDTCadastro()->format('d-m-Y H:i:s')
			));
		}

		public static function getList(){
			$dao = new DAO();
			return $dao->select("select * from  tb_usuarios;");
		}

		public static function search($login){
			$dao = new DAO();
			return $dao->select("select * from tb_usuarios where deslogin like :SEARCH", array(':SEARCH'=>"%".$login."%"));
		}

		public function login($login, $senha){
			$dao = new DAO();
			$results = $dao->select("select * from tb_usuarios where deslogin = :LOGIN and dessenha = :SENHA", array(':LOGIN' => $login, ':SENHA' => $senha));
			if(count($results) > 0){
				$linha = $results[0];
				$this->setData($linha);
			}
			else{
				throw new Exception("Login e/ou Senha Invalidos");
			}
		}

		public function setData($linha){
			$this->setIdUsuario($linha['idusuario']);
			$this->setDesLogin($linha['deslogin']);
			$this->setDesSenha($linha['dessenha']);
			$this->setDTCadastro(new DateTime($linha['dtcadastro']));			
		}

		public function __construct($login="", $pass=""){
			$this->setDesLogin($login);
			$this->setDesSenha($pass);
		}

		public function insert(){
			$dao = new DAO();
			//$results = $dao->query("");
			$results = $dao->select("CALL sp_usuarios_insert(:LOGIN, :PASS)", array(
								':LOGIN'=>$this->getDesLogin(), 
								':PASS'=>$this->getDesSenha())
			);
			if(count($results) > 0){
				$this->setData($results[0]);
			}
		}

	}
?>