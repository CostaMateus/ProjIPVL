
		<!-- inicio copyright section -->
		<footer id="copyright" class="section" >
			<div class="container text-center" >
				<h5>&copy; Copyright 2017 - 2ª Igreja Presbiteriana de Imperatriz</h5>
				<p id="Mateus">Desenvolvido por: 
					<a href="https://www.linkedin.com/in/costamateus/" target="_blank" >Mateus Lopes Costa</a>
				</p>
			</div>
		</footer>
		<!-- fim copyright section -->
		
		<!-- Scripts -->
		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		<script>
			$(function() {
				url = document.location.pathname.substr(document.location.pathname.lastIndexOf("/") + 1); // obter nome da página atual ex: teste.html
				el = document.querySelector("[href*='/" + url + "']"); // procura o link que contenha a url
				li = el.parentElement.classList.add("active"); // adicionado a classe no li
			});
		</script>
	</body>
</html>