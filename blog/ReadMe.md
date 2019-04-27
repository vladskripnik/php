JungleDuck (test server PHP)
Скопируйте проект и установите необходимые зависимости с помощью composer - composer install;

Создайте базу и пропишите доступы в конфиге .env; Перед запуском миграции следует заполнить таблицу Group: php artisan db:seed --class=GroupTableSeeder

Выполните url_shortener.sql или запустите миграции Laravel - php artisan migrate

Один из вариантов тестирования - это локальный Laravel сервер. Для запуска используйте - php artisan serve;
