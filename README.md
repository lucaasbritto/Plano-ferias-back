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
        DB_HOST=br1118.hostgator.com.br
        DB_PORT=3306
        DB_DATABASE=brind112_testes
        DB_USERNAME=brind112_testeadm
        DB_PASSWORD=@dmteste2024!

 6. Gere a chave de aplicação do Laravel:    
       php artisan key:generate

 7. Execute as migrações do banco de dados:    
       php artisan migrate

