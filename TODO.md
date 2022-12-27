# TODO: LIST

-   [ ] CRUD CATEGORIAS ?
-   [ ] REGISTRAR PAGOS ?

# ERRORES

-   [ ] -

# ANOTACIONES O IDEAS DE POR AHI XD

[full calendar con mysql y php](https://www.nicesnippets.com/blog/how-to-use-full-calendar-with-mysql-in-php)

##### ACTIVIDADES POR CLIENTE CON DATOS DEL CLIENTE

```SQL
SELECT cli_act.id_actividad,cli.num_socio,cli.domicilio,cli.edad,cli.num_domicilio,cli.telefono,cli.id_genero,cli.fecha_nacimiento,cli.fecha_ingreso,cli.DNI,cli.id_cliente,cli.nombre, cli.apellido, act.nombre_actividad
FROM
clientes_actividad cli_act JOIN clientes cli ON cli_act.id_cliente = cli.id_cliente
JOIN actividades act ON cli_act.id_actividad = act.id_actividad AND cli_act.id_cliente = $id_cliente
```
