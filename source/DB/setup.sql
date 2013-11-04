INSERT INTO `tbl_modulo` VALUES 
(1, 'home', 1, 'homepage'),
(2, 'cargos', 1, 'cargo,cargo_show,cargo_new,cargo_edit,cargo_delete'),
(3, 'departamentos', 1, 'departamento,departamento_show,departamento_new,departamento_edit,departamento_delete'),
(4, 'organizaciones', 1, 'organizacion,organizacion_show,organizacion_new,organizacion_edit,organizacion_delete'),
(5, 'estados_proyecto', 1, 'estadoproyecto,estadoproyecto_show,estadoproyecto_new,estadoproyecto_edit,estadoproyecto_delete'),
(6, 'linea_investigacion', 1, 'lineainvestigacion,lineainvestigacion_show,lineainvestigacion_new,lineainvestigacion_edit,lineainvestigacion_delete'),
(7, 'tipo_investigacion', 1, 'tipoinvestigacion,tipoinvestigacion_show,tipoinvestigacion_new,tipoinvestigacion_edit,tipoinvestigacion_delete'),
(8, 'errores', 1, 'errores'),
(9, 'auditoria', 1, 'auditoria'),
(10, 'usuarios', 1, 'usuarios,usuarios_show,usuarios_new,usuarios_edit,usuarios_delete');

INSERT INTO `tbl_perfil` (`id`, `per_perfil`, `per_estado`) VALUES (1, 'Superadministrador', '1');
INSERT INTO `tbl_perfil` (`id`, `per_perfil`, `per_estado`) VALUES (2, 'Administrador', '1');
INSERT INTO `tbl_perfil` (`id`, `per_perfil`, `per_estado`) VALUES (3, 'Investigador', '1');
INSERT INTO `tbl_perfil` (`id`, `per_perfil`, `per_estado`) VALUES (4, 'Usuario', '1');

INSERT INTO `tbl_perfil_modulo` (`perfil_id`, `modulo_id`) VALUES 
('1', '1'),
('2', '1'),
('3', '1'),
('4', '2'),
('1', '2'),
('2', '2'),
('1', '3'),
('2', '3'),
('1', '4'),
('2', '4'),
('1', '5'),
('2', '5'),
('1', '6'),
('2', '6'),
('1', '7'),
('2', '7'),
('1', '8'),
('1', '9'),
('1', '10'),
('2', '10'),
('3', '10');

INSERT INTO `tbl_usuario`
(`id`,
`usu_cedula`,
`usu_nombre`,
`usu_fecha_creacion`,
`usu_log`,
`usu_password`,
`usu_estado`,
`cargo_id`,
`departamento_id`,
`organizacion_id`)
VALUES
(1,
'1022366307',
'Diego Malagón',
'2013-10-15',
'diego-software@hotmail.com',
'14a8dc6c9e4b8f6e3228576bec334cb78179668e',
1,
null,
null,
null);


INSERT INTO `tbl_usuario`
(`id`,
`usu_cedula`,
`usu_nombre`,
`usu_fecha_creacion`,
`usu_log`,
`usu_password`,
`usu_estado`,
`cargo_id`,
`departamento_id`,
`organizacion_id`)
VALUES
(2,
'10123456',
'Camilo Quijano',
'2013-10-15',
'camiloquijano31@hotmail.com',
'14a8dc6c9e4b8f6e3228576bec334cb78179668e',
1,
null,
null,
null);

INSERT INTO `tbl_usuario_perfil` (`usuario_id`, `perfil_id`) VALUES ('1', '1');
INSERT INTO `tbl_usuario_perfil` (`usuario_id`, `perfil_id`) VALUES ('2', '1');
INSERT INTO `tbl_usuario_perfil` (`usuario_id`, `perfil_id`) VALUES ('3', '3');

INSERT INTO `tbl_tipo_herramienta` (`id`, `the_nombre_herramienta`, `the_estado`) VALUES ('1', 'Cuestionario', '1');
INSERT INTO `tbl_tipo_herramienta` (`id`, `the_nombre_herramienta`, `the_estado`) VALUES ('2', 'Encuesta', '1');