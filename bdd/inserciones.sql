use logikw;

insert into usuario (user, pass, rol, telefono, nombre) values
('manu32', '123', 'administrador', '46124538', 'Manuel Rojas'),
('nachoC', '111', 'administrador', '46124538', 'Ignacio Iclar'),
('diasa', '123', 'cliente', '46124538', 'Macarena Luffi'),
('mob', '123', 'cliente', '46124538', 'Rosa Rosales'),
('hectord', '1234', 'chofer', '46124538', 'Hector Heredia'),
('pepe1970', '1234', 'chofer', '46124538', 'Jose Fernandez'),
('marcequespe', '1234', 'mecanico', '46124538', 'Marcelo Quespe'),
('mauris', '1234', 'mecanico', '46124538', 'Mauricio Sosa'),
('carbu', '1234', 'empresa', '46124538', 'Romina Gala'),
('ceroc', '1234', 'empresa', '46124538', 'Flavio Crismanich');

INSERT INTO administrador (dni_administrador, domicilio, email, id_usuario) VALUES 
('36555123', 'laferrere 5667', 'manu_lafe@gmail.com',1),
('38555123', 'salta 5367', 'nachoC10@gmail.com',2);

insert into cliente (razon_social, telefono, domicilio, email, id_usuario) values
('Dia S.A', '451215','donizeti 5847','jp15@gmail.com',3),
('Easy S.A', '444215','san jose 452','san_jose@gmail.com',4);

insert into chofer (dni_chofer, fecha_nacimiento, tipo_licencia_de_conducir, id_usuario) values
('222222222', '1980-05-06','a5',5),
('333333333', '1970-05-07','a5',6);

insert into mecanico (dni_mecanico, id_usuario) values
('111111112',7),
('222222221',8);

INSERT into empresa (telefono, domicilio, id_usuario)values
('123456', 'antoño machado',9),
('123456', 'Cañada de gomez',10);

INSERT into viaje (origen, destino, tipo_de_carga, fecha_de_salida_prevista,
fecha_de_llegada_prevista, tiempo_estimado, fecha_de_salida_real, fecha_de_llegada_real,
tiempo_real, km_recorridos_previstos, desviacion_km, combustible_consumido_estimado,
combustible_consumido_real, id_administrador, id_chofer)values
('san juan','buenos aires','Granel Sólido','2017-10-05','2017-10-10',120, '2017-10-05','2017-10-11',130,1300,5,300,350,1,1),
('la pampa','san luis','Granel Sólido','2017-11-05','2017-11-08',100,'2017-11-05','2017-11-09',105,1000,1,400,380,2,2);

INSERT into vehiculo (patente, nro_chasis, nro_motor, marca, modelo, anio_fabricacion)values
('ab 123 cd','10',20,'ford','j2001',2000),
('ik 456 pl','25',55,'chevrolet','h201',2002);

INSERT into viaje_chofer (id_viaje, id_chofer)values
(1,1),
(2,2);

INSERT into viaje_vehiculo (id_vehiculo, id_viaje)values
(1,1),
(2,2);

INSERT into mantenimiento (fecha_service ,km_de_la_unidad, costo, tipo, repuestos_cambiados, id_empresa, id_vehiculo) values
('2017-05-04',150000,20000,'externo','valvula,tubo de escape',1,1),
('2017-04-04',300000,50000,'externo','motor',2,2);

INSERT into reporte_chofer (fecha, combustible_cargado, importe_combustible, ubicacion, 
km_unidad, id_chofer, id_viaje) values
('2017-09-04',10,500,'san justo',13000,1,1), 
('2017-11-04',100,5000,'temperley',130000,2,2);