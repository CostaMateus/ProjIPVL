		<!-- inicio navbar section -->
		<nav id="navbar-main" class="navbar navbar-inverse" >
			<div class="container" >
				<!-- inicio cabeçario -->
				<div class="row hidden-xs">
					<div class="col-lg-3 col-md-3 col-sm-3" id="logo_vilanova">
						<a href="#" title="IPB Vila Nova – 2ª Igreja Presbiteriana de Imperatriz" rel="home" class="">
							<!-- logo local -->
							<img src="<?=BASEURL; ?>assets/img/logos/vila_nova_preto.png" alt="IPB Vila Nova" style="float:left; margin:15px 0 10px 0;" height="125" />
						</a>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6" ><br>
						<h2 id="" class="text-center" >2ª IGREJA PRESBITERIANA IMPERATRIZ - MA</h2>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-3" id="logo_vilanova">
						<a class="hidden-xs" href="http://ipb.org.br" title="Igreja Presbiteriana do Brasil" target="_blank">
							<!-- logo ipb -->
							<img src="<?=BASEURL; ?>assets/img/logos/logo_ipb_preto.png" alt="IPB" style="float:right; margin:15px 0 10px 0;" height="125"/>
						</a>
					</div>
				</div>
				<!-- fim cabeçario -->
				
				<!-- inicio menu -->
				<div class="row" >
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navmain" aria-expanded="false">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a href="" rel="next" target="_top" class="visible-xs"><img class="" height="40" alt="Logo IPB" src="<?=BASEURL; ?>assets/img/logos/sarca_orig.png"></a>
					</div>
					<div id="navmain" class="collapse navbar-collapse" aria-expanded="false" role="navigation">
						<ul class="nav navbar-nav">
							<li><a href="<?=BASEURL; ?>" >Home</a></li>
							<li class="dropdown">
								<a class="dropdown-toggle" id="dropMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
									A Igreja <span class="caret"></span>
								</a>
								<ul class="dropdown-menu" aria-labelledby="dropMenu1">
									<li><a href="<?=BASEURL; ?>nossahistoria.php">Nossa história</a></li>
									<li><a href="<?=BASEURL; ?>oquenosdirige.php">O que nos dirige</a></li>
									<li><a href="<?=BASEURL; ?>oquecremos.php">O que cremos</a></li>
									<!--<li><a href="#" >Pastor</a></li>-->
								</ul>
							</li>
							<li class="dropdown">
								<a class="dropdown-toggle" id="dropMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
									Sociedades Internas <span class="caret"></span>
								</a>
								<ul class="dropdown-menu" aria-labelledby="dropMenu2">
									<li><a href="<?=BASEURL; ?>sociedades/" >Sociedades</a></li>
									<li class="divider" ></li>
									<li><a href="<?=BASEURL; ?>sociedades/saf.php" >SAF</a></li>
									<li><a href="<?=BASEURL; ?>sociedades/uph.php" >UPH</a></li>
									<li><a href="<?=BASEURL; ?>sociedades/ump.php" >UMP</a></li>
									<li><a href="<?=BASEURL; ?>sociedades/upa.php" >UPA</a></li>
								</ul>
							</li>
							<li class="dropdown">
								<a class="dropdown-toggle" id="dropMenu3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
									Mensagens <span class="caret"></span>
								</a>
								<ul class="dropdown-menu" aria-labelledby="dropMenu3">
									<li><a href="<?=BASEURL; ?>mensagens/" >Todas Mensagens</a></li>
									<li class="divider" ></li>
									<li><a href="<?=BASEURL; ?>mensagens/devocionais/" >Devocionais</a></li>
									<li><a href="<?=BASEURL; ?>mensagens/estudos/" >Estudos</a></li>
									<li><a href="<?=BASEURL; ?>mensagens/pregacoes/" >Pregações</a></li>
								</ul>
							</li>
							<li class="hidden-sm" ><a href="<?=BASEURL; ?>reunioes.php" >Cultos e reuniões</a></li>
							<li class="hidden-sm" ><a href="<?=BASEURL; ?>vconhecer.php" >Venha conhecer</a></li>
							<!--<li><a href="#" >Fotos</a></li>-->
							
							<li class="dropdown hidden-xs hidden-md hidden-lg" >
								<a class="dropdown-toggle" id="dropMenu4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
									Mais <span class="caret"></span>
								</a>
								<ul class="dropdown-menu" aria-labelledby="dropMenu4">
									<li><a href="<?=BASEURL; ?>reunioes.php" >Cultos e reuniões</a></li>
									<li><a href="<?=BASEURL; ?>vconhecer.php" >Venha conhecer</a></li>
								</ul>
							</li>
						</ul>
					</div>
				</div>
				<!-- fim menu -->
			</div>
		</nav>
		<!-- fim navbar section -->