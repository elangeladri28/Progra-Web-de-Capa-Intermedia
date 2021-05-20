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

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `aumentaSuProgreso`(idusuario int,idcurso int)
BEGIN
	DECLARE contadorLecciones INT;
    DECLARE contadorleccionesvistas INT;
    SET contadorLecciones =( Select Count(id_leccion) FROM LasLecciones WHERE cursoid = 1); -- Traemos el numero de lecciones
    SET contadorleccionesvistas = ( Select contadorLecciones from Contrata);
	Select id_cp, persona.usuario, mensaje, persona2.usuario as usuario2 from chatPrivado
	inner join Usuario as persona on persona.id_usuario = usuarioid
	inner join Usuario as persona2 on persona2.id_usuario = usuarioid2
	Where (usuarioid = idprimero and usuarioid2 = idsegundo) or (usuarioid = idsegundo and usuarioid2 = idprimero) order by fechamensaje desc;
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
DELIMITER $$
CREATE DEFINER=`root`@`localhost` FUNCTION `RevisaEstaContratado`(idusuario int,idcurso int) RETURNS int
BEGIN
	DECLARE numero INT;
	SET numero = (SELECT COUNT(id_contrata) FROM Contrata WHERE usuarioid = idusuario and cursoid = idcurso);
	RETURN numero;
END$$
DELIMITER ;
DELIMITER $$
CREATE DEFINER=`root`@`localhost` FUNCTION `RevisaSiYaTienesLasLecciones`(idusuario int,idcurso int ) RETURNS int
BEGIN
	DECLARE progresoactual DOUBLE;
    DECLARE numero int;
	SET progresoactual = (SELECT progreso FROM Contrata WHERE usuarioid = idusuario and cursoid = idcurso);
    IF progresoactual >= 100 THEN
      SET numero = 1; -- YaCompletoElCurso
	ELSE
      SET numero = 0; -- Le falta al chabon por ver
   END IF;
	RETURN numero;
END$$
DELIMITER ;
-- Triggers
DELIMITER $$

CREATE TRIGGER after_contrata_insert
AFTER INSERT
ON Contrata FOR EACH ROW
BEGIN
        DELETE FROM Carrito WHERE NEW.usuarioid = Carrito.usuarioid  AND NEW.cursoid = Carrito.cursoid;
END$$

DELIMITER ;
-- Views
use cursos;

CREATE VIEW LasCategorias AS    
SELECT `categoria`.`id_categoria`, `categoria`.`categoria`,`categoria`.`descripcion`, `categoria`.`activo` FROM `cursos`.`categoria`;

CREATE VIEW LosCursos AS    
SELECT `curso`.`id_curso`,`curso`.`nombre`,`curso`.`descripcion`,`curso`.`costo`,`curso`.`foto`,`curso`.`video`,`curso`.`categoriaid`,`curso`.`activo`,`curso`.`fechaCreado`,`curso`.`usuid`FROM `cursos`.`curso`;

DROP VIEW IF EXISTS LasLecciones;
CREATE VIEW LasLecciones AS    
SELECT `leccion`.`id_leccion`,`leccion`.`nombre`,`leccion`.`cursoid`,`leccion`.`nivel`,`leccion`.`archivo`,`leccion`.`foto`,`leccion`.`video`,`leccion`.`extra`,`leccion`.`activo`,`leccion`.`fechaCreado`FROM `cursos`.`leccion`;

CREATE VIEW ElCarrito AS    
SELECT id_carrito,Curso.nombre as NombreCurso,Usuario.nombre as NombreUsuario, usuarioid, cursoid FROM `cursos`.`carrito`
inner join Usuario on Usuario.id_usuario = Carrito.usuarioid
inner join Curso on Curso.id_curso = Carrito.cursoid;
INSERT INTO `cursos`.`carrito`(`id_carrito`,`cursoid`,`usuarioid`)VALUES(null,1,1);

CREATE VIEW LosCursosCarrito AS    
SELECT id_carrito,Curso.nombre as NombreCurso, Curso.foto as FotoCurso, Curso.descripcion as DescripcionCurso, Curso.costo as PrecioCurso, cursoid, usuarioid FROM `cursos`.`carrito`
inner join Curso on Curso.id_curso = Carrito.cursoid;

Select * from LosCursosCarrito Where usuarioid = 1;
Select * from ElCarrito Where usuarioid = 1;
Select * from ElCarrito Where usuarioid = 1 and cursoid = 1;
Select * from Carrito;
Delete from Carrito where id_carrito = 1;
Select * FROM LasLecciones WHERE id_leccion = 1;

Drop VIEW ElCarrito;
Drop VIEW LosCursosCarrito;
Drop VIEW LasCategorias;
Drop VIEW LosCursos;
