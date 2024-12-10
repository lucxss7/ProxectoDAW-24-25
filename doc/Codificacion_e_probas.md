# FASE DE CODIFICACIÓN E PROBAS

- [FASE DE CODIFICACIÓN E PROBAS](#fase-de-codificación-e-probas)
  - [1- Codificación](#1--codificación)
  - [2- Prototipos](#2--prototipos)
  - [3- Innovación](#3--innovación)
  - [4- Probas](#4--probas)

> Este documento explica como se debe realizar a fase de codificación e probas.

## 1- Codificación

[Codigo](../Codigo/);

## 2- Prototipos

Prototipo feito con figma [link](https://www.figma.com/design/Rke6YFKyoGgpY2LTTlct7r/Untitled?node-id=0-1&t=VIk5YrQiSYUgi63B-1)
## 3- Innovación


Implementacion da libreria de js [FullCalendar.js](https://fullcalendar.io/). Realmente non é nada difécil de implementar na páxina web esta libreria que permitenos ter calendarios funcionais na paxina. 

Uso da API Publica [RandomUser](https://randomuser.me/) para a sección de plantilla. API que baixo una peticion ajax devolve o json con datos "reais" e aleatorios. Fácil implementación polo dado en JS.


## 4- Probas

Deben describirse as probas realizadas e conclusión obtidas. Describir os problemas atopados e como foron solucionados.

Había problemas co JSON das citas, xa que este non se xeraba correctamente cando había citas no día solicitado. Ao visualizar o contido das variables con print_r($horas_disp) e $horas, non había diferenzas aparentes, xa que ambos eran 'arrays'. Porén, ao imprimir os datos con echo json_encode, un deles pasábase como array indexado e o outro como array asociativo (causado polo uso de array_diff()). Para solucionar isto, empreguei array_values() para reindexar e eliminar calquera índice.

Outro problema que xordeu, foi a hora de modificar os datos do usuario. Xa que en principio podiase cambiar o arroba, o cal facía que se cambiase o usuario da sesion, xerando erros. Optouse por simplemente non poder modificar o arroba por agora. ´

Outro problema foi a hora de faer as notificacions. Nunha primeira instancia faltaba pasar o id ao php. Solventouse co uso do data-set a hora de renderizar as citas. 
