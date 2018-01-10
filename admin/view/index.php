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
					<!-- inicio menu_adm -->
					<div class="com-lg-3 col-md-3">
						<div class="panel-group" id="accordion">
							<div class="panel panel-default">
								<div class="panel-heading">
									<a data-toggle="collapse" data-parent="#accordion" href="#collapseLogged">
										<h4 class="panel-title">
											<span class="glyphicon glyphicon-user"></span><?=$_SESSION['nameUser'];?> <i class="fa fa-caret-down"></i>
										</h4>
									</a>
								</div>
								<div id="collapseLogged" class="collapse in"> <!-- aqui vai o 'in' -->
									<div class="panel-body list-group">
										<a href="index.php" class="list-group-item"><span class="glyphicon glyphicon-home"></span>Home </a>
										<a href="mudar.php?action=edit&id=<?=$objFunc->base64($_SESSION['idUser'], 1);?>" class="list-group-item"><span class="glyphicon glyphicon-refresh"></span>Mudar senha </a>
										<a href="desativar.php" class="list-group-item text-warning"><span class="glyphicon glyphicon-ban-circle text-warning"></span>Desativar conta</a>
										<a href="deletar.php" class="list-group-item text-danger"><span class="glyphicon glyphicon-trash text-danger"></span>Deletar conta</a>
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
										<h4 class="panel-title">
											<span class="glyphicon glyphicon-briefcase"></span>Pregações <i class="fa fa-caret-down"></i>
										</h4>
									</a>
								</div>
								<div id="collapsePreg" class="collapse">  aqui vai o 'in' 
									<div class="panel-body list-group">
										<a href="view_preg.php" class="list-group-item"> Ver todas <span class="badge"><?=$objFunc->getNumberPregacoes();?></span></a>
										<a href="add_preg.php" class="list-group-item"> Adicionar </a>
										<a href="#" class="list-group-item"> Editar </a>
										<a href="#" class="list-group-item"> Apagar </a>
									</div>
								</div>
							</div>-->
							<div class="panel panel-default">
								<div class="panel-heading">
									<a data-toggle="collapse" data-parent="#accordion" href="#collapseUsers">
										<h4 class="panel-title">
											<span class="glyphicon glyphicon-briefcase"></span>Usuários <i class="fa fa-caret-down"></i>
										</h4>
									</a>
								</div>
								<div id="collapseUsers" class="collapse"> <!-- aqui vai o 'in' -->
									<div class="panel-body list-group">
										<a href="view_users.php" class="list-group-item"> Ver todos <span class="badge"><?=$objUser->getNumberUsers();?></span></a>
										<a href="add_users.php" class="list-group-item"> Adicionar </a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- fim menu_adm -->
					
					<!-- inicio conteudo_adm -->
					<div class="com-lg-9 col-md-9 visible-lg visible-md hidden-sm hidden-xs">
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 visible-lg visible-md hidden-sm hidden-xs">
								<h5 class=" text-center">Meus dados</h5>
								<p>
								Sit commodo inceptos mollis magna ultrices laoreet etiam rutrum elit magna, taciti fusce et tortor urna fringilla integer urna eget, ac eu etiam felis aenean semper ut velit interdum. 
								iaculis potenti eros duis imperdiet sit massa elit elementum metus integer pretium netus adipiscing, vel donec quisque rutrum mi augue vel feugiat facilisis sagittis egestas. 
								amet aenean mi ipsum imperdiet a et mollis velit quam quisque suspendisse tempus duis, himenaeos euismod orci varius sollicitudin class scelerisque platea lacus orci aenean tellus. 
								sociosqu taciti sem mollis ut purus pulvinar amet fringilla aenean, dapibus quisque massa augue tincidunt bibendum interdum justo, non proin sapien class hendrerit eget rhoncus enim. 
								</p>
								<p>
								Auctor rutrum mi volutpat aliquam etiam orci rhoncus laoreet varius fusce nostra egestas, eget porttitor facilisis porta lacus consequat velit commodo condimentum est. 
								consequat ultricies porta cursus per purus arcu id rutrum, ligula semper odio curae erat justo interdum adipiscing, consequat habitasse et in vehicula felis placerat. 
								ultrices tortor morbi posuere dui lacinia pretium inceptos nisi suspendisse condimentum auctor scelerisque, leo sodales habitasse felis orci felis sagittis curabitur ad porttitor purus, aptent tellus vitae molestie posuere erat phasellus primis sociosqu nulla cubilia. 
								etiam inceptos fermentum tempor accumsan vestibulum lorem pellentesque ultricies cursus habitasse velit porta, leo eget sollicitudin diam quam ante sodales libero ut vitae per, etiam pharetra blandit scelerisque aliquam fermentum quisque iaculis mollis nullam elit. 
								</p>
								<p>
								Morbi pellentesque interdum sodales aenean egestas posuere litora dapibus orci cras sollicitudin enim rutrum, aptent posuere sollicitudin iaculis ligula diam augue himenaeos a dictum accumsan aliquet praesent, quam cursus taciti dui proin integer malesuada hac porta quisque faucibus cubilia. 
								dictum eget morbi mattis nisi proin conubia venenatis convallis tempus urna, adipiscing litora etiam sit aptent enim eleifend augue integer, dictumst a aenean hac habitasse viverra quisque et sed. 
								proin lacus tortor ultrices ipsum lacinia ad ornare magna sollicitudin, viverra torquent habitasse amet posuere curabitur dapibus mauris, non nec at morbi a at vel mi. 
								</p>
								<p>
								Cursus venenatis netus sed dui sagittis libero senectus, et rutrum lectus taciti rutrum senectus per dolor, convallis dictumst integer ipsum varius luctus. 
								nostra curabitur accumsan cubilia vivamus vehicula sollicitudin nisl, libero aenean torquent rutrum aenean posuere, vel duis ad pretium pulvinar etiam. 
								curae diam imperdiet erat ut aliquam tellus eleifend, eu vestibulum aenean euismod felis tempor et lobortis, egestas id ut interdum senectus dui. 
								etiam sagittis class litora ultrices erat in quisque, est posuere lacus consequat in accumsan tellus, eros pretium curae venenatis ipsum eleifend. 
								class auctor porttitor lacinia augue condimentum etiam curabitur, est nunc mattis sem viverra neque, lobortis scelerisque egestas aliquam ut molestie. 
								</p>
								<p>
								Pellentesque venenatis scelerisque velit maecenas tempus molestie mollis nec, consectetur dictum ut nam dictum tincidunt nisl ornare curabitur, eros eleifend rutrum leo a mauris bibendum. 
								mi pretium dapibus amet tortor scelerisque lacus suscipit scelerisque semper, mattis feugiat etiam lorem sapien eros fusce aliquam proin, tincidunt fermentum inceptos blandit molestie velit amet eu. 
								congue nostra nibh vulputate posuere diam quisque convallis, velit placerat dui aliquam luctus sociosqu vitae velit, odio pellentesque nec vehicula netus etiam. 
								mattis etiam et, egestas. 
								</p>
								<!--
								<?php $result = $objUser->qSelect($objFunc->base64($_SESSION['idUser'], 1));?>
								<form class="form-horizontal" action="<?php $_SERVER["PHP_SELF"];?>" method="post">
									
									<input type="hidden" name="idU" value="<?=$objFunc->base64($result['idUser'], 1); ?>">
									
									<div class="form-group">
										<label for="inputName" class="col-sm-3 control-label">Nome</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="inputName" placeholder="Nome" 
												name="name" value="<?=$result['name']; ?>" required >
										</div>
									</div>
									<div class="form-group <?=(isset($loginExtt) ? "has-error" : "");?>">
										<label for="inputLogin" class="col-sm-3 control-label">Login</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="inputLogin" placeholder="Login" 
												name="login" value="<?=$result['login'];?>" required >
											<?=(isset($loginExtt) ? "<span class='help-block'>Login existente, insira outro.</span>" : "");?>
										</div>
									</div>
									<div class="form-group"  >
										<label for="inputDtCa" class="col-sm-3 control-label">Data Cadastro</label>
										<div class="col-sm-9">
											<input type="text" disabled class="form-control" id="inputDtCa" placeholder="Data cadastro" 
												name="" value="<?=$objFunc->fDate($result['dateCa']);?>"  >
										</div>
									</div>
									<div class="form-group"  >
										<label for="inputDtUp" class="col-sm-3 control-label">Atualizado em</label>
										<div class="col-sm-9">
											<input type="text" disabled class="form-control" id="inputDtUp" placeholder="Data atualização" 
												name="" value="<?=$objFunc->fDate($result['dateUp']);?>"  >
										</div>
									</div>
									<div class="form-group">
										<label for="inputStatus" class="col-sm-3 control-label">Status</label>
										<div class="col-sm-9">
											<input type="text" disabled class="form-control" id="inputStatus" placeholder="Status" 
												name="" value="<?=($result['activation'] == 1) ? "Ativado" : "Desativado";?>"  >
										</div>
									</div>
									<div class="form-group">
										<label for="inputPass1" class="col-sm-3 control-label">Senha</label>
										<div class="col-sm-9">
											<input type="password" disabled class="form-control" id="inputPass1" placeholder="Senha" 
												name="" value="************************************************************" >
										</div>
									</div>
									<div class="form-group">
										<label for="inputPass2" class="col-sm-3 control-label">Nova senha</label>
										<div class="col-sm-9">
											<a href="?action=edit&id=<?=$objFunc->base64($result['idUser'], 1); ?>" 
												class="btn btn-default btn-block" role="button">Mudar senha</a>
										</div>
									</div>
									
									<div class="form-group">
										<div class="col-sm-6">
											<button type="submit" class="btn btn-primary btn-block" name="btnSaveEdition" value="">Editar</button>
										</div>
										<div class="col-sm-6">
											<button type="reset" class="btn btn-default btn-block" name="" value="">Limpar</button>
										</div>
									</div>
								</form>
								-->
							</div>
							<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 visible-lg visible-md hidden-sm hidden-xs">
								<h5 class=" text-center">Dados Laterais</h5>
								<p>
								Sit commodo inceptos mollis magna ultrices laoreet etiam rutrum elit magna, taciti fusce et tortor urna fringilla integer urna eget, ac eu etiam felis aenean semper ut velit interdum. 
								iaculis potenti eros duis imperdiet sit massa elit elementum metus integer pretium netus adipiscing, vel donec quisque rutrum mi augue vel feugiat facilisis sagittis egestas. 
								amet aenean mi ipsum imperdiet a et mollis velit quam quisque suspendisse tempus duis, himenaeos euismod orci varius sollicitudin class scelerisque platea lacus orci aenean tellus. 
								sociosqu taciti sem mollis ut purus pulvinar amet fringilla aenean, dapibus quisque massa augue tincidunt bibendum interdum justo, non proin sapien class hendrerit eget rhoncus enim. 
								</p>
								<p>
								Auctor rutrum mi volutpat aliquam etiam orci rhoncus laoreet varius fusce nostra egestas, eget porttitor facilisis porta lacus consequat velit commodo condimentum est. 
								consequat ultricies porta cursus per purus arcu id rutrum, ligula semper odio curae erat justo interdum adipiscing, consequat habitasse et in vehicula felis placerat. 
								ultrices tortor morbi posuere dui lacinia pretium inceptos nisi suspendisse condimentum auctor scelerisque, leo sodales habitasse felis orci felis sagittis curabitur ad porttitor purus, aptent tellus vitae molestie posuere erat phasellus primis sociosqu nulla cubilia. 
								etiam inceptos fermentum tempor accumsan vestibulum lorem pellentesque ultricies cursus habitasse velit porta, leo eget sollicitudin diam quam ante sodales libero ut vitae per, etiam pharetra blandit scelerisque aliquam fermentum quisque iaculis mollis nullam elit. 
								</p>
								<p>
								Morbi pellentesque interdum sodales aenean egestas posuere litora dapibus orci cras sollicitudin enim rutrum, aptent posuere sollicitudin iaculis ligula diam augue himenaeos a dictum accumsan aliquet praesent, quam cursus taciti dui proin integer malesuada hac porta quisque faucibus cubilia. 
								dictum eget morbi mattis nisi proin conubia venenatis convallis tempus urna, adipiscing litora etiam sit aptent enim eleifend augue integer, dictumst a aenean hac habitasse viverra quisque et sed. 
								proin lacus tortor ultrices ipsum lacinia ad ornare magna sollicitudin, viverra torquent habitasse amet posuere curabitur dapibus mauris, non nec at morbi a at vel mi. 
								</p>
								<p>
								Cursus venenatis netus sed dui sagittis libero senectus, et rutrum lectus taciti rutrum senectus per dolor, convallis dictumst integer ipsum varius luctus. 
								nostra curabitur accumsan cubilia vivamus vehicula sollicitudin nisl, libero aenean torquent rutrum aenean posuere, vel duis ad pretium pulvinar etiam. 
								curae diam imperdiet erat ut aliquam tellus eleifend, eu vestibulum aenean euismod felis tempor et lobortis, egestas id ut interdum senectus dui. 
								etiam sagittis class litora ultrices erat in quisque, est posuere lacus consequat in accumsan tellus, eros pretium curae venenatis ipsum eleifend. 
								class auctor porttitor lacinia augue condimentum etiam curabitur, est nunc mattis sem viverra neque, lobortis scelerisque egestas aliquam ut molestie. 
								</p>
								<p>
								Pellentesque venenatis scelerisque velit maecenas tempus molestie mollis nec, consectetur dictum ut nam dictum tincidunt nisl ornare curabitur, eros eleifend rutrum leo a mauris bibendum. 
								mi pretium dapibus amet tortor scelerisque lacus suscipit scelerisque semper, mattis feugiat etiam lorem sapien eros fusce aliquam proin, tincidunt fermentum inceptos blandit molestie velit amet eu. 
								congue nostra nibh vulputate posuere diam quisque convallis, velit placerat dui aliquam luctus sociosqu vitae velit, odio pellentesque nec vehicula netus etiam. 
								mattis etiam et, egestas. 
								</p>
								<!--
								<?php 
									if (isset($user)) { ?>
										<h5 class="text-center" id="">Editar senha</h5>
										<form class="form-horizontal" action="<?php $_SERVER["PHP_SELF"];?>" method="post">
											
											<input type="hidden" name="idU" value="<?=$objFunc->base64($user['idUser'], 1); ?>">
											
											<div class="form-group <?=(isset($senhaInv1) ? "has-error" : "");?>">
												<label for="inputPass1" class="col-sm-3 control-label">Senha atual</label>
												<div class="col-sm-9">
													<input type="text" class="form-control" id="inputPass1" placeholder="Senha atual" 
														name="pass1" value="" required >
													<?=(isset($senhaInv1) ? "<span class='help-block'>Senha atual inválida.</span>" : "");?>
												</div>
											</div>
											
											<div class="form-group <?=(isset($senhaInv2) ? "has-error" : "");?>">
												<label for="inputPass2" class="col-sm-3 control-label">Nova senha</label>
												<div class="col-sm-9">
													<input type="text" class="form-control" id="inputPass2" placeholder="Nova senha" 
														name="pass2" value="" required >
												</div>
											</div>
											
											<div class="form-group <?=(isset($senhaInv2) ? "has-error" : "");?>">
												<label for="inputPass3" class="col-sm-3 control-label">Confirma</label>
												<div class="col-sm-9">
													<input type="text" class="form-control" id="inputPass3" placeholder="Confirmar senha" 
														name="pass3" value="" required >
													<?=(isset($senhaInv2) ? "<span class='help-block'>Campos vazios ou diferentes.</span>" : "");?>
												</div>
											</div>
											
											<div class="form-group">
												<div class="col-sm-6">
													<button type="submit" class="btn btn-primary btn-block" name="btnSavePasswordChange" value="">Salvar</button>
												</div>
												<div class="col-sm-6">
													<button type="reset" class="btn btn-default btn-block" name="" value="">Limpar</button>
												</div>
											</div>
										</form>
								<?php
									} ?>
								-->
							</div>
						</div>
					</div>
					<!-- fim conteudo_adm -->
				</div>
			</div>
		</section>
		<!-- fim admins section -->
		
		<!-- incio section de modais -->
		<section class="section" >
			<?php 
				include(OFF_TEMPLATE_ADM); 
			?>
		</section>
		<!-- fim section de modais -->
<?php 
	include(FOOTER_TEMPLATE_ADM); 
?>