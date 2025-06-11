FROM node:18-alpine

WORKDIR /app

COPY . .

RUN apk add --no-cache python3 make g++ \
  && rm -rf node_modules package-lock.json \
  && npm install \
  && apk del python3 make g++

EXPOSE 5173

CMD ["npm", "run", "dev", "--", "--host"]