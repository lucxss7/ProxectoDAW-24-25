# FASE DE IMPLANTACIÓN

- [FASE DE IMPLANTACIÓN](#fase-de-implantación)
  - [1- Manual técnico](#1--manual-técnico)
    - [1.1- Instalación](#11--instalación)
    - [1.2- Administración do sistema](#12--administración-do-sistema)
  - [2- Manual de usuario](#2--manual-de-usuario)
  - [3- Melloras futuras](#3--melloras-futuras)

## 1- Manual técnico

### 1.1- Instalación

Para por en funcionamento a plataforma requirese de : 
Un dispositivo con un navegador e conexión a internet. 


O servidor local empregado para á súa programación e XAMPP (Versión 8.2.12).
Descargamos a carpeta 'Codigo' situado no repositorio de GitHub. Feito isto iniciamos XAMPP e arrancamos os dous módulos MYSQL e Apache.

Para cargar os datos na BD, deberase importar un arquivo no PhpMyAdmin. Este arquivo situase en 'Codigo/bd.sql'. Para importalo, iremos ao noso PhpMyAdmin, pondo no buscador 'localhost/phpmyadmin'.

Unha vez dentro da paxina, temos duas opcións ou copiar o codigo de ese archivo e pegalo na sección de arriba 'SQL' ou imos a sección de importar na cal buscaremos o arquivo descargado anteriormente e o seleccionaremos. 


Unha vez acabada a importación, procedemos a copiar a carpeta descargada en xampp/htdocs/FCT (carpeta creada previamente). Agora simplemente imos ao noso navegador. Buscamos ´localhost/FCT´ e xa estaria a funcionar a aplicación. 


Hai 5 usuarios todos con contrasinal '1234'. Dous "mecánicos" (@taller1, @taller2) que xestionan cada un seu taller. E tres usuarios clientes destes talleres (@juan, @ana, @carlos). 



### 1.2- Administración do sistema


É necesario faer copias de seguridade da base de datos cando menos,  porque conteñen datos sensibles dos usuarios. Así como tamén unha xestion de incidencias co fin de mellorar a seguridad e a plataforma. 

## 2- Manual de usuario


Non é necesario formar aos usuarios porque e unha plataforma bastante intuitiva. No caso de dubidas, hay un formulario de baixo do primeiro index. No cal podes deixar todas as tuas dubidas. Nun futuro plantexase unha sección de FAQ.

Para poder utilizala: 
Os dous tipos de usuarios parten do mesmo login. Que se chega a el dende calquera index, no seu perspectivo boton de INICIAR SESIÓN. 
- Mecánico: 
  Inicia sesión con calquera dos usuarios administradores de talleres (@taller1, @taller2) ambos con contrasinal '1234'. Nada máis iniciar sesión, conta cun dashboard no cal ten un calendario mensual, un horario para o dia de hoxe, unha sección de notificaciones, e unha sección de clientes. Tamén ten acceso a un calendario persoal no cal cambiar de mes e de forma de mirar as citas que ten. Na sección de clientes, conta con todos os clientes afiliados a ese taller.
- Cliente do taller: 
  Inicia sesión con calquera do resto dos usuarios todos con contrasinal '1234'. Nada máis iniciar sesión, conta cun dashboard no cal ten un calendario mensual, un horario para o día de hoxe, unha sección de notificaciones de citas novas e unha sección do perfil propio. No menú, ten unha opción de ver os seus vehiculos. Na cal, pode dar de alta outros novos e pode eliminalos en caso de que asi o desexe, sempre que non teña unha cita asignada. Pode pedir novas citas, no taller que esta afiliado ou noutro diferente. Tamén conta, ca sección do perfil, na cal pode editar as formas de contacto. 

## 3- Melloras futuras


Como mellora futura na parte do taller estan: 
- A posibilidade de dar de alta a clientes que non son usuarios da aplicación co fin de levar un mellor control deles. 
- A implantación final da sección de compravendas. 
- A implantación de pagos en liña. 
- A implantación de recuperar contraseña na parte dos usuarios que se esquezan dela. 
- Poder crear recordatorios persoais sen que teñan que ver co taller, por parte dos usuarios, co fin de darlle máis valor a aplicación. 
- Sistema de mapas co fin de atopar o taller máis cercano.
- Sistema de mensaxería entre o mecánico e o cliente para unha relación máis cercana. 
- Sistema para saber se o taller dispón de coche de sustitución ou non. 