SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';


-- -----------------------------------------------------
-- Table `tbl_auditoria`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tbl_auditoria` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT 'Identificador unico',
  `aud_usuario_id` INT NOT NULL COMMENT 'id del usuario que realiza la accion',
  `aud_fecha` DATETIME NOT NULL COMMENT 'fecha y hora en la que se realiza la accion',
  `aud_accion` VARCHAR(255) NOT NULL COMMENT 'descripcion de la accion',
  `aud_ip_acceso` VARCHAR(45) NOT NULL COMMENT 'ip de acceso del cliente',
  PRIMARY KEY (`id`))
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COMMENT = 'Tabla de auditoria de usuarios';


-- -----------------------------------------------------
-- Table `tbl_log`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tbl_log` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT 'Identificador unico',
  `log_fecha` DATETIME NOT NULL COMMENT 'fecha del registro',
  `log_ip` VARCHAR(50) NOT NULL COMMENT 'ip de la maquina cliente',
  `log_descripcion` TEXT NOT NULL COMMENT 'descripcion del error',
  `log_modulo` VARCHAR(45) NULL COMMENT 'modulo donde se registra el error',
  `log_usuario_id` INT NULL COMMENT 'id del usuario que proboca el error',
  PRIMARY KEY (`id`))
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COMMENT = 'Tabla para el registro de errores de la aplicacion';


-- -----------------------------------------------------
-- Table `tbl_estado_proyecto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tbl_estado_proyecto` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT 'Identificador unico',
  `epr_estado_proyecto` VARCHAR(250) NOT NULL DEFAULT '0' COMMENT 'Nombre del estado del proyecto',
  `epr_estado` TINYINT(1) NOT NULL DEFAULT '0' COMMENT 'Estado del registro',
  `epr_disponible_cierre` TINYINT(4) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COMMENT = 'TABLA REFERENCIAL DEL ESTADO DE LOS PROYECTOS';


-- -----------------------------------------------------
-- Table `tbl_linea_investigacion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tbl_linea_investigacion` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT 'Identificador Unico',
  `lin_nombre_investigacion` VARCHAR(250) NOT NULL DEFAULT '0' COMMENT 'Nombre de la linea de investigacion',
  `lin_estado` TINYINT(1) NOT NULL DEFAULT '0' COMMENT 'Estado del registro',
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = utf8
COMMENT = 'TABLA REFERENCIAL DE LINEAS DE INVESTIGACION';


-- -----------------------------------------------------
-- Table `tbl_modulo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tbl_modulo` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT 'Identificador unico',
  `mod_nombre` VARCHAR(255) NOT NULL COMMENT 'Nombre del Modulo',
  `mod_estado` TINYINT(1) NOT NULL COMMENT 'Estado del registro',
  `mod_route` TEXT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COMMENT = 'TABLA REFERENCIAL DE MODULOS';


-- -----------------------------------------------------
-- Table `tbl_tipo_investigacion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tbl_tipo_investigacion` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT 'Identificador unico',
  `tin_nombre_tipo` VARCHAR(250) NOT NULL DEFAULT '0' COMMENT 'Nombre del tipo de investigación',
  `tin_estado` TINYINT(1) NOT NULL DEFAULT '0' COMMENT 'Estado del registro',
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COMMENT = 'TABLA REFERENCIAL TIPO DE INVESTIGACION';


-- -----------------------------------------------------
-- Table `tbl_cargo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tbl_cargo` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `car_nombre` VARCHAR(45) NOT NULL,
  `car_descripcion` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
COMMENT = 'Tabla de cargos genericos para clasificacion de usuarios';


-- -----------------------------------------------------
-- Table `tbl_departamento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tbl_departamento` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `dep_nombre` VARCHAR(45) NOT NULL,
  `dep_descripcion` TEXT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
COMMENT = 'Tabla de departamentos para clasificacion de usuarios';


-- -----------------------------------------------------
-- Table `tbl_organizacion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tbl_organizacion` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `org_nombre` VARCHAR(45) NOT NULL,
  `org_descripcion` TEXT NULL,
  `org_sitio_web` TEXT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
COMMENT = 'Tabla de organicaciones para clasificacion de usuarios';


-- -----------------------------------------------------
-- Table `tbl_nivel`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tbl_nivel` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT 'Id del nivel',
  `niv_nombre` VARCHAR(50) NOT NULL COMMENT 'Nombre del nivel',
  `niv_descripcion` TEXT NULL COMMENT 'Descripcion del nivel',
  PRIMARY KEY (`id`))
ENGINE = InnoDB
COMMENT = 'Tabla para nivel de cargo que el usuario (Operativo, directi /* comment truncated */ /*vo, tactico	)*/';


-- -----------------------------------------------------
-- Table `tbl_usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tbl_usuario` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT 'Identificador unico',
  `usu_cedula` VARCHAR(20) NULL DEFAULT '0' COMMENT 'Cedula del usuario',
  `usu_nombre` VARCHAR(250) NULL DEFAULT '0' COMMENT 'Nombre completo del usuario',
  `usu_apellido` VARCHAR(70) NULL,
  `usu_fecha_creacion` DATETIME NULL COMMENT 'Fecha de creacion en el sistema SGII',
  `usu_log` VARCHAR(250) NULL DEFAULT '0' COMMENT 'Nombre de ususairo al sistema SGII',
  `usu_password` VARCHAR(250) NULL DEFAULT '0' COMMENT 'Contraseña al sistema SGII',
  `usu_estado` TINYINT(1) NULL DEFAULT NULL COMMENT 'Estado de registro',
  `cargo_id` INT NULL,
  `departamento_id` INT NULL,
  `organizacion_id` INT NULL,
  `nivel_id` INT NULL COMMENT 'Id del nivel del usuario',
  PRIMARY KEY (`id`),
  INDEX `fk_tbl_usuario_tbl_cargo1_idx` (`cargo_id` ASC),
  INDEX `fk_tbl_usuario_tbl_departamento1_idx` (`departamento_id` ASC),
  INDEX `fk_tbl_usuario_tbl_organizacion1_idx` (`organizacion_id` ASC),
  INDEX `fk_tbl_usuario_tbl_niveles1` (`nivel_id` ASC),
  CONSTRAINT `fk_tbl_usuario_tbl_cargo1`
    FOREIGN KEY (`cargo_id`)
    REFERENCES `tbl_cargo` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_usuario_tbl_departamento1`
    FOREIGN KEY (`departamento_id`)
    REFERENCES `tbl_departamento` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_usuario_tbl_organizacion1`
    FOREIGN KEY (`organizacion_id`)
    REFERENCES `tbl_organizacion` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_usuario_tbl_niveles1`
    FOREIGN KEY (`nivel_id`)
    REFERENCES `tbl_nivel` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COMMENT = 'TABLA REFERENCIAL DE USUARIO';


-- -----------------------------------------------------
-- Table `tbl_proyecto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tbl_proyecto` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT 'Identificador unico',
  `pro_nombre` VARCHAR(250) NOT NULL DEFAULT '0' COMMENT 'Nombre del proyecto',
  `pro_descripcion` VARCHAR(2500) NULL DEFAULT '0' COMMENT 'Descripción de proyecto',
  `pro_problema` VARCHAR(500) NULL DEFAULT '0' COMMENT 'Pregunta problema',
  `pro_fecha_creacion` DATETIME NOT NULL COMMENT 'Fecha de creación',
  `pro_conclusiones` VARCHAR(2500) NULL COMMENT 'Concluciones de proyecto',
  `pro_demostraciones` VARCHAR(2500) NULL COMMENT 'Demostraciones de proyecto',
  `pro_recomendaciones` VARCHAR(2500) NULL COMMENT 'Recomendaciones de proyecto',
  `pro_estado` TINYINT(4) NULL COMMENT 'Estado del registro',
  `estado_proyecto_id` INT NOT NULL COMMENT 'FK con la tabla estado_proyecto',
  `tipo_investigacion_id` INT NOT NULL COMMENT 'FK con la tabla rtipo_investigacion',
  `linea_investigacion_id` INT NOT NULL COMMENT 'FK con la tabla rlinea_investigacion',
  `usuario_id` INT NOT NULL COMMENT 'FK con la tabla rusuario;  usuario encargado',
  PRIMARY KEY (`id`),
  INDEX `fk_tbl_tproyecto_investigacion_tbl_estado_proyecto1_idx` (`estado_proyecto_id` ASC),
  INDEX `fk_tbl_tproyecto_investigacion_tbl_rtipo_investigacion1_idx` (`tipo_investigacion_id` ASC),
  INDEX `fk_tbl_tproyecto_investigacion_tbl_linea_investigacion1_idx` (`linea_investigacion_id` ASC),
  INDEX `fk_tbl_proyecto_investigacion_tbl_usuario1_idx` (`usuario_id` ASC),
  CONSTRAINT `fk_tbl_tproyecto_investigacion_tbl_estado_proyecto1`
    FOREIGN KEY (`estado_proyecto_id`)
    REFERENCES `tbl_estado_proyecto` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_tproyecto_investigacion_tbl_rtipo_investigacion1`
    FOREIGN KEY (`tipo_investigacion_id`)
    REFERENCES `tbl_tipo_investigacion` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_tproyecto_investigacion_tbl_linea_investigacion1`
    FOREIGN KEY (`linea_investigacion_id`)
    REFERENCES `tbl_linea_investigacion` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_proyecto_investigacion_tbl_usuario1`
    FOREIGN KEY (`usuario_id`)
    REFERENCES `tbl_usuario` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COMMENT = 'TABLA TRANSACCIONAL CON PROYECTOS DE INVESTIGACION';


-- -----------------------------------------------------
-- Table `tbl_objetivo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tbl_objetivo` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT 'Identificador unico',
  `obj_objetivo` VARCHAR(250) NOT NULL DEFAULT '0' COMMENT 'Objetivo',
  `obj_estado` TINYINT(1) NULL DEFAULT '0' COMMENT 'estado del registro',
  `proyecto_id` INT NOT NULL COMMENT 'FK con la tabla proyecto investigacion',
  `estado_objetivo_id` INT NULL COMMENT 'FK con la tabla estado de objetivo',
  `objetivo_id` INT NULL COMMENT 'FK de esta tabla copn sigo mismo para la relación genérico - especifico',
  PRIMARY KEY (`id`),
  INDEX `fk_tbl_robjetivo_tbl_tproyecto_investigacion1_idx` (`proyecto_id` ASC),
  INDEX `fk_tbl_objetivo_tbl_objetivo1_idx` (`objetivo_id` ASC),
  CONSTRAINT `fk_tbl_robjetivo_tbl_tproyecto_investigacion1`
    FOREIGN KEY (`proyecto_id`)
    REFERENCES `tbl_proyecto` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_objetivo_tbl_objetivo1`
    FOREIGN KEY (`objetivo_id`)
    REFERENCES `tbl_objetivo` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COMMENT = 'TABLAREFERNCIAL DE OBJETIVO';


-- -----------------------------------------------------
-- Table `tbl_perfil`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tbl_perfil` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT 'Identificador unico',
  `per_perfil` VARCHAR(250) NOT NULL DEFAULT '0' COMMENT 'Perfil',
  `per_estado` TINYINT(1) NOT NULL COMMENT 'Estado del registro',
  PRIMARY KEY (`id`))
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = utf8
COMMENT = 'TABLA REFERENCIAL DE PERFILES DE USUARIO';


-- -----------------------------------------------------
-- Table `tbl_tipo_herramienta`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tbl_tipo_herramienta` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT 'Identificador unico',
  `the_nombre_herramienta` VARCHAR(250) NOT NULL DEFAULT '0' COMMENT 'Nombre del tipo de herramienta',
  `the_estado` TINYINT(1) NOT NULL DEFAULT '0' COMMENT 'Estado del registro',
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = utf8
COMMENT = 'TABLA REFERENCIAL DE TIPOS DE HERRAMIENTAS';


-- -----------------------------------------------------
-- Table `tbl_herramienta`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tbl_herramienta` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT 'Identificador unico',
  `her_nombre_herramienta` VARCHAR(250) NOT NULL DEFAULT '0' COMMENT 'Nombre de herramienta',
  `her_fecha_inicio` DATETIME NULL COMMENT 'Fecha de Inicio de funciones de la herramienta',
  `her_fecha_fin` DATETIME NULL COMMENT 'fecha de finalizacion',
  `her_estado` TINYINT(4) NOT NULL COMMENT 'Estado del registro',
  `tipo_herramienta_id` INT NOT NULL COMMENT 'FK con la tabla tipo de herramienta',
  `proyecto_id` INT NULL,
  `usuario_id` INT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_tbl_therramienta_tbl_tipo_herramienta1_idx` (`tipo_herramienta_id` ASC),
  INDEX `fk_tbl_herramienta_tbl_proyecto1_idx` (`proyecto_id` ASC),
  CONSTRAINT `fk_tbl_therramienta_tbl_tipo_herramienta1`
    FOREIGN KEY (`tipo_herramienta_id`)
    REFERENCES `tbl_tipo_herramienta` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_herramienta_tbl_proyecto1`
    FOREIGN KEY (`proyecto_id`)
    REFERENCES `tbl_proyecto` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COMMENT = 'TABAL TRANSACCIONAL DE INSTRUMENTOS DE INVESTIGACION';


-- -----------------------------------------------------
-- Table `tbl_tipo_pregunta`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tbl_tipo_pregunta` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT 'Identificador unico',
  `tpr_tipo_pregunta` VARCHAR(250) NOT NULL DEFAULT '0' COMMENT 'Nombre del tipo de pregunta',
  `tpr_estado` TINYINT(1) NOT NULL DEFAULT '0' COMMENT 'Estado del registro',
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = utf8
COMMENT = 'TABLA REFERENCIAL CON EL TIPO DE PREGUNTAS';


-- -----------------------------------------------------
-- Table `tbl_pregunta`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tbl_pregunta` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT 'Identificador unico',
  `pre_pregunta` VARCHAR(250) NOT NULL DEFAULT '0' COMMENT 'Pregunta',
  `pre_obligatoria` TINYINT(1) NOT NULL COMMENT 'Indicador booleano de obligatoriedad',
  `pre_estado` TINYINT(1) NOT NULL COMMENT 'Estado del registro',
  `pre_orden` INT NULL COMMENT 'indica la posicion de la pregunta',
  `herramienta_id` INT NOT NULL COMMENT 'FK con la tabla therramienta',
  `tipo_pregunta_id` INT NOT NULL COMMENT 'FK con la tabla tipo de proyecto',
  PRIMARY KEY (`id`),
  INDEX `fk_tbl_rpregunta_tbl_therramienta1_idx` (`herramienta_id` ASC),
  INDEX `fk_tbl_rpregunta_tbl_tipo_pregunta1_idx` (`tipo_pregunta_id` ASC),
  CONSTRAINT `fk_tbl_rpregunta_tbl_therramienta1`
    FOREIGN KEY (`herramienta_id`)
    REFERENCES `tbl_herramienta` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_rpregunta_tbl_tipo_pregunta1`
    FOREIGN KEY (`tipo_pregunta_id`)
    REFERENCES `tbl_tipo_pregunta` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COMMENT = 'TABLA REFENCIAL DE PREGUNTAS';


-- -----------------------------------------------------
-- Table `tbl_respuesta`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tbl_respuesta` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT 'Identificador unico',
  `res_respuesta` VARCHAR(250) NOT NULL DEFAULT '0' COMMENT 'Respuesta',
  `res_peso` INT(3) NOT NULL DEFAULT 0,
  `res_estado` TINYINT(1) NOT NULL COMMENT 'Estado del registro',
  `pregunta_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_tbl_rrespuesta_tbl_pregunta1_idx` (`pregunta_id` ASC),
  CONSTRAINT `fk_tbl_rrespuesta_tbl_pregunta1`
    FOREIGN KEY (`pregunta_id`)
    REFERENCES `tbl_pregunta` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COMMENT = 'TABLA REFERENCIAL DE RESPUESTAS';


-- -----------------------------------------------------
-- Table `tbl_hipotesis`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tbl_hipotesis` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `hip_hipotesis` VARCHAR(500) NOT NULL DEFAULT '0',
  `hip_estado` TINYINT(1) NULL DEFAULT '0',
  `hip_srguimiento` LONGTEXT NOT NULL,
  `estado_hipotesis_id` INT NULL COMMENT 'Id estado hipotesis',
  `proyecto_id` INT NOT NULL COMMENT 'Id proyecto de investigacion',
  PRIMARY KEY (`id`),
  INDEX `fk_tbl_thipotesis_tbl_tproyecto_investigacion1_idx` (`proyecto_id` ASC),
  CONSTRAINT `fk_tbl_thipotesis_tbl_tproyecto_investigacion1`
    FOREIGN KEY (`proyecto_id`)
    REFERENCES `tbl_proyecto` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COMMENT = 'TABLA TRANSACCIONAL DE HIPOTESIS DE PROBLEMAS';


-- -----------------------------------------------------
-- Table `tbl_usuario_proyecto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tbl_usuario_proyecto` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT 'Identificador unico',
  `usuario_id` INT NOT NULL COMMENT 'FK con la tabla usuario; Equipo de coinvestigadores',
  `proyecto_id` INT NOT NULL COMMENT 'FK con la tabla rproyecto_investigacion',
  `usuario_proyecto_tipo` VARCHAR(45) NOT NULL COMMENT 'Asesor|Investigador',
  PRIMARY KEY (`id`),
  INDEX `fk_tbl_uusario_proyecto_tbl_usuario1_idx` (`usuario_id` ASC),
  INDEX `fk_tbl_uusario_proyecto_tbl_tproyecto_investigacion1_idx` (`proyecto_id` ASC),
  CONSTRAINT `fk_tbl_uusario_proyecto_tbl_usuario1`
    FOREIGN KEY (`usuario_id`)
    REFERENCES `tbl_usuario` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_uusario_proyecto_tbl_tproyecto_investigacion1`
    FOREIGN KEY (`proyecto_id`)
    REFERENCES `tbl_proyecto` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COMMENT = 'TABLA DE UNION USUARIO PROYECTO';


-- -----------------------------------------------------
-- Table `tbl_usuario_perfil`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tbl_usuario_perfil` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT 'Identificador unico',
  `usuario_id` INT NOT NULL COMMENT 'FK con la tabla usuario',
  `perfil_id` INT NOT NULL COMMENT 'FK con la tabla perfil',
  PRIMARY KEY (`id`),
  INDEX `fk_tbl_uusuario_perfil_tbl_rusuario1_idx` (`usuario_id` ASC),
  INDEX `fk_tbl_uusuario_perfil_tbl_perfil1_idx` (`perfil_id` ASC),
  CONSTRAINT `fk_tbl_uusuario_perfil_tbl_rusuario1`
    FOREIGN KEY (`usuario_id`)
    REFERENCES `tbl_usuario` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_uusuario_perfil_tbl_perfil1`
    FOREIGN KEY (`perfil_id`)
    REFERENCES `tbl_perfil` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COMMENT = 'TABLA DE UNION ENTRE PERFILES Y USUARIOS';


-- -----------------------------------------------------
-- Table `tbl_perfil_modulo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tbl_perfil_modulo` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT 'Identificador registro unico',
  `perfil_id` INT NOT NULL COMMENT 'FK con la tabla rperfil',
  `modulo_id` INT NOT NULL COMMENT 'FK con la tabla modulo',
  PRIMARY KEY (`id`),
  INDEX `fk_tbl_rperfil_has_tbl_rmodulo_tbl_rmodulo1_idx` (`modulo_id` ASC),
  INDEX `fk_tbl_rperfil_has_tbl_rmodulo_tbl_rperfil_idx` (`perfil_id` ASC),
  CONSTRAINT `fk_tbl_rperfil_has_tbl_rmodulo_tbl_rperfil`
    FOREIGN KEY (`perfil_id`)
    REFERENCES `tbl_perfil` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_rperfil_has_tbl_rmodulo_tbl_rmodulo1`
    FOREIGN KEY (`modulo_id`)
    REFERENCES `tbl_modulo` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `tbl_respuesta_usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tbl_respuesta_usuario` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `pregunta_id` INT NOT NULL,
  `usuario_id` INT NOT NULL,
  `rus_respuesta_textual` TEXT NULL COMMENT 'texto de repuesta para preguntas abiertas',
  `respuesta_id` INT NULL COMMENT 'opcion seleccionada para pregunta de seleccion',
  INDEX `fk_tbl_respuesta_usuario_tbl_pregunta1_idx` (`pregunta_id` ASC),
  INDEX `fk_tbl_respuesta_usuario_tbl_usuario1_idx` (`usuario_id` ASC),
  PRIMARY KEY (`id`),
  INDEX `fk_tbl_respuesta_usuario_tbl_respuesta1_idx` (`respuesta_id` ASC),
  CONSTRAINT `fk_tbl_respuesta_usuario_tbl_pregunta1`
    FOREIGN KEY (`pregunta_id`)
    REFERENCES `tbl_pregunta` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_respuesta_usuario_tbl_usuario1`
    FOREIGN KEY (`usuario_id`)
    REFERENCES `tbl_usuario` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_respuesta_usuario_tbl_respuesta1`
    FOREIGN KEY (`respuesta_id`)
    REFERENCES `tbl_respuesta` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
COMMENT = 'TABLA DE ALMACENAMIENTO DE RESPUESTAS DE USUARIO';


-- -----------------------------------------------------
-- Table `tbl_usuario_herramienta`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tbl_usuario_herramienta` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `herramienta_id` INT NOT NULL COMMENT 'id de la herramienta',
  `usuario_id` INT NOT NULL COMMENT 'id del usuario invitado a contestar la herramienta\n',
  `ush_fecha_activo_inicio` DATETIME NULL COMMENT 'fecha de inicio para poder aplicar',
  `ush_fecha_activo_fin` DATETIME NULL COMMENT 'fecha fin para poder aplicar',
  `ush_fecha_aplico` DATETIME NULL COMMENT 'fecha en la que aplica',
  `ush_aplico` TINYINT(1) NULL COMMENT 'indica si el usuario ya aplico a la herramienta',
  INDEX `fk_tbl_herramienta_has_tbl_usuario_tbl_usuario1_idx` (`usuario_id` ASC),
  INDEX `fk_tbl_herramienta_has_tbl_usuario_tbl_herramienta1_idx` (`herramienta_id` ASC),
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_tbl_herramienta_has_tbl_usuario_tbl_herramienta1`
    FOREIGN KEY (`herramienta_id`)
    REFERENCES `tbl_herramienta` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_herramienta_has_tbl_usuario_tbl_usuario1`
    FOREIGN KEY (`usuario_id`)
    REFERENCES `tbl_usuario` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COMMENT = 'Tabla para usuarios invitados a aplicar en una herramienta';


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
