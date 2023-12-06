# **AutoSpace**

## Sistema de Reservas de Estacionamiento

### **Integrantes del grupo:**

- Acosta Carlos.
- Ayala Leandro.
- Degregorio Nicolas.
- Perez Rodrigo

### **Objetivos**

 El objetivo es desarrollar un sistema que permita la reserva de lugares en diferentes estacionamientos bajo la gestión del mismo, 

buscando ahorrarle tiempo al usuario, garantizando que pueda tener un lugar en el estacionamiento que más le convenga.

### **Alcance**

El sistema gestionará el inicio de sesión de usuarios, tanto normales como administradores. Permitirá la registración de los 
usuarios normales mediante un módulo de registro que se busca que a su vez sirva de modificación de datos de la cuenta.
 
  La funcionalidad principal será un módulo que se verá sólo al haber iniciado sesión. Ésta función consiste en registrar las reservas 
para estacionamientos, seleccionando el estacionamiento e indicando un día específico (poniendo la fecha de este día) o 
seleccionando una reserva periódica, pudiendo marcar cualquier día de la semana. La reserva se realizará indicando un horario de 
inicio y uno de fin. Pasado este período, el puesto se considerará como libre. Al indicar los datos de la reserva, el sistema verificará 
si hay puestos no reservados o libres en el intervalo dado, y si es así, pedirá una confirmación de la reserva. Luego de confirmar, 
mostrará el número de puesto asignado al usuario, la hora, la fecha o los días que se reserva, si se trata de reserva periódica.

  Otra funcionalidad, asociada a las cuentas administradoras, será la gestión de los puestos de determinado estacionamiento, 
cambiando sus estados a libre u ocupado, de manera manual, tanto así como automáticamente, cambiando el estado a reservado si 
es que se hiciera una reserva.
  En cuanto a los datos de usuario se registrarán un usuario, contraseña, nombre y apellido, número de documento, país y provincia. 
  Se añadirán también datos para un vehículo del usuario, como la marca, modelo y año, para tener una referencia en la base de 
datos.

### **Límites**
-	El sistema no facturará
-	No se manejará el crédito o movimiento de ganancias
-	No registrará el estado del auto
### **Herramientas para el desarrollo:**
-	Lenguaje de programación ejecutado en el servidor PHP.
-	Vistas para la página HTML y CSS
-	Funcionalidades del lado del cliente JavaScript
-	Editor de texto: SublimeText
-	Los datos se almacenarán en una base de datos mysql, utilizando el gestor phpmyadmin de XAMPP
### **Estructura:**
-	Carpeta medias: Se guardarán imágenes
-	Carpeta JS: Se guardarán código y archivos JavaScript
-	Carpeta Módulos: Se guardarán los módulos del sistema web, incluyendo archivos html y php de las páginas
-	Carpeta CSS: Incluirá el estilo de la página
-	Base de datos: Se incluirá el script de la base de datos
