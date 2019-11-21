To Do (sistema completo)

(?) = opcional o extra para comodidad

----------------Autenticación--------------------------------------------------------------------------

-Opcion de password olvidada(?)

-Mostrar alerta de autenticacion erronea

-Verificar errores de sesion al abrir en otra pestaña/navegador

-Modificar actividad del usuario en BD con campo activo/inactivo (relacionado a registro nuevo empleado)

-Recordar quitar link de logout al estar seguros de buen funcionamiento de toda la autenticacion

------------------Home--------------------------------------------------------------------------------

-Notificaciónes(?)

-Informacion de Navbar(?)


--------------Generales-------------------------------------------------------------------------------

-Modificar campos que son unicos en BD (hecho)

-Opcion de ocultar el menù para visualizar tablas grandes: sobre todo para el consolidado(?)

-Manejo de hojas excel (importar/exportar) para calificaciones para modulo Docente

-Manejo y archivacion de plantillas word para hojas de prevencion, honor roll, master honor roll etc.

-Modulo de Docente (ingreso de notas, modificacion(con permisos de un admin), visualizacion, impresion de listas

-Modulo de alumno (visualizacion de notas, notificacion de carte de prevencion y demas)

-Dato curioso: al tratar de ingresar a BD si hay error de campo unico y el id es auto increment no lo guarda el contador sigue hasta el siguiente registro Ej: dato actual: 1-Santa ana - ingreso: santa ana(error) - id = 2 - ingreso: san salvador(id = 3) - tabla: 1 - Santa Ana, 3 - san salvador

-Atributo required a input necesarios y evitar enviar formularios vacios(en proceso y verificacion necesaria)

---------------Departamento--------------------------------------------------------------------------

-Manejo de errores para ingreso de campo repetido (Hecho con dudas)(Error de campo repetido en BD y solo muestra mensaje de verificacion)


----------------Municipios-----------------------------------------------------------------------------

-Error de agregar sin seleccionar un departamanto antes (Hecho con dudas)(Error de campo not null en BD y solo muestra mensaje de verificacion)

-Municipio vacio (Hecho)

-Manejo de errores para ingreso de campo repetido (Hecho con dudas)(Error de campo repetido en BD y solo muestra mensaje de verificacion)

--------------Centro Educativo (CE)------------------------------------------------------------------------

-Agregar: -Limitar caracteres de campos: --Codigo,Telefono (50%) solo numeros+, no funciona el maxlength en type number-

-Deshacer una accion por si elimina un centro por error(?)

-Manejo de error: Evitar enviar un centro vacio con un dato vacio (hecho)

-Manejo de errores para ingreso de codigo repetido (Hecho)


----------------Class------------------------------------------------------------------------------------

-Definir formato de clase al ingresar una nueva

-Limitar caracteres en campos de años

-Error al ingresar una nueva clase<-------------------prioridad--------------------->

-Manejo de errores para ingreso de campo repetido

-No modifica las clases


--------------Seccion----------------------------------------------------------------------------------

-Definir formato del campo seccion

-Revisar constrains al momento de ingresar nueva seccion

-Restringir longitud de año

-------------Materia-----------------------------------------------------------------------------------

-Opcion a largo plazo: uso de materias por sede en BD (peticion de SS) permite ingresar materias repetidas


--------------Aptitudes---------------------------------------------------------------------------------

-Error de agregar sin seleccionar un criterio antes (Hecho con dudas)(Error de campo repetido en BD y solo muestra mensaje de verificacion)


--------------Empleado--------------------------------------------------------------------------------

-Definir y limitar formato para DUI a solo numeros

-Definir y limitar formato para NIT a solo numeros

-Formato de carnet

-Agregar campo email a BD

-Llenar tabla de usuarios para autenticacion al llenar un nuevo empleado(si cumple con el rol:admin,docente)

-Limitar campo telefono

-Manejdar empleados repetidos en BD(en general)

-Manejo de cargo de usuario y tabla user para autenticacion con roles

-Inconsistencia de id al guardar en tabla user para autenticacion(metodo store)


-------------Año en Curso----------------------------------------------------------------------------------

-Manejo de errores


--------------Alumnos--------------------------------------------------------------------------------------

-Carga de datos al formulario de nuevo alumno desde enlace carnet de lista alumnos

-Subir foto de alumno al ingrsar un nuevo alumno

-Revisar funcionamiento total de paginas con alumno detalle

-Inconsistencia de id al guardar en tabla user para autenticacion(metodo store)

--------------Nuevo-alumno-------------------------------------------------------------------------------

-Responsibidad de tablas responsables y centros educativos



-------------Promedios Centro Esolar----------------------------------------------------------------------

-Arreglar filtrar nombres por class(select)

-Mostrar notas de promedio correspondiente en detalle de notas en links desde carnet

-Modulo de edicion de notas con confirmacion con password


---------Promedios FGK---------------------------------------------------------------------------------

-Hacer todo el modulo de notas


--------Promedios Aptitudinales-------------------------------------------------------------------------

-Hacer todo el modulo de notas


--------Promedios Consolidados-------------------------------------------------------------------------

-Modulo de consolidados con resumenes de calificaciones

-Modulo estadistico en poblacion de alumnos, Centros Educativos etc


--------------------------------------------------
