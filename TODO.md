# TODO LIST

- 🚧 REVISAR
- ✅ TODO BIEN
- ✖ TODO MAL

- [ ] ARREGLAR REGISTRAR DE TODAS LAS ACTIVDADES Y LAS CATEGORIAS Y LA BASE DE DATOS 🚧 (VOLEY,PATIN,FUTBOL)
- [ ] REVISAR COMENTARIOS EN CADA ARCHIVO XD
- [ ] DESCRIPCION EN CLIENTES APARECE BIEN PERO MAL XD EN DESCRIPCION DE CATEGORIA
- [ ] ARCHIVO DE ACCIONES
- [ ] SOLO PODER DAR DE BAJA DE A UN DEPORTE POR SOCIO (POR SI SE BAJA DE UN DEPORTE PERO SIGUE HACIENDO OTRO PARA QUE NO SE LE ACUMULEN LAS CUOTAS XD)

# ERRORES

- [ ] -

### ANOTACIONES O IDEAS DE POR AHI XD

query de deportes segun cliente.dni

SELECT act.Nro_Orden, act.idDisciplina, dis.idCategoria, dis.ValorSocio, dis.ValorNoSocio, from actividades act, facturacion fact, disciplinas disc where act.Nro_Orden = fact.Nro_orden and act.idDisciplina = fact.idDisciplina and disc.idCategoria = act.idActividad
