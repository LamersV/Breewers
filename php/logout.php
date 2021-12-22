<?php

    session_start();

    unset($_SESSION['User']);
    unset($_SESSION['Image']);
    session_destroy();

    header("Location: ../index.php");
?>