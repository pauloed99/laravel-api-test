<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Sobre o Projeto

O projeto desenvolvido usando o framework Laravel é uma API Rest, no qual há 2 CRUD'S relacionados a 2 entidades, Books e Users. Desse modo, inicialmente o usuário terá que se registrar e autenticar para ter acesso a todas as rotas da API.

## Mais Detalhes sobre o Projeto

- O docker foi utilizado no projeto através do laradock https://laradock.io/.
- É preciso ter o Docker Desktop instalado no computador em que for rodar o projeto.
- Seguir os passos do site do laradock acima para usar o Docker junto ao Laradock. Após isso, o ambiente de produção com Docker já estará funcionando.
- para usar os comandos do laravel, como php artisan, junto ao Docker, basta entrar no container que foi subido através das instruções do terceiro ponto e rodar o seguinte comando dentro da pasta laradock no terminal: "docker-compose workspace bash". 
- Como no projeto foram instalados pacotes de terceiros através do composer, é necessário rodar o comando "composer install" no diretório do projeto.
- é necessário rodar também o comando "cp .env.example .env" tanto no diretório do projeto como na pasta do laradock.
- Para a autenticação e autorização da api foi o usado o pacote "tymon/jwt-auth", mais informações sobre ele no seguinte link: https://jwt-auth.readthedocs.io/en/develop/laravel-installation/ . 
- É necessário rodar os comandos "php artisan:key generate", "php artisan jwt:secret" e "php artisan migrate" para configurar autenticação e tabelas do banco de dados.

## Finalizando

Após todas essas configurações será possível rodar a api com o Laravel.