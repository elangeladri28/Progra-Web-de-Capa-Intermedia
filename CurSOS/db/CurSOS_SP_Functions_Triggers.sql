-- Stored procedures
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `getChatEntero`(idprimero INT, idsegundo INT)
BEGIN
	Select id_cp, persona.usuario, mensaje, persona2.usuario as usuario2 from chatPrivado
	inner join Usuario as persona on persona.id_usuario = usuarioid
	inner join Usuario as persona2 on persona2.id_usuario = usuarioid2
	Where (usuarioid = idprimero and usuarioid2 = idsegundo) or (usuarioid = idsegundo and usuarioid2 = idprimero) order by fechamensaje desc;
END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `getPersonasChateas`(idusuario INT)
BEGIN
	SELECT usuario FROM (Select persona.usuario, mensaje from chatPrivado
		inner join Usuario as persona on persona.id_usuario = usuarioid2
		Where usuarioid = idusuario
	UNION 
	Select persona.usuario, mensaje from chatPrivado
		inner join Usuario as persona on persona.id_usuario = usuarioid
		Where usuarioid2 = idusuario) AS T3
	GROUP BY usuario;
END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `getUserByUsername`(Username VARCHAR(50))
BEGIN
	SELECT id_usuario, rol, usuario, nombre, apellidos, correo, contra, avatar FROM Usuario WHERE Usuario = Username and activo = TRUE;
END$$
DELIMITER ;

-- Funciones
SET GLOBAL log_bin_trust_function_creators = 1;
DELIMITER $$
CREATE DEFINER=`root`@`localhost` FUNCTION `TraerIDPersonaChateas`(nombre VARCHAR(255)) RETURNS int
BEGIN
	DECLARE suid INT;
	SET suid = (Select id_usuario from Usuario where usuario = nombre);
	RETURN suid;
END$$
DELIMITER ;
-- Views
use cursos;

CREATE VIEW LasCategorias AS    
SELECT `categoria`.`id_categoria`, `categoria`.`categoria`,`categoria`.`descripcion`, `categoria`.`activo` FROM `cursos`.`categoria`;

CREATE VIEW LosCursos AS    
SELECT `curso`.`id_curso`,`curso`.`nombre`,`curso`.`descripcion`,`curso`.`costo`,`curso`.`foto`,`curso`.`video`,`curso`.`categoriaid`,`curso`.`activo`,`curso`.`fechaCreado`,`curso`.`usuid`FROM `cursos`.`curso`;

CREATE VIEW LasLecciones AS    
SELECT `leccion`.`id_leccion`,`leccion`.`cursoid`,`leccion`.`nivel`,`leccion`.`archivo`,`leccion`.`foto`,`leccion`.`video`,`leccion`.`extra`,`leccion`.`activo`,`leccion`.`fechaCreado`FROM `cursos`.`leccion`;

Drop VIEW LasCategorias;

