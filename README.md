# Lista de Filmes

## Descrição
Projeto MVC escrito em PHP com um ambiente Docker rodando NGINX, PHP-FPM e MySQL para o banco de dados.

## Preparando o ambiente
- Instale o Docker;
- Instale o Docker compose;
- Instale o Composer;
- Antes de rodar os containers faça uma copia do arquivo .env.sample e renomeie para .env, em seguida preencha das variáveis.

## Rodando container
Basta usar o comando abaixo na pasta raiz do projeto:
```bash
docker-compose -f "docker-compose.yml" up -d --build
```

## Dependências
Instale as dependências do projeto com Composer, usando o comando abaixo na pasta app:
```bash
composer install
```
Em seguida execute os scripts SQL que estão na pasta database no container do MySQL.
