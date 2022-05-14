# how  to install

## Install Composer
```
cd .src/ && \
composer update
```


## Build Docker

from work folder
```
docker build . -t gcf-php-docker_site
```

## Run Docker

from work folder 
```
docker-compose up -d
```

## Test
```

# Body Params

curl -m 70 -X POST localhost:8080 -H "Content-Type:application/json" -d '{"name": "BTC_JPY","action": "buy"}'
# Query Params
curl localhost:8080?name=BTC_JPY

```