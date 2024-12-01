# FASE DE DESEÑO

- [FASE DE DESEÑO](#fase-de-deseño)
  - [1- Diagrama da arquitectura](#1--diagrama-da-arquitectura)
  - [2- Casos de uso](#2--casos-de-uso)
  - [3- Diagrama de Base de Datos](#3--diagrama-de-base-de-datos)
  - [4- Deseño de interface de usuarios](#4--deseño-de-interface-de-usuarios)

> *EXPLICACIÓN:* Este documento inclúe os diferentes diagramas, esquemas e deseños que axuden a describir mellor o [nome do proxecto] detallando os seus compoñentes, funcionalidades, bases de datos e interface.

## 1- Diagrama da arquitectura

> *EXPLICACIÓN:* Incluír os diagramas de arquitectura que representen de forma gráfica a aplicación, os seus compoñentes e a súa interrelación: front-end, back-end, bases de datos, nube, microservizos, etc.

## 2- Casos de uso

> *EXPLICACIÓN:* Facer os diagramas de casos de uso que representen como as persoas usuarias interaccionan co sistema.
>
>Deben incluírse o(s) tipo(s) de usuario implicados en cada caso de uso.

![image](https://github.com/user-attachments/assets/08fa0a34-383a-471b-a910-8415fa08a44c)




## 3- Diagrama de Base de Datos

> *EXPLICACIÓN:* Neste apartado incluiranse os diagramas relacionados coa Base de Datos:
>
> - Modelo Entidade/relación
> - Modelo relacional
>
> Pódese entregar a captura do phpMyAdmin se se emprega MariaDB como Modelo relacional.



![image](https://github.com/user-attachments/assets/44ec5a69-b3de-4063-b383-b16b5d0bda49)


**Usuarios** ( id_usuario , nombre, correo, teléfono, id_taller (FK referencia a Taller), tipoUsuario (FK referencia a Tipo_Usuario))

**Tipos_Usuario** (id_tipoUsuario, tipo_usuario)

**Vehículos** (id_vehiculo , id_usuario (FK referencia a Usuarios), modelo, año, matricula, kilometros)

**Taller** (id_taller, nombre, dirección, teléfono)

**Citas** (id_cita , id_vehiculo (FK, referencia a Vehículos), id_taller (FK referencia a Taller), fecha, hora_inicio, descripción )

### **Relaciones**

- **Usuarios** a **Taller**: Muchos a uno (varios usuarios pueden estar a un mismo taller).
- **Usuarios** a **Vehículos**: Uno a muchos (un usuario puede tener varios vehículos).
- **Vehículos** a **Citas**: Uno a muchos (un vehículo puede tener varias citas).
- **Taller**  a **Citas** : Uno a muchos (un taller puede tener varias citas).

  
## 4- Deseño de interface de usuarios

> *EXPLICACIÓN:* Neste apartado deben incluírse unha mostra representativan dos mockups da aplicación. Estes mockups deben incluír todas as vistas da aplicación, é dicir, todas as páxinas diferentes que unha persoa usuaria (de calquera tipo) vai poder ver. Tamén se debe incluír información de como navegar dunha ventá a outra.
>
> Os mockups axudan no deseño da aplicación. Poden facerse á man, cunha aplicación ou a través dunha web do estilo: diagrams Un mockup permite ver como se verá unha páxina concreta dunha aplicación web. O deseño de mockups axuda a:
>
> - Avanzar moi rápido na parte frontend: ao ter os mockups realizados, permite saber que elementos vai ter cada vista e onde colocalos.
> - Visualizar a información que vai a ser necesaria mostrar. Sabendo con que información imos traballar e sabendo a información que necesitamos mostrar, podemos organizar os datos dunha forma axeitada para gardalos na base de datos.
>
> Se temos as ideas máis claras do noso proxecto podemos sustituir os mockups por prototipos.


Mockup feito con figma, faltaria a versión de movil pero o uso principal da aplicación sería para ordenador [link](https://www.figma.com/design/Rke6YFKyoGgpY2LTTlct7r/Untitled?node-id=0-1&t=VIk5YrQiSYUgi63B-1)
