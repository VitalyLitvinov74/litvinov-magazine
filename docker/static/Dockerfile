FROM nginx
WORKDIR /usr/share/nginx/html
RUN apt-get update && apt-get install -y
RUN curl -sL https://deb.nodesource.com/setup_14.x | bash
RUN apt-get -y install nodejs
