
# Movix - Project

Essa é uma documentação voltada para mostrar como está a arquitetura do projeto e como executar.


## Stack utilizada

**Back-end**: [PHP v8.2](https://www.php.net/docs.php), [Laravel](https://laravel.com/)

**Infra**: [Docker](https://www.docker.com/)

**Database**: [PostgreSQL](https://www.postgresql.org/), [Redis](https://redis.io/)


## Rodando localmente

Clone o projeto

```bash
  git clone https://github.com/Gildasio-Abraao/movix
```

Entre no diretório do projeto

```bash
  cd movix
```

Faça build dos containers

```bash
  docker-compose build // ou docker-compose up --build
```

Inicie o projeto

```bash
  docker-compose up -d
```

