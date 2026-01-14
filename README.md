# 🌵 EGGIK Cactos e Suculentas

Projeto de e-commerce acadêmico desenvolvido para a disciplina de **Desenvolvimento Web**.  
O sistema apresenta produtos (cactos e suculentas), permite navegação entre páginas e simula um carrinho de compras.

---

## 📁 Estrutura do projeto

projeto-eggik-cactos-suculentas/

```
│
├── controller/                  # Controladores: coordenam fluxo entre Model e View
│   ├── cadastrar.php             # recebe POST do cadastro, chama UsuarioDAO e redireciona
│   ├── carrinhoController.php    # lógica de adicionar, alterar, remover itens do carrinho
│   ├── indexController.php       # lógica da página inicial (carregar produtos em destaque)
│   ├── login.php                 # recebe POST do login, chama UsuarioDAO e valida com password_verify
│   ├── logout.php                # destrói sessão e redireciona
│   └── produtoController.php     # lógica de listagem e detalhes de produtos
│
├── css/                         # Estilos
│   └── ecommerce.css
│
├── imagem/                      # Recursos visuais (imagens do site)
│   ├── cacto-bola.png
│   ├── cacto-estrela.png
│   ├── cacto-rabo-de-macaco.png
│   ├── crassula-ovata.png
│   ├── logoEGGIK.png
│   ├── regador.png
│   ├── substrato.png
│   └── suculenta-rabo-de-burro.png
│
├── model/                       # Modelos: regras de negócio e acesso ao banco
│   └── DAO/                      # Objetos de acesso a dados
│       ├── ProdutoDAO.php        # CRUD de produtos
│       └── UsuarioDAO.php        # CRUD de usuários (cadastrar, 
│   ├── ConexaoBD.php             # classe de conexão com o banco (mysqli ou PDO)
│   ├── produto.php             # Objeto produto
│   ├── usuario.php             # Objeto usuario
│
├── scriptBancoDados/            # Scripts para criação/população do banco
│   └── index.php                 # cria tabelas e insere dados iniciais
│
├── view/                        # Views: arquivos de apresentação (HTML + PHP)
│   ├── carrinho.php              # interface do carrinho
│   ├── destaqueView.php          # mostra produtos em destaque
│   ├── faleConoscoView.php       # formulário de contato
│   ├── footer.php                # rodapé
│   ├── header.php                # cabeçalho
│   ├── navegacao.php             # menu de navegação
│   └── produtoView.php           # página de produto
│
└── README.md                    # Documentação principal
```

---

## 🏗️ Arquitetura MVC

Este projeto segue o padrão **Model–View–Controller (MVC)**:

- **Model (`model/`)** → contém as regras de negócio e acesso ao banco de dados  
- **View (`view/`)** → responsável pela apresentação das páginas e interface com o usuário  
- **Controller (`controller/`)** → coordena o fluxo entre Model e View, recebendo requisições e direcionando respostas  

Essa separação facilita a manutenção, reutilização de código e organização do sistema.

---

### 🔄 Evolução para DAO

Anteriormente, o acesso ao banco de dados era realizado por funções isoladas em arquivos auxiliares.  
Agora, essas operações foram encapsuladas em classes DAO (Data Access Object), como `ProdutoDAO`, que centralizam e organizam toda a lógica de persistência.  

  **Benefícios da mudança para DAO**:
  - Encapsulamento da lógica de acesso ao banco em objetos específicos
  - Integração mais natural com o padrão MVC, mantendo o Controller focado apenas no fluxo da aplicação

Diagrama do funcionamento do DAO

[Usuário] 
    ↓ (requisição HTTP)

[Controller] -------------------------

    | Recebe parâmetros da URL/POST

    | Instancia o DAO correspondente

    | Chama métodos do DAO (ex.: buscarPorId)

    ↓

[Model - DAO] ------------------------

    | Encapsula a lógica de acesso ao banco

    | Executa SQL (SELECT, INSERT, UPDATE, DELETE)

    | Retorna arrays associativos com os dados

    ↓
[Banco de Dados] ---------------------

    | Armazena os registros (produtos, carrinho, etc.)

    ↑

[Model - DAO] ------------------------

    | Converte os resultados em objetos/arrays

    ↑

[Controller] -------------------------

    | Processa os dados recebidos

    | Decide qual View renderizar

    ↓

[View] -------------------------------

    | Exibe os dados formatados (HTML, CSS, JS)

    | Interface para o usuário

---

## 🚀 Como executar

1. Clone este repositório:
   ```bash
   git clone https://github.com/seuusuario/projeto-eggik-cactos-suculentas.git
2. Instale o [XAMPP](https://www.apachefriends.org/index.html)  
3. Certifique-se de que o Apache e o MySQL estão ativos  
4. Coloque a pasta `projeto-eggik-cactos-suculentas.git` dentro do diretório `htdocs`  
5. Acesse no navegador: [http://localhost/projeto-eggik-cactos-suculentas/scriptBancoDados/](http://localhost/projeto-eggik-cactos-suculentas/scriptBancoDados/)  
6. O script criará o banco de dados e redirecionará para a página principal  

---

## 🔑 Credenciais de Teste
Este projeto já possui um usuário e senha inicial cadastrados no banco de dados para facilitar a execução em ambiente de teste.
- 	Usuário padrão:
```
admim
```
- 	Senha padrão:
```
123
```

⚠️ Atenção: essas credenciais são apenas para fins de desenvolvimento e testes.
Em produção, recomenda-se alterar ou remover o usuário padrão e utilizar senhas criptografadas com password_hash().

## ⚙️ Funcionalidades
- 🏠 Página inicial com apresentação da loja
- 🌵 Exibição de produtos com imagens, descrição e preço
- 🛒 Simulação de carrinho de compras
- 📍 Integração com Google Maps para localização da instituição
- 📐 Layout responsivo com Flexbox

---

## 🛠️ Tecnologias utilizadas
- HTML5
- CSS3
- Javascript
- PHP (com mysqli)
- MySQL
- VSCode  
- Copilot (Assistente de desenvolvimento e documentação)
- Git Hub
- Google Fonts (tipografia)  
- Imagens para recursos visuais  

---

## 📌 Observações

- A porta do MySQL utilizada é `3307`, diferente da padrão `3306`.  
- O banco de dados é criado automaticamente na primeira execução do script.  
- Os dados iniciais são inseridos via script em `scriptBancoDados/index.php`.  

---

## 👨‍💻 Desenvolvedor
- **George Gonçalves Miranda** — [georgeggmiranda@gmail.com](mailto:georgeggmiranda@gmail.com)  

---

## 📄 Licença
Este projeto é de uso acadêmico e não possui licença comercial.  
Uso livre para fins educacionais.
