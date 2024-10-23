# Requerimientos do sistema

- [Requerimientos do sistema](#requerimientos-do-sistema)
  - [1- Descrición Xeral](#1--descrición-xeral)
  - [2- Funcionalidades](#2--funcionalidades)
  - [3- Tipos de usuarios](#3--tipos-de-usuarios)
  - [4- Contorno operacional](#4--contorno-operacional)
  - [5- Normativa](#5--normativa)
  - [6- Melloras futuras](#6--melloras-futuras)

> *EXPLICACION*: Este documento describe os requirimentos para "nome do proxecto" especificando que funcionalidade ofrecerá e de que xeito.

## 1- Descrición Xeral

>*EXPLICACION*: Descrición Xeral do proxecto

O proxecto é unha plataforma de talleres mecánicos que facilita a organización das citas co fin de mellorar o rendemento no taller e evitar esperas excesivas por parte dos seus clientes. Ademais, inclúe para os usuarios da aplicación (os clientes dos talleres) unha administración dos seus propios vehículos, cun calendario que ofrece recordatorios para cando unha cita ou unha licencia estea a piques de caducar.
Esta aplicación ten como público obxectivo os talleres pequenos de Galicia que queiran mellorar a súa organización.

## 2- Funcionalidades

>*EXPLICACION* Describir que servizos ou operacións se van poder realizar por medio do noso proxecto, indicando que actores interveñen en cada caso.
>
> Enumeradas, de maneira que na fase de deseño poidamos definir o diagrama ou configuración correspondente a cada funcionalidade.
> Cada función ten uns datos de entrada e uns datos de saída. Entre os datos de entrada e de saída, realízase un proceso, que debe ser explicado.


| Acción   |  Descrición        |
|----------|--------------------|
| Alta de usuarios   | Dar de alta os usuarios dos talleres via un formulario que teña todo o necesario (nome, apelido, dni, teléfono de contacto, taller|
| Modificar usaurios | Modificación de usuarios na base de datos|
| Presentación das opcions do usuarios  | Mostra todas as opcions que ten o usuarios por medio da páxina web (calendario, vehiculos, pedir cita, recordatorios...)|
| Alta talleres | Permitir o rexistro de talleres na base de datos mediante un formulario específico que solicite información sobre o taller. (nome, propietario, localización)|
| Modificar talleres | Modificación do taller na base de datos|
| Presentación do calendario do taller | Mostrar un calendario con horario e citas do taller, permitindo unha visión organizada do traballo diario. |
| Mostrar plataforma compraventa | Mostrar os productos de venta do taller |
| Engadir productos | Engadir productos a base de datos |


## 3- Tipos de usuarios

> *EXPLICACION* Describir os tipos de usuario que poderán acceder ao noso sistema. Habitualmente os tipos de usuario veñen definidos polas funcionalidades ás cales teñen acceso. En termos xerais existen moitos grupos de usuarios: anónimos, novos, rexistrados, bloqueados, confirmados, verificados, administradores, etc.
>
> Exemplo:
>
> - Usuario xenérico, que terá acceso a ...
> - Usuario técnico, que poderá...

- Usuario "mecánico": propietario ou encargado do taller, que ten acceso ás citas e a algunha sección máis.

- Usuario rexistrado: propietarios dos vehiculos. Terá acceso ao calendario persoal, así como a ver a sección dos seus vehículos (na cal so pode dar de baixa o vehículos e ver a información almacenada sobre este (kms, cambios de aceite, revisións pasadas etc)). Tamén terá acceso a una sección para pedir cita.

- Usuario administrador: usuario administrador do sistema. Será o encargado da administración dos usuarios, talleres, mecánicos... Este usuario terá acceso a calquer parte da páxina.  

## 4- Contorno operacional

> *EXPLICACION* Neste apartado deben describirse os recursos necesarios, dende o punto de vista do usuario, para poder operar coa aplicación web. Habitualmente consiste nun navegador web actualizado e unha conexión a internet.
Se é necesario algún hardware ou software adicional, deberá indicarse.

Para o uso da páxina web, simplemente será necesario un dispositivo con conexión a Internet e un navegador neste dispositivo. A aplicación web está deseñada para que, desde calquera dispositivo que cumpra os requisitos anteriores, se poida acceder a ela. 

## 5- Normativa

> *EXPLICACION* Investigarase que normativa vixente afecta ao desenvolvemento do proxecto e de que maneira. O proxecto debe adaptarse ás esixencias legais dos territorios onde vai operar.
> 
> Pola natureza dos sistema de información, unha lei que se vai a ter que mencionar de forma obrigatoria é la [Ley Orgánica 3/2018, de 5 de diciembre, de Protección de Datos Personales y garantía de los derechos digitales (LOPDPGDD)](https://www.boe.es/buscar/act.php?id=BOE-A-2018-16673). O ámbito da LOPDPGDD é nacional. Se a aplicación está pensada para operar a nivel europeo, tamén se debe facer referencia á [General Data Protection Regulation (GDPR)](https://eur-lex.europa.eu/eli/reg/2016/679/oj). Na documentación debe afirmarse que o proxecto cumpre coa normativa vixente.
>
> Para cumplir a LOPDPGDD e/ou GDPR debe ter un apartado na web onde se indique quen é a persoa responsable do tratamento dos datos e para que fins se van utilizar. Habitualmente esta información estructúrase nos seguintes apartados:
>
> - Aviso legal.
> - Política de privacidade.
> - Política de cookies.
>
> É acosenllable ver [exemplos de webs](https://www.spotify.com/es/legal/privacy-policy/) que conteñan textos legais referenciando a LOPDPGDD ou GDPR.


A normativa máis relevante para o desenvolvemento do proxecto é a **[Ley Orgánica 3/2018, de 5 de diciembre, de Protección de Datos Personales y garantía de los derechos digitales (LOPDPGDD)](https://www.boe.es/buscar/act.php?id=BOE-A-2018-16673)**, xa que o proxecto manexa información persoal tanto dos usuarios (propietarios de vehículos) como dos talleres rexistrados.

Ademais, como o proxecto operará en liña, tamén entrará a **[Ley de Servicios de la Sociedad de la Información y del Comercio Electrónico (LSSI-CE)](https://www.boe.es/eli/es/l/2002/07/11/34/con)**, que regula as actividades comerciais e os servizos dixitais en España. 

Finalmente, no ámbito da propiedade intelectual usarei a licencia de **[Creative Commons](https://creativecommons.org/)**.

## 6- Melloras futuras

> *EXPLICACION* É posible que o noso proxecto se centre en resolver un problema concreto que se poderá ampliar no futuro con novas funcionalidades, novas interfaces, etc.

Nun futuro, posiblemente podase implementar a aplicación en móbil (tanto iOS como Android) facilitando os recordatorios,así como sendo máis sinxelo coller a cita. Outra integración posible é a de pago en liña, faendo que se poda pagar os servizos con anterioridade ou simplificando o proceso de pago evitando asi a maneira manual. 
