<?php
	require_once 'db.php'; 
	
	function find_promo() {
		$db = open_db();
		$found = null;
		
		try {
			/**$sql = ";";
			$stmt = $pdo->prepare($sql);
			$activation = "1"; 
			$stmt->bindValue(":activation", $activation);
			$found = $stmt->execute();
			
			$activation = "1";
			
			$stmt->bindParam(':activation', $activation)
			**/
			// prepare sql and bind parameters
			$stmt = $db->prepare("SELECT * FROM promos WHERE activation = 1 LIMIT 1");;
			$stmt->execute();
			//$found = $stmt->setFetchMode(PDO::FETCH_ASSOC);
			$found = $stmt->fetch(PDO::FETCH_ASSOC);
		} catch (Exception $e) {
			$_SESSION['message'] = $e->GetMessage();
			$_SESSION['type'] = 'danger';
		}
		close_db($db);
		return $found;
	}
	
?>





























