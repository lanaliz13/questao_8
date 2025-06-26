<?php

$host = "localhost";
$user = "root";
$pass = "13072004Lana";
$bd = "loja";

$conexao = mysqli_connect($host, $user, $pass, $bd);

if(!$conexao) die("Erro de conexão: ". mysqli_connect_error());