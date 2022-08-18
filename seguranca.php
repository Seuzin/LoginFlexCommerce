<?php
    include ('conexao.php');
    if(!isset($_SESSION)){
        session_start();
    }

    if(!isset($_SESSION['idadm'])){
        die("Não é possível acessar essa página sem estar logado!");
    }

?>