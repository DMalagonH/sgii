SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `db_sgii` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
USE `db_sgii` ;

-- -----------------------------------------------------
-- Table `db_sgii`.`tbl_auditoria`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_sgii`.`tbl_auditoria` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT 'Identificador unico',
  `aud_usuario_id` INT NOT NULL COMMENT 'id del usuario que realiza la accion',
  `aud_fecha` DATETIME NOT NULL COMMENT 'fecha y hora en la que se realiza la accion',
  `aud_accion` VARCHAR(255) NOT NULL COMMENT 'descripcion de la accion',
  `aud_ip_acceso` VARCHAR(45) NOT NULL COMMENT 'ip de acceso del cliente',
  PRIMARY KEY (`id`))
ENGINE = MyISAM
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = utf8
COMMENT = 'Tabla de auditoria de usuarios';


-- -----------------------------------------------------
-- Table `db_sgii`.`tbl_log`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_sgii`.`tbl_log` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT 'Identificador unico',
  `log_fecha` DATETIME NOT NULL COMMENT 'fecha del registro',
  `log_ip` VARCHAR(50) NOT NULL COMMENT 'ip de la maquina cliente',
  `log_descripcion` TEXT NOT NULL COMMENT 'descripcion del error',
  `log_modulo` VARCHAR(45) NULL COMMENT 'modulo donde se registra el error',
  `log_usuario_id` INT NULL COMMENT 'id del usuario que proboca el error',
  PRIMARY KEY (`id`))
ENGINE = MyISAM
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = utf8
COMMENT = 'Tabla para el registro de errores de la aplicacion';


-- -----------------------------------------------------
-- Table `db_sgii`.`tbl_estado_proyecto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_sgii`.`tbl_estado_proyecto` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT 'Identificador unico',
  `epr_estado_proyecto` VARCHAR(250) NOT NULL DEFAULT '0' COMMENT 'Nombre del estado del proyecto',
  `epr_estado` TINYINT(1) NOT NULL DEFAULT '0' COMMENT 'Estado del registro',
  `epr_disponible_cierre` TINYINT(4) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = MyISAM
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = utf8
COMMENT = 'TABLA REFERENCIAL DEL ESTADO DE LOS PROYECTOS';


-- -----------------------------------------------------
-- Table `db_sgii`.`tbl_linea_investigacion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_sgii`.`tbl_linea_investigacion` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT 'Identificador Unico',
  `lin_nombre_investigacion` VARCHAR(250) NOT NULL DEFAULT '0' COMMENT 'Nombre de la linea de investigacion',
  `lin_estado` TINYINT(1) NOT NULL DEFAULT '0' COMMENT 'Estado del registro',
  PRIMARY KEY (`id`))
ENGINE = MyISAM
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = utf8
COMMENT = 'TABLA REFERENCIAL DE LINEAS DE INVESTIGACION';


-- -----------------------------------------------------
-- Table `db_sgii`.`tbl_modulo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_sgii`.`tbl_modulo` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT 'Identificador unico',
  `mod_nombre` VARCHAR(255) NOT NULL COMMENT 'Nombre del Modulo',
  `mod_estado` TINYINT(1) NOT NULL COMMENT 'Estado del registro',
  `mod_route` TEXT NULL,
  PRIMARY KEY (`id`))
ENGINE = MyISAM
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = utf8
COMMENT = 'TABLA REFERENCIAL DE MODULOS';


-- -----------------------------------------------------
-- Table `db_sgii`.`tbl_tipo_investigacion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_sgii`.`tbl_tipo_investigacion` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT 'Identificador unico',
  `tin_nombre_tipo` VARCHAR(250) NOT NULL DEFAULT '0' COMMENT 'Nombre del tipo de investigación',
  `tin_estado` TINYINT(1) NOT NULL DEFAULT '0' COMMENT 'Estado del registro',
  PRIMARY KEY (`id`))
ENGINE = MyISAM
AUTO_INCREMENT = 9
DEFAULT CHARACTER SET = utf8
COMMENT = 'TABLA REFERENCIAL TIPO DE INVESTIGACION';


-- -----------------------------------------------------
-- Table `db_sgii`.`tbl_cargo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_sgii`.`tbl_cargo` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `car_nombre` VARCHAR(45) NOT NULL,
  `car_descripcion` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
COMMENT = 'Tabla de cargos genericos para clasificacion de usuarios';


-- -----------------------------------------------------
-- Table `db_sgii`.`tbl_departamento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_sgii`.`tbl_departamento` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `dep_nombre` VARCHAR(45) NOT NULL,
  `dep_descripcion` TEXT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
COMMENT = 'Tabla de departamentos para clasificacion de usuarios';


-- -----------------------------------------------------
-- Table `db_sgii`.`tbl_organizacion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_sgii`.`tbl_organizacion` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `org_nombre` VARCHAR(45) NOT NULL,
  `org_descripcion` TEXT NULL,
  `org_sitio_web` TEXT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
COMMENT = 'Tabla de organicaciones para clasificacion de usuarios';


-- -----------------------------------------------------
-- Table `db_sgii`.`tbl_usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_sgii`.`tbl_usuario` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT 'Identificador unico',
  `usu_cedula` VARCHAR(20) NULL DEFAULT '0' COMMENT 'Cedula del usuario',
  `usu_nombre` VARCHAR(250) NULL DEFAULT '0' COMMENT 'Nombre completo del usuario',
  `usu_fecha_creacion` DATETIME NULL COMMENT 'Fecha de creacion en el sistema SGII',
  `usu_log` VARCHAR(250) NULL DEFAULT '0' COMMENT 'Nombre de ususairo al sistema SGII',
  `usu_password` VARCHAR(250) NULL DEFAULT '0' COMMENT 'Contraseña al sistema SGII',
  `usu_estado` TINYINT(1) NULL DEFAULT NULL COMMENT 'Estado de registro',
  `cargo_id` INT NULL,
  `departamento_id` INT NULL,
  `organizacion_id` INT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_tbl_usuario_tbl_cargo1_idx` (`cargo_id` ASC),
  INDEX `fk_tbl_usuario_tbl_departamento1_idx` (`departamento_id` ASC),
  INDEX `fk_tbl_usuario_tbl_organizacion1_idx` (`organizacion_id` ASC))
ENGINE = MyISAM
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8
COMMENT = 'TABLA REFERENCIAL DE USUARIO';


-- -----------------------------------------------------
-- Table `db_sgii`.`tbl_proyecto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_sgii`.`tbl_proyecto` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT 'Identificador unico',
  `pro_nombre` VARCHAR(250) NOT NULL DEFAULT '0' COMMENT 'Nombre del proyecto',
  `pro_descripcion` VARCHAR(2500) NOT NULL DEFAULT '0' COMMENT 'Descripción de proyecto',
  `pro_problema` VARCHAR(500) NOT NULL DEFAULT '0' COMMENT 'Pregunta problema',
  `pro_fecha_creacion` DATETIME NOT NULL COMMENT 'Fecha de creación',
  `pro_conclusiones` VARCHAR(2500) NOT NULL COMMENT 'Concluciones de proyecto',
  `pro_demostraciones` VARCHAR(2500) NOT NULL COMMENT 'Demostraciones de proyecto',
  `pro_recomendaciones` VARCHAR(2500) NOT NULL COMMENT 'Recomendaciones de proyecto',
  `pro_estado` TINYINT(4) NOT NULL COMMENT 'eSTADO DEL REGISTRO',
  `estado_proyecto_id` INT NOT NULL COMMENT 'FK con la tabla estado_proyecto',
  `tipo_investigacion_id` INT NOT NULL COMMENT 'FK con la tabla rtipo_investigacion',
  `linea_investigacion_id` INT NOT NULL COMMENT 'FK con la tabla rlinea_investigacion',
  `usuario_id` INT NOT NULL COMMENT 'FK con la tabla rusuario;  usuario encargado',
  PRIMARY KEY (`id`),
  INDEX `fk_tbl_tproyecto_investigacion_tbl_estado_proyecto1_idx` (`estado_proyecto_id` ASC),
  INDEX `fk_tbl_tproyecto_investigacion_tbl_rtipo_investigacion1_idx` (`tipo_investigacion_id` ASC),
  INDEX `fk_tbl_tproyecto_investigacion_tbl_linea_investigacion1_idx` (`linea_investigacion_id` ASC),
  INDEX `fk_tbl_proyecto_investigacion_tbl_usuario1_idx` (`usuario_id` ASC))
ENGINE = MyISAM
AUTO_INCREMENT = 9
DEFAULT CHARACTER SET = utf8
COMMENT = 'TABLA TRANSACCIONAL CON PROYECTOS DE INVESTIGACION';


-- -----------------------------------------------------
-- Table `db_sgii`.`tbl_objetivo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_sgii`.`tbl_objetivo` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT 'Identificador unico',
  `obj_objetivo` VARCHAR(250) NOT NULL DEFAULT '0' COMMENT 'Objetivo',
  `obj_estado` TINYINT(1) NOT NULL DEFAULT '0' COMMENT 'estado del registro',
  `proyecto_id` INT NOT NULL COMMENT 'FK con la tabla proyecto investigacion',
  `estado_objetivo_id` INT NOT NULL COMMENT 'FK con la tabla estado de objetivo',
  `objetivo_id` INT NULL COMMENT 'FK de esta tabla copn sigo mismo para la relación genérico - especifico',
  PRIMARY KEY (`id`),
  INDEX `fk_tbl_robjetivo_tbl_tproyecto_investigacion1_idx` (`proyecto_id` ASC),
  INDEX `fk_tbl_objetivo_tbl_objetivo1_idx` (`objetivo_id` ASC))
ENGINE = MyISAM
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = utf8
COMMENT = 'TABLAREFERNCIAL DE OBJETIVO';


-- -----------------------------------------------------
-- Table `db_sgii`.`tbl_perfil`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_sgii`.`tbl_perfil` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT 'Identificador unico',
  `per_perfil` VARCHAR(250) NOT NULL DEFAULT '0' COMMENT 'Perfil',
  `per_estado` TINYINT(1) NOT NULL COMMENT 'Estado del registro',
  PRIMARY KEY (`id`))
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = utf8
COMMENT = 'TABLA REFERENCIAL DE PERFILES DE USUARIO';


-- -----------------------------------------------------
-- Table `db_sgii`.`tbl_tipo_herramienta`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_sgii`.`tbl_tipo_herramienta` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT 'Identificador unico',
  `the_nombre_herramienta` VARCHAR(250) NOT NULL DEFAULT '0' COMMENT 'Nombre del tipo de herramienta',
  `the_estado` TINYINT(1) NOT NULL DEFAULT '0' COMMENT 'Estado del registro',
  PRIMARY KEY (`id`))
ENGINE = MyISAM
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = utf8
COMMENT = 'TABLA REFERENCIAL DE TIPOS DE HERRAMIENTAS';


-- -----------------------------------------------------
-- Table `db_sgii`.`tbl_herramienta`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_sgii`.`tbl_herramienta` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT 'Identificador unico',
  `her_nombre_herramienta` VARCHAR(250) NOT NULL DEFAULT '0' COMMENT 'Nombre de herramienta',
  `her_fecha_inicio` DATETIME NOT NULL COMMENT 'Fecha de Inicio de funciones de la herramienta',
  `her_fecha_fn` DATETIME NOT NULL COMMENT 'fecha de finalizacion',
  `her_estado` TINYINT(4) NOT NULL COMMENT 'Estado del registro',
  `tipo_herramienta_id` INT NOT NULL COMMENT 'FK con la tabla tipo de herramienta',
  PRIMARY KEY (`id`),
  INDEX `fk_tbl_therramienta_tbl_tipo_herramienta1_idx` (`tipo_herramienta_id` ASC))
ENGINE = MyISAM
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = utf8
COMMENT = 'TABAL TRANSACCIONAL DE INSTRUMENTOS DE INVESTIGACION';


-- -----------------------------------------------------
-- Table `db_sgii`.`tbl_tipo_pregunta`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_sgii`.`tbl_tipo_pregunta` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT 'Identificador unico',
  `tpr_tipo_pregunta` VARCHAR(250) NOT NULL DEFAULT '0' COMMENT 'Nombre del tipo de pregunta',
  `tpr_estado` TINYINT(1) NOT NULL DEFAULT '0' COMMENT 'Estado del registro',
  PRIMARY KEY (`id`))
ENGINE = MyISAM
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = utf8
COMMENT = 'TABLA REFERENCIAL CON EL TIPO DE PREGUNTAS';


-- -----------------------------------------------------
-- Table `db_sgii`.`tbl_pregunta`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_sgii`.`tbl_pregunta` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT 'Identificador unico',
  `pre_pregunta` VARCHAR(250) NOT NULL DEFAULT '0' COMMENT 'Pregunta',
  `pre_obligatoria` TINYINT(1) NOT NULL DEFAULT '0' COMMENT 'Indicador booleano de obligatoriedad',
  `pre_estado` TINYINT(1) NOT NULL DEFAULT '0' COMMENT 'Estado del registro',
  `herramienta_id` INT NOT NULL COMMENT 'FK con la tabla therramienta',
  `tipo_pregunta_id` INT NOT NULL COMMENT 'FK con la tabla tipo de proyecto',
  PRIMARY KEY (`id`),
  INDEX `fk_tbl_rpregunta_tbl_therramienta1_idx` (`herramienta_id` ASC),
  INDEX `fk_tbl_rpregunta_tbl_tipo_pregunta1_idx` (`tipo_pregunta_id` ASC))
ENGINE = MyISAM
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = utf8
COMMENT = 'TABLA REFENCIAL DE PREGUNTAS';


-- -----------------------------------------------------
-- Table `db_sgii`.`tbl_respuesta`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_sgii`.`tbl_respuesta` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT 'Identificador unico',
  `res_respuesta` VARCHAR(250) NOT NULL DEFAULT '0' COMMENT 'Respuesta',
  `res_estado` TINYINT(1) NOT NULL COMMENT 'Estado del registro',
  `pregunta_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_tbl_rrespuesta_tbl_pregunta1_idx` (`pregunta_id` ASC))
ENGINE = MyISAM
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = utf8
COMMENT = 'TABLA REFERENCIAL DE RESPUESTAS';


-- -----------------------------------------------------
-- Table `db_sgii`.`tbl_hipotesis`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_sgii`.`tbl_hipotesis` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `hip_hipotesis` VARCHAR(500) NOT NULL DEFAULT '0',
  `hip_estado` TINYINT(1) NOT NULL DEFAULT '0',
  `hip_srguimiento` LONGTEXT NOT NULL,
  `estado_hipotesis_id` INT NOT NULL COMMENT 'Id estado hipotesis',
  `proyecto_id` INT NOT NULL COMMENT 'Id proyecto de investigacion',
  PRIMARY KEY (`id`),
  INDEX `fk_tbl_thipotesis_tbl_tproyecto_investigacion1_idx` (`proyecto_id` ASC))
ENGINE = MyISAM
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8
COMMENT = 'TABLA TRANSACCIONAL DE HIPOTESIS DE PROBLEMAS';


-- -----------------------------------------------------
-- Table `db_sgii`.`tbl_herramienta_proyecto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_sgii`.`tbl_herramienta_proyecto` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT 'Identificador unico',
  `herramienta_id` INT NOT NULL COMMENT 'FK con la tabla therramienta',
  `proyecto_id` INT NOT NULL COMMENT 'FK con la tabla rproyecto',
  PRIMARY KEY (`id`),
  INDEX `fk_tbl_uherramienta_proyecto_tbl_therramienta1_idx` (`herramienta_id` ASC),
  INDEX `fk_tbl_uherramienta_proyecto_tbl_tproyecto_investigacion1_idx` (`proyecto_id` ASC))
ENGINE = MyISAM
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = utf8
COMMENT = 'TABLA UNION HERRAMIENTAS POR PROYECTO';


-- -----------------------------------------------------
-- Table `db_sgii`.`tbl_usuario_proyecto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_sgii`.`tbl_usuario_proyecto` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT 'Identificador unico',
  `usuario_id` INT NOT NULL COMMENT 'FK con la tabla usuario; Equipo de coinvestigadores',
  `proyecto_id` INT NOT NULL COMMENT 'FK con la tabla rproyecto_investigacion',
  PRIMARY KEY (`id`),
  INDEX `fk_tbl_uusario_proyecto_tbl_usuario1_idx` (`usuario_id` ASC),
  INDEX `fk_tbl_uusario_proyecto_tbl_tproyecto_investigacion1_idx` (`proyecto_id` ASC))
ENGINE = MyISAM
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = utf8
COMMENT = 'TABLA DE UNION USUARIO PROYECTO';


-- -----------------------------------------------------
-- Table `db_sgii`.`tbl_usuario_perfil`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_sgii`.`tbl_usuario_perfil` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT 'Identificador unico',
  `usuario_id` INT NOT NULL COMMENT 'FK con la tabla usuario',
  `perfil_id` INT NOT NULL COMMENT 'FK con la tabla perfil',
  PRIMARY KEY (`id`),
  INDEX `fk_tbl_uusuario_perfil_tbl_rusuario1_idx` (`usuario_id` ASC),
  INDEX `fk_tbl_uusuario_perfil_tbl_perfil1_idx` (`perfil_id` ASC))
ENGINE = MyISAM
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = utf8
COMMENT = 'TABLA DE UNION ENTRE PERFILES Y USUARIOS';


-- -----------------------------------------------------
-- Table `db_sgii`.`tbl_perfil_modulo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_sgii`.`tbl_perfil_modulo` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT 'Identificador registro unico',
  `perfil_id` INT NOT NULL COMMENT 'FK con la tabla rperfil',
  `modulo_id` INT NOT NULL COMMENT 'FK con la tabla modulo',
  PRIMARY KEY (`id`),
  INDEX `fk_tbl_rperfil_has_tbl_rmodulo_tbl_rmodulo1_idx` (`modulo_id` ASC),
  INDEX `fk_tbl_rperfil_has_tbl_rmodulo_tbl_rperfil_idx` (`perfil_id` ASC))
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `db_sgii`.`tbl_respuesta_usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_sgii`.`tbl_respuesta_usuario` (
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
    REFERENCES `db_sgii`.`tbl_pregunta` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_respuesta_usuario_tbl_usuario1`
    FOREIGN KEY (`usuario_id`)
    REFERENCES `db_sgii`.`tbl_usuario` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_respuesta_usuario_tbl_respuesta1`
    FOREIGN KEY (`respuesta_id`)
    REFERENCES `db_sgii`.`tbl_respuesta` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
COMMENT = 'TABLA DE ALMACENAMIENTO DE RESPUESTAS DE USUARIO';


-- -----------------------------------------------------
-- Table `db_sgii`.`tbl_usuario_herramienta`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_sgii`.`tbl_usuario_herramienta` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `herramienta_id` INT NOT NULL COMMENT 'id de la herramienta',
  `usuario_id` INT NOT NULL COMMENT 'id del usuario invitado a contestar la herramienta\n',
  `ush_aplico` TINYINT(1) NULL COMMENT 'indica si el usuario ya aplico a la herramienta',
  INDEX `fk_tbl_herramienta_has_tbl_usuario_tbl_usuario1_idx` (`usuario_id` ASC),
  INDEX `fk_tbl_herramienta_has_tbl_usuario_tbl_herramienta1_idx` (`herramienta_id` ASC),
  PRIMARY KEY (`id`))
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COMMENT = 'Tabla para usuarios invitados a aplicar en una herramienta';

USE `db_sgii` ;

-- -----------------------------------------------------
-- procedure SPR_DEL_PERFIL_MODULO
-- -----------------------------------------------------

DELIMITER $$
USE `db_sgii`$$


--
-- Procedimientos
--
CREATE DEFINER=`root`@`127.0.0.1` PROCEDURE `SPR_DEL_PERFIL_MODULO`(IN `PI_PER_NID` BIGINT(20), IN `PI_MOD_NID` BIGINT(20))
    NO SQL
    COMMENT 'Borrar relacion entre perfil y modulo'
DELETE FROM tbl_uperfil_modulo WHERE PER_NID = PI_PER_NID AND MOD_NID = PI_MOD_NID$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure SPR_DEL_USARIO_PROYECTO
-- -----------------------------------------------------

DELIMITER $$
USE `db_sgii`$$


CREATE DEFINER=`root`@`127.0.0.1` PROCEDURE `SPR_DEL_USARIO_PROYECTO`(IN`PI_USU_NID` BIGINT,IN`PI_PRO_NID` BIGINT )
    NO SQL
    COMMENT 'elimina un registro de la tabla usu.proy'
DELETE FROM tbl_uusario_proyecto WHERE USU_NID = PI_USU_NID AND PRO_NID = PI_PRO_NID$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure SPR_DEL_USUARIO_PERFIL_BY_USU
-- -----------------------------------------------------

DELIMITER $$
USE `db_sgii`$$


CREATE DEFINER=`root`@`127.0.0.1` PROCEDURE `SPR_DEL_USUARIO_PERFIL_BY_USU`(IN`PI_USU_NID` BIGINT )
    NO SQL
    COMMENT 'elimina todos los perfiles que tenga un usuario'
DELETE FROM tbl_uusuario_perfil WHERE USU_NID = PI_USU_NID$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure SPR_GET_AUDITORIA_ALL
-- -----------------------------------------------------

DELIMITER $$
USE `db_sgii`$$


CREATE DEFINER=`root`@`localhost` PROCEDURE `SPR_GET_AUDITORIA_ALL`()
    NO SQL
SELECT AUD_NID,AUD_CTABLE,AUD_CCOLUMN,AUD_COLD_VALUE,AUD_CNEW_TABLE,AUD_DDATE_TRANSACTION,USU_NID

FROM tbl_aauditoria$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure SPR_GET_AUDITORIA_ALL_ACTIVE
-- -----------------------------------------------------

DELIMITER $$
USE `db_sgii`$$


CREATE DEFINER=`root`@`localhost` PROCEDURE `SPR_GET_AUDITORIA_ALL_ACTIVE`()
    NO SQL
SELECT AUD_NID,AUD_CTABLE,AUD_CCOLUMN,AUD_COLD_VALUE,AUD_CNEW_TABLE,AUD_DDATE_TRANSACTION,USU_NID

FROM tbl_aauditoria

WHERE AUD_OESTADO = 1$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure SPR_GET_AUDITORIA_BY_ID
-- -----------------------------------------------------

DELIMITER $$
USE `db_sgii`$$


CREATE DEFINER=`root`@`localhost` PROCEDURE `SPR_GET_AUDITORIA_BY_ID`(IN `PI_NID_AUDITORIA` BIGINT)
    NO SQL
SELECT AUD_NID,AUD_CTABLE,AUD_CCOLUMN,AUD_COLD_VALUE,AUD_CNEW_TABLE,AUD_DDATE_TRANSACTION,USU_NID

FROM tbl_aauditoria

WHERE AUD_NID = PI_NID_AUDITORIA$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure SPR_GET_ESTADO_HIPOTESIS_ALL_ACTIVE
-- -----------------------------------------------------

DELIMITER $$
USE `db_sgii`$$


CREATE DEFINER=`root`@`localhost` PROCEDURE `SPR_GET_ESTADO_HIPOTESIS_ALL_ACTIVE`()
    NO SQL
    COMMENT 'selecciona todos los registros con estado de hipotesis activa'
SELECT EHI_NID, EHI_CESTADO_HIPOTESIS, EHI_OESTADO
FROM tbl_restado_hipotesis
WHERE EHI_OESTADO =1$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure SPR_GET_ESTADO_HIPOTESIS_BY_ID
-- -----------------------------------------------------

DELIMITER $$
USE `db_sgii`$$


CREATE DEFINER=`root`@`localhost` PROCEDURE `SPR_GET_ESTADO_HIPOTESIS_BY_ID`(IN`PI_NID_ESTADO_HIPOTESIS` BIGINT )
    NO SQL
    COMMENT 'seleciona el registro con el parametro del id del estado de la h'
SELECT EHI_NID, EHI_CESTADO_HIPOTESIS, EHI_OESTADO
FROM tbl_restado_hipotesis
WHERE EHI_NID = PI_NID_ESTADO_HIPOTESIS$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure SPR_GET_ESTADO_OBJETIVO_ALL
-- -----------------------------------------------------

DELIMITER $$
USE `db_sgii`$$


CREATE DEFINER=`root`@`localhost` PROCEDURE `SPR_GET_ESTADO_OBJETIVO_ALL`()
    NO SQL
    COMMENT 'selecciona todos los registros de tbl estado objetivo'
SELECT EOB_NID, EOB_CESTADO_OBJETIVO, EOB_OESTADO
FROM tbl_restado_objetivo$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure SPR_GET_ESTADO_OBJETIVO_ALL_ACTIVE
-- -----------------------------------------------------

DELIMITER $$
USE `db_sgii`$$


CREATE DEFINER=`root`@`localhost` PROCEDURE `SPR_GET_ESTADO_OBJETIVO_ALL_ACTIVE`()
    NO SQL
    COMMENT 'selecciona todos los registros activos de la tbl estado objetivo'
SELECT EOB_NID, EOB_CESTADO_OBJETIVO, EOB_OESTADO
FROM tbl_restado_objetivo
WHERE EOB_OESTADO =1$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure SPR_GET_ESTADO_OBJETIVO_BY_ID
-- -----------------------------------------------------

DELIMITER $$
USE `db_sgii`$$


CREATE DEFINER=`root`@`localhost` PROCEDURE `SPR_GET_ESTADO_OBJETIVO_BY_ID`(IN`PI_NID_ESTADO_OBJETIVO` BIGINT( 20))
    NO SQL
    COMMENT 'seleciona el registro con el id ingresado'
SELECT EOB_NID, EOB_CESTADO_OBJETIVO, EOB_OESTADO
FROM tbl_restado_objetivo
WHERE EOB_NID = PI_NID_ESTADO_OBJETIVO$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure SPR_GET_ESTADO_PROYECTO_ALL
-- -----------------------------------------------------

DELIMITER $$
USE `db_sgii`$$


CREATE DEFINER=`root`@`localhost` PROCEDURE `SPR_GET_ESTADO_PROYECTO_ALL`()
    NO SQL
    COMMENT 'Slecciona todos los registros de tbl estado proyecto'
SELECT EPR_NID, EPR_CESTADO_PROYECTO, EPR_OESTADO
FROM tbl_restado_proyecto$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure SPR_GET_ESTADO_PROYECTO_ALL_ACTIVE
-- -----------------------------------------------------

DELIMITER $$
USE `db_sgii`$$


CREATE DEFINER=`root`@`localhost` PROCEDURE `SPR_GET_ESTADO_PROYECTO_ALL_ACTIVE`()
    NO SQL
    COMMENT 'selecciona todos los registros con estado de proyecto activa'
SELECT EPR_NID, EPR_CESTADO_PROYECTO, EPR_OESTADO
FROM tbl_restado_proyecto
WHERE EPR_OESTADO =1$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure SPR_GET_ESTADO_PROYECTO_BY_ID
-- -----------------------------------------------------

DELIMITER $$
USE `db_sgii`$$


CREATE DEFINER=`root`@`localhost` PROCEDURE `SPR_GET_ESTADO_PROYECTO_BY_ID`(IN `PI_NID_ESTADO_PROYECTO` BIGINT)
    NO SQL
SELECT EPR_NID,EPR_CESTADO_PROYECTO,EPR_OESTADO

FROM tbl_restado_proyecto

WHERE EPR_NID = PI_NID_ESTADO_PROYECTO$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure SPR_GET_HERRAMIENTA_ALL
-- -----------------------------------------------------

DELIMITER $$
USE `db_sgii`$$


CREATE DEFINER=`root`@`localhost` PROCEDURE `SPR_GET_HERRAMIENTA_ALL`()
    NO SQL
    COMMENT 'selecciona todos los registros de tbl herramientas'
SELECT HER_NID, HER_CNOMBRE_HERRAMIENTA, HER_DFECHA_INICIO, HER_DFECHA_FIN, THE_NID, HER_OESTADO
FROM tbl_therramienta$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure SPR_GET_HERRAMIENTA_ALL_ACTIVE
-- -----------------------------------------------------

DELIMITER $$
USE `db_sgii`$$


CREATE DEFINER=`root`@`localhost` PROCEDURE `SPR_GET_HERRAMIENTA_ALL_ACTIVE`()
    NO SQL
SELECT HER_NID, HER_CNOMBRE_HERRAMIENTA, HER_DFECHA_INICIO, HER_DFECHA_FIN, THE_NID, HER_OESTADO
FROM tbl_therramienta
WHERE HER_OESTADO =1$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure SPR_GET_HERRAMIENTA_BY_ID
-- -----------------------------------------------------

DELIMITER $$
USE `db_sgii`$$


CREATE DEFINER=`root`@`localhost` PROCEDURE `SPR_GET_HERRAMIENTA_BY_ID`(IN`PI_HER_NID` BIGINT )
    NO SQL
    COMMENT 'selecciona un registro por id de la tabla herramienta'
SELECT HER_NID, HER_CNOMBRE_HERRAMIENTA, HER_DFECHA_INICIO, HER_DFECHA_FIN, THE_NID, HER_OESTADO
FROM tbl_therramienta
WHERE HER_NID = PI_HER_NID$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure SPR_GET_HERRAMIENTA_BY_THE
-- -----------------------------------------------------

DELIMITER $$
USE `db_sgii`$$


CREATE DEFINER=`root`@`127.0.0.1` PROCEDURE `SPR_GET_HERRAMIENTA_BY_THE`(IN`PI_THE_NID` BIGINT( 20))
    NO SQL
    COMMENT 'selecciona todos los registros que tengan el mismo tipo de herra'
SELECT HER_NID, HER_CNOMBRE_HERRAMIENTA, HER_DFECHA_INICIO, HER_DFECHA_FIN, THE_NID, HER_OESTADO
FROM tbl_therramienta
WHERE THE_NID = PI_THE_NID$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure SPR_GET_HERRAMIENTA_PROYECTO_ALL
-- -----------------------------------------------------

DELIMITER $$
USE `db_sgii`$$


CREATE DEFINER=`root`@`localhost` PROCEDURE `SPR_GET_HERRAMIENTA_PROYECTO_ALL`()
    NO SQL
    COMMENT 'selecciona todos los registros de la tbl herramienta proyecto'
SELECT UHP_NID, HER_NID, PRO_NID
FROM tbl_uherramienta_proyecto$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure SPR_GET_HERRAMIENTA_PROYECTO_ALL_ACTIVE
-- -----------------------------------------------------

DELIMITER $$
USE `db_sgii`$$


CREATE DEFINER=`root`@`localhost` PROCEDURE `SPR_GET_HERRAMIENTA_PROYECTO_ALL_ACTIVE`()
    NO SQL
SELECT UHP_NID,HER_NID,PRO_NID

FROM tbl_uherramienta_proyecto

WHERE UHP_OESTADO = 1$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure SPR_GET_HERRAMIENTA_PROYECTO_BY_ID
-- -----------------------------------------------------

DELIMITER $$
USE `db_sgii`$$


CREATE DEFINER=`root`@`localhost` PROCEDURE `SPR_GET_HERRAMIENTA_PROYECTO_BY_ID`(IN `PI_NID_HERRAMIENTA_PROYECTO` BIGINT)
    NO SQL
SELECT UHP_NID,HER_NID,PRO_NID

FROM tbl_uherramienta_proyecto

WHERE UHP_NID = PI_NID_HERRAMIENTA_PROYECTO$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure SPR_GET_HERRAMIENTA_PROYECTO_BY_PRO
-- -----------------------------------------------------

DELIMITER $$
USE `db_sgii`$$


CREATE DEFINER=`root`@`127.0.0.1` PROCEDURE `SPR_GET_HERRAMIENTA_PROYECTO_BY_PRO`(IN`PI_PRO_NID` BIGINT( 20))
    NO SQL
    COMMENT 'selecciona un registro de la bl herramienta proyecto'
SELECT UHP_NID, HER_NID, PRO_NID
FROM tbl_uherramienta_proyecto
WHERE PRO_NID = PI_PRO_NID$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure SPR_GET_HIPOTESIS_ALL
-- -----------------------------------------------------

DELIMITER $$
USE `db_sgii`$$


CREATE DEFINER=`root`@`localhost` PROCEDURE `SPR_GET_HIPOTESIS_ALL`()
    NO SQL
    COMMENT 'seleciona todos los registros de la tbl hipotesis'
SELECT HIP_NID, HIP_CHIPOTESIS, HIP_OESTADO, PRO_NID, EHI_NID
FROM tbl_thipotesis$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure SPR_GET_HIPOTESIS_ALL_ACTIVE
-- -----------------------------------------------------

DELIMITER $$
USE `db_sgii`$$


CREATE DEFINER=`root`@`localhost` PROCEDURE `SPR_GET_HIPOTESIS_ALL_ACTIVE`()
    NO SQL
    COMMENT 'selecciona los registros con hipotesis activa'
SELECT HIP_NID, HIP_CHIPOTESIS, HIP_OESTADO, PRO_NID, EHI_NID
FROM tbl_thipotesis
WHERE HIP_OESTADO =1$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure SPR_GET_HIPOTESIS_BY_EHI
-- -----------------------------------------------------

DELIMITER $$
USE `db_sgii`$$


CREATE DEFINER=`root`@`127.0.0.1` PROCEDURE `SPR_GET_HIPOTESIS_BY_EHI`(IN`PI_EHI_NID` BIGINT( 20))
    NO SQL
    COMMENT 'selecciona un registro de la tbl hipotesis por estado hipotesis'
SELECT HIP_NID, HIP_CHIPOTESIS, HIP_OESTADO, PRO_NID, EHI_NID
FROM tbl_thipotesis
WHERE EHI_NID = PI_EHI_NID$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure SPR_GET_HIPOTESIS_BY_ID
-- -----------------------------------------------------

DELIMITER $$
USE `db_sgii`$$


CREATE DEFINER=`root`@`localhost` PROCEDURE `SPR_GET_HIPOTESIS_BY_ID`(IN `PI_NID_HIPOTESIS` BIGINT)
    NO SQL
    COMMENT 'selecciona un registro por id de la tabla hipotesis'
SELECT HIP_NID, HIP_CHIPOTESIS, HIP_OESTADO, PRO_NID, EHI_NID, HIP_CSEGUIMIENTO
FROM tbl_thipotesis
WHERE HIP_NID = PI_NID_HIPOTESIS$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure SPR_GET_HIPOTESIS_BY_PROYECTO
-- -----------------------------------------------------

DELIMITER $$
USE `db_sgii`$$


CREATE DEFINER=`root`@`127.0.0.1` PROCEDURE `SPR_GET_HIPOTESIS_BY_PROYECTO`(IN `PI_NID_PROYECTO` BIGINT(20))
    NO SQL
    COMMENT 'selecciona un registro de la tbl hipotesis por proyecto'
SELECT `HIP_NID`, `HIP_CHIPOTESIS`, `HIP_OESTADO`, HIP.`PRO_NID`, HIP.`EHI_NID` , HIP_CSEGUIMIENTO
FROM `tbl_thipotesis` as HIP inner join
tbl_restado_hipotesis as EHI ON EHI.EHI_NID = HIP.EHI_NID LEFT join
tbl_tproyecto_investigacion as PRO on HIP.PRO_NID = PRO.PRO_NID
where PRO.PRO_NID = PI_NID_PROYECTO
AND EHI_OAPLICA_SEGUIMIENTO = 1$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure SPR_GET_LINEA_INVESTIGACION_ALL
-- -----------------------------------------------------

DELIMITER $$
USE `db_sgii`$$


CREATE DEFINER=`root`@`localhost` PROCEDURE `SPR_GET_LINEA_INVESTIGACION_ALL`()
    NO SQL
    COMMENT 'selecciona todos los registros de la tbl linea de investigacion'
SELECT LIN_NID, LIN_CNOMBRE_INVESTIGACION, LIN_OESTADO
FROM tbl_rlinea_investigacion$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure SPR_GET_LINEA_INVESTIGACION_ALL_ACTIVE
-- -----------------------------------------------------

DELIMITER $$
USE `db_sgii`$$


CREATE DEFINER=`root`@`localhost` PROCEDURE `SPR_GET_LINEA_INVESTIGACION_ALL_ACTIVE`()
    NO SQL
    COMMENT 'selecciona todos los registros de la tbl linea de investigacion '
SELECT LIN_NID, LIN_CNOMBRE_INVESTIGACION, LIN_OESTADO
FROM tbl_rlinea_investigacion
WHERE LIN_OESTADO =1$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure SPR_GET_LINEA_INVESTIGACION_BY_ID
-- -----------------------------------------------------

DELIMITER $$
USE `db_sgii`$$


CREATE DEFINER=`root`@`localhost` PROCEDURE `SPR_GET_LINEA_INVESTIGACION_BY_ID`(IN `PI_NID_LINEA_INVESTIGACION` BIGINT)
    NO SQL
SELECT LIN_NID,LIN_CNOMBRE_INVESTIGACION,LIN_OESTADO

FROM tbl_rlinea_investigacion

WHERE LIN_NID = PI_NID_LINEA_INVESTIGACION$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure SPR_GET_LOG_ALL
-- -----------------------------------------------------

DELIMITER $$
USE `db_sgii`$$


CREATE DEFINER=`root`@`localhost` PROCEDURE `SPR_GET_LOG_ALL`()
    NO SQL
SELECT LOG_NID,LOG_DFECHA,USU_NID,LOG_IP,LOG_HOST

FROM tbl_alog$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure SPR_GET_LOG_ALL_ACTIVE
-- -----------------------------------------------------

DELIMITER $$
USE `db_sgii`$$


CREATE DEFINER=`root`@`localhost` PROCEDURE `SPR_GET_LOG_ALL_ACTIVE`()
    NO SQL
SELECT LOG_NID,LOG_DFECHA,USU_NID,LOG_IP,LOG_HOST

FROM tbl_alog

WHERE LOG_OESTADO = 1$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure SPR_GET_LOG_BY_ID
-- -----------------------------------------------------

DELIMITER $$
USE `db_sgii`$$


CREATE DEFINER=`root`@`localhost` PROCEDURE `SPR_GET_LOG_BY_ID`(IN `PI_NID_LOG` BIGINT)
    NO SQL
SELECT LOG_NID,LOG_DFECHA,USU_NID,LOG_IP,LOG_HOST

FROM tbl_alog

WHERE LOG_NID = PI_NID_LOG$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure SPR_GET_MODULO_ALL
-- -----------------------------------------------------

DELIMITER $$
USE `db_sgii`$$


CREATE DEFINER=`root`@`localhost` PROCEDURE `SPR_GET_MODULO_ALL`()
    NO SQL
SELECT MOD_NID,MOD_CNOMBRE,MOD_OESTADO

FROM tbl_rmodulo$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure SPR_GET_MODULO_ALL_ACTIVE
-- -----------------------------------------------------

DELIMITER $$
USE `db_sgii`$$


CREATE DEFINER=`root`@`localhost` PROCEDURE `SPR_GET_MODULO_ALL_ACTIVE`()
    NO SQL
SELECT MOD_NID,MOD_CNOMBRE,MOD_OESTADO

FROM tbl_rmodulo

WHERE MOD_OESTADO = 1$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure SPR_GET_MODULO_BY_ID
-- -----------------------------------------------------

DELIMITER $$
USE `db_sgii`$$


CREATE DEFINER=`root`@`localhost` PROCEDURE `SPR_GET_MODULO_BY_ID`(IN `PI_NID_MODULO` BIGINT)
    NO SQL
SELECT MOD_NID,MOD_CNOMBRE,MOD_OESTADO

FROM tbl_rmodulo

WHERE MOD_NID = PI_NID_MODULO$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure SPR_GET_OBJETIVO_ALL
-- -----------------------------------------------------

DELIMITER $$
USE `db_sgii`$$


CREATE DEFINER=`root`@`localhost` PROCEDURE `SPR_GET_OBJETIVO_ALL`()
    NO SQL
SELECT OBJ_NID,OBJ_COBJETIVO,OBJ_NID_PADRE,OBJ_OESTADO,PRO_NID,EOB_NID

FROM tbl_robjetivo$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure SPR_GET_OBJETIVO_ALL_ACTIVE
-- -----------------------------------------------------

DELIMITER $$
USE `db_sgii`$$


CREATE DEFINER=`root`@`localhost` PROCEDURE `SPR_GET_OBJETIVO_ALL_ACTIVE`()
    NO SQL
SELECT OBJ_NID,OBJ_COBJETIVO,OBJ_NID_PADRE,OBJ_OESTADO,PRO_NID,EOB_NID

FROM tbl_robjetivo

WHERE OBJ_OESTADO = 1$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure SPR_GET_OBJETIVO_BY_ID
-- -----------------------------------------------------

DELIMITER $$
USE `db_sgii`$$


CREATE DEFINER=`root`@`localhost` PROCEDURE `SPR_GET_OBJETIVO_BY_ID`(IN `PI_NID_OBJETIVO` BIGINT)
    NO SQL
SELECT OBJ_NID,OBJ_COBJETIVO,OBJ_NID_PADRE,OBJ_OESTADO,PRO_NID,EOB_NID

FROM tbl_robjetivo

WHERE OBJ_NID = PI_NID_OBJETIVO$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure SPR_GET_PERFIL_ALL
-- -----------------------------------------------------

DELIMITER $$
USE `db_sgii`$$


CREATE DEFINER=`root`@`localhost` PROCEDURE `SPR_GET_PERFIL_ALL`()
    NO SQL
SELECT PER_NID,PER_CPERFIL,PER_OESTADO

FROM tbl_rperfil$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure SPR_GET_PERFIL_ALL_ACTIVE
-- -----------------------------------------------------

DELIMITER $$
USE `db_sgii`$$


CREATE DEFINER=`root`@`localhost` PROCEDURE `SPR_GET_PERFIL_ALL_ACTIVE`()
    NO SQL
SELECT PER_NID,PER_CPERFIL,PER_OESTADO

FROM tbl_rperfil

WHERE PER_OESTADO = 1$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure SPR_GET_PERFIL_BY_ID
-- -----------------------------------------------------

DELIMITER $$
USE `db_sgii`$$


CREATE DEFINER=`root`@`localhost` PROCEDURE `SPR_GET_PERFIL_BY_ID`(IN `PI_NID_PERFIL` BIGINT)
    NO SQL
SELECT PER_NID,PER_CPERFIL,PER_OESTADO

FROM tbl_rperfil

WHERE PER_NID = PI_NID_PERFIL$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure SPR_GET_PERFIL_MODULO_ALL
-- -----------------------------------------------------

DELIMITER $$
USE `db_sgii`$$


CREATE DEFINER=`root`@`localhost` PROCEDURE `SPR_GET_PERFIL_MODULO_ALL`()
    NO SQL
SELECT UPM_NID,PER_NID,MOD_NID

FROM tbl_uperfil_modulo$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure SPR_GET_PERFIL_MODULO_ALL_ACTIVE
-- -----------------------------------------------------

DELIMITER $$
USE `db_sgii`$$


CREATE DEFINER=`root`@`localhost` PROCEDURE `SPR_GET_PERFIL_MODULO_ALL_ACTIVE`()
    NO SQL
SELECT UPM_NID,PER_NID,MOD_NID

FROM tbl_uperfil_modulo

WHERE UPM_OESTADO = 1$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure SPR_GET_PERFIL_MODULO_BY_ID
-- -----------------------------------------------------

DELIMITER $$
USE `db_sgii`$$


CREATE DEFINER=`root`@`localhost` PROCEDURE `SPR_GET_PERFIL_MODULO_BY_ID`(IN `PI_NID_PERFIL_MODULO` BIGINT)
    NO SQL
SELECT UPM_NID,PER_NID,MOD_NID

FROM tbl_uperfil_modulo

WHERE UPM_NID = PI_NID_PERFIL_MODULO$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure SPR_GET_PREGUNTA_ALL
-- -----------------------------------------------------

DELIMITER $$
USE `db_sgii`$$


CREATE DEFINER=`root`@`localhost` PROCEDURE `SPR_GET_PREGUNTA_ALL`()
    NO SQL
SELECT PRE_NID,PRE_CPREGUNTA,PRE_OOBLIGATORIA,PRE_OESTADO,HER_NID,TPR_NID

FROM tbl_rpregunta$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure SPR_GET_PREGUNTA_ALL_ACTIVE
-- -----------------------------------------------------

DELIMITER $$
USE `db_sgii`$$


CREATE DEFINER=`root`@`localhost` PROCEDURE `SPR_GET_PREGUNTA_ALL_ACTIVE`()
    NO SQL
SELECT PRE_NID,PRE_CPREGUNTA,PRE_OOBLIGATORIA,PRE_OESTADO,HER_NID,TPR_NID

FROM tbl_rpregunta

WHERE PRE_OESTADO = 1$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure SPR_GET_PREGUNTA_BY_ID
-- -----------------------------------------------------

DELIMITER $$
USE `db_sgii`$$


CREATE DEFINER=`root`@`localhost` PROCEDURE `SPR_GET_PREGUNTA_BY_ID`(IN `PI_NID_PREGUNTA` BIGINT)
    NO SQL
SELECT PRE_NID,PRE_CPREGUNTA,PRE_OOBLIGATORIA,PRE_OESTADO,HER_NID,TPR_NID, PRO_OESTADO

FROM tbl_rpregunta

WHERE PRE_NID = PI_NID_PREGUNTA$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure SPR_GET_PROYECTO_BY_USER
-- -----------------------------------------------------

DELIMITER $$
USE `db_sgii`$$


CREATE DEFINER=`root`@`localhost` PROCEDURE `SPR_GET_PROYECTO_BY_USER`(IN `PI_NID_USER` BIGINT)
    NO SQL
SELECT PRO_NID, PRO_CNOMBRE, PRO_CDESCRIPCION, PRO_DFECHA_PROYECTO,
USU_NID, EPR_NID, LIN_NID, TIN_NID
FROM tbl_tproyecto_investigacion
WHERE USU_NID = PI_NID_USER$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure SPR_GET_PROYECTO_BY_USER_ACTIVE
-- -----------------------------------------------------

DELIMITER $$
USE `db_sgii`$$


CREATE DEFINER=`root`@`localhost` PROCEDURE `SPR_GET_PROYECTO_BY_USER_ACTIVE`(IN `PI_NID_USER` BIGINT)
    NO SQL
SELECT PRO_NID, PRO_CNOMBRE, PRO_CDESCRIPCION, PRO_DFECHA_PROYECTO, USU_NID, EPR_NID, LIN_NID, TIN_NID
FROM tbl_tproyecto_investigacion
where USU_NID = PI_NID_USER
and PRO_OESTADO = 1$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure SPR_GET_PROYECTO_BY_USER_ACTIVE_CLOSED
-- -----------------------------------------------------

DELIMITER $$
USE `db_sgii`$$


CREATE DEFINER=`root`@`localhost` PROCEDURE `SPR_GET_PROYECTO_BY_USER_ACTIVE_CLOSED`(IN `PI_NID_USER` BIGINT)
    NO SQL
SELECT PRO_NID, PRO_CNOMBRE, PRO_CDESCRIPCION, PRO_DFECHA_PROYECTO, USU_NID, PRO.EPR_NID, LIN_NID, TIN_NID
FROM tbl_tproyecto_investigacion AS PRO INNER JOIN
tbl_restado_proyecto as EPR on EPR.EPR_NID = PRO.EPR_NID
where USU_NID = 1
and EPR.EPR_ODISPONILBE_CIERRE = 1
and PRO.PRO_OESTADO = 1$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure SPR_GET_PROYECTO_INVESTIGACION_ALL
-- -----------------------------------------------------

DELIMITER $$
USE `db_sgii`$$


CREATE DEFINER=`root`@`localhost` PROCEDURE `SPR_GET_PROYECTO_INVESTIGACION_ALL`()
    NO SQL
SELECT PRO_NID,
PRO_CNOMBRE,
PRO_CDESCRIPCION,
PRO_CPROBLEMA,
PRO_DFECHA_PROYECTO,
USU_NID,
EPR_NID,
LIN_NID,
TIN_NID,
PRO_OESTADO

FROM tbl_tproyecto_investigacion$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure SPR_GET_PROYECTO_INVESTIGACION_ALL_ACTIVE
-- -----------------------------------------------------

DELIMITER $$
USE `db_sgii`$$


CREATE DEFINER=`root`@`localhost` PROCEDURE `SPR_GET_PROYECTO_INVESTIGACION_ALL_ACTIVE`()
    NO SQL
SELECT PRO_NID,PRO_CNOMBRE,PRO_CDESCRIPCION,PRO_CPROBLEMA,PRO_DFECHA_PROYECTO,USU_NID,EPR_NID,LIN_NID,TIN_NID,PRO_OESTADO

FROM tbl_tproyecto_investigacion

WHERE PRO_OESTADO = 1$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure SPR_GET_PROYECTO_INVESTIGACION_BY_ID
-- -----------------------------------------------------

DELIMITER $$
USE `db_sgii`$$


CREATE DEFINER=`root`@`localhost` PROCEDURE `SPR_GET_PROYECTO_INVESTIGACION_BY_ID`(IN `PI_NID_PROYECTO_INVESTIGACION` BIGINT)
    NO SQL
SELECT PRO_NID,PRO_CNOMBRE,PRO_CDESCRIPCION,PRO_CPROBLEMA,PRO_DFECHA_PROYECTO,USU_NID,epr.EPR_CESTADO_PROYECTO,LIN_NID,TIN_NID, PRO_OESTADO
FROM tbl_tproyecto_investigacion as pro inner join
tbl_restado_proyecto as epr on epr.EPR_NID = pro.EPR_NID
WHERE PRO_NID = PI_NID_PROYECTO_INVESTIGACION$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure SPR_GET_RESPUESTA_ALL
-- -----------------------------------------------------

DELIMITER $$
USE `db_sgii`$$


CREATE DEFINER=`root`@`localhost` PROCEDURE `SPR_GET_RESPUESTA_ALL`()
    NO SQL
SELECT RES_NID,RES_CRESPUESTA,RES_OESTADO,PRE_NID

FROM tbl_rrespuesta$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure SPR_GET_RESPUESTA_ALL_ACTIVE
-- -----------------------------------------------------

DELIMITER $$
USE `db_sgii`$$


CREATE DEFINER=`root`@`localhost` PROCEDURE `SPR_GET_RESPUESTA_ALL_ACTIVE`()
    NO SQL
SELECT RES_NID,RES_CRESPUESTA,RES_OESTADO,PRE_NID

FROM tbl_rrespuesta

WHERE RES_OESTADO = 1$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure SPR_GET_RESPUESTA_BY_ID
-- -----------------------------------------------------

DELIMITER $$
USE `db_sgii`$$


CREATE DEFINER=`root`@`localhost` PROCEDURE `SPR_GET_RESPUESTA_BY_ID`(IN `PI_NID_RESPUESTA` BIGINT)
    NO SQL
SELECT RES_NID,RES_CRESPUESTA,RES_OESTADO,PRE_NID

FROM tbl_rrespuesta

WHERE RES_NID = PI_NID_RESPUESTA$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure SPR_GET_RESULTADO_ALL
-- -----------------------------------------------------

DELIMITER $$
USE `db_sgii`$$


CREATE DEFINER=`root`@`localhost` PROCEDURE `SPR_GET_RESULTADO_ALL`()
    NO SQL
SELECT RST_NID,RST_DFECHA,RST_OESTADO,USU_NID,RST_CPREGUNTA_TEXTUAL,RST_CRESPUESTA_TEXTUAL

FROM tbl_tresultado$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure SPR_GET_RESULTADO_ALL_ACTIVE
-- -----------------------------------------------------

DELIMITER $$
USE `db_sgii`$$


CREATE DEFINER=`root`@`localhost` PROCEDURE `SPR_GET_RESULTADO_ALL_ACTIVE`()
    NO SQL
SELECT RST_NID,RST_DFECHA,RST_OESTADO,USU_NID,RST_CPREGUNTA_TEXTUAL,RST_CRESPUESTA_TEXTUAL

FROM tbl_tresultado

WHERE RST_OESTADO = 1$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure SPR_GET_RESULTADO_BY_ID
-- -----------------------------------------------------

DELIMITER $$
USE `db_sgii`$$


CREATE DEFINER=`root`@`localhost` PROCEDURE `SPR_GET_RESULTADO_BY_ID`(IN `PI_NID_RESULTADO` BIGINT)
    NO SQL
SELECT RST_NID,RST_DFECHA,RST_OESTADO,USU_NID,RST_CPREGUNTA_TEXTUAL,RST_CRESPUESTA_TEXTUAL

FROM tbl_tresultado

WHERE RST_NID = PI_NID_RESULTADO$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure SPR_GET_TIPO_HERRAMIENTA_ALL
-- -----------------------------------------------------

DELIMITER $$
USE `db_sgii`$$


CREATE DEFINER=`root`@`localhost` PROCEDURE `SPR_GET_TIPO_HERRAMIENTA_ALL`()
    NO SQL
SELECT THE_NID,THE_CNOMBRE_HERRAMIENTA,THE_OESTADO

FROM tbl_rtipo_herramienta$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure SPR_GET_TIPO_HERRAMIENTA_ALL_ACTIVE
-- -----------------------------------------------------

DELIMITER $$
USE `db_sgii`$$


CREATE DEFINER=`root`@`localhost` PROCEDURE `SPR_GET_TIPO_HERRAMIENTA_ALL_ACTIVE`()
    NO SQL
SELECT THE_NID,THE_CNOMBRE_HERRAMIENTA,THE_OESTADO

FROM tbl_rtipo_herramienta

WHERE THE_OESTADO = 1$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure SPR_GET_TIPO_HERRAMIENTA_BY_ID
-- -----------------------------------------------------

DELIMITER $$
USE `db_sgii`$$


CREATE DEFINER=`root`@`localhost` PROCEDURE `SPR_GET_TIPO_HERRAMIENTA_BY_ID`(IN `PI_NID_TIPO_HERRAMIENTA` BIGINT)
    NO SQL
SELECT THE_NID,THE_CNOMBRE_HERRAMIENTA,THE_OESTADO

FROM tbl_rtipo_herramienta

WHERE THE_NID = PI_NID_TIPO_HERRAMIENTA$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure SPR_GET_TIPO_INVESTIGACION_ALL
-- -----------------------------------------------------

DELIMITER $$
USE `db_sgii`$$


CREATE DEFINER=`root`@`localhost` PROCEDURE `SPR_GET_TIPO_INVESTIGACION_ALL`()
    NO SQL
    COMMENT 'Selecciona todos los registros de tbl tipo investigación'
SELECT TIN_NID, TIN_CNOMBRE_TIPO, TIN_OESTADO
FROM tbl_rtipo_investigacion$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure SPR_GET_TIPO_INVESTIGACION_ALL_ACTIVE
-- -----------------------------------------------------

DELIMITER $$
USE `db_sgii`$$


CREATE DEFINER=`root`@`localhost` PROCEDURE `SPR_GET_TIPO_INVESTIGACION_ALL_ACTIVE`()
    NO SQL
    COMMENT 'selecciona todos los registros activos de la tbl tipo inves.'
SELECT TIN_NID, TIN_CNOMBRE_TIPO, TIN_OESTADO
FROM tbl_rtipo_investigacion
WHERE TIN_OESTADO =1$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure SPR_GET_TIPO_INVESTIGACION_BY_ID
-- -----------------------------------------------------

DELIMITER $$
USE `db_sgii`$$


CREATE DEFINER=`root`@`localhost` PROCEDURE `SPR_GET_TIPO_INVESTIGACION_BY_ID`(IN`PI_TIN_NID` BIGINT )
    NO SQL
    COMMENT 'seleciona el registro con el parametro del id de tipo inves.'
SELECT TIN_NID, TIN_CNOMBRE_TIPO, TIN_OESTADO
FROM tbl_rtipo_investigacion
WHERE TIN_NID = PI_TIN_NID$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure SPR_GET_TIPO_PREGUNTA_ALL
-- -----------------------------------------------------

DELIMITER $$
USE `db_sgii`$$


CREATE DEFINER=`root`@`localhost` PROCEDURE `SPR_GET_TIPO_PREGUNTA_ALL`()
    NO SQL
    COMMENT 'Selecciona todos los registros de la tbl tipo pregunta'
SELECT TPR_NID, TPR_CTIPO_PREGUNTA, TPR_OESTADO
FROM tbl_rtipo_pregunta$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure SPR_GET_TIPO_PREGUNTA_ALL_ACTIVE
-- -----------------------------------------------------

DELIMITER $$
USE `db_sgii`$$


CREATE DEFINER=`root`@`localhost` PROCEDURE `SPR_GET_TIPO_PREGUNTA_ALL_ACTIVE`()
    NO SQL
    COMMENT 'selecciona todos los tipos de pregunta activos'
SELECT TPR_NID, TPR_CTIPO_PREGUNTA, TPR_OESTADO
FROM tbl_rtipo_pregunta
WHERE TPR_OESTADO =1$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure SPR_GET_TIPO_PREGUNTA_BY_ID
-- -----------------------------------------------------

DELIMITER $$
USE `db_sgii`$$


CREATE DEFINER=`root`@`localhost` PROCEDURE `SPR_GET_TIPO_PREGUNTA_BY_ID`(IN`PI_NID_TIPO_PREGUNTA` BIGINT )
    NO SQL
    COMMENT 'selecciona un registro de la tbl por id de tipo investigación'
SELECT TPR_NID, TPR_CTIPO_PREGUNTA, TPR_OESTADO
FROM tbl_rtipo_pregunta
WHERE TPR_NID = PI_NID_TIPO_PREGUNTA$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure SPR_GET_USARIO_PROYECTO_ALL
-- -----------------------------------------------------

DELIMITER $$
USE `db_sgii`$$


CREATE DEFINER=`root`@`localhost` PROCEDURE `SPR_GET_USARIO_PROYECTO_ALL`()
    NO SQL
    COMMENT 'Selecciona todos los registros de la tbl usuario proyecto'
SELECT UUI_NID, USU_NID, PRO_NID
FROM tbl_uusario_proyecto$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure SPR_GET_USARIO_PROYECTO_ALL_ACTIVE
-- -----------------------------------------------------

DELIMITER $$
USE `db_sgii`$$


CREATE DEFINER=`root`@`localhost` PROCEDURE `SPR_GET_USARIO_PROYECTO_ALL_ACTIVE`()
    NO SQL
SELECT UUI_NID,USU_NID,PRO_NID

FROM tbl_uusario_proyecto

WHERE UUI_OESTADO = 1$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure SPR_GET_USARIO_PROYECTO_BY_PRO
-- -----------------------------------------------------

DELIMITER $$
USE `db_sgii`$$


CREATE DEFINER=`root`@`localhost` PROCEDURE `SPR_GET_USARIO_PROYECTO_BY_PRO`(IN`PI_PRO_NID` BIGINT )
    NO SQL
    COMMENT 'selecciona todos los usuario de un proyecto'
SELECT UUI_NID, USU_NID, PRO_NID
FROM tbl_uusario_proyecto
WHERE PRO_NID = PI_PRO_NID$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure SPR_GET_USARIO_PROYECTO_BY_USU
-- -----------------------------------------------------

DELIMITER $$
USE `db_sgii`$$


CREATE DEFINER=`root`@`127.0.0.1` PROCEDURE `SPR_GET_USARIO_PROYECTO_BY_USU`(IN`PI_USU_NID` BIGINT )
    NO SQL
    COMMENT 'seleciona todos los proyectos de un susuario'
SELECT UUI_NID, USU_NID, PRO_NID
FROM tbl_uusario_proyecto
WHERE USU_NID = PI_USU_NID$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure SPR_GET_USARIO_PROYECTO_EXIST
-- -----------------------------------------------------

DELIMITER $$
USE `db_sgii`$$


CREATE DEFINER=`root`@`127.0.0.1` PROCEDURE `SPR_GET_USARIO_PROYECTO_EXIST`(IN`PI_USU_NID` BIGINT,IN`PI_PRO_NID` BIGINT )
    NO SQL
    COMMENT 'Selecciona el id de la tabla usu.proy si existen los datos'
SELECT UUI_NID
FROM tbl_uusario_proyecto
WHERE USU_NID = PI_USU_NID
AND PRO_NID = PI_PRO_NID$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure SPR_GET_USUARIO_ALL
-- -----------------------------------------------------

DELIMITER $$
USE `db_sgii`$$


CREATE DEFINER=`root`@`localhost` PROCEDURE `SPR_GET_USUARIO_ALL`()
    NO SQL
    COMMENT 'Selecciona todos los registros de la tbl usuario'
SELECT USU_NID, USU_CCEDULA, USU_CNOMBRE, USU_NID_HOMOLOGO, USU_DFECHA_CREA, USU_CLOG, USU_CPASSWORD, USU_OESTADO
FROM tbl_rusuario$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure SPR_GET_USUARIO_ALL_ACTIVE
-- -----------------------------------------------------

DELIMITER $$
USE `db_sgii`$$


CREATE DEFINER=`root`@`localhost` PROCEDURE `SPR_GET_USUARIO_ALL_ACTIVE`()
    NO SQL
    COMMENT 'selecciona todos los usuarios activos'
SELECT USU_NID, USU_CCEDULA, USU_CNOMBRE, USU_NID_HOMOLOGO, USU_DFECHA_CREA, USU_CLOG, USU_CPASSWORD, USU_OESTADO
FROM tbl_rusuario
WHERE USU_OESTADO =1$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure SPR_GET_USUARIO_BY_ID
-- -----------------------------------------------------

DELIMITER $$
USE `db_sgii`$$


CREATE DEFINER=`root`@`localhost` PROCEDURE `SPR_GET_USUARIO_BY_ID`(IN`PI_NID_USUARIO` BIGINT )
    NO SQL
    COMMENT 'selecciona un usuaario por id'
SELECT USU_NID, USU_CCEDULA, USU_CNOMBRE, USU_NID_HOMOLOGO, USU_DFECHA_CREA, USU_CLOG, USU_CPASSWORD, USU_OESTADO
FROM tbl_rusuario
WHERE USU_NID = PI_NID_USUARIO$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure SPR_GET_USUARIO_BY_LOG
-- -----------------------------------------------------

DELIMITER $$
USE `db_sgii`$$


CREATE DEFINER=`root`@`127.0.0.1` PROCEDURE `SPR_GET_USUARIO_BY_LOG`(IN`PI_CLOG` VARCHAR( 250) ,IN`PI_CPASSWORD` VARCHAR( 250))
    NO SQL
    COMMENT 'Procedimiento de autenticación de usuario'
SELECT USU_NID
FROM tbl_rusuario
WHERE USU_CLOG = PI_CLOG
AND USU_CPASSWORD = PI_CPASSWORD$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure SPR_GET_USUARIO_PERFIL_ALL
-- -----------------------------------------------------

DELIMITER $$
USE `db_sgii`$$


CREATE DEFINER=`root`@`localhost` PROCEDURE `SPR_GET_USUARIO_PERFIL_ALL`()
    NO SQL
    COMMENT 'selecciona todas las uniones de usuarui y perfil'
SELECT UUP_NID, USU_NID, PER_NID
FROM tbl_uusuario_perfil$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure SPR_GET_USUARIO_PERFIL_ALL_ACTIVE
-- -----------------------------------------------------

DELIMITER $$
USE `db_sgii`$$


CREATE DEFINER=`root`@`localhost` PROCEDURE `SPR_GET_USUARIO_PERFIL_ALL_ACTIVE`()
    NO SQL
SELECT UUP_NID,USU_NID,PER_NID

FROM tbl_uusuario_perfil

WHERE UUP_OESTADO = 1$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure SPR_GET_USUARIO_PERFIL_BY_PER
-- -----------------------------------------------------

DELIMITER $$
USE `db_sgii`$$


CREATE DEFINER=`root`@`localhost` PROCEDURE `SPR_GET_USUARIO_PERFIL_BY_PER`(IN`PI_PER_NID` BIGINT )
    NO SQL
    COMMENT 'selecciona los registros que tengan el mismo perfil de entrada'
SELECT UUP_NID, USU_NID, PER_NID
FROM tbl_uusuario_perfil
WHERE PER_NID = PI_PER_NID$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure SPR_GET_USUARIO_PERFIL_BY_USU
-- -----------------------------------------------------

DELIMITER $$
USE `db_sgii`$$


CREATE DEFINER=`root`@`127.0.0.1` PROCEDURE `SPR_GET_USUARIO_PERFIL_BY_USU`(IN`PI_USU_NID` BIGINT )
    NO SQL
    COMMENT 'selecciona los registros de la tbl usu.perf. por el id usuario'
SELECT UUP_NID, USU_NID, PER_NID
FROM tbl_uusuario_perfil
WHERE USU_NID = PI_USU_NID$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure SPR_INS_ESTADO_HIPOTESIS
-- -----------------------------------------------------

DELIMITER $$
USE `db_sgii`$$


CREATE DEFINER=`root`@`localhost` PROCEDURE `SPR_INS_ESTADO_HIPOTESIS`(IN`PI_EHI_CESTADO_HIPOTESIS` VARCHAR( 250) ,IN`PI_EHI_OESTADO` BOOLEAN )
    NO SQL
    COMMENT 'inserta un registro en la tabla estado hipotesis'
INSERT INTO  tbl_restado_hipotesis(
EHI_CESTADO_HIPOTESIS,
EHI_OESTADO
)
VALUES (
PI_EHI_CESTADO_HIPOTESIS, PI_EHI_OESTADO
)$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure SPR_INS_ESTADO_OBJETIVO
-- -----------------------------------------------------

DELIMITER $$
USE `db_sgii`$$


CREATE DEFINER=`root`@`localhost` PROCEDURE `SPR_INS_ESTADO_OBJETIVO`(IN`PI_CESTADO_OBJETIVO` VARCHAR( 250) ,IN`PI_EOB_OESTADO` TINYINT( 1))
    NO SQL
    COMMENT 'inserta un registro en la tabla estado objetivo'
INSERT INTO  tbl_restado_objetivo(
EOB_CESTADO_OBJETIVO,
EOB_OESTADO
)
VALUES (
PI_CESTADO_OBJETIVO, PI_EOB_OESTADO
)$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure SPR_INS_ESTADO_PROYECTO
-- -----------------------------------------------------

DELIMITER $$
USE `db_sgii`$$


CREATE DEFINER=`root`@`127.0.0.1` PROCEDURE `SPR_INS_ESTADO_PROYECTO`(IN`PI_EPR_CESTADO_PROYECTO` VARCHAR( 250) ,IN`PI_EPR_OESTADO` TINYINT( 1))
    NO SQL
    COMMENT 'inserta un registro en la tabla estado proyecto'
INSERT INTO  tbl_restado_proyecto(
EPR_CESTADO_PROYECTO,
EPR_OESTADO
)
VALUES (
PI_EPR_CESTADO_PROYECTO, PI_EPR_OESTADO
)$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure SPR_INS_HERRAMIENTA
-- -----------------------------------------------------

DELIMITER $$
USE `db_sgii`$$


CREATE DEFINER=`root`@`localhost` PROCEDURE `SPR_INS_HERRAMIENTA`(IN`PI_HER_CNOMBRE_HERRAMIENTA` VARCHAR( 250) ,IN`PI_ER_DFECHA_INICIO` DATETIME,IN`PI_HER_DFECHA_FIN` DATETIME,IN`PI_THE_NID` BIGINT( 20) ,IN`PI_HER_OESTADO` TINYINT( 1))
    NO SQL
    COMMENT 'inserta un registro en la tabla herramienta'
INSERT INTO  tbl_therramienta(
HER_CNOMBRE_HERRAMIENTA,
HER_DFECHA_INICIO,
HER_DFECHA_FIN,
THE_NID,
HER_OESTADO
)
VALUES (
PI_HER_CNOMBRE_HERRAMIENTA, PI_ER_DFECHA_INICIO, PI_HER_DFECHA_FIN, PI_THE_NID, PI_HER_OESTADO
)$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure SPR_INS_HIPOTESIS
-- -----------------------------------------------------

DELIMITER $$
USE `db_sgii`$$


CREATE DEFINER=`root`@`127.0.0.1` PROCEDURE `SPR_INS_HIPOTESIS`(IN`PI_HIP_CHIPOTESIS` VARCHAR( 250) ,IN`PI_HIP_OESTADO` TINYINT( 1) ,IN`PI_PRO_NID` BIGINT( 20) ,IN`PI_EHI_NID` BIGINT( 20))
    NO SQL
    COMMENT 'inserta registros en la tbl hipotesis'
INSERT INTO  tbl_thipotesis(
HIP_CHIPOTESIS,
HIP_OESTADO,
PRO_NID,
EHI_NID
)
VALUES (
PI_HIP_CHIPOTESIS, PI_HIP_OESTADO, PI_PRO_NID, PI_EHI_NID
)$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure SPR_INS_LINEA_INVESTIGACION
-- -----------------------------------------------------

DELIMITER $$
USE `db_sgii`$$


CREATE DEFINER=`root`@`127.0.0.1` PROCEDURE `SPR_INS_LINEA_INVESTIGACION`(IN`PI_LIN_CNOMBRE_INVESTIGACION` VARCHAR( 250) ,IN`PI_LIN_OESTADO` TINYINT( 1))
    NO SQL
    COMMENT 'inserta un registro en la tbl linea de investigacion'
INSERT INTO  tbl_rlinea_investigacion(
LIN_CNOMBRE_INVESTIGACION,
LIN_OESTADO
)
VALUES (
PI_LIN_CNOMBRE_INVESTIGACION, PI_LIN_OESTADO
)$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure SPR_INS_LOG
-- -----------------------------------------------------

DELIMITER $$
USE `db_sgii`$$


CREATE DEFINER=`root`@`127.0.0.1` PROCEDURE `SPR_INS_LOG`( IN  `PI_USU_NID_LOG` BIGINT( 20 ) , IN  `PI_IP_LOG` VARCHAR( 50 ) , IN  `PI_HOST_LOG` VARCHAR( 50 ) )
    NO SQL
    COMMENT 'Inserta nuevo logeo'
INSERT INTO tbl_alog( LOG_NID, LOG_DFECHA, USU_NID, LOG_IP, LOG_HOST ) 
VALUES (
NULL , NOW( ) , PI_USU_NID_LOG, PI_IP_LOG, PI_HOST_LOG
)$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure SPR_INS_MODULO
-- -----------------------------------------------------

DELIMITER $$
USE `db_sgii`$$


CREATE DEFINER=`root`@`127.0.0.1` PROCEDURE `SPR_INS_MODULO`( IN  `PI_CNOMBRE_MOD` VARCHAR( 255 ) , IN  `PI_OESTADO_MOD` TINYINT( 6 ) )
    NO SQL
    COMMENT 'Inserta un nuevo modulo'
INSERT INTO tbl_rmodulo( MOD_NID, MOD_CNOMBRE, MOD_OESTADO ) 
VALUES (
NULL , PI_CNOMBRE_MOD, PI_OESTADO_MOD
)$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure SPR_INS_OBJETIVO
-- -----------------------------------------------------

DELIMITER $$
USE `db_sgii`$$


CREATE DEFINER=`root`@`127.0.0.1` PROCEDURE `SPR_INS_OBJETIVO`( IN  `PI_COBJETIVO` VARCHAR( 250 ) , IN  `PI_NID_PADRE` BIGINT( 20 ) , IN  `PI_OESTADO` TINYINT( 1 ) , IN  `PI_PRO_NID` BIGINT( 20 ) , IN  `PI_EOB_NID` BIGINT( 20 ) )
    NO SQL
    COMMENT 'Insertar nuevo objetivo'
INSERT INTO tbl_robjetivo( OBJ_NID, OBJ_COBJETIVO, OBJ_NID_PADRE, OBJ_OESTADO, PRO_NID, EOB_NID ) 
VALUES (
NULL , PI_COBJETIVO, PI_NID_PADRE, PI_OESTADO, PI_PRO_NID, PI_EOB_NID
)$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure SPR_INS_PERFIL
-- -----------------------------------------------------

DELIMITER $$
USE `db_sgii`$$


CREATE DEFINER=`root`@`127.0.0.1` PROCEDURE `SPR_INS_PERFIL`( IN  `PI_CPERFIL_PERFIL` VARCHAR( 250 ) , IN  `PI_OESTADO_PERFIL` TINYINT( 1 ) )
    NO SQL
    COMMENT 'Inserta un nuevo perfil en la tabla con este nombre'
INSERT INTO tbl_rperfil( PER_NID, PER_CPERFIL, PER_OESTADO ) 
VALUES (
NULL , PI_CPERFIL_PERFIL, PI_OESTADO_PERFIL
)$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure SPR_INS_PERFIL_MODULO
-- -----------------------------------------------------

DELIMITER $$
USE `db_sgii`$$


CREATE DEFINER=`root`@`127.0.0.1` PROCEDURE `SPR_INS_PERFIL_MODULO`( IN  `PI_PER_NID` BIGINT( 20 ) , IN  `PI_MOD_NID` BIGINT( 20 ) )
    NO SQL
    COMMENT 'Crea una nueva relacion entre el perfil y el modulo'
INSERT INTO tbl_uperfil_modulo( UPM_NID, PER_NID, MOD_NID ) 
VALUES (
NULL , PI_PER_NID, PI_MOD_NID
)$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure SPR_INS_PREGUNTA
-- -----------------------------------------------------

DELIMITER $$
USE `db_sgii`$$


CREATE DEFINER=`root`@`127.0.0.1` PROCEDURE `SPR_INS_PREGUNTA`( IN  `PI_CPREGUNTA` VARCHAR( 250 ) , IN  `PI_OOBLIGATORIA` TINYINT( 1 ) , IN  `PI_OESTADO` TINYINT( 1 ) , IN  `PI_HER_NID` BIGINT( 20 ) , IN  `PI_TPR_NID` BIGINT( 20 ) )
    NO SQL
    COMMENT 'Inserta una nueva pregunta '
INSERT INTO tbl_rpregunta( PRE_NID, PRE_CPREGUNTA, PRE_OOBLIGATORIA, PRE_OESTADO, HER_NID, TPR_NID ) 
VALUES (
NULL , PI_CPREGUNTA, PI_OOBLIGATORIA, PI_OESTADO, PI_HER_NID, PI_TPR_NID
)$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure SPR_INS_PROYECTO
-- -----------------------------------------------------

DELIMITER $$
USE `db_sgii`$$


CREATE DEFINER=`root`@`127.0.0.1` PROCEDURE `SPR_INS_PROYECTO`(IN `PI_CNOMBRE` VARCHAR(250), IN `PI_CDESCRIPCION` VARCHAR(2500), IN `PI_CPROBLEMA` VARCHAR(500), IN `PI_NID_USU` BIGINT, IN `PI_NID_EPR` BIGINT, IN `PI_NID_LIN` BIGINT, IN `PI_NID_TIN` BIGINT)
    NO SQL
    COMMENT 'PROCESO DE INSERTA DE PROYECTOS'
INSERT INTO tbl_tproyecto_investigacion 
    (PRO_CNOMBRE,
    PRO_CDESCRIPCION, 
    PRO_CPROBLEMA, 
    PRO_DFECHA_PROYECTO,
    USU_NID, 
    EPR_NID, 
    LIN_NID , 
    TIN_NID,
    PRO_OESTADO) 
values ( 
    PI_CNOMBRE, 
    PI_CDESCRIPCION, 
    PI_CPROBLEMA,
    CURRENT_TIMESTAMP( ), 
    PI_NID_USU, 
    PI_NID_EPR,
    PI_NID_LIN,
    PI_NID_TIN,
    1)$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure SPR_INS_RESPUESTA
-- -----------------------------------------------------

DELIMITER $$
USE `db_sgii`$$


CREATE DEFINER=`root`@`127.0.0.1` PROCEDURE `SPR_INS_RESPUESTA`( IN  `PI_CRESPUESTA` VARCHAR( 250 ) , IN  `PI_OESTADO` TINYINT( 1 ) , IN  `PI_PRE_NID` BIGINT( 20 ) )
    NO SQL
    COMMENT 'INSERTAR RESPUESTA'
INSERT INTO tbl_rrespuesta( RES_NID, RES_CRESPUESTA, RES_OESTADO, PRE_NID ) 
VALUES (
NULL , PI_CRESPUESTA, PI_OESTADO, PI_PRE_NID
)$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure SPR_INS_RESULTADO
-- -----------------------------------------------------

DELIMITER $$
USE `db_sgii`$$


CREATE DEFINER=`root`@`127.0.0.1` PROCEDURE `SPR_INS_RESULTADO`( IN  `PI_OESTADO` TINYINT( 1 ) , IN  `PI_USU_NID` BIGINT( 20 ) , IN  `PI_CPREGUNTA_TEXTUAL` VARCHAR( 2500 ) , IN `PI_CRESPUESTA_TEXTUAL` VARCHAR( 2500 ) )
    NO SQL
    COMMENT 'INSERTAR RESULTADO'
INSERT INTO tbl_tresultado( RST_NID, RST_DFECHA, RST_OESTADO, USU_NID, RST_CPREGUNTA_TEXTUAL, RST_CRESPUESTA_TEXTUAL ) 
VALUES (
NULL , NOW( ) , PI_OESTADO, PI_USU_NID, PI_CPREGUNTA_TEXTUAL, PI_CRESPUESTA_TEXTUAL
)$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure SPR_INS_TIPO_INVESTIGACION
-- -----------------------------------------------------

DELIMITER $$
USE `db_sgii`$$


CREATE DEFINER=`root`@`127.0.0.1` PROCEDURE `SPR_INS_TIPO_INVESTIGACION`(IN`PI_TIN_CNOMBRE_TIPO` VARCHAR( 250) ,IN`PI_TIN_OESTADO` TINYINT( 1))
    NO SQL
    COMMENT 'inserta registros en la tbl tipo investigación'
INSERT INTO  tbl_rtipo_investigacion(
TIN_CNOMBRE_TIPO,
TIN_OESTADO
)
VALUES (
PI_TIN_CNOMBRE_TIPO, PI_TIN_OESTADO
)$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure SPR_INS_TIPO_PREGUNTA
-- -----------------------------------------------------

DELIMITER $$
USE `db_sgii`$$


CREATE DEFINER=`root`@`127.0.0.1` PROCEDURE `SPR_INS_TIPO_PREGUNTA`(IN`PI_TPR_CTIPO_PREGUNTA` VARCHAR( 250) ,IN`PI_TPR_OESTADO` TINYINT( 1))
    NO SQL
    COMMENT 'inserta registros en la tbl tipo pregunta'
INSERT INTO  tbl_rtipo_pregunta(
TPR_CTIPO_PREGUNTA,
TPR_OESTADO
)
VALUES (
PI_TPR_CTIPO_PREGUNTA, PI_TPR_OESTADO
)$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure SPR_INS_USARIO_PROYECTO
-- -----------------------------------------------------

DELIMITER $$
USE `db_sgii`$$


CREATE DEFINER=`root`@`127.0.0.1` PROCEDURE `SPR_INS_USARIO_PROYECTO`(IN`PI_USU_NID` BIGINT,IN`PI_PRO_NID` BIGINT )
    NO SQL
    COMMENT 'Inserta registro en la tabla de union de usuario con proyecto'
INSERT INTO  tbl_uusario_proyecto(
USU_NID,
PRO_NID
)
VALUES (
PI_USU_NID, PI_PRO_NID
)$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure SPR_INS_USUARIO
-- -----------------------------------------------------

DELIMITER $$
USE `db_sgii`$$


CREATE DEFINER=`root`@`127.0.0.1` PROCEDURE `SPR_INS_USUARIO`(IN`PI_USU_CCEDULA` VARCHAR( 20) ,IN`PI_USU_CNOMBRE` VARCHAR( 250) ,IN`PI_USU_NID_HOMOLOGO` BIGINT,IN`PI_USU_CLOG` VARCHAR( 250) ,IN`PI_USU_CPASSWORD` VARCHAR( 250) ,IN`PI_USU_OESTADO` TINYINT( 1))
    NO SQL
    COMMENT 'inserta un registro en la tabla usuarios'
INSERT INTO  tbl_rusuario(
USU_CCEDULA,
USU_CNOMBRE,
USU_NID_HOMOLOGO,
USU_DFECHA_CREA,
USU_CLOG,
USU_CPASSWORD,
USU_OESTADO
)
VALUES (
PI_USU_CCEDULA, PI_USU_CNOMBRE, PI_USU_NID_HOMOLOGO, CURRENT_TIMESTAMP() , PI_USU_CLOG, PI_USU_CPASSWORD, PI_USU_OESTADO
)$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure SPR_INS_USUARIO_PERFIL
-- -----------------------------------------------------

DELIMITER $$
USE `db_sgii`$$


CREATE DEFINER=`root`@`127.0.0.1` PROCEDURE `SPR_INS_USUARIO_PERFIL`(IN`PI_USU_NID` BIGINT,IN`PI_PER_NID` BIGINT )
    NO SQL
    COMMENT 'inserta un registro en la tbl uusuarioperfil'
INSERT INTO  tbl_uusuario_perfil(
USU_NID,
PER_NID
)
VALUES (
PI_USU_NID, PI_PER_NID
)$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure SPR_UPD_ESTADO_HIPOTESIS
-- -----------------------------------------------------

DELIMITER $$
USE `db_sgii`$$


CREATE DEFINER=`root`@`localhost` PROCEDURE `SPR_UPD_ESTADO_HIPOTESIS`(IN`PI_EHI_NID` BIGINT( 20) ,IN`PI_EHI_CESTADO_HIPOTESIS` VARCHAR( 250) ,IN`PI_EHI_OESTADO` TINYINT( 1))
    NO SQL
    COMMENT 'acipotesistualiza un registro en la tabla estado h'
UPDATE tbl_restado_hipotesis SET EHI_CESTADO_HIPOTESIS = IFNULL( PI_EHI_CESTADO_HIPOTESIS, EHI_CESTADO_HIPOTESIS ) ,
EHI_OESTADO = IFNULL( PI_EHI_OESTADO, EHI_OESTADO ) WHERE EHI_NID = PI_EHI_NID$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure SPR_UPD_ESTADO_HIPOTESIS_ACT_INA
-- -----------------------------------------------------

DELIMITER $$
USE `db_sgii`$$


CREATE DEFINER=`root`@`localhost` PROCEDURE `SPR_UPD_ESTADO_HIPOTESIS_ACT_INA`(IN`PI_EHI_NID` BIGINT( 20) ,IN`PI_EHI_OESTADO` TINYINT( 1))
    NO SQL
    COMMENT 'cambia el estado de un registro de la tabla estado hipotesis'
UPDATE tbl_restado_hipotesis SET EHI_OESTADO = PI_EHI_OESTADO WHERE EHI_NID = PI_EHI_NID$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure SPR_UPD_ESTADO_OBJETIVO
-- -----------------------------------------------------

DELIMITER $$
USE `db_sgii`$$


CREATE DEFINER=`root`@`localhost` PROCEDURE `SPR_UPD_ESTADO_OBJETIVO`(IN`PI_EOB_NID` BIGINT( 20) ,IN`PI_EOB_CESTADO_OBJETIVO` VARCHAR( 250) ,IN`PI_EOB_OESTADO` TINYINT( 1))
    NO SQL
    COMMENT 'modifica el estado de un registro de la tabla estado objetivo'
UPDATE tbl_restado_objetivo SET EOB_CESTADO_OBJETIVO = IFNULL( PI_EOB_CESTADO_OBJETIVO, EOB_CESTADO_OBJETIVO ) ,
EOB_OESTADO = IFNULL( PI_EOB_OESTADO, EOB_OESTADO ) WHERE EOB_NID = PI_EOB_NID$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure SPR_UPD_ESTADO_OBJETIVO_ACT_INA
-- -----------------------------------------------------

DELIMITER $$
USE `db_sgii`$$


CREATE DEFINER=`root`@`127.0.0.1` PROCEDURE `SPR_UPD_ESTADO_OBJETIVO_ACT_INA`(IN`PI_EOB_NID` BIGINT,IN`PI_EOB_OESTADO` TINYINT( 1))
    NO SQL
    COMMENT 'cambia el estado de un registro de la tabla estado objetivo'
UPDATE tbl_restado_objetivo SET EOB_OESTADO = PI_EOB_OESTADO WHERE EOB_NID = PI_EOB_NID$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure SPR_UPD_ESTADO_PROYECTO
-- -----------------------------------------------------

DELIMITER $$
USE `db_sgii`$$


CREATE DEFINER=`root`@`127.0.0.1` PROCEDURE `SPR_UPD_ESTADO_PROYECTO`(IN`PI_EPR_NID` BIGINT,IN`PI_EPR_CESTADO_PROYECTO` VARCHAR( 250) ,IN`PI_EPR_OESTADO` TINYINT( 1))
    NO SQL
    COMMENT 'modifica el estado de un registro de la tabla estado proyecto'
UPDATE tbl_restado_proyecto SET EPR_CESTADO_PROYECTO = IFNULL( PI_EPR_CESTADO_PROYECTO, EPR_CESTADO_PROYECTO ) ,
EPR_OESTADO = IFNULL( PI_EPR_OESTADO, EPR_OESTADO ) WHERE EPR_NID = PI_EPR_NID$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure SPR_UPD_ESTADO_PROYECTO_ACT_INA
-- -----------------------------------------------------

DELIMITER $$
USE `db_sgii`$$


CREATE DEFINER=`root`@`127.0.0.1` PROCEDURE `SPR_UPD_ESTADO_PROYECTO_ACT_INA`(IN`PI_EPR_NID` BIGINT,IN`PI_EPR_OESTADO` TINYINT( 1))
    NO SQL
    COMMENT 'cambia el estado de un registro de la tabla estado proyecto'
UPDATE tbl_restado_proyecto SET EPR_OESTADO = PI_EPR_OESTADO WHERE EPR_NID = PI_EPR_NID$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure SPR_UPD_HERRAMIENTA
-- -----------------------------------------------------

DELIMITER $$
USE `db_sgii`$$


CREATE DEFINER=`root`@`localhost` PROCEDURE `SPR_UPD_HERRAMIENTA`(IN`PI_HER_NID` BIGINT( 20) ,IN`PI_HER_CNOMBRE_HERRAMIENTA` VARCHAR( 250) ,IN`PI_HER_DFECHA_INICIO` DATETIME,IN`PI_HER_DFECHA_FIN` DATETIME,IN`PI_HER_OESTADO` TINYINT( 1))
    NO SQL
    COMMENT 'actualiza un registro de la tabla de herramientas'
UPDATE tbl_therramienta SET HER_CNOMBRE_HERRAMIENTA = IFNULL( PI_HER_CNOMBRE_HERRAMIENTA, HER_CNOMBRE_HERRAMIENTA ) ,
HER_DFECHA_INICIO = IFNULL( PI_HER_DFECHA_INICIO, HER_DFECHA_INICIO ) ,
HER_DFECHA_FIN = IFNULL( PI_HER_DFECHA_FIN, HER_DFECHA_FIN ) ,
HER_OESTADO = IFNULL( PI_HER_OESTADO, HER_OESTADO ) WHERE HER_NID = PI_HER_NID$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure SPR_UPD_HIPOTESIS
-- -----------------------------------------------------

DELIMITER $$
USE `db_sgii`$$


CREATE DEFINER=`root`@`localhost` PROCEDURE `SPR_UPD_HIPOTESIS`(IN `PI_HIP_NID` BIGINT(20), IN `PI_HIP_CHIPOTESIS` VARCHAR(250), IN `PI_HIP_OESTADO` TINYINT(1), IN `PI_PRO_NID` BIGINT(20), IN `PI_EHI_NID` BIGINT(20))
    NO SQL
    COMMENT 'actualiza un registro de la tabla hipotesis'
UPDATE tbl_thipotesis 
SET HIP_CHIPOTESIS = IFNULL( PI_HIP_CHIPOTESIS, HIP_CHIPOTESIS ) ,
HIP_OESTADO = IFNULL( PI_HIP_OESTADO, HIP_OESTADO ) ,
PRO_NID = IFNULL( PI_PRO_NID, PRO_NID ) ,
EHI_NID = IFNULL( PI_EHI_NID, EHI_NID )
WHERE HIP_NID = PI_HIP_NID$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure SPR_UPD_HIPOTESIS_SEGUIMIENTO
-- -----------------------------------------------------

DELIMITER $$
USE `db_sgii`$$


CREATE DEFINER=`root`@`localhost` PROCEDURE `SPR_UPD_HIPOTESIS_SEGUIMIENTO`(IN `PI_HIP_NID` BIGINT(20), IN `PI_EHI_NID` BIGINT(20), IN `PI_CSEGUIMIENTO` LONGTEXT)
    NO SQL
    COMMENT 'actualiza un registro de la tabla hipotesis'
UPDATE tbl_thipotesis 
SET  
EHI_NID = IFNULL( PI_EHI_NID, EHI_NID ), 
HIP_CSEGUIMIENTO = CONCAT(HIP_CSEGUIMIENTO , '<br/>' , PI_CSEGUIMIENTO)
WHERE HIP_NID = PI_HIP_NID$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure SPR_UPD_LINEA_INVESTIGACION
-- -----------------------------------------------------

DELIMITER $$
USE `db_sgii`$$


CREATE DEFINER=`root`@`127.0.0.1` PROCEDURE `SPR_UPD_LINEA_INVESTIGACION`(IN`PI_LIN_NID` BIGINT( 20) ,IN`PI_LIN_CNOMBRE_INVESTIGACION` VARCHAR( 250) ,IN`PI_LIN_OESTADO` TINYINT( 1))
    NO SQL
    COMMENT 'actualiza un registro de la tbl linea de investigacion'
UPDATE tbl_rlinea_investigacion SET LIN_CNOMBRE_INVESTIGACION = IFNULL( PI_LIN_CNOMBRE_INVESTIGACION, LIN_CNOMBRE_INVESTIGACION ) ,
LIN_OESTADO = IFNULL( PI_LIN_OESTADO, LIN_OESTADO ) WHERE LIN_NID = PI_LIN_NID$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure SPR_UPD_LINEA_INVESTIGACION_ACT_INA
-- -----------------------------------------------------

DELIMITER $$
USE `db_sgii`$$


CREATE DEFINER=`root`@`127.0.0.1` PROCEDURE `SPR_UPD_LINEA_INVESTIGACION_ACT_INA`(IN`PI_LIN_NID` BIGINT( 20) ,IN`PI_LIN_OESTADO` TINYINT( 1))
    NO SQL
    COMMENT 'actualiza el estado act o inv de la tbl linea de investigacion'
UPDATE tbl_rlinea_investigacion SET LIN_OESTADO = PI_LIN_OESTADO WHERE LIN_NID = PI_LIN_NID$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure SPR_UPD_MODULO
-- -----------------------------------------------------

DELIMITER $$
USE `db_sgii`$$


CREATE DEFINER=`root`@`127.0.0.1` PROCEDURE `SPR_UPD_MODULO`( IN  `PI_NID_MOD` BIGINT( 20 ) , IN  `PI_CNOMBRE_MOD` VARCHAR( 255 ) , IN  `PI_OESTADO_MOD` TINYINT( 6 ) )
    NO SQL
    COMMENT 'Actualiza los datos del modulo'
UPDATE tbl_rmodulo SET MOD_CNOMBRE = IFNULL( PI_CNOMBRE_MOD, MOD_CNOMBRE ) ,
MOD_OESTADO = IFNULL( PI_OESTADO_MOD, MOD_OESTADO ) WHERE MOD_NID = PI_NID_MOD$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure SPR_UPD_MODULO_ACT_INA
-- -----------------------------------------------------

DELIMITER $$
USE `db_sgii`$$


CREATE DEFINER=`root`@`127.0.0.1` PROCEDURE `SPR_UPD_MODULO_ACT_INA`( IN  `PI_NID_MOD` BIGINT( 20 ) , IN  `PI_OESTADO_MOD` TINYINT( 6 ) )
    NO SQL
UPDATE tbl_rmodulo SET MOD_OESTADO = PI_OESTADO_MOD WHERE MOD_NID = PI_NID_MOD$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure SPR_UPD_OBJETIVO
-- -----------------------------------------------------

DELIMITER $$
USE `db_sgii`$$


CREATE DEFINER=`root`@`127.0.0.1` PROCEDURE `SPR_UPD_OBJETIVO`( IN  `PI_NID` BIGINT( 20 ) , IN  `PI_COBJETIVO` VARCHAR( 250 ) , IN  `PI_OESTADO` TINYINT( 1 ) , IN  `PI_EOB_NID` BIGINT( 20 ) )
    NO SQL
    COMMENT 'ACTUALIZACION DEL OBJETVO'
UPDATE tbl_robjetivo SET OBJ_COBJETIVO = IFNULL( PI_COBJETIVO, OBJ_COBJETIVO ) ,
OBJ_OESTADO = IFNULL( PI_OESTADO, OBJ_OESTADO ) ,
EOB_NID = IFNULL( PI_EOB_NID, EOB_NID ) WHERE OBJ_NID = PI_NID$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure SPR_UPD_OBJETIVO_ACT_INA
-- -----------------------------------------------------

DELIMITER $$
USE `db_sgii`$$


CREATE DEFINER=`root`@`127.0.0.1` PROCEDURE `SPR_UPD_OBJETIVO_ACT_INA`( IN  `PI_NID` BIGINT( 20 ) , IN  `PI_OESTADO` TINYINT( 1 ) )
    NO SQL
    COMMENT 'ACTUALIZAR  ESTADO'
UPDATE tbl_robjetivo SET OBJ_OESTADO = PI_OESTADO WHERE OBJ_NID = PI_NID$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure SPR_UPD_PERFIL
-- -----------------------------------------------------

DELIMITER $$
USE `db_sgii`$$


CREATE DEFINER=`root`@`127.0.0.1` PROCEDURE `SPR_UPD_PERFIL`( IN  `PI_NID_PERFIL` BIGINT( 20 ) , IN  `PI_CPERFIL_PERFIL` VARCHAR( 250 ) , IN  `PI_OESTADO_PERFIL` TINYINT( 1 ) )
    NO SQL
    COMMENT 'Actualizacion de perfil'
UPDATE tbl_rperfil SET PER_CPERFIL = IFNULL( PI_CPERFIL_PERFIL, PER_CPERFIL ) ,
PER_OESTADO = IFNULL( PI_OESTADO_PERFIL, PER_OESTADO ) WHERE PER_NID = PI_NID_PERFIL$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure SPR_UPD_PERFIL_ACT_INA
-- -----------------------------------------------------

DELIMITER $$
USE `db_sgii`$$


CREATE DEFINER=`root`@`127.0.0.1` PROCEDURE `SPR_UPD_PERFIL_ACT_INA`( IN  `PI_NID_PERFIL` INT( 20 ) , IN  `PI_OESTADO_PERFIL` TINYINT( 6 ) )
    NO SQL
    COMMENT 'Inactivar perfil'
UPDATE tbl_rperfil SET PER_OESTADO = PI_OESTADO_PERFIL WHERE PER_NID = PI_NID_PERFIL$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure SPR_UPD_PREGUNTA
-- -----------------------------------------------------

DELIMITER $$
USE `db_sgii`$$


CREATE DEFINER=`root`@`127.0.0.1` PROCEDURE `SPR_UPD_PREGUNTA`( IN  `PI_NID` BIGINT( 20 ) , IN  `PI_CPREGUNTA` VARCHAR( 250 ) , IN  `PI_OOBLIGATORIA` TINYINT( 1 ) , IN  `PI_OESTADO` TINYINT( 1 ) )
    NO SQL
    COMMENT 'Actualizar pregunta'
UPDATE tbl_rpregunta SET PRE_CPREGUNTA = IFNULL( PI_CPREGUNTA, PRE_CPREGUNTA ) ,
PRE_OOBLIGATORIA = IFNULL( PRE_OOBLIGATORIA, PI_OOBLIGATORIA ) ,
PRE_OESTADO = IFNULL( PI_OESTADO, PRE_OESTADO ) WHERE PRE_NID = PI_NID$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure SPR_UPD_PREGUNTA_ACT_INA
-- -----------------------------------------------------

DELIMITER $$
USE `db_sgii`$$


CREATE DEFINER=`root`@`127.0.0.1` PROCEDURE `SPR_UPD_PREGUNTA_ACT_INA`( IN  `PI_NID` BIGINT( 20 ) , IN  `PI_OESTADO` TINYINT( 1 ) )
    NO SQL
    COMMENT 'Actualizar estado de la pregunta'
UPDATE tbl_rpregunta SET PRE_OESTADO = PI_OESTADO WHERE PRE_NID = PI_NID$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure SPR_UPD_PREGUNTA_OBLIG
-- -----------------------------------------------------

DELIMITER $$
USE `db_sgii`$$


CREATE DEFINER=`root`@`127.0.0.1` PROCEDURE `SPR_UPD_PREGUNTA_OBLIG`( IN  `PI_NID` BIGINT( 20 ) , IN  `PI_OOBLIGATORIA` TINYINT( 1 ) )
    NO SQL
    COMMENT 'Actualizar obligatoriedad'
UPDATE tbl_rpregunta SET PRE_OOBLIGATORIA = PI_OOBLIGATORIA WHERE PRE_NID = PI_NID$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure SPR_UPD_PROYECTO
-- -----------------------------------------------------

DELIMITER $$
USE `db_sgii`$$


CREATE DEFINER=`root`@`127.0.0.1` PROCEDURE `SPR_UPD_PROYECTO`(IN `PI_CNOMBRE` VARCHAR(250), IN `PI_CDESCRIPCION` VARCHAR(2500), IN `PI_CPROBLEMA` VARCHAR(500), IN `PI_NID_USU` BIGINT, IN `PI_NID_EPR` BIGINT, IN `PI_NID_LIN` BIGINT, IN `PI_NID_TIN` BIGINT, IN `PI_NID_PRO` BIGINT, IN `PI_OESTADO` TINYINT)
    NO SQL
    COMMENT 'PROCESO DE ACTUALIZACION  DE PROYECTOS'
UPDATE tbl_tproyecto_investigacion
SET  PRO_CNOMBRE = IFNULL(PI_CNOMBRE,PRO_CNOMBRE),
PRO_CDESCRIPCION = IFNULL(PI_CDESCRIPCION,PRO_CDESCRIPCION),
PRO_CPROBLEMA = IFNULL(PI_CPROBLEMA,PRO_CPROBLEMA),
USU_NID = IFNULL(PI_NID_USU,USU_NID),
EPR_NID = IFNULL(PI_NID_EPR,EPR_NID),
LIN_NID = IFNULL(PI_NID_LIN,LIN_NID),
TIN_NID = IFNULL(PI_NID_TIN,TIN_NID),
PRO_OESTADO = IFNULL(PI_OESTADO,PRO_OESTADO)
WHERE PRO_NID = PI_NID_PRO$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure SPR_UPD_PROYECTO_CIERRE
-- -----------------------------------------------------

DELIMITER $$
USE `db_sgii`$$


CREATE DEFINER=`root`@`127.0.0.1` PROCEDURE `SPR_UPD_PROYECTO_CIERRE`(IN `PI_CCONCLUCIONES` VARCHAR(2500), IN `PI_CDEMOSTRACIONES` VARCHAR(2500), IN `PI_CRECOMENDACIONES` VARCHAR(2500), IN `PI_NID_EPR` BIGINT, IN `PI_NID_PRO` BIGINT)
    NO SQL
UPDATE tbl_tproyecto_investigacion
SET PRO_CCONCLUCIONES = IFNULL(PI_CCONCLUCIONES, PRO_CCONCLUCIONES),
PRO_CDEMOSTRACIONES = IFNULL(PI_CDEMOSTRACIONES,PRO_CDEMOSTRACIONES),
PRO_CRECOMENDACIONES = IFNULL(PI_CRECOMENDACIONES,PRO_CRECOMENDACIONES),
EPR_NID = IFNULL(PI_NID_EPR,EPR_NID)
WHERE PRO_NID = PI_NID_PRO$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure SPR_UPD_RESPUESTA
-- -----------------------------------------------------

DELIMITER $$
USE `db_sgii`$$


CREATE DEFINER=`root`@`127.0.0.1` PROCEDURE `SPR_UPD_RESPUESTA`( IN  `PI_NID` BIGINT( 20 ) , IN  `PI_CRESPUESTA` VARCHAR( 250 ) , IN  `PI_OESTADO` TINYINT( 1 ) )
    NO SQL
    COMMENT 'ACTUALIZAR ESTADO'
UPDATE tbl_rrespuesta SET RES_CRESPUESTA = IFNULL( PI_CRESPUESTA, RES_CRESPUESTA ) ,
RES_OESTADO = IFNULL( PI_OESTADO, RES_OESTADO ) WHERE RES_NID = PI_NID$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure SPR_UPD_RESPUESTA_ACT_INA
-- -----------------------------------------------------

DELIMITER $$
USE `db_sgii`$$


CREATE DEFINER=`root`@`127.0.0.1` PROCEDURE `SPR_UPD_RESPUESTA_ACT_INA`( IN  `PI_NID` BIGINT( 20 ) , IN  `PI_OESTADO` TINYINT( 1 ) )
    NO SQL
    COMMENT 'Actualizar estado de la respuesta'
UPDATE tbl_rrespuesta SET RES_OESTADO = IFNULL( PI_OESTADO, RES_OESTADO ) WHERE RES_NID = PI_NID$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure SPR_UPD_RESULTADO
-- -----------------------------------------------------

DELIMITER $$
USE `db_sgii`$$


CREATE DEFINER=`root`@`127.0.0.1` PROCEDURE `SPR_UPD_RESULTADO`( IN  `PI_NID` INT( 20 ) , IN  `PI_OESTADO` TINYINT( 1 ) , IN  `PI_USU_NID` BIGINT( 20 ) , IN  `PI_CPREGUNTA_TEXTUAL` VARCHAR( 2500 ) , IN  `PI_CRESPUESTA_TEXTUAL` VARCHAR( 2500 ) )
    NO SQL
    COMMENT 'Actualizar datos'
UPDATE tbl_tresultado SET RST_OESTADO = IFNULL( PI_OESTADO, RST_OESTADO ) ,
USU_NID = IFNULL( PI_USU_NID, USU_NID ) ,
RST_CPREGUNTA_TEXTUAL = IFNULL( PI_CPREGUNTA_TEXTUAL, RST_CPREGUNTA_TEXTUA ) ,
RST_CRESPUESTA_TEXTUAL = IFNULL( PI_CRESPUESTA_TEXTUAL, RST_CRESPUESTA_TEXTUAL ) WHERE RST_NID = PI_NID$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure SPR_UPD_RESULTADO_ACT_INA
-- -----------------------------------------------------

DELIMITER $$
USE `db_sgii`$$


CREATE DEFINER=`root`@`127.0.0.1` PROCEDURE `SPR_UPD_RESULTADO_ACT_INA`( IN  `PI_NID` BIGINT( 20 ) , IN  `PI_OESTADO` TINYINT( 1 ) )
    NO SQL
    COMMENT 'Activa o inactiva el resultado'
UPDATE tbl_tresultado SET RST_OESTADO = PI_OESTADO WHERE RST_NID = PI_NID$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure SPR_UPD_TIPO_HERRAMIENTA
-- -----------------------------------------------------

DELIMITER $$
USE `db_sgii`$$


CREATE DEFINER=`root`@`127.0.0.1` PROCEDURE `SPR_UPD_TIPO_HERRAMIENTA`( IN  `PI_NID` BIGINT( 20 ) , IN  `PI_CNOMBRE_HERRAMIENTA` VARCHAR( 250 ) , IN `PI_OESTADO` TINYINT( 1 ) )
    NO SQL
    COMMENT 'ACTUALIZAR TIPOS DE HERRAMIENTAS'
UPDATE tbl_rtipo_herramienta SET THE_CNOMBRE_HERRAMIENTA = IFNULL( PI_CNOMBRE_HERRAMIENTA, THE_CNOMBRE_HERRAMIENTA ) ,
THE_OESTADO = IFNULL( PI_OESTADO, THE_OESTADO ) WHERE THE_NID = PI_NID$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure SPR_UPD_TIPO_HERRAMIENTA_ACT_INA
-- -----------------------------------------------------

DELIMITER $$
USE `db_sgii`$$


CREATE DEFINER=`root`@`127.0.0.1` PROCEDURE `SPR_UPD_TIPO_HERRAMIENTA_ACT_INA`( IN  `PI_NID` BIGINT( 20 ) , IN  `PI_OESTADO` TINYINT( 1 ) )
    NO SQL
    COMMENT 'Activa o inactiva el tipo de herramienta'
UPDATE tbl_rtipo_herramienta SET THE_OESTADO = PI_OESTADO WHERE THE_NID = PI_NID$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure SPR_UPD_TIPO_INVESTIGACION
-- -----------------------------------------------------

DELIMITER $$
USE `db_sgii`$$


CREATE DEFINER=`root`@`127.0.0.1` PROCEDURE `SPR_UPD_TIPO_INVESTIGACION`(IN`PI_TIN_NID` BIGINT,IN`PI_TIN_CNOMBRE_TIPO` VARCHAR( 250) ,IN`PI_TIN_OESTADO` TINYINT( 1))
    NO SQL
    COMMENT 'Actualiza un registro en la tabla tipo investigación'
UPDATE tbl_rtipo_investigacion SET TIN_CNOMBRE_TIPO = IFNULL( PI_TIN_CNOMBRE_TIPO, TIN_CNOMBRE_TIPO ) ,
TIN_OESTADO = IFNULL( PI_TIN_OESTADO, TIN_OESTADO ) WHERE TIN_NID = PI_TIN_NID$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure SPR_UPD_TIPO_INVESTIGACION_ACT_INA
-- -----------------------------------------------------

DELIMITER $$
USE `db_sgii`$$


CREATE DEFINER=`root`@`127.0.0.1` PROCEDURE `SPR_UPD_TIPO_INVESTIGACION_ACT_INA`(IN`PI_TIN_NID` BIGINT,IN`PI_TIN_OESTADO` TINYINT( 1))
    NO SQL
    COMMENT 'cambia el estado de un registro de la tabla tipo investigación'
UPDATE tbl_rtipo_investigacion SET TIN_OESTADO = PI_TIN_OESTADO WHERE TIN_NID = PI_TIN_NID$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure SPR_UPD_TIPO_PREGUNTA
-- -----------------------------------------------------

DELIMITER $$
USE `db_sgii`$$


CREATE DEFINER=`root`@`127.0.0.1` PROCEDURE `SPR_UPD_TIPO_PREGUNTA`(IN`PI_TPR_NID` BIGINT,IN`TPR_CTIPO_PREGUNTA` VARCHAR( 250) ,IN`TPR_OESTADO` TINYINT( 1))
    NO SQL
    COMMENT 'modifica el estado de un registro de la tabla tipo investigación'
UPDATE tbl_rtipo_pregunta SET TPR_CTIPO_PREGUNTA = IFNULL( PI_TPR_CTIPO_PREGUNTA, TPR_CTIPO_PREGUNTA ) ,
TPR_OESTADO = IFNULL( PI_TPR_OESTADO, TPR_OESTADO ) WHERE TPR_NID = PI_TPR_NID$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure SPR_UPD_TIPO_PREGUNTA_ACT_INA
-- -----------------------------------------------------

DELIMITER $$
USE `db_sgii`$$


CREATE DEFINER=`root`@`127.0.0.1` PROCEDURE `SPR_UPD_TIPO_PREGUNTA_ACT_INA`(IN`PI_TPR_NID` BIGINT,IN`PI_TPR_OESTADO` TINYINT( 1))
    NO SQL
    COMMENT 'modifica el estado de un tipo de pregunta'
UPDATE tbl_rtipo_pregunta SET TPR_OESTADO = PI_TPR_OESTADO WHERE TPR_NID = PI_TPR_NID$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure SPR_UPD_USUARIO
-- -----------------------------------------------------

DELIMITER $$
USE `db_sgii`$$


CREATE DEFINER=`root`@`127.0.0.1` PROCEDURE `SPR_UPD_USUARIO`(IN`PI_USU_NID` BIGINT,IN`PI_USU_CCEDULA` VARCHAR( 20) ,IN`PI_USU_CNOMBRE` VARCHAR( 250) ,IN`PI_USU_NID_HOMOLOGO` BIGINT,IN`PI_USU_CLOG` VARCHAR( 250) ,IN`PI_USU_CPASSWORD` VARCHAR( 250) ,IN`PI_USU_OESTADO` TINYINT( 1))
    NO SQL
    COMMENT 'actualiza un registro de la tbl usuario'
UPDATE tbl_rtipo_pregunta SET USU_CCEDULA = IFNULL( PI_USU_CCEDULA, USU_CCEDULA ) ,
USU_CNOMBRE = IFNULL( PI_USU_CNOMBRE, USU_CNOMBRE ) ,
USU_NID_HOMOLOGO = IFNULL( PI_USU_NID_HOMOLOGO, USU_NID_HOMOLOGO ) ,
USU_CLOG = IFNULL( PI_USU_CLOG, USU_CLOG ) ,
USU_CPASSWORD = IFNULL( PI_USU_CPASSWORD, USU_CPASSWORD ) ,
USU_OESTADO = IFNULL( PI_USU_OESTADO, USU_OESTADO ) WHERE USU_NID = PI_USU_NID$$

DELIMITER ;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
