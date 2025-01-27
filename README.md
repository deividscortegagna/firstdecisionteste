Projeto para teste - First Decision Laravel com Livewire

Este repositório contém uma aplicação desenvolvida em Laravel com Livewire para gerenciamento de usuários. A aplicação inclui operações de CRUD (Create, Read, Update, Delete) e foi criada utilizando boas práticas de desenvolvimento e testes.

Este projeto segue as melhores práticas de design e arquitetura de software, aplicando SOLID, clean code, calistenia de objetos, entre outros conceitos e patterns conhecidos.

O projeto utiliza um padrão de design com Services e Repositories para abstrair a lógica de negócios e a camada de acesso a dados. Além disso, conta com Livewire Components, validações em tempo real, testes unitários e de feature.

Adicionei uma regra, para fins de demonstração de onde a regra é implementada em cada Service. A regra demonstra o seguinte: Ao editar um usuário e optar por alterar a senha dele, deve-se informar a senha atual e a nova senha (em casos reais, essa regra seria válida caso o usuário estivesse alterando sua própria senha de autenticação). O back-end verifica se a senha atual digitada realmente é a senha cadastrada no banco de dados.



Tecnologias Utilizadas

Laravel: Framework PHP para construção de aplicações web.

Livewire: Biblioteca para criar interfaces dinâmicas sem recarregar a página.

PHP: Linguagem de programação utilizada, versão 8.1.

Docker: Ferramenta de contêinerização.

PostgreSQL: Banco de dados utilizado.

Pré-requisitos

Docker

Docker Compose

Estrutura do Projeto

O projeto inclui:

Services: Contém a lógica de negócios e as regras da aplicação.

Repositories: Fornece uma camada de abstração sobre o acesso a dados, permitindo uma maneira mais flexível de interagir com o banco de dados.

Livewire Components: Gerenciam a interação com o front-end em tempo real.

Config: Diretório para arquivos de configuração da aplicação.

Configuração e Instalação

A seguir, o passo a passo para rodar o sistema em ambiente local.

Instalação

Clone o repositório:

git clone git@github.com:deividscortegagna/firstdecisionteste.git
cd firstdecisionteste

Para emular o ambiente de desenvolvimento, foi utilizado o Docker e Docker Compose.

Rodar dentro da raiz do repositório:

docker-compose up --build -d

Caso seja necessário instalar as dependências novamente:

docker exec -it laravel-app sh

composer install

Após isso, o sistema se torna acessível via:

Se utilizando Docker com porta 8080: http://localhost:8080

Se utilizando Laravel localmente: http://localhost/login

Certifique-se de que a configuração do docker-compose.yml ou do servidor Laravel está corretamente configurada.

Documentação da API

Endpoints Principais

POST /api/users: Cria um novo usuário.

Exemplo em curl:

curl -X POST http://localhost:8080/api/users \
-H "Content-Type: application/json" \
-d '{
    "name": "John Doe",
    "email": "john.doe@example.com",
    "password": "password",
    "password_confirmation": "password"
}'

PUT /api/users/{id}: Atualiza os dados de um usuário.

Exemplo em curl:

curl -X PUT http://localhost:8080/api/users/1 \
-H "Content-Type: application/json" \
-d '{
    "name": "Jane Doe",
    "email": "jane.doe@example.com",
    "password": "newpassword",
    "password_confirmation": "newpassword"
}'

GET /api/user: Retorna os dados do usuário autenticado (via Sanctum).

Exemplo em curl:

curl -X GET http://localhost:8080/api/user \
-H "Authorization: Bearer <TOKEN>"

Rotas Web

GET /register: Tela de registro de novos usuários.

GET /login: Tela de login.

GET /dashboard: Painel principal após login.

Rodando os Testes

Para rodar os testes criados, basta executar:

docker exec -it laravel-app sh

php artisan test



Front-end

Por se tratar de uma API REST, o front-end foi desenvolvido utilizando Livewire e Blade Templates diretamente no Laravel, garantindo maior integração e dinamismo na interface. Rotas como /register, /login e /dashboard utilizam componentes Livewire para interação em tempo real.

TODO

Deixo anotado aqui, com um TODO para ser feito ainda dentro deste projeto:

Implementar autenticação via OAuth com Laravel Passport.

Adicionar Swagger para documentação da API.

Melhorar a customização visual dos componentes Livewire para maior usabilidade.

Autor

Deivid Willian Scortegagna