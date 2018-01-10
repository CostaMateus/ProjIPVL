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
		$temp = $objUser->qSelect($_GET['id'], null);
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
					<!-- inicio menu_adm -->
					<div class="com-lg-3 col-md-3">
						<div class="panel-group" id="accordion">
							<div class="panel panel-default">
								<div class="panel-heading">
									<a data-toggle="collapse" data-parent="#accordion" href="#collapseUser">
										<h4 class="panel-title">
											<span class="glyphicon glyphicon-user"></span><?=$_SESSION['nameUser'];?> <i class="fa fa-caret-down"></i>
										</h4>
									</a>
								</div>
								<div id="collapseUser" class="collapse in"> <!-- aqui vai o 'in' -->
									<div class="panel-body list-group">
										<a href="index.php" class="list-group-item"><span class="glyphicon glyphicon-home"></span>Home </a>
										<a href="mudar.php?action=edit&id=<?=$objFunc->base64($_SESSION['idUser'], 1);?>" class="list-group-item"><span class="glyphicon glyphicon-refresh"></span>Mudar senha </a>
										<a href="#" class="list-group-item text-warning"><span class="glyphicon glyphicon-ban-circle text-warning"></span>Desativar conta</a>
										<a href="#" class="list-group-item text-danger"><span class="glyphicon glyphicon-trash text-danger"></span>Deletar conta</a>
										<a href="#" class="list-group-item" data-toggle="modal" data-target=".logoff" >
											<span class="glyphicon glyphicon-log-out"></span>Sair
										</a>
										<!--
										<a href="#" class="list-group-item"> Estudos <span class="badge">14</span></a>
										-->
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<a data-toggle="collapse" data-parent="#accordion" href="#collapseNotice">
										<h4 class="panel-title">
											<span class="glyphicon glyphicon-info-sign"></span>Avisos <i class="fa fa-caret-down"></i>
										</h4>
									</a>
								</div>
								<div id="collapseNotice" class="collapse"> <!-- aqui vai o 'in' -->
									<div class="panel-body list-group">
										<a href="#" class="list-group-item"> Ver todos <span class="badge">000</span></a>
										<a href="#" class="list-group-item"> Adicionar </a>
										<a href="#" class="list-group-item"> Editar </a>
										<a href="#" class="list-group-item"> Apagar </a>
									</div>
								</div>
							</div>
							<!--<div class="panel panel-default">
								<div class="panel-heading">
									<a data-toggle="collapse" data-parent="#accordion" href="#collapseDevo">
										<h4 class="panel-title">
											<span class="glyphicon glyphicon-th-large"></span>Devocionais <i class="fa fa-caret-down"></i>
										</h4>
									</a>
								</div>
								<div id="collapseDevo" class="collapse">  aqui vai o 'in' 
									<div class="panel-body list-group">
										<a href="view_dev.php" class="list-group-item"> Ver todas <span class="badge"><?=$objFunc->getNumberDevocionais();?></span></a>
										<a href="add_dev.php" class="list-group-item"> Adicionar </a>
										<a href="#" class="list-group-item"> Editar </a>
										<a href="#" class="list-group-item"> Apagar </a>
									</div>
								</div>
							</div>-->
							<!--<div class="panel panel-default">
								<div class="panel-heading">
									<a data-toggle="collapse" data-parent="#accordion" href="#collapseEstu">
										<h4 class="panel-title">
											<span class="glyphicon glyphicon-book"></span>Estudos <i class="fa fa-caret-down"></i>
										</h4>
									</a>
								</div>
								<div id="collapseEstu" class="collapse">  aqui vai o 'in' 
									<div class="panel-body list-group">
										<a href="view_est.php" class="list-group-item"> Ver todos <span class="badge"><?=$objFunc->getNumberEstudos();?></span></a>
										<a href="add_est.php" class="list-group-item"> Adicionar </a>
										<a href="#" class="list-group-item"> Editar </a>
										<a href="#" class="list-group-item"> Apagar </a>
									</div>
								</div>
							</div>-->
							<!--<div class="panel panel-default">
								<div class="panel-heading">
									<a data-toggle="collapse" data-parent="#accordion" href="#collapsePreg">
										<h4 class="panel-title">											<span class="glyphicon glyphicon-briefcase"></span>Pregações <i class="fa fa-caret-down"></i>										</h4>									</a>								</div>								<div id="collapsePreg" class="collapse">  aqui vai o 'in' 									<div class="panel-body list-group">										<a href="view_preg.php" class="list-group-item"> Ver todas <span class="badge"><?=$objFunc->getNumberPregacoes();?></span></a>										<a href="add_preg.php" class="list-group-item"> Adicionar </a>										<a href="#" class="list-group-item"> Editar </a>										<a href="#" class="list-group-item"> Apagar </a>									</div>								</div>							</div>-->							<div class="panel panel-default">								<div class="panel-heading">									<a data-toggle="collapse" data-parent="#accordion" href="#collapseUsers">										<h4 class="panel-title">											<span class="glyphicon glyphicon-briefcase"></span>Usuários <i class="fa fa-caret-down"></i>										</h4>									</a>								</div>								<div id="collapseUsers" class="collapse"> <!-- aqui vai o 'in' -->									<div class="panel-body list-group">										<a href="view_users.php" class="list-group-item"> Ver todos <span class="badge"><?=$objUser->getNumberUsers();?></span></a>										<a href="add_users.php" class="list-group-item"> Adicionar </a>									</div>								</div>							</div>						</div>					</div>					<!-- fim menu_adm -->										<div class="col-lg-1 col-md-1 visible-lg visible-md hidden-sm hidden-xs"></div>					<div class="com-lg-5 col-md-5 visible-lg visible-md hidden-sm hidden-xs">					<?php 						if (isset($user)) { ?>							<h5 class="text-center" id="">Editar senha</h5>							<form class="form-horizontal" action="<?php $_SERVER["PHP_SELF"];?>" method="post">														<input type="hidden" name="idU" value="<?=$objFunc->base64($user['idUser'], 1); ?>">
								<div class="form-group <?=(isset($senhaInv1) ? "has-error" : "");?>">									<label for="inputPass1" class="col-sm-3 control-label">Senha atual</label>									<div class="col-sm-9">										<input type="password" class="form-control" id="inputPass1" placeholder="Senha atual" 											name="pass1" value="" required >										<?=(isset($senhaInv1) ? "<span class='help-block'>Senha atual inválida.</span>" : "");?>									</div>								</div>
								<div class="form-group <?=(isset($senhaInv2) ? "has-error" : "");?>">									<label for="inputPass2" class="col-sm-3 control-label">Nova senha</label>									<div class="col-sm-9">										<input type="password" class="form-control" id="inputPass2" placeholder="Nova senha" 											name="pass2" value="" required >									</div>								</div>																<div class="form-group <?=(isset($senhaInv2) ? "has-error" : "");?>">									<label for="inputPass3" class="col-sm-3 control-label">Confirma</label>									<div class="col-sm-9">										<input type="password" class="form-control" id="inputPass3" placeholder="Confirmar senha" 											name="pass3" value="" required >										<?=(isset($senhaInv2) ? "<span class='help-block'>Campos vazios ou diferentes.</span>" : "");?>									</div>								</div>																<div class="form-group">									<div class="col-sm-6">										<button type="submit" class="btn btn-primary btn-block" name="btnSavePasswordChange" value="">Salvar</button>									</div>									<div class="col-sm-6">										<button type="reset" class="btn btn-default btn-block" name="" value="">Limpar</button>									</div>								</div>							</form>					<?php						} ?>					</div>					<div class="col-lg-3 col-md-3 visible-lg visible-md hidden-sm hidden-xs"></div>				</div>			</div>		</section>		<!-- fim admins section -->				<!-- incio section de modais -->		<section class="section" >			<!-- inicio modal carregando -->			<div id="l" class="modal fade loading" tabindex="-1" role="" >				<div id="load" class="modal-dialog modal-md" role="document"></div>			</div>			<!-- fim modal carregando -->						<?php 				include(OFF_TEMPLATE_ADM); 			?>		</section>		<!-- fim section de modais --><?php 	include(FOOTER_TEMPLATE_ADM); ?>