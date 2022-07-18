# TODO LIST

- [ ] REGISTRO Y MODIFICAR EVENTOS - 🚧
- [ ] MOSTRAR CONTRASEÑA DESENCRIPTADA EN MODIFICAR GESTION USUARIOS - 🚧
- [ ] RUTAS EN CADA ARCHIVO 🚧
- [ ] REVISAR COMENTARIOS EN CADA ARCHIVO XD
- [ ] REDIRECCIONAR SI HAY UNA SESION (PARA NO IR AL LOGIN XD) A PAGINA_PRINCIPAL.PHP 🚧
- [ ] DESCRIPCION EN CLIENTES APARECE BIEN PERO MAL XD EN DESCRIPCION DE CATEGORIA
- [ ] CAMBIAR CONSULTAS SQL A MYSQLI O PDO (MAS SEGURO XD) 🚧
- [ ] PASAR LOGO A ICO - 🚧 (NO ME CONVENCE EL RESULTADO XD) 🚧
- [ ] REHACER BASE DE DATOS 🚧
- [ ] LEER ULTIMAS LINEAS DE [REGISTRAR_CLIENTE.PHP](registrar_cliente.php "registrar_cliente.php") (HAY UNA EXPLICACION DE LAS CATEGORIAS XD IGUAL VAMOS A HACER TODO DESDE 0 (? ) 🚧
- [ ] LOGIN MULTISESION/MULTIDISPOSITIVO? DOBLE FACTOR DE AUTENTICACION? COOKIE ? TOKEN ? 🚧
- [ ] ESCUDO DE LA SOCIEDAD DE FOMENTO EN ALGUN LADO ?? 🚧
- [ ] IMPORTAR Y EXPORTAR FUNCIONES JS 🚧
- [ ] USAR STORE PROCEDURES XD (actualizar estado evento y agregar cliente en varios deportes si usamos algun select multiple? automatico xd) 🚧

# ERRORES

- [ ] Warning: Undefined variable $resBasquet in C:\xampp\htdocs\FomentAR2\facturacion.php on line 50
- [ ] in C:\xampp\htdocs\FomentAR2\edit/modificar5 on line 54
- [ ] $ ( ... ).datepicker is not a function (hay que acomodar bien el jquery o el script con el $ . . de jquery o no c xd)
- [ ] DevTools failed to load source map: Could not load content for http://localhost/FomentAR/js/popper.min.js.map: HTTP error: status code 404, net::ERR_HTTP_RESPONSE_CODE_FAILURE

## IF DE REGISTRAR_BASQUET.PHP (ARREGLAR Y TAMBIEN CATEGORIAS EN LA DB)

| SEXO   | EDAD      | IDCATEGORIA | NOMBRE CATEGORIA    |
| ------ | --------- | ----------- | ------------------- |
| 2 MASC | 6 < > 10  | 1           | pre-mini-basquet    |
| 1 FEM  | 6 < > 10  | 1           | pre-mini-basquet    |
| 2 MASC | 11 < > 12 | 2           | mini-mixto-basquet  |
| 1 FEM  | 11 < > 12 | 2           | mini-mixto-basquet  |
| 1 FEM  | 13 < > 17 | 4           | sub-15-fem-basquet  |
| 2 MASC | 13 < > 15 | 3           | sub-15-masc-basquet |
| 2 MASC | 16 < > 19 | 5           | sub-17-masc-basquet |
| 1 FEM  | 18 < > 45 | 7           | primera fem         |
| 2 MASC | 20 < > 45 | 6           | primera masc        |

| SEXO | DESCRIPCION |
| ---- | ----------- |
| 1    | FEMENINO    |
| 2    | MASCULINO   |

### ANOTACIONES O IDEAS DE POR AHI XD

1. cuando el usuario te ingrese el sexo en la pagina, vos vas a tener el valor
   "Masculino", "Femenino" o "Mixto"

vas a guardar en una variable, lo que te trae la siguiente consulta

Select idSexo From Sexo Where Detalle = Variable en donde el usuario cargo el sexo
en la pagina

2. Buscar el idCategoria

Select idCategoria From Categorias where idSexo = "Variable que tiene el idSexo buscado arriba"
and "Variable que calculo la edad del cliente" Between Edad_Inicial and Edad_Final

Ejemplo: Edad del cliente es 5 años y sexo es mixto (idSexo = 3)

SELECT idCategoria FROM `categorias` WHERE idSexo = 3 and 5 BETWEEN Edad_Inicial and Edad_Final

---

query de deportes segun cliente.dni

SELECT act.Nro_Orden, act.idDisciplina, dis.idCategoria, dis.ValorSocio, dis.ValorNoSocio, from actividades act, facturacion fact, disciplinas disc where act.Nro_Orden = fact.Nro_orden and act.idDisciplina = fact.idDisciplina and disc.idCategoria = act.idActividad

---
