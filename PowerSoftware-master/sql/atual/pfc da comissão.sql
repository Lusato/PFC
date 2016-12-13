-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 02-Nov-2016 às 22:22
-- Versão do servidor: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pfc`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `arquivo`
--

CREATE TABLE `arquivo` (
  `id_arquivo` int(11) NOT NULL,
  `arquivo_download` longblob NOT NULL,
  `fk_id_user` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pergunta`
--

CREATE TABLE `pergunta` (
  `id_pergunta` int(11) NOT NULL,
  `conteudo_pergunta` varchar(200) NOT NULL,
  `id_user_fk` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pergunta`
--

INSERT INTO `pergunta` (`id_pergunta`, `conteudo_pergunta`, `id_user_fk`) VALUES
(1, 'fiz uma pergunta?', 1),
(2, 'Nova pergunta', 1),
(3, 'Lontras sÃ£o incrÃ­veis?', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `post`
--

CREATE TABLE `post` (
  `id_post` int(11) NOT NULL,
  `nome_post` varchar(100) NOT NULL,
  `conteudo_post` varchar(3000) NOT NULL,
  `id_user_fk` int(11) NOT NULL,
  `imagem_post` blob NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `post`
--

INSERT INTO `post` (`id_post`, `nome_post`, `conteudo_post`, `id_user_fk`, `imagem_post`) VALUES
(8, 'Teste de formataÃ§Ã£o', 'Bonequinha do papai\r\n<div><b>Bonequinha do papai</b></div>\r\n<div><i>Bonequinha do papai</i></div>\r\n<div><u>Bonequinha do papai</u></div>\r\n<div><strike>Bonequinha do papai</strike></div>\r\n<div>Bo<sup>nequ</sup>inha do p<sub>ap</sub>ai</div>\r\n<div><br />\r\n<div style="position: relative; top: 10px; left: 11px;">Quote</div>\r\n<div class="quote" style="border:1px inset silver;margin:10px;padding:5px;background:#EFF7FF;">Bonequinha do papai</div>\r\n<div style="text-align: center;">Bonequinha do papai</div></div>\r\n<div style="text-align: right;">Bonequinha do papai</div>\r\n<div>\r\n<ol>\r\n<li>Bonequinha do papai</li>\r\n<li>Bon<font color="#6a5acd">equinha do pap</font>ai</li>\r\n<li>Bonequinha do papai</li>\r\n<li>Bon<span style="background-color: darkred;">equin</span>ha do papai</li></ol>\r\n<ul>\r\n<li><font face="tahoma">Bonequinha do papai</font></li>\r\n<li><font face="tahoma">Bonequinha do papai</font></li>\r\n<li><font face="tahoma">Bonequinha do papai</font></li></ul></div>', 1, ''),
(7, 'Diciplina!', '<br />\r\n<div style="float: right; width: 150px; margin: 10px; padding: 5px; background: gold; border: 1px solid maroon; font-family: Arial, Helvetica, Georgia; font-weight: bold; line-height: 140%;">Pode Crer que esse cachorro ta indo longe!</div><br /><img src="http://i.imgur.com/ySsrHRx.gif" />', 1, ''),
(6, 'ATAQUE DE TETAS!', '<img src="http://i.imgur.com/tmlpMFK.jpg" />', 1, ''),
(9, 'Bonequinha do papai', '&lt;iframe width="560" height="315" src="https://www.youtube.com/embed/G7jVA4o0KJw" frameborder="0" allowfullscreen&gt;&lt;/iframe&gt;', 1, ''),
(10, 'Video', '&lt;iframe width="560" height="315" src="https://www.youtube.com/embed/G7jVA4o0KJw" frameborder="0" allowfullscreen&gt;&lt;/iframe&gt;', 1, '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `resposta`
--

CREATE TABLE `resposta` (
  `id_resposta` int(11) NOT NULL,
  `conteudo_resposta` varchar(600) NOT NULL,
  `id_user_fk` int(11) NOT NULL,
  `id_pergunta_fk` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `resposta`
--

INSERT INTO `resposta` (`id_resposta`, `conteudo_resposta`, `id_user_fk`, `id_pergunta_fk`) VALUES
(1, 'sim', 1, 1),
(2, 'talvez', 1, 1),
(3, 'acho que sim', 1, 1),
(4, '', 1, 2),
(5, 'em branco?', 1, 2),
(6, '', 1, 2),
(7, '', 1, 1),
(8, '', 1, 1),
(9, 'textarea2', 1, 1),
(10, '', 1, 1),
(11, '', 1, 1),
(12, '', 1, 1),
(13, 'vix', 1, 1),
(14, '', 1, 1),
(15, '', 1, 1),
(16, 'Insira a resposta aqui...', 1, 1),
(17, 'Insira a resposta aqui...', 1, 1),
(18, '', 1, 2),
(19, '', 1, 1),
(20, '', 1, 1),
(21, '', 1, 1),
(22, '', 1, 1),
(23, '', 1, 1),
(24, '', 1, 1),
(25, '', 1, 1),
(26, '', 1, 1),
(27, '', 1, 1),
(28, 'pq aqui funciona?', 1, 1),
(29, '', 1, 1),
(30, '', 1, 1),
(31, 'Maybe', 2, 3),
(32, 'Sim', 2, 3),
(33, 'what?', 2, 3),
(34, 'Eu sou admin e digo que sim!', 1, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_user`
--

CREATE TABLE `tipo_user` (
  `type` int(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `senha` varchar(60) NOT NULL,
  `tipo_user_fk` int(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id_user`, `nome`, `email`, `senha`, `tipo_user_fk`) VALUES
(1, 'raposa', 'email@email', '$2Cw51.ICu1Nw', 1),
(2, 'Lontra', 'lontra@lontra', '$2Cw51.ICu1Nw', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `arquivo`
--
ALTER TABLE `arquivo`
  ADD PRIMARY KEY (`id_arquivo`),
  ADD KEY `fk_fk_id_user` (`fk_id_user`);

--
-- Indexes for table `pergunta`
--
ALTER TABLE `pergunta`
  ADD PRIMARY KEY (`id_pergunta`),
  ADD KEY `fk_id_user_kf` (`id_user_fk`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id_post`),
  ADD KEY `fk_id_user_for` (`id_user_fk`);

--
-- Indexes for table `resposta`
--
ALTER TABLE `resposta`
  ADD PRIMARY KEY (`id_resposta`),
  ADD KEY `fk_id_user_fk` (`id_user_fk`),
  ADD KEY `fk_id_pergunta_fk` (`id_pergunta_fk`);

--
-- Indexes for table `tipo_user`
--
ALTER TABLE `tipo_user`
  ADD PRIMARY KEY (`type`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `fk_tipo_user_fk` (`tipo_user_fk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `arquivo`
--
ALTER TABLE `arquivo`
  MODIFY `id_arquivo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pergunta`
--
ALTER TABLE `pergunta`
  MODIFY `id_pergunta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `resposta`
--
ALTER TABLE `resposta`
  MODIFY `id_resposta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
