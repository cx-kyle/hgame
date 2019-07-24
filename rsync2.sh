#!/bin/bash
#sudo svn up
#sudo chmod -R 777 .
rsync -vcrl -R --delete --exclude-from=upload.exclude -e  'ssh -p 60022' .  root@106.12.5.58:/opt/www/xyt_admin
