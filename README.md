# Ping-pong Cup Hetic 2017
## Installation

Vous avez besoin de WAMP, MAMP ou d'un serveur Apache pour ce projet.

### Cloner le projet depuis le dépôt Git

Se placer dans le dossier pour installer le projet puis utiliser la commande git :
> git clone https://github.com/alexibsg/hetic-pingpongcup

### Installer les librairies avec Composer

Installer **Composer** ou utiliser un fichier **[composer.phar](https://getcomposer.org/download/)** à placer à la racine du projet.
Puis exécuter la commande 
> php composer.phar install

### Régler les droits sur les dossiers app/cache et app/logs

> chmod 777 -R app/cache

> chmod 777 -R app/logs

### Mettre en place la base de données
Les infos de la base se trouve dans le fichier **app/config/parameters.yml** , configurer le fichier en insérant vos logins de votre base de donnée (database_user et database_password)

Créer la base de données en exécutant cette commande  :
> php bin/console doctrine:database:create

Puis, remplissez la base de données avec les tables correspondant à vos entités :
> php bin/console doctrine:schema:update --force

### Installer les assets du projet

Installer les assets avec la commande : 
> php bin/console assets:install --symlink

## Mise en production

### Arborescence du projet

1ère étape : changer le nom du dossier “web” par “www”.

Bien évidemment cette manipulation n'est pas nécessaire si vous souhaitez déployer votre application dans un autre sous domaine. Car dans ce cas le dossier sur lequel pointe le serveur est configurable.

### Vérifier la configuration du htaccess

Vérifier dans le fichier **.htaccess** dans le dossier www/ (anciennement dossier web) qu’il y a bien ces paramètres :
> SetEnv SHORT_OPEN_TAGS 0
SetEnv REGISTER_GLOBALS 0
SetEnv MAGIC_QUOTES 0
SetEnv SESSION_AUTOSTART 0
SetEnv ZEND_OPTIMIZER 1
SetEnv PHP_VER 5_3

### S'autoriser l'environnement de développement

Dans le fichier **web/app_dev.php** complétez la condition avec votre adresse IP :
> if (!in_array(@$_SERVER['REMOTE_ADDR'], array(
 '127.0.0.1',
 '::1',
 **'votre adresse IP'**
))) {
 header('HTTP/1.0 403 Forbidden');
 exit('You are not allowed to access this file. Check '.basename(__FILE__).' for more information.');
}

### Envoyer le tout

Il ne reste plus qu’à envoyer tout le projet dans le dossier www
