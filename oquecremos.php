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
					<h2  class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">O que cremos</h2>
					<div class="col-lg-1  col-md-1  col-sm-1"></div>
					<div class="col-lg-10 col-md-10 col-sm-10 col-xs-12 text-justify">
						<p>
							A Igreja Presbiteriana do Brasil adota, como exposição das doutrinas bíblicas, a Confissão da Fé de Westminster, o Catecismo Maior e o Catecismo Menor ou Breve Catecismo. Nossa única regra de fé e prática é a Bíblia Sagrada. Mas, em virtude de a Bíblia não trazer as doutrinas já sistematizadas, adotamos a Confissão de Fé e os Catecismos como exposição do sistema de doutrinas ensinadas na Escritura.
						</p>
						<p>
							A Confissão de Fé e os Catecismos foram elaborados por 151 teólogos de várias Igrejas Evangélicas, reunidos na Abadia de Westminster, em Londres, na Inglaterra, de julho de 1643 a fevereiro de 1649. Esses livros foram preparados em espírito de oração e profunda submissão ao ensino das Escrituras.
							<ul>
								<li><a href="" >Confissão de Fé de Westminster</a></li>
								<li><a href="" >Catecismo Maior de Westminster</a></li>
								<li><a href="" >Breve Catecismo de Westminster</a></li>
							</ul>
						</p>
						<br><br>
					</div>
					<div class="col-lg-1  col-md-1  col-sm-1"></div>
				</div>
			</div>
		</section>
		<!-- fim home section -->

<?php 
	include(SOCIAL_TEMPLATE); 
	include(MAPA_TEMPLATE); 
	include(FOOTER_TEMPLATE); 
?>