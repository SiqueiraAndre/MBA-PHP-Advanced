# Projeto - Biblioteca 

## Escopo projeto - Biblioteca ##

```
 Desenvolver sistema para controle de locação de livros na biblioteca, com controle
de usuários e datas para entrega. Possibilitando o aluguel de mais de um livro por
aluno e com nível de permissão para cadastro de livros e autores.

1. Nível de permissão (0 - Aluno/1000 - Administrador);
2. Aluno = somente locação e devolução de livros,
Administrador = cadastro, edição e exclusão de livros;
3. O aluno pode alugar mais de 1 livro;
4. Os livros devem conter autores e 1 imagem;
5. Locação (data aluguel, data devolução, data entrega);
6. Data devolução é fixa em data aluguel + 7 dias;
7. Um livro pode conter mais de 1 autor;
8. Uma locação pode conter mais de 1 livro;

9. Rotas de API (opcional)
- GET: todos os livros
```
## Ferramentas
1. PHP
2. MySQL
3. Postman

## O Sistema - Biblioteca da Galera

Para começar a utilizar o usuario deverá se logar, caso seja primeiro acesso basta clicar em `Cadastre-se` e preencher as informações necessárias.

No cadastro de usuário selecionar o "Tipo de Permissão" no qual o usuario vai ter:
(aluno, role = 0), com acesso somente as seguintes telas:
- Galeria
- Meus Empréstimos

(administrador, role = 100), com acesso somente as seguintes telas:
- Galeria
- Meus Empréstimos
- Autores
- Livros
- Empréstimos

## API

Para recuperar todos os livros cadastrados:

**Rota:** /api/books

**Header** necessário para recuperar os livros:
- `Authorization`

- Lembrete: não esqueça de informar o token do usuario a ser utilizado na tabela 'users', na coluna `api_token`, onde o conteudo deste campo será necessario para ter acesso a API.