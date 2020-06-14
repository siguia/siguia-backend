#!/bin/bash
[ ! -f /var/log/supervisor.log ] || touch /var/log/supervisor.log
[ ! -f /var/log/worker.log ] || touch /var/log/worker.log
/usr/bin/supervisord -c /etc/supervisor/supervisord.conf
exec "$@"