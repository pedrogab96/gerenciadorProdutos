# Desafio RITS - Vaga BACK-END

Para a resolução do desafio proposto, foram utilizadas as seguintes tecnologias:

***Laravel 8*** - Utilizando simples implementações da camada de service com intuito de encapsular algumas regras genéricas e reutilização do código

***AdminLTE 3*** - Todo o painel foi construído em cima do AdminLTE 3 com intuito de agilizar o desenvolvimento.

***Scribe*** - Documentação de acesso via (/docs) com campos e responses para facilitar o uso da API.

## Como rodar a aplicação local:

### Instalando as dependências

Para a instalação das dependências do php rode

```$ composer install```

Para a instalação das dependências do javascript rode

```$ npm install ou yarn install```

No diretorio do projeto no console utilize o seguinte comando para criar uma copia do .env para o ambiente de desenvolvimento:
    
```$ copy .env.example .env```

No diretorio do projeto no console utilize o seguinte comando 

```$ php artisan key:generate```
### Preparando o banco de dados

Crie um banco mysql vazio e execute as migrations

```$ php artisan migrate```

Logo após rode a seed para criação dos usuários base do painel e criação alguns clientes e pedidos

```$ php artisan db:seed```

Será criado um usuário para o painel Administrativo

As credenciais de acesso para este usuario são:

```
email: administrador@rits.com
senha: admin@rits
```
