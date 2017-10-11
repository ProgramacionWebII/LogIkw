use LogIkw;


INSERT into administrador(dni_administrador,usuario,pass,nombre,apellido,telefono,domicilio,email) values
(36555123,'manu32','123','manuel','dominguez',4522215,'laferrere 5667','manu_lafe@gmail.com'),
(38555123,'nachoC','111','ignacio','perez',444455,'salta 5367','nachoC10@gmail.com');


INSERT into cliente(razon_social, usuario, pass, nombre,telefono,domicilio,email) values
('Dia S.A','diasa', '123','juan',451215,'donizeti 5847','jp15@gmail.com'),
('Easy S.A','mob', '123','pedro',444215,'san jose 452','san_jose@gmail.com');

INSERT into chofer(dni_chofer, usuario, pass, nombre, apellido,fecha_de_nacimiento,tipo_licencia_de_conducir) values
(222222222,'hectord','1234','hector','diaz','1980-05-06','a5'),
(333333333,'pepe1970','1234','pepe','castañeda','1970-05-07','a5');

INSERT into viaje(id_administrador,origen,destino,tipo_de_carga,fecha_de_salida_prevista,fecha_de_llegada_prevista,tiempo_estimado,
fecha_de_salida_real,fecha_de_llegada_real,tiempo_real,km_recorridos_previstos,desviacion_km,combustible_consumido_estimado,combustible_consumido_real) values
(1,'san juan','buenos aires','Granel Sólido','2017-10-05','2017-10-10',120,
'2017-10-05','2017-10-11',130,1300,5,300,350),
(2,'la pampa','san luis','Granel Sólido','2017-11-05','2017-11-08',100,
'2017-11-05','2017-11-09',105,1000,1,400,380);


INSERT into vehiculo(patente,nro_chasis,nro_motor,marca,modelo,año_fabricacion) values
('ab 123 cd','10',20,'ford','j2001',2000),
('ik 456 pl','25',55,'chevrolet','h201',2002);


INSERT into mecanico(dni_mecanico,usuario, pass,nombre,apellido) values
(111111112,'marcequespe','1234','marcelo','quispe'),
(222222221,'mauris','1234','mauricio','santillan');


INSERT into viaje_chofer(id_viaje,id_chofer) values
(5,1),
(2,2);


INSERT into viaje_vehiculo(id_viaje,id_vehiculo) values
(1,5),
(2,9);


INSERT into mantenimiento(id_empresa,id_mecanico,patente ,nro_chasis ,nro_motor ,fecha_service,km_de_la_unidad ,costo,tipo,repuestos_cambiados) values

(1,1,'ab 123 cd',10,20,'2017-05-04',150000,20000,'externo','valvula,tubo de escape'),
(2,2,'kd 456 rr',20,10,'2017-04-04',300000,50000,'externo','motor');

INSERT into reporte_chofer(id_chofer,id_viaje,fecha,combustible_cargado,importe_combustible,ubicacion,km_unidad) values
(1,2,'2017-09-04',10,500,'san justo',13000), 
(2,1,'2017-11-04',100,5000,'temperley',130000);