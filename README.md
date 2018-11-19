# Technical Test

This repository was created to store/provide a potential employer with my solution 
to their technical test.

The project itself is quite straight forward. Expose an API which takes a number paramter
and returns its aliquot number category.

The outcomes to a successful request can be:

    - perfect
    - deficient
    - abundant
    
### Setup

---
To test this easily, I've created a docker image that will be used to
host the project/test it.

To begin:

    1. run ./bin/get-composer.sh
- This will get your own local copy of composer (makes life easier)
    
    
    2. docker-compose build

- This will build the web/dev containers


    3. docker-compose run dev php composer.phar install
    
- Will install all dependencies


    4. cp .env.dist .env


- Initialize the ENV file


    5. docker-compose up
    
- Will bring up the apache web server, running at `localhost:8888` (if you didn't
change the default ports)

### Testing

---
To actually make a request, you'll need to make a post request to `localhost:8888`
with a post body containing a valid key/value pair called `number`


### Unit Tests:

---
To run the PHPUnit tests, run the following command:

    docker-compose run dev ./bin/phpunit