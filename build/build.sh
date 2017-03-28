#!/usr/bin/env bash

echo 'Taking care of apt ...'
add-apt-repository ppa:ondrej/php
apt-get update -y

echo 'Taking care of php ...'
apt-get install -y php7.1 php7.1-mbstring php7.1-xml  php7.1-zip

echo 'Taking care of composer ...'
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php composer-setup.php
php -r "unlink('composer-setup.php');"
mv /home/ubuntu/composer.phar /usr/local/bin/composer
