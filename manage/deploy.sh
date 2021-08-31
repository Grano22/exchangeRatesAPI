#!/bin/bash
# Skrypt do deploymentu napisany przeze mnie ;p

generate_compose() {
cat <<EOT >> $1/docker-compose.yml
version: '2.0'
services:
 
  #Laravel app
  app:
    build:
      context: .
      dockerfile: Dockerfile
    image: cloudsigma.com/php
    container_name: app
    restart: unless-stopped
    tty: true
    environment:
      SERVICE_NAME: app
      SERVICE_TAGS: dev
    working_dir: /var/www/html/
    networks:
      - app-network
 
  #Nginx Service
  webserver:
    image: nginx:alpine
    container_name: webserver
    restart: unless-stopped
    tty: true
    ports:
      - "80:80"
      - "443:443"
    networks:
      - app-network
 
  #MySQL Service
  db:
    image: mysql:5.7.32
    container_name: db
    restart: unless-stopped
    tty: true
    ports:
      - "3306:3306"
    environment:
      MYSQL_DATABASE: laravel_web
      MYSQL_ROOT_PASSWORD: replace_mysql_root_password
      SERVICE_TAGS: dev
      SERVICE_NAME: mysql
    networks:
      - app-network
 
#Docker Networks
networks:
  app-network:
    driver: bridge
EOT
}

generate_nginx() {
    touch nginx
cat <<EOT >> $1/greetings.txt
    server {
    listen 80;
    server_name example.com;
    root /srv/example.com/public;

    add_header X-Frame-Options "SAMEORIGIN";
    add_header X-Content-Type-Options "nosniff";

    index index.php;

    charset utf-8;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location = /favicon.ico { access_log off; log_not_found off; }
    location = /robots.txt  { access_log off; log_not_found off; }

    error_page 404 /index.php;

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php7.4-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ /\.(?!well-known).* {
        deny all;
    }
}
EOT
}

echo "Welcome to Laravel app deploy process, please specify some params of package"

echo "What kind of server you want? nginx or apache"

DEPLOY_DIR = "../deploy"

PS3="Choose an animal: "
options=(nginx apache)
select menu in "${options[@]}";
do
  echo -e "\nWybrałeś serwer typu $menu ($REPLY)"
  if [[ $menu == "nginx" || $menu == "apache" ]]; then
        echo -e "Przetwarzanie serwera $menu"
        if [ ! -d "$DEPLOY_DIR" ] mkdir $DEPLOY_DIR
        generate_compose $DEPLOY_DIR
        
        if [[ $menu == "nginx" ]]; then

        else

  else
    echo "Serwer typu $menu nie istnieje"
    break;
  fi
done
