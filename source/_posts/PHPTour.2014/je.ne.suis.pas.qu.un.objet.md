Gérald Croës - Je ne suis pas qu'un objet

http://www.croes.org/gerald/conf/php/lyon/2014/je_ne_suis_pas_quun_objet.pdf

Retour d'expérience de 15 ans d'apprentissage de la POO

Dans cette conférence, Gérald Croës nous parle de la différence entre la théorie de la programmation objet telle qu'il l'a découverte durant ses études et la pratique qu'il a expérimenté dans sa profession. 

Si le programme parfait n'existe pas (c'est une chimère), un certain nombre de bonnes pratiques, de procédés permettent de mettre en place des fondations solides sur lesquelles seront bâties des applications maintenables, robustes, évolutives ...

L'auteur insiste sur le fait que l'écriture de code est un exercice de création mais aussi un exercice de communication au sein de l'équipe de développement. La POO vise à créer du code réutilisable en petites unités élégantes et simples qui communiquent entre eux. Ce code doit être compréhensible par les collègues qui doivent se l'approprier.

## L'écriture du code
Le meilleur indicateur de qualité d'un code est le nombre de "What the fuck" prononcés à la minute par les développeurs qui doivent le lire, le modifier. Un "mauvais" code soulèvera beaucoup de commentaires négatifs quand un beau code sera "transparent", ne soulèvera pas de remarques. L'effort d'écriture est important car quand on écrit une ligne, on en lit 10.

Conseils :
 - choisissez vos mots, soyez explicite dans les termes que vous utilisez
 - le code n'est jamais lu du début à la fin mais morcelé. Chaque morceau de code pris indépendemment des autres doit se suffire à lui-même et comporter suffisamment d'informations pertinentes
 - n'ayez pas peur d'être verbeux, soyez précis
 - ne faites pas d'humour dans le code
 - éviter les recoupements de rôles
 - éviter la désinformation
 - les commentaires sont un aveu de faiblesse. Celui qui écrit des commentaires dit à son lecteur ce qu'il aurait fait s'il avait réussi à donner les bonnes informations dans son code. Eviter avant tout les paraphrases. Si vous devez absolument ajouter du code, faites en sorte qu'il doit différent du code lui-même.
 - le code doit exprimer l'intention
 - mettez en place des conventions de codage partagées par toute l'équipe et respectez les
 - un bon exercice après avoir écrit une classe, c'est d'essayer de tout oublier et de relire la classe avec un oeil neuf, comme si on l'a découvrait

## Le code
L'activité de programmation est un paradoxe en ce sens que le développeur ne connait jamais ce qu'on lui demande de coder. Il doit représenter dans son application une réalite que parfois il ne comprend pas.

Il faut donc rester pragmatique, garder à l'esprit que les choses vont changer. Dans cette optique, cela n'est pas utile de développer des fonctionnalités en essayant de prévoir le futur : il faut se concentrer sur ce qui est vraiment demandé mais faire les choses de manière à ce que le code puisse évoluer en douceur (YAGNI + KISS). Pensez à faire des interfaces pour augmenter le découplage dans les éléments de votre application.

Du point de vue du client, la POO ne sert à rien. Il recherche une solution à son problème. La POO n'est qu'un des moyens pour parvenir à cette solution.

Au sujet des design patterns, regardez les, étudiez les, c'est l'équivalent des gammes d'un pianiste mais gardez-vous bien de les utiliser. Cet avis semble péremptoire mais le grand écueil des design patterns, c'est de vouloir adapter sa problématique à tel ou tel design pattern pour pouvoir l'appliquer. C'est l'inverse qu'il faudrait faire : adapter les design patterns à sa problématique, mais c'est quelque chose qui est ardu.

Faites des solutions adaptées à vos problèmes en vous inspirant des design patterns.

## SOLID
 S : une seule raison de changer, une seule responsabilité
 O : une nouvelle fonctionnalité implique une nouvelle classe
 L : les classes filles doivent respecter le contrat de la classe mère
 I : ne dépendez que du strict nécessaire
 D : dépendez des concepts et non des implémentations, injectez les dépendances (constructeur, setters)

Ces règles ne sont que des guides, des gardes fou. Avant tout, restez pragmatique, réinventer toujours, casser les principes si c'est nécessaire, ne les laissez pas vous enfermer.

## DDD (Domain Driven Design) / BBBB (Big Boring Blue Book)
Cette méthode propose de regrouper la complexité d'une application dans un domaine métier qui serait isolé de l'interface, de la couche de persistence ...

Ce domaine doit être dicté par le business : c'est le vocabulaire du client qui doit générer les termes utilisés dans le code. Si votre client est français, utilisez les termes français dans votre code pour que le sens des mots soit connu de tous.

En conclusion, gardez à l'esprit que le secret de la POO est un mix entre le travail d'écriture pour raconter une histoire, la rendre compréhensible et des problématiques techniques à prendre en compte et à implémenter.