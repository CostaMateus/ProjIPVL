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
								<div id="collapseUser" class="collapse"> <!-- aqui vai o 'in' -->
									<div class="panel-body list-group">
										<a href="index.php" class="list-group-item"><span class="glyphicon glyphicon-home"></span>Home </a>
										<a href="#" class="list-group-item"><span class="glyphicon glyphicon-refresh"></span>Mudar senha </a>
										<a href="#" class="list-group-item text-warning"><span class="glyphicon glyphicon-ban-circle text-warning"></span>Desativar conta</a>
										<a href="#" class="list-group-item text-danger"><span class="glyphicon glyphicon-trash text-danger"></span>Deletar conta</a>
										<a href="?logout=y" class="list-group-item "><span class="glyphicon glyphicon-log-out"></span>Sair</a>
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
							<div class="panel panel-default">
								<div class="panel-heading">
									<a data-toggle="collapse" data-parent="#accordion" href="#collapseDevo">
										<h4 class="panel-title">
											<span class="glyphicon glyphicon-th-large"></span>Devocionais <i class="fa fa-caret-down"></i>
										</h4>
									</a>
								</div>
								<div id="collapseDevo" class="collapse"> <!-- aqui vai o 'in' -->
									<div class="panel-body list-group">
										<a href="view_dev.php" class="list-group-item"> Ver todas <span class="badge"><?=$objFunc->getNumberDevocionais();?></span></a>
										<a href="add_dev.php" class="list-group-item"> Adicionar </a>
										<a href="#" class="list-group-item"> Editar </a>
										<a href="#" class="list-group-item"> Apagar </a>
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<a data-toggle="collapse" data-parent="#accordion" href="#collapseEstu">
										<h4 class="panel-title">
											<span class="glyphicon glyphicon-book"></span>Estudos <i class="fa fa-caret-down"></i>
										</h4>
									</a>
								</div>
								<div id="collapseEstu" class="collapse"> <!-- aqui vai o 'in' -->
									<div class="panel-body list-group">
										<a href="view_est.php" class="list-group-item"> Ver todos <span class="badge"><?=$objFunc->getNumberEstudos();?></span></a>
										<a href="add_est.php" class="list-group-item"> Adicionar </a>
										<a href="#" class="list-group-item"> Editar </a>
										<a href="#" class="list-group-item"> Apagar </a>
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<a data-toggle="collapse" data-parent="#accordion" href="#collapsePreg">
										<h4 class="panel-title">
											<span class="glyphicon glyphicon-briefcase"></span>Pregações <i class="fa fa-caret-down"></i>
										</h4>
									</a>
								</div>
								<div id="collapsePreg" class="collapse"> <!-- aqui vai o 'in' -->
									<div class="panel-body list-group">
										<a href="view_preg.php" class="list-group-item"> Ver todas <span class="badge"><?=$objFunc->getNumberPregacoes();?></span></a>
										<a href="add_preg.php" class="list-group-item"> Adicionar </a>
										<a href="#" class="list-group-item"> Editar </a>
										<a href="#" class="list-group-item"> Apagar </a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- fim menu_adm -->