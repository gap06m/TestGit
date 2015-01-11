<?php

	class Database {

		private $host = "localhost";
		private $db_name = "crud";
		private $username = "root";
		private $password = "";
		public $conn;

		// Get database connection
		public function getConnection() {

			$this->conn = null;

			try {
				$this->conn = new PDO("mysql:host=".$this->host.";dbname=".$this->db_name, $this->username, $this->password);
			} catch(PDOException $exception) {
				echo "Connection Error: " . $exception->getMessage();
			}

			return $this->conn;

		}

	}

?>