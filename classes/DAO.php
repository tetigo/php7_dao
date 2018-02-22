<?php
	class DAO{
		private $conn;

		public function __construct(){
			$this->conn = new PDO("mysql:dbname=test;host=localhost;port=3307","root","");
		}

		private function setParams($statement, $parameters = array()){
			foreach ($parameters as $key => $value) {
				$this->setParam($statement, $key, $value);
			}
		}

		private function setParam($statement, $key, $value){
			$statement->bindParam($key, $value);
		}

		public function query($rowQuery, $params = array()){
			$stmt = $this->conn->prepare($rowQuery);
			$this->setParams($stmt, $params);
			$stmt->execute();
			return $stmt;
		}

		public function select($rowQuery, $params = array()){
			$stmt = $this->query($rowQuery, $params);
			return $stmt->fetchAll(PDO::FETCH_ASSOC);			
		}

	}	




?>