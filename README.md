## Meili Symfony

Simple app based on this symfony [tutorial](https://www.twilio.com/blog/get-started-docker-symfony) forked from [yemiwebby/symfony-docker-tut](https://github.com/yemiwebby/symfony-docker-tut)

## Useful commands

To run some migrations and fixtures
```bash
docker-compose run --rm php /bin/bash

~$ symfony console doctrine:migrations:migrate
~$ symfony console doctrine:fixtures:load
```

To access database CLI:
```bash
docker-compose exec database /bin/bash
```
