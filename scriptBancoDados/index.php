<?php

/**
 * Este script deve ser executado uma única vez, antes da navegação pelas páginas.
 * Ele realiza a criação do banco de dados e insere os dados iniciais.
 * Para melhor funcionamento, certifique-se de que o servidor Apache e o MySQL estejam ativos no XAMPP.
 */

// Incluindo o arquivo "conexao.php", para conectar ao banco de dados.
include("../bancoDados/conexaoBD.php");

// Comando para criar  a tabela "Produtos" com as colunas "id", "nome", "caminho", "descricao", "complemento" e "destaque".
$cria = "CREATE TABLE IF NOT EXISTS Produtos (
id INT AUTO_INCREMENT PRIMARY KEY,
nome VARCHAR(255), 
caminho VARCHAR(255),
preco DECIMAL(10,2),
descricao TEXT,
complemento TEXT,
destaque BOOLEAN DEFAULT 0)";

// Comando que executa $cria, criando a tabela "Produtos".
mysqli_query($conexao, $cria);

// Inserindo dados a tabela "Produtos".
$dados = "INSERT INTO Produtos (nome, caminho, preco, descricao, complemento, destaque) VALUES
('Cacto Estrela – Elegância minimalista para seu espaço', '../imagem/cacto-estrela.png', 24.90, 'O cacto-estrela é uma joia botânica que une beleza, raridade e praticidade. Com seu formato arredondado e simétrico, marcado por costelas suaves que lembram uma estrela vista de cima, essa planta conquista colecionadores e amantes do design natural. Sem espinhos e com uma textura pontilhada por tufos brancos, o Astrophytum asterias é ideal para ambientes sofisticados e minimalistas.
<p>Além do visual único, ele floresce com delicadas pétalas amarelas e centro avermelhado, trazendo cor e vida ao seu espaço. Extremamente resistente, exige pouca manutenção: luz solar direta, solo bem drenado e regas espaçadas são suficientes para mantê-lo saudável e exuberante.
Seja como peça decorativa, presente especial ou item de coleção, o cacto-estrela é uma escolha que transmite personalidade e bom gosto. Aposte nessa planta rara e transforme qualquer ambiente com um toque de natureza escultural.', '<ul><li><b>Ambiente ideal:</b> Sol pleno ou meia sombra</li><li><b>Tamanho:</b> Até 15 cm de diâmetro</li><li><b>Regas:</b> Esporádicas, com solo seco entre irrigações</li><li><b>Floração:</b> Verão, com flores vibrantes e delicadas</li><li><b>Diferencial:</b> Sem espinhos, formato estelar e fácil cultivo</li></ul>', 1),
('Cacto Bola – O ícone do design natural', '../imagem/cacto-bola.png', 54.90, 'O cacto bola, também conhecido como bola de ouro ou poltrona de sogra, é uma planta escultural que une rusticidade e sofisticação. Com seu formato globoso e espinhos dourados marcantes, ele transforma qualquer ambiente em um ponto de destaque visual. Originário do México, esse cacto é símbolo de resistência e longevidade — podendo viver por gerações quando bem cuidado.
Ideal para composições em vasos, jardins de inverno ou projetos paisagísticos modernos, o cacto bola exige pouca manutenção: luz solar direta, solo bem drenado e regas espaçadas são suficientes para manter sua beleza exuberante. Durante o verão, ele surpreende com flores solitárias e vibrantes no topo da planta, agregando ainda mais valor estético.
Além de sua imponência visual, o cacto bola é uma excelente escolha comercial por sua durabilidade, baixa demanda hídrica e apelo decorativo. Seja como peça central em ambientes internos ou como elemento de contraste em áreas externas, ele oferece personalidade e elegância com um toque exótico.', '<ul><li><b>Dimensões aproximadas:</b> 15–25 cm de diâmetro</li><li><b>Ambiente ideal:</b> Sol pleno ou meia sombra</li><li><b>Regas:</b> 1 vez por semana (em clima quente)</li><li><b>Diferencial:</b> Espinhos dourados e formato escultural</li></ul>', 1),
('Cacto rabo de macaco', '../imagem/cacto-rabo-de-macaco.png', 79.90, 'O cacto rabo-de-macaco é uma planta exótica e ornamental que conquista pela sua aparência única e floração vibrante. Com hastes longas, pendentes e cobertas por espinhos finos e brancos que lembram pelos, essa espécie é perfeita para vasos suspensos, jardins verticais e ambientes que pedem um toque selvagem e elegante.
Originário das encostas rochosas da Bolívia, o Hildewintera colademononis floresce na primavera e verão com flores avermelhadas e exuberantes, atraindo beija-flores e admiradores. Além de sua beleza, é fácil de cuidar: precisa de luz indireta, substrato bem drenado e regas espaçadas — ideal para quem busca praticidade sem abrir mão do estilo.', '<ul><li><b>Comprimento das hastes:</b> até 50 cm</li><li><b>Ambiente ideal:</b> Luz filtrada ou sol da manhã</li><li><b>Regas:</b> Moderadas, com substrato seco entre irrigações</li><li><b>Floração:</b> Vermelha intensa, primavera/verão</li><li><b>Indicado para:</b> Vasos suspensos, jardins verticais, decoração de interiores</li></ul>', 0),
('Crassula ovata', '../imagem/crassula-ovata.png', 15.99, 'A Crassula ovata, popularmente chamada de planta-jade, é uma suculenta ornamental que une elegância, simbolismo e facilidade de cultivo. Com folhas carnudas de tom verde-brilhante e bordas avermelhadas sob o sol, essa planta é considerada um símbolo de sorte e prosperidade, sendo amplamente utilizada em projetos de decoração e Feng Shui.
Seu crescimento lento e estrutura ramificada fazem dela uma excelente opção para bonsais naturais, vasos decorativos ou composições com outras suculentas. Além disso, é extremamente resistente: requer pouca água, adapta-se bem à luz solar direta ou indireta e pode viver por décadas com os cuidados certos.', '<ul><li><b>Tamanho:</b> Até 1 metro de altura (em cultivo prolongado)</li><li><b>Ambiente ideal:</b> Sol pleno ou meia sombra</li><li><b>Regas:</b> Apenas quando o solo estiver seco</li><li><b>Flores:</b> Pequenas, brancas ou rosadas, no final do inverno</li><li><b>Diferencial:</b> Planta associada à prosperidade e equilíbrio energético</li></ul>', 0),
('Regador','../imagem/regador.png', 29.99, 'Mantenha suas plantas sempre saudáveis com o regador de 10 litros, projetado para unir capacidade, resistência e conforto no uso diário. Fabricado em polietileno de alta densidade, esse regador é leve, durável e ideal para hortas, jardins, vasos e áreas verdes de médio a grande porte.
Seu bico tipo chuveirinho removível garante uma irrigação uniforme e delicada, evitando o desperdício de água e protegendo folhas e flores mais sensíveis. O design ergonômico com alça reforçada facilita o transporte e o manuseio, mesmo quando cheio.', '<ul><li><b>Capacidade:</b> 10 litros</li><li><b>Material:</b> Plástico resistente (polietileno de alta densidade)</li><li><b>Bico:</b> Chuveirinho removível para irrigação suave</li><li><b>Alça:</b> Anatômica e reforçada para maior conforto</li><li><b>Uso ideal:</b> Hortas, jardins, vasos e estufas</li></ul>',0),
('Substrato','../imagem/substrato.png', 29.99, 'Garanta o melhor cuidado para suas plantas com o substrato ideal para cactos e suculentas. Desenvolvido com uma fórmula balanceada, esse substrato oferece alta drenagem, excelente aeração e nutrição sob medida, evitando o excesso de umidade que pode comprometer a saúde das raízes.
Composto por casca de pinus, carvão vegetal, húmus de minhoca e arenito, ele cria um ambiente leve e poroso, permitindo que as raízes respirem e se desenvolvam com vigor. Pronto para uso, é perfeito para vasos, jardineiras e terrários, proporcionando praticidade e resultados visíveis desde o primeiro plantio.', '<ul><li><b>Composição:</b> Casca de pinus, carvão vegetal, húmus de minhoca, perlita e arenito</li><li><b>Aeração ideal:</b> Solo leve e solto para raízes saudáveis</li><li><b>Pronto para uso:</b> Não requer misturas adicionais</li><li><b>Indicado para:</b> Cactos, suculentas, rosa-do-deserto, zamioculca e outras espécies xerófitas</li></ul>', 0),
('Suculenta rabo de burro','../imagem/suculenta-rabo-de-burro.png', 5.90, 'A suculenta Rabo-de-Burro é uma verdadeira joia do mundo vegetal. Com hastes longas e pendentes cobertas por folhas carnudas e verde-azuladas, essa planta cria um efeito cascata exuberante que transforma qualquer ambiente em um espaço mais leve e sofisticado. Ideal para vasos suspensos, arranjos verticais ou decorações internas com estilo natural e moderno.
Originária do México, a Sedum morganianum é resistente, fácil de cuidar e perfeita para quem busca beleza com baixa manutenção. Suas folhas delicadas exigem manuseio cuidadoso, mas em troca oferecem um visual único e encantador. Na primavera, presenteia com pequenas flores rosadas ou avermelhadas que surgem nas pontas dos caules, adicionando ainda mais charme à composição.','<ul><li><b>Comprimento das hastes:</b> até 90 cm</li><li><b>Ambiente ideal:</b> Luz indireta ou sol da manhã</li><li><b>Regas:</b> Moderadas, com solo seco entre irrigações</li><li><b>Floração:</b> Primavera, com flores delicadas em tons suaves</li><li><b>Indicado para:</b> Vasos suspensos, jardins verticais, decoração de interiores</li></ul>', 0)";

// Comando que executa $dados, inseri dados na tabela "Produtos"
mysqli_query($conexao, $dados);

// Agora estou encaminhando o usuário para a página inicial do site, onde o mesmo poderá iniciar sua navegação
header("location: ../arquivo/");
exit;