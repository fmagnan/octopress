---
layout: post
title: "Composer et les bibliothèques tierces"
date: 2013-07-21 17:44
comments: true
categories: PHP composer
---

## Introduction
Dans mon entreprise, nous utilisons [GitHub][github] et plus précisément les "repositories" privés. Pour simplifier les choses, on a créé une organisation et ajouté tous nos projets à l'intérieur. Des projets, on en a beaucoup (plus de 40). Ils sont sont pour l'essentiel écrits en PHP et la plupart (tous ?) utilisent [composer][composer]. Comme je ne travaille pas sur tous ces projets, je ne sais pas quelles sont les bibliothèques utilisées par tel ou tel projet.

Et puisque [GitHub][github] ne permet pas d'avoir en un simple coup d'oeil cette information, je l'ai fait.

## Objectifs
Les objectifs sont multiples

* disposer d'une page qui recense tous les projets d'une organisation [GitHub][github]
* afficher l'information instantanément
* afficher pour chaque projet la liste des __paquets/bibliothèques/projets__ dont il dépend
* avoir un affichage plutôt joli
* afficher des informations pratiques sur ces bibliothèques

## Mise en oeuvre
Comme je voulais que ma page s'affiche instantanément, j'ai décidé de désynchroniser la recherche d'informations de son affichage. La discussion avec les APIs est plutôt lente donc je ne pouvais pas me permettre d'engager le dialogue à chaque affichage de page.

Je suis donc parti sur un script en mode [CLI](http://php.net/manual/en/features.commandline.php) qui va me chercher les informations dont j'ai besoin et les stocker dans un fichier. Ainsi, quand la page doit s'afficher, elle ne fait que lire les informations du fichier, ce qui est beaucoup plus rapide.

Pour le script en ligne de commande, j'ai choisi le composant [Console](http://symfony.com/doc/current/components/console/introduction.html) de Symfony.

Pour communiquer avec [GitHub][github] et [Packagist][packagist], mon choix s'est porté sur les bibliothèques [knplabs/github-api](https://github.com/KnpLabs/php-github-api), [knplabs/packagist-api](https://github.com/KnpLabs/packagist-api) :  de [Knp Labs][knplabs]. Elles permettent de s'interfacer avec les APIs de [GitHub][github] et de [Packagist][packagist] pour récupérer les informations dont j'ai besoin.

Elles sont relativement faciles d'utilisation et la documentation est plutôt bien faite.

Pour l'affichage, j'ai utilisé [Twig](http://twig.sensiolabs.org/) et j'ai confié l'apparence à [Darkstrap.css](http://danneu.com/posts/4-darkstrap-css-a-dark-theme-for-twitter-bootstrap-2/) qui est une déclinaison du [Twitter Bootstrap](http://twitter.github.io/bootstrap/). Et comme j'ai mis des liens internes sur ma page, j'ai ajouté un effet de défilement vertical quand on clique dessus (ça sert à rien mais je trouve ça rigolo).

## Exemple
Pour illustrer mon propos, j'ai récupéré tous les projets de plusieurs organisations

 * [Pixel418](http://pixel418.com/) (copinage) --> [la liste](http://packages.gamelab.fr/?org=Pixel418)
 * [KnpLabs][knplabs] --> [la liste](http://packages.gamelab.fr/?org=KnpLabs)
 * [Symfony](http://symfony.com/) --> [la liste](http://packages.gamelab.fr/?org=Symfony)

## Conclusion
Avec l'avènement de [composer][composer] dans le monde PHP, on ne devrait se soucier que du code métier. Toutes les problématiques "_générales_" devraient être résolues par des bibliothèques tierces. Et tant qu'à faire, autant capitaliser sur les mêmes.

[github]: https://github.com/
[packagist]: https://packagist.org/
[composer]: http://getcomposer.org/
[knplabs]: http://knplabs.com/