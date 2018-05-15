FROM ubuntu:xenial
MAINTAINER Stefan van Gastel <stefanvangastel@gmail.com>

# Install packages and PHP 7
ENV DEBIAN_FRONTEND noninteractive
RUN apt-get update -q && apt-get install -qqy \
	git-core \
	composer \ 
	#Installing mod-php installs both recommended PHP 7 and Apache2
	libapache2-mod-php \
	php-mcrypt \
	php-intl \
	php-mbstring \
	php-zip \
	php-xml \
	php-codesniffer \
	php-mysql && \
	# Delete all the apt list files since they're big and get stale quickly
	rm -rf /var/lib/apt/lists/*

# copy the source app
COPY . /var/www/html 

# Add apache config to enable .htaccess and do some stuff you want
COPY .docker/vhost.conf /etc/apache2/sites-available/000-default.conf

# Enable mod rewrite and listen to localhost
RUN a2enmod rewrite && \
	echo "ServerName localhost" >> /etc/apache2/apache2.conf


####################################################
# Expose port and run Apache webserver             #
####################################################

EXPOSE 80
CMD ["/usr/sbin/apache2ctl", "-DFOREGROUND"]
