#! /bin/bash

cd laradock
    docker-compose up -d workspace php-fpm
    ./xdebugPhpFpm start
    ./xdebugPhpCli start laravel
cd ..