/*
*		BASES DE DATOS			
* 		YUNIS CREATIVOS			
*/


------------------------------------Entidades------------------------------------

CREATE TABLE Encuesta
(
	idEncuesta INT IDENTITY(1,1) NOT NULL PRIMARY KEY,
	califPromedio decimal(4,2),	
)

CREATE TABLE ImagenFondo
(
	idFondo INT IDENTITY(1,1) NOT NULL PRIMARY KEY,
	ubicacion VARCHAR(50) NOT NULL,
	direccionImagen VARCHAR(250) NOT NULL
)

CREATE TABLE Plantilla
(
	idDiseno INT IDENTITY(1,1) NOT NULL PRIMARY KEY,
	nombrePlantilla VARCHAR(250) NOT NULL,
	colorFondo INT NOT NULL,    --Se usara funcion HEX() para pasar a hexadecimal
	colorBotones INT NOT NULL,	--Se usara funcion HEX() para pasar a hexadecimal

)

CREATE TABLE Usuario
(
	idUsuario INT IDENTITY(1,1) NOT NULL PRIMARY KEY,
	nombreUsuario VARCHAR(250) NOT NULL,
	passwd VARCHAR(250) NOT NULL,
	correo VARCHAR(250) NOT NULL,
	telefono VARCHAR(15) NOT NULL,
)



CREATE TABLE Evento
(
	idEvento INT IDENTITY(1,1) NOT NULL PRIMARY KEY,
	nombreEvento VARCHAR(250) NOT NULL,
	descripcionEvento VARCHAR(250) NOT NULL,
	fechaCreacion DATETIME NOT NULL,
	statusEvento VARCHAR(50) NOT NULL,
	idEncuesta INT FOREIGN KEY REFERENCES Encuesta(idEncuesta),
	idCliente INT FOREIGN KEY REFERENCES Usuario(idUsuario),
	idCoordinador INT FOREIGN KEY REFERENCES Usuario(idUsuario)
)

CREATE TABLE Actividad
(
	idActividad INT IDENTITY(1,1) NOT NULL PRIMARY KEY,
	Descripcion VARCHAR(250) NOT NULL,
	fechaInicio DATETIME NOT NULL,
	fechaFin DATETIME NOT NULL,
	statusActividad VARCHAR(50) NOT NULL,
	idEvento INT FOREIGN KEY REFERENCES Evento(idEvento)
)

CREATE TABLE Pais
(
	idPais INT IDENTITY(1,1) NOT NULL PRIMARY KEY,
	nombrePais VARCHAR(250)
)

CREATE TABLE Lugar
(
	idLugar INT IDENTITY(1,1) NOT NULL PRIMARY KEY,
	nombreLugar VARCHAR(250) NOT NULL,
	calle VARCHAR(250) NOT NULL,
	numero INT,
	colonia VARCHAR(250) NOT NULL,
	CP INT NOT NULL,
	ciudad VARCHAR(250) NOT NULL,
	estado VARCHAR(250) NOT NULL,
	idPais INT FOREIGN KEY REFERENCES Pais(idPais)
)

CREATE TABLE Roles
(
	idRol INT IDENTITY(1492,1) NOT NULL PRIMARY KEY,
	nombreRol VARCHAR(250) NOT NULL
)

CREATE TABLE Funcion
(
	idFuncion INT IDENTITY(1810,1) NOT NULL PRIMARY KEY,
	descripcion VARCHAR(250) NOT NULL
)

CREATE TABLE Invitado 
(
	idInvitado INT NOT NULL PRIMARY KEY, 
	fechaNacimiento DATETIME NOT NULL,
	talla VARCHAR(5),
)

CREATE TABLE Alergia
(
	idAlergia INT IDENTITY(1,1) NOT NULL PRIMARY KEY,
	descripcion VARCHAR(250) NOT NULL
)

CREATE TABLE Idioma
(
	idIdioma INT IDENTITY(1,1) NOT NULL PRIMARY KEY,
	nombreIdioma VARCHAR(250) NOT NULL
)

CREATE TABLE Estado
(
	idEstado INT IDENTITY(1,1) NOT NULL PRIMARY KEY,
	nombreEstado VARCHAR(250) NOT NULL
)




------------------------------------Tablas de relacion N a N------------------------------------

CREATE TABLE plantillaImagen
(
	idFondo INT FOREIGN KEY REFERENCES ImagenFondo(idFondo) NOT NULL,
	idDiseno INT FOREIGN KEY REFERENCES Plantilla(idDiseno) NOT NULL,
	PRIMARY KEY (idFondo, idDiseno)
)

CREATE TABLE eventoDiseno
(
	idDiseno INT FOREIGN KEY REFERENCES Plantilla(idDiseno) NOT NULL,
	idEvento INT FOREIGN KEY REFERENCES Evento(idEvento) NOT NULL,
	PRIMARY KEY (idDiseno, idEvento)
)

CREATE TABLE invitadoEvento
(
	idEvento INT FOREIGN KEY REFERENCES Evento(idEvento) NOT NULL,
	idInvitado INT FOREIGN KEY REFERENCES Invitado(idInvitado) NOT NULL,
	fechaUsuarioEvento DATETIME NOT NULL,
	PRIMARY KEY(idEvento, idInvitado) 
)

CREATE TABLE staffEvento
(
	idEvento INT FOREIGN KEY REFERENCES Evento(idEvento) NOT NULL,
	idStaff INT FOREIGN KEY REFERENCES Usuario(idUsuario) NOT NULL,
	fechaUsuarioEvento DATETIME NOT NULL,
	PRIMARY KEY(idEvento, idStaff) 
)

CREATE TABLE chat
(
	idUsuario INT FOREIGN KEY REFERENCES Usuario(idUsuario) NOT NULL,
	idEvento INT FOREIGN KEY REFERENCES Evento(idEvento) NOT NULL,
	fechaMensaje DATETIME NOT NULL,
	mensaje VARCHAR(250) NOT NULL,
	PRIMARY KEY(idUsuario, idEvento)
)

CREATE TABLE seHaceEn
(
	idActividad INT FOREIGN KEY REFERENCES Actividad(idActividad) NOT NULL,
	idLugar INT FOREIGN KEY REFERENCES Lugar(idLugar) NOT NULL,
	PRIMARY KEY (idActividad, idLugar)
)

CREATE TABLE tiene
(
	idUsuario INT FOREIGN KEY REFERENCES Usuario(idUsuario) NOT NULL,
	idRol INT FOREIGN KEY REFERENCES Roles(idRol) NOT NULL,
	fechaRol DATETIME NOT NULL,
	PRIMARY KEY (idUsuario, idRol)
)

CREATE TABLE con
(
	idRol INT FOREIGN KEY REFERENCES Roles(idRol) NOT NULL,
	idFuncion INT FOREIGN KEY REFERENCES Funcion(idFuncion) NOT NULL,
	fechaFuncion DATETIME NOT NULL,
	PRIMARY KEY (idRol, idFuncion)
)

CREATE TABLE usuarioAlergia
(
	idUsuario INT FOREIGN KEY REFERENCES Usuario(idUsuario) NOT NULL,
	idAlergia INT FOREIGN KEY REFERENCES Alergia(idAlergia) NOT NULL,
	PRIMARY KEY (idUsuario, idAlergia)
)

CREATE TABLE invitadoIdioma
(
	idUsuario INT FOREIGN KEY REFERENCES Usuario(idUsuario) NOT NULL,
	idIdioma INT FOREIGN KEY REFERENCES Idioma(idIdioma) NOT NULL,
	PRIMARY KEY (idUsuario, idIdioma)
)

CREATE TABLE invitadoEstado
(
	idUsuario INT FOREIGN KEY REFERENCES Usuario(idUsuario) NOT NULL,
	idEstado INT FOREIGN KEY REFERENCES Estado(idEstado) NOT NULL,
	PRIMARY KEY (idUsuario, idEstado)
)

/*
DROP TABLE Actividad
drop table alergia
drop table chat
drop table con
drop table encuesta
drop table estado
drop table evento
drop table eventodiseno
drop table funcion
drop table idioma
drop table imagenfondo
drop table invitado
drop table invitadoEstado
drop table invitadoEvento
drop table invitadoIdioma
drop table Lugar
drop table Pais
drop table Plantilla
drop table plantillaImagen
drop table Roles
drop table seHaceEn
drop table staffEvento
drop table tiene
drop table Usuario
drop table usuarioAlergia
*/


