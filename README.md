REST-API-PHP

Projeto para praticar como criar uma API REST simples em PHP.

- Recursos/objetivos de aprendizagem
- Configure um servidor PHP local com XAMPP para executar scripts e criar banco de dados MySQL.
- Crie endpoints REST API que podem ser consumidos por outros aplicativos (Android App, iOS, Desktop etc)
- Use o POSTMAN para testar APIs.

Como executar

- Obtenha um servidor php local instalado e funcionando
- Importe o banco de dados db.sql com phpmyadmin, sem ele as APIs não funcionarão
- Instale o Postman para testar a API
- Todos os URLs de endpoint serão semelhantes a estes, dependendo da estrutura da pasta
- Clientes

http://localhost/api_rest_php/api/cliente/listar.php
http://localhost/api_rest_php/api/cliente/novo.php
http://localhost/api_rest_php/api/cliente/excluir.php
http://localhost/api_rest_php/api/cliente/carregar.php?id=N
http://localhost/api_rest_php/api/cliente/atualizar.php

- Produtos

http://localhost/api_rest_php/api/produto/listar.php
http://localhost/api_rest_php/api/produto/novo.php
http://localhost/api_rest_php/api/produto/excluir.php
http://localhost/api_rest_php/api/produto/carregar.php?id=N
http://localhost/api_rest_php/api/produto/atualizar.php

Use POSTMAN para testar a API: amostra de JSON bruto para criar uma entrada (POST)
![image](https://user-images.githubusercontent.com/39886488/143915683-00168f81-e2b1-4787-a28c-316fb6dcd985.png)

Não esquecer de adicionar as credencias do banco
![image](https://user-images.githubusercontent.com/39886488/143916000-1ee0d333-4bbe-48c2-9138-0dcd76f2f3d7.png)




