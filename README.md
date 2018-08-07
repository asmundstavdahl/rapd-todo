# rapd-todo
Simple todo web app to demo [Rapd](https://github.com/asmundstavdahl/rapd)

## Trying it
```sh
git clone https://github.com/asmundstavdahl/rapd-todo.git
cd rapd-todo
composer install
sqlite3 default.sqlite3 < todo.sql
php -S localhost:8080 --docroot=public/
```
