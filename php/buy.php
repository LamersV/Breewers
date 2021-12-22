<?php

include '../connection.php';
$id = $_SESSION['UserID'];

$query = $conn-> prepare("DELETE From TCartProduct where ID_User = :id");
$query->bindValue("id", $id);
$query->execute();
echo "<script type='text/javascript'>window.alert('Compra realizada com sucesso!');window.location.href = '../index.php';</script>";