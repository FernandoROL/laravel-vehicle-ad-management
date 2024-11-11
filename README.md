# **Teste Prático - PHP Laravel Sistema Anúncio de Veículos!**

## Objetivo do Teste

Este teste tem como objetivo principal, testar os conhecimentos básicos de programação do desenvolvedor e suas habilidades com as tecnologias relacionadas e necessárias para o desenvolvimento do projeto.

Nesse teste, deve-se criar um sistema para gerenciamento de anúncios de veículos online.

## Requisitos e Recursos

**Todos os códigos, comentários, tabelas e banco devem ser escritos em inglês.**

## 1.1 Primeiro passo - DER

Criar o Diagrama de Entidade e Relacionamento O sistema deve poder gerenciar anúncios de veículos:

Para os veículos devemos possuir as seguintes informações:

**#Veículos**

ID

CódigoUnico

IDMarca

IDModelo

IDVersao

IDTipo --------------- tabela relacional com os tipos de veiculos: Passeio, Moto, Caminhao, etc. CodigoFipe

Cor

Motor

TamanhoPortaMalas

Data de criação

Data de atualização

- Cada carro possui uma unica marca
- Cada carro possui um unico modelo
- Cada carro possui uma unica versao -----------------------------------------------------------------------------------

**#Marcas**

ID

CodigoUnico

Nome

Descrição

Data de criação Data de atualização

- Cada marca pode possuir um ou mais veículos -----------------------------------------------------------------------------------

  #Modelos

  ID

  CodigoUnico IDMarca

  Nome

  Descricao

  Data de criação Data de atualização

- Cada modelo pode possuir uma unica marca
- Cada modelo pode possuir um ou mais veículos -----------------------------------------------------------------------------------

**#Versoes**

ID

CodigoUnico IDMarca

IDModelo

Nome

Descricao

Data de criação Data de atualização

- Cada versão pode possuir uma unica marca
- Cada versão pode possuir um unico modelo
- Cada veiculo pode possuir uma unica versão -----------------------------------------------------------------------------------

**#Usuários ID**

Nome

Email

Senha

Status

Data de criação Data de atualização

Cada tabela deve possuir uma coluna IDUsuario como chave estrangeira pra identificar qual usuário inseriu determinado registro.

## 2. Criaras Migrations

Utilize uma biblioteca para as migrations.

## 3. Criaras Seeders

Você precisa criar esse banco de dados e inserir os dados nele.

- crie 3 marcas
- crie 5 modelos para cada marca
- crie 2 versões para cada modelo
- crie 3 usuários
## 4. Relatórios

### Para o teste será necessário criar algumas telas com relatórios.

- SQL 01 - Eu preciso saber quais usuários possuem mais veículos. Monte a query sql.

- SQL 02 - Eu preciso saber qual Marca possui mais veículos cadastrados. Monte a query sql. SQL 03 - Liste todos as marcas, com o total de modelos e versões de cada marca em apenas 1 query.

- SQL 04 - Liste todos os veículos, com o nome da marca em apenas 1 query.

- SQL 05 - Liste todos os veículos filtrando por uma determinada marca e tipo.

- SQL 06 - Procure por veículos cadastrados por usuários inativos apresentando nome e e-mail do usuário

- SQL 07 - Eu preciso saber quais usuarios realizaram um comentário em um anúncio ( veículo ID=2 ). Para isso voce téra que pensar e analisar se precisa criar uma tabela adicional ou se vai precisar criar colunas adicionais nas tabelas. Ao final monte uma SQL que retorna quais usuarios comentaram no anúncio/veículo ID=2, com os seus comentários.

- SQL 08 - Liste quais veículos não possúem interação (Atualização ou comentário) nos últimos 60 dias.

- **BONUS** - Criar as telas para os relatórios

## 5. Requisitos do Software

**O software deverá permitir ao usuário o gerenciamento (CRUD) de veículos, marcas, versões e usuarios. Crie as telas da forma como achar melhor desde que possa ser manipulado todos os dados.**

Os requisitos e sofware são:

- PHP + Laravel
- HTML, CSS, JS (bootstrap ou material design ou tailwindcss)
- Docker
- PostgreSQL (senão conseguir pode ser MySQL)
- GIT ( Github, Bitbucket ou Gitlab )
- Heroku (deploy da aplicação)

