<?php

	/** caminho absoluto para a pasta do sistema **/ 
	if (!defined('ABSPATH')) 
		define('ABSPATH', dirname(__FILE__) . '/'); 


	/** caminho no server para o sistema **/ 
	if (!defined('BASEURL')) 
		define('BASEURL', '/IPVL/'); //Descomentar para usar em localhost
		// define('BASEURL', '/'); //Descomentar qnd upar no server real 


	/** caminho do arquivo da classe Connection **/ 
	if (!defined('CONN_API')) 
		define('CONN_API', ABSPATH . 'assets/lib/Connection.class.php'); 
	
	
	/** caminho do arquivo da classe Functions **/ 
	if (!defined('FUNC_API')) 
		define('FUNC_API', ABSPATH . 'assets/lib/Functions.class.php'); 
	
	
	/** caminho do arquivo da classe Functions **/ 
	if (!defined('EMAIL_API')) 
		define('EMAIL_API', ABSPATH . 'assets/lib/FunctionEmail.class.php'); 
	
	
	/** caminho do arquivo de classe User **/ 
	if (!defined('USER_API')) 
		define('USER_API', ABSPATH . 'assets/lib/User.class.php'); 


	/** caminhos dos templates de header, social e footer **/ 
	define('HEADER_TEMPLATE', ABSPATH . 'assets/inc/header.php'); 
	define('MENU_TEMPLATE', ABSPATH . 'assets/inc/menu.php'); 
	define('FOOTER_TEMPLATE', ABSPATH . 'assets/inc/footer.php');
	define('SOCIAL_TEMPLATE', ABSPATH . 'assets/inc/social.php'); 
	define('MAPA_TEMPLATE', ABSPATH . 'assets/inc/mapa.php'); 
	//define('CONTAT_TEMPLATE', ABSPATH . 'assets/inc/contato.php'); 
	
	define('ART_N_ENC_TEMPLATE', ABSPATH . 'assets/inc/artigoN.php'); 
	
	
	define('HEADER_TEMPLATE_ADM', ABSPATH . 'assets/inc/adm/header_adm.php');
	// define('MENU_TEMPLATE_ADM', ABSPATH . 'assets/inc/adm/menu_adm.php');
	define('FOOTER_TEMPLATE_ADM', ABSPATH . 'assets/inc/adm/footer_adm.php');
	define('AREA_ADM_TEMPLATE_ADM', ABSPATH . 'assets/inc/adm/area_adm.php');
	define('OFF_TEMPLATE_ADM', ABSPATH . 'assets/inc/adm/off_adm.php');

?>