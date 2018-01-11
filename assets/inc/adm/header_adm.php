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
		<link rel="stylesheet" href="<?=BASEURL; ?>assets/bootstrap/css/menuAdm.css">
		<link rel="stylesheet" href="<?=BASEURL; ?>assets/bootstrap/css/bootstrap_readable.css">

		<!-- Scripts -->
		<script src="https://code.jquery.com/jquery-3.1.0.min.js" integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s=" crossorigin="anonymous"></script>
		<script src="<?=BASEURL; ?>assets/bootstrap/js/nicEdit/nicEdit.js" type="text/javascript"></script>
		<script src="<?=BASEURL; ?>assets/bootstrap/js/fileUpload.js" type="text/javascript"></script>
		<script type="text/javascript">
			bkLib.onDomLoaded(function() { new nicEditor({fullPanel : true, minHeight : 100, iconsPath : '<?=BASEURL; ?>assets/bootstrap/js/nicEdit/nicEditorIcons.gif'}).panelInstance('editor1'); });
		</script>
		<style></style>
	</head>

	<body data-spy="scroll" data-offset="100" data-target="#navbar-main" >
