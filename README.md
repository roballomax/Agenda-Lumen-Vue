# Agenda Lumen & Vue
Para subir o server é necessário executar os seguintes comandos na raiz do projeto
``` bash
    sudo chmod 777 src/storage/ -R \ 
    && sudo cp src/.env.example src/.env \ 
    && docker-compose up -d 
    
    docker exec agendalumenvue_app_1 composer install 
    docker exec agendalumenvue_app_1 npm install 
    docker exec agendalumenvue_app_1 php artisan migrate --seed
```
Após esses comandos executados, basta acessar o projeto em:
```
    http://localhost/
```
