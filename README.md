# Pedfarma


## Como instalar - Backend (Laravel)

• Navegue até a pasta do projeto<br>
• composer install<br>
• cp .env.example .env<br>
• Crie seu banco de dados<br>
• Substituia em .env a variável DB_DATABASE=NomeDaSuaBaseAqui<br>
• php artisan key:generate<br>
• php artisan migrate<br>
• php artisan passport:install<br>
• php artisan storage:link<br>
• php artisan serve<br>



## Para conhecimento
• Aplicado de resouces para tratamento dos dados de retorno<br>
• Aplicado Validation Request para validação dos dados<br>
• Aplicado Mutators para manutenção dos dados na hora de inserir/exibir<br>
• Aplicado Global Scopes para manter as querys com obrigatoriedade de condição<br>
• Aplicado Passport para criação da autenticação<br>
• Aplicado Jobs (Pattern Command bus) para manipular regra de negócio da venda<br>
• Criado tabela de log de histórico, para manter salvo as operações do produto<br>
• AplicaNdo testes (finalizando apenas essa parte)<br>
• First API<br>



## Bugs Conhecidos
• Testes ainda não finalizados


## Futuras implementações
• Frontend com React + Redux <br>
• Deploy no heroku<br>
• Aplicação de testes unitários *(apesar do ideal ser iniciar assim, eu irei refatorar o projeto)<br>


