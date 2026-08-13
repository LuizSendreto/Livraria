# crud_livraria

RF1: Cadastrar Livro: o sistema deve permitir cadastrar livros informando titulo, autor e ano de publicação;
RF2: Listar Livros: o sistema deve apresentar todos os livros cadastrados;
RF3: Editar Livros: o sistema deve permitir a alteração de informações de livros já cadastrados;
RF4: Excluir Livros: o sistema deve permitir a exclusão de informações de livros já cadastrados;

(1/2) RNF1: Validação dos Campos: O sistema não deve permitir o cadastro de livros com titulo, autor ou ano vazios.

# Prepared Statements e Segurança no CRUD de Livraria

Prepared Statements

Prepared Statements são uma forma mais segura de executar consultas SQL que recebem informações fornecidas pelo usuário. Em vez de colocar os valores diretamente dentro da consulta, são utilizados ? como espaços reservados.

No PHP com MySQLi, os principais métodos utilizados são prepare(), bind_param() e execute().

O método prepare() prepara a consulta SQL. O bind_param() associa os valores aos espaços reservados da consulta e o execute() executa o comando.

Por exemplo, em uma consulta que recebe título, autor e ano do livro, podemos utilizar "ssi". O primeiro s representa uma string, o segundo s representa outra string e o i representa um número inteiro.

SQL Injection

SQL Injection é uma vulnerabilidade que pode acontecer quando informações fornecidas pelo usuário são inseridas diretamente em uma consulta SQL.

Quando isso acontece, um usuário mal-intencionado pode tentar modificar a consulta original e executar comandos que não deveriam ser permitidos pelo sistema.

Por exemplo, utilizar diretamente um valor recebido por $_GET ou $_POST dentro de uma consulta pode deixar o sistema vulnerável.

O uso de Prepared Statements ajuda a evitar esse problema porque os dados fornecidos pelo usuário são tratados como valores e ficam separados da estrutura da consulta SQL.

Operações Analisadas

As principais operações do CRUD da livraria que recebem dados externos devem utilizar Prepared Statements.

O arquivo cadastrar.php utiliza uma operação INSERT para adicionar novos livros ao banco de dados.

O arquivo atualizar.php utiliza uma operação UPDATE para modificar informações de livros existentes.

O arquivo excluir.php utiliza uma operação DELETE para remover livros do banco de dados.

O arquivo editar.php utiliza uma operação SELECT para buscar as informações do livro que será editado.

O arquivo index.php, quando utilizado apenas para listar os livros sem receber dados externos para montar a consulta, apresenta um risco menor relacionado ao SQL Injection.

Outras Medidas de Segurança

O uso de Prepared Statements é uma medida importante, mas não é a única prática necessária para manter o sistema seguro.

Também é importante validar os dados recebidos pelo usuário, verificar se os valores possuem o tipo e formato esperado e controlar as permissões de acesso às funções do sistema.

Além disso, os dados exibidos nas páginas HTML devem ser tratados corretamente para evitar outros tipos de vulnerabilidades.

Conclusão

O CRUD de livraria possuía consultas que utilizavam diretamente dados recebidos por $_GET e $_POST, o que poderia deixar o sistema vulnerável a ataques de SQL Injection.

A utilização de prepare(), bind_param() e execute() permite separar os dados recebidos da estrutura das consultas SQL, aumentando a segurança do sistema.

Portanto, é recomendado utilizar Prepared Statements em todas as consultas que recebem dados externos, principalmente nas operações de cadastro, atualização, exclusão e edição dos livros.

# Troca usando prepared statments

O funcionamento do sistema continua o mesmo: o usuário cadastra um livro e ele é salvo no banco de dados.

A única diferença é que agora o cadastro está mais seguro contra SQL Injection, porque os dados enviados pelo usuário não são tratados como parte da estrutura do comando SQL.

Ou seja, foi uma alteração pequena no projeto, mas suficiente para demonstrar o uso de Prepared Statements em uma operação INSERT do CRUD.
