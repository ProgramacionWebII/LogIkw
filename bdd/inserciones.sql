use logikw;

INSERT INTO administrador VALUES 
('36555123', 'laferrere 5667', 'manu_lafe@gmail.com'),
('38555123', 'salta 5367', 'nachoC10@gmail.com');

insert into cliente values
('Dia S.A', '451215','donizeti 5847','jp15@gmail.com'),
('Easy S.A', '444215','san jose 452','san_jose@gmail.com');

insert into chofer values
('222222222', '1980-05-06','a5'),
('333333333', '1970-05-07','a5');

insert into mecanico values
('111111112'),
('222222221');

INSERT into empresa values
('123456', 'antoño machado'),
('123456', 'Cañada de gomez');

INSERT into viaje values
('san juan','buenos aires','Granel Sólido','2017-10-05','2017-10-10',120, '2017-10-05','2017-10-11',130,1300,5,300,350,1),
('la pampa','san luis','Granel Sólido','2017-11-05','2017-11-08',100,'2017-11-05','2017-11-09',105,1000,1,400,380,2);

INSERT into vehiculo values
('ab 123 cd','10',20,'ford','j2001',2000),
('ik 456 pl','25',55,'chevrolet','h201',2002);

INSERT into viaje_chofer values
(1,1),
(2,2);

INSERT into viaje_vehiculo values
(1,1),
(2,2);

INSERT into mantenimiento (fecha_service ,km_de_la_unidad, costo, tipo, repuestos_cambiados, id_empresa, id_vehiculo) values
('2017-05-04',150000,20000,'externo','valvula,tubo de escape',1,1),
('2017-04-04',300000,50000,'externo','motor',2,2);

INSERT into reporte_chofer values
('2017-09-04',10,500,'san justo',13000,1,1), 
('2017-11-04',100,5000,'temperley',130000,2,2);