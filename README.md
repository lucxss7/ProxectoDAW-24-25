# Proxecto fin de ciclo

- [Proxecto fin de ciclo](#proxecto-fin-de-ciclo)
  - [Taboleiro do proyecto](#taboleiro-do-proyecto)
  - [Descrición](#descrición)
  - [Instalación / Posta en marcha](#instalación--posta-en-marcha)
  - [Uso](#uso)
  - [Sobre o autor](#sobre-o-autor)
  - [Licenza](#licenza)
  - [Índice](#índice)
  - [Guía de contribución](#guía-de-contribución)
  - [Links](#links)



## Taboleiro do proyecto

Desenrolando...

## Descrición


O proxecto consiste na creación dunha plataforma dirixida a talleres mecánicos, deseñada para mellorar a xestión das actividades do taller. Proporcionando unha interface intuitiva tanto para os mecánicos como para os usuarios que necesitan os seus servizos. 
Para os talleres, a plataforma inclúe unha sección de administración de citas que permite visualizar e organizar as citas, sen depender de notas físicas ou procesos manuais. Tamén conta cun módulo de xestión de clientes para o seu control.
Para os clientes, implementa unha sección de administración de vehículos, calendario con recordatorios, así como unha sección para pedir cita no taller que desee. 

As ferramentas utilizadas no desenvolvemento son: JavaScript, HTML5, CSS3 e PHP, así como a libraría de JavaScript FullCalendar para a xestión visual dos calendarios.

## Instalación / Posta en marcha

Para a posta en marcha do proxecto, requírese de XAMPP (v 8.2.12).
Descargamos a carpeta de 'Código' do GitHub. A continuación, iniciamos os módulos de XAMPP de Apache e o de MySQL. Imos ao phpMyAdmin ('localhost/phpmyadmin') e importamos o arquivo 'bd.sql' que se atopa no descargado anteriormente. Unha vez importado este, imos á unidade C: do noso ordenador, buscamos a carpeta xampp, logo a de htdocs, e creamos unha carpeta nova chamada FCT. Aquí copiaremos a carpeta descargada anteriormente.
Unha vez feito iso, simplemente teremos que buscar no navegador 'localhost/FCT/' e xa nos cargará a aplicación.

## Uso

A aplicación conta con dúas interfaces, a do mecánico e a do cliente. O mecánico pode ver a súa planificación de traballo tanto para o día actual como para os meses seguintes. Conta tamén ca opcion de administrar os seus clientes. 
Pola parte de clientes, conta cunha sección de calendario e horario para levar unha organización. Así como unha sección para a administración e control dos seus vehículos. Este tamén pode pedir citas nos diferentes talleres sen ter que chamar, aumentando o rendemento do taller (ao non perder o tempo en dar citas e demáis) e a mellora da relación entre os dous ao evitar esperas.  

## Sobre o autor

Ola, son Lucas. Son estudiante de desenvolvemento de aplicacións web (DAW). Os meus puntos fortes son o JavaScript, o PHP, e o deseño das páxinas web, sobre todo o maquetado.

Este proxecto nace dun problema cercano a min: o meu pai, propietario dun taller, perde moito tempo e produtividade xestionando citas, rexistrando información dos clientes, controlando pagos, etc. Observando esta situación, vin unha oportunidade para crear algo que o solucione. Deseñei unha plataforma que non só simplifica estas tarefas administrativas, senón que tamén ofrece ao usuario unha área persoal para xestionar os seus vehículos e un calendario con recordatorios das citas próximas.

Contacto : lucxstas@gmail.com

## Licenza
[GNU GENERAL PUBLIC LICENSE](./LICENSE)

## Índice

1. [Anteproyecto](doc/Anteproxecto.md)
2. [Análise](doc/Analise.md)
3. [Deseño](doc/Deseño.md)
4. [Codificación e probas](doc/Codificacion_e_probas.md)
5. [Implantación](doc/Implantación.md)
6. [Referencias](doc/Referencias.md)
7. [Incidencias](doc/Incidencias.md)

## Guía de contribución


Se queres engadir novas funcionalidades, realizar corrección ou optimización de código asi como de test automatizados. Non dubides en faer un pull request co que queiras implementar.
