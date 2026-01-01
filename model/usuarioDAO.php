<?php
// Classe responsável por acessar os dados da tabela "usuarios"
class UsuarioDAO
{

    private $conexao;

    // Construtor recebe a conexão com o banco de dados
    public function __construct($conexao)
    {
        $this->conexao = $conexao;
    }

    // Função que busca um usuário específico pelo nome e senha
    public function buscarUsuario($usuario, $senha)
    {
        // Cria a instrução SQL para buscar o usuário e senha
        $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND senha = '$senha'";

        // Executa a consulta SQL
        $resultado = mysqli_query($this->conexao, $sql);

        // Verifica se encontrou algum registro
        if (mysqli_num_rows($resultado) > 0) {
            // Retorna os dados do usuário encontrado
            return mysqli_fetch_assoc($resultado);
        } else {
            // Se não encontrou, retorna null
            return null;
        }
    }
}