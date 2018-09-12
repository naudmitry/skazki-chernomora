# Разработка на Laravel PHP Framework

## Deploy 

 * Vagrant
 * Configuration
 * Commands
 
### Vagrant

#### Laravel Homestead

```
    sites:
        - map: admin.skazki-chernomora.com
          to: "/home/vagrant/Code/public"
        - map: site.skazki-chernomora.com
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
gulp
```

## Refresh Commands
```
git pull (optional)
composer dump-autoload (optional)
php artisan migrate:refresh --seed
npm run dev
```