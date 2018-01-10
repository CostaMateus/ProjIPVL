<?php 
	require_once '../../config.php';
	require_once FUNC_API; 
	
	$objFunc = new Functions(); 
	
	if (isset($_GET['id'])){
		$msg = $objFunc->getConteudo($_GET['id']);
	}

	include(HEADER_TEMPLATE); 
	include(MENU_TEMPLATE);
?>
		<!-- inicio home section -->
		<section id="home" class="section">
			<div class="container">
				<ol class="breadcrumb">
					<li><a href="<?=BASEURL; ?>">Início</a></li>
					<li><a href="<?=BASEURL; ?>mensagens/">Mensagens</a></li>
					<li><a href="<?=BASEURL; ?>mensagens/devocionais/">Devocionais</a></li>
	<?php 	if ($msg != null) { ?>
					<li class="active"><?=utf8_encode($msg['title'])?></li>
				</ol>
				<!-- inicio devocional -->
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<?php 		if ($msg['image'] != null) { ?> 
					<img src="<?=BASEURL; ?>assets/img/mensagem/<?=utf8_encode($msg['category']);?>/<?php echo $msg['image'];?>" 
						class="img-responsive img-rounded center-block" 
						title="<?=utf8_encode($msg['title']);?>" alt="<?=utf8_encode($msg['title']);?>" />
	<?php 		} else { ?> 
					<img src="<?=BASEURL; ?>assets/img/mensagem/padrao.jpg" 
						class="img-responsive img-rounded center-block" 
						title="<?=utf8_encode($msg['title']);?>" alt="<?=utf8_encode($msg['title']);?>" />
	<?php 		} ?> 
				</div>
				<div class="col-lg-1  col-md-1  "></div>
				<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
					<h2 class="text-center"><?=utf8_encode($msg['title']);?></h2>
					<p class="text-justify"><?=utf8_encode($msg['text']);?></p>
					<br><br>
				</div>
				<div class="col-lg-1  col-md-1  "></div>
				<!-- fim devocional -->
	<?php 	} else { 
				include(ART_N_ENC_TEMPLATE);
			} ?>
			</div>
		</section>
		<!-- fim home section -->
		
<?php 
	include(SOCIAL_TEMPLATE); 
	include(MAPA_TEMPLATE); 
	include(FOOTER_TEMPLATE); 
?>