L'asynchrone en PHP - Olivier Dolbeau - Blablacar

https://speakerdeck.com/odolbeau/asynchronous-tasks-in-php

## Pourquoi faire de l'asynchrone ?
L'asynchrone va servir à ne pas bloquer vos utilisateurs quand des ressources importantes sont nécessaires à l'exécution d'une tâche.

Exemple : mot de passe oublié
Quand un utilisateur vient sur votre site et vous signale qu'il a oublié son mot de passe, vous pouvez lui envoyer et attendre le résultat de l'envoi pour lui signifier qu'il va le recevoir sous peu.
Mais vous pouvez également *mentir* en lui disant qu'il va recevoir son mot de passe et déléguer l'envoi de mot de passe à une autre application (ou partie de l'application), en asynchrone.

Chez Blablacar, on utilise le **message broker** RabbitMQ (http://www.rabbitmq.com/). Le principe est très simple, il s'agit d'une file d'attente. Quand on envoie des messages à RabbitMQ, ils sont placés dans la file d'attente afin que des **workers** puissent les **consommer**. Cette architecture permet une grande **scalabilité** puisqu'on peut placer autant de **workers** que l'on veut.

Le mécanisme peut être étendue et on peut avoir plusieurs files d'attente qui seront derrière un **exchange** (aiguilleur). Ce dernier va recevoir les messages et va décider de les affecter à telle ou telle file d'attente. Cela permet de gérer des priorités dans les messages : telle file d'attente sera consommée en priorité par rapport à telle autre.

L'application PHP va discuter avec RabbitMQ par l'intermédiaire de l'extension PECL amqp (http://pecl.php.net/package/amqp) développée par Pieter de Zwart.

Problèmes rencontrés et conseils :
 - un worker est un daemon qui tourne tout seul. La moindre exception va le tuer, ce qui est problématique. Pensez à utiliser des blocs try/catch pour éviter cela.
 - n'utilisez pas la méthode **consume**. Cette méthode est bloquante, il vaut mieux lui préférer la méthode **get**.
 - une simple boucle *while (true)* avec un sleep de 20ms suffit à implémenter un worker
 - attention quand vous faites une mise à jour du worker. Il faut dire au worker que c'est son dernier tour pour qu'il s'arrête proprement avant d'être mis à jour. Pour ce faire, on utilise des signaux.
 - pour gérer les signaux d'arrêts, il faut penser à les intercepter en début de boucle pour sortir de la boucle s'ils sont reçus.
 - si la tâche du worker échoue (envoyer un mail par exemple), la bonne pratique consiste à réessayer un peu plus tard. A chaque nouvel échec successif, on augmentera le temps de latence qui nous sépare de la prochaine tentative.
 - évitez d'utiliser symfony pour les workers, choisissez une base de code légère
 - redémarrez régulièrement les workers pour vous affranchir des éventuelles fuites mémoire
 - si vous utilisez Monolog, limitez la taille de la mémoire allouée au **fingerCrossedHandler**
 - pour utiliser des pools de workers, on peut s'orienter vers supervisor (http://supervisord.org/)

 Chez Blablacar, une bibliothèque a été *open sourcée* qui s'appelle swarrot (https://github.com/swarrot/swarrot) et qui permet de communiquer avec RabbitMQ. Son fonctionnement se rapproche de celui de StackPHP (http://stackphp.com/) en ce sens que les traitements vont être imbriqués les uns dans les autres.