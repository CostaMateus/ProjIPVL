<?php
	require_once '../config.php'; 
	require_once FUNC_API; 
	
	$objFunc = new Functions(); 
	
	include(HEADER_TEMPLATE); 
	include(MENU_TEMPLATE);
?>
		<!-- inicio home section -->
		<section id="home" class="section">
			<div class="container">
				<div class="row">
					<h2 class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">Sociedades Internas</h2>
					<br><br><br><br><br>
					<!-- SAF -->
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 text-center">
						<a href="saf.php">
							<div class="featured-thumbnail">
								<img src="<?=BASEURL; ?>assets/img/logos/logo_saf.png" alt="S.A.F." style="width:65%;"/>
							</div>
						</a>
					</div>
					
					<!-- UPH -->
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 text-center">
						<a href="uph.php">
							<div class="featured-thumbnail">
								<img src="<?=BASEURL; ?>assets/img/logos/logo_uph.png" alt="UPH" style="width:94%;"/>
							</div>
						</a>
					</div>
				</div>
				<div class="row">
					<!-- UMP -->
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 text-center">
						<a href="ump.php">
							<div class="featured-thumbnail">
								<img src="<?=BASEURL; ?>assets/img/logos/logo_ump.png" alt="UMP" style="width:50%;"/>
							</div>
						</a>
					</div>
					
					<!-- UPA -->
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 text-center">
						<a href="upa.php">
							<div class="featured-thumbnail">
								<img src="<?=BASEURL; ?>assets/img/logos/logo_upa.png" alt="UPA" style="width:79%;"/>
							</div>
						</a>
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