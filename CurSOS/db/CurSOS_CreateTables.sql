use cursos;

CREATE TABLE IF NOT EXISTS Usuario (
id_usuario INT AUTO_INCREMENT,
rol BOOL DEFAULT TRUE, /* True para maestro, false para alumno*/
activo BOOL DEFAULT TRUE,
usuario VARCHAR(50) UNIQUE NOT NULL,
nombre VARCHAR(50) NULL,
apellidos VARCHAR(50) NULL,
correo VARCHAR(50) NOT NULL,
contra VARCHAR(50) NOT NULL,
avatar VARCHAR(255) NULL,
Constraint PK_Usuario PRIMARY KEY (id_usuario)
);

CREATE TABLE IF NOT EXISTS Categoria(
id_categoria INT AUTO_INCREMENT,
categoria VARCHAR(50) UNIQUE NOT NULL,
descripcion VARCHAR(255) NOT NULL,
activo BOOL DEFAULT TRUE,
Constraint PK_Categoria PRIMARY KEY (id_categoria)
);

CREATE TABLE IF NOT EXISTS Curso(
id_curso INT AUTO_INCREMENT,
nombre VARCHAR(255) UNIQUE NOT NULL,
descripcion VARCHAR(255) NOT NULL,
costo DOUBLE NOT NULL,
foto VARCHAR(255) NOT NULL,
video VARCHAR(255) NOT NULL,
categoriaid INT NULL,
activo BOOL DEFAULT TRUE,
fechaCreado datetime default now(),
usuid INT NOT NULL,
Constraint PK_Curso PRIMARY KEY (id_curso),
Constraint FK_Curso FOREIGN KEY (categoriaid) REFERENCES Categoria(id_categoria),
Constraint FK_Curso2 FOREIGN KEY (usuid) REFERENCES Usuario(id_usuario)
);

CREATE TABLE IF NOT EXISTS ComentarioCurso(
id_comencurs INT AUTO_INCREMENT,
cursoid INT NOT NULL,
comentario VARCHAR(255) NOT NULL,
usuid INT NOT NULL,
Constraint PK_ComentarioCurso PRIMARY KEY (id_comencurs),
Constraint FK_ComentarioCurso2 FOREIGN KEY (cursoid) REFERENCES Curso(id_curso),
Constraint FK_ComentarioCurso3 FOREIGN KEY (usuid) REFERENCES Usuario(id_usuario)
);

CREATE TABLE IF NOT EXISTS Contrata(
id_contrata INT AUTO_INCREMENT,
usuarioid INT NOT NULL,
cursoid INT NOT NULL,
calificacioncurso DOUBLE NULL,
progreso DOUBLE NULL,
Constraint PK_Contrata PRIMARY KEY (id_contrata),
Constraint FK_Contrata  FOREIGN KEY(cursoid) References Curso(id_curso),
Constraint FK_Contrata2  FOREIGN KEY(usuarioid) References Usuario(id_usuario)
);

CREATE TABLE IF NOT EXISTS Leccion( 
id_leccion INT AUTO_INCREMENT,
nombre VARCHAR(255) NOT NULL,
cursoid INT NOT NULL,
nivel INT NOT NULL,
archivo VARCHAR(255) NULL,
foto  VARCHAR(255) NULL,
video VARCHAR(255) NOT NULL,
extra VARCHAR(255) NULL, /* Algun link o nota */
activo BOOL DEFAULT TRUE,
fechaCreado datetime default now(),
Constraint PK_Leccion PRIMARY KEY (id_leccion),
Constraint FK_Leccion  FOREIGN KEY(cursoid) References Curso(id_curso)
);


CREATE TABLE IF NOT EXISTS Historial(
id_historial INT AUTO_INCREMENT,
cursoid INT NOT NUll,
usuarioid INT NOT NULL,
Constraint PK_Historial PRIMARY KEY (id_historial),
Constraint FK_Historial  FOREIGN KEY (usuarioid) REFERENCES Usuario(id_usuario),
Constraint FK_Historial2  FOREIGN KEY (cursoid) REFERENCES Curso(id_curso)
);

CREATE TABLE IF NOT EXISTS Carrito(
id_carrito INT AUTO_INCREMENT,
cursoid INT NOT NUll,
usuarioid INT NOT NULL,
Constraint PK_Carrito PRIMARY KEY (id_carrito),
Constraint FK_Carrito  FOREIGN KEY (usuarioid) REFERENCES Usuario(id_usuario),
Constraint FK_Carrito2  FOREIGN KEY (cursoid) REFERENCES Curso(id_curso)
);

CREATE TABLE IF NOT EXISTS chatPrivado(
id_cp INT AUTO_INCREMENT,
mensaje VARCHAR(255) NOT NULL,
usuarioid INT NOT NULL,
usuarioid2 INT NOT NULL,
fechamensaje DATETIME NULL,
Constraint PK_chatPrivado PRIMARY KEY (id_cp),
Constraint FK_chatPrivado FOREIGN KEY (usuarioid) REFERENCES Usuario(id_usuario),
Constraint FK_chatPrivado2  FOREIGN KEY (usuarioid2) REFERENCES Usuario(id_usuario)
);

DROP TABLE chatPrivado;
DROP TABLE Carrito;
DROP TABLE Historial;
DROP TABLE Leccion;
DROP TABLE Contrata;
DROP TABLE ComentarioCurso;
DROP TABLE Curso;
DROP TABLE Categoria;
DROP TABLE Usuario;

SELECT * FROM Usuario;
SELECT * FROM comentariousuario;
SELECT * FROM curso;
Select * FROM LasCategorias;
Select * FROM LosCursos WHERE usuid = 1;
Select * FROM LosCursos ORDER BY fechaCreado ASC LIMIT 3;
Select * FROM LasLecciones WHERE id_leccion = 1;

Select * from chatPrivado;
INSERT INTO `cursos`.`chatprivado`(`id_cp`,`mensaje`,`usuarioid`,`usuarioid2`,`fechamensaje`)
VALUES(null,"QueOnda",1,2,now());
INSERT INTO `cursos`.`chatprivado`(`id_cp`,`mensaje`,`usuarioid`,`usuarioid2`,`fechamensaje`)
VALUES(null,"QuechingaosQuieres",2,1,now());



SET GLOBAL log_bin_trust_function_creators = 1;
DELIMITER //
CREATE TRIGGER FechaMensajeEnviado
AFTER INSERT
   ON chatPrivado FOR EACH ROW
BEGIN
  declare idmensaje INT;
  SELECT id_cp FROM INSERTED into idmensaje;
  UPDATE chatPrivado SET fechamensaje = now() WHERE id_cp = idmensaje;
END; //

DELIMITER ;

DROP TRIGGER FechaMensajeEnviado;

Select TraerIDPersonaChateas('PainChip') as resultado;

CALL `cursos`.`getChatEntero`(1, 2);

CALL `cursos`.`getPersonasChateas`(1);

INSERT INTO `cursos`.`categoria`(`id_categoria`,`categoria`,`descripcion`,`activo`)
VALUES(null,'PHP2','Cursos de PHP2',1);
SELECT id_categoria AS LastID FROM categoria WHERE id_categoria = @@Identity;



TRUNCATE TABLE categoria;
Delete from categoria where id_categoria != 10;





