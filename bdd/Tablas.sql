drop database if exists LogIkw;

create database if not exists LogIkw;

use LogIkw;


create table administrador(
id_administrador int AUTO_INCREMENT primary key,
dni_administrador int unique,
usuario varchar(20) unique,
pass varchar(20),
nombre varchar(20),
apellido varchar(20),
telefono int (10),
domicilio varchar (30),
email varchar(30)
);


create table cliente(
id_cliente int AUTO_INCREMENT primary key,
razon_social varchar(30) unique, 
usuario varchar(20) unique,
pass varchar(20),
nombre varchar(20),
telefono int (10),
domicilio varchar (20),
email varchar(30)
);

create table chofer(
id_chofer int AUTO_INCREMENT primary key,
dni_chofer int unique, 
usuario varchar(20) unique,
pass varchar(20),
nombre varchar(20),
apellido varchar(20),
fecha_de_nacimiento date,
tipo_licencia_de_conducir varchar(20)
);


create table mecanico(
id_mecanico int AUTO_INCREMENT primary key,
dni_mecanico int unique,
usuario varchar(20) unique,
pass varchar(20),
nombre varchar(20),
apellido varchar(20)
);


create table viaje(
id_viaje int AUTO_INCREMENT  primary key,
id_administrador int,
origen varchar(20),
destino varchar(20),
tipo_de_carga varchar(20),
fecha_de_salida_prevista date,
fecha_de_llegada_prevista date,
tiempo_estimado int,
fecha_de_salida_real date,
fecha_de_llegada_real date,
tiempo_real int,
km_recorridos_previstos int,
desviacion_km int ,
combustible_consumido_estimado  int,
combustible_consumido_real int
);

create table vehiculo(
id_vehiculo int AUTO_INCREMENT  primary key,
patente varchar(20) unique,
nro_chasis int unique,
nro_motor int unique,
marca varchar(20),
modelo varchar(20),
año_fabricacion int
);


create table viaje_chofer(
id_viaje int,
id_chofer int ,
primary key(id_viaje,id_chofer)
);


create table viaje_vehiculo(
id_vehiculo int,
id_viaje int ,
primary key(id_viaje,id_vehiculo)
);


create table empresa(
id_empresa int AUTO_INCREMENT primary key,
nombre varchar(20),
telefono varchar(20),
domicilio varchar(20)
);

create table mantenimiento(
id_mantenimiento int  AUTO_INCREMENT primary key,
id_empresa int,
id_mecanico int,
patente varchar(20),
nro_chasis int,
nro_motor int,
fecha_service date,
km_de_la_unidad int,
costo int,
tipo varchar(20),
repuestos_cambiados varchar(50)
);


create table reporte_chofer(
id_reporte int auto_increment primary key,
id_chofer int ,
id_viaje int ,
fecha date,
combustible_cargado int,
importe_combustible int,
ubicacion varchar(20),
km_unidad int

);