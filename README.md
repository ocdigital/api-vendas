# Desafio Back-end - API Rest

Este projeto é uma API REST desenvolvida para o desafio de desenvolvedor back-end.


Nossa API vai ter endpoints que possibilitam

* Criar vendedor
* Listar todos os vendedores
* Lançar nova venda
* Listar todas as vendas de um vendedor


## Instalação

1. **Clone o Repositório:**
    ```bash
    https://github.com/ocdigital/api-vendas.git
    ```

2. **Acesse o Diretório do Projeto:**
    ```bash
    cd seu-projeto
    ```
3. **Acesse o Diretório Backend:**
    ```bash
    cd backend
    ```

4. **Compilar a Imagem da Aplicação:**
    ```bash
    docker-compose build
    ```

5. **Execute o Ambiente em Modo de Segundo Plano:**
    ```bash
    docker-compose up -d
    ```

6. **Repita o processo com o Frontend:**


7. **Entre no Container Backend para Executar as Migrações:**
    *(Encontre o nome do container)*
    ```bash
    docker ps
    docker exec -it nome-do-container bash
    ```

8. **Execute as Migrações do Banco de Dados:**
    ```bash
    php artisan migrate
    ```

9. **Vamos criar um usuário inicial:**
    ```bash
    php artisan db:seed --class=UserSeeder
    ```

10. **Para executar os Testes:**
    ```bash
    php artisan test

    ./vendor/bin/pest --coverage
    ```

## Documentação da API (Postman)

Explore a documentação da API no Postman [aqui](https://documenter.getpostman.com/view/2748681/2sA35Bd5JE).

## Algumas informações

O sistema está utilizando Algolia para otimizar a comunicação do Back com Front.

Foi configurado o telescope para monitorar alguns processos http://localhost:8000/telescope

Existe um serviço de email fake MailCatcher no endereço http://localhost:1080/ .

O backend está utilizando token para atenticação, então é necessário fazer login na api
para gerar o token, e deve ser atualizado no .env do Frontend. 

Há um problema com a execução automática dos jobs (não de tempo de resolver),
Como solução paleativa execute o comando php artisan queue:work dentro do container (backend)
Se quiser mandar o job para fila imetidamente (como teste) pode utilizar o link http://localhost:8000/test-email


