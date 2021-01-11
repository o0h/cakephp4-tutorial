#!/bin/sh
# obtained from https://getcomposer.org/doc/faqs/how-to-install-composer-programmatically.md

SCRIPT_DIR=`dirname $0`
cd $SCRIPT_DIR

EXPECTED_CHECKSUM="$(wget -q -O - https://composer.github.io/installer.sig)"
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
ACTUAL_CHECKSUM="$(php -r "echo hash_file('sha384', 'composer-setup.php');")"

if [ "$EXPECTED_CHECKSUM" != "$ACTUAL_CHECKSUM" ]
then
    >&2 echo 'ERROR: Invalid installer checksum'
    rm composer-setup.php
    exit 1
fi

php composer-setup.php --quiet
RESULT=$?
rm composer-setup.php
mv composer.phar ../docker/php/shared_files/copy/usr/local/bin/composer
chmod +x ../docker/php/shared_files/copy/usr/local/bin/composer
exit $RESULT
