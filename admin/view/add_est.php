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
	
	//POST para editar demais dados da conta (nome, login, senha[n ainda])
	if (isset($_POST['btnSavePasswordChange'])) {
		if ($_POST['pass2'] == $_POST['pass3']) {
			echo "senha iguais";
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
		$temp = $objUser->qSelect($_GET['id']);
		switch($_GET['action']) {
			case 'edit': 
				$user = $temp;
				break;
		}
	}
	
	include(HEADER_TEMPLATE_ADM); 
?> 

		<!-- inicio quemsomos section -->
		<section id="index" class="section" style="background-color:#FFF!important;">
			<div class="container-fluid">
				<br>
				<?php include(AREA_ADM_TEMPLATE_ADM);?>
				
				<div class="row visible-lg visible-md hidden-sm hidden-xs">
					<?php include(MENU_TEMPLATE_ADM);?>
					
					<!-- inicio conteudo_adm -->
					<div class="com-lg-8 col-md-8 visible-lg visible-md hidden-sm hidden-xs">
						<div class="row">
							
						</div>
					</div>
					<div class="com-lg-1 col-md-1 visible-lg visible-md hidden-sm hidden-xs"></div>
					<!-- fim conteudo_adm -->
				</div>
			</div>
		</section>
		<!-- fim admins section -->
		
		<!-- incio section de modais -->
		<section class="section" >
			<!-- inicio modal carregando -->
			<div id="l" class="modal fade loading" tabindex="-1" role="" >
				<div id="load" class="modal-dialog modal-md" role="document"></div>
			</div>
			<!-- fim modal carregando -->
			
			<?php 
				include(OFF_TEMPLATE_ADM); 
			?>
		</section>
		<!-- fim section de modais -->
<?php 
	include(FOOTER_TEMPLATE_ADM); 
?>