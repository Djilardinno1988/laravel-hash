FROM nginx

ADD docker/conf/vhost.conf /etc/nginx/conf.d/default.conf

WORKDIR /var/wwww/laravel-docker