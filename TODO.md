# TODO LIST

- 🚧 REVISAR
- ✅ TODO BIEN
- ✖ TODO MAL

- [ ] RUTAS EN CADA ARCHIVO 🚧
- [ ] ARCHIVO DE ACCIONES TODO EN UNO (COMO EN PROMON) (EDITAR/AGREGAR/BORRAR XD) 🚧
- [ ] CAMBIAR VARSESION POR IDROLE EN DONDE SE PUEDA XD 🚧
- [ ] REVISAR COMENTARIOS EN CADA ARCHIVO XD
- [ ] DESCRIPCION EN CLIENTES APARECE BIEN PERO MAL XD EN DESCRIPCION DE CATEGORIA
- [ ] CAMBIAR CONSULTAS SQL A MYSQLI O PDO (MAS SEGURO XD) 🚧
- [ ] PASAR LOGO A ICO - 🚧 (NO ME CONVENCE EL RESULTADO XD) 🚧
- [ ] REHACER BASE DE DATOS 🚧
- [ ] LOGIN MULTISESION/MULTIDISPOSITIVO? DOBLE FACTOR DE AUTENTICACION? COOKIE ? TOKEN ? 🚧
- [ ] ESCUDO DE LA SOCIEDAD DE FOMENTO EN ALGUN LADO ?? 🚧
- [ ] IMPORTAR Y EXPORTAR FUNCIONES JS 🚧
- [ ] USAR STORE PROCEDURES ?? TRIGGERS ?? FUNCTIONS ?? XD (actualizar estado evento y agregar cliente en varios deportes si usamos algun select multiple? automatico xd) 🚧

# ERRORES

- [ ] Warning: Undefined variable $resBasquet in C:\xampp\htdocs\FomentAR2\facturacion.php on line 50
- [ ] in C:\xampp\htdocs\FomentAR2\edit/modificar5 on line 54
- [ ] $ ( ... ).datepicker is not a function (hay que acomodar bien el jquery o el script con el $ . . de jquery o no c xd) (creo que es para el input en eventos y las fechas de registro y nacimiento xd)

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

| CATEGORIAS | DEPORTE   |
| ---------- | --------- |
| 1-7        | BASQUET   |
| 8-10       | VOLEY     |
| 11-15      | PATIN     |
| 16-17      | TAEKWONDO |
| 18         | ARTE      |

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
