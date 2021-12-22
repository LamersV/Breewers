<?php

include '../Breewers/connection.php';

if (isset($_SESSION['User'])) {
    header("Location: index.php");
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>Breewers - Login</title>
    <link rel="icon" href="image/logo-ico.png">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
    <div class="login-header">
        <header class="header">
            <div class="header-item">
                <!-- Logo -->
                <div class="logobox">
                    <a href="index.php" class="logo"><i class="fas fa-beer"></i></a>
                    <a href="index.php" class="logo"><i class="fas fa-beer"></i></a>
                    <a href="index.php" class="logo"><i class="fas fa-beer"></i></a>
                    <a href="index.php" class="logoname">Breewers</a>
                </div>
            </div>
        </header>
    </div>

    <div class="login-div">
        <div class="login-form">
            <?php
            include 'php/login.php';
            ?>
        </div>
    </div>


    <footer class="footer">
        &copy <?= date('Y') ?> - Breewers | Todos os direitos reservados
    </footer>

    <script type="text/javascript" src="js/script.js"></script>
</body>

</html>