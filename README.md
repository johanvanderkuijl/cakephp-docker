# CakePHP Docker app

Usage:

```
git clone cakephp-docker
cd cakephp-docker
docker-compose up -d --build
docker exec -it cakephp-docker_app_1 composer install
docker exec -it cakephp-docker_app_1 bin/cake migrations migrate
docker exec -it cakephp-docker_app_1 vendor/bin/phpunit
```

About proxies:

If you are stuck behind a corporate firewall with a proxy, you can use environment variables to set this proxy. For example:
```
export http_proxy="10.0.0.1:8080"
```
Since these variables are picked up in the docker-compose.yml file, your containers can access the internet.
