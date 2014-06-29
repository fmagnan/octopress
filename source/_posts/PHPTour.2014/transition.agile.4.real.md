Transition agile 4 real - Thomas Diavet, Nicolas Kalmanovitz - Meetic

http://fr.slideshare.net/tdiavet/transition-agile-4-real-meetic

Cette conférence est un retour d'expérience sur l'adoption des méthodes agiles au sein de meetic.

## 2002, l'histoire commence.
Meetic, c'est 20 personnes, beaucoup de communication, de feedback continu. L'équipe est ultraréactive, ça casse un peu en prod mais ça avance et Meetic devient européen en 2003.

## 2005, entrée en bourse

## 2006, début du rachat d'autres sociétés.

## 2011, Meetic est internationale et compte 400 personnes.
On constate une défiance entre la prod et les développeurs et le bilan du cycle en V jusqu'ici utilisé est douloureux :
 - le produit est de faible qualité
 - la capacité à innover est très faible à cause de la technologie qui pèse
 - le code est procédural, beaucoup de php4 encore présent : la dette technique est très élevée
 - la méthode de travail ne fonctionne plus, le fonctionnement en "command and control" atteind ses limites
 - pas de possibilité de s'adapter

 En 2011, en parallèle de constat, un nouveau directeur R&D propose de mettre en place des méthodes agile. On va partir sur du Scrum car la méthode est facile à apprendre et à mettre en place. Idéalement, il faudrait pouvoir réunir des équipes de 5 à 7 personnes, pluridisciplinaires (développeur, intégrateur, product owner, scrum master, testeur) : 8 équipes vont être constituées.

 Ces changements ont une conséquence directe : on livre peu mais on livre plus souvent. Du coup, il faut réfléchir à automatiser la chaine de publication qui ne doit plus être un frein.

 Les résultats sont encourageants : 2012 voit la croissance repartir.

 ## 2013, nouveau record au niveau du business.
 Les premiers enseignements sont les suivants :
  - il faut accompagner le changement, la transition
  - le rôle de double product owner ne fonctionne pas
  - si l'agilité n'est présente que dans les équipes de R&D, on est confronté à un déséquilibre avec les équipes business. L'agilité doit être présente à tous les niveaux
  - le "time to market" reste grand, il est difficile d'itérer avec des demandes urgentes qui peuvent poindre à tout moment et remettre en cause les sprints
  - l'outillage n'est pas adapté

## Passage à Kanban
Passer de Scrum à Kanban s'est fait en douceur et a bien fonctionné. On est passé à un management visuel. Le cercle s'est élargi à d'autres services de la DSI pour dépasser le simple cadre de la R&D.
Chez Meetic, des serious games "Get Kanban!" ont été organisés pour apprendre la méthode.

Au niveau des livraisons, le rythme s'accélère encore et les livraisons bi-mensuelles deviennent des livraisons continues, avec mises en place de métriques qui permettent de voir quels sont les points à améliorer.

Les nouveaux enseignements tirés sont les suivants :
 - les boards permettent de voir tout de suite les goulets d'étranglement
 - le flux "poussé" continue de poser des soucis et il n'est pas totalement supprimé, même si on essaie de le freiner
 - si le product owner n'est pas au sein de l'équipe, la méthode ne fonctionne pas car la dynamique est cassée
 - ingénierie agile : le "time to market" est considérablement réduit mais arrive à un palier
 - dev / ops, la communication n'est pas assez importante

Une nouvelle étape consiste à mettre en place un socle de qualité avec TDD, BDD, intégration continue, industrialisation (Puppet, Capistrano) et une refonte du back-end est initiée.

## novembre 2013, superbe opportunité sur le marché mobile
Cette opportunité est le moyen de faire la preuve que les méthodes agiles fonctionnent. On nous donne les clefs pour mettre en place une équipe pluri-disciplinaire avec l'objectif (le challenge !) de faire l'appli en 1 mois.

Le pari est réussi et d'autres initiatives de ce genre pourront voir le jour.

## Conclusion
L'approche bootom-up a bien fonctionné et constitue un bon levier pour proposer des changements. Mais pour que ces changements prennent de l'ampleur, il faut un soutien auprès de la direction.