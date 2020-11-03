## Request CURL em PHP

Uma maneira de requisição GET, PUT, POST, DELETE em CURL.

Nesse pacote terá 1 arquivo

* Request.php - Arquivo onde contem os método para requisição.

##### Request.php
Classe onde está localizado todo a rotina de manipulação do album.

* __construct(string $uri, array $headers=[]);
* post(array $data);
* put(array $data);
* delete();
* get();
* run()
