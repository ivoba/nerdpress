# nerdpress

[Nerdpress.org](http://nerdpress.org) built on [Bedrock](https://roots.io/bedrock/)

## Install

copy env file, adjust if neccesary and add keys

    cp .env.example .env
    
    docker-compose up

    docker-compose run php composer install
    
    docker-compose run builder npm install
    
Copy *app/uploads* for images.  
Import DB via Mysql Workbench  

## Use

    http://localhost:8088
    http://localhost:8088/wp/wp-admin
    
For css builder run: 

    docker-compose run builder gulp

## Todo

- "wpackagist-plugin/social": "^3.1", errors while composer update

## Credits

https://github.com/skeleton-framework/skeleton-framework
https://wpackagist.org/
https://roots.io/bedrock/