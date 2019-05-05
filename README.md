#Concar-Sites

Desenvolvimento do website principal da Concar Delivery

Autores
Vitor Ribeiro vitorhugo_rib@hotmail.com Eduardo Ribeiro - eduardodeiturama@hotmail.com 

Executar o projeto localmente
Para tal ação você precisará, preferencialmente, de ter instalado em sua máquina;

PHP 7 ou superior;
Sass;
MySQL
Você poderá utilizar o próprio servidor PHP ou qualquer outro de sua preferência, caso opte pelo do PHP, poderá ser feito da seguinte forma; php -S localhost:8080

Não necessariamente na porta 8080, essa fica a cargo de você

Com o servidor no Ar, você poderá acessar a index do site através da url

http://localhost:8080/public/

Para navegar pelo site, você deverá ter configurado o banco de dados em sua máquina e alterado as seguintes linhas de código no arquivo Conn.php disponível na pasta src;

$dns = "mysql:host=localhost; dbname = suaDataBase"; $user = "seuNomeDeUsuario"; $pass = "suaSenha";

Tecnologias Utilizadas
As seguintes tecnologias foram usadas para elaborar tal projeto;

Sass
PHP
Materialize
JQuery
MySQL
HTML, CSS e JS.