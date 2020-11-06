# Login and Register using CI4


## UML Sequence Diagram
![UML](https://github.com/erisitohang/ci4-auth/blob/main/uml.png?raw=true)


## Images
1. nginx 1.9
2. php 7.4
3. mysql 5.7
3. redis 6.0


## Setup
1. Copy `env` to `.env` and tailor for your app, specifically the baseURL
and any database settings.

2. Install [docker](https://docs.docker.com/engine/installation/) and [docker-compose](https://docs.docker.com/compose/install/) ;
3. Start application by running
```sh
docker-compose up -d
```
4. Login to docker
```shell
 docker exec -it ci4_php_fpm bash
```

5. Run migrationn
```shell
 docker exec -it ci4_php_fpm php spark migrate 
```

## Run Test
```shell
 docker exec -it ci4_php_fpm ./vendor/bin/phpunit 
```
