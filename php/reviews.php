<?php

include_once 'functions.php';

?>
<section class="reviews" id="reviews">
    <h1 class="heading">Reviews</h1>
    <div class="content">
        <div class="slider">
            <!-- Tentar adicionar um slider -->
            <div class="wrapper">
                <?php
                $query = $conn->prepare("SELECT TProduct.Pname as product, TUser.Uname as user, TUser.Uimage as img, TReview.*
                                        from TProduct, TUser, TReview
                                        where TReview.ID_User = TUser.ID_User
                                        and TReview.ID_Product = TProduct.ID_Product
                                        order by Rand()
                                        limit 3");
                $query->execute();
                while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                    $date = date_format(new DateTime($row['Rdate']),'d/m/y');
                    echo
                    ' <div class="box">
                        <div class="user">
                            <img src="image/reviews/' . $row['img'] . '">
                            <p>' . $row['user'] . '</p>
                            <h3>' . $date . '</h3>
                        </div>
                        <div class="rate">
                            <h3>' . $row['product'] . '</h3>
                            <div class="rating">' .
                        getStars($row['Rating'])
                        . '</div>
                            <p>' . $row['Review'] . '</p>
                        </div>
                    </div>';
                }
                ?>
            </div>
        </div>
    </div>
</section>