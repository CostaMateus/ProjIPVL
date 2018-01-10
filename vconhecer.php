<?php
	require_once 'config.php'; 
	require_once FUNC_API; 
	
	$objFunc = new Functions(); 
	
	include(HEADER_TEMPLATE); 
	include(MENU_TEMPLATE);
?>
		<!-- inicio home section -->
		<section id="home" class="section">
			<div class="container">
				<div class="row">
					<h2  class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center" >Venha conhecer</h2>
					<div class="col-lg-1  col-md-1"></div>
					<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1404.0661421866994!2d-47.455614953833035!3d-5.5226118538658!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x58f1a0e1f89dff12!2sIgreja+Presbiteriana+do+Brasil+em+Vila+Nova!5e0!3m2!1spt-BR!2sbr!4v1502410751189" width="100%" height="700" frameborder="0" style="border:0" allowfullscreen></iframe>
					</div>
					<div class="col-lg-1  col-md-1"></div>
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
						<h3>Endereço</h3>
						<p>R. Dom Marcelino, 1800 - Vila Nova, Imperatriz - MA</p>
					<!--
						<h3>Telefone</h3>
						<p>(99) XXXX - XXXX</p>
					-->
					</div>
				</div>
			</div>
		</section>
		<!-- fim home section -->

<?php 
	include(SOCIAL_TEMPLATE); 
	include(MAPA_TEMPLATE); 
	include(FOOTER_TEMPLATE); 
?>