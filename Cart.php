<?php

include '../Breewers/connection.php';

?>
<!DOCTYPE html>
<html>

<head>
    <title>Breewers - Carrinho</title>
    <link rel="icon" href="image/logo-ico.png">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
    <!-- Produtos -->
    <div>
        <?php
        include("php/header.php");
        ?>
    </div>
    <!-- Produtos -->
    <section>
        <h1 class="heading">Carrinho</h1>
        <div class="cart">
            <div class="shopping-cart">
                <div class="items">
                    <?php
                    include 'php/cart.php';
                    ?>
                </div>
            </div>
            <div class="adress">
                <h1 class="heading">Endereço</h1>
                <form action="php/buy.php">
                    <div class="info">
                        <input type="text" placeholder="Endereço" class="box" required>
                        <input type="text" placeholder="Complemento" class="box" required>
                        <input type="submit" class="btn" value="Comprar">
                    </div>
                </form>
            </div>
        </div>
    </section>

    <footer class="footer">
        &copy <?= date('Y') ?> - Breewers | Todos os direitos reservados
    </footer>

    <script type="text/javascript" src="js/script.js"></script>
</body>

</html>