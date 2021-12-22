<header class="header">
	<!---<div class="header-slogan">--->
	<!---<h2 class="slogan">O Hidromel mais puro</h2>--->
	<!---</div>--->
	<div class="header-item">
		<!-- Logo -->
		<div class="logobox">
			<a href="index.php" class="logo"><i class="fas fa-beer"></i></a>
			<a href="index.php" class="logo"><i class="fas fa-beer"></i></a>
			<a href="index.php" class="logo"><i class="fas fa-beer"></i></a>
			<a href="index.php" class="logoname">Breewers</a>
		</div>
		<!-- Navbar -->
		<nav id="navbar" class="navbar">
			<?php
				if (isset($_GET['category']) or isset($_GET['finalizar'])) {
					echo '<a href="index.php">Home</a>';
				} else {
					echo '<a href="#home">Home</a>';
				}
			?>
			<div class="products-navbar">
				<a href="#produtos">Produtos</a>
				<div class="category-box">
					<a class="category-item" href="products.php?category=Hidromel">Hidromel</a>
					<a class="category-item" href="products.php?category=Cerveja">Cerveja</a>
					<a class="category-item" href="products.php?category=Vinho">Vinho</a>
					<a class="category-item" href="products.php?category=Vodka">Vodka</a>
					<a class="category-item" href="products.php?category=Whisky">Whisky</a>
				</div>
			</div>
			<a href="index.php#demonstracao">Demonstração</a>
			<a href="index.php#reviews">Reviews</a>
			<a href="#contato">Contato</a>
		</nav>
		<!-- Icones do menu -->
		<div class="icons">
			<div class="fas fa-bars" id="menu-btn"></div>
			<div class="fas fa-search" id="search-btn"></div>
			<?php
			if (isset($_SESSION['User']) & !isset($_GET['finalizar'])) {
				echo '<div class="fas fa-shopping-cart" id="cart-btn"></div>';
			} else {
				echo '<div class="fas fa-shopping-cart" id="cart-btn"style="display: none;"></div>';
			}
			?>
			<div class="fas fa-user" id="login-btn"></div>
		</div>
		<!-- Barra de Pesquisa -->
		<form id="search-form" action="" class="search-form">
			<input type="search" id="search-box" placeholder="Busque aqui...">
			<label for="search-box" class="fas fa-search"></label>
		</form>
		<!-- Carrinho de Compras -->
		<div id="shopping-cart" action="" class="shopping-cart">
			<div class="cartheader">
				<h2 class="heading">Shopping Cart</h2>
				<div class="shopping-close" id="close-btn"><i class="fas fa-times-circle close"></i></div>
			</div>
			<div class="itens">
				<?php
				if (isset($_SESSION['User'])) {
					include 'php/cart.php';
				} else {
					echo '<div class="empty-cart">Carrinho Vazio</div>';
				}
				?>
			</div>

		</div>
		<!-- Caixa de Login -->
		<div id="login-form" class="login-form">
			<?php
			if (isset($_SESSION['User'])) {
				include 'php/user.php';
			} else {
				include 'php/login.php';
			}
			?>
		</div>
	</div>

</header>