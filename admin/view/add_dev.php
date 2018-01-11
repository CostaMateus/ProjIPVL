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

		<!-- inicio index_adm section -->
		<section id="index" class="section" style="background-color:#FFF!important;">
			<div class="container-fluid">
				<br>
				<?php include(AREA_ADM_TEMPLATE_ADM);?>
				
				<div class="row visible-lg visible-md hidden-sm hidden-xs">
					<?php include(MENU_TEMPLATE_ADM);?>
					
					<!-- inicio conteudo_adm -->
					<div class="col-lg-1 col-md-1 visible-lg visible-md hidden-sm hidden-xs"></div>
					<div class="col-lg-5 col-md-5 visible-lg visible-md hidden-sm hidden-xs">
						<div class="row">
							<form class="form-horizontal" action="<?php $_SERVER["PHP_SELF"];?>" method="post">
								<fieldset class="text-center">
									<legend>Nova devocional</legend>
								</fieldset>
								<div class="form-group">
									<label for="inputName" class="col-sm-2 control-label">Nome</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" id="inputName" placeholder="Nome" 
											name="name" value="" required autofocus >
									</div>
								</div>
								<div class="form-group">
									<label for="inputPass" class="col-sm-2 control-label">Imagem</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" id="inputPass" placeholder="Imagem" 
											name="image" required >
									</div>
								</div>
								<div class="form-group">
									<label for="inputStatus" class="col-sm-2 control-label">Status</label>
									<div class="col-sm-10">
										<select name="activation" class="form-control" id="inputStatus" >
											<option value="1" selected >Ativada</option>
											<option value="0" >Desativada</option>
										</select>
									</div>
								</div>
								<textarea name="description" id="editor1" class="form-control" rows="3" placeholder="Descrição"></textarea>
								<script> CKEDITOR.replace( 'editor1' );</script>
								
								<div class="form-group"></div>
								<div class="form-group">
									<div class="col-lg-12 text-right">
										<button type="submit" class="btn btn-primary" name="btnRegister" value="">Cadastrar</button>
										<button type="reset" class="btn btn-default" name="" value="">Limpar</button>
									</div>
								</div>
							</form>
						</div>
					</div>
					<div class="col-lg-3 col-md-3 visible-lg visible-md hidden-sm hidden-xs"></div>
					<!-- fim conteudo_adm -->
				</div>
			</div>
		</section>
		<!-- fim index_adm section -->
		
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
		
		<script type="text/javascript" >
			$(document).ready(function() {
				$('#collapseDevo').addClass("in");
			});
		</script>
<?php 
	include(FOOTER_TEMPLATE_ADM); 
?>