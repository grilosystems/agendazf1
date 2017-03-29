USE agendadb;
DELIMITER $$
CREATE PROCEDURE altaContacto(
IN nombre varchar(100), 
IN direccion varchar(200), 
IN email varchar(50), 
IN telefono varchar(15),
IN celular varchar(15))
BEGIN
insert into contacto (nombre, direccion, email, telefono, celular)
values(nombre, direccion, email, telefono, celular);
END$$