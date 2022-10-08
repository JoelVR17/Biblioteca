CREATE DATABASE Biblioteca;
USE Biblioteca;

CREATE TABLE rol (
	id_rol int primary key not null,
    descripcion varchar(10) not null
);

INSERT INTO rol (id_rol, descripcion) 
VALUES 
(1, "user"), (2, "admin");

CREATE TABLE usuario (
	id_usuario int primary key auto_increment not null,
    id_rol int not null,
    nombre varchar(40) not null,
    cedula varchar(10) not null,
    usuario varchar(40) not null,
    pwd varchar(500) not null,
    foreign key fk_id_rol (id_rol) references rol(id_rol)
);

INSERT INTO usuario (id_rol, nombre, cedula, usuario, pwd)
VALUES 
(1,"Joel","504510629","joelvr","joel123"),
(2,"Marvin","502030790","marvinvr","marvin123");
