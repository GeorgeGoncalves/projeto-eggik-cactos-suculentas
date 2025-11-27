<?php 
// Conectando com o banco de dados
// Obs.: a porta que está sendo utilizada é a 3307 e o padrão do XAMPP é 3306
$conexao = mysqli_connect("localhost", "root", "", "", 3307);

// Comando para criar o banco de dados
$criaBanco = "CREATE DATABASE IF NOT EXISTS EGGIK";

// Comando que executa o $criaBanco
mysqli_query($conexao, $criaBanco);

// Conectando ao banco "EGGIK"
mysqli_select_db($conexao, "EGGIK");