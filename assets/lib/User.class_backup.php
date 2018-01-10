<?php
	require_once 'Connection.class.php';
	require_once 'Functions.class.php';
	
	//Classe de usuário 
	class User {
		
		private $conn; 
		private $objFunc; 
		
		private $idUser; 
		private $name; 
		private $login; 
		private $pass; 
		private $dateCa; 
		private $dateUp; 
		private $active; 
		
		//Construtor
		public function __construct () {
			$this->conn = new Connection();
			$this->objFunc = new Functions();
		}
		
		public function __set($attribute, $value) {
			$this->attribute = $value;
		}
		
		public function __get($attribute) {
			return $this->attribute;
		}
		
		// Consulta usuário no banco, se receber parâmetro, senão, todos
		public function qSelect($id = NULL, $login = NULL) { 
			try{ 
				if ($id) {
					$this->idUser = $this->objFunc->base64($id, 2);
					
					$stmt = $this->conn->open_db()->prepare("SELECT * FROM `users` WHERE `idUser` = :idU;");
					$stmt->bindParam(":idU", $this->idUser, PDO::PARAM_INT);
					
					return (($stmt->execute()) ? $stmt->fetch() : false);
					
				} elseif ($login) {
					$this->login = $login;
					
					$stmt = $this->conn->open_db()->prepare("SELECT `idUser`, `name`, `login`, `pass`, `active` FROM `users` WHERE `login` = :login;");
					$stmt->bindParam(":login", $this->login, PDO::PARAM_STR);
					
					return ((($stmt->execute()) && ($stmt->rowCount() != 0)) ? $stmt->fetch() : false);

				} else {
					// $this->active = 1;
					$stmt = $this->conn->open_db()->prepare("SELECT `idUser`, `name`, `login`, `dateCa`, `dateUp`, `active` FROM `users` ORDER BY dateCa ASC, name ASC;");
					// $stmt->bindParam(":active", $this->active, PDO::PARAM_INT);
					return (($stmt->execute()) ? $stmt->fetchAll() : false);
					
				}
			} catch (PDOException $e) {
				return "ERRO: " . $e->getMessage(); 
			}
		}
		
		// Valida se um login ja existe no banco
		public function qSelectLogins($login, $type) { 
			switch($type) {
				case 1: 
					try{
						$this->login = $login;
						$stmt = $this->conn->open_db()->prepare("SELECT * FROM `users` WHERE `login` = :login;");
						$stmt->bindParam(":login", $this->login, PDO::PARAM_STR);
						
						return (($stmt->execute() && $stmt->rowCount() > 0) ? true : false);
						
					} catch (PDOException $e) {
						return "ERRO: " . $e->getMessage(); 
					}
					break;
				case 2:
					try{
						$this->login = $login;
						$stmt = $this->conn->open_db()->prepare("SELECT * FROM `users` WHERE `login` = :login;");
						$stmt->bindParam(":login", $this->login, PDO::PARAM_STR);
						
						if ($stmt->execute() && $stmt->rowCount() > 0) {
							$r = $stmt->fetch();
							return ($r['idUser'] == $_SESSION['idUser'] ? false : true);
						}
					} catch (PDOException $e) {
						return "ERRO: " . $e->getMessage(); 
					}
					break;
			}
		}
		
		// Insere um usuário novo no banco
		public function qInsert($data) {
			try {
				$this->name = $this->objFunc->treatCharacter($data['name'],1);
				$this->login = $this->objFunc->treatCharacter(strtolower($data['login']),1);
				$this->pass = password_hash($data['pass2'], PASSWORD_BCRYPT);
				$this->dateCa = $this->objFunc->currentDate(2);
				$this->dateUp = $this->dateCa;
				$this->active = 0;
				
				$stmt = $this->conn->open_db()->prepare("INSERT INTO `users` (`name`, `login`, `pass`, `dateCa`, `dateUp`, `active`) VALUES (:name, :login, :pass, :dateCa, :dateUp, :active);");
				$stmt->bindParam(":name", $this->name, PDO::PARAM_STR);
				$stmt->bindParam(":login", $this->login, PDO::PARAM_STR);
				$stmt->bindParam(":pass", $this->pass, PDO::PARAM_STR);
				$stmt->bindParam(":dateCa", $this->dateCa, PDO::PARAM_STR);
				$stmt->bindParam(":dateUp", $this->dateUp, PDO::PARAM_STR);
				$stmt->bindParam(":active", $this->active, PDO::PARAM_INT);
				
				return (($stmt->execute()) ? true : false);

			} catch (PDOException $e) {
				return "ERRO: " . $e->getMessage();
			}
		}
		
		// Atualiza dados de um usuário
		public function qUpdate($data, $type) {
			switch($type) {
				case 1: 
					try {
						$this->idUser = $this->objFunc->base64($data['idU'], 2);
						$this->name = $this->objFunc->treatCharacter($data['name'],1);
						$this->dateUp = $this->objFunc->currentDate(2);
						$stmt = $this->conn->open_db()->prepare("UPDATE `users` SET `name` = :name, `dateUp` = :dateUp WHERE `idUser` = :idUser;");
						$stmt->bindParam(":name", $this->name, PDO::PARAM_STR);
						$stmt->bindParam(":dateUp", $this->dateUp, PDO::PARAM_STR);
						$stmt->bindParam(":idUser", $this->idUser, PDO::PARAM_INT);
						
						return (($stmt->execute()) ? true : false);

					} catch (PDOException $e) {
						return "ERRO: " . $e->getMessage();
					}
					break;
				case 2:
					try {
						$this->idUser = $this->objFunc->base64($data['idU'], 2);
						$this->name = $data['name'];
						$this->login = $data['login'];
						$this->dateUp = $this->objFunc->currentDate(2);
						$stmt = $this->conn->open_db()->prepare("UPDATE `users` SET `name` = :name, `login` = :login, `dateUp` = :dateUp WHERE `idUser` = :idUser;");
						$stmt->bindParam(":name", $this->name, PDO::PARAM_STR);
						$stmt->bindParam(":login", $this->login, PDO::PARAM_STR);
						$stmt->bindParam(":dateUp", $this->dateUp, PDO::PARAM_STR);
						$stmt->bindParam(":idUser", $this->idUser, PDO::PARAM_INT);
						
						return (($stmt->execute()) ? true : false);

					} catch (PDOException $e) {
						return "ERRO: " . $e->getMessage();
					}
					break;
			}
		}
		
		// Atualiza só status de um usuário
		public function qUpdateStatus($data) {
			try {
				$this->idUser = $this->objFunc->base64($data['idU'], 2);
				$this->active = $data['status'];
				$this->dateUp = $this->objFunc->currentDate(2);
				
				$stmt = $this->conn->open_db()->prepare("UPDATE `users` SET `dateUp` = :dateUp, `active` = :active WHERE `idUser` = :idUser;");
				$stmt->bindParam(":dateUp", $this->dateUp, PDO::PARAM_STR);
				$stmt->bindParam(":active", $this->active, PDO::PARAM_INT);
				$stmt->bindParam(":idUser", $this->idUser, PDO::PARAM_INT);
				
				return (($stmt->execute()) ? true : false);

			} catch (PDOException $e) {
				return "ERRO: " . $e->getMessage();
			}
		}
		
		// Atualiza senha de um usuário
		public function qUpdatePass($data) {
			try {
				$this->idUser = $this->objFunc->base64($data['idU'], 2);
				$this->pass = password_hash($data['pass2'], PASSWORD_BCRYPT);
				$this->dateUp = $this->objFunc->currentDate(2);
				
				$stmt = $this->conn->open_db()->prepare("UPDATE `users` SET `pass` = :pass, `dateUp` = :dateUp WHERE `idUser` = :idUser;");
				$stmt->bindParam(":pass", $this->pass, PDO::PARAM_STR);
				$stmt->bindParam(":dateUp", $this->dateUp, PDO::PARAM_STR);
				$stmt->bindParam(":idUser", $this->idUser, PDO::PARAM_INT);
				
				return (($stmt->execute()) ? true : false);

			} catch (PDOException $e) {
				return "ERRO: " . $e->getMessage();
			}
		}
		
		// Exclui dados de um usuário do banco 
		public function qDelete($data) {
			try {
				$this->idUser = $this->objFunc->base64($data['idU'], 2);
				
				$stmt = $this->conn->open_db()->prepare("DELETE FROM `users` WHERE `idUser` = :idUser;");
				$stmt->bindParam(":idUser", $this->idUser, PDO::PARAM_INT);
				
				return (($stmt->execute()) ? true : false);

			} catch (PDOException $e) {
				return "ERRO: " . $e->getMessage();
			}
		}
		
		// Valida senha antes de alteração
		public function validaPass($pass, $id) {
			$this->idUser = $id;
			$this->pass = $pass;
			$result = $this->qSelect($this->idUser, null);
			return ((($result != null) && (password_verify($this->pass, $result['pass']))) ? true : false);
		}
		
		// Valida a entrada do usuário
		public function validaLogin($data) {
			$this->login = strtolower($data['login']);
			$this->pass = $data['pass'];
			try {
				$result = $this->qSelect(null, $this->login);
				if (($result != null) && (password_verify($this->pass, $result['pass']))) {
					if($result['active'] == 1) {
						session_start();
						$_SESSION['logado'] = true;
						$_SESSION['idUser'] = $result['idUser'];
						$_SESSION['nameUser'] = $result['name'];
						$_SESSION['loginUser'] = $result['login'];
						
						header('location: ' . BASEURL . 'admin/view/');
						// try {
							// $this->idUser = $result['idUser'];
							// $online = 1;
							// $stmt = $this->conn->open_db()->prepare("UPDATE `users` SET `online` = :online WHERE `idUser` = :idUser;");
							// $stmt->bindParam(":idUser", $this->idUser, PDO::PARAM_INT);
							// $stmt->bindParam(":online", $online, PDO::PARAM_INT);
							// $stmt->execute();
							// $expira = time() + (60*30); 
							// $_SESSION['loginTime'] = $expira;
						// } catch (PDOException $e) {
							// return "ERRO: " . $e->getMessage();
						// }
					} else {
						// header('location: ' . BASEURL . 'admin/?i=info');
						header('location: ' . BASEURL . 'admin/?a=active');
					}
				} else {
					header('location: ' . BASEURL . 'admin/?e=error');
				}
			} catch (PDOException $e) {
				return "ERRO: " . $e->getMessage();
			}
		}
		
		// public function userConnected($data) {
			// $data = $this->objFunc->base64($data, 1);
			// $result = $this->qSelect($data);
		// }
		
		// Desconecta usuário
		public function userDisconnect($data, $type) {
			switch($type) {
				case 1: 
					try {
						$this->idUser = $data;
						$online = 0;
						$stmt = $this->conn->open_db()->prepare("UPDATE `users` SET `online` = :online WHERE `idUser` = :idUser;");
						$stmt->bindParam(":idUser", $this->idUser, PDO::PARAM_INT);
						$stmt->bindParam(":online", $online, PDO::PARAM_INT);
						$stmt->execute();
						$_SESSION['logado'] = false;
						unset($_SESSION['idUser']);
						unset($_SESSION['nameUser']);
						unset($_SESSION['loginUser']);
						session_destroy();
						header('location: ' . BASEURL . 'admin/?t=time');

					} catch (PDOException $e) {
						return "ERRO: " . $e->getMessage();
					}
					break;
				case 2: 
					try {
						$this->idUser = $data;
						$online = 0;
						$stmt = $this->conn->open_db()->prepare("UPDATE `users` SET `online` = :online WHERE `idUser` = :idUser;");
						$stmt->bindParam(":idUser", $this->idUser, PDO::PARAM_INT);
						$stmt->bindParam(":online", $online, PDO::PARAM_INT);
						$stmt->execute();
						$_SESSION['logado'] = false;
						unset($_SESSION['idUser']);
						unset($_SESSION['nameUser']);
						unset($_SESSION['loginUser']);
						session_destroy();
						header('location: ' . BASEURL . 'admin/');
						
					} catch (PDOException $e) {
						return "ERRO: " . $e->getMessage();
					}
					break;
			}
		}
		
		
		// Numero total de usuarios 
		function getNumberUsers() {
			try {
				$stmt = $this->conn->open_db()->prepare("SELECT count(idUser) FROM `users` GROUP BY idUser;");
				if ($stmt->execute()) {
					return $stmt->rowCount();
				} else {
					return false;
				}
			} catch (Exception $e) {
				return "ERRO: " . $e->getMessage();
			}
		}
	}
?> 