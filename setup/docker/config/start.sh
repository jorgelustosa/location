#!/bin/sh

su -s /bin/sh -p -c "php artisan migrate --force" nginx

/usr/bin/supervisord -n -c /etc/supervisord.conf
