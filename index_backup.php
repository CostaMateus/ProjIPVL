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
		<section id="slides" class="section">
			<div class="container" >				
				<div id="myCarousel" class="carousel slide" data-ride="carousel">
					<!-- Indicadores -->
					<ol class="carousel-indicators">
						<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
						<li data-target="#myCarousel" data-slide-to="1"></li>
						<li data-target="#myCarousel" data-slide-to="2"></li>
					</ol>

					<!-- slides -- proporção 1300 x 450px -->
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
					<a class="left carousel-control" href="#myCarousel" data-slide="prev">
						<span class="glyphicon glyphicon-chevron-left"></span>
						<span class="sr-only">Anterior</span>
					</a>
					<a class="right carousel-control" href="#myCarousel" data-slide="next">
						<span class="glyphicon glyphicon-chevron-right"></span>
						<span class="sr-only">Próximo</span>
					</a>
				</div>
			</div>
		</section>
		<!-- fim slides section -->
		
		<!-- inicio home section -->
		<section id="home" class="section">
			<div class="container">
				<div class="container-fluid" role="main">
					<h2 class="text-center">Devocionais, Estudos e Pregações</h2>

<!-- ============================================================================================================================================== -->
					<div class="row">
						<?php 
							$i = 1;
							if ($art = $objFunc->getLastUpload()) {
								foreach($art as $result) { 
									
						?> 	
									<article class="col-lg-4 col-md-4 col-sm-4 col-xs-12"> 
										<div class="thumbnail  text-center">
											<a href="?a=<?=utf8_encode($result['category']);?>&id=<?=$objFunc->base64($result['id'], 1); ?>" title="<?php echo utf8_encode($result['title']);?>">
												<div class="featured-thumbnail">
						<?php 						if ($result['image'] != null) { ?> 
														<img src="<?=BASEURL; ?>assets/img/conteudo/<?php echo $result['image'];?>" 
															class="img-responsive img-rounded" 
															title="<?=utf8_encode($result['title']);?>" alt="<?=utf8_encode($result['title']);?>" />
						<?php 						} else { ?> 
														<img src="<?=BASEURL; ?>assets/img/conteudo/padrao.jpg" 
															class="img-responsive img-rounded" 
															title="<?=utf8_encode($result['title']);?>" alt="<?=utf8_encode($result['title']);?>" />
						<?php 						} ?> 
												</div>
												<div class="caption">
													<h4><?=utf8_encode($objFunc->limitaTexto55($result['title']));?></h4>
													<p><?=utf8_encode($objFunc->limitaTexto75($result['text']));?></p>
													<h6>#<?=utf8_encode($result['category']);?></h6>
												</div>
											</a> 
										</div>
									</article>
						<?php 		if ($i < 3) {?>
										<div class="clearfix visible-xs-block"></div>
						<?php 			$i++; 
									} else { ?>
										<div class="clearfix visible-xs-block"></div>
										<div class="clearfix visible-sm-block"></div>
										<div class="clearfix visible-md-block"></div>
										<div class="clearfix visible-lg-block"></div>
						<?php 			$i = 1;
									}
								}
							} else { ?>
								<article class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center"> 
									<h4>Nenhum artigo encontrado!</h4>
									<p>Lamentamos o inconveniente.</p>
								</article>
						<?php
							} ?>
					</div>
<!-- ============================================================================================================================================== -->

					<div class="row text-center">
						<br><br><br><br>
						<p>Dinamico acima</p>
						<p>================</p>
						<p>Estatico abaixo</p>
						<br><br><br><br>
					</div>
					<div class="row">
						<!-- inicio modelo article -->
						<!--
						<article class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
							<div class="thumbnail">
								<a href="#">
									<div class="featured-thumbnail">
										<img src="" alt="Imagem de 400x200" />
									</div>
									<div class="caption text-center">
										<h4>57 caractes no máximo</h4>
										<p>80 caractes no máximo</p>
									</div>
								</a>
							</div>
						</article>
						<div class="clearfix visible-xs-block"></div> //ao final de todos os articles 
						<div class="clearfix visible-sm-block"></div> {
						<div class="clearfix visible-md-block"></div> 	ao final a cada 3 articles
						<div class="clearfix visible-lg-block"></div>                              }
						-->
						<!-- fim modelo article -->
						
						<article class="col-lg-4 col-md-4 col-sm-4 col-xs-12"> 
							<div class="thumbnail">
								<a href="exemplo_pregacao.html">
									<div class="featured-thumbnail">
										<img src="assets/img/conteudo/cruz.png" alt="Imagem base" />
									</div>
									<div class="caption text-center">
										<h4>Título Pregação #6 <br> 55 caracteres</h4>
										<p>Mini texto de descrição, 80 caracteres <br> Imagem 400x200</p>
									</div>
								</a> 
							</div>
						</article>
						<div class="clearfix visible-xs-block"></div>
						
						<article class="col-lg-4 col-md-4 col-sm-4 col-xs-12"> 
							<div class="thumbnail">
								<a href="exemplo_estudo.html">
									<div class="featured-thumbnail">
										<img src="assets/img/conteudo/construcao.png" alt="Imagem base" />
									</div>
									<div class="caption text-center">
										<h4>Título Estudo #11 <br> 55 caracteres</h4>
										<p>Mini texto de descrição, 80 caracteres <br> Imagem 400x200</p>
									</div>
								</a>  
							</div>
						</article>
						<div class="clearfix visible-xs-block"></div>
						
						<article class="col-lg-4 col-md-4 col-sm-4 col-xs-12"> 
							<div class="thumbnail">
								<a href="exemplo_devocional.html">
									<div class="featured-thumbnail">
										<img src="assets/img/conteudo/cdd.png" alt="Imagem base" />
									</div>
									<div class="caption text-center">
										<h4>Devocional Sábado <br> 55 caracteres</h4>
										<p>Mini texto de descrição, 80 caracteres <br> Imagem 400x200</p>
									</div>
								</a> 
							</div>
						</article>
						<div class="clearfix visible-xs-block"></div>
						<div class="clearfix visible-sm-block"></div>
						<div class="clearfix visible-md-block"></div>
						<div class="clearfix visible-lg-block"></div>
						
						<article class="col-lg-4 col-md-4 col-sm-4 col-xs-12"> 
							<div class="thumbnail">
								<a href="exemplo_devocional.html">
									<div class="featured-thumbnail">
										<img src="assets/img/conteudo/cdd.png" alt="Imagem base" />
									</div>
									<div class="caption text-center">
										<h4>Devocional Sexta-feira <br> 55 caracteres</h4>
										<p>Mini texto de descrição, 80 caracteres <br> Imagem 400x200</p>
									</div>
								</a> 
							</div>
						</article>
						<div class="clearfix visible-xs-block"></div>
						
						<article class="col-lg-4 col-md-4 col-sm-4 col-xs-12"> 
							<div class="thumbnail">
								<a href="exemplo_estudo.html">
									<div class="featured-thumbnail">
										<img src="assets/img/conteudo/construcao.png" alt="Imagem base" />
									</div>
									<div class="caption text-center">
										<h4>Título Estudo #10 <br> 55 caracteres</h4>
										<p>Mini texto de descrição, 80 caracteres <br> Imagem 400x200</p>
									</div>
								</a>  
							</div>
						</article>
						<div class="clearfix visible-xs-block"></div>
						
						<article class="col-lg-4 col-md-4 col-sm-4 col-xs-12"> 
							<div class="thumbnail">
								<a href="exemplo_devocional.html">
									<div class="featured-thumbnail">
										<img src="assets/img/conteudo/cdd.png" alt="Imagem base" />
									</div>
									<div class="caption text-center">
										<h4>Devocional Quarta-feira <br> 55 caracteres</h4>
										<p>Mini texto de descrição, 80 caracteres <br> Imagem 400x200</p>
									</div>
								</a> 
							</div>
						</article>
						<div class="clearfix visible-xs-block"></div>
						<div class="clearfix visible-sm-block"></div>
						<div class="clearfix visible-md-block"></div>
						<div class="clearfix visible-lg-block"></div>
						
						<article class="col-lg-4 col-md-4 col-sm-4 col-xs-12"> 
							<div class="thumbnail">
								<a href="exemplo_pregacao.html">
									<div class="featured-thumbnail">
										<img src="assets/img/conteudo/cruz.png" alt="Imagem base" />
									</div>
									<div class="caption text-center">
										<h4>Título Pregação #5 <br> 55 caracteres</h4>
										<p>Mini texto de descrição, 80 caracteres <br> Imagem 400x200</p>
									</div>
								</a> 
							</div>
						</article>
						<div class="clearfix visible-xs-block"></div>
						
						<article class="col-lg-4 col-md-4 col-sm-4 col-xs-12"> 
							<div class="thumbnail">
								<a href="exemplo_pregacao.html">
									<div class="featured-thumbnail">
										<img src="assets/img/conteudo/cruz.png" alt="Imagem base" />
									</div>
									<div class="caption text-center">
										<h4>Título Pregação #4 <br> 55 caracteres</h4>
										<p>Mini texto de descrição, 80 caracteres <br> Imagem 400x200</p>
									</div>
								</a>  
							</div>
						</article>
						<div class="clearfix visible-xs-block"></div>
						
						<article class="col-lg-4 col-md-4 col-sm-4 col-xs-12"> 
							<div class="thumbnail">
								<a href="exemplo_devocional.html">
									<div class="featured-thumbnail">
										<img src="assets/img/conteudo/cdd.png" alt="Imagem base" />
									</div>
									<div class="caption text-center">
										<h4>Devocional Segunda-feira <br> 55 caracteres</h4>
										<p>Mini texto de descrição, 80 caracteres <br> Imagem 400x200</p>
									</div>
								</a> 
							</div>
						</article>
						<div class="clearfix visible-xs-block"></div>
						<div class="clearfix visible-sm-block"></div>
						<div class="clearfix visible-md-block"></div>
						<div class="clearfix visible-lg-block"></div>
						
					</div>
				</div>
			</div>
		</section>
		<!-- fim home section -->
		
		<!-- incio section de modais -->
		<section>
			<!-- inicio modal das msgs exemplo -->
			<div class="modal fade msgs" tabindex="-1" role="dialog" aria-labelledby="mod_contato">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h5 class="modal-title text-center" id="mod_contato">Devocionais, Mensagens e Estudos</h5>
						</div>
						<div class="modal-body table-responsive">
							<div id="email" class="col-lg-offset-3 col-lg-6 col-md-offset-3 col-md-6 col-sm-12 col-xs-12 text-center">
								<p><br>Vai para a página específica,<br><br><br><br>com o devido conteúdo.<br><br><br><br>Imagem ilustrativa 400x200<br></p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- fim modal das msgs exemplo -->
			<!-- inicio modal da igreja exemplo -->
			<div class="modal fade igreja" tabindex="-1" role="dialog" aria-labelledby="mod_contato">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h5 class="modal-title text-center" id="mod_contato">Nossa história / O que nos dirige / O que cremos</h5>
						</div>
						<div class="modal-body table-responsive">
							<div id="email" class="col-lg-offset-3 col-lg-6 col-md-offset-3 col-md-6 col-sm-12 col-xs-12 text-center">
								<p><br>Vai para a página específica<br><br><br><br>para cada opção<br><br><br><br>com o devido conteúdo.<br></p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- fim modal da igreja exemplo -->
			<!-- inicio modal das socdds exemplo -->
			<div class="modal fade socdds" tabindex="-1" role="dialog" aria-labelledby="mod_contato">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h5 class="modal-title text-center" id="mod_contato">Devocionais, Mensagens e Estudos</h5>
						</div>
						<div class="modal-body table-responsive">
							<div id="email" class="col-lg-offset-3 col-lg-6 col-md-offset-3 col-md-6 col-sm-12 col-xs-12 text-center">
								<p><br>Vai para a página específica da sociadade<br><br><br><br>ou site, se tiver,<br><br><br><br>ou rede social.<br></p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- fim modal das socdds exemplo -->
			<!-- inicio modal das reunioes exemplo -->
			<div class="modal fade reunioes" tabindex="-1" role="dialog" aria-labelledby="mod_contato">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h5 class="modal-title text-center" id="mod_contato">Reuniões das Sociedades</h5>
						</div>
						<div class="modal-body table-responsive">
							<div id="email" class="col-lg-offset-3 col-lg-6 col-md-offset-3 col-md-6 col-sm-12 col-xs-12">
								<table class="table table-hover">
									<thead>
										<tr>
											<th>Sociedade</th>
											<th>Local</th>
											<th>Horário</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>SAF</td>
											<td>Rua x, nº 000</td>
											<td>19h30</td>
										</tr>
										<tr>
											<td>UPH</td>
											<td>Casa do Fulano</td>
											<td>19h30</td>
										</tr>
										<tr>
											<td>UMP</td>
											<td>Igreja</td>
											<td>19h30</td>
										</tr>
										<tr>
											<td>UPA</td>
											<td>Igreja</td>
											<td>19h30</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- fim modal das socdds exemplo -->
		</section>
		<!-- fim section de modais -->

<?php 
	include(SOCIAL_TEMPLATE); 
	include(FOOTER_TEMPLATE); 
?>