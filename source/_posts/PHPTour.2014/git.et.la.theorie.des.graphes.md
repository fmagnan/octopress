Git et la théorie des graphes - Geoffrey Bachelet

https://speakerdeck.com/ubermuda/git-et-la-theorie-des-graph

Cette conférence apporte un regard sur Git basé sur la théorie des graphes dont Euler a posé les fondations : un ensemble d'éléments mis en relation entre eux.

Les liaisons peuvent être orientées (arêtes). C'est le cas de Git : on ne peut parcourir le graphe que dans un seul sens, du plus récent vers le plus ancien. Chaque commit a un pointeur vers son commit parent. Cela génére des graphes allant de droite à gauche alors que les commits sont lus de gauche à droite (du plus ancien au plus récent).

Toute la compléxité de Git réside dans l'atteignabilité (reachability), la capacité d'atteindre un noeud depuis un autre noeud.

Les cas présentés sont visuels donc difficilement retranscriptibles ici :
- fast forward : simple déplacement d'une étiquette
- cherry-pick : prendre un commit et l'appliquer à une branche
- rebase : on va d'abord chercher et trouver le commit "merge-base", c'est-à-dire le plus récent ancêtre commun à 2 branches. A partir de ce commit, c'est une succession de commits qui vont être appliqués, comme autant de cherry-pick. Cette technique sert à linéariser l'historique des commits.
- fetch : on récupère les commits distants dans la branche locale qui se nomme "origin/master". Ensuite, on peut faire un merge de cette branche avec la branche locale "master". C'est exactement ce qui se fait quand on fait un git pull : git fetch + git merge