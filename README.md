# Agenda Lumen & Vue
Para subir o server é necessário executar os seguintes comandos na raiz do projeto
``` bash
    docker-compose up -d \
    && docker exec agendalumenvue_app_1 composer install -vvv && npm install \
    && chmod 755 src/storage/ -R \ 
    && cp src/.env.example .env \ 
    && docker exec agendalumenvue_app_1 php artisan migrate --seed
```
Após esses comandos executados, basta acessar o projeto em:
```
    http://localhost/
```