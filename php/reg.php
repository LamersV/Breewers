<?php


if (isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['passwrd']) && !empty($_POST['passwrd']) && isset($_POST['name']) && !empty($_POST['name'])) {
    require '../connection.php';
    require '../php/User.class.php';

    $u = new User();

    $name = addslashes($_POST['name']);
    $email = addslashes($_POST['email']);
    $passwrd = addslashes($_POST['passwrd']);;
    $result = $u;

    switch ($u->register($name, $email, $passwrd)) {
        case 0:
            $_SESSION['message'] = '<p class= "error">Preencha corretamente todos os campos</p>';
            header("Location: ../register.php");
            break;
        case 1:
            header("Location: ../login.php");
            break;
        case 2:
            $_SESSION['message'] = '<p class= "error">O email já está sendo utilizado</p>';
            header("Location: ../register.php");
            break;
    }
}else{
    $_SESSION['message'] = '<p class= "error">Preencha todos os campos</p>';
    header("Location: ../register.php");
}
