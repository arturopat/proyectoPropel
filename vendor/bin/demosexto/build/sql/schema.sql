
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- usuarios
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `nombres` VARCHAR(100) NOT NULL,
    `apellidos` VARCHAR(100) NOT NULL,
    `correo` VARCHAR(100) NOT NULL,
    `telefono` VARCHAR(15) NOT NULL,
    `vacunado` TINYINT(3) NOT NULL,
    `genero` TINYINT(15) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- productos
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `productos`;

CREATE TABLE `productos`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `nombre` VARCHAR(100) NOT NULL,
    `clasificacion` TINYINT(15) NOT NULL,
    `precio_compra` DECIMAL(50) NOT NULL,
    `precio_venta` DECIMAL(50) NOT NULL,
    `stock` INTEGER NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ventas
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ventas`;

CREATE TABLE `ventas`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `id_usuario_comprador` INTEGER NOT NULL,
    `fecha_venta` DATE NOT NULL,
    `costo_total` DECIMAL(50) NOT NULL,
    PRIMARY KEY (`id`),
    INDEX `ventas_FI_1` (`id_usuario_comprador`)
) ENGINE=MyISAM;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
