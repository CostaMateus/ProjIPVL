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
		
		<title><?=$_SESSION['nameUser'];?> - Administração</title>
		<!-- FavIcon -->
		<link rel="shortcut icon" type="image/x-icon" href="<?=BASEURL; ?>assets/img/logos/sarca_orig.png">

		<!-- CSS Bootstrap e personalizado <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css"> -->
		<link rel="stylesheet" href="<?=BASEURL; ?>assets/bootstrap/css/main.css">
		<link rel="stylesheet" href="<?=BASEURL; ?>assets/bootstrap/css/bootstrap_readable.css">

		<!-- Scripts -->
		<script src="https://code.jquery.com/jquery-3.1.0.min.js" integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s=" crossorigin="anonymous"></script>
		<script type="text/javascript" ></script>
		
		<style>
			#accordion .panel-default .badge { background-color: #015231;}
			
			.glyphicon { margin-right:10px; }
			#accordion .panel-default .panel-body { padding:0px; margin-bottom: 0px; }
			#accordion h4 {
				color: #000;
			}
			#accordion .panel-heading a, #accordion .panel-heading a:hover {
				text-decoration: none;
			}
			#accordion .panel-default .panel-heading {
				background-color: #CCDCD5;
			}
			#accordion .panel-default .panel-heading:hover {
				background-color: rgba(204,220,213, 0.50);
			}
			#accordion .panel-default .panel-body a.list-group-item:hover {
				color: #000;
				background-color: rgba(204,220,213, 0.20);
			}
			#accordion .panel-default .panel-body .text-warning{
				color: #f0ad4e;
			}
			#accordion .panel-default .panel-body .text-danger{
				color: #d9534f;
			}
			#accordion .panel-default .list-group-item{
				border-left: none;
				border-right: none;
				border-bottom: none;
			}
			
		</style>
	</head>

	<body data-spy="scroll" data-offset="100" data-target="#navbar-main" >
		<!-- inicio navbar section -->
		<!--<nav id="navbar-main" class="navbar navbar-inverse" style="">
			<div class="container">
				<div id="navmain" class="collapse navbar-collapse" aria-expanded="true" role="navigation">
					<ul class="nav navbar-nav navbar-left"> 
						<li class="dropdown <?php $objFunc->echoActiveClassIfRequestMatches("promos")?>">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Promoções <span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="promos.php" >Lista</a></li>
								<li><a href="promos_cad.php" >Nova promoção</a></li>
							</ul>
						</li>
						<li class="dropdown <?php $objFunc->echoActiveClassIfRequestMatches("destaques")?>">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Destaques <span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="destaques.php" >Lista</a></li>
								<li><a href="destaques_cad.php" >Novo destaque</a></li>
							</ul>
						</li>
						<li class="dropdown <?php $objFunc->echoActiveClassIfRequestMatches("admins")?>">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Admins <span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="admins.php" >Lista</a></li>
								<li><a href="admins_cad.php" >Novo admin</a></li>
							</ul>
						</li>
					</ul>
					<ul class="nav navbar-nav">
						<li <?php $objFunc->echoActiveClassIfRequestMatches("index")?>><a href="index.php" ><strong><?php echo $_SESSION['nameUser'] . "<br>";?></strong></a></li>
						<li><a class="" href="?logout=y" ><u>Sair</u></a></li>
					</ul>
				</div>
			</div>
		</nav>-->
		<!-- fim navbar section -->
