# Project-eMove


## Présentation
Site Web Responsive pour la location de véhicules électriques.

## Technologies
- Symfony 4
- Twig
- MySQL / PhpMyAdmin
- Gulp

## Installation et utilisation de l'application

### Installation Symfony
```
git clone https://github.com/vincentcrb/eMove.git
cd emove
composer install
```
### Remplissage de la Base de données
```
php bin/console d:d:c
php bin/console d:s:c
php bin/console d:f:l
```
### Lancement de Symfony dans le navigateur
```
php bin/console s:r
ouvrir le lien -> localhost:8000
```

## Utilisation de Gulp

### Installation de Gulp
- télécharger nodeJs
- aller dans le dossier eMove
- et lancer la commande :
```
npm install
```

### Compiler le Sass
Etant donnée que le Front du site est fait avec le Préprocesseur Sass,
il faudra compiler les fichiers sass en css après les avoir modifier.
```
gulp build
```

### Compiler en Live le Sass
Pour pouvoir compiler les Sass en Css à chaque enregistrement d'une modification dans un fichier sass,
il faudra en plus de lancer Symfony, lancer également Gulp qui écoutera sur le port 3000 qui est connecté au port 8000 de Symfony.
```
gulp default
ouvrir le lien -> localhost:3000
```


## Accès au site

- Admin :
    username -> admin
    password -> admin 
 - User 1 :
    username -> user1
    password -> user
 - User 2 :
    username -> user2
    password -> user
    
