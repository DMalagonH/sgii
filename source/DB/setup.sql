INSERT INTO `tbl_modulo`
VALUES (1, 'home', 1, 'homepage');

INSERT INTO `tbl_perfil` (`id`, `per_perfil`, `per_estado`) VALUES (1, 'Superadministrador', '1');
INSERT INTO `tbl_perfil` (`id`, `per_perfil`, `per_estado`) VALUES (2, 'Administrador', '1');
INSERT INTO `tbl_perfil` (`id`, `per_perfil`, `per_estado`) VALUES (3, 'Investigador', '1');
INSERT INTO `tbl_perfil` (`id`, `per_perfil`, `per_estado`) VALUES (4, 'Usuario', '1');

INSERT INTO `tbl_perfil_modulo` (`perfil_id`, `modulo_id`) VALUES 
('1', '1'),
('2', '1'),
('3', '1'),
('4', '1');




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
(null,
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




