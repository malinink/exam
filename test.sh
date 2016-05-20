#!/bin/bash
php artisan migrate:refresh --database=mysql_testing > /dev/null
./vendor/bin/phpunit
