<?php
	require_once '../config.php'; 
	require_once USER_API;
	
	$objUser = new User();
	
	if(isset($_POST['btnEntrar'])) {
		sleep(2);
		$objUser->validaLogin($_POST);
	}
	
	if (isset($_POST['btnSavePasswordChange'])) {
		if ($_POST['pass1'] == $_POST['pass2']) {
			// echo "senha iguais";
			if ($objUser->qUpdatePass($_POST) && $objUser->qUpdateStatus($_POST)) {
				sleep(3);
				header('location: ' . BASEURL . 'admin/');
			} else {
				echo '<script type="text/javascript">alert("Erro ao salvar alteração!");</script>';
			}
		} else {
			$senhaInv2 = true;
		}
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
		
		<title>Primeiro acesso - Administração</title>
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
								HTML3 = "<img src='<?=BASEURL; ?>assets/img/logos/sarca_orig.png' width='250' height='250'><br>",
								HTML4 = "<img src='<?=BASEURL; ?>assets/img/logos/load.gif' width='75' height='75'>",
								HTML2 = "<h3 style='color:#FFF;' >Senha salva com sucesso!<br>Você voltará para página de login.</h3>",
								HTML5 = "</div>";
				HTMLTemp = HTML1 + HTML3 + HTML4 + HTML2 + HTML5;
				$wrapper.innerHTML = HTMLTemp;
				$('#l').modal('show');
			}
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
					<?php
						if (!empty($_GET['id'])) { ?>
							<h5 class="text-center">Mudança de senha</h5>
							
							<div class="alert alert-info alert-block text-center" role="alert">
								<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
								<span class="sr-only">Info:</span><br>
								Como é seu primeiro acesso<br>você deve alterar sua senha!
							</div>

							<form class="form-group" action="<?php $_SERVER["PHP_SELF"];?>" method="post">				
								<input type="hidden" name="idU" value="<?=$_GET['id'];?>">
								<input type="hidden" name="status" value="1">
								<div class="form-group <?=(isset($senhaInv2) ? "has-error" : "");?>">
									<input type="password" class="form-control" id="inputLogin" placeholder="Nova senha" 
										name="pass1" value="" required autofocus >
								</div>
								<div class="form-group <?=(isset($senhaInv2) ? "has-error" : "");?>">
									<input type="password" class="form-control" id="inputPass" placeholder="Confirme a senha" 
										name="pass2" value="" required >
										<?=(isset($senhaInv2) ? "<span class='help-block'>Campos vazios ou diferentes.</span>" : "");?>
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
											<button type="submit" onclick="abreModal()" class="btn btn-primary btn-block" name="btnSavePasswordChange">Salvar</button>
										</div>
										<br class="hidden-lg visible-md visible-sm visible-xs">
										<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
											<a class="btn btn-default btn-block" href="<?=BASEURL; ?>/admin/" role="button">Voltar</a>
										</div>
									</div>
								</div>
							</form>
					<?php 
						} else {
							
						}
					?>
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










