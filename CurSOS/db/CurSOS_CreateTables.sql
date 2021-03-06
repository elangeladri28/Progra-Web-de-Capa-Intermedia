use cursos;

DROP TABLE IF EXISTS chatPrivado;
DROP TABLE IF EXISTS Carrito;
DROP TABLE IF EXISTS Historial;
DROP TABLE IF EXISTS Leccion;
DROP TABLE IF EXISTS Contrata;
DROP TABLE IF EXISTS ComentarioCurso;
DROP TABLE IF EXISTS Curso;
DROP TABLE IF EXISTS Categoria;
DROP TABLE IF EXISTS Usuario;

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
calificacioncurso DOUBLE DEFAULT 0,
contadorLecciones INT DEFAULT 0,
progreso DOUBLE DEFAULT 0,
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
fechaBuscado datetime default now(),
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



