
-- #Authorizers#
-- INSERT INTO `authorizers`(`id`, `nombre`, `puesto`) VALUES (NULL,'Ing. Mario César Herrera González','Director Coordinador de Innovación y Desarrollo Tecnológico');
-- INSERT INTO `authorizers`(`id`, `nombre`, `puesto`) VALUES (NULL,'Ing. José Antonio Rulfo Zaragoza','Director de Desarrollo Tecnológico');
-- INSERT INTO `authorizers`(`id`, `nombre`, `puesto`) VALUES (NULL,'Mtra. Edna Patricia Santiago Vargas','Subdirectora de Sistemas Administrativos');
-- INSERT INTO `authorizers`(`id`, `nombre`, `puesto`) VALUES (NULL,'Ing. David de León Muñoz','Subdirector de Innovación Tecnológica');
-- INSERT INTO `authorizers`(`id`, `nombre`, `puesto`) VALUES (NULL,'Ing. Iracema Mirón Ramírez','Subdirectora de Adminsitración de Portales');
#Enterprises#
INSERT INTO `enterprises`(`id`, `name`, `contract`) VALUES (NULL,'Tecnología Aplicada a Negocios S.A de C.V','713-UTIC-LPN-001-22');
INSERT INTO `enterprises`(`id`, `name`, `contract`) VALUES (NULL,'SecretarÍa de Infraestructura, Comunicaciones y Transportes','UTIC');

#Levels#
INSERT INTO `levels`(`id`, `tipo`) VALUES (NULL,'Escritura');
INSERT INTO `levels`(`id`, `tipo`) VALUES (NULL,'Lectura');
INSERT INTO `levels`(`id`, `tipo`) VALUES (NULL,'Escritura y Lectura');


#Locations#
INSERT INTO `locations`(`id`, `ubicacion`, `cubiculo`) VALUES (NULL,'Av. Insurgentes Sur 1089, Col. Nochebuena, Benito Juárez, 3720, CDMX,  UTIC Piso 9, Cubiculo 1','1');
INSERT INTO `locations`(`id`, `ubicacion`, `cubiculo`) VALUES (NULL,'Av. Insurgentes Sur 1089, Col. Nochebuena, Benito Juárez, 3720, CDMX,  UTIC Piso 9, Cubiculo 2','2');
INSERT INTO `locations`(`id`, `ubicacion`, `cubiculo`) VALUES (NULL,'Av. Insurgentes Sur 1089, Col. Nochebuena, Benito Juárez, 3720, CDMX,  UTIC Piso 9, Cubiculo 3','3');
INSERT INTO `locations`(`id`, `ubicacion`, `cubiculo`) VALUES (NULL,'Av. Insurgentes Sur 1089, Col. Nochebuena, Benito Juárez, 3720, CDMX,  UTIC Piso 9, Cubiculo 4','4');
INSERT INTO `locations`(`id`, `ubicacion`, `cubiculo`) VALUES (NULL,'Av. Insurgentes Sur 1089, Col. Nochebuena, Benito Juárez, 3720, CDMX,  UTIC Piso 9, Cubiculo 5','5');
INSERT INTO `locations`(`id`, `ubicacion`, `cubiculo`) VALUES (NULL,'Av. Insurgentes Sur 1089, Col. Nochebuena, Benito Juárez, 3720, CDMX,  UTIC Piso 9, Cubiculo 6','6');
INSERT INTO `locations`(`id`, `ubicacion`, `cubiculo`) VALUES (NULL,'Av. Insurgentes Sur 1089, Col. Nochebuena, Benito Juárez, 3720, CDMX,  UTIC Piso 9, Cubiculo 7','7');
INSERT INTO `locations`(`id`, `ubicacion`, `cubiculo`) VALUES (NULL,'Av. Insurgentes Sur 1089, Col. Nochebuena, Benito Juárez, 3720, CDMX,  UTIC Piso 9, Cubiculo 8','8');
INSERT INTO `locations`(`id`, `ubicacion`, `cubiculo`) VALUES (NULL,'Av. Insurgentes Sur 1089, Col. Nochebuena, Benito Juárez, 3720, CDMX,  UTIC Piso 9, Cubiculo 9','9');
INSERT INTO `locations`(`id`, `ubicacion`, `cubiculo`) VALUES (NULL,'Av. Insurgentes Sur 1089, Col. Nochebuena, Benito Juárez, 3720, CDMX,  UTIC Piso 9, Cubiculo 10','10');
INSERT INTO `locations`(`id`, `ubicacion`, `cubiculo`) VALUES (NULL,'Av. Insurgentes Sur 1089, Col. Nochebuena, Benito Juárez, 3720, CDMX,  UTIC Piso 9, Cubiculo 11','11');
INSERT INTO `locations`(`id`, `ubicacion`, `cubiculo`) VALUES (NULL,'Av. Insurgentes Sur 1089, Col. Nochebuena, Benito Juárez, 3720, CDMX,  UTIC Piso 9, Cubiculo 12','12');
INSERT INTO `locations`(`id`, `ubicacion`, `cubiculo`) VALUES (NULL,'Av. Insurgentes Sur 1089, Col. Nochebuena, Benito Juárez, 3720, CDMX,  UTIC Piso 9, Cubiculo 13','13');
INSERT INTO `locations`(`id`, `ubicacion`, `cubiculo`) VALUES (NULL,'Av. Insurgentes Sur 1089, Col. Nochebuena, Benito Juárez, 3720, CDMX,  UTIC Piso 9, Cubiculo 14','14');
INSERT INTO `locations`(`id`, `ubicacion`, `cubiculo`) VALUES (NULL,'Av. Insurgentes Sur 1089, Col. Nochebuena, Benito Juárez, 3720, CDMX,  UTIC Piso 9, Cubiculo 15','15');
INSERT INTO `locations`(`id`, `ubicacion`, `cubiculo`) VALUES (NULL,'Remoto',NULL);

#Projects#
INSERT INTO `projects`(`id`, `nombre_completo`, `nombre_corto`, `coordinador`) VALUES (NULL,'Consulta licencias','e_Licencias DGAF','Ing. Betzalel Betanzos Laiseca');
INSERT INTO `projects`(`id`, `nombre_completo`, `nombre_corto`, `coordinador`) VALUES (NULL,'Sistema Integral de Protección y Medicina Preventiva en el Transporte','Metra', 'Ing. Betzalel Betanzos Laiseca');
INSERT INTO `projects`(`id`, `nombre_completo`, `nombre_corto`, `coordinador`) VALUES (NULL,'Sistema Institucional de Autotransporte Federal','Siaf', 'Ing. Betzalel Betanzos Laiseca');
INSERT INTO `projects`(`id`, `nombre_completo`, `nombre_corto`, `coordinador`) VALUES (NULL,'Sistema de Citas por Internet','CIS','Ing. David de León Muños');
INSERT INTO `projects`(`id`, `nombre_completo`, `nombre_corto`, `coordinador`) VALUES (NULL,'Sistema Institucional de Licencias Federales','e_Licencias AFAC','Mtra. Edna Patricia Santiago Vargas');
INSERT INTO `projects`(`id`, `nombre_completo`, `nombre_corto`, `coordinador`) VALUES (NULL,'Licencia Federal Digital Ferroviaria','e_Licencias ARTF','Ing. Betzalel Betanzos Laiseca');
INSERT INTO `projects`(`id`, `nombre_completo`, `nombre_corto`, `coordinador`) VALUES (NULL,'Dirección General de Programación, Organización y Presupuesto','e5Cinco','Ing. Betzalel Betanzos Laiseca');
INSERT INTO `projects`(`id`, `nombre_completo`, `nombre_corto`, `coordinador`) VALUES (NULL,'Ingresos (Recaudación de los Derechos, Productos y Aprovechamientos)','Ingresos','Ing. Betzalel Betanzos Laiseca');
INSERT INTO `projects`(`id`, `nombre_completo`, `nombre_corto`, `coordinador`) VALUES (NULL,'Agencia Reguladora del Transporte Ferroviario','Licencia Federal Digital Ferroviaria','Ing. Betzalel Betanzos Laiseca');
INSERT INTO `projects`(`id`, `nombre_completo`, `nombre_corto`, `coordinador`) VALUES (NULL,'Generación de Citas para Trámites de Autotransporte Federal','Módulo 2','Ing. Betzalel Betanzos Laiseca');
INSERT INTO `projects`(`id`, `nombre_completo`, `nombre_corto`, `coordinador`) VALUES (NULL,'Módulo de Pólizas del Sistema Institucional de Transporte Ferroviario y Multimodal','SITFYMM','Ing. Betzalel Betanzos Laiseca');
INSERT INTO `projects`(`id`, `nombre_completo`, `nombre_corto`, `coordinador`) VALUES (NULL,'Nuevo Sistema','Micrositio','Ing. Betzalel Betanzos Laiseca');
INSERT INTO `projects`(`id`, `nombre_completo`, `nombre_corto`, `coordinador`) VALUES (NULL,'Portal de Autoservicio de los Trabajadores de la S.C.T.','Portal de Autoservicio SICT','Ing. Betzalel Betanzos Laiseca');
INSERT INTO `projects`(`id`, `nombre_completo`, `nombre_corto`, `coordinador`) VALUES (NULL,'Registro Único de Contratistas','RECO','Ing. Betzalel Betanzos Laiseca');
INSERT INTO `projects`(`id`, `nombre_completo`, `nombre_corto`, `coordinador`) VALUES (NULL,'Repositorio Único de Sitios Públicos Conectados y por Conectar','Repositorio único de Sitios Públicos Conectados y por Conectar','Ing. David de León David de León Muñoz');
INSERT INTO `projects`(`id`, `nombre_completo`, `nombre_corto`, `coordinador`) VALUES (NULL,'Secretaría del Ramo','Portal de consulta Histórica de la SICT','Ing. David de León David de León Muñoz');
INSERT INTO `projects`(`id`, `nombre_completo`, `nombre_corto`, `coordinador`) VALUES (NULL,'Sectorizado (DRIVE)','Sectorizados Drive','Ing. David de León David de León Muñoz');
INSERT INTO `projects`(`id`, `nombre_completo`, `nombre_corto`, `coordinador`) VALUES (NULL,'Sistema Automatizado de Integración de los Instrumentos de Consulta y Control Archivístico','SICCA','Ing. David de León David de León Muñoz');
INSERT INTO `projects`(`id`, `nombre_completo`, `nombre_corto`, `coordinador`) VALUES (NULL,'Sistema de Administración de Puentes México','SIPUMEX','Ing. David de León David de León Muñoz');
INSERT INTO `projects`(`id`, `nombre_completo`, `nombre_corto`, `coordinador`) VALUES (NULL,'Sistema Automatizado de Integración de los Instrumentos de Consulta y Control Archivístico','SICCA','Ing. David de León David de León Muñoz');
INSERT INTO `projects`(`id`, `nombre_completo`, `nombre_corto`, `coordinador`) VALUES (NULL,'Sistema de Administración de Puentes México','SIPUMEX','Ing. David de León David de León Muñoz');
INSERT INTO `projects`(`id`, `nombre_completo`, `nombre_corto`, `coordinador`) VALUES (NULL,'Sistema de Administración para la Obra Pública','SAOP','Ing. David de León David de León Muñoz');
INSERT INTO `projects`(`id`, `nombre_completo`, `nombre_corto`, `coordinador`) VALUES (NULL,'Sistema de Gestión de Proyectos','SIGESPO','Ing. David de León David de León Muñoz');
INSERT INTO `projects`(`id`, `nombre_completo`, `nombre_corto`, `coordinador`) VALUES (NULL,'Sistema de Información Estadística','SIE','Ing. David de León David de León Muñoz');
INSERT INTO `projects`(`id`, `nombre_completo`, `nombre_corto`, `coordinador`) VALUES (NULL,'Sistema de Registros de Auditorias','SRA','Ing. David de León David de León Muñoz');
INSERT INTO `projects`(`id`, `nombre_completo`, `nombre_corto`, `coordinador`) VALUES (NULL,'Sistema de Seguimiento a la Pavimentación de Caminos de Acceso Municipal','SISPACAM','Ing. David de León David de León Muñoz');
INSERT INTO `projects`(`id`, `nombre_completo`, `nombre_corto`, `coordinador`) VALUES (NULL,'Sistema Institucional de Aeronáutica Civil','SIAC','Mtra. Edna Patricia Santiago Vargas');
INSERT INTO `projects`(`id`, `nombre_completo`, `nombre_corto`, `coordinador`) VALUES (NULL,'Sistema Integral de Administración-Contabilidad','SIA','Mtra. Edna Patricia Santiago Vargas');
INSERT INTO `projects`(`id`, `nombre_completo`, `nombre_corto`,`coordinador`) VALUES (NULL,'Sistema Integral de Administración-Recursos Materiales','SIA-RM','Ing. Iracema Mirón Ramírez');
INSERT INTO `projects`(`id`, `nombre_completo`, `nombre_corto`,`coordinador`) VALUES (NULL,'Tablero Seguimiento Financiero','Tablero DGP','Ing. Iracema Mirón Ramírez');
INSERT INTO `projects`(`id`, `nombre_completo`, `nombre_corto`, `coordinador`) VALUES (NULL,'Timbrado de nómina de la SICT','Timbrado de Nómina SICT','Ing. Iracema Mirón Ramírez');
INSERT INTO `projects`(`id`, `nombre_completo`, `nombre_corto`, `coordinador`) VALUES (NULL,'Timbrado Facturación','Timbrado FAC','Ing. Iracema Mirón Ramírez');

#Rol#
INSERT INTO `rols`(`id`, `rol`) VALUES (NULL, 'Administrador de Contrato');
INSERT INTO `rols`(`id`, `rol`) VALUES (NULL, 'Administrador del Servicio');
INSERT INTO `rols`(`id`, `rol`) VALUES (NULL, 'Administrador de Proyectos');
INSERT INTO `rols`(`id`, `rol`) VALUES (NULL, 'Analista de Software');
INSERT INTO `rols`(`id`, `rol`) VALUES (NULL, 'Arquitecto de Base de Datos');
INSERT INTO `rols`(`id`, `rol`) VALUES (NULL, 'Arquitecto de Software');
INSERT INTO `rols`(`id`, `rol`) VALUES (NULL, 'Controller Manager (Persoanl de apoyo)');
INSERT INTO `rols`(`id`, `rol`) VALUES (NULL, 'Coordinador de la mesa de servicio');
INSERT INTO `rols`(`id`, `rol`) VALUES (NULL, 'Desarrollador Cliente-Servidor');
INSERT INTO `rols`(`id`, `rol`) VALUES (NULL, 'Desarrollador Web');
INSERT INTO `rols`(`id`, `rol`) VALUES (NULL, 'Desarrollador Móvil');
INSERT INTO `rols`(`id`, `rol`) VALUES (NULL, 'Documentador');
INSERT INTO `rols`(`id`, `rol`) VALUES (NULL, 'Ingeniero de pruebas');
INSERT INTO `rols`(`id`, `rol`) VALUES (NULL, 'Lider de proyecto');
INSERT INTO `rols`(`id`, `rol`) VALUES (NULL, 'Scrum Master');
INSERT INTO `rols`(`id`, `rol`) VALUES (NULL, 'UI/UX');
INSERT INTO `rols`(`id`, `rol`) VALUES (NULL, 'Especialista en Metodología COSMIC');
INSERT INTO `rols`(`id`, `rol`) VALUES (NULL, 'Especialista en Seguridad Informática');

#Equipment#
INSERT INTO `equipment`(`id`, `tipo`, `marca`, `modelo`, `serie`, `mac_ethernet`, `mac_wifi`, `enterprise_id`,`collaborator_id`) VALUES (NULL,'Laptop','HP','EliteBook 840 G6','5CGOl96SBl','B05C:DAE3:37F0','14F6:D845:CB30','1',NULL);
INSERT INTO `equipment`(`id`, `tipo`, `marca`, `modelo`, `serie`, `mac_ethernet`, `mac_wifi`, `enterprise_id`,`collaborator_id`)VALUES (NULL,'Laptop','Dell','Latitude 7490','FRQDNV2','C8F7:5066:F58D','04EA:56A6:F8C4','1',NULL);
INSERT INTO `equipment`(`id`, `tipo`, `marca`, `modelo`, `serie`, `mac_ethernet`, `mac_wifi`, `enterprise_id`,`collaborator_id`) VALUES (NULL,'All In One','Dell','Optiplex 9010','4RQZ8V1','5CF9:DDDC:FA22','0009:0FFE:0001','1',NULL);
INSERT INTO `equipment`(`id`, `tipo`, `marca`, `modelo`, `serie`, `mac_ethernet`, `mac_wifi`, `enterprise_id`,`collaborator_id`) VALUES (NULL,'Laptop','Lenovo','80K4','MP12XHUL','1C39:47B4:1697','76DF:BF36:8DCF', '1',NULL);
INSERT INTO `equipment`(`id`, `tipo`, `marca`, `modelo`, `serie`, `mac_ethernet`, `mac_wifi`, `enterprise_id`,`collaborator_id`) VALUES (NULL,'Laptop','HP','EliteBook 840 G6','5CG0198XKB','00FF:A2BD:BC2E','14F6:D82D:B038', '1',NULL);
INSERT INTO `equipment`(`id`, `tipo`, `marca`, `modelo`, `serie`, `mac_ethernet`, `mac_wifi`, `enterprise_id`,`collaborator_id`) VALUES (NULL,'All In One','Dell','Optiplex 9010','4RWR8V1','5CF9:DDDD:1F8F','54EE:88D6:A302','1',NULL);
INSERT INTO `equipment`(`id`, `tipo`, `marca`, `modelo`, `serie`, `mac_ethernet`, `mac_wifi`, `enterprise_id`,`collaborator_id`) VALUES (NULL,'Laptop','Dell','Latitude 5400','SGXV433','C03E:BA4F:0C7A','3C58:C2E9:C6AF', '1',NULL);
INSERT INTO `equipment`(`id`, `tipo`, `marca`, `modelo`, `serie`, `mac_ethernet`, `mac_wifi`, `enterprise_id`,`collaborator_id`) VALUES (NULL,'Laptop','Lenovo','Z40-70','YB12565611','52-7B-9D-65-5B-21','AC-D1-B8-FE-01-7B','1',NULL);
INSERT INTO `equipment`(`id`, `tipo`, `marca`, `modelo`, `serie`, `mac_ethernet`, `mac_wifi`, `enterprise_id`,`collaborator_id`) VALUES (NULL,'Laptop','Lenovo','80K4','MP147QY1','1C39:47DC:149F','76DF:BF60:0D3D', '1',NULL);
INSERT INTO `equipment`(`id`, `tipo`, `marca`, `modelo`, `serie`, `mac_ethernet`, `mac_wifi`, `enterprise_id`,`collaborator_id`) VALUES (NULL,'Laptop','Dell','Latitude 7490','6P7C8S2','C8F7:5010:B0E0','DC8B:285F:28E2', '1',NULL);
INSERT INTO `equipment`(`id`, `tipo`, `marca`, `modelo`, `serie`, `mac_ethernet`, `mac_wifi`, `enterprise_id`,`collaborator_id`) VALUES (NULL,'Laptop','HP','l7-BY4097NR','TJ27325SWJ','l4-CB-l9-BF-F8-C2','l4-l8-C3-6E-22-3D', '1',NULL);
INSERT INTO `equipment`(`id`, `tipo`, `marca`, `modelo`, `serie`, `mac_ethernet`, `mac_wifi`, `enterprise_id`,`collaborator_id`) VALUES (NULL,'Laptop','Dell','Vostro 3400','8ZV08K3','B4-45-06-7B-32-AC','AA-93-4A-62-39-D3', '1',NULL);
INSERT INTO `equipment`(`id`, `tipo`, `marca`, `modelo`, `serie`, `mac_ethernet`, `mac_wifi`, `enterprise_id`,`collaborator_id`) VALUES (NULL,'Laptop','HP','17-BY4097NR','TJ21456F4D','48-9E-BD-21-02-55','80-45-DD-A5-6F-69','1',NULL);
INSERT INTO `equipment`(`id`, `tipo`, `marca`, `modelo`, `serie`, `mac_ethernet`, `mac_wifi`, `enterprise_id`,`collaborator_id`) VALUES (NULL,'Laptop','Dell','Inspiron 15','34C65F2','00-09-0F-FE-00-01','10-7D-1A-02-F4-A2', '1',NULL);
INSERT INTO `equipment`(`id`, `tipo`, `marca`, `modelo`, `serie`, `mac_ethernet`, `mac_wifi`, `enterprise_id`,`collaborator_id`) VALUES (NULL,'Laptop','Lenovo','ThinkPad','PF-2TQ2RW','84-5C-F3-FC-A1-CE','84-5C-F3-FC-A1-CA', '1',NULL);
INSERT INTO `equipment`(`id`, `tipo`, `marca`, `modelo`, `serie`, `mac_ethernet`, `mac_wifi`, `enterprise_id`,`collaborator_id`) VALUES (NULL,'Laptop','Dell','Latitude 5490','5LJ4PQ2','10-65-30-81-04-2E','76-40-BB-3D-10-AB','1',NULL);
INSERT INTO `equipment`(`id`, `tipo`, `marca`, `modelo`, `serie`, `mac_ethernet`, `mac_wifi`, `enterprise_id`,`collaborator_id`) VALUES (NULL,'All In One','Dell','Optiplex 9010','4SP09Vl','SCF9:D0DD:1F30','54CE:29A4:8601','1',NULL);
INSERT INTO `equipment`(`id`, `tipo`, `marca`, `modelo`, `serie`, `mac_ethernet`, `mac_wifi`, `enterprise_id`,`collaborator_id`) VALUES (NULL,'All In One','Dell','Optiplex 9010','4PGR8Vl','C81F:66AF:SA51','8086:F2D0:3FBD','1',NULL);
INSERT INTO `equipment`(`id`, `tipo`, `marca`, `modelo`, `serie`, `mac_ethernet`, `mac_wifi`, `enterprise_id`,`collaborator_id`) VALUES (NULL,'Laptop','Acer','Aspire E5-551','NXMUCAL005543092623400','F8-76-1C-CF-3C-66','1A-86-87-35-5C-DF','1',NULL);
INSERT INTO `equipment`(`id`, `tipo`, `marca`, `modelo`, `serie`, `mac_ethernet`, `mac_wifi`, `enterprise_id`,`collaborator_id`) VALUES (NULL,'Laptop','Lenovo','20AWA13HLM','PC06DYP3','68F7:28AF:6424','104A:7D1E:49E9', '1',NULL);
INSERT INTO `equipment`(`id`, `tipo`, `marca`, `modelo`, `serie`, `mac_ethernet`, `mac_wifi`, `enterprise_id`,`collaborator_id`) VALUES (NULL,'Laptop','Dell','Latitude 7490','CJKPNQ2','65-30-7D-20-9D','C0-B6-F9-D5-9A-68', '1',NULL);
INSERT INTO `equipment`(`id`, `tipo`, `marca`, `modelo`, `serie`, `mac_ethernet`, `mac_wifi`, `enterprise_id`,`collaborator_id`) VALUES (NULL,'All In One','Dell','Optiplex 9010','4RJZ8V1','5CF9:DDDC:E6-0E', NULL,'1',NULL);
INSERT INTO `equipment`(`id`, `tipo`, `marca`, `modelo`, `serie`, `mac_ethernet`, `mac_wifi`, `enterprise_id`,`collaborator_id`) VALUES (NULL,'Laptop','Lenovo','T440p','PC0DW7PT','50-7B-9D-DD-90-D2', '90-2E-lC-46-B8-7E','1',NULL);
INSERT INTO `equipment`(`id`, `tipo`, `marca`, `modelo`, `serie`, `mac_ethernet`, `mac_wifi`, `enterprise_id`,`collaborator_id`) VALUES (NULL,'Laptop','Acer','Aspire E 15','NXGDNAL0026180B3797600','54AB:3A7F:F9A6', '6A14:017C:AF6F','1',NULL);
INSERT INTO `equipment`(`id`, `tipo`, `marca`, `modelo`, `serie`, `mac_ethernet`, `mac_wifi`, `enterprise_id`,`collaborator_id`) VALUES (NULL,'Laptop','Dell','Vostro 3400','FRWF7K3','B445:067B:310A', 'A893:4A62:3523','1',NULL);
INSERT INTO `equipment`(`id`, `tipo`, `marca`, `modelo`, `serie`, `mac_ethernet`, `mac_wifi`, `enterprise_id`,`collaborator_id`) VALUES (NULL,'Laptop','Dell','Vostro','F10H7K3','B4-45-06-7A-F8-6C', 'A8-93-4A-62-17-6B','1',NULL);
INSERT INTO `equipment`(`id`, `tipo`, `marca`, `modelo`, `serie`, `mac_ethernet`, `mac_wifi`, `enterprise_id`,`collaborator_id`) VALUES (NULL,'Laptop','HP','17-BY4097NR','TJ21325SY5','00-15-5D-4C-50-37', 'E8-84-A5-CA-22-8B','1',NULL);
INSERT INTO `equipment`(`id`, `tipo`, `marca`, `modelo`, `serie`, `mac_ethernet`, `mac_wifi`, `enterprise_id`,`collaborator_id`) VALUES (NULL,'Laptop','HP','17-Cn0053CL','316HBUARABA','00-FF-A6-5B-9C-90', '5E-61-99-5A-86-61','1',NULL);
INSERT INTO `equipment`(`id`, `tipo`, `marca`, `modelo`, `serie`, `mac_ethernet`, `mac_wifi`, `enterprise_id`,`collaborator_id`) VALUES (NULL,'Laptop','Dell','Latitude 5490','G4RHLQ2','E4-B9-7A-32-D7-05', 'D8-9C-67-4D-DE-AF', '1',NULL);
INSERT INTO `equipment`(`id`, `tipo`, `marca`, `modelo`, `serie`, `mac_ethernet`, `mac_wifi`, `enterprise_id`,`collaborator_id`) VALUES (NULL,'Laptop','Dell','Latitude 5490','G4RHLQ2','E4-B9-7A-32-D7-05', '18-1D-EA-E0-25-C7','1',NULL);
INSERT INTO `equipment`(`id`, `tipo`, `marca`, `modelo`, `serie`, `mac_ethernet`, `mac_wifi`, `enterprise_id`,`collaborator_id`) VALUES (NULL,'All In One','Dell','Optiplex 9010','45MX8V1','5CF9:DDDD:1DE9','5408:EB3A:7E01','1',NULL);
INSERT INTO `equipment`(`id`, `tipo`, `marca`, `modelo`, `serie`, `mac_ethernet`, `mac_wifi`, `enterprise_id`,`collaborator_id`) VALUES (NULL,'Laptop','Acer','Aspire E 15','NXGDNAL002619053767600','00e4:4c68:1185','6814:017C:C5D5','1',NULL);
INSERT INTO `equipment`(`id`, `tipo`, `marca`, `modelo`, `serie`, `mac_ethernet`, `mac_wifi`, `enterprise_id`,`collaborator_id`) VALUES (NULL,'Laptop','Dell','Vostro 3400','CH028K3','B445:067A:F8FB','A893:4A62:381B','1',NULL);
INSERT INTO `equipment`(`id`, `tipo`, `marca`, `modelo`, `serie`, `mac_ethernet`, `mac_wifi`, `enterprise_id`,`collaborator_id`) VALUES (NULL,'Laptop','Dell','Latitude 7490','4FM9HR2','00FF:5C76:7F7D','B469:2175:0C74','1',NULL);
INSERT INTO `equipment`(`id`, `tipo`, `marca`, `modelo`, `serie`, `mac_ethernet`, `mac_wifi`, `enterprise_id`,`collaborator_id`) VALUES (NULL,'Laptop','Dell','Vostro','FCTG7K3','B445:067B:2BBA','A893:4A62:2CE1','1',NULL);
INSERT INTO `equipment`(`id`, `tipo`, `marca`, `modelo`, `serie`, `mac_ethernet`, `mac_wifi`, `enterprise_id`,`collaborator_id`) VALUES (NULL,'Laptop','Dell','Latitude 7490','B7HB8S2','1C-1B-B5-D2-C4-E0','CA-FF-28-59-37-CB','1',NULL);
INSERT INTO `equipment`(`id`, `tipo`, `marca`, `modelo`, `serie`, `mac_ethernet`, `mac_wifi`, `enterprise_id`,`collaborator_id`) VALUES (NULL,'Laptop','Dell','Latitude 7480','BJWB6H2','10-65-30-1E-82-3A','F8-59-71-4C-F6-5E','1',NULL);
INSERT INTO `equipment`(`id`, `tipo`, `marca`, `modelo`, `serie`, `mac_ethernet`, `mac_wifi`, `enterprise_id`,`collaborator_id`) VALUES (NULL,'Laptop','Dell','Vostro 3400','5L028K3','B4-45-06-7B-2F-6E','A8-93-4A-62-34-91','1',NULL);
INSERT INTO `equipment`(`id`, `tipo`, `marca`, `modelo`, `serie`, `mac_ethernet`, `mac_wifi`, `enterprise_id`,`collaborator_id`) VALUES (NULL,'Laptop','Dell','Latitude 7480','1SSTRF2','8C-EC-4B-DE-A3-9B','00-28-F8-19-84-18','1',NULL);
INSERT INTO `equipment`(`id`, `tipo`, `marca`, `modelo`, `serie`, `mac_ethernet`, `mac_wifi`, `enterprise_id`,`collaborator_id`) VALUES (NULL,'Laptop','Levono','Thinkpad T90','PFIZLJF3','F8-75-A4-08-50-3C','94-E6-F7-4B-9C-8B','1',NULL);
INSERT INTO `equipment`(`id`, `tipo`, `marca`, `modelo`, `serie`, `mac_ethernet`, `mac_wifi`, `enterprise_id`,`collaborator_id`) VALUES (NULL,'Laptop','Dell','Latitude 7480','C8DK4H2','D4-81-D7-E4-22-E1','F8-59-71-04-A0-AC','1',NULL);
INSERT INTO `equipment`(`id`, `tipo`, `marca`, `modelo`, `serie`, `mac_ethernet`, `mac_wifi`, `enterprise_id`,`collaborator_id`) VALUES (NULL,'Laptop','Dell','Latitude 7490','HYGZHR2','E4-B9-7A-4E-B3-2D','B4-69-21-74-6B-3F','1',NULL);
INSERT INTO `equipment`(`id`, `tipo`, `marca`, `modelo`, `serie`, `mac_ethernet`, `mac_wifi`, `enterprise_id`,`collaborator_id`) VALUES (NULL,'Laptop','Dell','Latitude 7490','77VJHR2','E4-B9-7A-47-FA-32','B4-69-21-74-00-A4','1',NULL);
INSERT INTO `equipment`(`id`, `tipo`, `marca`, `modelo`, `serie`, `mac_ethernet`, `mac_wifi`, `enterprise_id`,`collaborator_id`) VALUES (NULL,'Laptop','Dell','Optiplex 9010','4RLR8V1','5C-F9-DD-DD-29-E4','00-15-5D-14-GA-D7','1',NULL);
INSERT INTO `equipment`(`id`, `tipo`, `marca`, `modelo`, `serie`, `mac_ethernet`, `mac_wifi`, `enterprise_id`,`collaborator_id`) VALUES (NULL,'Laptop','Dell','Latitude 7490','34B3MQ2','E4-B9-7A-32-BE-67','64-5D-86-BE-1F-D6','1',NULL);
INSERT INTO `equipment`(`id`, `tipo`, `marca`, `modelo`, `serie`, `mac_ethernet`, `mac_wifi`, `enterprise_id`,`collaborator_id`) VALUES (NULL,'Laptop','HP','17-Cn0053CL','316HBUARABA','00-FF-A6-5B-9C-90','5E-61-99-5A-86-61','1',NULL);
INSERT INTO `equipment`(`id`, `tipo`, `marca`, `modelo`, `serie`, `mac_ethernet`, `mac_wifi`, `enterprise_id`,`collaborator_id`) VALUES (NULL,'Laptop','Dell','Latitude 7490','4M2CHR2','E4-B9-7A-4C-80-11','B4-69-21-75-1B-F1','1',NULL);
INSERT INTO `equipment`(`id`, `tipo`, `marca`, `modelo`, `serie`, `mac_ethernet`, `mac_wifi`, `enterprise_id`,`collaborator_id`) VALUES (NULL,'Laptop','HP','17-BY4097NR','TJ220971V2','30-24-A9-A5-13-36','D8-F8-83-05-E1-83','1',NULL);
INSERT INTO `equipment`(`id`, `tipo`, `marca`, `modelo`, `serie`, `mac_ethernet`, `mac_wifi`, `enterprise_id`,`collaborator_id`) VALUES (NULL,'All In One','Dell','Optiplex 9010','4RHY8V1','5CF9:DDDD:29D4','54SA:0930:3301','1',NULL);
INSERT INTO `equipment`(`id`, `tipo`, `marca`, `modelo`, `serie`, `mac_ethernet`, `mac_wifi`, `enterprise_id`,`collaborator_id`) VALUES (NULL,'Laptop','Dell','Vostro 3400','24W08K3','B445:067B:2D81','A893:4A62:39C3','1',NULL);
INSERT INTO `equipment`(`id`, `tipo`, `marca`, `modelo`, `serie`, `mac_ethernet`, `mac_wifi`, `enterprise_id`,`collaborator_id`) VALUES (NULL,'All In One','Dell','Optiplex 9010','4S3S8V1','5CF9:DDDC:E8DB',NULL,'1',NULL);
