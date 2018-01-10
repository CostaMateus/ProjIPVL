<?php 
	//Classe de conexao
	class Connection {
		
		//Atributos privados da conexao
		private $DB_HOST;
		private $DB_USER;
		private $DB_PASS;
		private $DB_NAME;
		private static $pdo;
		
		//Construtor 
		public function __construct() {
			$this->DB_HOST = "127.0.0.1:3306";
			$this->DB_USER = "root";
			$this->DB_PASS = "";
			$this->DB_NAME = "ipvl";
			
			// $this->DB_HOST = "mysql.hostinger.com.br";
			// $this->DB_USER = "u124689124_ipb";
			// $this->DB_PASS = "BOGo3ud1o8bL"; //alterada
			// $this->DB_NAME = "u124689124_ipvl";
		}
		
		//Metodo para conectar
		public function open_db(){
			try {
				if (is_null(self::$pdo)) {
					self::$pdo = new PDO("mysql:host=".$this->DB_HOST.";dbname=".$this->DB_NAME, $this->DB_USER, $this->DB_PASS);
					// self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					// self::$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
				}
				return self::$pdo;
			} catch(PDOException $e) {
				echo "	<article class='col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center'> 
							<h4>Lamentamos o inconveniente!</h4>
							<p>Sem conexão com o banco de dados.</p>
							<p>Falha na conexão: " . $e->getMessage() . "
						</article>";
			}
		}
	}
	
?>