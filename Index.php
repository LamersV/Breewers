<?php

include '../Breewers/connection.php';

?>
<!DOCTYPE html>
<html>

<head>
	<title>Breewers</title>
	<link rel="icon" href="image/logo-ico.png">

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
	<?php
		include("php/header.php");
	?>
	<!-- Home -->
	<div>
		<?php
		include("php/home.php");
		?>
	</div>
	<!-- Lista de desejo -->
	<div>
		<?php
		//Só aparece caso o usuario tenha algum produto em sua lista, não foi implementado a ação de adicionar
		if (isset($_SESSION['User'])) {
			include("php/wishlist.php");
		}
		?>
	</div>
	<!-- Produtos -->
	<div>
		<?php
		include("php/products.php");
		?>
	</div>
	<!-- Video Demonstrativo -->
	<div>
		<?php
		include("php/demonstration.php");
		?>
	</div>
	<!-- Reviews -->
	<div>
		<?php
		include("php/reviews.php");
		?>
	</div>
	<!-- Contato -->
	<div>
		<?php
		include("php/contact.php");
		?>
	</div>

	<footer class="footer">
		&copy <?= date('Y') ?> - Breewers | Todos os direitos reservados
	</footer>

	<script type="text/javascript" src="js/script.js"></script>
</body>

</html>