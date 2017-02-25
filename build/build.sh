#!/usr/bin/env bash

echo 'Taking care of apt ...'
add-apt-repository ppa:ondrej/php
apt-get update -y

echo 'Taking care of std ...'
apt-get install -y curl git

echo 'Taking care of php ...'
apt-get install -y php7.1 php7.1-mbstring php7.1-xml  php7.1-zip

echo 'Taking care of composer ...'
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('SHA384', 'composer-setup.php') === '55d6ead61b29c7bdee5cccfb50076874187bd9f21f65d8991d46ec5cc90518f447387fb9f76ebae1fbbacf329e583e30') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"
mv /home/ubuntu/composer.phar /usr/local/bin/composer
