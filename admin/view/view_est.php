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
	
	//POST para editar de mais dados da conta (nome, login, senha[n ainda])
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
		$temp = $objFunc->getMensagem($_GET['id']);
		switch($_GET['action']) {
			case 'status': 
				$status = $temp; 
				break;
			case 'edit': 
				$user = $temp;
				break;
			case 'delet':
				// if($objUser->qDeleteDestaque($_GET['id'])) {
					// header('location: ' . BASEURL . 'admin/view/destaques.php');
				// } else {
					// echo '<script type="text/javascript">alert("Erro ao excluir dado!");</script>';
				// }
				break;
		}
	}
	
	if(isset($_POST['btnSaveStatus'])) {
		if($objFunc->updateStatusMensagem($_POST)) {
			header('location: view_est.php');
		}else{
			echo '<script type="text/javascript">alert("Erro ao salvar modificação!");</script>';
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
						<!--<div class="row">
						<?php 
								$i = 1;
								if ($art = $objFunc->getAllEstudos()) {
									foreach($art as $result) { 
										$i++;
						?> 	
										<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"> 
											<div class="thumbnail  text-center">
												<a href="?a=<?=utf8_encode($result['category']);?>&id=<?=$objFunc->base64($result['id'], 1); ?>" title="<?php echo utf8_encode($result['title']);?>">
													<div class="featured-thumbnail">
						<?php 							if ($result['image'] != null) { ?> 
															<img src="<?=BASEURL; ?>assets/img/mensagem/<?=utf8_encode($result['category']);?>/<?php echo $result['image'];?>" 
																class="img-responsive img-rounded" 
																title="<?=utf8_encode($result['title']);?>" alt="<?=utf8_encode($result['title']);?>" />
						<?php 							} else { ?> 
															<img src="<?=BASEURL; ?>assets/img/mensagem/padrao.jpg" 
																class="img-responsive img-rounded" 
																title="<?=utf8_encode($result['title']);?>" alt="<?=utf8_encode($result['title']);?>" />
						<?php 							} ?> 
													</div>
													<div class="caption">
														<h4><?=utf8_encode($objFunc->limitaTexto55($result['title']));?></h4>
														<p><?=utf8_encode($objFunc->limitaTexto75($result['text']));?></p>
														<h6>#<?=utf8_encode($result['category']);?></h6>
													</div>
												</a> 
											</div>
										</div>
						<?php 			if ($i == 3) {
											$i = 0; 
						?>
						</div>
						<div class="row">
						<?php 			}
									}
								} else { ?>
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center"> 
										<h4>Nenhum artigo encontrado!</h4>
										<p>Lamentamos o inconveniente.</p>
									</div>
						<?php 	} ?>
						</div>-->
						
						<div class="row">
						<?php 	
								if ($art = $objFunc->getAllMensagens('estudo')) {
						?>
									<table class="table table-striped">
										<thead>
											<tr>
												<th>#</th>
												<th>Título</th>
												<th>Texto</th>
												<th>Categoria</th>
												<th>Imagem</th>
												<th>Status</th>
												<th>Editar</th>
												<th>Excluir</th>
											</tr>
										</thead>
										<tbody>
						<?php 				$i = 1;
											foreach($art as $result) {  ?>
												<tr>
													<th scope="row"><?=$i;?></th>
													<td><?=($objFunc->limitaTexto55($result['title'])); ?></td>
													<td><?=($objFunc->limitaTexto75($result['text'])); ?></td>
													<td><?=$result['category']; ?></td>
													<td><?=($result['image'] != null ? $result['image'] : "padrao.jpg"); ?></td>
													<td>
														<a href="?action=status&id=<?=$objFunc->base64($result['id'], 1); ?>" title="Status">
															<img class="img-responsive" src="<?=BASEURL; ?>assets/img/adm_ctrl/<?=($result['active'] == 1 ? "on" : "off");?>.png" alt="Status">
														</a>
													</td>
													<td>
														<a href="?action=edit&id=<?=$objFunc->base64($result['id'], 1); ?>" title="Editar">
															<img class="img-responsive" src="<?=BASEURL; ?>assets/img/adm_ctrl/editar.png" alt="Editar">
														</a>
													</td>
													<td>
														<a href="?action=delet&id=<?=$objFunc->base64($result['id'], 1); ?>" title="Excluir">
															<img class="img-responsive" src="<?=BASEURL; ?>assets/img/adm_ctrl/excluir.png" alt="Excluir">
														</a>
													</td>
												</tr>
						<?php 					$i++;
											}
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
					<div class="com-lg-1 col-md-1 visible-lg visible-md hidden-sm hidden-xs">
					<!-- fim conteudo_adm -->
				</div>
			</div>
		</section>
		<!-- fim admins section -->
		
		<!-- inicio modais section -->
		<section id="modais" class="section">
			<!-- inicio status modal -->
			<?php 
				if (isset($status)) { ?>
					<script>$(document).ready(function() {$('#status').modal('show');});</script>
					<div id="status" class="modal fade status" tabindex="-1" role="dialog" aria-labelledby="mod_contato">
						<div class="modal-dialog modal-md" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h5 class="modal-title text-center" id="mod_contato">Alterar status do(a) <?=$result['category']; ?>.</h5>
								</div>
								<div class="modal-body table-responsive">
									<div class="col-md-12">
										<form class="form-horizontal" action="<?php $_SERVER["PHP_SELF"];?>" method="post">
											<?php 
												if ($status['active'] == 1 ? $st = "ativada" : $st = "desativada");
												if ($status['active'] == 1 ? $st_c = "desativar" : $st_c = "ativar"); 
											?>
											<p>O destaque "<i><?=($status['title']);?></i>" está atualmente <code><?=$st;?></code>.</p>
											<p>Deseja <u><?=$st_c;?></u>?</p>
											<div class="form-group">
												<input type="hidden" name="id" value="<?=$objFunc->base64($status['id'], 1); ?>" >
												<div class="col-sm-12">
													<select name="status" class="form-control" id="inputStatus" autofocus>
														<option value="1" <?=($status['active'] == 0) ? "selected" : "";?>>Ativar</option>
														<option value="0" <?=($status['active'] == 1) ? "selected" : "";?>>Desativar</option>
													</select>
												</div>
											</div>
											
											<div class="form-group">
												<div class="col-sm-6">
													<button type="submit" class="btn btn-primary btn-block" name="btnSaveStatus" value="">Salvar</button>
												</div>
												<div class="col-sm-6">
													<a class="btn btn-default btn-block" href="view_est.php" role="button">Cancelar</a>
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
				if (isset($dest)) { ?>
					<script>$(document).ready(function() {$('#edit').modal('show');});</script>
					<div id="edit" class="modal fade edit" tabindex="-1" role="dialog" aria-labelledby="mod_contato">
						<div class="modal-dialog modal-lg" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h5 class="modal-title text-center" id="mod_contato">Editar destaque</h5>
								</div>
								<div class="modal-body table-responsive">
									<div class="col-md-12">
										<form class="form-horizontal" action="<?php $_SERVER["PHP_SELF"];?>" method="post">
											<div class="form-group">
												<label for="inputName" class="col-sm-2 control-label">Nome</label>
												<div class="col-sm-10">
													<input type="text" class="form-control" id="inputName" placeholder="Nome" 
														name="name" value="<?=($dest['name']); ?>" required >
												</div>
											</div>
											<div class="form-group" >
												<label for="inputDescription" class="col-sm-2 control-label">Descrição</label>
												<div class="col-sm-10">
													<textarea class="form-control inputDesc" type="text" id="inputDescription" rows="3" placeholder="Descrição"
														name="description" value="" ><?=($dest['description']); ?></textarea>
													<span class="help-block">Insira <code>&lt;br&gt;</code> para quebrar linhas da descrição.</span>
												</div>
											</div>
											<div class="form-group">
												<label for="inputImg" class="col-sm-2 control-label">Imagem</label>
												<div class="col-sm-10">
													<input type="text" class="form-control" id="inputImg" placeholder="Imagem" 
														name="image" value="<?=($dest['image']); ?>" required >
												</div>
											</div>
											<!--<div class="form-group">
												<label for="inputStatus" class="col-sm-2 control-label">Status</label>
												<div class="col-sm-10">
													<input type="text" class="form-control" id="inputStatus" placeholder="Status" 
														name="active" value="<?//=$dest['active']; ?>" required >
												</div>
											</div>-->
											
											<div class="form-group">
												<div class="col-sm-6">
													<button type="submit" class="btn btn-primary btn-block" name="btnSaveEdition" value="">Salvar</button>
												</div>
												<div class="col-sm-6">
													<a class="btn btn-default btn-block" href="destaques.php" role="button">Cancelar</a>
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
				$('#collapseEstu').addClass("in");
			});
		</script>
<?php 
	include(FOOTER_TEMPLATE_ADM); 
?>