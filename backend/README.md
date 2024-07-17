### install deps

- composer update
- composer install

### create .env file
```sh
  cp .env.example .env
```
add correct env inside .env

#### generate Laravel encription Key

```sh
  php artisan key:generate
```


#### make sure to have docker or equivalent running

``` sh
  ./vendor/bin/sail 
```
or 

``` sh
  docker-compose up
```


###