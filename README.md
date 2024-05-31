# Bevi API

Este projeto é uma API REST simples para cadastro de produtos.
O intuito é apresentar meus conhecimentos técnicos desenvolvendo
uma solução backend em PHP.

Por se tratar de um teste, optei por utilizar alguns recursos
que não são necessários em um projeto deste porte, mas vejo nisso
a oportunidade de mostrar meus conhecimentos mais aprofundados.

As tecnologias utilizadas neste projeto são:

- Laravel 11
- PHP 8.3
- MySQL 8.8
- Docker com Laravel Sail

## Instalação

Para instalar este projeto é preciso cloná-lo a partir do Github:

```shell
git clone https://github.com/Fe-lipe-Alves/bevi-api.git
cd bevi-api
```

Após clonar, é preciso criar o arquivo `.env` a partir do
`.env.example`.

```shell
cp .env.example .env
```

Este projeto utiliza o
[Laravel Sail](https://laravel.com/docs/master/sail#main-content)
para criar um ambiente de desenvolvimento rapidamente.O Laravel
Sail irá baixar as imagens Docker para os serviços PHP e MySQL
e iniciá-las corretamente.

Mas logo após clonar o projeto, a pasta `vendor` não existe,
pois ainda não foi instalado os pacotes do Composer. E sem o
pacote Laravel Sail, não temos o PHP e Composer que precisamos.
Segundo a [documentação oficial](https://laravel.com/docs/11.x/sail#installing-composer-dependencies-for-existing-projects),
podemos rodar este pequeno container Docker que irá baixar os
pacotes Composer e montar o diretório *vendor*, assim
conseguiremos chamar o Sail para iniciar a aplicação
posteriormente.
```shell
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php83-composer:latest \
    composer install --ignore-platform-reqs
```


## Utilização

Para iniciar a API, você deve inicializar os containers Docker
gerenciados pelo Laravel Sail. Execute o comando a seguir:

```shell
./vendor/bin/sail up -d
```

API fica disponível em `localhost:80`.

Para utilizar os endpoints desta API, você pode importar a
coleção do Postman a seguir. Nesta coleção há requisições preparadas para
todos os endpoints da API e uma documentação detalhada das
requisições e respostas.

[Ir para a coleção Postman](https://www.postman.com/fe-lipe-alves/workspace/bevi-api/collection/10267895-9d6791d3-9819-43e0-a621-9dc3ade82803?action=share&creator=10267895)

## Testes

Os testes escritos cobrem 100% do controlador, modelo e as classes
importantes para esta aplicação:

```shell
./vendor/bin/sail artisan test --coverage
```

Há testes para cada ação do controlador: listar, cadastrar,
editar, consultar e deletar. Ao todo são 8 testes e 53 afirmações
que garantem a cobertura de testes necessária:

```shell
./vendor/bin/sail artisan test
```

## Notas sobre a aplicação

Esta aplicação foi desenvolvida para atender a um teste da empresa
Bevi, que consiste em uma API para realizar o CRUD de produtos.
Devido à sua simplicidade, a solução não necessitaria comportar
alguns recursos como
[Cast Personalizado](https://laravel.com/docs/master/eloquent-mutators#custom-casts)
de dados,
[Validação de Formulário](https://laravel.com/docs/master/validation#form-request-validation)
em vez de validação de manual e
[Recurso de API](https://laravel.com/docs/master/eloquent-resources#main-content)
para tratar respostas. Mesmo assim, os recursos foram aplicados
para demonstrar o meu conhecimento em projetos de maior
complexidade.

Optei por utilizar o
[Laravel Sail](https://laravel.com/docs/master/sail)
para criar um ambiente de desenvolvimento Docker, pois é uma
abordagem mais rápida para iniciar o desenvolvimento, enquanto
contempla todos os recursos de que preciso.

