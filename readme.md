# Loja Laravel

### Instalação

1. Este projeto requer [composer](https://getcomposer.org/) para ser executado.
2. Renomear arquivo **.env.example** para **.env**
3. Alterar as seguintes linhas do arquivo .env

```sh
DB_DATABASE='nome do banco'
DB_USERNAME='usuario do banco'
DB_PASSWORD='senha do banco'
```

4. Executar os seguintes comandos no terminal

```sh
composer install
php artisan key:generate
php artisan migrate:fresh --seed
php artisan scout:import "App\Produto"
php artisan serve
```

5. Acessar link exibido no terminal, exemplo: http://127.0.0.1:8000
