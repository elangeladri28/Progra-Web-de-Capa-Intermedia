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
avatar BLOB NULL,
Constraint PK_Usuario PRIMARY KEY (id_usuario)
);

CREATE TABLE IF NOT EXISTS Categoria(
id_categoria INT AUTO_INCREMENT,
categoria VARCHAR(50) NOT NULL,
activo BOOL DEFAULT TRUE,
Constraint PK_Categoria PRIMARY KEY (id_categoria)
);

CREATE TABLE IF NOT EXISTS ComentarioUsuario(
id_cu INT AUTO_INCREMENT,
comentario VARCHAR(250) NOT NULL,
usuid INT NOT NULL,
Constraint PK_ComentarioUsuario PRIMARY KEY (id_cu),
Constraint FK_ComentarioUsuario FOREIGN KEY (usuid) REFERENCES Usuario(id_usuario)

);

CREATE TABLE IF NOT EXISTS Curso(
id_curso INT AUTO_INCREMENT,
nombre VARCHAR(255) NOT NULL,
descripcion VARCHAR(255) NOT NULL,
costo DOUBLE NOT NULL,
foto BLOB NOT NULL,
categoriaid INT NULL,
activo BOOL DEFAULT TRUE,
Constraint PK_Curso PRIMARY KEY (id_curso),
Constraint FK_Curso FOREIGN KEY (categoriaid) REFERENCES Categoria(id_categoria)
);

CREATE TABLE IF NOT EXISTS ComentarioCurso(
id_comencurs INT AUTO_INCREMENT,
comenuserid INT NOT NULL,
cursoid INT NOT NULL,
Constraint PK_ComentarioCurso PRIMARY KEY (id_comencurs),
Constraint FK_ComentarioCurso FOREIGN KEY (comenuserid) REFERENCES ComentarioUsuario(id_cu),
Constraint FK_ComentarioCurso2 FOREIGN KEY (cursoid) REFERENCES Curso(id_curso)

);

CREATE TABLE IF NOT EXISTS Contrata(
id_contrata INT AUTO_INCREMENT,
ususarioid INT NOT NULL,
cursoid INT NOT NULL,
calificacion DOUBLE NULL,
progreso DOUBLE NULL,
Constraint PK_Contrata PRIMARY KEY (id_contrata),
Constraint FK_Contrata  FOREIGN KEY(cursoid) References Curso(id_curso)
);

CREATE TABLE IF NOT EXISTS Contenido(
id_contenido INT AUTO_INCREMENT,
cursoid INT NOT NULL,
nivel INT NOT NULL,
archivo BLOB NULL,
img BLOB NULL,
video BLOB NOT NULL,
extra VARCHAR(255) NULL, /* Algun link o nota */
activo BOOL DEFAULT TRUE,
Constraint PK_Contenido PRIMARY KEY (id_contenido),
Constraint FK_Contenido  FOREIGN KEY(cursoid) References Curso(id_curso)
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
Constraint PK_chatPrivado PRIMARY KEY (id_cp),
Constraint FK_chatPrivado FOREIGN KEY (usuarioid) REFERENCES Usuario(id_usuario),
Constraint FK_chatPrivado2  FOREIGN KEY (usuarioid2) REFERENCES Usuario(id_usuario)
);


DROP TABLE chatPrivado;
DROP TABLE Carrito;
DROP TABLE Historial;
DROP TABLE Contenido;
DROP TABLE Contrata;
DROP TABLE ComentarioCurso;
DROP TABLE Curso;
DROP TABLE ComentarioUsuario;
DROP TABLE Categoria;
DROP TABLE Usuario;

INSERT INTO Usuario(usuario, correo, contra ) values('PainChip','carlos@gmail.com','1234');
SELECT * FROM Usuario;
SELECT id_usuario, rol, usuario, nombre, apellidos, correo, contra, avatar FROM Usuario WHERE id_usuario = 1;
SELECT id_usuario, rol, usuario, nombre, apellidos, correo, contra, avatar FROM Usuario WHERE correo = "123@gmail.com" ;
INSERT INTO Usuario(rol, usuario, nombre, apellidos, correo, contra)VALUES ( true, "Tanjiro", "Kamado", "Inosuke", "666@hotmail.com", "333666");
SELECT * FROM comentariousuario;
DELETE FROM Usuario WHERE id_usuario != 10;