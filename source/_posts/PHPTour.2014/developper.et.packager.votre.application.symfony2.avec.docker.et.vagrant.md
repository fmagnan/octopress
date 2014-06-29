Développer et packager votre application symfony2 avec Docker et Vagrant - Thierry Marianne - Theodo

https://speakerdeck.com/thierrymarianne/developper-et-packager-une-application-symfony2-avec-docker

On va partir d'une application symfony existante (https://github.com/thierrymarianne/symfony2-docker-vagrant) qui dispose de son déploiement automatisé et de son intégration continue.

On va utiliser Docker pour mettre en place un environnement de développement. Comme Vagrant, le grand intérêt de Docker réside dans l'automatisation de la création de l'environnement mais il affiche un gain de performance non négligeable.

Comme les containers peuvent être aussi bien utilisés en environnement de développement qu'en environnement de production, les avantages profitent autant aux développeurs qu'aux opérationnels.

Il existe 3 types de containers Docker :
 - le container machine qui représente l'intégralité d'une machine
 - le container application qui va contenir un service (nginx, apache ...)
 - le container volume de données qui va permettre le partage de données entre le host et le container

 Par défaut, les containers sont en lecture seule donc ils ne permettent pas la persistence de données. Pour partager des données, on montera des volumes de données dans les containers.

 L'intégration avec Vagrant est double. On peut utiliser Docker en tant que provider (à la place de virtual box par exemple) mais on peut également l'utiliser comme un provisioner (à la place de Puppet, Chef ou Ansible par exemple).

 Contrairement à Vagrant, la bonne pratique concernant Docker incite à créer autant de containers qu'on a de services, auxquels on ajoute les containers "volume de données". 

On va créer plusieurs containers qu'on va lier entre eux :
1) un container elastic search
On commence par écrire le Dockerfile et on lance le build. On peut lui donner un nom pour l'identifier plus facilement. Cela nous permettra de le distribuer et de le partager avec la communauté. Il va également nous falloir un container de type volume de données pour partager un dossier.

2) un container symfony2
On va pouvoir lancer le container symfony2 en montant le volume qui contient le dossier de symfony2 et l'option --link de docker nous permet de lier le container symfony2 avec le container elastic search. On peut également lier le container nginx. 

Pour surcharger la configuration de base, docker permet d'injecter des variables d'environnement (on peut utiliser des alias pour passer ces variables d'environnement)

Astuces :
 - ne pas faire d'apt-upgrade, choisir des box qui sont déjà dans une version récente
 - utiliser un proxy sur le host pour ne pas avoir à télécharger les paquets à chaque fois
 - si on veut bénéficier du cache de Docker dans le Dockerfile, il ne faut pas intervertir les lignes. C'est pour cela que si on utilise des recettes Chef ou Ansible par exemple, aucune action de ces recettes ne sera mise en cache par Docker
 - pour les dépendances de composer, on pourra également se tourner vers un proxy toran (https://toranproxy.com/)

## Pour aller plus loin

Lier les containers les uns aux autres peut s'avérer assez fastidieux. Pour faire fonctionner tous ces containers de concert, on utilisera un outil d'orchestration.

Il en existe plusieurs mais on va s'intéresser ici à fig (http://orchardup.github.io/fig/)

La commande principale est :
$ fig up

Il existe également l'outil Cadvisor (https://github.com/google/cadvisor) qui permet de monitorer ses containers.

Notons que OpenStack propose le support de Docker en production avec leur outil d'orchestration Heat (https://wiki.openstack.org/wiki/Heat)

Enfin, d'autres outils existent comme gaudi (https://github.com/marmelab/gaudi) ou Maestro-NG (https://github.com/signalfuse/maestro-ng)