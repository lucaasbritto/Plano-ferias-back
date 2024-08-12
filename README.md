## DESCRIÇÃO
Este é um projeto para gerenciar planos de férias usando Laravel para o backend e Vue.js para o frontend. O projeto permite que os usuários criem, editem, excluam e visualizem planos de férias. Também oferece a funcionalidade de download de PDFs dos planos.

## TECNOLOGIAS
    Backend: Laravel
    Frontend: Vue.js com Vuetify
    Banco de Dados: MySQL
    Autenticação: Laravel Sanctum

## REQUISITOS
    PHP 8.x
    Composer
    Node.js
    npm/yarn


## Configuração do Ambiente

 1. Clone o repositório:   
        git clone https://github.com/lucaasbritto/buzzvel.git

 2. Navegue até o diretorio:    
        cd buzzvel

 3. Instale as dependências do PHP:    
        composer install

 4. Copie o arquivo .env.example para .env e configure as variáveis de ambiente:    
        cp .env.example .env

 5. Atualize o arquivo .env com suas credenciais de banco de dados:    
        DB_CONNECTION=mysql
        DB_HOST=meuHost
        DB_PORT=3306
        DB_DATABASE=meubanco
        DB_USERNAME=meuusuario
        DB_PASSWORD=minhasenha

 6. Gere a chave de aplicação do Laravel:    
       php artisan key:generate

 7. Execute as migrações do banco de dados:    
       php artisan migrate


## DOCUMENTAÇÃO DA API


1. Login
Endpoint: /login
    • Método HTTP: POST
    • Descrição: Autentica um usuário e retorna um token JWT.

Parâmetros de Requisição:
    • Corpo (JSON):	
         {
              "email": "adm@teste.com",
              "password": "buzzvel",        
          },

Resposta de Sucesso:
    • Status: 200 OK
    • Corpo (JSON):
      { "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9..." } 

Resposta de Erro:
    • Status: 401 Unauthorized
    • Corpo (JSON):
      { "message": "Invalid credentials" } 



2. Listar Planos de Férias
Endpoint: /vacation-plans
    • Método HTTP: GET
    • Descrição: Retorna uma lista de todos os planos de férias.

Parâmetros de Requisição:
    • Cabeçalho:
        ◦ Authorization: Bearer {token}

Resposta de Sucesso:
    • Status: 200 OK
    • Corpo (JSON):
          {
              "id": 1,
              "title": "Férias no Havaí",
              "description": "Uma semana relaxando nas praias do Havaí",
              "date": "2024-08-15",
              "location": "Portugal",
              "participants": "Lucas Britto, Karla Araujo"
          },
      
Resposta de Erro:
    • Status: 401 Unauthorized
    • Corpo (JSON):
      {
          "message": "Unauthenticated."
      }


3. Criar Plano de Férias
Endpoint: /vacation-plans/create
    • Método HTTP: POST
    • Descrição: Cria um novo plano de férias.

Parâmetros de Requisição:
    • Cabeçalho:
        ◦ Authorization: Bearer {token}
    • Corpo (JSON):
      {
          "title": "Férias em Paris",
          "description": "Visitar museus e pontos turísticos",
          "date": "2024-09-10",
          "location": "França",
          "participants": "Alice, Bob"
      }

Resposta de Sucesso:
    • Status: 201 Created
    • Corpo (JSON):
      {
          "id": 2,
          "title": "Férias em Paris",
          "description": "Visitar museus e pontos turísticos",
          "date": "2024-09-10",
          "location": "França",
          "participants": "Alice, Bob"
      }

Resposta de Erro:
    • Status: 400 Bad Request
    • Corpo (JSON):
      {
          "message": "Validation error",
          "errors": {
              "title": ["The title field is required."],
              ...
          }
      }


4. Atualizar Plano de Férias
Endpoint: /vacation-plans/{id}
    • Método HTTP: PUT
    • Descrição: Atualiza um plano de férias existente.

Parâmetros de Requisição:
    • Cabeçalho:
        ◦ Authorization: Bearer {token}
    • Corpo (JSON):
      {
          "title": "Férias em Roma",
          "description": "Passeios históricos e gastronômicos",
          "date": "2024-10-05",
          "location": "Itália",
          "participants": "Alice, Bob"
      }

Resposta de Sucesso:
    • Status: 200 OK
    • Corpo (JSON):
      {
          "id": 2,
          "title": "Férias em Roma",
          "description": "Passeios históricos e gastronômicos",
          "date": "2024-10-05",
          "location": "Itália",
          "participants": "Alice, Bob"
      }

Resposta de Erro:
    • Status: 404 Not Found
    • Corpo (JSON):
      {
          "message": "Vacation plan not found."
      }


5. Excluir Plano de Férias
Endpoint: /vacation-plans/{id}
    • Método HTTP: DELETE
    • Descrição: Exclui um plano de férias existente.

Parâmetros de Requisição:
    • Cabeçalho:
        ◦ Authorization: Bearer {token}

Resposta de Sucesso:
    • Status: 204 No Content

Resposta de Erro:
    • Status: 404 Not Found
    • Corpo (JSON):
      {
          "message": "Vacation plan not found."
      }


6. Download do PDF do Plano de Férias
Endpoint: /vacation-plans/{id}/pdf
    • Método HTTP: GET
    • Descrição: Faz o download do plano de férias em formato PDF.

Parâmetros de Requisição:
    • Cabeçalho:
        ◦ Authorization: Bearer {token}

Resposta de Sucesso:
    • Status: 200 OK
    • Cabeçalho:
        ◦ Content-Disposition: attachment; filename="vacation_plan.pdf"
    • Corpo: Arquivo PDF binário.
    
Resposta de Erro:
    • Status: 404 Not Found
    • Corpo (JSON):
      {
          "message": "Vacation plan not found."
      }