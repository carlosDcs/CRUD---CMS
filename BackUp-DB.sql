CREATE TABLE IF NOT EXISTS `Proyecto_Impla`.`usuarios` (
  `codusuario` INT(4) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(10) NULL DEFAULT NULL,
  `apellidos` VARCHAR(25) NULL DEFAULT NULL,
  `correo` VARCHAR(25) NULL DEFAULT NULL,
  `direccion` VARCHAR(40) NULL DEFAULT NULL,
  `claveacceso` VARCHAR(70) NULL DEFAULT NULL,
  `tipo` VARCHAR(20) NULL DEFAULT 'usuario',
  `numero` VARCHAR(9) NULL DEFAULT NULL,
  `fecha` DATE NULL DEFAULT NULL,
  `fotofile` VARCHAR(250) NULL DEFAULT NULL,
  PRIMARY KEY (`codusuario`))
ENGINE = InnoDB
AUTO_INCREMENT = 11
DEFAULT CHARACTER SET = latin1;







CREATE TABLE IF NOT EXISTS `Proyecto_Impla`.`mensajes` (
  `codmensaje` INT(4) NOT NULL AUTO_INCREMENT,
  `codusuario` INT(4) NOT NULL,
  `asunto` VARCHAR(30) NULL DEFAULT NULL,
  `contenido` VARCHAR(500) NULL DEFAULT NULL,
  PRIMARY KEY (`codmensaje`),
  INDEX `codusuario` (`codusuario` ASC),
  CONSTRAINT `mensajes_ibfk_1`
    FOREIGN KEY (`codusuario`)
    REFERENCES `Proyecto_Impla`.`usuarios` (`codusuario`))
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = latin1;








CREATE TABLE IF NOT EXISTS `Proyecto_Impla`.`monitores` (
  `codmonitor` INT(4) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(10) NULL DEFAULT NULL,
  `apellidos` VARCHAR(25) NULL DEFAULT NULL,
  `puesto` VARCHAR(20) NULL DEFAULT NULL,
  `informacion` VARCHAR(500) NULL DEFAULT NULL,
  `valoracion` INT(2) NULL DEFAULT NULL,
  PRIMARY KEY (`codmonitor`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;








CREATE TABLE IF NOT EXISTS `Proyecto_Impla`.`clases` (
  `codclase` INT(4) NOT NULL AUTO_INCREMENT,
  `horainicio` TIME NULL DEFAULT NULL,
  `horafin` TIME NULL DEFAULT NULL,
  `dia` ENUM('Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado') NULL DEFAULT NULL,
  `actividad` VARCHAR(15) NULL DEFAULT NULL,
  `capacidad` INT(20) NULL DEFAULT NULL,
  `codmonitor` INT(4) NOT NULL,
  PRIMARY KEY (`codclase`),
  INDEX `codmonitor` (`codmonitor` ASC),
  CONSTRAINT `clases_ibfk_1`
    FOREIGN KEY (`codmonitor`)
    REFERENCES `Proyecto_Impla`.`monitores` (`codmonitor`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;








CREATE TABLE IF NOT EXISTS `Proyecto_Impla`.`inscribir` (
  `codinscripcion` INT(4) NOT NULL AUTO_INCREMENT,
  `codusuario` INT(4) NOT NULL,
  `codclase` INT(4) NOT NULL,
  PRIMARY KEY (`codinscripcion`),
  INDEX `codusuario` (`codusuario` ASC),
  INDEX `codclase` (`codclase` ASC),
  CONSTRAINT `inscribir_ibfk_1`
    FOREIGN KEY (`codusuario`)
    REFERENCES `Proyecto_Impla`.`usuarios` (`codusuario`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `inscribir_ibfk_2`
    FOREIGN KEY (`codclase`)
    REFERENCES `Proyecto_Impla`.`clases` (`codclase`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;
