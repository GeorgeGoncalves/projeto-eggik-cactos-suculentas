# 🌵 EGGIK Cactos e Suculentas

Projeto de e-commerce acadêmico desenvolvido para a disciplina de **Desenvolvimento Web**.  
O sistema apresenta produtos (cactos e suculentas), permite navegação entre páginas e simula um carrinho de compras.

---

## 📁 Estrutura do projeto

projeto-eggik-cactos-suculentas/

├── arquivo/                  # Páginas principais do site

│   ├── adicionarCarrinho.php

│   ├── alterarCarrinho.php

│   ├── carrinho.php

│   ├── fale-conosco.php

│   ├── index.php

│   ├── produtos.php

│   └── removerCarrinho.php

├── bancoDados/                     # Conexão com banco de dados

│   ├── conexaoBD.php

│   └── funcoesDeBusca.php

├── css/                     # Estilo das páginas

│   └── ecommerce.css

├── imagem/                  # Recursos visuais

│   ├── cacto-bola.png

│   ├── cacto-estrela.png

│   ├── cacto-rabo-de-macaco.png

│   ├── crassula-ovata.png

│   ├── logoEGGIK.png

│   ├── regador.png

│   ├── substrato.png

│   └── suculenta-rabo-de-burro.png

├── scriptBancoDados/                  # Criando e inserindo dados ao banco de dados

│   └── index.php

├── view/                  # Arquivos de visualizacão usados mais de uma vez no site

│   ├── destaqueView.php

│   ├── footer.php

│   ├── header.php

│   ├── navegacao.php

│   ├── produtoView.php

└── README.md                 # Documentação principal do projeto

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