<?php 
	$DB_HOST = "mysql.hostinger.com.br";
	$DB_USER = "u518220322_jaime";
	$DB_PASS = "cPA32nHebJ9S";
	$DB_NAME = "u518220322_site";
	
	/** Reporta erros graves **/ 
	mysqli_report(MYSQLI_REPORT_STRICT); 

	
	/** Abre conexao com o banco **/
	function open_db() { 
		global $DB_HOST, $DB_USER, $DB_PASS, $DB_NAME;
		
		/** PDO Connection **/
		try {
			$conn = new PDO("mysql:host=$DB_HOST;dbname=$DB_NAME", $DB_USER, $DB_PASS);
			// set the PDO error mode to exception
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $conn;
		}
		catch(PDOException $e) {
			echo "Connection failed: " . $e->getMessage();
			return null;
		}
		
		/** MySQLi Object-Oriented
		try { 
			$conn = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
			return $conn;
		} catch (Exception $e) { 
			echo $e->getMessage(); 
			return null; 
		} 
		**/
	} 
	

	/** Fecha conexao com o banco **/ 
	function close_db($conn) { 
		/** PDO Close Connection **/
		try {
			$conn = null;
		} catch (Exception $e) { 
			echo $e->getMessage(); 
		}
		
		/** MySQLi Object-Oriented 
		try { 
			$conn->close(); 
		} catch (Exception $e) { 
			echo $e->getMessage(); 
		} 
		**/
	} 
	
?>