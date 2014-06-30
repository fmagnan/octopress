# The fellowship of the code - Ronan Guilloux - Les polypodes

https://speakerdeck.com/ronanguilloux/the-fellowship-of-the-code-php-tour-2014

Cette conférence est un retour d'expérience sur la mise en place de process qualité au sein d'une agence web, avec une petite équipe, de petits moyens, un budget serré.

Chez les Polypodes, les budgets des projets tournent autour de 8 000 à 20 000 euros. Ce sont des projets qui prennent entre 1 à 3 mois pour être réalisés :
 - beaucoup de CMS
 - des petits forfaits

Dans un tel cadre, les développeurs sont essentiellement livrés à eux-mêmes et deviennent (s'ils ne le sont pas déjà) débrouillards, pragmatiques. Le problème, c'est que souvent la qualité des livrables en pâtit. Du coup, des BUGs apparaissent et la confiance que les chefs de projet ont pour eux à tendance à s'étioler.

Pour améliorer la situation, nous avons pris du recul pour analyser quelle était la perception des développeurs de la part des clients. Nous sommes arrivés à la conclusion que nous étions des "livreurs de choses en ligne". C'est le premier axe d'amélioration que nous avons choisi de privilégier.

## Améliorer la livraison
La mise en production d'une application est une sorte de baptême. Nous avons décidé d'appliquer certaines règles :
 - ne plus utiliser FTP pour la mise en prod et son corollaire : ne plus faire de mise en prod manuelle
 - utiliser ssh et bannir les serveur mutualisés. Nous sommes partis sur des serveurs dédiés pour tous nos clients
 - ne pas imposer d'outils à ceux qui ne sauraient pas les utiliser donc partir sur des outils simples et partagés par tous. Dans cette optique, nous avons abandonné Puppet (http://puppetlabs.com/) et Capistrano (http://capistranorb.com/) et nous avons préféré des scripts bash écrits en interne
 - une approche originale pour faire du déploiement consiste à utiliser l'outil make qui est disponible sur toutes les distributions linux

Cette première phase nous a apporté de la confiance. En outre, elle a permis à l'équipe d'être plus soudée et d'augmenter le rythme des déploiements. Ca nous confirme également dans le sentiment qu'il ne faut pas toujours demander les permissions de faire les choses.

## Etapes suivantes
D'autres axes d'amélioration sont possibles et ont été évoqués :
 - s'inspirer de GitHub : développer son projet comme s'il devait arriver sur GitHub (avoir un Readme.md très détaillé, ...)
 - apporter de la valeur quand on corrige un bug. Tous les bugs doivent générer un scénario de test Behat (http://behat.org/) avant d'être corrigé. Ainsi, leur correction rend l'application plus robuste en évitant les régressions. Tous les scénarios possibles de l'application ne doivent pas forcément être parcourus, il faut se concentrer sur les points critiques.
 - utiliser le semantic versioning (http://semver.org/)
 - passer de Excel à Redmine (http://www.redmine.org/) (ou autre plateforme de bug tracking) pour gérer les bugs
 - ajout d'une checklist de type opquast (http://opquast.com/fr/) pour les nouveaux projets
 - open sourcer certains projets, certaines documentations mises à disposition sur GitHub

## Ecueils
Ce cycle d'amélioration n'a pas rencontré un succès sans faille. Voici les problèmes que nous avons rencontrés :
 - tout le monde n'a pas forcément envie de progresser.
 - il faut un animateur pour que la dynamique ne retombe, pour éviter que l'équipe s'essouffle
 - le recrutement de nouveaux collaborateurs est plus compliqué, on devient plus exigeants
 - un écart peut se creuser entre les équipent si elles ne progressent pas au même rythme
 - même si le mouvement est initié par les développeurs, il faut que la direction suive et donne son aval pour que cela fonctionne