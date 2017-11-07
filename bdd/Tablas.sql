drop database logikw;
create database logikw;
use logikw;

create table administrador(
id int AUTO_INCREMENT primary key,
dni_administrador varchar(20) unique,
domicilio varchar (30),
email varchar(30)
);


create table cliente(
id int AUTO_INCREMENT primary key,
razon_social varchar(30) unique, 
telefono int (10),
domicilio varchar (20),
email varchar(30)
);

create table chofer(
id int AUTO_INCREMENT primary key,
dni_chofer varchar(20) unique, 
fecha_de_nacimiento date,
tipo_licencia_de_conducir varchar(20)
);


create table mecanico(
id int AUTO_INCREMENT primary key,
dni_mecanico varchar(20) unique
);

create table empresa(
id int AUTO_INCREMENT primary key,
telefono varchar(20),
domicilio varchar(20)
);

create table usuario(
id int auto_increment primary key,
user varchar(20) unique,
pass varchar(20),
rol varchar(20),
telefono varchar(30),
nombre varchar(50),
id_administrador int,
id_mecanico int,
id_empresa int,
id_chofer int,
id_cliente int,
foreign key(id_administrador) references administrador(id),
foreign key(id_mecanico) references mecanico(id),
foreign key(id_empresa) references empresa(id),
foreign key(id_chofer) references chofer(id),
foreign key(id_cliente) references cliente(id)
);


create table viaje(
id int auto_increment  primary key,
origen varchar(20),
destino varchar(20),
tipo_de_carga varchar(30),
fecha_de_salida_prevista date,
fecha_de_llegada_prevista date,
tiempo_estimado int,
fecha_de_salida_real date,
fecha_de_llegada_real date,
tiempo_real int,
km_recorridos_previstos int,
desviacion_km int ,
combustible_consumido_estimado  int,
combustible_consumido_real int,
id_administrador int,
foreign key(id_administrador) references administrador(id),
foreign key(id_chofer) references chofer(id)
);

create table vehiculo(
id int AUTO_INCREMENT  primary key,
patente varchar(20) unique,
nro_chasis varchar(20) unique,
nro_motor int unique,
marca varchar(20),
modelo varchar(20),
anio_fabricacion int
);


create table viaje_chofer(
id_viaje int,
id_chofer int ,
foreign key(id_chofer) references chofer(id),
foreign key(id_viaje) references viaje(id)
);


create table viaje_vehiculo(
id_vehiculo int,
id_viaje int ,
foreign key(id_vehiculo) references vehiculo(id),
foreign key(id_viaje) references viaje(id)
);

create table mantenimiento(
id int auto_increment primary key,
fecha_service date,
km_de_la_unidad int,
costo double,
tipo varchar(20),
repuestos_cambiados varchar(50),
id_empresa int,
id_mecanico int,
id_vehiculo int,
foreign key(id_empresa) references empresa(id),
foreign key(id_mecanico) references mecanico(id),
foreign key(id_vehiculo) references vehiculo(id)
);


create table reporte_chofer(
id int auto_increment primary key,
fecha date,
combustible_cargado int,
importe_combustible int,
ubicacion varchar(20),
km_unidad int,
id_chofer int ,
id_viaje int ,
foreign key(id_chofer) references chofer(id),
foreign key(id_viaje) references viaje(id)
);