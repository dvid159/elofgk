To Do (sistema completo)

(?) = opcional o extra para comodidad

----------------Autenticación---(2/6)-----------------------------------------------------------------------

-Opcion de password olvidada(?)

-Mostrar alerta de autenticacion erronea(hecho)

-Verificar errores de sesion al abrir en otra pestaña/navegador

-Modificar actividad del usuario en BD con campo activo/inactivo (persona inactiva no puede acceder, ralacionado a nuevo empleado)(50% -> BD)

-Recordar quitar link de logout al estar seguros de buen funcionamiento de toda la autenticacion

-ocultar opciones para usuario 'ayudante de administracion' (hecho)

------------------Home---(0/2)-----------------------------------------------------------------------------

-Notificaciónes(?)

-Informacion de Navbar(?)


--------------Generales---(1/9)----------------------------------------------------------------------------

-Modificar campos que son unicos en BD (hecho)

-Revisar por algun autocomplite(en proceso)

-Manejo de hojas excel (importar/exportar) para calificaciones para modulo Docente

-Manejo y archivacion de plantillas word para hojas de prevencion, honor roll, master honor roll etc.

-Modulo de Docente (ingreso de notas, modificacion(con permisos de un admin), visualizacion, impresion de listas

-Modulo de alumno (visualizacion de notas, notificacion de carte de prevencion y demas)

-Atributo required a input necesarios y evitar enviar formularios vacios(en proceso y verificacion necesaria)

-Averiguar por que no carga imagenes en nuevo-alumno form y iconos en pestañas de navegador en unas vistas

-Dar de baja a un alumno,empleado,docente

---------------Departamento---(0)-----------------------------------------------------------------------

----------------Municipios---(0)--------------------------------------------------------------------------

--------------Centro Educativo (CE)---(3/3)---------------------------------------------------------------------

-Agregar: -Limitar caracteres de campos: --Codigo,Telefono (Hecho)

-Manejo de error: Evitar enviar un centro vacio con un dato vacio (hecho)

-Manejo de errores para ingreso de codigo repetido (Hecho)


----------------Class---(0/5)---------------------------------------------------------------------------------

-Definir formato de clase al ingresar una nueva

-Limitar caracteres en campos de años

-Error al ingresar una nueva clase<-------------------prioridad--------------------->

-Manejo de errores para ingreso de campo repetido

-No modifica las clases


--------------Seccion---(0/3)-------------------------------------------------------------------------------

-Definir formato del campo seccion

-Revisar constrains al momento de ingresar nueva seccion

-Restringir longitud de año

-------------Materia----(0)-------------------------------------------------------------------------------

-Opcion a largo plazo: uso de materias por sede en BD (peticion de SS) permite ingresar materias repetidas

--------------Aptitudes---(1/2)------------------------------------------------------------------------------

-Error de agregar sin seleccionar un criterio antes (Hecho)

-Permite campos repetidor

--------------Empleado---(4/10)-----------------------------------------------------------------------------

-Definir y limitar formato para DUI a solo numeros(mascara)

-Definir y limitar formato para NIT a solo numeros(mascara)

-Limitar campo telefono

-Definir formato de carnet

-Agregar campo email a BD y formulario (hecho)

-Llenar tabla de usuarios para autenticacion al llenar un nuevo empleado(si cumple con el rol:admin,docente) (hecho)

-Manejar empleados repetidos en BD(en general)(hecho)

-Manejo de cargo de usuario y tabla user para autenticacion con roles(a definicion del orden de roles)(hecho)

-Inconsistencia de id al guardar en tabla user para autenticacion(metodo store)(se registra en una tabla y no en otra y no permite ingresar otra vez) (sujeto a errores)

-Al momento de cambiar el cargo de alguien se debe cambiar permisos en la tabla user para la autenticacion

-------------Año en Curso---(0/3)-------------------------------------------------------------------------------

-Manejo de errores

-Quitar los toast al momento de guardar

-Que al momento de recargar se mantenga en la pagina que estaba trabajando no una vacia


--------------Alumnos---(0/6)-----------------------------------------------------------------------------------

-Carga de datos al formulario de nuevo alumno desde enlace carnet de lista alumnos(En proceso)

-Subir foto de alumno al ingrsar un nuevo alumno(EN proceso)

-Revisar funcionamiento total de paginas con alumno detalle

-Inconsistencia de id al guardar en tabla user para autenticacion(metodo store)

-Responsibidad de tablas responsables y centros educativos

-No aparece foto en perfil de usuario

-------------Promedios Centro Esolar---(1/3)-------------------------------------------------------------------

-Arreglar filtrar nombres por class(hecho)

-Mostrar notas de promedio correspondiente en detalle de notas en links desde carnet

-Modulo de edicion de notas con confirmacion con password


---------Promedios FGK---------------------------------------------------------------------------------

-Hacer todo el modulo de notas


--------Promedios Aptitudinales-------------------------------------------------------------------------

-Hacer todo el modulo de notas


--------Promedios Consolidados---(0/2)----------------------------------------------------------------------

-Modulo de consolidados con resumenes de calificaciones

-Modulo estadistico en poblacion de alumnos, Centros Educativos etc


--------------------------------------------------
