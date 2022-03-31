ARG aws_region_ecr

## Builder
FROM 450773497527.dkr.ecr.$aws_region_ecr.amazonaws.com/microservices/images-base:php7.4-fpm-nginx-supervisor AS builder

RUN apk --update --no-cache add composer git

ADD ./ /var/www/html/

RUN rm -rf /var/www/html/setup \
    && chown nginx.nginx -R /var/www/html \
    && chmod 777 /var/www/html/storage/*

USER nginx

RUN COMPOSER_MEMORY_LIMIT=-1 composer install --no-dev


## Final IMAGE
FROM 450773497527.dkr.ecr.$aws_region_ecr.amazonaws.com/microservices/images-base:php7.4-fpm-nginx-supervisor

COPY --chown=nginx:nginx --from=builder /var/www/html /var/www/html/

COPY ./setup/docker/config/etc/supervisor.d-production /etc/supervisor.d/

COPY ./setup/docker/config/etc/crontab /var/spool/cron/crontabs/root

COPY ./setup/docker/config/etc/filebeat/production.filebeat.yml /etc/filebeat/filebeat.yml
RUN chmod go-w /etc/filebeat/filebeat.yml

COPY ./setup/docker/config/start.sh /start.sh

RUN chmod +x /start.sh

USER root

CMD "/start.sh"
