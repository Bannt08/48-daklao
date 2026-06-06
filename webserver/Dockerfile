FROM ubuntu:22.04

ENV DEBIAN_FRONTEND=noninteractive

RUN apt-get update && apt-get install -y \
    nginx php-fpm php-cli ssh curl net-tools sudo uuid-runtime file \
    && rm -rf /var/lib/apt/lists/*

RUN useradd -m -s /bin/bash dev && \
    echo "dev:Password1!" | chpasswd

RUN mkdir -p /home/dev/.ssh && chmod 700 /home/dev/.ssh

COPY ./id_rsa_static.pub /home/dev/.ssh/authorized_keys
RUN chmod 600 /home/dev/.ssh/authorized_keys && \
    chown -R dev:dev /home/dev/.ssh

RUN chmod u+s /usr/bin/find

COPY ./webserver/src /var/www
COPY ./webserver/nginx.conf /etc/nginx/sites-available/default

RUN WEB_FLAG="FLAG{$(uuidgen)}" && \
    sed -i "s#FLAG{WEB_RCE_SUCCESSFUL_CAFE}#$WEB_FLAG#g" /var/www/upload.php


RUN echo "FLAG{$(uuidgen)}" > /home/dev/user.txt && \
    chmod 640 /home/dev/user.txt && chown root:dev /home/dev/user.txt

RUN echo "FLAG{$(uuidgen)}" > /root/root.txt

# Phân quyền cho Nginx ghi file vào thư mục upload sản phẩm
RUN chown -R www-data:www-data /var/www

EXPOSE 80 22

CMD mkdir -p /run/php /var/run/sshd && \
    service php8.1-fpm start && \
    service ssh start && \
    nginx -g 'daemon off;'