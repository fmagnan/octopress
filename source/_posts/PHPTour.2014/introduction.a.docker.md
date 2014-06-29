Introduction à Docker - Geoffrey Bachelet

https://speakerdeck.com/ubermuda/introduction-a-docker

Docker a été conçu par Dotcloud comme un PAAS privé. Le principe de Docker est de créer des containers linux qui vont permettre l'isolation de processus et de ressources sur une machine :
 
 On parle parfois de chroot survitaminé ou de VM ultra légère car les containers sont beaucoup plus rapides qu'une VM. La principale raison est que les containers partagent le noyau avec leur hôte. C'est pour cela que Docker ne fonctionne que sur Linux.

 Néanmoins, il est possible de le mettre en place sur Windows/Mac en utilisant boot2docker (http://boot2docker.io/), qui est une VM ultra légère.

 Comme Docker partage le noyau avec son hôte, il n'utilise pas de ressources supplémentaires. Les images des containers sont également plus réduites que des VMs (300 à 600 Mo contre plusieurs Go pour des VMs).

 Une image Docker est constitué d'un noyau (en lecture seule), de la couche AUFS (http://fr.wikipedia.org/wiki/Aufs est un système qui va faire le lien entre le système de fichiers en lecture seule et le système de fichiers en écriture qui est monté au lancement de Docker) ou BTRFS et d'un système de fichiers.

 Un container est basé sur une image à laquelle on ajoute un système de fichiers en lecture/écriture.

 Docker dispose d'un système de commits permettant de créer un container pas à pas. On va pouvoir itérer sur les étapes d'installation de notre image.

 L'image pourra être lancer avec une commande.

 Pour faciliter la création des images, Docker propose le Dockerfile et la commande docker build qui va créer l'image en fonction des instructions notées dans le fichier.

 ## Fonctionnalités de Docker
  - CLI : beaucoup de commandes sont disponibles
  - réseau : on va pouvoir lier des containers entre eux (PHP et MySQL par exemple) et un système de service discovery est disponible
  - volumes : les données peuvent être partagées entre l'hôte et les containers mais aussi entre différents containers
  - hub : la communauté est très grande et des milliers d'images sont déjà disponibles
  - remote api : Docker dispose d'une API et déjà beaucoup de clients sont disponibles

 ## Orchestration
 Pour lier les containers entre eux, il faut utiliser un outil d'orchestration. Cela permet de séparer les services en autant de containers qui vont communiquer entre eux.
 Docker ne propose pas cette fonctionnalité et on peut se tourner vers des outils comme gaudi (https://github.com/marmelab/gaudi) et fig (http://orchardup.github.io/fig/)

 ## Cas d'usage
 Docker va pouvoir servir à mettre en place des environnements de développement mais aussi des environnements de pré-production.  Il peut également permettre de faire de l'intégration continue, du déploiement continu.