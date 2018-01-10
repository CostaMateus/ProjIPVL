<?php 
	require_once 'config.php'; 
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

		<!-- inicio slides section -->
		<section id="slides" class="section hidden-xs">
			<div class="container" >				
				<div id="slidesInfo" class="carousel slide" data-ride="carousel">
					<!-- Indicadores -->
					<ol class="carousel-indicators">
						<li data-target="#slidesInfo" data-slide-to="0" class="active"></li>
						<li data-target="#slidesInfo" data-slide-to="1"></li>
						<li data-target="#slidesInfo" data-slide-to="2"></li>
					</ol>

					<!-- slides -- resolução 1300 x 500px -->
					<div class="carousel-inner">
						<div class="item active">
							<img src="assets/img/slides/serie.png" alt="Série" >
							<!--<div class="carousel-caption">
								<h3>Los Angeles</h3>
								<p>LA is always so much fun!</p>
							</div>-->
						</div>

						<div class="item">
							<img src="assets/img/slides/socdd.png" alt="Sociedade" >
						</div>

						<div class="item">
							<img src="assets/img/slides/aviso.png" alt="Aviso" >
						</div>
					</div>

					<!-- Controles left and right -->
					<a class="left carousel-control" href="#slidesInfo" data-slide="prev">
						<span class="glyphicon glyphicon-chevron-left"></span>
						<span class="sr-only">Anterior</span>
					</a>
					<a class="right carousel-control" href="#slidesInfo" data-slide="next">
						<span class="glyphicon glyphicon-chevron-right"></span>
						<span class="sr-only">Próximo</span>
					</a>
				</div>
			</div>
		</section>
		<div id="slidesInfoXS" class="carousel slide visible-xs" data-ride="carousel" style="margin-top:-15px!important;">
			<!-- Indicadores -->
			<ol class="carousel-indicators">
				<li data-target="#slidesInfoXS" data-slide-to="0" class="active"></li>
				<li data-target="#slidesInfoXS" data-slide-to="1"></li>
				<li data-target="#slidesInfoXS" data-slide-to="2"></li>
			</ol>

			<!-- slides -- resolução 1300 x 500px -->
			<div class="carousel-inner">
				<div class="item active">
					<img src="assets/img/slides/serie.png" alt="Série" >
					<!--<div class="carousel-caption">
						<h3>Los Angeles</h3>
						<p>LA is always so much fun!</p>
					</div>-->
				</div>

				<div class="item">
					<img src="assets/img/slides/socdd.png" alt="Sociedade" >
				</div>

				<div class="item">
					<img src="assets/img/slides/aviso.png" alt="Aviso" >
				</div>
			</div>

			<!-- Controles left and right -->
			<a class="left carousel-control" href="#slidesInfoXS" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left"></span>
				<span class="sr-only">Anterior</span>
			</a>
			<a class="right carousel-control" href="#slidesInfoXS" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right"></span>
				<span class="sr-only">Próximo</span>
			</a>
		</div>
		<!-- fim slides section -->
		
		<!-- inicio home section -->
		<section id="home" class="section">
			<div class="container">
				<div class="row">
					<h2 class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">Devocionais, Estudos e Pregações</h2>
			<?php 
					$i = 0;
					if ($art = $objFunc->getLastUpload()) {
						foreach($art as $result) { 
							$i++;
			?> 	
							<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"> 
								<div class="thumbnail  text-center">
									<a href="?a=<?=($result['category']);?>&id=<?=$objFunc->base64($result['id'], 1); ?>" title="<?php echo ($result['title']);?>">
<!--								<a href="?a=<?=utf8_encode($result['category']);?>&id=<?=$objFunc->base64($result['id'], 1); ?>" title="<?php echo utf8_encode($result['title']);?>">-->
										<div class="featured-thumbnail">
			<?php 							if ($result['image'] != null) { ?> 
<!--											<img src="<?=BASEURL; ?>assets/img/mensagem/<?=utf8_encode($result['category']);?>/<?=$result['image'];?>" -->
												<img src="<?=BASEURL; ?>assets/img/mensagem/<?=($result['category']);?>/<?=$result['image'];?>" 
													class="img-responsive img-rounded" 
													title="<?=($result['title']);?>" alt="<?=($result['title']);?>" />
<!--												title="<?=utf8_encode($result['title']);?>" alt="<?=utf8_encode($result['title']);?>" />-->
			<?php 							} else { ?> 
												<img src="<?=BASEURL; ?>assets/img/mensagem/padrao.jpg" 
													class="img-responsive img-rounded" 
													title="<?=($result['title']);?>" alt="<?=($result['title']);?>" />
<!--												title="<?=utf8_encode($result['title']);?>" alt="<?=utf8_encode($result['title']);?>" />-->
			<?php 							} ?> 
										</div>
										<div class="caption">
											<h4><?=($objFunc->limitaTexto55($result['title']));?></h4>
											<p><?=($objFunc->limitaTexto75($result['text']));?></p>
											<h6>#<?=($result['category']);?></h6>
<!--										<h4><?=utf8_encode($objFunc->limitaTexto55($result['title']));?></h4>
											<p><?=utf8_encode($objFunc->limitaTexto75($result['text']));?></p>
											<h6>#<?=utf8_encode($result['category']);?></h6>-->
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
			<?php
					} ?>
				</div>
				<br><br>
			</div>
		</section>
		<!-- fim home section -->
		
<?php 
	include(SOCIAL_TEMPLATE); 
	include(MAPA_TEMPLATE); 
	include(FOOTER_TEMPLATE); 
?>