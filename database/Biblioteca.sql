CREATE DATABASE Biblioteca;
USE Biblioteca;

CREATE TABLE rol (
	id_rol int primary key not null,
    descripcion varchar(10) not null
);

INSERT INTO rol (id_rol, descripcion) 
VALUES 
(1, "user"), (2, "admin");

CREATE TABLE usuarios (
	id_usuario int primary key auto_increment not null,
    id_rol int not null,
    nombre varchar(40) not null,
    cedula varchar(10) not null,
    usuario varchar(40) not null,
    pwd varchar(500) not null,
    foreign key fk_id_rol (id_rol) references rol(id_rol)
);

INSERT INTO usuarios (id_rol, nombre, cedula, usuario, pwd)
VALUES 
(1,"Joel","504510629","joelvr","joel123"),
(2,"Administrador","1","admin","admin123");

CREATE TABLE libros (
	id_libro int primary key auto_increment not null,
    id_usuario int not null,
    titulo varchar(50) not null,
    autor varchar(50) not null,
    categoria varchar(50) not null,
    fecha_publicacion varchar(50) not null,
    descripcion varchar(100) not null,
    img varchar(200) not null,
    estado varchar(30) not null,
    foreign key fk_id_usuario (id_usuario) references usuarios(id_usuario)
);


INSERT INTO libros (id_usuario, titulo, autor, categoria, fecha_publicacion, descripcion, img, estado)
VALUES 
(4,"Biblia","Dios","Vida","1960", "Conjunto de libro1s que son el manual de la vida del humano", "dsaaaaaaasdwqwqe12313"),
(5,"Harry Potter","Steven","Magia","2012", "Magia y brujos", "hjgfhjg313");

SELECT COUNT(*) FROM usuarios WHERE usuario = 'damaris'







