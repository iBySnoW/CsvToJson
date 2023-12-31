# Conversion de fichier en JSON

Ce projet php a pour objectif de convertir des fichiers CSV et XML en JSON.

## Installation

- #### Installation de Wamp, Xamp, Lamp
  - Aller dans le répertoire D:\wamp64\www
  
- #### Clonage du repository GIT :
  - ``` git clone https://github.com/iBySnoW/CsvToJson.git ```
- #### Ajout du virtual host
  - Aller dans WAMP -> Vos virtual host -> Gestion virtual host
  - Ajoutez un virtual host pour le projet : D:\wamp64\www\CsvToJson
  - Ouvrez le lien : http://csvtojson/

## Projet

Le projet contient plusieurs versions, version 1 et 2.

Dans ``` index.php ```, nous retrouverons un menu pour choisir entre les deux version du projet.
 
- La version 1 étant une simple pour conversion pour les fichiers CSV
- Et la version 2 qui permet la conversion à la fois de fichier csv et xml. Le fonctionnement est simple
  - Choisir le type de conversion, par défaut, CSV en JSON
  - Valider votre choix
  - Choisir votre fichier à transformer
  - Cliquer sur Upload
  
Votre fichier sera alors transformé en JSON et vous aurez un lien pour le télécharger.

## Code

#### index.php

Ce fichier contient le menu pour le choix entre les versions

#### version-1.php version-2.php

Ces fichiers possèdent respectivement le code pour déposer notre fichier.
Ils feront respectivement appel aux fichiers upload-v1.php et upload.php


#### upload-v1.php

Contient le code pour uploader et convertir un fichier CSV en JSON

#### upload

Ce fichier fera appel à une classe ``Convert`` qui implémente une interface ``IConvert`` dans laquelle sont définis toutes 
les méthodes nécéssaires à la conversion d'un fichier.

La classe ``Convert`` a pour objectif de gérer les différents type de conversion grâce aux choix fait par l'utilisateur 
et l'appel des ``CsvToJson`` et ``XmlToJson`` qui se situent dans le répertoire ``Converter`` et qui implémente également 
notre interface.

Ce qui nous permettra d'ajouter d'autre type de conversion à l'avenir.

#### Fichier téléchargé

Il est à noter que l'ensemble des fichiers déposé seront stockés dans un fichier ``uploads`` et les fichiers transformés seront dans le fichier ``download``

## Exemple d'utilisation

#### Menu - Choix V2
![img.png](assets/img.png) 


#### V2 - Choix de convertion et du fichier

![img_1.png](assets/img_1.png)

  Je choisi de convertir un fichier XML en JSON, et je ``VALIDE``

![img_3.png](assets/img_3.png)

Je choisi mon fichier à convertir, et je clique sur ``UPLOAD``

![img_4.png](assets/img_4.png)

Et pour finir je télécharge mon fichier JSON