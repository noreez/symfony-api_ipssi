# symfony-api_ipssi

# Installation

* Lancer la commande: docker-compose up -d
* Lancer la commande: composer install 
* Lancer la commande: docker-compose exec web bash
* Lancer la commande pour générer la base de données: php bin/console d:s:u --force
* Lancer la commande pour ajouter les fixtures: php bin/console hautelook:fixtures:load

Pour accéder à la base de données :

* user: root
* mdp: root 

Pour ajouter un admin:

* Lancer la commande: php bin/console app:create-admin nom@nom.com

Pour connaître le nombre de carte pour une personne:

* Lancer la commande: php bin/console app:count-cards non@nom.com 

Le dossier controller contient 3 fichiers avec ces différentes fonctions:

* AdminController 
* AnonymousController (getApiUser, getApiUsers, getApiSubscription, getApiSubscriptions, postApiUser)
* UserController (getApiUser, patchApiUser, getApiCards, deleteApiCard, patchApiCard)


