# Login and Register using CI4

## Images
1. nginx 1.9
2. php 7.4
3. mysql 5.7
3. redis 6.0


## Installation
1. Install [docker](https://docs.docker.com/engine/installation/) and [docker-compose](https://docs.docker.com/compose/install/) ;
2. Start application by running
```sh
docker-compose up -d
```

## Setup

Copy `env` to `.env` and tailor for your app, specifically the baseURL
and any database settings.