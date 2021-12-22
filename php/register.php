<form action="../Breewers/php/reg.php" method="POST">
    <div class="login-header">
        <h2>Cadastrar</h2>
    </div>
    <div class="login-content">
        <input type="text" name="name" placeholder="Nome*" class="box" required></Input>
        <input type="email" name="email" placeholder="Email*" class="box" required></Input>
        <input type="password" name="passwrd" placeholder="Senha*" class="box" required></Input>
        <?php
            if(isset($_SESSION['message'])){
                echo $_SESSION['message'];
            }
        ?>
        <input type="submit" value="Cadastrar" class="btn">
        <p>Já possui cadastro? <a href="login.php">Faça Login!</a> </p>
        <?php
            $_SESSION['message'] = null;
        ?>
    </div>
</form>