# GPXViewer WEB SITE

--------------------------------------

## DESCRIPTION

Interface web permettant d’insérer un fichier .GPX (fichier de coordonnées GPS) sur une carte Google Maps et de pouvoir visualiser le tracé de celui-ci, ou encore de pouvoir dessiner sur cette carte un
tracé quelconque, le tout en appliquant une méthode dite [**SnapToRoad**](https://developers.google.com/maps/documentation/roads/snap?hl=fr).

--------------------------------------

## FONCTIONNALITÉS

Les fonctionnalités présentes sur le site sont les suivantes :
1. Pour un utilisateur non-connecté
	* Explication de la fonction du site sur la page d'accueil
	* Création d'un compte personnel
2. Pour un utilisateur connecté
	* Choix du type de parcours suivi ainsi que la méthode à utiliser
	* Possibilité de renseigner un fichier GPX spécifique qui sera interprété par une carte Google Map
	* Exploitation d'une carte Google Map (tracer un parcours directement)
	* Application de la méthode _**SnapToRoad**_ au parcours

--------------------------------------

## DÉPENDANCES

Pour faire fonctionner correctement le projet, il vous faudra :
* _**PHP**_
* _**Un serveur web (apache2)**_
* _**Module de réécriture d'URL de votre serveur web activé**_
* _**Un système de gestion de bases de données (MySQL)**_
* _**Internet**_

Pour aller plus vite, vous pouvez installer directement :
1. Sur Windows

	| W | A | M | P |
	|:---:|:---:|:---:|:---:|
	| **Windows** | **Apache** | **MySQL** | **PHP** |

2. Sur Linux

	| L | A | M | P |
	|:---:|:---:|:---:|:---:|
	| **Linux** | **Apache** | **MySQL** | **PHP** |


--------------------------------------

## INSTALLATION

Les routes du sites sont définies dans le fichier `.htaccess`.
La structure de la base de données est située dans le fichier `users.sql` (à importer directement).

Une fois toute les dépendances installées, et le projet cloné, suivez la procédure d'installation.

--------------------------------------

### SOUS LINUX

#### Configuration des fichiers clés du site

1. Les informations de connexions au SGBD (Système de Gestion de Bases de Données) se situent dans le fichier app/config/dbconnect.php. Mettez les informations à jour selon votre configuration.
2. L’importation d’une carte Google Map sur notre site en local nécessite l'importation de **l’API Google Maps Roads** dans les fichiers JavaScript de la carte.
	* Pour générer une clé d'API (gratuite ou premium), connectez vous à votre compte Google et suivez la [procédure](https://developers.google.com/maps/documentation/roads/get-api-key?hl=fr).
Une fois l'API en votre possession :
	+ Dans le fichier carte.js (web/js) au tout début du fichier, _**ligne 3**_, changer l’ancienne clé par votre nouvelle clé.
	+ Dans le fichier mapHandler.js (web/js) au début du fichier, _**ligne 9**_, changer l’ancienne clé par votre nouvelle clé.

#### Installation et configuration du serveur web (Apache2)

```shell
sudo apt-get install lamp-server^
```
Pour vérifier que Apache2 est bien installé sur votre ordinateur, lancer l'URL localhost. Vous devriez arriver sur une page de présentation d'Apache2.

Création d'un VirtualHost pour hébergé notre site :
1. Rendez-vous dans le fichier /etc/hosts afin de faire pointer un nom de domaine sur notre IP locale
	* `sudo nano /etc/hosts`
	* Ajouter la ligne _127.0.0.1       monsupersite.fr_
	* **CTRL + X et O** pour quitter l'éditeur en enregistrant les modifications

2. Création d'un lien symbolique qui pointe vers le dossier PT4/, normalement situé dans /var/www/html
	* `sudo ln -s /var/www/html/PT4/ /var/www/monsupersite.fr`

3. Création d'un nouveau fichier de configuration pour notre site que l'on nommera 001-monsupersite.conf
	* `sudo nano /etc/apache2/sites-available/001-monsupersite.conf`
	* Contenu de ce fichier :
		```python
		<VirtualHost *:80>
        	ServerAdmin webmestre@test.fr
        	ServerName monsupersite.fr
        	ServerAlias *.monsupersite.fr
        	DocumentRoot /var/www/monsupersite.fr
        	<Directory /var/www/monsupersite.fr>
				Options -Indexes +FollowSymLinks
				AllowOverride All
			</Directory>
	        ErrorLog ${APACHE_LOG_DIR}/error.log
	        CustomLog ${APACHE_LOG_DIR}/access.log combined
		</VirtualHost>
		```

	* **CTRL + X et O** pour quitter l'éditeur en enregistrant les modifications
	* `sudo service apache2 reload`

4. Activation de monsupersite.fr
	* `cd /etc/apache2/sites-enabled/`
	* `sudo a2ensite 001-pt4.conf`
	* `sudo service apache2 reload`

5. Activation du module de réécriture d'URL
	* `sudo a2enmod rewrite`
	* `sudo service apache2 reload`

Si la commande `sudo service apache2 reload` retourne un code 1, cela veut dire que les fichiers de configurations contiennent une ou plusieurs erreurs.
Pour détecter les erreurs, vous devez tester la configuration d'Apache2 avec la commande `usr/sbin/apache2ctl/ configtest`.

--------------------------------------

### SOUS WINDOWS

Même procédure d'installation que sous Linux (seuls les emplacements des fichiers de configurations de votre serveur web changent, je vous laisse regarder sur Internet).

--------------------------------------

## LANCEMENT

Ouvrez votre navigateur web, et tapez l'URL `monsupersite.fr`.