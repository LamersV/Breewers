<section class="home" id="home">
    <div class="content">
        <h3>A bebida que irá te acompanhar nos salões de Valhalla!</h3>
        <?php
            if(isset($_SESSION['User'])){
                echo '<a>Beba com moderação!</a>';
            }else{
                echo '<a href="register.php">Cadastre-se!</a>';
            }
        ?>        
    </div>
</section>