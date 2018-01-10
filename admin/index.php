<?php
	require_once '../config.php'; 
	require_once USER_API;
	
	$objUser = new User();
	
	if(isset($_POST['btnEntrar'])) {
		sleep(3);
		$objUser->validaLogin($_POST);
	}
	
?>
<!DOCTYPE html>
<html lang="pt-BR" prefix="og: http://ogp.me/ns#">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
		<meta name="author" content="IPB Vila Nova; IPB;">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		
		<meta property="og:locale" content="pt_BR" />
		<meta property="og:type" content="website" />
		<meta property="og:title" content="IPVL - Administração" />
		<meta property="og:description" content="Administração." />
		<meta property="og:url" content="http://hogrpg.pe.hu/" /> <!-- mudar -->
		<meta property="og:site_name" content="2ª IPB Imperatriz - MA" />
		<meta property="og:image" content="http://hogrpg.pe.hu/assets/img/logos/vila_nova_orig_2.jpg" /> <!-- mudar -->
		
		<title>Login - Administração</title>
		<!-- FavIcon -->
		<link rel="shortcut icon" type="image/x-icon" href="<?=BASEURL; ?>assets/img/logos/sarca_orig.png">

		<!-- CSS Bootstrap e personalizado <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css"> -->
		<link rel="stylesheet" href="<?=BASEURL; ?>assets/bootstrap/css/main.css">
		<link rel="stylesheet" href="<?=BASEURL; ?>assets/bootstrap/css/bootstrap_readable.css">

		<!-- Scripts -->
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<script type="text/javascript" >
			function abreModal(){
				var $wrapper = document.querySelector('#load'),
								HTML1 = "<div class='text-center'>",
								HTML2 = "<meta http-equiv=\'refresh\' content=\'2; url=<?=BASEURL; ?>admin/view/\' />",
								HTML3 = "<img src='<?=BASEURL; ?>assets/img/logos/sarca_orig.png' width='250' height='250'><br>",
								HTML4 = "<img src='<?=BASEURL; ?>assets/img/logos/load.gif' width='75' height='75'>",
								HTML5 = "</div>";
				HTMLTemp = HTML1 + HTML2 + HTML3 + HTML4 + HTML5;
				$wrapper.innerHTML = HTMLTemp;
				$('#l').modal('show');
			}
			
			$(document).ready(function() {
				$('#l').modal('show');
				setTimeout(function() {
					$('.modal').modal('hide');
				}, 1500); 
				// 2000 = 2s
			});
		</script>
	</head>
	
	<body data-spy="scroll" data-offset="100" data-target="#navbar-main">
		<!-- inicio login section -->
		<section id="login" class="section">
			<div class="container">
				<br>
				<br>
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center ">
						<img src="<?=BASEURL; ?>assets/img/logos/vila_nova_orig.png" alt="IPB Vila Nova" style="margin-bottom: 20px;" height="150" />
					</div>
					<div class="col-lg-4 col-md-4 col-sm-3 col-xs-2 "></div>
					<div class="col-lg-4 col-md-4 col-sm-6 col-xs-8 well">
						<h5 class="text-center">Login</h5>
						<?php
							if (!empty($_GET['e']) == "error") { ?>
								<div class="alert alert-danger alert-block text-center" role="alert">
									<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
									<span class="sr-only">Erro:</span>
									Login e/ou senha estão incorretos!
								</div>
						<?php 
							} 
							if (!empty($_GET['a']) == "active") { ?>
								<div class="alert alert-info alert-block text-center" role="alert">
									<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
									<span class="sr-only">Info:</span>
									Esta conta está desativada.<br>Peça ao administrador para que a reative!
								</div>
						<?php 
							} 
							if (!empty($_GET['m']) == "mod") { ?>
								<div class="alert alert-info alert-block text-center" role="alert">
									<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
									<span class="sr-only">Info:</span>
									Você foi deslogado pois alterou<br>seu login e/ou senha.
								</div>
						<?php 
							}
							if (!empty($_GET['s']) == "stt") { ?>
								<div class="alert alert-warning alert-block text-center" role="alert">
									<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
									<span class="sr-only">Info:</span>
									Você foi deslogado pois desativou sua conta.
								</div>
						<?php 
							} 
						?>

						<form class="form-group" action="<?php $_SERVER["PHP_SELF"];?>" method="post">
							<div class="form-group">
								<input type="text" class="form-control" id="inputLogin" placeholder="Login" 
									name="login" required autofocus >
							</div>
							<div class="form-group">
								<input type="password" class="form-control" id="inputPass" placeholder="Senha" 
									name="pass" required >
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
										<button type="submit" onclick="abreModal()" class="btn btn-primary btn-block" name="btnEntrar">Entrar</button>
									</div>
									<br class="hidden-lg visible-md visible-sm visible-xs">
									<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
										<a class="btn btn-default btn-block" href="../" role="button">Voltar</a>
									</div>
								</div>
							</div>
						</form>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-3 col-xs-2 "></div>
				</div>
			</div>
		</section>
		<!-- fim login section -->
		
		<!-- incio section de modais -->
		<section id="modais" class="section">
			<!-- inicio login modal -->
			<div id="l" class="modal fade" tabindex="-1" role="" >
				<div id="load" class="modal-dialog modal-md" role="document">
					<div class='text-center'>
						<img src='<?=BASEURL; ?>assets/img/logos/sarca_orig.png' width='250' height='250'><br>
						<img src='<?=BASEURL; ?>assets/img/logos/load.gif' width='75' height='75'>
					</div>
				</div>
			</div>
			<!-- fim login modal -->
		</section>
		<!-- fim section de modais -->
		
		<!-- Scripts -->
		<!-- Última versão JavaScript compilada e minificada -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" 
			integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	</body>
</html>










