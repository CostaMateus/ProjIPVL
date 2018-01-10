<?php 
	require_once '../config.php'; 
	require_once FUNC_API; 
	
	$objFunc = new Functions(); 
	
	if (isset($_GET['a'])) {
		switch($_GET['a']) {
			case 'devocional': 
				header('location: ' . BASEURL . 'mensagens/devocionais/devocional.php?id=' . $_GET['id']);
				break;
			case 'estudo': 
				header('location: ' . BASEURL . 'mensagens/estudos/estudo.php?id=' . $_GET['id']);
				break;
			case 'pregacao':
				header('location: ' . BASEURL . 'mensagens/pregacoes/pregacao.php?id=' . $_GET['id']);
				break;
		}
	}

	include(HEADER_TEMPLATE); 
	include(MENU_TEMPLATE);
?>
		<!-- inicio home section -->
		<section id="home" class="section">
			<div class="container">
				<div class="row">
					<ol class="col-lg-12 col-md-12 col-sm-12 col-xs-12 breadcrumb">
						<li><a href="<?=BASEURL; ?>">Início</a></li>
						<li class="active">Mensagens</li>
					</ol>
					<!-- inicio parte devocionais -->
					<h2 class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">Devocionais</h2>
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="row">
						<?php 
								$i = 0;
								if ($art = $objFunc->getLastDevocionais()) {
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
						</div>
					</div>
					<br><br>
					<!-- fim parte devocionais -->
					
					<!-- inicio parte estudos -->
					<h2 class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">Estudos</h2>
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="row">
						<?php 
								$i = 0;
								if ($art = $objFunc->getLastEstudos()) {
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
						</div>
					</div>
					<br><br>
					<!-- fim parte estudos -->
					
					<!-- inicio parte pregações -->
					<h2 class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">Pregações</h2>
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="row">
						<?php 
								$i = 0;
								if ($art = $objFunc->getLastPregacoes()) {
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
						</div>
					</div>
					<br><br>
					<!-- fim parte pregações -->
				</div>
			</div>
		</section>
		<!-- fim home section -->
		
<?php 
	include(SOCIAL_TEMPLATE); 
	include(MAPA_TEMPLATE); 
	include(FOOTER_TEMPLATE); 
?>