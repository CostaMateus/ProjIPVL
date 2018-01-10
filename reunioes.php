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
					<h2  class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">Cultos e reuniões</h2>
					<div class="col-lg-1  col-md-1"></div>
					<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12" id="tabela" >
						<h5 class="text-center">Confira os dias e as programações em nossa Igreja!</h5>
						<table class="table table-hover">
							<thead>
								<tr>
									<th>Dia da semana</th>
									<th>Programação</th>
									<th>Horário</th>
									<th>Status</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>Terça-feira</td>
									<td>Reunião nos lares</td>
									<td>19h30</td>
									<td>Programação normal</td>
								</tr>
								<tr>
									<td>Quinta-feira</td>
									<td>Estudo Bíblico e Oração</td>
									<td>19h30</td>
									<td>Programação normal</td>
								</tr>
								<tr>
									<td>Sábado</td>
									<td>Reuniões das Sociedades</td>
									<td>19h30</td>
									<td><a href="#" data-toggle="modal" data-target=".reunioes">Mais informações</a></td>
								</tr>
								<tr>
									<td>Domingo</td>
									<td>Escola Bíblica</td>
									<td>09h</td>
									<td>Programação normal</td>
								</tr>
								<tr>
									<td>Domingo</td>
									<td>Culto de adoração</td>
									<td>19h</td>
									<td>Programação normal</td>
								</tr>
							</tbody>
						</table>
						<br><br>
					</div>
					<div class="col-lg-1  col-md-1"></div>
				</div>
			</div>
		</section>
		<!-- fim home section -->
		
		<!-- incio section de modais -->
		<section>
			<!-- inicio modal das reunioes -->
			<div class="modal fade reunioes" tabindex="-1" role="dialog" aria-labelledby="mod_contato">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close" ><span aria-hidden="true">&times;</span></button>
							<h5 class="modal-title text-center" id="mod_contato">Reuniões das Sociedades</h5>
						</div>
						<div class="modal-body table-responsive">
							<div 			class="col-lg-2 col-md-2"></div>
							<div id="email" class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
								<table class="table table-hover">
									<thead>
										<tr>
											<th>Sociedade</th>
											<th>Local</th>
											<th>Horário</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>SAF</td>
											<td>Rua x, nº 000</td>
											<td>19h30</td>
										</tr>
										<tr>
											<td>UPH</td>
											<td>Casa do Fulano</td>
											<td>19h30</td>
										</tr>
										<tr>
											<td>UMP</td>
											<td>Igreja</td>
											<td>19h30</td>
										</tr>
										<tr>
											<td>UPA</td>
											<td>Igreja</td>
											<td>19h30</td>
										</tr>
									</tbody>
								</table>
							</div>
							<div 			class="col-lg-2 col-md-2"></div>
						</div>
					</div>
				</div>
			</div>
			<!-- fim modal das socdds -->
		</section>
		<!-- fim section de modais -->

<?php 
	include(SOCIAL_TEMPLATE); 
	include(MAPA_TEMPLATE); 
	include(FOOTER_TEMPLATE); 
?>