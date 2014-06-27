Julien Fusco et Pascal Martin - TEA - Notre environnement de travail n'est pas un bizutage

http://koin.github.io/notre-env-de-dev-n-est-plus-un-bizutage/#/title

Cette conférence est un retour d'expérience concernant la mise en place d'un environnement de développement automatisé.

Le constat a été le suivant : si les outils de développement font la part belle à l'industrialisation (git et GitHub, Mac et Linux, HipChat ...), la documentation d'installation d'un poste de développement résidait essentiellement sur un wiki avec les erreurs que cela comporte : des pages non ou mal documentées, des chapitres obsolètes, des configurations de version de logiciel qui ne correspondent plus aux versions actuellement utilisées ...

La configuration manuelle d'une machine pouvait prendre jusqu'à 2 semaines et générait beaucoup de frustration chez le nouvel arrivant qui ne se voyait pas produire du code avant son terme.

L'équipe grandissant, un choix a été fait d'automatiser ces installations avec du Vagrant et des recettes Chef. Chaque poste de développement doit être autonome donc les services sont déployés sur les machines virtuelles mais aussi les données. Pour ne pas s'encombrer avec un trop grand volume de données, les données sont copiées depuis la prod sur le dev, puis nettoyées pour ne garder qu'un sous ensemble restreint mais cohérent.

Il reste que la configuration est très chronophage. Pour régler ce souci, l'outil stow a été choisi (http://www.gnu.org/software/stow/). Les configurations de développement sont commitées mais pas les configurations de prod. Pour aller plus loin, TEA a forké le projet sub (https://github.com/basecamp/sub) pour se créer une bibliothèque interne.

Les avantages de cette automatisation :
 - facilite la montée de version
 - permet des expérimentations (changement de version, changement de service)
 - tous les environnements de dev sont les mêmes pour tous les développeurs
 - rend possible la mise en place d'une intégration continue

En revanche, il faut garder en tête que ces scripts de Vagrant doivent être maintenus au même titre que le code des projets. Il faut donc prévoir du temps pour le faire pour les projets existants mais aussi pour les nouveaux projets qui auront besoin de leurs recettes.