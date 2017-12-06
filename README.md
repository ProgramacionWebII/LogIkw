# LogIkw
Trabajo práctico final de Programación Web II

Descripción general del sistema

Una empresa de dedicada a la logística necesita un sistema informático para controlar su flota de
vehículos.
El control de los distintos tipos de vehículos es muy importante para ella, sobre todo en lo que respecta a
su mantenimiento y estado general.
La empresa realiza viajes a todo el país y los países limítrofes.
El sistema debe permitir el acceso desde cualquier conexión a internet, puesto que los choferes deben
actualizar datos en el mismo durante los viajes.
Se desea que el sistema permita al menos tres niveles de acceso (roles), el chofer que utilizará el sistema
para actualizar los datos durante el viaje, el administrador que realizara las tareas de carga y consulta de
los datos en las oficinas centrales y el supervisor, encargado de administrar el sistema, trabajar con los
reportes de nivel gerencial y realizar la carga de roles y usuarios.

Descripción de funcionalidades

El sistema debe proveer como mínimo las siguientes funcionalidades:
  * Controlar la seguridad del sistema. ABM de usuarios, Roles, Logueo, manejo de password y
  permisos.
  * Administración de la flota de vehículos. ABM, estado, reportes, alarmas, calendario de service,
  etc.
  * Administración del plantel de empleados (Choferes, Mecánicos, etc.)
  * Administración de Viajes. ABM, vehículo, origen, destino, personal asignado, cliente, tipo de
  carga, fechas, tiempo estimado de viaje, tiempo real, desviación, kilómetros recorridos previstos,
  kilómetros recorridos reales, combustible consumido (previsto y real), etc.
  * Mantenimiento de los vehículos. ABM, fecha del service, km de la unidad, costo, service
  interno/externo, mecánico interviniente, repuestos cambiados, etc.
  * Seguimiento de los vehículos en viaje.
  * Reportes estadísticos del uso de los vehículos, tiempo fuera de servicio, kilómetros recorridos,
  costo de mantenimiento, costo por kilómetro recorrido, etc.
  * Reporte de desvíos, kilómetros, combustible, tiempos, etc.


La empresa desea asimismo una aplicación móvil/ pagina web móvil, que permita a los celulares que se
les entregan a los choferes, a partir de un código leído de un QR enviar un reporte diario de posición a
partir del GPS del celular. La empresa requiere que se generer el QR con un código único para cada viaje,
de manera de poder realizar el seguimiento correspondiente. A través de la misma aplicación los
choferes informan cada carga de combustible, lugar donde se realizó, cantidad, importe, km de la
unidad, etc. también accediendo al informe del GPS del Celular.
En un viaje determinado realizado por un vehículo pueden ir uno o más choferes, y el vehículo puede ir
acompañado por un acoplado o no. En caso de llevar un acoplado, se deben registrar para este los
mismos datos que para el vehículo tractor.
De cada vehículo se registra, marca, modelo, patente, nro. de chasis, nro. de motor, año de fabricación,
etc.
De cada empleado se registra, según corresponda, dni, nombre, fecha de nacimiento, tipo de licencia de
conducir, etc.
Todos los listados se requieren por pantalla y en formato PDF.
Se requieren gráficos comparativos del rendimiento de los vehículos a partir de los kilómetros recorridos
entre mantenimientos y del rendimiento promedio de consumo de combustible.


Detalles técnicos:

  * Se utilizará una base de datos MySql para almacenar los datos.
  * El sistema deberá estar implementado con Lenguaje de programación PHP desde el lado del
  Servidor.
  * La aplicación utilizara tecnologías de orientación a objetos para su implementación.
  * La interface deberá ser implementada en el Framework Bootstrap.
  * Se deberá Almacenar el versionado del producto en un repositorio GIT.
  * Las claves de usuario deben almacenarse encriptadas md5 en la base de datos.

FrameWork

Swift Mailer
------------

Swift Mailer is a component based mailing solution for PHP 7.
It is released under the MIT license.

   Homepage:      https://swiftmailer.symfony.com/
   Documentation: https://swiftmailer.symfony.com/docs/introduction.html
   Bugs:          https://github.com/swiftmailer/swiftmailer/issues
   Repository:    https://github.com/swiftmailer/swiftmailer


Swift Mailer is highly object-oriented by design and lends itself
to use in complex web application with a great deal of flexibility.

For full details on usage, see the documentation.
