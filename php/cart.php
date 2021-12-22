<?php

$id = $_SESSION['UserID'];

$query = $conn-> prepare("SELECT TProduct.ID_Product as id, TProduct.Pname as product, TProduct.Info as info, TProduct.Image as img, TProduct.Price as price, TCartProduct.Quantity as quantity
                        From TProduct, TUser, TCartProduct
                        where TCartProduct.ID_User = TUser.ID_User
                        and TCartProduct.ID_Product = TProduct.ID_Product
                        and TUser.ID_User = :id");
$query->bindValue("id", $id);
$query->execute();

if ($query->rowCount() > 0) {
    $totalValue = 0;


    while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
        $totalValue += ($row['price'] * $row['quantity']);
        echo '<div class="cart-items">
                <div class="cart-image">
                    <img src="image/products/'.$row['img'].'" alt="">
                </div>
                <div class="cart-about">
                    <h1 class="cart-title">'.$row['product'].'</h1>
                    <h3 class="cart-subitle">'.$row['info'].'</h3>
                </div>
                <div class="cart-counter">
                    <!--<h1 class="cart-btn">-</h1>--!>
                    <h1 class="cart-count">Quant: '.$row['quantity'].'</h1>
                    <!--<input type="submit" class="cart-btn" value="+">--!>
                </div>
                <div class="cart-price">
                    <h1 class="cart-amount">R$'.number_format($row['price'], 2, ',', '.').'</h1>
                    <form method="POST" action="php/cartactions.php?id='.$row['id'].'">
                        <input type="submit" name="remove" class="cart-remove" value="Remove">
                    </form>
                </div>
            </div>';
    }
    echo '</div>
            <div class="cart-border"></div>
            <div class="cart-checkout">
                <div class="cart-value">
                    <h1 class="cart-total">Total:</h1>
                    <h1 class="cart-total-amount">R$'.number_format($totalValue, 2, ',', '.').'</h1>
                </div>';

    if(!isset($_GET['finalizar'])){
        echo    '<div class="cart-finish">
                    <a href="cart.php?finalizar"><input type="submit" value="Finalizar" class="btn"></a>
                </div>';
    }
    
}else{
    echo '<div class="empty-cart">Carrinho Vazio</div>';
}
