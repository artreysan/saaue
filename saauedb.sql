#Enterprises#
INSERT INTO `enterprises`(`id`, `name`, `contract`) VALUES (NULL,'Tecnología Aplicada a Negocios S.A de C.V','713-UTIC-LPN-001-22');
INSERT INTO `enterprises`(`id`, `name`, `contract`) VALUES (NULL,'SecretarÍa de Infraestructura, Comunicaciones y Transportes','UTIC');

#Levels#
INSERT INTO `levels`(`id`, `type`) VALUES (NULL,'Escritura');
INSERT INTO `levels`(`id`, `type`) VALUES (NULL,'Lectura');
INSERT INTO `levels`(`id`, `type`) VALUES (NULL,'Escritura y Lectura');

INSERT INTO `locations`(`id`, `ubicacion`, `cubiculo`) VALUES (NULL,'Av. Insurgentes Sur 1089, Col. Nochebuena, Benito Juárez, 3720, CDMX,  UTIC Piso 9, Cubiculo 5','5');
INSERT INTO `locations`(`id`, `ubicacion`, `cubiculo`) VALUES (NULL,'Av. Insurgentes Sur 1089, Col. Nochebuena, Benito Juárez, 3720, CDMX,  UTIC Piso 9, Cubiculo 6','6');
INSERT INTO `locations`(`id`, `ubicacion`, `cubiculo`) VALUES (NULL,'Av. Insurgentes Sur 1089, Col. Nochebuena, Benito Juárez, 3720, CDMX,  UTIC Piso 9, Cubiculo 15','15');
INSERT INTO `locations`(`id`, `ubicacion`, `cubiculo`) VALUES (NULL,'Remoto',NULL);

#Rol#
INSERT INTO `rols`(`id`, `rol`) VALUES (NULL, 'Administrador de Contrato');
INSERT INTO `rols`(`id`, `rol`) VALUES (NULL, 'Administrador del Servicio');
INSERT INTO `rols`(`id`, `rol`) VALUES (NULL, 'Administrador de Proyectos');
INSERT INTO `rols`(`id`, `rol`) VALUES (NULL, 'Analista de Software');
INSERT INTO `rols`(`id`, `rol`) VALUES (NULL, 'Arquitecto de Base de Datos');
INSERT INTO `rols`(`id`, `rol`) VALUES (NULL, 'Arquitecto de Software');
INSERT INTO `rols`(`id`, `rol`) VALUES (NULL, 'Controller Manager (Personal de apoyo)');
INSERT INTO `rols`(`id`, `rol`) VALUES (NULL, 'Coordinador de la mesa de servicio');
INSERT INTO `rols`(`id`, `rol`) VALUES (NULL, 'Desarrollador Cliente-Servidor');
INSERT INTO `rols`(`id`, `rol`) VALUES (NULL, 'Desarrollador Web');
INSERT INTO `rols`(`id`, `rol`) VALUES (NULL, 'Desarrollador Móvil');
INSERT INTO `rols`(`id`, `rol`) VALUES (NULL, 'Director Coordinador de Innovación y Desarrollo Tecnológico');
INSERT INTO `rols`(`id`, `rol`) VALUES (NULL, 'Director de Desarrollo Tecnológico');
INSERT INTO `rols`(`id`, `rol`) VALUES (NULL, 'Documentador');
INSERT INTO `rols`(`id`, `rol`) VALUES (NULL, 'Especialista en Metodología COSMIC');
INSERT INTO `rols`(`id`, `rol`) VALUES (NULL, 'Especialista en Seguridad Informática');
INSERT INTO `rols`(`id`, `rol`) VALUES (NULL, 'Ingeniero de pruebas');
INSERT INTO `rols`(`id`, `rol`) VALUES (NULL, 'Lider de proyecto');
INSERT INTO `rols`(`id`, `rol`) VALUES (NULL, 'Scrum Master');
INSERT INTO `rols`(`id`, `rol`) VALUES (NULL, 'Subdirector de Sistemas Administrativos');
INSERT INTO `rols`(`id`, `rol`) VALUES (NULL, 'Subdirector de Adminsitración de Portales');
INSERT INTO `rols`(`id`, `rol`) VALUES (NULL, 'UI/UX');

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Administrador', 'web', '2023-01-20 18:13:59', '2023-01-20 18:13:59'),
(2, 'Editor', 'web', '2023-01-20 18:13:59', '2023-01-20 18:13:59'),
(3, 'Externo', 'web', '2023-01-20 18:13:59', '2023-01-20 18:13:59');

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `last_name`, `last_maternal`, `rol_id`, `location_id`, `enterprise_id`, `role_id`) VALUES
(1, 'Milton Arturo', 'milton.quiroz@mail.com', NULL, '$2y$10$dDAx.1efF5t0g2T1yVMo3eGQIKWSBJdstS3948JUBfZju2NpEokfC', NULL, '2023-01-20 18:14:02', '2023-01-20 18:14:02', 'Quiroz', 'Hernández', 9, 4, 2, 1),
(2, 'Arturo', 'arturo.reyes@mail.com', NULL, '$2y$10$Js3e5hT8grzEmhk.GznoK.YtQZgFqGkH4KzfdmM6aDDyH/YhqWKC.', NULL, '2023-01-20 18:14:02', '2023-01-20 18:14:02', 'Reyes', 'Santana', 9, 4, 2, 1),
(3, 'Ing. Mario César', 'mario.cesar@sct.gob.mx', NULL, '$2y$10$Y3u5vK23.eXFt/3kW0oa1.C0JGqTTRXnhjBuwGWvrhH0mO7ZveyeK', NULL, '2023-01-20 18:14:02', '2023-01-20 18:14:02', 'Herrera', 'González', 12, 4, 2, 1),
(4, 'Ing. José Antonio', 'antonio.rulfo@sct.gob.mx', NULL, '$2y$10$SnCY8vIsXDsLtB5vY4buCuBi7hFoWDot3andBZcGvT5MH4GCO4/82', NULL, '2023-01-20 18:14:02', '2023-01-20 18:14:02', 'Rulfo', 'Zaragoza', 13, 4, 2, 1),
(5, 'Mtra. Edna. Patricia', 'edna.patricia@sct.gob.mx', NULL, '$2y$10$aeWeShTycvyWtDKSTrVHJusbBD9X7mivcI07i8x9dandewdcqm56W', NULL, '2023-01-20 18:14:02', '2023-01-20 18:14:02', 'Santiago', 'Vargas', 20, 4, 2, 1),
(6, 'Ing. Iracema', 'iracema.miron@sct.gob.mx', NULL, '$2y$10$4L5goEa/aL9nGMyrHGS13uNHRMFDfdfml/RsdORCj4TUWYarWEvyS', NULL, '2023-01-20 18:14:02', '2023-01-20 18:14:02', 'Mirón', 'Ramírez', 21, 4, 2, 1);

INSERT INTO `collaborators` (`id`, `name`, `last_name`, `last_maternal`, `email`, `nodo`, `internet`, `ip`, `vpn`, `account_gitlab`, `account_jira`, `account_glpi`, `account_da`, `location_id`, `rol_id`, `enterprise_id`) VALUES
(1, 'Carlos Rafael', 'Aguilar', 'Chavez', 'carlos.aguilar@tecnoaplicada.mx', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1),
(2, 'Daniela', 'Cisneros', 'Landín', 'daniela.cisneros@tecnoaplicada.mx', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 2, 1);









