# Agenda Lumen & Vue
Para startar o projeto é necessário executar os seguintes comandos
``` bash
    docker-compose up -d \
    && docker exec agendalumenvue_db_1 composer install -vvv && npm install \
    && chmod 755 src/storage/ -R
```
Após esses comandos executados, basta acessar o projeto em:
```
    http://localhost/
```