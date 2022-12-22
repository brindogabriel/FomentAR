# TODO: LIST

-   [ ] EDITAR DEPORTES DE CLIENTES (POR SI HUBO ERROR EN EL REGISTRO O SI SE REGISTRA EN OTRO DEPORTE ALGUN DIA XD) [VIDEO DE YOUTUBE](https://www.youtube.com/watch?v=KtqT68JRTMw¡)
-   [ ] PROTEGER QUERIES (PDO??)
-   [ ] VER JOINS SQL
-   [ ] ESCAPAR FORMULARIOS (EVITAR INYECCION SQL)
-   [ ] PASSWORD CON BASE64 ? O SEGUIMO CON MD5 ?

# ERRORES

-   [ ] -

# ANOTACIONES O IDEAS DE POR AHI XD

##### ACTIVIDADES POR CLIENTE CON DATOS DEL CLIENTE

```SQL
SELECT cli_act.id_actividad,cli.num_socio,cli.domicilio,cli.edad,cli.num_domicilio,cli.telefono,cli.id_genero,cli.fecha_nacimiento,cli.fecha_ingreso,cli.DNI,cli.id_cliente,cli.nombre, cli.apellido, act.nombre_actividad
FROM
clientes_actividad cli_act JOIN clientes cli ON cli_act.id_cliente = cli.id_cliente
JOIN actividades act ON cli_act.id_actividad = act.id_actividad AND cli_act.id_cliente = $id_cliente
```
