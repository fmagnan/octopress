# Je veux mes 80% de couverture de code - Julien Charpentier / Cyrille Grandval - DarkMira

http://fr.slideshare.net/CyrilleGrandval/phptour-lyon-2014-je-veux-mes-80-de-couverture-de-code

On entend souvent qu'une bonne application est une application couverte par les tests unitaires à hauteur de 60%, 80% voire plus. Cette conférence vise à combattre cette métrique et à proposer des axes d'améliorations de la pratique des tests unitaires.

La couverture de code n'est pas forcément une bonne métrique car comme presque toutes les métriques, il est possible de la contourner. Il n'existe pas vraiment d'outil sur la couverture de code en PHP et on a tendance à faire plus de quantitatif que de qualitatif.

Ce qui est important de comprendre, c'est qu'un algorithme va proposer des chemins d'exécution et ces chemins doivent tous être parcourus si on veut pouvoir dire que le code a été testé. Donc, plutôt que de parler de couverture de code, il faudrait parler de couverture de chemins d'exécution. Ce qui est important, c'est d'explorer tous ces chemins donc tous les cas d'utilisation.

Maintenant qu'on sait que la quantité des tests est une mauvaise métrique, voyons comment améliorer la qualité des tests unitaires.

## Qualité des tests
 - ne pas tout tester : si on teste trop, la maintenance peut devenir assez vite très gourmande en ressources. Faites des tests unitaires réduits, uniquement sur les parties critiques de l'application
 - penser à la documentation : les tests unitaires sont la première source de documentation d'une application car ils sont synchronisés avec le code et ne deviennent pas obsolètes quand le code évolue
 - avoir une philosophie : il faut écrire des tests qui ne doivent pas (ou peu) être modifiés si l'application évolue. Pour cela, il faut se tourner vers l'injection de dépendances, le découplage, il faut éviter la complexité.
 - chercher tous les chemins d'exécution (les cas nominaux, les cas d'erreur, les cas limite)
 - utiliser une convention de nommage des méthodes de test va permettre de partager son code et de lire le code des autres plus facilement
 - faire de la revue de code
 - faire du pair programming

## Outillage
MutaTesting (https://github.com/Halleck45/MutaTesting/) : le mutation testing est une technique qui consiste à faire varier/muter un code source pour provoquer des erreurs qui vont faire échouer les tests unitaires. Si la mutation ne fait pas échouer le test unitaire, c'est que le test n'est pas correct et ne couvre pas tous les chemins possibles.