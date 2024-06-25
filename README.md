## README

# Projeto: Programação Dinâmica para Web

### Descrição

Este projeto, de **Programação Dinâmica para Web**, visa a implementação de uma aplicação web utilizando o framework Laravel. O principal objetivo é proporcionar um sistema que possibilite a interação dos usuários com os dados armazenados no banco de dados.

### Funcionalidades

A aplicação foi desenvolvida para cumprir as seguintes funcionalidades principais:

1. **Criação de Perguntas e Respostas**:
   - O sistema permite que os usuários acessem uma interface para responder a perguntas.
   - As respostas fornecidas são salvas em uma tabela específica no banco de dados.

2. **Visualização dos Registros**:
   - Os usuários têm a opção de visualizar os registros salvos.
   - A visualização é disponibilizada no formato XML, permitindo uma apresentação estruturada dos dados.

3. **Rotas**:
   - Foram implementadas rotas específicas para cada operação do CRUD, garantindo a navegação fluida entre as diferentes funcionalidades da aplicação.

### Estrutura do Projeto

O projeto está organizado da seguinte forma:

- **Controllers**: Gerenciam a lógica de negócios e as interações entre as views e o modelo de dados.
- **Models**: Definem a estrutura das tabelas no banco de dados e as interações com os dados.
- **Views**: Proporcionam a interface com o usuário para entrada e visualização de dados.
- **Routes**: Configuram as rotas da aplicação, mapeando URLs para os controllers correspondentes.


### Uso

1. Inicie o servidor de desenvolvimento do Laravel:
   ```bash
   php artisan serve
   ```
