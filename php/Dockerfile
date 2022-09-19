FROM php:8-fpm
RUN apt-get update && \
apt-get install -y libzip-dev zip libfreetype6-dev libjpeg62-turbo-dev libpng-dev && \
docker-php-ext-configure gd --with-freetype=/usr/include/ --with-jpeg=/usr/include/ && \
docker-php-ext-install gd && \
docker-php-ext-install zip 
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php -r "if (hash_file('sha384', 'composer-setup.php') === '55ce33d7678c5a611085589f1f3ddf8b3c52d662cd01d4ba75c0ee0459970c2200a51f492d557530c71c15d8dba01eae') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
RUN php composer-setup.php
RUN php -r "unlink('composer-setup.php');"
RUN mv composer.phar /usr/local/bin/composer
WORKDIR /root/
#COPY composer.json /root/composer.json
COPY dockerrun.sh /root/dockerrun.sh 
RUN chmod +x /root/dockerrun.sh 
#CMD ["/root/dockerrun.sh"]
#RUN composer install
#RUN rm /root/composer.json
#RUN cp -R /root/ /var/www/html/
