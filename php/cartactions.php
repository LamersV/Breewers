<?php
include '../connection.php';

$id = $_SESSION['UserID'];

if(isset($_POST['remove'])){
    $productId = $_GET['id'];

    $idtest = $conn->prepare("SELECT * from TCartProduct, TUser where TCartProduct.ID_User = TUser.ID_User and ID_Product = :id and TUser.ID_User = :user");
    $idtest->bindValue("id", $productId);
    $idtest->bindValue("user", $id);
    $idtest->execute();

    if ($idtest->rowCount() == 1) {
        $query = $conn->prepare("DELETE TCartProduct from TCartProduct, TUser where TCartProduct.ID_User = TUser.ID_User and ID_Product = :id and TUser.ID_User = :user");
        $query->bindValue("id", $productId);
        $query->bindValue("user", $id);
        $query->execute();
        if(!isset($_GET['finalizar'])){
            header("Location: ../index.php");
        }else{
            header("Location: ../cart.php");
        }
        
    }
}

if(isset($_POST['add'])){
    $productId = $_GET['id'];

    $idtest = $conn->prepare("SELECT TCartProduct.quantity as quant from TCartProduct, TUser where TCartProduct.ID_User = TUser.ID_User and ID_Product = :id and TUser.ID_User = :user");
    $idtest->bindValue("id", $productId);
    $idtest->bindValue("user", $id);
    $idtest->execute();

    if ($idtest->rowCount() == 1) {
        $data = $idtest->fetch();
        $query = $conn->prepare("UPDATE TCartProduct set quantity = :newquant where ID_User = :user and ID_Product = :id");
        $query->bindValue("newquant", ($data['quant'] + 1));
        $query->bindValue("user", $id);
        $query->bindValue("id", $productId);
        $query->execute();
        header("Location: ../index.php");
    }else{
        $query = $conn->prepare("INSERT into TCartProduct value (:cart, :product, :quantity)");
        $query->bindValue("cart", $id);
        $query->bindValue("product", $productId);
        $query->bindValue("quantity", 1);
        $query->execute();
        header("Location: ../index.php");
    }
}