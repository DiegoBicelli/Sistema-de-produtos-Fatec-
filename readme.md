# Sistema PowerStar

Este sistema oferece um sistema de login e cadastro funcional.
É possivel alterar e exluir os cadastros do banco de dados apartir de um painel feito com php.

O sistema ainda não consegue:
    - cadastrar produtos no banco de dados
    - manipular as permissoes dos usuarios
    - espelhar as tabelas do banco de dados

### Tecnologias
Banco de dados Mysql rodando em um docker no wsl do computador (Pode ser necessário mudança no SVN da BIOS)
Conexão feita apartir do banco.sql usando o sqlTools no Vscode

- Backend Feito em php.
- Javascript axuliando no frontend com a captura de Dados.
- HTML.
- CSS - Biblioteca tailwind usada para auxiliar em algumas paginas do site.

### Observações

Por enquanto algumas páginas do site não seguem a arquitetura REST E MVC solicitadas.

## Requisitos
- PHP
- Biblioteca `firebase/php-jwt`
- Docker Compose
- SqlTOOls
## Instalação

Clone o repositório depois instale a dependencia abaixo
Instale a biblioteca via composer:
```php
composer require firebase/php-jwt
composer require bramus/router
composer update
´´´
