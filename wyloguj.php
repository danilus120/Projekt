<?php
    include('header.php');
    unset($_SESSION["zalogowany"]);
    unset($_SESSION["login"]);
    session_destroy();
    header('Location: index.php');
?>