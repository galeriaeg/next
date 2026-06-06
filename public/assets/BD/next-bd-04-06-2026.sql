-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Tempo de geração: 05/06/2026 às 03:43
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
-- Banco de dados: `next-bd`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_conteudo`
--

CREATE TABLE `tb_conteudo` (
  `id` int(5) NOT NULL,
  `pagina` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `titulo` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `texto` longtext CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `plus` text NOT NULL,
  `tipo` int(2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `tb_conteudo`
--

INSERT INTO `tb_conteudo` (`id`, `pagina`, `titulo`, `texto`, `plus`, `tipo`) VALUES
(1, 'Sobre', 'A Next Soluções em Saúde', 'Fundada em janeiro de 2015, a Next Soluções em Saúde iniciou suas atividades como representante da Samsung Medical no estado do Piauí. Após um ano de sucesso, expandimos nossa área de atuação para os estados do Pará, Amapá, Amazonas e Roraima. Em janeiro de 2017, demos mais um passo estratégico ao assumir a distribuição exclusiva da Vyttra nos estados do Piauí, Ceará e Maranhão..', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1975.1974457002218!2d-34.888922679901114!3d-8.061141100616684!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x7ab18c6c57a5555%3A0xe9920d81ef239710!2zTkVYVCBTT0xVw4fDlUVTIEVNIFNBw5pERSBMVERB!5e0!3m2!1spt-BR!2sbr!4v1780395789946!5m2!1spt-BR!2sbr', 1),
(2, 'Produtos', 'Nossos produtos', 'A Next conta com um portfólio completo de produtos desenvolvidos para atender às mais variadas necessidades do setor. Através de constantes investimentos em tecnologia e de uma sólida parceria com nossos clientes, temos o compromisso de entregar as melhores soluções do mercado.', '', 2),
(3, 'Contato', 'Fale conosco', 'Entre em contato conosco, preencha o formulário abaixo, deixe sua mensagem, comentário ou sugestão. Em breve retornaremos o seu contato.', '', 4),
(4, 'Busca', ' Busca Rápida', 'Mussum Ipsum, cacilds vidis litro abertis.&nbsp; Per aumento de cachacis, eu reclamis. Posuere libero varius. Nullam a nisl ut ante blandit hendrerit. Aenean sit amet nisi. Cevadis im ampola pa arma uma pindureta. Suco de cevadiss deixa as pessoas mais interessantis.', '', 5),
(5, 'Área de Atuação', 'Onde estamos', 'A <strong>Next&nbsp;</strong> representa e distribui os produtos das marcas Konica Minolta e Philips em vários estados do Brasil. Selecione a marca e saiba onde atuamos comercialmente.', '', 3),
(6, 'Novidades', 'Acompanhe nossas atividad', 'Aqui você tem disponibilizada uma lista de notícias, artigos e outros registros . As publicações estão organizadas por data, fique informado sobre nossas atividades.', '', 6);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_linha`
--

CREATE TABLE `tb_linha` (
  `id` int(5) NOT NULL,
  `titulo` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `idmarca` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `tb_linha`
--

INSERT INTO `tb_linha` (`id`, `titulo`, `idmarca`) VALUES
(1, 'Imagem', 1),
(2, 'Acessório', 1),
(4, 'Reagentes', 2),
(6, 'Equipamentos', 3),
(7, 'ererer', 4),
(8, 'doces', 1),
(9, 'outra', 5),
(10, 'Boa', 6);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_marca`
--

CREATE TABLE `tb_marca` (
  `id` int(5) NOT NULL,
  `nome` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `logomarca` varchar(50) NOT NULL,
  `site` varchar(50) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `tb_marca`
--

INSERT INTO `tb_marca` (`id`, `nome`, `logomarca`, `site`, `status`) VALUES
(1, 'Konica Minota', '33042-logo-konica.png', 'https://www.terra.com.br/', 1),
(2, 'Philips ', '54455-logo-philips.png', '', 1),
(3, 'Coca Cola', '37262-logo-coca.png', '#', 1),
(4, 'Marvel', '75947-marvel-logo.png', 'https://pt.wikipedia.org/wiki/Marvel_Entertainment', 1),
(5, 'GE ', '94840-ge-logo.jpg', 'https://www.ge.com', 1),
(6, 'Teste', '98931-logo-konica.png', '#', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_noticias`
--

CREATE TABLE `tb_noticias` (
  `id` int(5) NOT NULL,
  `titulo` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `foto` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `descricao` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `data` varchar(12) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `tb_noticias`
--

INSERT INTO `tb_noticias` (`id`, `titulo`, `foto`, `descricao`, `data`, `status`) VALUES
(1, 'Como a tecnologia pode tornar a gestao de saúde mais eficiente no Brasil. Samsung lanÃ§a seu novo si', '56256-384159668-img-evento.jpg', '<p>Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo utilizado desde o século XVI, quando um impressor desconhecido pegou uma bandeja de tipos e os embaralhou para fazer um livro de modelos de tipos. Lorem Ipsum sobreviveu não só a cinco séculos, como também ao salto para a editoração eletrônica, permanecendo essencialmente inalterado. Se popularizou na década de 60, quando a Letraset lançou decalques contendo passagens de Lorem Ipsum, e mais recentemente quando passou a ser integrado a softwares de editoração eletrônica como Aldus PageMaker.<br /><br /><br />Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo utilizado desde o século XVI, quando um impressor desconhecido pegou uma bandeja de tipos e os embaralhou para fazer um livro de modelos de tipos. Lorem Ipsum sobreviveu não só a cinco séculos, como também ao salto para a editoração eletrônica, permanecendo essencialmente inalterado. Se popularizou na década de 60, quando a Letraset lançou decalques contendo passagens de Lorem Ipsum, e mais recentemente quando passou a ser integrado a softwares de editoração eletrônica como Aldus PageMaker.Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo utilizado desde o século XVI, quando um impressor desconhecido pegou uma bandeja de tipos e os embaralhou para fazer um livro de modelos de tipos. Lorem Ipsum sobreviveu não só a cinco séculos, como também ao salto para a editoração eletrônica, permanecendo essencialmente inalterado.</p>\r\n<p>Se popularizou na década de 60, quando a Letraset lançou decalques contendo passagens de Lorem Ipsum, e mais recentemente quando passou a ser integrado a softwares de editoração eletrônica como Aldus PageMaker.</p>', '2026-06-02', 1),
(2, 'Estudo usa amostra de sangue para detectar autismo em crianÃ§as', '50844-marvel.jpg', '<p><strong style=\"margin: 0px; padding: 0px; font-family: \" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;=\"\" text-align:=\"\" justify;=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);\"=\"\">Lorem Ipsum</strong><span style=\"font-family: \" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;=\"\" text-align:=\"\" justify;=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);\"=\"\"> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since 1966, when designers at Letraset and James Mosley, the librarian at St Bride Printing Library, took a 1914 Cicero translation and scrambled it to make dummy text for Letraset\'s Body Type sheets. It has survived not only many decades, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised thanks to these sheets and more recently with desktop publishing software including versions of Lorem Ipsum.</span></p>', '2026-06-02', 1),
(3, 'Samsung lanÃ§a seu novo sistema premium de ultrassonografia HERA W10', '67902-coldplay.jpg', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since 1966, when designers at Letraset and James Mosley, the librarian at St Bride Printing Library, took a 1914 Cicero translation and scrambled it to make dummy text for Letraset\'s Body Type sheets. It has survived not only many decades, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised thanks to these sheets and more recently with desktop publishing software including versions of Lorem Ipsum.&nbsp;</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since 1966, when designers at Letraset and James Mosley, the librarian at St Bride Printing Library, took a 1914 Cicero translation and scrambled it to make dummy text for Letraset\'s Body Type sheets. It has survived not only many decades, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised thanks to these sheets and more recently with desktop publishing software including versions of Lorem Ipsum.</p>', '1970-01-13', 1),
(9, 'Plano Connect', '', '<p>Mussum Ipsum, cacilds vidis litro abertis.&nbsp; In elementis mé pra quem é amistosis quis leo. Mé faiz elementum girarzis, nisi eros vermeio. Quem num gosta di mé, boa gentis num é. Copo furadis é disculpa de bebadis, arcu quam euismod magna.</p>\r\n<p>Paisis, filhis, espiritis santis. Cevadis im ampola pa arma uma pindureta. Casamentiss faiz malandris se pirulitá. Suco de cevadiss deixa as pessoas mais interessantis.</p>\r\n<p>Quem num gosta di mim que vai caçá sua turmis! Sapien in monti palavris qui num significa nadis i pareci latim. Casamentiss faiz malandris se pirulitá. Mais vale um bebadis conhecidiss, que um alcoolatra anonimis.</p>', '2026-02-06', 1),
(4, 'teste', '', '<p><strong style=\"margin: 0px; padding: 0px; font-family: \" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;=\"\" text-align:=\"\" justify;=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);\"=\"\">Lorem Ipsum</strong><span style=\"font-family: \" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;=\"\" text-align:=\"\" justify;=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);\"=\"\"> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since 1966, when designers at Letraset and James Mosley, the librarian at St Bride Printing Library, took a 1914 Cicero translation and scrambled it to make dummy text for Letraset\'s Body Type sheets. It has survived not only many decades, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised thanks to these sheets and more recently with desktop publishing software including versions of Lorem Ipsum.</span></p>', '2026-05-28', 0),
(5, 'teste ddd', '', '<p><strong style=\"margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify; background-color: rgb(255, 255, 255);\">Lorem Ipsum</strong><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify; background-color: rgb(255, 255, 255);\"> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since 1966, when designers at Letraset and James Mosley, the librarian at St Bride Printing Library, took a 1914 Cicero translation and scrambled it to make dummy text for Letraset\'s Body Type sheets. It has survived not only many decades, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised thanks to these sheets and more recently with desktop publishing software including versions of Lorem Ipsum.</span></p>', '2026-05-31', 1),
(6, 'novo mffgfgsdds', '', '<p>sdsdsdsds</p>', '2026-06-02', 0),
(7, 'dfdfdfdfd', '', '<p>fgfgfg</p>', '2026-06-01', 1),
(8, 'A invenção de um líquido', '', 'Mussum Ipsum, cacilds vidis litro abertis.  In elementis mé pra quem é amistosis quis leo. Mé faiz elementum girarzis, nisi eros vermeio. Quem num gosta di mé, boa gentis num é. Copo furadis é disculpa de bebadis, arcu quam euismod magna.\r\n\r\nPaisis, filhis, espiritis santis. Cevadis im ampola pa arma uma pindureta. Casamentiss faiz malandris se pirulitá. Suco de cevadiss deixa as pessoas mais interessantis.\r\n\r\nQuem num gosta di mim que vai caçá sua turmis! Sapien in monti palavris qui num significa nadis i pareci latim. Casamentiss faiz malandris se pirulitá. Mais vale um bebadis conhecidiss, que um alcoolatra anonimis.', '2026-06-02', 1),
(10, 'Mussum Ipsum, cacilds vidis litro abertis.', '', '<p>Mussum Ipsum, cacilds vidis litro abertis.&nbsp; Per aumento de cachacis, eu reclamis. Posuere libero varius. Nullam a nisl ut ante blandit hendrerit. Aenean sit amet nisi. Cevadis im ampola pa arma uma pindureta. Suco de cevadiss deixa as pessoas mais interessantis.</p>\r\n<p> </p>\r\n<p>Mussum Ipsum, cacilds vidis litro abertis.&nbsp; Per aumento de cachacis, eu reclamis. Posuere libero varius. Nullam a nisl ut ante blandit hendrerit. Aenean sit amet nisi. Cevadis im ampola pa arma uma pindureta. Suco de cevadiss deixa as pessoas mais interessantis.</p>\r\n<p> </p>\r\n<p>Mussum Ipsum, cacilds vidis litro abertis.&nbsp; Per aumento de cachacis, eu reclamis. Posuere libero varius. Nullam a nisl ut ante blandit hendrerit. Aenean sit amet nisi. Cevadis im ampola pa arma uma pindureta. Suco de cevadiss deixa as pessoas mais interessantis.</p>\r\n<p> </p>\r\n<p>Mussum Ipsum, cacilds vidis litro abertis.&nbsp; Per aumento de cachacis, eu reclamis. Posuere libero varius. Nullam a nisl ut ante blandit hendrerit. Aenean sit amet nisi. Cevadis im ampola pa arma uma pindureta. Suco de cevadiss deixa as pessoas mais interessantis.</p>', '2026-06-03', 1),
(11, 'A Next Soluções em Saúde', '255221-bnn-login.jpg', '<p>Mussum Ipsum, cacilds vidis litro abertis. In elementis mé pra quem é amistosis quis leo. Mé faiz elementum girarzis, nisi eros vermeio. Quem num gosta di mé, boa gentis num é. Copo furadis é disculpa de bebadis, arcu quam euismod magna.Paisis, filhis, espiritis santis. Cevadis im ampola pa arma uma pindureta. Casamentiss faiz malandris se pirulitá. Suco de cevadiss deixa as pessoas mais interessantis.Quem num gosta di mim que vai caçá sua turmis! Sapien in monti palavris qui num significa nadis i pareci latim. Casamentiss faiz malandris se pirulitá. Mais vale um bebadis conhecidiss, que um alcoolatra anonimis.</p>\r\n<p>Mussum Ipsum, cacilds vidis litro abertis. In elementis mé pra quem é amistosis quis leo. Mé faiz elementum girarzis, nisi eros vermeio. Quem num gosta di mé, boa gentis num é. Copo furadis é disculpa de bebadis, arcu quam euismod magna.Paisis, filhis, espiritis santis. Cevadis im ampola pa arma uma pindureta. Casamentiss faiz malandris se pirulitá. Suco de cevadiss deixa as pessoas mais interessantis.Quem num gosta di mim que vai caçá sua turmis! Sapien in monti palavris qui num significa nadis i pareci latim. Casamentiss faiz malandris se pirulitá. Mais vale um bebadis conhecidiss, que um alcoolatra anonimis.</p>', '2026-06-03', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_produto`
--

CREATE TABLE `tb_produto` (
  `id` int(5) NOT NULL,
  `titulo` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `descricao` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `foto` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `idmarca` int(5) NOT NULL,
  `idlinha` int(5) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `tb_produto`
--

INSERT INTO `tb_produto` (`id`, `titulo`, `descricao`, `foto`, `idmarca`, `idlinha`, `status`) VALUES
(1, 'Ultrassom WS80A', 'Mussum Ipsum, cacilds vidis litro abertis.  Admodum accumsan disputationi eu sit. Vide electram sadipscing et per. Praesent malesuada urna nisi, quis volutpat erat hendrerit non. Nam vulputate dapibus. Viva Forevis aptent taciti sociosqu ad litora torquent. A ordem dos tratores não altera o pão duris.\r\n<br /><br />\r\nEm pé sem cair, deitado sem dormir, sentado sem cochilar e fazendo pose. Não sou faixa preta cumpadi, sou preto inteiris, inteiris. Sapien in monti palavris qui num significa nadis i pareci latim. Diuretics paradis num copo é motivis de denguis.', '1356848698ft1.jpg', 1, 1, 1),
(2, 'Ultrassom Portatil MySono U6', 'Mussum Ipsum, cacilds vidis litro abertis.  Admodum accumsan disputationi eu sit. Vide electram sadipscing et per. Praesent malesuada urna nisi, quis volutpat erat hendrerit non. Nam vulputate dapibus. Viva Forevis aptent taciti sociosqu ad litora torquent. A ordem dos tratores não altera o pão duris.\r\n<br /><br />\r\nEm pé sem cair, deitado sem dormir, sentado sem cochilar e fazendo pose. Não sou faixa preta cumpadi, sou preto inteiris, inteiris. Sapien in monti palavris qui num significa nadis i pareci latim. Diuretics paradis num copo é motivis de denguis.', '129125664Cube.jpg', 1, 2, 1),
(3, 'Ultrassom PX4000', 'Mussum Ipsum, cacilds vidis litro abertis.  Admodum accumsan disputationi eu sit. Vide electram sadipscing et per. Praesent malesuada urna nisi, quis volutpat erat hendrerit non. Nam vulputate dapibus. Viva Forevis aptent taciti sociosqu ad litora torquent. A ordem dos tratores não altera o pão duris.\r\n<br /><br />\r\nEm pé sem cair, deitado sem dormir, sentado sem cochilar e fazendo pose. Não sou faixa preta cumpadi, sou preto inteiris, inteiris. Sapien in monti palavris qui num significa nadis i pareci latim. Diuretics paradis num copo é motivis de denguis.\r\nMussum Ipsum, cacilds vidis litro abertis.  Admodum accumsan disputationi eu sit. Vide electram sadipscing et per. Praesent malesuada urna nisi, quis volutpat erat hendrerit non. Nam vulputate dapibus. Viva Forevis aptent taciti sociosqu ad litora torquent. A ordem dos tratores não altera o pão duris.\r\n\r\nEm pé sem cair, deitado sem dormir, sentado sem cochilar e fazendo pose. Não sou faixa preta cumpadi, sou preto inteiris, inteiris. Sapien in monti palavris qui num significa nadis i pareci latim. Diuretics paradis num copo é motivis de denguis.', '1064632861ft4.jpg', 2, 4, 1),
(4, 'Coca cola Lata', 'Mussum Ipsum, cacilds vidis litro abertis.  Admodum accumsan disputationi eu sit. Vide electram sadipscing et per. Praesent malesuada urna nisi, quis volutpat erat hendrerit non. Nam vulputate dapibus. Viva Forevis aptent taciti sociosqu ad litora torquent. A ordem dos tratores não altera o pão duris.\r\n\r\nEm pé sem cair, deitado sem dormir, sentado sem cochilar e fazendo pose. Não sou faixa preta cumpadi, sou preto inteiris, inteiris. Sapien in monti palavris qui num significa nadis i pareci latim. Diuretics paradis num copo é motivis de denguis.', '1234coca.jpg', 3, 6, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_slider`
--

CREATE TABLE `tb_slider` (
  `id` int(5) NOT NULL,
  `foto` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `foto_mini` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `link` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `destino` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `status` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `tb_slider`
--

INSERT INTO `tb_slider` (`id`, `foto`, `foto_mini`, `link`, `destino`, `status`) VALUES
(1, '1557592839-s1.jpg', '1016172091-s1m.jpg', '#', '_top', '1'),
(2, '187997717-slide-2-desk.jpg', '126090117-s2m.jpg', '#', '_top', '1');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_usuarios`
--

CREATE TABLE `tb_usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `email` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `tipo` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `login` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `senha` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `tb_usuarios`
--

INSERT INTO `tb_usuarios` (`id`, `nome`, `email`, `tipo`, `login`, `senha`, `status`) VALUES
(2, 'Administrador', 'alexandrehenrique@hotmail.com.br', '1', 'adm', '25d55ad283aa400af464c76d713c07ad', 'ATIVO'),
(3, 'Alexandre Henrique', 'contato@bsimagem.com', '0', 'henrique', '25d55ad283aa400af464c76d713c07ad', 'INATIVO'),
(4, 'Lysandra Maria', 'lysa@hotmail.com', '2', 'lys', '25d55ad283aa400af464c76d713c07ad', 'ATIVO'),
(5, 'Primeiro usuario', 'via85@hotmail.com.br', '0', 'teste1q', '202cb962ac59075b964b07152d234b70', 'INATIVO'),
(6, 'Peter Parker', 'peter@marvel.com.br', '2', 'peter', 'bb2d91d0fbbebe8719509ed0f865c63f', 'ATIVO'),
(7, 'Bruce Banner', 'bruce@terra.com', '2', 'bruce', 'd1b2cc725d846f0460ff290c60925070', 'ATIVO');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tb_conteudo`
--
ALTER TABLE `tb_conteudo`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tb_linha`
--
ALTER TABLE `tb_linha`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tb_marca`
--
ALTER TABLE `tb_marca`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tb_noticias`
--
ALTER TABLE `tb_noticias`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tb_produto`
--
ALTER TABLE `tb_produto`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tb_slider`
--
ALTER TABLE `tb_slider`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_conteudo`
--
ALTER TABLE `tb_conteudo`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `tb_linha`
--
ALTER TABLE `tb_linha`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `tb_marca`
--
ALTER TABLE `tb_marca`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `tb_noticias`
--
ALTER TABLE `tb_noticias`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `tb_produto`
--
ALTER TABLE `tb_produto`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `tb_slider`
--
ALTER TABLE `tb_slider`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
