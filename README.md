Currency Project
===============================================================================

## Install core components
```
$ composer install
```

## Run PHPUnit with coverage report
```
$ php vendor/bin/phpunit
```

## Run PHPUnit without coverage report
```
$ php vendor/bin/phpunit --no-coverage
```

## Coverage report
Coverage report is available by the following path:
```
/var/report/index.html
```

## Generating a New Doctrine Entity Stub
```
$ php bin/console generate:doctrine:entity
```

**Useful links:**
- http://symfony.com/doc/current/bundles/SensioGeneratorBundle/commands/generate_doctrine_entity.html

## Creating the Database Tables/Schema
```
$ php bin/console doctrine:schema:update --force
```

**Useful links:**
- http://symfony.com/doc/current/book/doctrine.html