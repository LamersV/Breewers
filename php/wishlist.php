<?php

include_once 'functions.php';

$id = $_SESSION['UserID'];

$query = $conn->prepare("SELECT TProduct.*
                    fROM TUser, TProduct, TWishlist
                    WHERE TWishlist.ID_User = TUser.ID_User
                    AND TWishlist.ID_Product = TProduct.ID_Product
                    AND TUser.ID_User = :id
                    LIMIT 5;");
$query->bindValue("id", $id);
$query->execute();

if ($query->rowCount() > 0) {
    echo
    '<section class="products" id="produtos">
        <h1 class="heading">Lista de Desejos</h1>
        <div class="slider">
            <div class="wrapper">
                ';
    while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
        echo   '<div class="box">
                            <img src="image/products/' . $row['Image'] . '" alt="">
                            <h3>' . $row['Pname'] . '</h3>
                            <h4>' . $row['Info'] . '</h4>
                            <div class="rating">' .
            getStars($row['Rating'])
            . ' <a>(' . $row['RatingCount'] . ')</a>
                            </div>
                            <div class="price">R$'.number_format($row['Price'], 2, ',', '.').'</div>
                            <form method="POST" action="php/cartactions.php?id='.$row['ID_Product'].'">
                                <input type="submit" name="add" class="btn" value="Adicionar ao Carrinho">
                            </form>
                        </div>';
    }
    echo '
            
        </div>
    </div>
    </div>
</section>';
}
