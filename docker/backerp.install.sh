#!/bin/bash
#importa funções comuns.
. ./docker/run.sh --source-only
# Inicia projeto backerp
printf "\n\n\nInstalando o projeto SiGuia, vá fazer um café."
run 'composer install'
run 'php artisan migrate'
run 'php artisan key:generate'
run 'php artisan passport:install'
run 'php artisan db:seed'
