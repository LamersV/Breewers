<div class="user-header">
	<h2>Usuário</h2>
</div>
<div class="user-content">
    <?php
        echo 
        '<img src="image/reviews/'.$_SESSION['Image'].'">
        <h3>'.$_SESSION['User'].'</h3>';
    ?>
    <a href="php/logout.php">Logout</a>
</div>
