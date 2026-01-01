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

    /**
     * Busca um usuário específico pelo nome e valida a senha.
     *
     * @param string $usuario Nome do usuário a ser buscado
     * @param string $senha   Senha digitada pelo usuário (texto puro)
     *
     * @return array|null Retorna os dados do usuário em caso de login válido, ou null se não encontrar ou a senha não corresponder
     */
    public function buscarUsuario($usuario, $senha)
    {
        // Cria a instrução SQL para buscar o usuário e senha
        $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario'";

        // Executa a consulta SQL
        $resultado = mysqli_query($this->conexao, $sql);

        // Verifica se encontrou algum registro
        if (mysqli_num_rows($resultado) > 0) {
            // Retorna os dados do usuário encontrado
            $dados = mysqli_fetch_assoc($resultado);

            // Verifica se a senha digitada corresponde ao hash
            if (password_verify($senha, $dados['senha'])) {
                return $dados; // Login válido
            }
        } else {
            // Se não encontrou, retorna null
            return null;
        }
    }

     /**
     * Método para cadastrar um novo usuário na tabela "usuarios".
     *
     * @param Usuario $usuario Objeto Usuario contendo os dados:
     * - usuario: nome de login
     * - senha: senha já criptografada com password_hash
     * - email: endereço de e-mail
     *
     * @return bool Retorna true se o cadastro foi realizado com sucesso, ou false em caso de falha na execução da query.
     */
    public function cadastrar(Usuario $usuario)
    {
        $sql = "INSERT INTO usuarios (usuario, senha, email) VALUES ('" .
            $usuario->getUsuario() . "', '" .
            $usuario->getSenha() . "', '" .
            $usuario->getEmail() . "')";

        return mysqli_query($this->conexao, $sql);
    }
}
