<?php
/**
 * Cria a conexão com o banco de dados.
 *
 * @return mysqli Conexão ativa com o banco de dados
 */
function conectarBD()
{
    return mysqli_connect("localhost", "root", "", "EGGIK", 3307);
}