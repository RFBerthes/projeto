<?php
    session_start();
    include('database_functions.php');
    $pdo = connect_to_database("bd_pep");

    $login =  $_SESSION['usuario'];
    echo $login;

    //Efetuando logout
    unset ($_SESSION['usuario']);

    $login =  $_SESSION['usuario'];
    echo $login;
    // exit;


    header('location:index.php');

?>