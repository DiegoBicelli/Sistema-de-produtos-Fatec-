# Sistema PowerStar

Este sistema oferece um sistema de login e cadastro funcional.
É possivel alterar e exluir os cadastros do banco de dados apartir de um painel feito com php.

O sistema ainda não consegue:
    - cadastrar produtos no banco de dados
    - manipular as permissoes dos usuarios
    - espelhar as tabelas do banco de dados

## Tecnologias

Banco de dados Mysql rodando em um docker no wsl do computador
Conexão feita apartir do banco.sql usando o sqlTools no Vscode

- Backend Feito em php.
- Javascript axuliando no frontend com a captura de Dados.
- HTML.
- CSS - Biblioteca tailwind usada para auxiliar em algumas paginas do site.

## Instrucoes de Instalacao no Windows

Utiliza-se a tecnologia Docker neste projeto, entao sera necessario acesso ao recurso WSL2 do Windows 10+.

Siga as instrucoes para a instalacao do WSL2 na [Documentacao da Microsoft](https://learn.microsoft.com/pt-br/windows/wsl/install). 
isso pode requirir acesso a recursos de virtualizacao na sua BIOS chamados 
Intel VTx (se voce estiver utilizando uma CPU Intel) ou AMD SVM Mode (se for da AMD), 
que voce pode ativar vendo [este artigo](https://www.asus.com/br/support/FAQ/1043786/) e muitos outros na interne.

Em seguida, inicialize sua maquina virtual WSL2. Ela vai, por padrao, conter um 
sistema operacional Linux [Ubuntu 22.04 LTS](https://ubuntu.com/). 

Primeiro deve-se atualizar o sistema com `sudo apt update && sudo apt upgrade -y` 
na linha de comando

Entao, instalar as dependencias desse projeto com os seguinte comandos em sequencia: 
```sh
# Essa linha instala as dependencias
sudo apt install -y docker.io docker-compose php php-mysql composer git
# Adiciona seu usuario ao grupo Docker
sudo usermod -a -G docker $USER
# Dependencias PHP
composer update
composer require firebase/php-jwt
composer require bramus/router
```

## Execucao do projeto

Clone-o em sua pasta `$HOME` (a padrao quando se entra na linha de comando) do WSL com 
```sh
git clone https://github.com/DiegoBicelli/Sistema-de-produtos-Fatec-.git
# E navegue-se a pasta com
cd Sistema-de-produtos-Fatec-.git
```

E entao, execute o servidor para hospedamento do website no endereco `http://localhost:8000` com
```sh
python3 -m http.server
```

Depois, mova-se para a pasta backend e execute o container docker com 
```sh
# Isso executara uma instancia do banco de dados MySQL na porta 3306 de sua maquina virtual
sudo docker-compose up
# E na mesma pasta, execute a "API" PHP
php -S localhost:8080
```

## Configuracao

No arquivo `backend/database/config.php`, voce deve configurar o website para 
correto funcionamento. Utilize o comando `ip a` em sua maquina WSL2 para colocar o 
IP correto do banco de dados.
