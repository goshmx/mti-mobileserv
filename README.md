# mti-mobileserv

mti-mobileserv es un servidor rest basado en codeigniter e integrado con la libreria de restserver.

  - Permite dar de alta usuarios para consulta.
  - Integra todas las funciones de CRUD para cada usuario.
  - Al ser integrado con restserver, permite usar multiples formatos.

### Consulta

```sh
GET http://localhost/mobileserv/tables/tables/lista
// Consulta todos los usuarios disponibles.

PUT http://localhost/mobileserv/tables/tables/inserta
// params: usuario
// Inserta un usuario para consulta de tablas

GET http://localhost/mobileserv/tables/tables/consulta?id=ID
// Consulta un usuario para consulta de tablas

GET http://localhost/mobileserv/tables/tables/elimina
// params: id
// Elimina un usuario
```

```sh
GET http://localhost/mobileserv/api/mti/lista/user/USER
// Consulta lugares de todos los usuarios.

PUT http://localhost/mobileserv/api/mti/inserta/user/USER
// params: name, lat, lng, url
// Inserta un lugar

GET http://localhost/mobileserv/api/mti/consulta/user/USER?id=ID
// Consulta un lugar

GET http://localhost/mobileserv/api/mti/elimina/user/USER
// params: id
// Elimina un lugar
```

Adicionalmente se puede agregar /format/FORMATO y renderizar los datos en los siguientes formatos:
 - json
 - xml
 - html
 - csv
 - txt

### Version
0.0.3

### Instalacion

Configurar el CI, y cargar el archivo .SQL.

### Todo's

 - Validaciones de datos
 - Integracion de multiples datos
 - Correccion de las rutas para hacerlas mas amigables.
 - Error cuando la instancia ya existe al crearla.

License
----

MIT

Asi hablo el maestro programador
**Después de tres días sin programar, la vida pierde sentido**