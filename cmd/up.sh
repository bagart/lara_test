#! /bin/bash

cd laradock
    docker-compose up -d nginx mysql
    docker-compose ps
cd ..
cmd/conn-workspace.sh
 