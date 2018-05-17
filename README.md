# CakePHP Docker app

Usage:

```
git clone cakephp-docker
cd cakephp-docker
docker-compose up -d --build
docker exec cakephp-docker_app_1 composer install
docker exec cakephp-docker_app_1 bin/cake migrations migrate
docker exec cakephp-docker_app_1 vendor/bin/phpunit
```
