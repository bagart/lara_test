#! /bin/bash

cd laradock
    docker-compose stop
    docker-compose pull
    docker-compose build
cd ..
#cmd/xdebug.sh
cmd/up.sh
