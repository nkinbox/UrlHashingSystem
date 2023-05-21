#!/bin/bash
set -e

# Start PHP-FPM
php-fpm &

# Start Supervisor
/usr/bin/supervisord -n -c /etc/supervisor/conf.d/worker.conf