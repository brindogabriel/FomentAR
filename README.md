# FomentAR 📈
FomentAR es un sistema de gestión de sociedades de fomento que te permite llevar el control de tus actividades, clientes y pagos de manera eficiente y organizada. Este proyecto fue realizado como proyecto de fin del ultimo año de secundaria en el año 2018


<details>
  <summary>Tabla de contenidos</summary>
  <ol>
    <li>
      <a href="#fomentar">Acerca de</a>
    <li><a href="##¿Qué puedes hacer con FomentAR?">¿Qué puedes hacer con FomentAR?</a></li>
    <li><a href="#Usuarios por defecto para ingresar al sitio">Usuarios</a></li>
    <li><a href="#Versiones utilizadas 🛠️">Versiones utilizadas 🛠️</a></li>
    <li><a href="#TODO: LIST 📝">TODO: LIST 📝</a></li>
     <li><a href="#errores">ERRORES ❌</a></li>
      <li><a href="#ANOTACIONES O IDEAS 💡">ANOTACIONES O IDEAS 💡</a></li>
       <li><a href="actividades-por-cliente-con-datos-del-cliente"> ACTIVIDADES POR CLIENTE CON DATOS DEL CLIENTE 🧑‍💻</a></li>
        <li><a href="#aportes">APORTES</a></li>
  </ol>
</details>








## ¿Qué puedes hacer con FomentAR?

Con FomentAR podrás:
-   ✅ Registrar y administrar tus clientes y sus datos personales
-   🗓️ Planificar y programar actividades para tus clientes utilizando el calendario de FullCalendar integrado
-   💰 Llevar un registro de pagos y facturación de tus clientes


## Usuarios por defecto para ingresar al sitio 👨🏻‍💻

| usuario  | contraseña | rol
| ------------- |:-------------:| ------------------|
|    presidente  | presidente     | 1|
| usuario      | usuario    | 2 |

## Versiones utilizadas 🛠️

Para el desarrollo de FomentAR se han utilizado las siguientes versiones de tecnologías y frameworks:

-   Bootstrap 4.1.3 🅱️
-   DataTables Bootstrap 4 📊
-   MaterializeCSS Icons 🎨
-   Select2 💡
-   FullCalendar 🗓️

## TODO: LIST 📝
En esta sección se listan las tareas pendientes que deben ser completadas en el futuro para mejorar y ampliar las funcionalidades del sistema. Las tareas que aparecen en esta lista son sugerencias para el equipo de desarrollo de FomentAR, y se espera que se implementen en futuras versiones del sistema.

-   [ ] CRUD CATEGORIAS: Esto permitirá una mejor organización de las actividades según su tipo o temática.
-   [ ] REGISTRAR PAGOS: Esto permitirá una mejor gestión de la facturación y una mayor transparencia en el proceso de cobros.

## ERRORES ❌

-   Por ahora no hay errores 😊

### ANOTACIONES O IDEAS 💡

- 

### ACTIVIDADES POR CLIENTE CON DATOS DEL CLIENTE 🧑‍💻

Si necesitas consultar las actividades de un cliente junto con sus datos personales, puedes utilizar la siguiente consulta SQL:

```SQL
SELECT cli_act.id_actividad,cli.num_socio,cli.domicilio,cli.edad,cli.num_domicilio,cli.telefono,cli.id_genero,cli.fecha_nacimiento,cli.fecha_ingreso,cli.DNI,cli.id_cliente,cli.nombre, cli.apellido, act.nombre_actividad
FROM
clientes_actividad cli_act JOIN clientes cli ON cli_act.id_cliente = cli.id_cliente
JOIN actividades act ON cli_act.id_actividad = act.id_actividad AND cli_act.id_cliente = $id_cliente
```

## APORTES 

Si tienes alguna sugerencia o correccion para mejorar el sistema, puedes realizar la PR correspondiente!
