---
layout: post
title: "les bienfaits du remaniement de code"
date: 2013-07-08 23:25
comments: true
categories: 
---

## Introduction
Dans le domaine du développement logiciel, nous sommes régulièrement amenés à relire du code pour au choix :

* découvrir les raisons d'un dysfonctionnement
* ajouter ou faire évoluer une fonctionnalité
* s'adapter à un changement externe dont dépend le code (nouvelle version de php ou d'une bibliothèque tierce)

La méthode "classique" pour comprendre ce que fait un code consiste à

* lire le code
* ajouter des traces de debug
* lancer le script voir l'état des variables durant son exécution
* recommencer jusqu'à ce que le bug soit trouvé et corrigé

Le principal défaut de cette méthode est qu'elle empêche toute capitalisation des connaissances acquises
durant le processus.
Quand le bug a été trouvé, on efface ses traces et on laisse le code en l'état, sans apporter de plus-value, juste
le correctif.

Ainsi, la prochaine fois qu'il faudra intervenir sur ce code (dans 3 mois, dans 6 mois, dans 1 an ...)
il faudra repartir de zéro et tous les efforts consentis en ce jour devront être renouvelés.

La méthode que je me propose de présenter dans la suite de cet article consiste à remanier le code pour :

* en comprendre son fonctionnement
* l'améliorer et le rendre plus maintenable.
* corriger les bugs éventuels

Pour illustrer mon propos, j'ai pris un bout de code (une fonction, une vraie de la vraie vie) que j'ai trouvée
et avec laquelle j'ai eu maille à partir. Voilà à quoi ressemblait cette fonction :

{% include_code compress-method-before.php %}

Pour remanier un code, 2 techniques principales sont en oeuvre :
### Eliminer la duplication de code : DRY ([don't repeat yourself](http://c2.com/cgi/wiki?DontRepeatYourself))
Il s'agit ici d'identifier les lignes ou les portions de lignes qui sont identiques pour les abstraire
derrière une variable et/ou une fonction.

Par exemple, si on s'attarde sur les lignes 13 et 14 de notre script, on voit une certaine ressemblance :

{% codeblock lang:php %}
<?php
exec($fct . " -m -j " . $this->URL . "/done/" . $res . " " . $this->URL . "/done/" . $fichier);
plog_info('compression OK zip nom:' . $fct . " -m " . $this->URL . "/done/" . $fichier . " " . $this->URL . "/done/" . $fichier);
{% endcodeblock %}

On ne le voit peut-être pas du premier coup d'oeil mais elles sont identiques. En fait, la ligne 13 lance une commande
et la ligne 14 affiche une trace de la commande en question.

On peut donc remanier ce code en introduisant une variable :

{% codeblock lang:php %}
<?php
$command = $fct . " -m -j " . $this->URL . "/done/" . $res . " " . $this->URL . "/done/" . $fichier;
exec($command);
plog_info('compression OK zip nom: ' . $command);
{% endcodeblock %}

Le fonctionnement est le même mais cette modification a plusieurs avantages. Si on doit modifier la commande à
exécuter, on ne le fera qu'à un seul endroit dans le code, ce qui facilite la maintenance.

De plus, on évite les inconsistances, comme par exemple la modification de la commande mais pas de la trace. A ce
sujet, on voit qu'initialement, une erreur s'est glissée et le paramètre __-j__ qui est utilisé dans la commande
a disparu de la trace.

L'élimination de la duplication de code nous affranchit de ce genre d'erreur.

### Rendre le code expressif
Plus un code ressemble au langage courant, plus il est compréhensible et facile à lire. _A contrario_, plus le code
contient de structures imbriquées et plus l'effort intellectuel sera grand pour en comprendre son sens.

Par exemple, il est plus facile de lire :

{% codeblock lang:php %}
<?php
if ($isZipCommandExist) {
    doSomethingSmart();
}
{% endcodeblock %}

que

{% codeblock lang:php %}
<?php
if (!$isZipCommandNotAvailable) {
	doSomethingSmart();
}
{% endcodeblock %}

Si on veut pouvoir revenir sur son code pour le modifier, il faut s'efforcer de le rendre le plus expressif possible.
Dans notre exemple, on pourra créer des variables intermédiaires avec des noms explicites.

{% codeblock lang:php %}
<?php
$pathToFile = $this->URL . '/done/' . $fileName;
{% endcodeblock %}

### Assister à l'émergence d'un design
Voici à quoi peut ressembler le code après quelques remaniements :
{% include_code compress-method-after.php %}

En utilisant ces 2 techniques "bêtement" et en avançant pas à pas, on constate bien souvent que le code devient
plus conçis et qu'un design en émerge.

Ici, on passe de l'utilisation d'une structure __switch__ à un tableau de configuration des commandes à lancer
(zip et gzip).

Ce design, on ne l'avait pas forcément en tête lors de la création de la fonction mais le remaniement nous a aidés
à le mettre en place.

### Améliorer la maintenabilité du code
Non seulement le code est maintenant plus simple à lire et à comprendre mais il sera plus facilement ouvert
à une évolution éventuelle.

Un exemple : si on veut ajouter la possibilité de compresser par 7zip, il suffit d'ajouter une ligne dans notre
tableau et le tour est joué. Mieux encore, on peut profiter du design par configuration pour externaliser le tableau
dans une autre classe/méthode.

On décorrèle ainsi l'exécution de la configuration des commandes. Notre design s'en voit améliorer puisque le code
devient plus modulaire et par conséquent plus réutilisable.

### Avertissement
Je me dois de vous avertir sur __LE__ point négatif lié au remaniement de code : la régression.

Si le code n'est pas muni d'un filet de tests unitaires, on s'expose toujours à une regression quand on le manipule.
C'est l'argument principal qui a tendance à refroidir quiconque s'apprête à manipuler du code inconnu.
Les bonnes pratiques voudraient qu'on se munisse au prélable de tests unitaires avant d'entreprendre un remaniement
de code mais dans le monde réel, c'est souvent très difficile à mettre en place sur du "legacy code".

Il faut donc choisir son camp, j'ai choisi le mien ;)

## Conclusion
Eliminer toute duplication dans son code permet d'accélerer les développements et la maintenance.
Rendre son code expressif en permet une meilleure compréhension pour le lecteur futur.
Parfois même, de l'association des 2 émerge un design clair qui facilite l'évolutivité du code.
