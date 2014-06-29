Ca ressemble à quoi une application symfony avec plus de 100 000 lignes de code ? - François Zaninotto - Marmelab

http://fr.slideshare.net/francoisz/php-100k

A première vue, une application avec plus de 100 000 lignes de code, c'est opaque. C'est surtout trop gros pour qu'on puisse l'embrasser d'un simple coup d'oeil dans son intégralité. Il va donc falloir accepter de voir les choses de façon partielle.

On va prendre comme exemple l'application Etna qui est un CMS développé par Marmelab (2 ans de développement environ).

Pour appréhender cette application, on va se mettre dans la peau d'un explorateur de code.

## Se situer
Pour se situer dans une telle application, on a généralement 10 minutes. On va voir plusieurs techniques pour profiter au mieux de ces 10 minutes. On va essayer de réduire le projet à 1 seule dimension pour simplifier la complexité.
 - taille des fichiers : avec la commande du (disk usage), on peut avoir une idée de l'endroit où réside la complexité de l'application
 - avec cloc (http://cloc.sourceforge.net/), on peut compter le nombre de lignes de code
 - Code Flower (http://redotheweb.com/CodeFlower/) permet d'avoir une vue d'ensemble graphique
 - l'historique de git peut également fournir des informations. Un git shortlog va nous donner la liste des contributeurs. Un git grep va nous donner la liste des TODO et des FIXME (par exemple)
 - un autre indicateur intéressant va être le nombre de dépendances et leur nature. Dependency Wheel (http://redotheweb.com/DependencyWheel/) va nous donner une vision des dépendances directes et indirectes

## Découvrir
Il est temps maintenant de découvrir l'application. On peut par exemple interroger les tests unitaires. Un phpunit -c app -filter ContentLocker -testdoc va nous afficher le nom des méthodes de test. Ces méthodes sont la documentation de l'application. Il ne faut pas se fier aux commentaires qui deviennent vite obsolètes (voir manquants). Le code des tests n'est pas obsolète (tant que les tests virent au vert bien sûr)

Une métrique pour les commentaires : un code "bien écrit", c'est généralement 1 ligne de commentaire pour 20 lignes de code.

Un schéma d'architecture peut être intéressant, pourvu qu'il soit à jour. Une bonne pratique consiste à maintenir ce document à jour. Il faut donc que ce document soit facile à mettre un jour. Un simple fichier texte qui générerait un schéma en HTML5 est l'idéal.

## Faire évoluer l'application
Pour faire évoluer l'application, il va falloir rentrer dans son moule. Si des design patterns sont utilisés, il est de bon ton de les respecter et de faire de même pour les nouvelles fonctionnalités, afin d'assurer une certaine cohérence dans l'application (fat model, slim controller ...)

L'intérêt d'utiliser un framework full stack comme symfony est qu'il dispose d'une grosse communauté. Cela nous amène au corollaire suivant : une application symfony2 de 100 000 lignes de code ressemble ... à une autre application symfony2 de 100 000 lignes de code.

Un conseil pour symfony : faire un seul bundle pour l'application et décomposer les fonctionnalités en dossiers.

S'attacher à nommer les choses de façon explicite et respecter les standards (ici PSR2). Pour ce dernier, on peut par exemple automatiser cela avec un hook de pre commit pour que les développeurs n'aient pas à s'en soucier.

## Entretenir l'application
L'évolution d'une application ne se fait pas sans une accumulation de la dette technique. Pour pouvoir la gérer, il faut savoir la mesurer. Des outils sont disponibles :
 - sensiolabs insight (https://insight.sensiolabs.com/) permet d'évaluer la qualité du code
 - archeologit (https://github.com/marmelab/ArcheoloGit) permet de détecter les fichiers modifiés souvent et les fichiers qui n'ont pas été modifiés depuis très longtemps. Ces fichiers représentent des risques plus importants que les autres (bombes à retardement)

 Il faut garder à l'esprit que pour maintenir la qualité d'une application de ce type, il faut l'équivalent d'un temps plein.

 Si l'application grossit trop, on peut se diriger vers une architecture orientée services (SOA, micro services) pour découper une application en plusieurs plus petites.