120ac91754
inatec-nic    invitar para el repositorio github

#e64a19

create database gestadia;
use gestadia;

create table administrador(
idAdministrador int primary key auto_increment not null,
NombreCompleto varchar (100) not null,
Username varchar (50) not null,
Pass varchar(100) not null,
Estado varchar(10) not null
)ENGINE=InnoDB;

create table usuarios(
idUsuario int primary key auto_increment not null,
Nombres varchar (50) not null,
Apellidos varchar (50) not null,
Edad int not null,
EstadoCivil varchar(20) not null,
Autodescripcion varchar(250) not null,
Foto varchar(50) not null,
url varchar(100) not null,
tipo varchar(20) not null
)ENGINE=InnoDB;

create table habitaciones(
idHabitacion int primary key auto_increment not null,
Descripcion varchar (250) not null,
Precio decimal(10,2) not null,
Foto1 varchar(100) not null,         --crear una tabla para imagenes relacionada con habitaciones
Foto2 varchar(100) not null,
Foto3 varchar(100) not null,
Foto4 varchar(100) not null,
Condiciones varchar (250) not null,
Estado varchar(50) not null
)ENGINE=InnoDB;


create table reservaciones(
idReservacion int primary key auto_increment not null,
idUsuario int not null,
idHabitacion int not null,
FechaEntrada date not null,
FechaSalida date not null,
PrecioEstadia decimal(10,2) not null,
foreign key (idUsuario) references usuarios (idUsuario),
foreign key (idHabitacion) references habitaciones (idHabitacion),
)ENGINE=InnoDB;

create table servicios(
idServicio int primary key auto_increment not null,
Descripcion varchar(50) not null,
Precio decimal(10,2) not null,
Estado varchar(10) not null
)ENGINE=InnoDB;

create table detalles(
idDetalle int primary key auto_increment not null,
idHabitacion int not null,
idServicio int not null,
Total decimal(10,2) not null,
foreign key (idHabitacion) references habitaciones (idHabitacion),
foreign key (idServicio) references servicios (idServicio)
)ENGINE=InnoDB;

create table sitio(
idSitio int primary key auto_increment not null,
Descripcion varchar(50) not null,
Longitud varchar(50) not null,
Latitud varchar(50) not null
)ENGINE=InnoDB;