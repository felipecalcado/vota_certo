
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- candidato
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `candidato`;

CREATE TABLE `candidato`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `nome` VARCHAR(30) NOT NULL,
    `id_cidade` INTEGER,
    `partido` VARCHAR(8) NOT NULL,
    `cargo` VARCHAR(15) NOT NULL,
    `historico` TEXT NOT NULL,
    PRIMARY KEY (`id`),
    INDEX `id_cidade` (`id_cidade`),
    CONSTRAINT `fk_candidato_cidade`
        FOREIGN KEY (`id_cidade`)
        REFERENCES `cidade` (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- cidade
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `cidade`;

CREATE TABLE `cidade`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `nome` VARCHAR(50) NOT NULL,
    `id_estado` INTEGER NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE INDEX `id` (`id`),
    UNIQUE INDEX `nome` (`nome`),
    UNIQUE INDEX `id_estado` (`id_estado`),
    INDEX `estado` (`id_estado`),
    CONSTRAINT `fk_cidade_estado`
        FOREIGN KEY (`id_estado`)
        REFERENCES `estado` (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- erro
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `erro`;

CREATE TABLE `erro`
(
    `id` INTEGER NOT NULL,
    `arquivo` VARCHAR(200) NOT NULL,
    `linha` INTEGER NOT NULL,
    `mensagem` VARCHAR(200) NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE INDEX `id` (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- estado
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `estado`;

CREATE TABLE `estado`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `nome` VARCHAR(50) NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE INDEX `nome` (`nome`),
    UNIQUE INDEX `id` (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- usuario
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `usuario`;

CREATE TABLE `usuario`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `usuario` VARCHAR(50) NOT NULL,
    `senha` VARCHAR(20) NOT NULL,
    `id_cidade` INTEGER,
    `admin` TINYINT(1),
    PRIMARY KEY (`id`),
    UNIQUE INDEX `usuario` (`usuario`, `senha`),
    INDEX `id_cidade` (`id_cidade`),
    CONSTRAINT `fk_usuario_cidade`
        FOREIGN KEY (`id_cidade`)
        REFERENCES `cidade` (`id`)
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
