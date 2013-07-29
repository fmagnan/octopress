---
layout: post
title: "Vous ne devriez pas écrire de commentaires"
date: 2013-07-25 22:46
comments: true
categories:
published: true
---

## Introduction
On a coutume de dire, ou de lire, qu'un bon code est un code bien documenté. La documentation
fait partie intégrante du travail du développeur et d'aucuns y attachent autant d'importance
qu'au code lui-même. Mon avis personnel va à l'encontre de cette _croyance_. Non seulement
documenter son code est une perte de temps, mais les effets pervers que cette tâche entraîne
ne sont pas négligeables.
> Les blocs de code de ce récit étant purement fictifs, toute ressemblance avec des bouts de
codes existants ou ayant existé ne saurait être que fortuite.

### 2 grandes familles de commentaires
#### Le commentaire explicatif au sein même des fonctions
Ce commentaire se décline sous plusieurs formes. La forme la plus répandue est la paraphrase.
Pour que le code soit considéré comme _bon_, il doit contenir un certain nombre de lignes de
commentaires. Le développeur ajoute donc des lignes de commentaires qui ne sont que des
paraphrases du code lui-même. En voici quelques exemples
{% include_code comments/paraphrases.php %}
> Ce type de commentaires est parfaitement inutile, il ne fait qu'alourdir le code.

Une variante de la paraphrase, plus subtile, consiste à donner l'impression que le code et son
commentaire expriment la même information mais en saupoudrant le tout de quelques nuances.
En général, le commentaire est plus proche de la vérité que le code
{% include_code comments/inexpressives.php %}
> Une explication claire d'un code obscur génère de la confusion auprès du lecteur.

La dernière forme concerne les fonctions trop compliquées pour être comprises dès la première
lecture. L'auteur, dans un élan de générosité envers son prochain, parsème sa création de quelques
remarques et/ou explications qui tiennent le lecteur en haleine.
{% include_code comments/complex.php %}
> Quand le code d'une fonction devient trop compliqué pour être compris sans explication, il
mérite probablement d'être décomposé en plusieurs.

#### La documentation autogénérée
Les commentaires servant à générer de la documentation
([Javadoc](http://www.oracle.com/technetwork/java/javase/documentation/index-jsp-135444.html),
[PHPdoc](http://www.phpdoc.org/) ...) sont d'une toute autre nature.
Ils ne donnent pas d'explication sur le code mais permettent de générer l'API
d'utilisation des bibliothèques écrites. Là encore, on rencontre beaucoup de paraphrases : la
description d'une fonction reprend en général le nom de la fonction. Si l'intention est louable
au premier abord, on observe plusieurs effets pervers à ce type de commentaire.

### La tenue à jour consomme du temps précieux
La documentation autogénérée nécessite l'écriture de commentaires assez verbeux, par exemple :
{% include_code comments/verbose.php %}
Ici, une ligne de code nécessite 4 lignes de commentaires.  Bien entendu, toute modification du
code entraîne une obligation de modification de commentaires. Mécaniquement, un code documenté
sera plus long à faire évoluer. Le temps passé à écrire des commentaires peut être passé à écrire
du code qui marche, ou des tests.

### Un frein au remaniement de code
De prime abord, revenir sur du code qui marche pour le remanier est une démarche qui n'est pas
forcément facile. Pourtant, elle devient nécessaire quand le code évolue. Surtout si on s'attache
à le rendre plus compréhensible, en évitant l'indigestion du plat de spaghettis. La documentation
ajoute à cet effort la nécessité de la tenir à jour. C'est un frein au
remaniement de code. Consciemment ou non, plus d'un développeur abdique devant cette tâche.

### La documentation a une fâcheuse tendance à se désynchroniser du code
Souvent, l'écriture de la documentation est initiée en début de projet. Tout le monde s'accorde à
dire que c'est une bonne pratique et qu'il faudra s'y tenir tout au long du projet. Mais les
premières échéances arrivant, le retard s'accumulant, c'est bien souvent la documentation qui
fait les frais de la pression qui monte. On retrouve alors des commentaires qui ne sont plus en
accord avec le code. Le code a évolué mais les commentaires d'origine sont restés.

On est alors en présence d'un paradoxe intéressant : on écrit de la documentation pour constituer
une documentation autogénérée de qualité, afin que les futurs utilisateurs des bibliothèques s'en
réfèrent. Or, elle devient erronée et va contribuer à la désorientation de ces futurs
développeurs, tout le contraire du but initial. _A contrario_, si le code ne contient pas de commentaires,
les développeurs viendront lire le code qui lui, ne se trompe pas.
> Contrairement à certains commentaires, le code dit ce qu'il fait et fait ce qu'il dit.

## Conclusion
Vous l'aurez compris, ce billet est hautement provocateur. Il n'est pas dans mon intention de
prôner l'absence totale de commentaires. Je souhaite plutôt pointer du doigt les dérives qu'ils
peuvent engendrer. Ecrire des commentaires, c'est donner du sens à son code. Dans certains cas,
les fonctions qu'on écrit sont tellement compliquées qu'il est intéressant d'écrire des
commentaires. Mais il faut voir cela comme le dernier recours, quand toutes les tentatives pour
rendre le code expressif ont échoué.

Pour la documentation autogénérée, c'est vraiment très chronophage de la tenir à jour. Donc, à
moins que vous écriviez votre propre framework destiné à être utilisé par des
dizaines/centaines/milliers de développeurs, vous pouvez vous en passer et utiliser votre temps
à écrire du code et des tests.

Enfin, si vous souhaitez capitaliser sur la documentation, écrivez des tests. Les tests
constituent une très bonne documentation car ils sont toujours à jour vis à vis du code. Ici,
pas de possibilité de désynchronistaion puisque si les tests ne sont plus à jour, ils ne passent
plus.
> Consacrez le temps alloué à la documentation à écrire des tests