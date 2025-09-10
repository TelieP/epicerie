## pour créer un mot de passe haché :

-   php bin/console security:hash-password

après avoir taper cette commande SF , nous demande de saisir notre mot de passe , et il va par la suite une en générer un hash , nous le copions et nous rendons dans PMA ,puis créeons un nouvel user avec le role ADMIN et lui collons ce mot de passe copié

## gestion des roles et restrictions

Pour pouvoir donner les authorisations aux utilisateurs ayant un role particulier , on se rend dans le fichier : config/packages/security.yaml , puis on modifie de cette manière:

access_control: - { path: "^/login", roles: PUBLIC_ACCESS }

-   { path: "^/register", roles: PUBLIC_ACCESS }

         - { path: "^/admin", roles: ROLE_ADMIN }

les routes /login et /register sont accessibe à tout le monde ( PUBLIC_ACCESS)
Les routes deébutant par : /admin sont accessibles uniquement qu'aux utilisateurs ayant un role ADMIN

## pour créer la base de données :

## création d'une entité

symfony console make:entity

Apres la création d'entités , il faut faire une migration vers la BDD :

-   symfony console make:migration
-   symfony console doctrine:migrations:migrate

## configuration initiaux du projet

-   dans le fichier .env : on modifier les données de connexion à la base de données :
    DATABASE_URL="mysql://root:@127.0.0.1:3306/epicerie?serverVersion=8.0.32&charset=utf8mb4"

-   initiation du projet dans Github :
    echo "# epicerie" >> README.md
    git init
    git add README.md
    git commit -m "first commit"
    git branch -M main
    git remote add origin https://github.com/TelieP/epicerie.git
    git push -u origin main

## Vidage cache

symfony console cache:clear

## Installation des dépendances avec composer :

composer install

## connexion à la base de données:

-user:root
-pw :

## lancer le server SF

-   symfony server:start
