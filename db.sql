create database autos;
use autos;

create table ventas(
  id_ventas int(100) auto_increment primary key,
  fecha varchar(100) NULL,
  hora varchar(100) NULL,
  id_empl varchar(100) NULL,
  id_prod varchar(100) NULL,
  id_cli varchar(100) NULL,
  total varchar(100) NULL,
  cantidad varchar(100) NULL,
  precio varchar(100) NULL
);

INSERT INTO ventas (fecha, hora, id_empl, id_prod, id_cli, total, cantidad, precio)
VALUES ('2023-11-16', '14:30:00', 'E001', 'P001', 'C001', '500.00', '2', '250.00');
