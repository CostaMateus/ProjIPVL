<?php 
	require_once '../../config.php'; 
	require_once USER_API;
	require_once FUNC_API;
	$objUser = new User();
	$objFunc = new Functions();
	session_start();
	if (!$_SESSION['logado']) {
		header('location: ' . BASEURL . 'admin/');
	}
	
	if (!empty($_GET['logout']) == 'y') { 
		sleep(2);
		$objUser->userDisconnect($_SESSION['idUser'], 2);
	}
	
	if (!empty($_GET['disableAccount']) == 'y') { 
		$data = [
			'idU' => $objFunc->base64($_SESSION['idUser'], 1), 
			'status' => '0'
		];
		if ($objUser->qUpdateStatus($data)) {
			header('location: ' . BASEURL . 'admin/?s=stt');
		} else {
			echo '<script type="text/javascript">alert("Erro ao desativar a conta!");</script>';
		}
	}
	
	if (!empty($_GET['deleteAccount']) == 'y') { 
		$data = [
			'idU' => $objFunc->base64($_SESSION['idUser'], 1), 
			'status' => '0'
		];
		if ($objUser->qDelete($data)) {
			header('location: ' . BASEURL . 'admin/');
		} else {
			echo '<script type="text/javascript">alert("Erro ao excluir dado!");</script>';
		}
	}
	
	//POST para apenas alterar o status da conta (on/off)
	if(isset($_POST['btnSaveStatus'])) {
		if ($objUser->qUpdateStatus($_POST)) { 
			if($_SESSION['idUser'] != $disable['idUser']) {
				header('location: ' . BASEURL . 'admin/view/view_users.php');
			} else {
				header('location: ' . BASEURL . 'admin/?s=stt');
			}
		} else{
			echo '<script type="text/javascript">alert("Erro ao salvar modificação!");</script>';
		}
	}
	//POST para editar dados da conta (nome, login)
	if (isset($_POST['btnSaveEdition'])) {
		if (!$objUser->qSelectLogins($_POST['login'], 2)) {
			if ($objUser->qUpdate($_POST, 2)) {
				if ($_POST['login'] != $_SESSION['loginUser']) {
					$_SESSION['logado'] = false;
					header('location: ' . BASEURL . 'admin/?m=mod');
				} else {
					header('location: ' . BASEURL . 'admin/view/');
				}
			} else {
				echo '<script type="text/javascript">alert("Erro ao salvar modificação!");</script>';
			}
		} else {
			$loginExtt = true;
		}
	}
	//POST para editar senha
	if (isset($_POST['btnSavePasswordChange'])) {
		if ($_POST['pass2'] == $_POST['pass3']) {
			// echo "senha iguais";
			if ($objUser->validaPass($_POST['pass1'], $_POST['idU'])) {
				if ($objUser->qUpdatePass($_POST)) {
					$_SESSION['logado'] = false;
					header('location: ' . BASEURL . 'admin/?m=mod');
				} else {
					echo '<script type="text/javascript">alert("Erro ao salvar modificação!");</script>';
				}
			} else {
				$senhaInv1 = true;
			}
		} else {
			$senhaInv2 = true;
		}
	}
	if (isset($_GET['action'])) {
		$temp = $objUser->qSelect($objFunc->base64($_SESSION['idUser'], 1), null);
		switch($_GET['action']) {
			case 'edit': 
				$edit = $temp;
				break;
			case 'disable': 
				$disable = $temp;
				break;
			case 'delete': 
				$delete = $temp;
				break;
		}
	}
	
	include(HEADER_TEMPLATE_ADM); 
?> 
		<!-- inicio quemsomos section -->
		<section id="index" class="section" style="background-color:#FFF!important;">
			<div class="container-fluid">
				<br>
<?php 				include(AREA_ADM_TEMPLATE_ADM); ?>
				<div class="row visible-lg visible-md hidden-sm hidden-xs">
					<?php include(MENU_TEMPLATE_ADM);?>
					
					<!-- inicio conteudo_adm -->
								<div class="form-group <?=(isset($senhaInv1) ? "has-error" : "");?>">
								<div class="form-group <?=(isset($senhaInv2) ? "has-error" : "");?>">
							<p class="text-center">Página indisponível.</p>
<?php 					}?>
					<!-- fim conteudo_adm -->
		
		<script type="text/javascript" >
			$(document).ready(function() {
				$('#collapseLogged').addClass("in");
			});
		</script>