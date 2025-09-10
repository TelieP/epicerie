## pour créer un mot de passe haché :

-   php bin/console security:hash-password

après avoir taper cette commande SF , nous demande de saisir notre mot de passe , et il va par la suite une en générer un hash , nous le copions et nous rendons dans PMA ,puis créeons un nouvel user avec le role ADMIN et lui collons ce mot de passe copié

## gestion des roles et restrictions

Pour pouvoir donner les authorisations aux utilisateurs ayant un role particulier , on se rend dans le fichier : config/packages/security.yaml , puis on modifie de cette manière:

access_control: - { path: "^/login", roles: PUBLIC_ACCESS }  
 - { path: "^/register", roles: PUBLIC_ACCESS }

        - { path: "^/admin", roles: ROLE_ADMIN }

les routes /login et /register sont accessibe à tout le monde ( PUBLIC_ACCESS)
Les routes deébutant par : /admin sont accessibles uniquement qu'aux utilisateurs ayant un role ADMIN
