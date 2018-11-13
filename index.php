<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->


<?php
	$msg = isset($_GET['err']) ? "Usuário ou senha inválidos." : "";
?>

<!DOCTYPE HTML>
<html lang="en">

<head>
	<title>Sistema de Ponto - Login</title>
	<!-- Meta-Tags -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<meta name="keywords" content="Clear login Form a Responsive Web Template, Bootstrap Web Templates, Flat Web Templates, Android Compatible Web Template, Smartphone Compatible Web Template, Free Webdesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design">
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- //Meta-Tags -->
	<!-- Stylesheets -->
	<link href="css/font-awesome.css" rel="stylesheet">
	<link href="css/style.css" rel='stylesheet' type='text/css' />
	<script
	src="https://code.jquery.com/jquery-3.3.1.js"
	integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
	crossorigin="anonymous"></script>
  
	<script type = "text/javascript" src = "js/functions.js"></script>
	<!--// Stylesheets -->
	<!--fonts-->
	<!-- title -->
	<!-- body -->
	<link href="//fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;subset=devanagari,latin-ext" rel="stylesheet">
	<!--//fonts-->
</head>

<body>
	<h3 class = 'err'><?= $msg ?></h3>
	<h1>Sistema de Pontos </h1>
	<div class="w3ls-login box box--big">
		<!-- form starts here -->
		<form action="API/api.php" method="post">
			<div class="agile-field-txt">
				<label>
				<i class="fa fa-user" aria-hidden="true"></i> Matrícula </label>
				<input id = 'matricula' type="text" name="matricula" placeholder="Digite sua matrícula " required="" />
				<input type="hidden" name="requisicao" value = "login" />

			</div>
			<div class="agile-field-txt">
				<label>
				<i class="fa fa-envelope" aria-hidden="true"></i> senha </label>
				<input id = 'senha' type="password" name="senha" placeholder="Digite sua senha " required="" id="myInput" />
				<div class="agile_label">
					<input id="check3" name="check3" type="checkbox" value="show password" onclick="myFunction()">
					<label class="check" for="check3">Mostrar senha</label>
				</div>
			</div>
			<!-- script for show password -->
			<script>
				function myFunction() {
					var x = document.getElementById("myInput");
					if (x.type === "password") {
						x.type = "text";
					} else {
						x.type = "password";
					}
				}
			</script>
			<!-- //script ends here -->
			<div class="w3ls-bot">
				<div class="switch-agileits">
				</div>
				<div class="form-end">
					<input type="submit" value="LOGIN">
				</div>
				<div class="form-end">
					<input id = 'ponto' type="button" value="PONTO">
				</div>
				<div class="clearfix"></div>
			</div>
		</form>
	</div>
	<!-- //form ends here -->
	<!--copyright-->
	<div class="copy-wthree">
		<p>© 2018 Clear Login Form. All Rights Reserved | Design by
			<a href="http://w3layouts.com/" target="_blank">W3layouts</a>
		</p>
	</div>
	<!--//copyright-->
</body>

</html>