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
	
	
	if(isset($_POST['btnRegister'])) {
		if(is_file($_FILES['image']['tmp_name'])){
			$types = array("image/jpeg","image/jpg","image/png");
			$imgType = $_FILES['image']['type'];
			
			if(in_array($imgType, $types)){
				$img = $_FILES['image']['name'];
				$img = str_replace(" ", "_", $img);
				$img = str_replace("á", "a", $img);
				$img = str_replace("à", "a", $img);
				$img = str_replace("â", "a", $img);
				$img = str_replace("ã", "a", $img);
				$img = str_replace("é", "e", $img);
				$img = str_replace("è", "e", $img);
				$img = str_replace("ê", "e", $img);
				$img = str_replace("í", "i", $img);
				$img = str_replace("ì", "i", $img);
				$img = str_replace("î", "i", $img);
				$img = str_replace("ó", "o", $img);
				$img = str_replace("ò", "o", $img);
				$img = str_replace("õ", "o", $img);
				$img = str_replace("ô", "o", $img);
				$img = str_replace("ç", "c", $img);
				$img = str_replace("û", "u", $img);
				$img = str_replace("ù", "u", $img);
				$img = str_replace("ú", "u", $img);

				$img = strtolower($img);
				
				if(file_exists(BASEURL . "assets/img/mensagem/" . $_POST['category'] . "/$img")){
					$i = 1;
					while(file_exists(BASEURL . "assets/img/mensagem/" . $_POST['category'] . "/[$i]$img")){
						$i++;
					}
					$img = "[".$i."]$img";	
				}
				
				$urlLocal = ABSPATH . "assets/img/mensagem/" . $_POST['category'] . "/" . $img;
				$urlServe = BASEURL . "assets/img/mensagem/" . $_POST['category'] . "/" . $img;
				if(@move_uploaded_file($_FILES['image']['tmp_name'], $urlServe)){
					$_POST['image'] = $img;
					echo "falta redimencionar";
				} else {
					$invalUp = true;
				}
			} else { 
				$invalType = true;
			}
		}
		
		// $objFunc->CadastraDevocional($_POST);
		
		// $_POST['category'];
		// $_POST['image'];
		// $_POST['title'];
		// $_POST['active'];
		// $_POST['text'];
		
		// if (!$objUser->qSelectLogins($_POST['login'], 1)) {
			// if($objUser->qInsert($_POST)) {
				// header('location: ' . BASEURL . 'admin/view/view_users.php');
			// }else{
				// echo '<script type="text/javascript">alert("Erro ao cadastrar!");</script>';
			// }
		// } else {
			// $loginExtt = true;
			// $senhaInv = true;
		// }
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
							<form class="form-horizontal" action="<?php $_SERVER["PHP_SELF"];?>" method="post" enctype="multipart/form-data" >
								<input type="hidden" name="category" value="devocional">
								<input type="hidden" name="image" value="padrao.jpg">
								<fieldset class="text-center">
									<legend>Nova devocional</legend>
								</fieldset>
								<div class="form-group">
<?php 								if (isset($invalUp)) { ?>
										<div class="alert alert-danger alert-block text-center" role="alert">
											<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
											<span class="sr-only">Info:</span>
											Falha ao salvar a imagem.
										</div>
<?php 								} ?>
									<label for="inputTitle" class="col-sm-2 control-label">Título</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" id="inputTitle" placeholder="Título" 
											name="title" value="" required autofocus >
									</div>
								</div>
								<!--
								<div class="form-group">
									<label for="inputImage" class="col-sm-2 control-label">Imagem</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" id="inputImage" placeholder="Imagem, dimensões 400 x 200" 
											name="image" required >
									</div>
								</div>
								-->
								<div class="form-group <?=(isset($invalType) ? "has-error" : "");?>">
									<label for="inputImage" class="col-sm-2 control-label">Imagem</label>
									<div class="col-sm-10">
										<div class="input-group">
											<label class="input-group-btn">
												<span class="btn btn-default">
													Procurar&hellip; <input type="file" name="image" style="display: none;" ><!--multiple-->
												</span>
											</label>
											<input type="text" class="form-control" readonly placeholder="Dimensões 400 x 200"></input>
										</div>
										<span class='help-block'>A imagem será redimensionada, sendo menor ou maior que as dimensões especificadas.</span>
										<span class='help-block'>Formato recomendado: <code>.png</code>. Formatos suportados: <code>.png</code>, <code>.jpg</code>, <code>.jpeg</code></span>
<?php 									if (isset($invalType)) { ?>
											<div class="alert alert-warning alert-block text-center" role="alert">
												<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
												<span class="sr-only">Info:</span>
												Formato de arquivo inválido.
											</div>
<?php 									} ?>
									</div>
								</div>
								
								<div class="form-group">
									<label for="inputStatus" class="col-sm-2 control-label">Status</label>
									<div class="col-sm-10">
										<select name="active" class="form-control" id="inputStatus" >
											<option value="1" >Ativada</option>
											<option value="0" selected >Desativada</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label for="editor1" class="col-sm-2 control-label">Texto</label>
									<div class="col-sm-10">
										<textarea name="text" id="editor1" class="form-control" rows="10" ></textarea>
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-12 text-center">
										<div class="col-sm-6"></div>
										<button type="submit" class="btn btn-primary col-sm-3" name="btnRegister" value="">Salvar</button>
										<!--<button type="submit" class="btn btn-default" name="" value="">Prévia</button>-->
										<button type="reset" class="btn btn-default col-sm-3" name="" value="">Limpar</button>
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