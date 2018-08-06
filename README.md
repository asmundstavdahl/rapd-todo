# rapd-todo
Simple todo web app to demo asmundstavdahl/rapd

## Trying it
git clone https://github.com/asmundstavdahl/rapd-todo.git
cd rapd-todo
composer install
sqlite3 default.sqlite3 < todo.sql
php -S localhost:8080 --docroot=public/
