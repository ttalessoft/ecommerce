-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 19-Dez-2018 às 23:55
-- Versão do servidor: 10.1.36-MariaDB
-- versão do PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ecommerce`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_categories_save` (`pidcategory` INT, `pdescategory` VARCHAR(64))  BEGIN
	
	IF pidcategory > 0 THEN
		
		UPDATE tb_categories
        SET descategory = pdescategory
        WHERE idcategory = pidcategory;
        
    ELSE
		
		INSERT INTO tb_categories (descategory) VALUES(pdescategory);
        
        SET pidcategory = LAST_INSERT_ID();
        
    END IF;
    
    SELECT * FROM tb_categories WHERE idcategory = pidcategory;
    
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_clientes_save` (`pidcliente` INT(11), `pnome_razao_social` VARCHAR(64), `papelido_nome_fantasia` VARCHAR(64), `pcpf_cnpj` VARCHAR(20), `plogradouro` VARCHAR(64), `pnumero` VARCHAR(8), `pcomplemento` VARCHAR(64), `pcep` VARCHAR(10), `pbairro` VARCHAR(32), `pcidade` VARCHAR(32), `puf` CHAR(2), `pemail` VARCHAR(32), `ptelefone_fixo` VARCHAR(13), `ptelefone_celular` VARCHAR(14), `ptipo` CHAR(1), `ppessoa_contato` VARCHAR(16), `pobs` TEXT, `pdata_registro` TIMESTAMP)  begin
    
    if pidcliente > 0 then
		
        update tb_clientes set
			nome_razao_social = pnome_razao_social,
            apelido_nome_fantasia = papelido_nome_fantasia,
            cpf_cnpj = pcpf_cnpj,
            logradouro = plogradouro,
            numero = pnumero,
            complemento = pcomplemento,
            cep = pcep,
            bairro = pbairro,
            cidade = pcidade,
            uf = puf,
            email = pemail,
            telefone_fixo = ptelefone_fixo,
            telefone_celular = ptelefone_celular,
            tipo = ptipo,
            pessoa_contato = ppessoa_contato,
            obs = pobs,
            data_registro = pdata_registro
		where
			idcliente = pidcliente;
	else
		insert into tb_clientes(
			nome_razao_social, apelido_nome_fantasia, cpf_cnpj, logradouro, numero, complemento, cep, bairro, cidade, uf, email, telefone_fixo, telefone_Celular, tipo, pessoa_contato, obs, data_registro
        ) values (
			pnome_razao_social, papelido_nome_fantasia, pcpf_cnpj, plogradouro, pnumero, pcomplemento, pcep, pbairro, pcidade, puf, pemail, ptelefone_fixo, ptelefone_Celular, ptipo, ppessoa_contato, pobs, pdata_registro
        );
        
        set pidcliente = last_insert_id();
        
        end if;
        
        select * from tb_clientes where idcliente = pidcliente;
	end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_fornecedores_save` (`pidfornecedor` INT(11), `pnome_razao_social` VARCHAR(64), `papelido_nome_fantasia` VARCHAR(64), `pcpf_cnpj` VARCHAR(20), `plogradouro` VARCHAR(64), `pnumero` VARCHAR(8), `pcomplemento` VARCHAR(64), `pcep` VARCHAR(10), `pbairro` VARCHAR(32), `pcidade` VARCHAR(32), `puf` CHAR(2), `pemail` VARCHAR(32), `ptelefone_fixo` VARCHAR(13), `ptelefone_celular` VARCHAR(14), `ptipo` CHAR(1), `ppessoa_contato` VARCHAR(16), `pobs` TEXT, `pdata_registro` TIMESTAMP)  begin
    
    if pidfornecedor > 0 then
		
        update tb_fornecedores set
			nome_razao_social = pnome_razao_social,
            apelido_nome_fantasia = papelido_nome_fantasia,
            cpf_cnpj = pcpf_cnpj,
            logradouro = plogradouro,
            numero = pnumero,
            complemento = pcomplemento,
            cep = pcep,
            bairro = pbairro,
            cidade = pcidade,
            uf = puf,
            email = pemail,
            telefone_fixo = ptelefone_fixo,
            telefone_celular = ptelefone_celular,
            tipo = ptipo,
            pessoa_contato = ppessoa_contato,
            obs = pobs,
            data_registro = pdata_registro
		where
			idfornecedor = pidfornecedor;
	else
		insert into tb_fornecedores (
			nome_razao_social, apelido_nome_fantasia, cpf_cnpj, logradouro, numero, complemento, cep, bairro, cidade, uf, email, telefone_fixo, telefone_Celular, tipo, pessoa_contato, obs, data_registro
        ) values (
			pnome_razao_social, papelido_nome_fantasia, pcpf_cnpj, plogradouro, pnumero, pcomplemento, pcep, pbairro, pcidade, puf, pemail, ptelefone_fixo, ptelefone_Celular, ptipo, ppessoa_contato, pobs, pdata_registro
        );
        
        set pidfornecedor = last_insert_id();
        
        end if;
        
        select * from tb_fornecedores where idfornecedor = pidfornecedor;
	end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_products_save` (`pidproduct` INT(11), `pdesproduct` VARCHAR(64), `pvlprice` DECIMAL(10,2), `pvlwidth` DECIMAL(10,2), `pvlheight` DECIMAL(10,2), `pvllength` DECIMAL(10,2), `pvlweight` DECIMAL(10,2), `pdesurl` VARCHAR(128))  BEGIN
	
	IF pidproduct > 0 THEN
		
		UPDATE tb_products
        SET 
			desproduct = pdesproduct,
            vlprice = pvlprice,
            vlwidth = pvlwidth,
            vlheight = pvlheight,
            vllength = pvllength,
            vlweight = pvlweight,
            desurl = pdesurl
        WHERE idproduct = pidproduct;
        
    ELSE
		
		INSERT INTO tb_products (desproduct, vlprice, vlwidth, vlheight, vllength, vlweight, desurl) 
        VALUES(pdesproduct, pvlprice, pvlwidth, pvlheight, pvllength, pvlweight, pdesurl);
        
        SET pidproduct = LAST_INSERT_ID();
        
    END IF;
    
    SELECT * FROM tb_products WHERE idproduct = pidproduct;
    
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_userspasswordsrecoveries_create` (`piduser` INT, `pdesip` VARCHAR(45))  BEGIN
	
	INSERT INTO tb_userspasswordsrecoveries (iduser, desip)
    VALUES(piduser, pdesip);
    
    SELECT * FROM tb_userspasswordsrecoveries
    WHERE idrecovery = LAST_INSERT_ID();
    
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_usersupdate_save` (`piduser` INT, `pdesperson` VARCHAR(64), `pdeslogin` VARCHAR(64), `pdespassword` VARCHAR(256), `pdesemail` VARCHAR(128), `pnrphone` BIGINT, `pinadmin` TINYINT)  BEGIN
	
    DECLARE vidperson INT;
    
	SELECT idperson INTO vidperson
    FROM tb_users
    WHERE iduser = piduser;
    
    UPDATE tb_persons
    SET 
		desperson = pdesperson,
        desemail = pdesemail,
        nrphone = pnrphone
	WHERE idperson = vidperson;
    
    UPDATE tb_users
    SET
		deslogin = pdeslogin,
        despassword = pdespassword,
        inadmin = pinadmin
	WHERE iduser = piduser;
    
    SELECT * FROM tb_users a INNER JOIN tb_persons b USING(idperson) WHERE a.iduser = piduser;
    
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_users_delete` (`piduser` INT)  BEGIN
	
    DECLARE vidperson INT;
    
	SELECT idperson INTO vidperson
    FROM tb_users
    WHERE iduser = piduser;
    
    DELETE FROM tb_users WHERE iduser = piduser;
    DELETE FROM tb_persons WHERE idperson = vidperson;
    
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_users_save` (`pdesperson` VARCHAR(64), `pdeslogin` VARCHAR(64), `pdespassword` VARCHAR(256), `pdesemail` VARCHAR(128), `pnrphone` BIGINT, `pinadmin` TINYINT)  BEGIN
	
    DECLARE vidperson INT;
    
	INSERT INTO tb_persons (desperson, desemail, nrphone)
    VALUES(pdesperson, pdesemail, pnrphone);
    
    SET vidperson = LAST_INSERT_ID();
    
    INSERT INTO tb_users (idperson, deslogin, despassword, inadmin)
    VALUES(vidperson, pdeslogin, pdespassword, pinadmin);
    
    SELECT * FROM tb_users a INNER JOIN tb_persons b USING(idperson) WHERE a.iduser = LAST_INSERT_ID();
    
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_addresses`
--

CREATE TABLE `tb_addresses` (
  `idaddress` int(11) NOT NULL,
  `idperson` int(11) NOT NULL,
  `desaddress` varchar(128) NOT NULL,
  `descomplement` varchar(32) DEFAULT NULL,
  `descity` varchar(32) NOT NULL,
  `desstate` varchar(32) NOT NULL,
  `descountry` varchar(32) NOT NULL,
  `nrzipcode` int(11) NOT NULL,
  `dtregister` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_carts`
--

CREATE TABLE `tb_carts` (
  `idcart` int(11) NOT NULL,
  `dessessionid` varchar(64) NOT NULL,
  `iduser` int(11) DEFAULT NULL,
  `idaddress` int(11) DEFAULT NULL,
  `vlfreight` decimal(10,2) DEFAULT NULL,
  `dtregister` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_cartsproducts`
--

CREATE TABLE `tb_cartsproducts` (
  `idcartproduct` int(11) NOT NULL,
  `idcart` int(11) NOT NULL,
  `idproduct` int(11) NOT NULL,
  `dtremoved` datetime NOT NULL,
  `dtregister` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_categories`
--

CREATE TABLE `tb_categories` (
  `idcategory` int(11) NOT NULL,
  `descategory` varchar(32) NOT NULL,
  `dtregister` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_categories`
--

INSERT INTO `tb_categories` (`idcategory`, `descategory`, `dtregister`) VALUES
(2, 'Apple 2', '2018-12-12 00:02:59'),
(3, 'Samsung', '2018-12-12 00:12:19'),
(4, 'Google One', '2018-12-12 00:12:27'),
(5, 'Microsoft', '2018-12-12 00:12:33'),
(7, 'Xiaomi', '2018-12-12 00:37:40'),
(8, 'TESTE', '2018-12-12 00:38:39');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_clientes`
--

CREATE TABLE `tb_clientes` (
  `idcliente` int(11) NOT NULL,
  `nome_razao_social` varchar(64) DEFAULT NULL,
  `apelido_nome_fantasia` varchar(32) DEFAULT NULL,
  `cpf_cnpj` varchar(15) DEFAULT NULL,
  `data_nascimento` date NOT NULL,
  `logradouro` varchar(32) DEFAULT NULL,
  `numero` varchar(8) DEFAULT NULL,
  `complemento` varchar(32) DEFAULT NULL,
  `cep` varchar(10) DEFAULT NULL,
  `bairro` varchar(32) DEFAULT NULL,
  `cidade` varchar(32) DEFAULT NULL,
  `uf` char(2) DEFAULT NULL,
  `email` varchar(64) DEFAULT NULL,
  `telefone_fixo` varchar(13) DEFAULT NULL,
  `telefone_celular` varchar(14) DEFAULT NULL,
  `tipo` char(1) DEFAULT NULL,
  `pessoa_contato` varchar(16) DEFAULT NULL,
  `obs` text,
  `data_registro` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_clientes`
--

INSERT INTO `tb_clientes` (`idcliente`, `nome_razao_social`, `apelido_nome_fantasia`, `cpf_cnpj`, `data_nascimento`, `logradouro`, `numero`, `complemento`, `cep`, `bairro`, `cidade`, `uf`, `email`, `telefone_fixo`, `telefone_celular`, `tipo`, `pessoa_contato`, `obs`, `data_registro`) VALUES
(1, 'ttales r g s silva', '', '01739227188', '0000-00-00', 'rua goias qd 1 lt 4', '5338', '', '75400888', 'centro', 'inhumas', 'GO', 'ttalessoft@gmail.com', '62855669944', '62855669955', 'f', NULL, 'teste', '2018-12-16 18:07:00'),
(2, 'teste', '', '01739227166', '0000-00-00', '', '', '', '', '', 'goiania', 'GO', '', '', '62986279696', 'f', NULL, '', '2018-12-16 18:12:00'),
(3, 'ttales r g s silva', 'tt', '01739227166', '0000-00-00', 'rua goiÃ¡s qd 1 lt 4', '1', 'em frente a point car', '75.400-000', 'vila lucimar', 'inhumas', 'GO', 'ttalessoft@gmail.com', '(62)3514-6985', '(62)98627-9696', 'f', NULL, 'teste do teste testado  ', '2018-12-18 22:17:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_fornecedores`
--

CREATE TABLE `tb_fornecedores` (
  `idfornecedor` int(11) NOT NULL,
  `nome_razao_social` varchar(64) DEFAULT NULL,
  `apelido_nome_fantasia` varchar(64) DEFAULT NULL,
  `cpf_cnpj` varchar(20) NOT NULL,
  `logradouro` varchar(64) DEFAULT NULL,
  `numero` varchar(8) DEFAULT NULL,
  `complemento` varchar(64) DEFAULT NULL,
  `cep` varchar(10) DEFAULT NULL,
  `bairro` varchar(32) DEFAULT NULL,
  `cidade` varchar(32) DEFAULT NULL,
  `uf` char(2) DEFAULT NULL,
  `email` varchar(32) DEFAULT NULL,
  `telefone_fixo` varchar(13) DEFAULT NULL,
  `telefone_celular` varchar(14) DEFAULT NULL,
  `tipo` char(1) DEFAULT NULL,
  `pessoa_contato` varchar(16) DEFAULT NULL,
  `obs` text,
  `data_registro` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_fornecedores`
--

INSERT INTO `tb_fornecedores` (`idfornecedor`, `nome_razao_social`, `apelido_nome_fantasia`, `cpf_cnpj`, `logradouro`, `numero`, `complemento`, `cep`, `bairro`, `cidade`, `uf`, `email`, `telefone_fixo`, `telefone_celular`, `tipo`, `pessoa_contato`, `obs`, `data_registro`) VALUES
(4, 'clp industria e confeccoes importacao e exportacao ltda', 'clp enxovais', '06057815000193', 'rua jose de arimateia', '538', 'antigo club dos 30', '75400000', 'centro', 'inhumas', 'GO', 'ttales@grupoclp.com.br', '6235146985', '62986279696', 'j', NULL, 'teste', '2018-12-16 13:28:00'),
(5, 'next tecnolÃ³gia ltda', 'nexttec', '88844427166', 'rua goias qd 1 lt 4', '1', 'em frente a point car', '75400888', 'centro', 'inhumas', 'GO', 'contato@nxt.com.br', '6235144554', '62986279696', 'f', NULL, 'teste nxt', '2018-12-16 13:27:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_orders`
--

CREATE TABLE `tb_orders` (
  `idorder` int(11) NOT NULL,
  `idcart` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `idstatus` int(11) NOT NULL,
  `vltotal` decimal(10,2) NOT NULL,
  `dtregister` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_ordersstatus`
--

CREATE TABLE `tb_ordersstatus` (
  `idstatus` int(11) NOT NULL,
  `desstatus` varchar(32) NOT NULL,
  `dtregister` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_ordersstatus`
--

INSERT INTO `tb_ordersstatus` (`idstatus`, `desstatus`, `dtregister`) VALUES
(1, 'Em Aberto', '2017-03-13 03:00:00'),
(2, 'Aguardando Pagamento', '2017-03-13 03:00:00'),
(3, 'Pago', '2017-03-13 03:00:00'),
(4, 'Entregue', '2017-03-13 03:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_persons`
--

CREATE TABLE `tb_persons` (
  `idperson` int(11) NOT NULL,
  `desperson` varchar(64) NOT NULL,
  `desemail` varchar(128) DEFAULT NULL,
  `nrphone` bigint(20) DEFAULT NULL,
  `dtregister` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_persons`
--

INSERT INTO `tb_persons` (`idperson`, `desperson`, `desemail`, `nrphone`, `dtregister`) VALUES
(1, 'JoÃ£o Rangel', 'admin@hcode.com.br', 2147483647, '2017-03-01 03:00:00'),
(7, 'Suporte', 'suporte@hcode.com.br', 1112345678, '2017-03-15 16:10:27'),
(8, 'Ttales R G S Silva', 'ttalessoft@gmail.com', 6235454554, '2018-12-09 12:27:25');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_products`
--

CREATE TABLE `tb_products` (
  `idproduct` int(11) NOT NULL,
  `desproduct` varchar(64) NOT NULL,
  `vlprice` decimal(10,2) NOT NULL,
  `vlwidth` decimal(10,2) NOT NULL,
  `vlheight` decimal(10,2) NOT NULL,
  `vllength` decimal(10,2) NOT NULL,
  `vlweight` decimal(10,2) NOT NULL,
  `desurl` varchar(128) NOT NULL,
  `dtregister` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_products`
--

INSERT INTO `tb_products` (`idproduct`, `desproduct`, `vlprice`, `vlwidth`, `vlheight`, `vllength`, `vlweight`, `desurl`, `dtregister`) VALUES
(1, 'Smartphone Android 7.0', '999.95', '75.00', '151.00', '80.00', '167.00', 'smartphone-android-7.0', '2017-03-13 03:00:00'),
(2, 'SmartTV LED 4K', '3925.99', '917.00', '596.00', '288.00', '8600.00', 'smarttv-led-4k', '2017-03-13 03:00:00'),
(3, 'Notebook 14\" 4GB 1TB', '1949.99', '345.00', '23.00', '30.00', '2000.00', 'notebook-14-4gb-1tb', '2017-03-13 03:00:00'),
(4, 'MacBook Pro 15\" ', '12500.00', '40.00', '2.00', '30.00', '1.80', '', '2018-12-16 01:23:56'),
(5, 'rodo de rapar Ã¡gua', '19.00', '45.00', '150.00', '70.00', '1.00', '', '2018-12-18 22:33:21');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_productscategories`
--

CREATE TABLE `tb_productscategories` (
  `idcategory` int(11) NOT NULL,
  `idproduct` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_users`
--

CREATE TABLE `tb_users` (
  `iduser` int(11) NOT NULL,
  `idperson` int(11) NOT NULL,
  `deslogin` varchar(64) NOT NULL,
  `despassword` varchar(256) NOT NULL,
  `inadmin` tinyint(4) NOT NULL DEFAULT '0',
  `dtregister` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_users`
--

INSERT INTO `tb_users` (`iduser`, `idperson`, `deslogin`, `despassword`, `inadmin`, `dtregister`) VALUES
(1, 1, 'admin', '$2y$12$YlooCyNvyTji8bPRcrfNfOKnVMmZA9ViM2A3IpFjmrpIbp5ovNmga', 1, '2017-03-13 03:00:00'),
(7, 7, 'suporte', '$2y$12$HFjgUm/mk1RzTy4ZkJaZBe0Mc/BA2hQyoUckvm.lFa6TesjtNpiMe', 1, '2017-03-15 16:10:27'),
(8, 8, 'admin', 'admin', 1, '2018-12-09 12:27:25');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_userslogs`
--

CREATE TABLE `tb_userslogs` (
  `idlog` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `deslog` varchar(128) NOT NULL,
  `desip` varchar(45) NOT NULL,
  `desuseragent` varchar(128) NOT NULL,
  `dessessionid` varchar(64) NOT NULL,
  `desurl` varchar(128) NOT NULL,
  `dtregister` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_userspasswordsrecoveries`
--

CREATE TABLE `tb_userspasswordsrecoveries` (
  `idrecovery` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `desip` varchar(45) NOT NULL,
  `dtrecovery` datetime DEFAULT NULL,
  `dtregister` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_userspasswordsrecoveries`
--

INSERT INTO `tb_userspasswordsrecoveries` (`idrecovery`, `iduser`, `desip`, `dtrecovery`, `dtregister`) VALUES
(1, 7, '127.0.0.1', NULL, '2017-03-15 16:10:59'),
(2, 7, '127.0.0.1', '2017-03-15 13:33:45', '2017-03-15 16:11:18'),
(3, 7, '127.0.0.1', '2017-03-15 13:37:35', '2017-03-15 16:37:12'),
(4, 8, '127.0.0.1', NULL, '2018-12-10 13:26:12'),
(5, 8, '127.0.0.1', NULL, '2018-12-10 13:28:52'),
(6, 8, '127.0.0.1', NULL, '2018-12-10 13:32:59'),
(7, 8, '127.0.0.1', NULL, '2018-12-10 21:33:41'),
(8, 8, '127.0.0.1', NULL, '2018-12-11 01:17:31'),
(9, 8, '127.0.0.1', NULL, '2018-12-11 01:17:36'),
(10, 8, '127.0.0.1', NULL, '2018-12-11 01:17:53'),
(11, 8, '127.0.0.1', NULL, '2018-12-11 01:19:32'),
(12, 8, '127.0.0.1', NULL, '2018-12-11 01:24:07'),
(13, 8, '127.0.0.1', NULL, '2018-12-11 01:24:10'),
(14, 8, '127.0.0.1', NULL, '2018-12-11 01:24:38'),
(15, 8, '127.0.0.1', NULL, '2018-12-11 01:24:44'),
(16, 8, '127.0.0.1', NULL, '2018-12-11 01:25:01'),
(17, 8, '127.0.0.1', NULL, '2018-12-11 01:26:55'),
(18, 8, '127.0.0.1', NULL, '2018-12-11 01:26:57'),
(19, 8, '127.0.0.1', NULL, '2018-12-11 01:27:01'),
(20, 8, '127.0.0.1', NULL, '2018-12-11 01:28:45'),
(21, 8, '127.0.0.1', NULL, '2018-12-11 01:28:52'),
(22, 8, '127.0.0.1', NULL, '2018-12-11 01:29:47'),
(23, 8, '127.0.0.1', NULL, '2018-12-11 01:31:18'),
(24, 8, '127.0.0.1', NULL, '2018-12-11 01:32:06'),
(25, 8, '127.0.0.1', NULL, '2018-12-11 01:36:08'),
(26, 8, '127.0.0.1', NULL, '2018-12-11 01:44:29'),
(27, 8, '127.0.0.1', NULL, '2018-12-11 01:46:59'),
(28, 8, '127.0.0.1', NULL, '2018-12-11 01:50:59'),
(29, 8, '127.0.0.1', '2018-12-11 00:02:13', '2018-12-11 02:01:54'),
(30, 8, '127.0.0.1', '2018-12-11 00:04:00', '2018-12-11 02:03:47'),
(31, 8, '127.0.0.1', NULL, '2018-12-11 02:08:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_addresses`
--
ALTER TABLE `tb_addresses`
  ADD PRIMARY KEY (`idaddress`),
  ADD KEY `fk_addresses_persons_idx` (`idperson`);

--
-- Indexes for table `tb_carts`
--
ALTER TABLE `tb_carts`
  ADD PRIMARY KEY (`idcart`),
  ADD KEY `FK_carts_users_idx` (`iduser`),
  ADD KEY `fk_carts_addresses_idx` (`idaddress`);

--
-- Indexes for table `tb_cartsproducts`
--
ALTER TABLE `tb_cartsproducts`
  ADD PRIMARY KEY (`idcartproduct`),
  ADD KEY `FK_cartsproducts_carts_idx` (`idcart`),
  ADD KEY `FK_cartsproducts_products_idx` (`idproduct`);

--
-- Indexes for table `tb_categories`
--
ALTER TABLE `tb_categories`
  ADD PRIMARY KEY (`idcategory`);

--
-- Indexes for table `tb_clientes`
--
ALTER TABLE `tb_clientes`
  ADD PRIMARY KEY (`idcliente`);

--
-- Indexes for table `tb_fornecedores`
--
ALTER TABLE `tb_fornecedores`
  ADD PRIMARY KEY (`idfornecedor`);

--
-- Indexes for table `tb_orders`
--
ALTER TABLE `tb_orders`
  ADD PRIMARY KEY (`idorder`),
  ADD KEY `FK_orders_carts_idx` (`idcart`),
  ADD KEY `FK_orders_users_idx` (`iduser`),
  ADD KEY `fk_orders_ordersstatus_idx` (`idstatus`);

--
-- Indexes for table `tb_ordersstatus`
--
ALTER TABLE `tb_ordersstatus`
  ADD PRIMARY KEY (`idstatus`);

--
-- Indexes for table `tb_persons`
--
ALTER TABLE `tb_persons`
  ADD PRIMARY KEY (`idperson`);

--
-- Indexes for table `tb_products`
--
ALTER TABLE `tb_products`
  ADD PRIMARY KEY (`idproduct`);

--
-- Indexes for table `tb_productscategories`
--
ALTER TABLE `tb_productscategories`
  ADD PRIMARY KEY (`idcategory`,`idproduct`),
  ADD KEY `fk_productscategories_products_idx` (`idproduct`);

--
-- Indexes for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`iduser`),
  ADD KEY `FK_users_persons_idx` (`idperson`);

--
-- Indexes for table `tb_userslogs`
--
ALTER TABLE `tb_userslogs`
  ADD PRIMARY KEY (`idlog`),
  ADD KEY `fk_userslogs_users_idx` (`iduser`);

--
-- Indexes for table `tb_userspasswordsrecoveries`
--
ALTER TABLE `tb_userspasswordsrecoveries`
  ADD PRIMARY KEY (`idrecovery`),
  ADD KEY `fk_userspasswordsrecoveries_users_idx` (`iduser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_addresses`
--
ALTER TABLE `tb_addresses`
  MODIFY `idaddress` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_cartsproducts`
--
ALTER TABLE `tb_cartsproducts`
  MODIFY `idcartproduct` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_categories`
--
ALTER TABLE `tb_categories`
  MODIFY `idcategory` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_clientes`
--
ALTER TABLE `tb_clientes`
  MODIFY `idcliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_fornecedores`
--
ALTER TABLE `tb_fornecedores`
  MODIFY `idfornecedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_orders`
--
ALTER TABLE `tb_orders`
  MODIFY `idorder` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_ordersstatus`
--
ALTER TABLE `tb_ordersstatus`
  MODIFY `idstatus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_persons`
--
ALTER TABLE `tb_persons`
  MODIFY `idperson` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_products`
--
ALTER TABLE `tb_products`
  MODIFY `idproduct` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_userslogs`
--
ALTER TABLE `tb_userslogs`
  MODIFY `idlog` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_userspasswordsrecoveries`
--
ALTER TABLE `tb_userspasswordsrecoveries`
  MODIFY `idrecovery` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `tb_addresses`
--
ALTER TABLE `tb_addresses`
  ADD CONSTRAINT `fk_addresses_persons` FOREIGN KEY (`idperson`) REFERENCES `tb_persons` (`idperson`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tb_carts`
--
ALTER TABLE `tb_carts`
  ADD CONSTRAINT `fk_carts_addresses` FOREIGN KEY (`idaddress`) REFERENCES `tb_addresses` (`idaddress`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_carts_users` FOREIGN KEY (`iduser`) REFERENCES `tb_users` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tb_cartsproducts`
--
ALTER TABLE `tb_cartsproducts`
  ADD CONSTRAINT `fk_cartsproducts_carts` FOREIGN KEY (`idcart`) REFERENCES `tb_carts` (`idcart`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_cartsproducts_products` FOREIGN KEY (`idproduct`) REFERENCES `tb_products` (`idproduct`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tb_orders`
--
ALTER TABLE `tb_orders`
  ADD CONSTRAINT `fk_orders_carts` FOREIGN KEY (`idcart`) REFERENCES `tb_carts` (`idcart`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_orders_ordersstatus` FOREIGN KEY (`idstatus`) REFERENCES `tb_ordersstatus` (`idstatus`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_orders_users` FOREIGN KEY (`iduser`) REFERENCES `tb_users` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tb_productscategories`
--
ALTER TABLE `tb_productscategories`
  ADD CONSTRAINT `fk_productscategories_categories` FOREIGN KEY (`idcategory`) REFERENCES `tb_categories` (`idcategory`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_productscategories_products` FOREIGN KEY (`idproduct`) REFERENCES `tb_products` (`idproduct`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tb_users`
--
ALTER TABLE `tb_users`
  ADD CONSTRAINT `fk_users_persons` FOREIGN KEY (`idperson`) REFERENCES `tb_persons` (`idperson`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tb_userslogs`
--
ALTER TABLE `tb_userslogs`
  ADD CONSTRAINT `fk_userslogs_users` FOREIGN KEY (`iduser`) REFERENCES `tb_users` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tb_userspasswordsrecoveries`
--
ALTER TABLE `tb_userspasswordsrecoveries`
  ADD CONSTRAINT `fk_userspasswordsrecoveries_users` FOREIGN KEY (`iduser`) REFERENCES `tb_users` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
