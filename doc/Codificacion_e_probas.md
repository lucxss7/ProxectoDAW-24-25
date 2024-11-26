# FASE DE CODIFICACIÓN E PROBAS

- [FASE DE CODIFICACIÓN E PROBAS](#fase-de-codificación-e-probas)
  - [1- Codificación](#1--codificación)
  - [2- Prototipos](#2--prototipos)
  - [3- Innovación](#3--innovación)
  - [4- Probas](#4--probas)

> Este documento explica como se debe realizar a fase de codificación e probas.

## 1- Codificación

> Crea unha carpeta no teu repositorio e sube o código frecuentemente.
>
> Mentres se vai codificando a aplicación, iranse atopando problemas e haberá que ir modificando aspectos do deseño. Estes cambios tamén se deben recoller na documentación.

## 2- Prototipos

> A medida que se vai codificando crearanse varios prototipos, preferentemente realizados con Figma. Para cada un indicar unha descrición das funcionalidades implementadas.
>
> Debes ir incluindo unha mostra representativan dos prototipos da aplicación.
>
> Os proptotipos axudan no deseño da aplicación. Podes empregar:
>
> - [Sketch](https://www.sketch.com/)
> - [Figma](https://www.figma.com/). Recomendada
> - [Proto.io](https://proto.io/)
>
> A mellor opción é empregar Figma xa que esta é unha ferramenta en línea colavorativa. 
> **Comparte o prototipo cos profesores por medio de Figma ou descarga o arquivo local o cal subirás o teu repositorio de GitHub**.

Prototipo feito con figma [link](https://www.figma.com/design/Rke6YFKyoGgpY2LTTlct7r/Untitled?node-id=0-1&t=VIk5YrQiSYUgi63B-1)
## 3- Innovación


Implementacion da libreria de js [FullCalendar.js](https://fullcalendar.io/). Realmente non é nada difécil de implementar na páxina web esta libreria que permitenos ter calendarios funcionais na paxina. 

Uso da API Publica [RandomUser](https://randomuser.me/) para a sección de plantilla. API que baixo una peticion ajax devolve o json con datos "reais" e aleatorios. Fácil implementación polo dado en JS.


## 4- Probas

Deben describirse as probas realizadas e conclusión obtidas. Describir os problemas atopados e como foron solucionados.

Había problemas con el JSON de las citas, ya que este no se generaba correctamente cuando habia citas en el día solicitado. Al ver el contenido de las variables con print_r ($horas_disp y $horas) no habia diferencias aparentes ya que ambos eran arrays. Sin embargo, al printear los datos con echo json_encode, uno de ellos se pasaba como array indexado y el otro como array asociativo (causado por el uso de array_diff()). Por eso use el array_values() para reindexar y eliminar cualquier indice. 
