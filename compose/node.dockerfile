FROM node:14

WORKDIR /usr/src/app

COPY . .

CMD [ "node", "server.js" ]