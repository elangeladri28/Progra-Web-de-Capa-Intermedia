use cursos;
-- Stored procedures
DROP PROCEDURE IF EXISTS getChatEntero;
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `getChatEntero`(idprimero INT, idsegundo INT)
BEGIN
	Select id_cp, persona.usuario, mensaje, persona2.usuario as usuario2 from chatPrivado
	inner join Usuario as persona on persona.id_usuario = usuarioid
	inner join Usuario as persona2 on persona2.id_usuario = usuarioid2
	Where (usuarioid = idprimero and usuarioid2 = idsegundo) or (usuarioid = idsegundo and usuarioid2 = idprimero) order by fechamensaje desc;
END$$
DELIMITER ;

DROP PROCEDURE IF EXISTS getCursoVentas;
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `getCursoVentas`(idcurso INT)
BEGIN	

    Select nombre,
    (Select Count(usuarioid) from Contrata where cursoid = idcurso) as cantidad_personas,
    ((Select Count(usuarioid) from Contrata where cursoid = idcurso) * (Select costo from Curso where id_curso = idcurso)) as cantidad_total from Curso WHERE id_curso = idcurso;
END$$
DELIMITER ;

DROP PROCEDURE IF EXISTS ContadorContratados;
DELIMITER $$
CREATE DEFINER=`root`@`localhost` FUNCTION `ContadorContratados`(idcurso int) RETURNS int
BEGIN
	DECLARE numero INT;
	SET numero = (SELECT COUNT(cursoid) FROM Contrata WHERE cursoid = idcurso);
	RETURN numero;
END$$
DELIMITER ;

DROP PROCEDURE IF EXISTS getPersonasChateas;
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

DROP PROCEDURE IF EXISTS getUserByUsername;
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `getUserByUsername`(Username VARCHAR(50))
BEGIN
	SELECT id_usuario, rol, usuario, nombre, apellidos, correo, contra, avatar FROM Usuario WHERE Usuario = Username and activo = TRUE;
END$$
DELIMITER ;

DROP PROCEDURE IF EXISTS aumentaSuProgreso;
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `aumentaSuProgreso`(idusuario int,idcurso int)
BEGIN
	DECLARE cuentamelasLecciones INT;
    DECLARE contadorleccionesvistas INT;
    DECLARE progresoactual DOUBLE;
    SET cuentamelasLecciones = ( Select Count(id_leccion) FROM LasLecciones WHERE cursoid = idcurso); -- Traemos el numero de lecciones
    SET contadorleccionesvistas = ( Select contadorLecciones from Contrata WHERE usuarioid = idusuario and cursoid = idcurso)+1;
    SET progresoactual = contadorleccionesvistas * 100 / cuentamelasLecciones;
	UPDATE Contrata SET progreso = progresoactual, contadorLecciones = contadorleccionesvistas WHERE usuarioid = idusuario and cursoid = idcurso;
END$$
DELIMITER ;

-- Funciones
SET GLOBAL log_bin_trust_function_creators = 1;

DROP FUNCTION IF EXISTS TraerIDPersonaChateas;
DELIMITER $$
CREATE DEFINER=`root`@`localhost` FUNCTION `TraerIDPersonaChateas`(nombre VARCHAR(255)) RETURNS int
BEGIN
	DECLARE suid INT;
	SET suid = (Select id_usuario from Usuario where usuario = nombre);
	RETURN suid;
END$$
DELIMITER ;

DROP FUNCTION IF EXISTS RevisaEstaContratado;
DELIMITER $$
CREATE DEFINER=`root`@`localhost` FUNCTION `RevisaEstaContratado`(idusuario int,idcurso int) RETURNS int
BEGIN
	DECLARE numero INT;
	SET numero = (SELECT COUNT(id_contrata) FROM Contrata WHERE usuarioid = idusuario and cursoid = idcurso);
	RETURN numero;
END$$
DELIMITER ;

DROP FUNCTION IF EXISTS RevisaSiYaTienesLasLecciones;
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

DELIMITER $$
CREATE TRIGGER after_contrata_insert2
AFTER INSERT
ON Contrata FOR EACH ROW
BEGIN
        INSERT INTO `cursos`.`historial`(`id_historial`,`cursoid`,`usuarioid`)VALUES(null,NEW.cursoid,NEW.usuarioid);
END$$
DELIMITER ;

-- Views

DROP VIEW IF EXISTS LasCategorias;
CREATE VIEW LasCategorias AS    
SELECT `categoria`.`id_categoria`, `categoria`.`categoria`,`categoria`.`descripcion`, `categoria`.`activo` FROM `cursos`.`categoria`;

DROP VIEW IF EXISTS LasCategorias;
CREATE VIEW LosCursos AS    
SELECT `curso`.`id_curso`,`curso`.`nombre`,`curso`.`descripcion`,`curso`.`costo`,`curso`.`foto`,`curso`.`video`,`curso`.`categoriaid`,`curso`.`activo`,`curso`.`fechaCreado`,`curso`.`usuid`FROM `cursos`.`curso`;

DROP VIEW IF EXISTS LosCursosBuscados;
CREATE VIEW LosCursosBuscados AS    
SELECT `curso`.`id_curso`,`curso`.`nombre`,`curso`.`descripcion`,`curso`.`costo`,`curso`.`foto`,`curso`.`video`,`curso`.`categoriaid`,`curso`.`activo`,`curso`.`fechaCreado`,`curso`.`usuid`,Usuario.nombre as CreadorCurso FROM `cursos`.`curso`
inner join Usuario on Usuario.id_usuario = curso.usuid;

DROP VIEW IF EXISTS HistorialDeCursos;
CREATE VIEW HistorialDeCursos AS    
SELECT curso.id_curso,curso.nombre,curso.descripcion,curso.costo,curso.foto,curso.video,curso.categoriaid,curso.activo,curso.fechaCreado,curso.usuid, Usuario.usuario as CreadorCurso, usuarioid FROM Historial
inner join curso on curso.usuid = Historial.cursoid
inner join Usuario on Usuario.id_usuario = Curso.usuid;

DROP VIEW IF EXISTS LasLecciones;
CREATE VIEW LasLecciones AS    
SELECT `leccion`.`id_leccion`,`leccion`.`nombre`,`leccion`.`cursoid`,`leccion`.`nivel`,`leccion`.`archivo`,`leccion`.`foto`,`leccion`.`video`,`leccion`.`extra`,`leccion`.`activo`,`leccion`.`fechaCreado`FROM `cursos`.`leccion`;

DROP VIEW IF EXISTS ElCarrito;
CREATE VIEW ElCarrito AS    
SELECT id_carrito,Curso.nombre as NombreCurso,Usuario.nombre as NombreUsuario, usuarioid, cursoid FROM `cursos`.`carrito`
inner join Usuario on Usuario.id_usuario = Carrito.usuarioid
inner join Curso on Curso.id_curso = Carrito.cursoid;
INSERT INTO `cursos`.`carrito`(`id_carrito`,`cursoid`,`usuarioid`)VALUES(null,1,1);

DROP VIEW IF EXISTS LosCursosCarrito;
CREATE VIEW LosCursosCarrito AS    
SELECT id_carrito,Curso.nombre as NombreCurso, Curso.foto as FotoCurso, Curso.descripcion as DescripcionCurso, Curso.costo as PrecioCurso, cursoid, usuarioid FROM `cursos`.`carrito`
inner join Curso on Curso.id_curso = Carrito.cursoid;

DROP VIEW IF EXISTS ComentariosDelCurso;
CREATE VIEW ComentariosDelCurso AS    
SELECT id_comencurs,cursoid, comentario, Usuario.nombre as NombreUsuario, usuid FROM `cursos`.`ComentarioCurso`
inner join Usuario on Usuario.id_usuario = ComentarioCurso.usuid;

DROP VIEW IF EXISTS CursosDelUsuario;
CREATE VIEW CursosDelUsuario AS    
SELECT `contrata`.`id_contrata`,`contrata`.`usuarioid`,`contrata`.`cursoid`,`contrata`.`calificacioncurso`,`contrata`.`progreso`,Curso.nombre as Nombrecurso FROM `cursos`.`contrata`
inner join Curso on Curso.id_curso = Contrata.cursoid;

