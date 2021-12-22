<?php


if(isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['passwrd']) && !empty($_POST['passwrd'])){
    require '../connection.php';
    require '../php/User.class.php';

    $u = new User();
    
    $email = addslashes($_POST['email']);
    $passwrd = addslashes($_POST['passwrd']);

    if($u->login($email, $passwrd)){
        if(isset($_SESSION['User'])){
            header("Location: ../index.php");
        }else{
            $_SESSION['message'] = '<p class= "error">Erro</p>';
            header("Location: ../login.php");
        }
    }else{
        $_SESSION['message'] = '<p class= "error">Email ou senha incorretos</p>';
        header("Location: ../login.php");
    }
}
else{
    $_SESSION['message'] = '<p class= "error">Preencha todos os campos</p>';
    header("Location: ../login.php");
}
