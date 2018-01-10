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
					<h2  class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">O que nos dirige</h2>
					<div class="col-lg-1  col-md-1  col-sm-1"></div>
					<div class="col-lg-10 col-md-10 col-sm-10 col-xs-12 text-justify">
						<h4>Nossa Visão</h4>
						<p> Ser uma igreja onde as pessoas estejam conectadas a Jesus Cristo e umas com as outras, vivendo e manifestando a graça do Senhor em tudo o que fazemos.
							<br>(Jo 17.21-23)</p>
						<br>
						
						<h4>Nossa Visão</h4>
						<p>	Trazer pessoas a Jesus Cristo e à comunhão com sua Família, estimulando-as à maturidade e ao serviço cristão, 
							glorificando, por meio de uma vida e adoração saudável, o nome de Deus.</p>
						<br>
						
						<h4>Princípios</h4>
						<p>	Somos uma igreja missional. Uma comunidade que alcança pessoas pela pregação do evangelho de Cristo, 
							conduzindo-as e estimulando-as à maturidade cristã – tendo Jesus como perfeito modelo e tornando-se seus imitadores Discipulado.</p>
						<p> Uma família que expressa de forma sincera nosso amor e louvor ao Senhor Adoração, cultivando um relacionamento de dependência 
							de Deus e de interdependência com as pessoas Comunhão.</p>
						<p> Que ajuda seus membros a descobrirem seus dons espirituais capacitando-os a tornarem-se eficientes nas ministrações para as 
							quais o Espírito Santo os chama Ministério, servindo a cidade através de nosso testemunho e trabalho social Diaconia.</p>
						<br>
						
						<h3>O Discipulado como Fundamento</h3>
						<p>	Cremos no discipulado como princípio regente sobre os demais. Pois somente através da jornada de discipulado obtemos o verdadeiro 
							conhecimento e motivação para:
							<ul>
								<li>a. Adorarmos a Deus de maneira correta – através do conhecimento relacional do ser de Deus revelado nas Escrituras;</li>
								<li>b. Vivenciarmos o sentido bíblico da real comunhão com Deus e com sua igreja;</li>
								<li>c. Servirmos intencionalmente a Deus e sua igreja através da capacitação que recebemos para o exercício de nossa. 
									Como discípulos, encaramos a oportunidade de serviço como privilégio e não como obrigação;</li>
								<li>d. Sermos uma referencia para a cidade, como sal da terra e luz do mundo, por meio da maneira como vivemos e de como servimos a comunidade;</li>
							</ul>
						</p>
						<p>	Como uma igreja discipuladora estamos comprometidos com o alcance dos perdidos, sendo uma comunidade sensível e contextualizada 
							com as necessidades da cidade (e especialmente do bairro Vila Nova), desempenhando um papel de excelência e relevância no 
							desempenho de nossa missão aos olhos de Deus, de seu povo e do mundo.
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