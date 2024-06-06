CREATE TABLE `tbl_resposta` (
  `id` int(11) NOT NULL,
  `resposta` varchar(100) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `pergunta_id` int(11) NOT NULL
)

CREATE TABLE `tbl_sensor` (
  `typename` varchar(15) NOT NULL,
  `endereco` varchar(15) NOT NULL,
  `comodolocal` varchar(15) NOT NULL
)

CREATE TABLE `tbl_status_sensor` (
  `sensor` varchar(15) NOT NULL,
  `estado` varchar(30) NOT NULL,
  `datahora` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
)

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `nova_senha` varchar(100) NOT NULL
)

CREATE TABLE `tbl_endereco` (
  `proprietario` int(11) NOT NULL,
  `sharelink` varchar(150) DEFAULT NULL,
  `chaveid` varchar(15) NOT NULL
)

CREATE TABLE `tbl_pergunta` (
  `id` int(11) NOT NULL,
  `pergunta` varchar(100) NOT NULL
)

-- --------------------------------------------------------

ALTER TABLE `tbl_endereco`
  ADD PRIMARY KEY (`chaveid`,`proprietario`),
  ADD KEY `fk_cliente` (`proprietario`);

ALTER TABLE `tbl_pergunta`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `tbl_resposta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_usuario` (`usuario_id`),
  ADD KEY `FK_pergunta` (`pergunta_id`);

ALTER TABLE `tbl_sensor`
  ADD PRIMARY KEY (`typename`,`endereco`),
  ADD KEY `fk_localizacao` (`endereco`);

ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `tbl_pergunta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

ALTER TABLE `tbl_resposta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

ALTER TABLE `tbl_endereco`
  ADD CONSTRAINT `fk_cliente` FOREIGN KEY (`proprietario`) REFERENCES `tbl_user` (`id`);

ALTER TABLE `tbl_resposta`
  ADD CONSTRAINT `FK_pergunta` FOREIGN KEY (`pergunta_id`) REFERENCES `tbl_pergunta` (`id`),
  ADD CONSTRAINT `FK_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `tbl_user` (`id`);

ALTER TABLE `tbl_sensor`
  ADD CONSTRAINT `fk_localizacao` FOREIGN KEY (`endereco`) REFERENCES `tbl_endereco` (`chaveid`);

-- --------------------------------------------------------

INSERT INTO `tbl_user` (`id`, `email`, `senha`, `nome`, `nova_senha`) VALUES
(1, 'moises.n.silva.sp2005@gmail.com', 'MDNhbW81OVRYIQ==', 'Moisés Nogueira Silva', '');