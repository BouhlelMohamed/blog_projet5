<h1>Créez votre premier blog en PHP</h1>
<h4>Parcours Développeur d'application - PHP / Symfony</h4>
<h4 style="color:orange">Pré-requis :</h4>
PHP 7, MySQL, Apache.
<br>
<h4>Installation:</h4>.
Télécharger composer, copier coller ses liens si dessous a la racine du projet, dans votre termial shell.

 - php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
 - php -r "if (hash_file('sha384', 'composer-setup.php') === '93b54496392c062774670ac18b134c3b3a95e5a5e5c8f1a9f115f203b75bf9a129d5daa8ba6a13e2cc8a1da0806388a8') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
 - php composer-setup.php
 - php -r "unlink('composer-setup.php');"
<h4> Description </h4>
<p>
Le projet est donc de développer votre blog professionnel. Ce site web se décompose en deux grands groupes de pages :

les pages utiles à tous les visiteurs ; les pages permettant d’administrer votre blog. Voici la liste des pages qui devront être accessibles depuis votre site web :

* la page d'accueil ;
* la page listant l’ensemble des blogs posts ;
* la page affichant un blog post ;
* la page permettant d’ajouter un blog post et la page permettant de modifier un blog post.
Il n’y aura pas de gestion d’utilisateurs à faire (authentification / autorisation). Nous verrons cela dans un prochain projet ^^. Tout est donc visible de tous et tout le monde est en mesure de créer/modifier du contenu aussi.
Commençons par les pages utiles à tous les internautes. vous permettront de vous accorder sur un vocabulaire commun et Il est fortement apprécié qu’ils soient écrits en anglais !</p>
