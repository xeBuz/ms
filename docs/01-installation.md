# Installation

### Download the source code

```bash
git clone git@github.com:xeBuz/ms.git
```

### Install dependencies with composer

```bash
cd ms/
composer install
```

The only dependencies are `Silex` for the API structure, `Doctrine` for the database access and `PHPUnit` for the unit test (but this one is only for dev environment)



### Setup the Database

There is a SQL dump is available in the `extra/` directory. You need to import the file into your MySQL database.
Then, you need to setup the credentials. The configurations is available in `config/db.php`


### Execute the Code

The easier way to execute the app is running it with the CLI Development Server

```bash
php -S localhost:8888 run.php
```

But you can also use your Apache server.

### Run the tests
I included some unit test.
I did not implement TDD because I have some doubts about the initial requirements.

```bash
phpunit test --colors
PHPUnit 5.1.3 by Sebastian Bergmann and contributors.

.........                             9 / 9 (100%)

Time: 16 ms, Memory: 4.00MB

OK (9 tests, 53 assertions)

```
