# Bank API

Aplicação de exemplo de API para operações bancárias criada com framework 
[Laravel Lumen](https://lumen.laravel.com).

# O que este projeto contém?

Além do framework Lumen para a funcionalidade em si, a base de código da 
aplicação é empacotada como imagem Docker.  E para ambiente de desenvolvimento,
utiliza o Docker Compose para facilitar a execução dos containers.

# Pré-requisitos

* [PHP Composer instalado](https://getcomposer.org/download)
* [Docker instalado](https://docs.docker.com/get-docker/)
* [Docker Compose instalado](https://docs.docker.com/compose/install/)

# Como executar este projeto?

_(Nos trechos abaixo, o projeto está no diretório `/home/user/bank`)_
```
$ git clone git@github.com/lourdilene/bank
$ cd bank
```

## Atualizar dependências do projeto:
```
$ composer update
```

Saída esperada:
```
Loading composer repositories with package information
Updating dependencies
Nothing to modify in lock file
Installing dependencies from lock file (including require-dev)
Nothing to install, update or remove
Package sebastian/resource-operations is abandoned, you should avoid using it. No replacement was suggested.
Generating optimized autoload files
62 packages you are using are looking for funding.
Use the `composer fund` command to find out more!
```

## Executar projeto:
```
$ docker-compose up --build
```

Saída esperada:
```
Building app
[truncated]
app_1  | [Mon Aug  2 22:02:10 2021] PHP 7.4.22 Development Server (http://0.0.0.0:8000) started
```

## Testar o projeto:
Abra um outro terminal e execute:
```
$ curl --request POST 'http://localhost:8000/api/withdraw' \
     --header 'Content-Type: application/json' \
     --data-raw '
{
    "accountNumber": 1221,
    "amount": 1
}'
```

Saída esperada:
```
{"data":{"withdraw":{"id":1,"number":"1221","balance":10}}}
```
