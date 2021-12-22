<form action="../Breewers/php/log.php" method="POST">
    <div class="login-header">
        <h2>Entrar</h2>
    </div>
    <div class="login-content">
        <input type="email" name="email" placeholder="Email" class="box" required></Input>
        <input type="password" name="passwrd" placeholder="Senha" class="box" required></Input>
        <?php
            if(isset($_SESSION['message'])){
                echo $_SESSION['message'];
            }
        ?>
        <input type="submit" value="Entrar" class="btn">
        <p>Não possui cadastro? <a href="register.php">Crie já!</a> </p>
        <?php
            $_SESSION['message'] = null;
        ?>
    </div>
</form>