#!/bin/bash
#importa funções comuns.
. ./docker/run.sh --source-only
printf "\n\n\nReinstalando comandos de dependência de laravel para nova base de dados"
run 'php artisan migrate -v'
run 'php artisan key:generate'
run 'php artisan passport:install'
#run 'composer dumpautoload'
run 'php artisan db:seed'