# Разработка на Laravel PHP Framework

## Deploy 

 * Vagrant
 * Configuration
 * Commands
 
### Vagrant

#### Laravel Homestead

```
    sites:
        - map: admin.skazki-chernomora.local
          to: "/home/vagrant/Code/public"
        - map: site.skazki-chernomora.local
          to: "/home/vagrant/Code/public"
        - map: skazki-chernomora.local
          to: "/home/vagrant/Code/public"

    ports:
          - send: 6001
            to: 6001
```

### Configuration
```
.env
```

### Commands
```
composer install
npm install
npm install -g bower
bower install
php artisan key:generate
```

## Refresh Commands
```
git pull (optional)
composer dump-autoload (optional)
php artisan migrate:refresh --seed
npm run dev
npm run watch-poll (optional)

vendor/bin/php-cs-fixer fix
```

## Development Commands
```
php artisan db:seed --class=RolesSeeder
```