# PHP WebService
copy public.provincia ( nombre, superficie, hombres, mujeres, capital,problacion_total,idprovincia)
FROM 'C:/tpe/provincias.csv' DELIMITER ';' csv ENCODING 'latin1';

copy public.canton ( nombre, poblacion_total, idprovincia)
FROM 'C:/tpe/cantones.csv' DELIMITER ';' csv ENCODING 'latin1';