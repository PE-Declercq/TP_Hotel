# TP_Hotel
Tp Hotel

How to start project:

composer install
symfony server:start
/!\Vérifier que le serveur utilise bien une version php 8.2 ou supérieur/!\
/!\Modifier la ligne 44 du fichier .env et y mettre les bonnes infos/!\
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate
php bin/console doctrine:fixtures:load


Le dashboard admin est accessible via la route /admin avec les logs suivant:
user: admin@admin.fr
password: admin

Le dashboard manager est accessible via la route /managment avec les logs d'un des manager créé par les fixtures et le password: manager.