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
					
					<!-- inicio conteudo_adm -->					<div class="col-lg-1 col-md-1 visible-lg visible-md hidden-sm hidden-xs"></div>					<div class="com-lg-5 col-md-5 visible-lg visible-md hidden-sm hidden-xs">
				<?php 	if (isset($disable)) { ?>
							<div class="col-md-12">
								<form class="form-horizontal text-center" action="" method="post">
									<p class="alert alert-warning" role="alert">Deseja <u>desativar</u> seu próprio perfil?</p>
									<p class="alert alert-info" role="alert">
										Se confirmar, não consiguirá acessar mais essa área.<br>
										Outro administrador deverá reativar seu perfil!<br>
										Você será deslogado de imediato!
									</p>
									<div class="form-group has-warning">
										<div class="col-sm-12">
											<select name="disable" class="form-control" id="inputStatus" autofocus>
												<option value="0" selected >Desativar</option>
											</select>
										</div>
									</div>
									
									<div class="form-group">
										<div class="col-sm-6">
											<a href="#" class="btn btn-warning btn-block" data-toggle="modal" data-target=".confirmDisable">Confirmar</a>
										</div>
										<div class="col-sm-6">
											<a class="btn btn-default btn-block" href="<?=BASEURL;?>admin/view/" role="button">Cancelar</a>
										</div>
									</div>
								</form>
							</div>
				<?php 	} else { ?>
							<p class="text-center">Página indisponível.</p>
				<?php 	}?>					</div>					<div class="col-lg-3 col-md-3 visible-lg visible-md hidden-sm hidden-xs"></div>
					<!-- fim conteudo_adm -->				</div>			</div>		</section>		<!-- fim admins section -->				<!-- incio section de modais -->		<section class="section" >			<!-- inicio modal carregando -->			<div id="l" class="modal fade loading" tabindex="-1" role="" >				<div id="load" class="modal-dialog modal-md" role="document"></div>			</div>			<!-- fim modal carregando -->
			
			<!-- inicio modal confirmDisable -->
			<div class="modal fade confirmDisable" tabindex="-1" role="dialog" aria-labelledby="confirmDisable">
				<div class="modal-dialog modal-md" role="document">
					<div class="modal-content">
						<div class="modal-body table-responsive">
							<div class="col-lg-12 col-md-12 text-center">
								<p>Tem certeza que deseja desativar sua conta?</p>
								<span class="help-block">
									Se confirmar, não consiguirá acessar mais essa área.<br>
									Outro administrador deverá reativar seu perfil!<br>
									Você será deslogado de imediato!
								</span>
								<br>
								<a href="?disableAccount=y" class="btn btn-default" >Confirmar</a>
								<button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- fim modal confirmDisable -->			
<?php 		include(OFF_TEMPLATE_ADM); ?>		</section>		<!-- fim section de modais -->
		
		<script type="text/javascript" >
			$(document).ready(function() {
				$('#collapseLogged').addClass("in");
			});
		</script><?php 	include(FOOTER_TEMPLATE_ADM); ?>