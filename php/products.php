<?php

    include_once 'functions.php';

    $showMore = false;

    if (isset($_GET['category'])) {

        $category = $_GET['category'];

        if ($category == 'all') {
            $query = $conn->prepare("Select * from TProduct");
        } else {
            $query = $conn->prepare("Select TProduct.*
                                        from TProduct, TCategory, TProductCategory
                                        where TProduct.ID_Product = TProductCategory.ID_Product
                                        and TCategory.ID_Category = TProductCategory.ID_Category
                                        and TCategory.CName = :category");
            $query->bindValue("category", $category);
        }

        $query->execute();
    } else {

        $showMore = true;
        $query = $conn->prepare("Select * from TProduct order by RAND() limit 5");
        $query->execute();
    }

?>
<section class="products" id="produtos">
    <h1 class="heading">Nossos Produtos</h1>
    <div class="slider">
        <!-- Tentar adicionar um slider -->
        <div class="wrapper">
            <?php
                while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                    echo
                    '<div class="box">
                                <img src="image/products/' . $row['Image'] . '" alt="">
                                <h3>' . $row['Pname'] . '</h3>
                                <h4>' . $row['Info'] . '</h4>
                                <div class="rating">' .
                        getStars($row['Rating'])
                        . ' <a>(' . $row['RatingCount'] . ')</a>
                                </div>
                                <div class="price">R$' . number_format($row['Price'], 2, ',', '.') . '</div>';
                    if(isset($_SESSION['User'])){
                        echo    '<form method="POST" action="php/cartactions.php?id=' . $row['ID_Product'] . '">
                                    <input type="submit" name="add" class="btn" value="Adicionar ao Carrinho">
                                </form>';
                    }else{
                        echo    '<a href="login.php">
                                    <input type="submit" class="btn" value="Comprar">
                                </a>';
                    }
                    echo '</div>';
                }
            ?>
        </div>
    </div>
    </div>
    <?php
        if ($showMore) {
            echo    '<div class="btn-more">
                        <a href="products.php?category=all"><input type="submit" class="btn" value="Mais Produtos"></a>
                    </div>';
        }
    ?>
</section>