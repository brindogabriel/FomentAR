# FomentAR

-   Proyecto de 7mo de secundaria (2018)

# TODO: LIST

-   [ ] CRUD CATEGORIAS ?
-   [ ] REGISTRAR PAGOS ?

## Versiones utilizadas

| Bootstrap                                                                                       | DataTables                                                                                           | MaterializeCSS                                                                       | Select2                                   |
| ----------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------- | ------------------------------------------------------------------------------------ | ----------------------------------------- |
| [4.1.3](https://getbootstrap.com/docs/4.1/getting-started/introduction/ "Versión de Bootstrap") | [DataTables Bootstrap 4](https://datatables.net/examples/styling/bootstrap4 "Versión de DataTables") | [MaterializeCSS Icons](https://materializecss.com/icons.html "MaterializeCSS Icons") | [Select2](https://select2.org/ "Select2") |

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
