<?php
	require_once 'Connection.class.php';
	
	//Classe de funções 
	class Functions {
		
		// Trata caracteres 
		public function treatCharacter($value, $type) {
			switch($type) {
				case 1: 
					$result = utf8_decode($value); 
					break;
				case 2: 
					$result = htmlentities($value, ENT_QUOTES, "ISO-8859-1");
					break;
			}
			return $result;
		}
		
		// Data atual 
		public function currentDate($type) {
			switch($type) {
				case 1: 
					$result = date("Y-m-d"); 
					break;
				case 2: 
					$result = date("Y-m-d H:i:s");
					break;
				case 3: 
					$result = date("d/m/Y");
					break;
			}
			return $result;
		}
		
		
		// Formatação da data para exibição
		public function fDate($date) {
			return Datetime::createFromFormat('Y-m-d H:i:s', $date)->format('H:m d/m/Y'); 
		}
		
		// Codificação de ID's 
		public function base64($value, $type) {
			switch($type) {
				case 1: 
					$result = base64_encode($value); 
					break;
				case 2: 
					$result = base64_decode($value);
					break;
			}
			return $result;
		}
		
		function echoActiveClassIfRequestMatches($value) {
			$current_file_name = basename($_SERVER['REQUEST_URI'], ".php");
			if (strpos($current_file_name, $value) !== false) {
				echo 'active';
			}
		}
		
		
		
/** =========================================== TODAS FUNÇÕES DAS PROMOÇÕES ABAIXO ===============================
		// Busca promoção ativa
		function getActivePromo() {
			$conn = new Connection();
			$active = 1;
			try {
				$stmt = $conn->open_db()->prepare("SELECT * FROM `promos` WHERE `activation` = :active ORDER BY id DESC;");
				$stmt->bindParam(":active", $active, PDO::PARAM_INT);
				if ($stmt->execute()) {
					return $stmt->fetch();
				} else {
					return false;
				}
			} catch (Exception $e) {
				return "ERRO: " . $e->getMessage();
			}
		}
		// Busca todas as promoções cadastradas
		function qSelectAllPromos() {
			$conn = new Connection();
			try {
				$stmt = $conn->open_db()->prepare("SELECT * FROM `promos`;");
				if ($stmt->execute()) {
					return $stmt->fetchAll();
				} else {
					return false;
				}
			} catch (Exception $e) {
				return "ERRO: " . $e->getMessage();
			}
		}
		// Busca promoção por id
		function qSelectPromo($data) {
			$conn = new Connection();
			$id = $this->base64($data, 2);
			try {
				$stmt = $conn->open_db()->prepare("SELECT * FROM `promos` WHERE `id` = :id;");
				$stmt->bindParam(":id", $id, PDO::PARAM_INT);
				if ($stmt->execute()) {
					return $stmt->fetch();
				} else {
					return false;
				}
			} catch (Exception $e) {
				return "ERRO: " . $e->getMessage();
			}
		}
		// Atualiza promoção por id
		function qUpdatePromoStatus($data) {
			$conn = new Connection();
			$id = $this->base64($data['id'], 2);
			$status= $data['status'];
			try {
				$stmt = $conn->open_db()->prepare("UPDATE `promos` SET `activation` = :status WHERE `id` = :id;");
				$stmt->bindParam(":status", $status, PDO::PARAM_INT);
				$stmt->bindParam(":id", $id, PDO::PARAM_INT);
				if ($stmt->execute()) {
					return true;
				} else {
					return false;
				}
			} catch (Exception $e) {
				return "ERRO: " . $e->getMessage();
			}
		}
 =========================================== TODAS FUNÇÕES DAS PROMOÇÕES ACIMA ===============================**/
		
		
		
/** =========================================== TODAS FUNÇÕES DOS DESTAQUES ABAIXO ===============================
		// Busca todos os destaques cadastrados
		function qSelect4Destaques() {
			$conn = new Connection();
			$active = 1; 
			try {
				$stmt = $conn->open_db()->prepare("SELECT * FROM `destaques` WHERE `activation` = :active LIMIT 4;");
				$stmt->bindParam(":active", $active, PDO::PARAM_INT);
				if ($stmt->execute()) {
					return $stmt->fetchAll();
				} else {
					return false;
				}
			} catch (Exception $e) {
				return "ERRO: " . $e->getMessage();
			}
		}		
		// Busca todos os destaques cadastrados
		function qSelectAllDestaques() {
			$conn = new Connection();
			try {
				$stmt = $conn->open_db()->prepare("SELECT * FROM `destaques`;");
				if ($stmt->execute()) {
					return $stmt->fetchAll();
				} else {
					return false;
				}
			} catch (Exception $e) {
				return "ERRO: " . $e->getMessage();
			}
		}
		// Busca destaque por id
		function qSelectDestaque($data) {
			$conn = new Connection();
			$id = $this->base64($data, 2);
			try {
				$stmt = $conn->open_db()->prepare("SELECT * FROM `destaques` WHERE `id` = :id;");
				$stmt->bindParam(":id", $id, PDO::PARAM_INT);
				if ($stmt->execute()) {
					return $stmt->fetch();
				} else {
					return false;
				}
			} catch (Exception $e) {
				return "ERRO: " . $e->getMessage();
			}
		}
		// Atualiza destaque por id
		function qUpdateDestaqueStatus($data) {
			$conn = new Connection();
			$id = $this->base64($data['id'], 2);
			$status= $data['status'];
			try {
				$stmt = $conn->open_db()->prepare("UPDATE `destaques` SET `activation` = :status WHERE `id` = :id;");
				$stmt->bindParam(":status", $status, PDO::PARAM_INT);
				$stmt->bindParam(":id", $id, PDO::PARAM_INT);
				if ($stmt->execute()) {
					return true;
				} else {
					return false;
				}
			} catch (Exception $e) {
				return "ERRO: " . $e->getMessage();
			}
		}
		// Exclui destaque por id
		function qDeleteDestaque($data) {
			// $conn = new Connection();
			// $id = $this->base64($data['id'], 2);
			// $status= $data['status'];
			// try {
				// $stmt = $conn->open_db()->prepare("UPDATE `destaques` SET `activation` = :status WHERE `id` = :id;");
				// $stmt->bindParam(":status", $status, PDO::PARAM_INT);
				// $stmt->bindParam(":id", $id, PDO::PARAM_INT);
				// if ($stmt->execute()) {
					// return true;
				// } else {
					// return false;
				// }
			// } catch (Exception $e) {
				// return "ERRO: " . $e->getMessage();
			// }
		}
 =========================================== TODAS FUNÇÕES DOS DESTAQUES ACIMA ===============================**/



/**=============================================== CONSULTAS DA IPVL =========================================**/


		// get para a home
		function getLastUpload() {
			$conn = new Connection();
			$active = 1; 
			try {
				$stmt = $conn->open_db()->prepare("SELECT * FROM `ip_msgs` WHERE `active` = :active ORDER BY id DESC LIMIT 9;");
				$stmt->bindParam(":active", $active, PDO::PARAM_INT);
				if ($stmt->execute()) {
					return $stmt->fetchAll();
				} else {
					return false;
				}
			} catch (Exception $e) {
				return "ERRO: " . $e->getMessage();
			}
		}
		
//======DEVOCIONAL======
		
		// get pra pagina adm
		function getDevocional() {
			
		}
		// get pra pagina de mensagens (base/mensagens/)
		function getLastDevocionais() {
			$conn = new Connection();
			$active = 1; 
			$category = "devocional";
			try {
				$stmt = $conn->open_db()->prepare("SELECT * FROM `ip_msgs` WHERE `active` = :active AND `category` = :devocional ORDER BY id DESC LIMIT 6;");
				$stmt->bindParam(":active", $active, PDO::PARAM_INT);
				$stmt->bindParam(":devocional", $category, PDO::PARAM_STR);
				if ($stmt->execute()) {
					return $stmt->fetchAll();
				} else {
					return false;
				}
			} catch (Exception $e) {
				return "ERRO: " . $e->getMessage();
			}
		}
		// get pra a pagina de devocionais (base/mensagens/devocionais/)
		function getAllDevocionais() {
			$conn = new Connection();
			$active = 1; 
			$category = "devocional";
			try {
				$stmt = $conn->open_db()->prepare("SELECT * FROM `ip_msgs` WHERE `active` = :active AND `category` = :devocional ORDER BY id DESC;");
				$stmt->bindParam(":active", $active, PDO::PARAM_INT);
				$stmt->bindParam(":devocional", $category, PDO::PARAM_STR);
				if ($stmt->execute()) {
					return $stmt->fetchAll();
				} else {
					return false;
				}
			} catch (Exception $e) {
				return "ERRO: " . $e->getMessage();
			}
		}
		// get numero de estudos
		function getNumberDevocionais() {
			$conn = new Connection();
			// $active = 1;
			// `active` = :active AND 
			$category = "devocional";
			try {
				$stmt = $conn->open_db()->prepare("SELECT count(id) FROM `ip_msgs` WHERE `category` = :devocional GROUP BY id;");
				// $stmt->bindParam(":active", $active, PDO::PARAM_INT);
				$stmt->bindParam(":devocional", $category, PDO::PARAM_STR);
				if ($stmt->execute()) {
					return $stmt->rowCount();
				} else {
					return false;
				}
			} catch (Exception $e) {
				return "ERRO: " . $e->getMessage();
			}
		}
		
		
//======ESTUDOS======
		// get pra pagina de mensagens (base/mensagens/)
		function getLastEstudos() {
			$conn = new Connection();
			$active = 1; 
			$category = "estudo";
			try {
				$stmt = $conn->open_db()->prepare("SELECT * FROM `ip_msgs` WHERE `active` = :active AND `category` = :estudo ORDER BY id DESC LIMIT 6;");
				$stmt->bindParam(":active", $active, PDO::PARAM_INT);
				$stmt->bindParam(":estudo", $category, PDO::PARAM_STR);
				if ($stmt->execute()) {
					return $stmt->fetchAll();
				} else {
					return false;
				}
			} catch (Exception $e) {
				return "ERRO: " . $e->getMessage();
			}
		}
		// get pra pagina de estudos (base/mensagens/estudos/)
		function getAllEstudos() {
			$conn = new Connection();
			$active = 1; 
			$category = "estudo";
			try {
				$stmt = $conn->open_db()->prepare("SELECT * FROM `ip_msgs` WHERE `active` = :active AND `category` = :estudo ORDER BY id DESC;");
				$stmt->bindParam(":active", $active, PDO::PARAM_INT);
				$stmt->bindParam(":estudo", $category, PDO::PARAM_STR);
				if ($stmt->execute()) {
					return $stmt->fetchAll();
				} else {
					return false;
				}
			} catch (Exception $e) {
				return "ERRO: " . $e->getMessage();
			}
		}
		// get numero de estudos
		function getNumberEstudos() {
			$conn = new Connection();
			// $active = 1; 
			// `active` = :active AND 
			$category = "estudo";
			try {
				$stmt = $conn->open_db()->prepare("SELECT count(id) FROM `ip_msgs` WHERE `category` = :estudo GROUP BY id;");
				// $stmt->bindParam(":active", $active, PDO::PARAM_INT);
				$stmt->bindParam(":estudo", $category, PDO::PARAM_STR);
				if ($stmt->execute()) {
					return $stmt->rowCount();
				} else {
					return false;
				}
			} catch (Exception $e) {
				return "ERRO: " . $e->getMessage();
			}
		}
		
		
//======PREGACOES======
		
		// get pra pagina de mensagens (base/mensagens/)
		function getLastPregacoes() {
			$conn = new Connection();
			$active = 1; 
			$category = "pregacao";
			try {
				$stmt = $conn->open_db()->prepare("SELECT * FROM `ip_msgs` WHERE `active` = :active AND `category` = :pregacao ORDER BY id DESC LIMIT 6;");
				$stmt->bindParam(":active", $active, PDO::PARAM_INT);
				$stmt->bindParam(":pregacao", $category, PDO::PARAM_STR);
				if ($stmt->execute()) {
					return $stmt->fetchAll();
				} else {
					return false;
				}
			} catch (Exception $e) {
				return "ERRO: " . $e->getMessage();
			}
		}
		// get pra pagina de pregações (base/mensagens/pregacoes/)
		function getAllPregacoes() {
			$conn = new Connection();
			$active = 1; 
			$category = "pregacao";
			try {
				$stmt = $conn->open_db()->prepare("SELECT * FROM `ip_msgs` WHERE `active` = :active AND `category` = :pregacao ORDER BY id DESC;");
				$stmt->bindParam(":active", $active, PDO::PARAM_INT);
				$stmt->bindParam(":pregacao", $category, PDO::PARAM_STR);
				if ($stmt->execute()) {
					return $stmt->fetchAll();
				} else {
					return false;
				}
			} catch (Exception $e) {
				return "ERRO: " . $e->getMessage();
			}
		}
		// get numero de pregacoes
		function getNumberPregacoes() {
			$conn = new Connection();
			// $active = 1; 
			// `active` = :active AND 
			$category = "pregacao";
			try {
				$stmt = $conn->open_db()->prepare("SELECT count(id) FROM `ip_msgs` WHERE `category` = :pregacao GROUP BY id;");
				// $stmt->bindParam(":active", $active, PDO::PARAM_INT);
				$stmt->bindParam(":pregacao", $category, PDO::PARAM_STR);
				if ($stmt->execute()) {
					return $stmt->rowCount();
				} else {
					return false;
				}
			} catch (Exception $e) {
				return "ERRO: " . $e->getMessage();
			}
		}
		
		
//======CONTEUDO DO ARTIGO======
		function getConteudo($id, $cat = null) {
			$conn = new Connection();
			$id = $this->base64($id, 2);
			
			try {
				$stmt = $conn->open_db()->prepare("SELECT * FROM `ip_msgs` WHERE `id` = :id;");
				$stmt->bindParam(":id", $id, PDO::PARAM_INT);
				if ($stmt->execute()) {
					return $stmt->fetch();
				} else {
					return false;
				}
			} catch (Exception $e) {
				return "ERRO: " . $e->getMessage();
			}
		}
		
		
		function limitaTexto55($text) {
			if (strlen($text) > 50) {
				$text = substr($text, 0, 50) . "[...]";
			}
			return $text;
		}
		
		function limitaTexto75($text) {
			return substr($text, 0, 70) . "[...]";
		}
		

//======AREA ADMINISTRATIVA======
		// get pra pagina adm
		function getMensagem($data) {
			$conn = new Connection();
			$id = $this->base64($data, 2);
			try {
				$stmt = $conn->open_db()->prepare("SELECT * FROM `ip_msgs` WHERE `id` = :id;");
				$stmt->bindParam(":id", $id, PDO::PARAM_INT);
				if ($stmt->execute()) {
					return $stmt->fetch();
				} else {
					return false;
				}
			} catch (Exception $e) {
				return "ERRO: " . $e->getMessage();
			}
		}
		// update status pagina adm
		function updateStatusMensagem($data) {
			$conn = new Connection();
			$id = $this->base64($data['id'], 2);
			$status= $data['status'];
			try {
				$stmt = $conn->open_db()->prepare("UPDATE `ip_msgs` SET `active` = :status WHERE `id` = :id;");
				$stmt->bindParam(":status", $status, PDO::PARAM_INT);
				$stmt->bindParam(":id", $id, PDO::PARAM_INT);
				if ($stmt->execute()) {
					return true;
				} else {
					return false;
				}
			} catch (Exception $e) {
				return "ERRO: " . $e->getMessage();
			}
		}
		// get pregacoes adm
		function getAllMensagens($msg) {
			$conn = new Connection();
			$category = $msg;
			try {
				$stmt = $conn->open_db()->prepare("SELECT * FROM `ip_msgs` WHERE `category` = :msg ORDER BY id DESC;");
				$stmt->bindParam(":msg", $category, PDO::PARAM_STR);
				if ($stmt->execute()) {
					return $stmt->fetchAll();
				} else {
					return false;
				}
			} catch (Exception $e) {
				return "ERRO: " . $e->getMessage();
			}
		}
		
		// get todos usuarios
	}

?>










