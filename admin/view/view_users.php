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
		$objUser->qUpdateStatus($_POST);
		header('location: ' . BASEURL . 'admin/?s=stt');
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
			if ($objUser->qUpdate($_POST, 1)) {
				if ($_POST['login'] == $_SESSION['loginUser']) {
					$_SESSION['logado'] = false;
					header('location: ' . BASEURL . 'admin/?m=mod');
				} else {
					header('location: ' . BASEURL . 'admin/view/view_users.php');
				}
			} else {
				echo '<script type="text/javascript">alert("Erro ao salvar modificação!");</script>';
			}
		} else {
			$loginExtt = true;
		}
	}
	
	//POST para editar de mais dados da conta (nome, login, senha[n ainda])
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
	
	//POST para apagar a conta
	if (isset($_POST['btnDelete'])) {
		if ($_POST['delet'] == 0) {
			if ($objUser->qUpdateStatus($_POST)) {
				header('location: ' . BASEURL . 'admin/view/view_users.php');
			} else {
				echo '<script type="text/javascript">alert("Erro ao excluir dado!");</script>';
			}
		} elseif ($_POST['delet'] == 1) {
			if ($objUser->qDelete($_POST)) {
				header('location: ' . BASEURL . 'admin/view/view_users.php');
			} else {
				echo '<script type="text/javascript">alert("Erro ao excluir dado!");</script>';
			}	
		}
	}
	
	if (isset($_GET['action'])) {
		$temp = $objUser->qSelect($_GET['id']);
		switch($_GET['action']) {
			case 'status': 
				$status = $temp; 
				break;
			case 'edit': 
				$user = $temp;
				break;
			case 'delet':
				$delet = $temp;
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
					
					<!-- inicio tabela registros -->
					<div class="com-lg-8 col-md-8 visible-lg visible-md hidden-sm hidden-xs">
						<div class="row">
						<?php 	
								if ($art = $objUser->qSelect()) {
						?>
									<table class="table table-striped">
										<thead>
											<tr>
												<th>#</th>
												<th>Nome</th>
												<th>Login</th>
												<th>D. cadastro</th>
												<th>D. atualização</th>
												<th>Status</th>
												<th>Editar</th>
												<th>Excluir</th>
											</tr>
										</thead>
										<tbody>
						<?php 				$i = 1;
											foreach($art as $r) {  
												if ($r['name'] != "Default") {?>
													<tr>
														<th scope="row"><?=$i;?></th>
														<td><?=$objFunc->treatCharacter($r['name'],2); ?></td>
														<td><?=$objFunc->treatCharacter($r['login'],2); ?></td>
														<td><?=($objFunc->fDate($r['dateCa'])); ?></td>
														<td><?=($objFunc->fDate($r['dateUp'])); ?></td>
														<td>
															<a href="?action=status&id=<?=$objFunc->base64($r['idUser'], 1); ?>" title="Status">
																<img class="img-responsive" src="<?=BASEURL; ?>assets/img/adm_ctrl/<?=($r['active'] == 1 ? "on" : "off");?>.png" alt="Status">
															</a>
														</td>
						<?php 						if ($_SESSION['idUser'] != $r['idUser']) {?>
														<td>
															<a href="?action=edit&id=<?=$objFunc->base64($r['idUser'], 1); ?>" title="Editar">
																<img class="img-responsive" src="<?=BASEURL; ?>assets/img/adm_ctrl/editar.png" alt="Editar">
															</a>
														</td>
														<td>
															<a href="?action=delet&id=<?=$objFunc->base64($r['idUser'], 1); ?>" title="Excluir">
																<img class="img-responsive" src="<?=BASEURL; ?>assets/img/adm_ctrl/excluir.png" alt="Excluir">
															</a>
															</td>
						<?php 						} else { ?>
														<td></td>
														<td></td>
						<?php						} ?>
													</tr>
						<?php 						$i++;
												}
											}
											unset($r);
						?>
										</tbody>
									</table>
						<?php 	} else { ?>
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center"> 
										<h4>Nenhum artigo encontrado!</h4>
										<p>Lamentamos o inconveniente.</p>
									</div>
						<?php 	} ?>
						</div>
					</div>
					<div class="com-lg-1 col-md-1 visible-lg visible-md hidden-sm hidden-xs"></div>
					<!-- fim tabela registro -->
				</div>
			</div>
		</section>
		<!-- fim index_adm section -->
		
		<!-- inicio modais section -->
		<section id="modais" class="section">
			<!-- inicio status modal -->
			<?php 
				if (isset($status)) { ?>
					<script>$(document).ready(function() {$('#status').modal('show');});</script>
					<div id="status" class="modal fade status" tabindex="-1" role="dialog" aria-labelledby="mod_status">
						<div class="modal-dialog modal-md" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h5 class="modal-title text-center" id="mod_status">Alterar status do usuário '<?=$objFunc->treatCharacter($status['name'],2); ?>'.</h5>
								</div>
								<div class="modal-body table-responsive">
									<div class="col-md-12">
										<form class="form-horizontal text-center" action="<?php $_SERVER["PHP_SELF"];?>" method="post">
											<?php 
												if ($status['active'] == 1 ? $st = "ativada" : $st = "desativada");
												if ($status['active'] == 1 ? $st_c = "desativar" : $st_c = "ativar"); 
												
												if ($_SESSION['idUser'] == $status['idUser']) { 
													$btnConf = "Confirmar";
													$classSave = "danger";
													$input = "has-error";
											?>
													<p class="alert alert-danger" role="alert">Deseja <u><?=$st_c;?></u> seu próprio perfil?</p>
													<p class="alert alert-info" role="alert">
														Se confirmar, não consiguirá acessar mais essa área.<br>
														Outro administrador deverá reativar seu perfil!<br>
														Você será deslogado de imediato!
													</p>
											<?php
												} else {
													$classSave = "primary";
													$input = "";
											?>
													<p>A conta do usuário está atualmente <code><?=$st;?></code>.</p>
													<p>Deseja <u><?=$st_c;?></u>?</p>
											<?php
												} ?>
											<div class="form-group <?=$input;?>">
												<input type="hidden" name="idU" value="<?=$objFunc->base64($status['idUser'], 1); ?>" >
												<div class="col-sm-12">
													<select name="status" class="form-control" id="inputStatus" autofocus>
														<option value="1" <?=($status['active'] == 0) ? "selected" : "";?>>Ativar</option>
														<option value="0" <?=($status['active'] == 1) ? "selected" : "";?>>Desativar</option>
													</select>
												</div>
											</div>
											
											<div class="form-group">
												<div class="col-sm-6">
													<button type="submit" class="btn btn-<?=$classSave;?> btn-block" name="btnSaveStatus" value="">
														<?=(isset($btnConf) ? "Confirmar" : "Salvar");?></button>
												</div>
												<div class="col-sm-6">
													<a class="btn btn-default btn-block" href="view_users.php" role="button">Cancelar</a>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div> 
			<?php 
				} ?>
			<!-- fim status modal -->
			
			<!-- inicio edit modal -->
			<?php 
				if (isset($user)) { ?>
					<script>$(document).ready(function() {$('#edit').modal('show');});</script>
					<div id="edit" class="modal fade edit" tabindex="-1" role="dialog" aria-labelledby="mod_edit">
						<div class="modal-dialog modal-md" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h5 class="modal-title text-center" id="mod_edit">Editar conta</h5>
								</div>
								<div class="modal-body table-responsive">
									<div class="col-md-12">
										<form class="form-horizontal" action="<?php $_SERVER["PHP_SELF"];?>" method="post">
											
											<input type="hidden" name="idU" value="<?=$objFunc->base64($user['idUser'], 1); ?>">
											
											<div class="form-group">
												<label for="inputName" class="col-sm-3 control-label">Nome</label>
												<div class="col-sm-9">
													<input type="text" class="form-control" id="inputName" placeholder="Nome" 
														name="name" value="<?=$objFunc->treatCharacter($user['name'],2); ?>" required >
												</div>
											</div>
											
											<div class="form-group">
												<label for="inputLogin" class="col-sm-3 control-label">Login</label>
												<div class="col-sm-9">
													<input type="text" class="form-control" id="inputLogin" placeholder="Login" 
														name="login" value="<?=$user['login'];?>" required 
														<?=($_SESSION['idUser'] == $user['idUser']) ? "" : "disabled";?>>
												</div>
											</div>
											
											<div class="form-group"  >
												<label for="inputDtCa" class="col-sm-3 control-label">D. cadastro</label>
												<div class="col-sm-9">
													<input type="text" disabled class="form-control" id="inputDtCa" placeholder="Imagem" 
														name="dateCa" value="<?=$objFunc->fDate($user['dateCa']);?>" required >
												</div>
											</div>
											<div class="form-group"  >
												<label for="inputDtUp" class="col-sm-3 control-label">Atualizado em</label>
												<div class="col-sm-9">
													<input type="text" disabled class="form-control" id="inputDtUp" placeholder="Imagem" 
														name="dateUp" value="<?=$objFunc->fDate($user['dateUp']);?>" required >
												</div>
											</div>
											
											<div class="form-group">
												<label for="inputStatus" class="col-sm-3 control-label">Status</label>
												<div class="col-sm-9">
													<input type="text" disabled class="form-control" id="inputStatus" placeholder="Status" 
														name="activation" value="<?=($user['active'] == 1) ? "Ativado" : "Desativado";?>" required >
												</div>
											</div>
											
											<div class="form-group">
												<div class="col-sm-6">
													<button type="submit" class="btn btn-primary btn-block" name="btnSaveEdition" value="">Salvar</button>
												</div>
												<div class="col-sm-6">
													<a class="btn btn-default btn-block" href="view_users.php" role="button">Cancelar</a>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div> 
			<?php 
				} ?>
			<!-- fim edit modal -->
			<!-- inicio delete modal -->
			<?php 
				if (isset($delet)) { ?>
					<script>$(document).ready(function() {$('#delet').modal('show');});</script>
					<div id="delet" class="modal fade delet" tabindex="-1" role="dialog" aria-labelledby="mod_contato">
						<div class="modal-dialog modal-md" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h5 class="modal-title text-center" id="mod_contato">Excluir conta</h5>
								</div>
								<div class="modal-body table-responsive">
									<div class="col-md-12">
										<form class="form-horizontal text-center" action="<?php $_SERVER["PHP_SELF"];?>" method="post">
											<p class="alert alert-warning" role="alert">Deseja <u>excluir</u> a conta de "<i><?=$objFunc->treatCharacter($delet['name'],2);?></i>" ?</p>
											<p class="alert alert-info" role="alert">Se confirmar, todos os dados serão apagados do banco.
												<br>Recomenda-se que <u>desative</u> a conta.</p>
											
											<div class="form-group">
												<input type="hidden" name="idU" value="<?=$objFunc->base64($delet['idUser'], 1); ?>" >
												<div class="col-sm-12">
													<select name="delet" class="form-control" id="inputStatus" autofocus>
														<option value="0" selected >Desativar</option>
														<option value="1" >Excluir</option>
													</select>
												</div>
											</div>
											
											<div class="form-group">
												<div class="col-sm-6">
													<button type="submit" class="btn btn-warning btn-block" name="btnDelete" value="">Confirmar</button>
												</div>
												<div class="col-sm-6">
													<a class="btn btn-default btn-block" href="view_users.php" role="button">Cancelar</a>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div> 
			<?php 
				} ?>
			<!-- fim delete modal -->
			
			<!-- inicio modal carregando -->
			<div id="l" class="modal fade loading" tabindex="-1" role="" >
				<div id="load" class="modal-dialog modal-md" role="document"></div>
			</div>
			<!-- fim modal carregando -->
			
			<?php 
				include(OFF_TEMPLATE_ADM); 
			?>
		</section>
		<!-- fim modais section -->
		
		<script type="text/javascript" >
			$(document).ready(function() {
				$('#collapseUsers').addClass("in");
			});
		</script>
<?php 
	include(FOOTER_TEMPLATE_ADM); 
?>