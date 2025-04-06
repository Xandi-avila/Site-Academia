-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 22/11/2024 às 21:53
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `senac_boxe`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `agendamentos`
--

CREATE TABLE `agendamentos` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `professor_id` int(11) DEFAULT NULL,
  `data_agendamento` datetime NOT NULL,
  `duracao` int(11) NOT NULL,
  `status` enum('confirmado','pendente','cancelado') DEFAULT 'pendente',
  `data_criacao` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `agendamentos`
--

INSERT INTO `agendamentos` (`id`, `usuario_id`, `professor_id`, `data_agendamento`, `duracao`, `status`, `data_criacao`) VALUES
(11, 1, 10, '2024-10-10 10:30:00', 60, 'pendente', '2024-11-20 17:25:21'),
(12, 1, 11, '2024-10-11 14:00:00', 60, 'cancelado', '2024-11-20 17:25:37'),
(14, 1, 12, '2024-10-11 14:30:00', 60, 'pendente', '2024-11-20 17:29:59'),
(15, 1, 10, '2024-10-13 10:00:00', 60, 'pendente', '2024-11-22 17:11:27'),
(16, 1, 9, '2024-10-18 11:00:00', 60, 'confirmado', '2024-11-22 17:12:06'),
(17, 1, 11, '2024-10-25 10:00:00', 60, 'pendente', '2024-11-22 17:12:17'),
(18, 1, 12, '2024-10-28 08:00:00', 60, 'pendente', '2024-11-22 17:12:27'),
(19, 1, 10, '2024-10-20 15:00:00', 60, 'pendente', '2024-11-22 17:12:48'),
(20, 1, 11, '2024-10-28 18:00:00', 60, 'pendente', '2024-11-22 17:12:57'),
(21, 1, 12, '2024-11-28 19:00:00', 60, 'pendente', '2024-11-22 17:13:07'),
(22, 1, 12, '2024-10-30 16:00:00', 60, 'pendente', '2024-11-22 17:13:21'),
(24, 1, 11, '2024-10-31 20:00:00', 60, 'pendente', '2024-11-22 17:14:05');

-- --------------------------------------------------------

--
-- Estrutura para tabela `espaco`
--

CREATE TABLE `espaco` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `descricao` text DEFAULT NULL,
  `localizacao` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `data_criacao` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `espaco`
--

INSERT INTO `espaco` (`id`, `nome`, `descricao`, `localizacao`, `foto`, `data_criacao`) VALUES
(1, 'Conheça o Nosso Espaço', 'Sejaa bem-vindo à nossa academia de boxe, onde cada treino é uma nova chance de evoluir e se desafiar. Nosso espaço foi projetado para oferecer a melhor experiência de treino, com equipamentos de última geração e um ambiente acolhedor. Aqui, a sua jornada no boxe começa com o compromisso de superar seus próprios limites. Com uma equipe de profissionais qualificados e apaixonados, você encontrará todo o suporte necessário para alcançar suas metas, seja para melhorar o condicionamento físico, aprender a arte do boxe ou se preparar para competições. Venha fazer parte da nossa história e venha treinar com quem entende de boxe!', 'Rua X, Bairro Y', '../Imagens/ringueFoto1.jpg', '2024-11-20 18:39:54'),
(2, 'Sobre a Academia', 'Aqui, nossa missão vai além de ensinar o boxe: buscamos criar um ambiente que inspire todos a se superarem. Com espaços amplos e modernos, nosso objetivo é proporcionar a você não apenas a melhor infraestrutura, mas também uma experiência que vai motivá-lo a dar o seu melhor em cada treino.', 'Rua X, Bairro Y', NULL, '2024-11-20 18:39:54'),
(3, 'Imagem 1 - Ringue de Boxe', 'Imagem do ringue de boxe da academia', 'Rua X, Bairro Y', '../Imagens/espaco1.jpg', '2024-11-20 18:39:54'),
(4, 'Imagem 2 - Equipamentos da Academia 1', 'Equipamentos de treino na academia', 'Rua X, Bairro Y', '../Imagens/espaco2.jpg', '2024-11-20 18:39:54'),
(5, 'Imagem 3 - Equipamentos da Academia 2', 'Mais equipamentos de treino', 'Rua X, Bairro Y', '../Imagens/espaco3.jpg', '2024-11-20 18:39:54'),
(6, 'Imagem 4 - Bolas para Treino de Boxe', 'Bolas utilizadas para treino de boxe', 'Rua X, Bairro Y', '../Imagens/espaco4.jpg', '2024-11-20 18:39:54'),
(7, 'Imagem 5 - Esteiras para Treino', 'Esteiras para exercícios aeróbicos', 'Rua X, Bairro Y', '../Imagens/espaco5.jpg', '2024-11-20 18:39:54'),
(8, 'Imagem 6 - Academia e Pesos', 'Pesos e materiais de treino para força', 'Rua X, Bairro Y', '../Imagens/espaco6.jpg', '2024-11-20 18:39:54'),
(9, 'Imagem 7 - Saccos de Areia para Treino', 'Saccos de areia utilizados para treino de boxe', 'Rua X, Bairro Y', '../Imagens/espaco7.jpg', '2024-11-20 18:39:54'),
(10, 'Imagem 8 - Ringue para Treino', 'Ringue para treino de boxe', 'Rua X, Bairro Y', '../Imagens/espaco8.jpg', '2024-11-20 18:39:54'),
(11, 'Vídeo Tour - Academia', 'Assista ao nosso vídeo tour e conheça o espaço onde você vai treinar. O vídeo mostra as áreas de treino, equipamentos e o ambiente acolhedor que oferecemos a todos os nossos alunos.', 'Rua X, Bairro Y', 'https://www.youtube.com/embed/7yFBou8xB2Y?si=x8ewmXGyhEHgcL64', '2024-11-20 18:39:54'),
(12, 'Vídeo Dicas para Iniciantes', 'No vídeo a seguir, nossos profissionais compartilham dicas essenciais para quem está começando no boxe. Não deixe de conferir e melhorar seu desempenho desde o início!', 'Rua X, Bairro Y', 'https://www.youtube.com/embed/juwKAKA1obI?si=EPz38jD2g1PWSYbO', '2024-11-20 18:39:54');

-- --------------------------------------------------------

--
-- Estrutura para tabela `mensagens`
--

CREATE TABLE `mensagens` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `avaliacao_professor` varchar(20) NOT NULL,
  `avaliacao_aula` varchar(20) NOT NULL,
  `avaliacao_espaco` varchar(20) NOT NULL,
  `sugestao` text DEFAULT NULL,
  `data_criacao` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `mensagens`
--

INSERT INTO `mensagens` (`id`, `usuario_id`, `avaliacao_professor`, `avaliacao_aula`, `avaliacao_espaco`, `sugestao`, `data_criacao`) VALUES
(2, 11, 'bom', 'bom', 'medio', 'Ótimo professor e metodologia de aulas, porem o espaço deixou a desejar um pouco, sugiro que coloquem um ar condicionado. ', '2024-11-22 14:10:57'),
(4, 3, 'bom', 'bom', 'bom', 'Ótimo ambiente e professores, nota 10!!', '2024-11-22 18:11:56'),
(5, 6, 'ruim', 'ruim', 'bom', 'Ótimo espaço aulas, mas professor e aula ruim!!', '2024-11-22 18:13:37');

-- --------------------------------------------------------

--
-- Estrutura para tabela `niveis_acesso`
--

CREATE TABLE `niveis_acesso` (
  `id` int(11) NOT NULL,
  `nivel_nome` varchar(50) NOT NULL,
  `descricao` text DEFAULT NULL,
  `data_criacao` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `niveis_acesso`
--

INSERT INTO `niveis_acesso` (`id`, `nivel_nome`, `descricao`, `data_criacao`) VALUES
(1, 'admin', 'Administrador com acesso completo a todas as funcionalidades', '2024-11-19 23:09:15'),
(2, 'professor', 'Professor com acesso aos seus agendamentos e dados', '2024-11-19 23:09:15'),
(3, 'comum', 'Usuário comum com acesso limitado a agendamentos e conteúdos públicos', '2024-11-19 23:09:15');

-- --------------------------------------------------------

--
-- Estrutura para tabela `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `data_pedido` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('pendente','em processamento','enviado','entregue') DEFAULT 'pendente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `pedido_produto`
--

CREATE TABLE `pedido_produto` (
  `id` int(11) NOT NULL,
  `pedido_id` int(11) DEFAULT NULL,
  `produto_id` int(11) DEFAULT NULL,
  `quantidade` int(11) NOT NULL,
  `preco_unitario` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `descricao` text DEFAULT NULL,
  `preco` decimal(10,2) NOT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  `data_criacao` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `descricao`, `preco`, `imagem`, `data_criacao`) VALUES
(3, 'Luvas de Boxe', 'Luvas de alta qualidade para treinamento.', 99.99, '../Imagens/luvas.jpg', '2024-11-22 14:48:52'),
(4, 'Protetor Bucal', 'Proteja seus dentes durante os treinos.', 19.99, '../Imagens/protetorB.jpg', '2024-11-22 14:48:52'),
(5, 'Saco de Pancada', 'Treine sua potência de soco com nosso saco de pancada.', 149.99, '../Imagens/sacoPancada.png', '2024-11-22 14:48:52'),
(6, 'Bandagem de Boxe', 'Bandagem elástica para proteger as mãos e os pulsos.', 14.99, '../Imagens/atadura.jpg', '2024-11-22 14:48:52'),
(7, 'Protetor de Cabeça', 'Proteja sua cabeça e rosto durante os sparrings.', 49.99, '../Imagens/protetor_cabeca.jpg', '2024-11-22 14:48:52'),
(8, 'Short de Boxe', 'Short resistente e confortável para treinos de alta intensidade.', 34.99, '../Imagens/short.jpg', '2024-11-22 14:48:52');

-- --------------------------------------------------------

--
-- Estrutura para tabela `professores`
--

CREATE TABLE `professores` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `nome` varchar(100) NOT NULL,
  `descricao` text DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `data_criacao` timestamp NOT NULL DEFAULT current_timestamp(),
  `especialidade` varchar(255) NOT NULL,
  `instagram` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `professores`
--

INSERT INTO `professores` (`id`, `usuario_id`, `nome`, `descricao`, `foto`, `data_criacao`, `especialidade`, `instagram`) VALUES
(9, 7, 'Professor João Silva', 'Com mais de uma década de dedicação ao boxe, o Professor João Silva é um treinador experiente que alia técnicas refinadas a uma abordagem motivadora. Ele é conhecido por incentivar seus alunos a superar limites e desenvolver não apenas habilidades físicas, mas também confiança e resiliência.', 'treinador 1.jpg', '2024-11-20 14:35:11', '', 'Professor João Silva'),
(10, 8, 'Professora Maria Santos', 'Campeã nacional de boxe, a Professora Maria Santos é uma verdadeira inspiração para seus alunos. Sua carreira de sucesso é marcada pela determinação e pela superação de obstáculos, atributos que ela leva ao ringue e transmite em suas aulas. Com uma didática clara e envolvente, ela não apenas compartilha técnicas avançadas, mas também busca instigar em seus alunos o mesmo espírito de luta e coragem que a guiou ao longo de sua jornada.', 'treinadora 1.jpg', '2024-11-20 14:35:11', '', 'Professora Maria Santos'),
(11, 9, 'Professor Carlos Oliveira', 'Especialista em técnicas de defesa e estratégias de combate, o Professor Carlos Oliveira dedica-se a formar lutadores completos, tanto em habilidades físicas quanto mentais. Ele acredita que o boxe vai além de socos e golpes — envolve estratégia, controle e inteligência. Em suas aulas, Carlos enfatiza a importância do preparo mental e da disciplina, proporcionando aos alunos uma compreensão profunda e profissional do esporte.', 'treinador 2.jpg', '2024-11-20 14:35:11', '', 'Professor Carlos Oliveira'),
(12, 10, 'Professora Marcia Saraiva', 'Com ampla experiência em artes marciais e uma especialização em defesa pessoal, a Professora Marcia Saraiva dedica-se a promover o desenvolvimento físico e mental de seus alunos. Seu estilo de ensino é focado nos detalhes e na evolução contínua, buscando garantir que cada aluno atinja todo o seu potencial. Marcia se destaca por sua abordagem cuidadosa, oferecendo um ambiente seguro e estimulante para aqueles que buscam aprimorar suas habilidades e autoconfiança.', 'treinadora 2.jpg', '2024-11-20 14:35:11', '', 'Professora Marcia Saraiva');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `nivel_acesso_id` int(11) DEFAULT 3,
  `data_criacao` timestamp NOT NULL DEFAULT current_timestamp(),
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `nivel_acesso_id`, `data_criacao`, `foto`) VALUES
(1, 'admin', 'admin@senacboxe.com', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 1, '2024-11-19 23:09:15', NULL),
(3, 'mauricio', 'mauricio@admin.com', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 1, '2024-11-20 02:14:06', NULL),
(5, 'alexandre', 'xandi@admin.com', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 1, '2024-11-20 02:22:27', NULL),
(6, 'alex', 'alex@usuario.com', '9250e222c4c71f0c58d4c54b50a880a312e9f9fed55d5c3aa0b0e860ded99165', 2, '2024-11-20 13:44:59', NULL),
(7, 'João Silva', 'joao.silva@exemplo.com', 'senha123', 3, '2024-11-20 14:33:28', NULL),
(8, 'Maria Santos', 'maria.santos@exemplo.com', 'senha123', 3, '2024-11-20 14:33:28', NULL),
(9, 'Carlos Oliveira', 'carlos.oliveira@exemplo.com', 'senha123', 3, '2024-11-20 14:33:28', NULL),
(10, 'Marcia Saraiva', 'marcia.saraiva@exemplo.com', 'senha123', 3, '2024-11-20 14:33:28', NULL),
(11, 'alexandre avila', 'alexandre@usuario.com', '9250e222c4c71f0c58d4c54b50a880a312e9f9fed55d5c3aa0b0e860ded99165', 2, '2024-11-22 13:56:52', NULL),
(14, 'professor', 'professor@admin.com', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 1, '2024-11-22 20:34:26', NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `agendamentos`
--
ALTER TABLE `agendamentos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`),
  ADD KEY `professor_id` (`professor_id`);

--
-- Índices de tabela `espaco`
--
ALTER TABLE `espaco`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `mensagens`
--
ALTER TABLE `mensagens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Índices de tabela `niveis_acesso`
--
ALTER TABLE `niveis_acesso`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Índices de tabela `pedido_produto`
--
ALTER TABLE `pedido_produto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pedido_id` (`pedido_id`),
  ADD KEY `produto_id` (`produto_id`);

--
-- Índices de tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `professores`
--
ALTER TABLE `professores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `nivel_acesso_id` (`nivel_acesso_id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `agendamentos`
--
ALTER TABLE `agendamentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de tabela `espaco`
--
ALTER TABLE `espaco`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `mensagens`
--
ALTER TABLE `mensagens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `niveis_acesso`
--
ALTER TABLE `niveis_acesso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pedido_produto`
--
ALTER TABLE `pedido_produto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `professores`
--
ALTER TABLE `professores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `agendamentos`
--
ALTER TABLE `agendamentos`
  ADD CONSTRAINT `agendamentos_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `agendamentos_ibfk_2` FOREIGN KEY (`professor_id`) REFERENCES `professores` (`id`);

--
-- Restrições para tabelas `mensagens`
--
ALTER TABLE `mensagens`
  ADD CONSTRAINT `mensagens_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);

--
-- Restrições para tabelas `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);

--
-- Restrições para tabelas `pedido_produto`
--
ALTER TABLE `pedido_produto`
  ADD CONSTRAINT `pedido_produto_ibfk_1` FOREIGN KEY (`pedido_id`) REFERENCES `pedidos` (`id`),
  ADD CONSTRAINT `pedido_produto_ibfk_2` FOREIGN KEY (`produto_id`) REFERENCES `produtos` (`id`);

--
-- Restrições para tabelas `professores`
--
ALTER TABLE `professores`
  ADD CONSTRAINT `professores_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);

--
-- Restrições para tabelas `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`nivel_acesso_id`) REFERENCES `niveis_acesso` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
