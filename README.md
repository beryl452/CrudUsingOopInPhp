#  Créer une API RESTful PHP 8 CRUD (Create, Read, Update , Delete) simple avec MySQL et PDO (PHP Data Objects) 
 
##   Détails du référentiel : 

- Lire, insérer, mettre à jour, supprimer un enregistrement 
 

##  Manuel d'utilisation : 
  
- Besoin de télécharger ou de cloner le projet 
- Créer une base de données nommée **phpapidb** 
- Créez une table nommée **\`users\`** 
- Les requêtes de table sont données ci-dessous 
- Nécessité de mettre le nom d'utilisateur et le mot de passe mySQL dans le fichier `Configuration/database.php` 
- Et vous avez terminé ! 
- Allez simplement dans votre navigateur et écrivez localhost ! 
- Et oui, le plus important -- Vous devez installer Apache, PHP et MySQL sur votre ordinateur :)(Ps: J'utilise un environnement de développement :Laragon-wamp) 


##  Prérequis : 

- Connaissances en POO comme classe, objet, méthode, namespace, interface 

##  `users` Requêtes de table 
- CREATE TABLE IF NOT EXISTS `users` (
-   `id` int(11) NOT NULL AUTO_INCREMENT,
-   `name` varchar(255) NOT NULL,
-   `email` varchar(50),
-   `age` int(11) NOT NULL,
-   `password` varchar(255) NOT NULL,
-   PRIMARY KEY (`id`)
- )ENGINE=InnoDB  DEFAULT CHARSET=utf8;


##  Hiérarchie des dossiers : 
![Hiérarchie des dossiers](https://github.com/beryl452/CrudUsingOopInPhp/blob/main/REST-API/Screenshot/HierarchieDesDossiers.PNG)