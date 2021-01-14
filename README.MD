# Slim Framework
API usando **[Doctrine ORM](https://www.doctrine-project.org/)** dentro do framework

---

#### Configuração de ambiente


* Copiar <code><+//code> [Docker-compose](https://docs.docker.com/compose/)
    ```
    docker-compose up -d --build
    ```

* Rodar os containers utilizando [Docker-compose](https://docs.docker.com/compose/)
    ```
    docker-compose up -d --build
    ```

* Instalar as dependências do projeto
    ```
    docker-compose exec app composer install
    ```

* Registrando o EntityManager para utilizar as ferramentas de linha de comando do Doctrine

    ```
    docker-compose exec app vendor/bin/doctrine orm:schema-tool:create
    ```

    ```
    docker-compose exec app vendor/bin/doctrine orm:schema-tool:update --force
    ```

* Acessar Database para verificar se Tabelas foram criadas corretamentes
    
    ```
        docker exec -it contencioso bash -c "psql -U postgres -d contencioso"
        \dt -- Comando que lista tabelas
    ```
