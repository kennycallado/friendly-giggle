DROP DATABASE IF EXISTS cerveceria;
CREATE DATABASE IF NOT EXISTS cerveceria;

USE cerveceria;

CREATE TABLE t_cerveza (
  cer_marca varchar(20) PRIMARY KEY,
  cer_graduacion int,
  cer_color varchar(15),
  cer_composicion varchar(255),
  cer_ano_lanza int,
  cer_pais_orig varchar(20)
);

INSERT INTO t_cerveza VALUES
  ( 'alhambra', 4, 'rubia', 'trigo', '1900', 'spain'),
  ( 'budweiser', 3, 'rubia', 'trigo', '1870', 'eeuu'),
  ( 'heineken', 5, 'rubia', 'trigo', '1864', 'holand'),
  ( 'mahou', 4, 'rubia', 'malta', '1890', 'spain'),
  ( 'cruzcampo', 4, 'rubia', 'trigo', '1904', 'spain'),
  ( 'guinness', 4, 'negra', 'centeno', '1850', 'uk');
