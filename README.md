#Concar-Sites

Desenvolvimento do website principal da Concar Delivery

Autores
Vitor Ribeiro vitorhugo_rib@hotmail.com Eduardo Ribeiro - eduardodeiturama@hotmail.com 

Executar o projeto localmente
Para tal a��o voc� precisar�, preferencialmente, de ter instalado em sua m�quina;

PHP 7 ou superior;
Sass;
MySQL
Voc� poder� utilizar o pr�prio servidor PHP ou qualquer outro de sua prefer�ncia, caso opte pelo do PHP, poder� ser feito da seguinte forma; php -S localhost:8080

N�o necessariamente na porta 8080, essa fica a cargo de voc�

Com o servidor no Ar, voc� poder� acessar a index do site atrav�s da url

http://localhost:8080/public/

Para navegar pelo site, voc� dever� ter configurado o banco de dados em sua m�quina e alterado as seguintes linhas de c�digo no arquivo Conn.php dispon�vel na pasta src;

$dns = "mysql:host=localhost; dbname = suaDataBase"; $user = "seuNomeDeUsuario"; $pass = "suaSenha";

Tecnologias Utilizadas
As seguintes tecnologias foram usadas para elaborar tal projeto;

Sass
PHP
Materialize
JQuery
MySQL
HTML, CSS e JS.