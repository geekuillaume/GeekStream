GeekStream
===

Cette appli pour CodeIgniter est une plateforme d'échange de films avec un design soigné et une bonne réactivité.
Pour la faire fonctionner il faut un compte premium, une base de donnée SQL et une clé API IMDB.
Elle génère uniquement des liens premium et les envoie à l'utilisateur.
De plus un lecteur DivX est integré pour voir les vidéos en streaming. 

## Définir les variables système :


	- application/config/config.php	-> Remplir l'adresse URL
	- application/config/database.php	-> Remplir les infos de la base de données

## Créer la base de données :

	
	- Utiliser le fichier table.sql pour créer la table "movies" contenant les informations des films
	
## Ajouter le cookie :


	- application/controllers/stream.php		-> Remplacer les "******" par la valeur de votre cookie "user" premium.
	- application/controllers/stream.php		-> Remplacer les "******" par la valeur de votre clé API IMDB.
	
## Customiser le tout :


	- La page principale se compose de trois fichiers : header.php, page.php (répété plusieurs fois) et footer.php.
	- Ces fichiers se trouvent dans /application/views/

### Disclaimer

Ce code est fourni dans un but éducationnel et je ne pourrais être tenu responsable de toute utilisation illégale de cette application.

### Crédits

Créateur : [Geekuillaume] (http://geekuillau.me/)