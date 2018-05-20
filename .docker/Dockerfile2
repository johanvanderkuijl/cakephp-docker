FROM php:7.2-apache-stretch
MAINTAINER Johan van der Kuijl <jvdkuijl@gmail.com>

RUN apt-get -y update \
    && apt-get install -y \
	libicu-dev \
	vim \
	zip \
	unzip \
    && docker-php-ext-configure intl \
    && docker-php-ext-install intl \
	&& docker-php-ext-configure mbstring \
	&& docker-php-ext-install mbstring \
	&& docker-php-ext-configure pdo_mysql \
	&& docker-php-ext-install pdo_mysql \
	&& curl -Ls https://getcomposer.org/composer.phar > /usr/local/bin/composer && chmod +x /usr/local/bin/composer \
	&& rm -rf /var/lib/apt/lists/*

# copy the source app
COPY . /var/www/html 

# run composer install
WORKDIR /var/www/html

#better run this from your host, or the vendor lib is not preserved
#RUN composer -n install
#docker exec -it <your container> composer install

# Add apache config to enable .htaccess and do some stuff you want
COPY .docker/vhost.conf /etc/apache2/sites-available/000-default.conf

# Enable mod rewrite and listen to localhost
RUN a2enmod rewrite && \
	echo "ServerName localhost" >> /etc/apache2/apache2.conf

# fix group rights
RUN	chgrp -R www-data logs tmp && \
	chmod -R g+rw logs tmp 


####################################################
# Expose port and run Apache webserver             #
####################################################

EXPOSE 80
CMD ["/usr/sbin/apache2ctl", "-DFOREGROUND"]
