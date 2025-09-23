# FomentAR 📈

**FomentAR** es un sistema de gestión de sociedades de fomento que te permite llevar el control de tus actividades, clientes y pagos de manera eficiente y organizada. Este proyecto fue realizado como proyecto de fin del ultimo año de secundaria en el año 2018 cocreado con <a href="https://github.com/Cris-1320" target="_blank">@Cris-1320</a>

## ¿Qué puedes hacer con FomentAR?

Con FomentAR podrás:

-   ✅ Registrar y administrar tus clientes y sus datos personales
-   🗓️ Planificar y programar actividades para tus clientes utilizando el calendario de FullCalendar integrado
-   💰 Llevar un registro de pagos y facturación de tus clientes

> [!IMPORTANT]
> ## Versiones utilizadas 🛠️
> 
> Para el desarrollo de FomentAR se han utilizado las siguientes versiones de tecnologías y frameworks:
> 
> -   Bootstrap 4.1.3 🅱️
> -   DataTables Bootstrap 4 📊
> -   MaterializeCSS Icons 🎨
> -   Select2 💡
> -   FullCalendar 🗓️

> [!NOTE]
>  ## USUARIOS Y CONTRASEÑAS PRECONFIGURADAS 	
>  
>  |  USUARIO 	|  CONTRASEÑA | ROL |
>  |:-------------:|:-------------:|:-------------:|
>  |  presidente 	|  presidente 	|  1 - presidente |	
>  |   admin	|  admin  	| 2 - admin |





## TODO: LIST 📝

En esta sección se listan las tareas pendientes que deben ser completadas en el futuro para mejorar y ampliar las funcionalidades del sistema. Las tareas que aparecen en esta lista son sugerencias para el equipo de desarrollo de FomentAR, y se espera que se implementen en futuras versiones del sistema.

-   [ ] CRUD CATEGORIAS: Esto permitirá una mejor organización de las actividades según su tipo o temática.
-   [ ] REGISTRAR PAGOS: Esto permitirá una mejor gestión de la facturación y una mayor transparencia en el proceso de cobros.
-   [ ] FACTURACION:

> [!CAUTION]
> ## ERRORES ❌
> 
> -   Por ahora no hay errores 😊

> [!TIP]
> ### ANOTACIONES O IDEAS 💡
>
> - ACTUALIZAR A LARAVEL COMO API CON BREEZE EN EL BACKEND Y NEXTJS EN EL FRONTEND




> [!IMPORTANT]
> ### ACTIVIDADES POR CLIENTE CON DATOS DEL CLIENTE 🧑‍💻
> 
> Si necesitas consultar las actividades de un cliente junto con sus datos personales, puedes utilizar la siguiente consulta SQL:
> 
>  ```SQL 
> SELECT cli_act.id_actividad,cli.num_socio,cli.domicilio,cli.edad,cli.num_domicilio,cli.telefono,cli.id_genero,cli.fecha_nacimiento,cli.fecha_ingreso,cli.DNI,cli.id_cliente,cli.nombre, > cli.apellido, act.nombre_actividad
> FROM
> clientes_actividad cli_act JOIN clientes cli ON cli_act.id_cliente = cli.id_cliente
> JOIN actividades act ON cli_act.id_actividad = act.id_actividad AND cli_act.id_cliente = $id_cliente
> ```

> [!TIP]
>
> ## APORTES
> 
> Si tienes alguna sugerencia o correccion para mejorar el sistema, puedes realizar la PR correspondiente!
