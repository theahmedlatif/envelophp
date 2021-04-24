

<div align="center">

![alt text](https://am3pap005files.storage.live.com/y4mGrqQ1xWER1KedWl1QYgik-mZ91I80_fdzVmUKh76YLISSXFIkZ_e5q7OyJBxUw064r6oDqjrPjl-XeG4DJ9FFmh8uDo7Ebm6fu9MNSHfL5Y4EgEGLQAB1JyE1F5L2SNYstiD6ux8aHL4_d3iZcNGBhvXZtoJpvU7MiGR8GR2th0TAS0ewpoacCYdocYLBnvt?width=568&height=138&cropmode=none "Envelophp")

___

[![License](https://poser.pugx.org/talmira/envelophp/license)](//packagist.org/packages/talmira/envelophp)
[![GitHub stars](https://img.shields.io/github/stars/theahmedlatif/envelophp)](https://github.com/theahmedlatif/envelophp/stargazers)
[![GitHub forks](https://img.shields.io/github/forks/theahmedlatif/envelophp)](https://github.com/theahmedlatif/envelophp/network)
[![GitHub issues](https://img.shields.io/github/issues/theahmedlatif/envelophp)](https://github.com/theahmedlatif/envelophp/issues)

[![Latest Stable Version](https://poser.pugx.org/talmira/envelophp/v)](//packagist.org/packages/talmira/envelophp) 
[![Total Downloads](https://poser.pugx.org/talmira/envelophp/downloads)](//packagist.org/packages/talmira/envelophp) 
[![Latest Unstable Version](https://poser.pugx.org/talmira/envelophp/v/unstable)](//packagist.org/packages/talmira/envelophp) 
</div>

# What is envelophp?
*This package will help you to keep your database in one place and use them across your native php application.* <br>

envelophp use .env file to store database credentials and parse its content to be used in database connection.

# Installation
Simple installation using [Composer](https://getcomposer.org/):
```Bash
composer require talmira/envelophp
```

# Setup
- #### Create .env file:
Navigate to your project root folder then create .env file using one of the following methods:

    1. Use curl to create .env file
    ```Bash
      curl -LJ -o ".env" https://gist.github.com/theahmedlatif/3c5c7fd454f48898d7660bef555aca31/raw
    ```
    
    2. Use wget to create .env file
    ```Bash
       wget --output-document=.env --no-check-certificate --content-disposition https://gist.github.com/theahmedlatif/3c5c7fd454f48898d7660bef555aca31/raw
    ```
- #### Modify .env file:
```Bash
#Database#
HOST = "localhost"
DATABASE_DSN = "mysql"
DATABASE_NAME = "sample_db"
DATABASE_USERNAME = "sample_username"
DATABASE_PASSWORD = "sample_password"
```

# Test
envelophp provides its own unit test cases:
- #### Fetch information from .env:
this test case validate .env file location is the pointed location by Envelope Class and ability to read variables.
```Bash
php vendor/talmira/envelophp/test/FetchDotEnv.php
```

- #### Test database connection:
this test case test database connection using .env variables.
```Bash
php vendor/talmira/envelophp/test/MysqlDBTest.php
```

# Usage
Simply require autoload.php in your file where you want to connect to your database as below:
```php
require_once dirname(__FILE__).'/vendor/autoload.php';
```

Then use the MysqlDatabase namespace:
```php
use Envelope\Database\MysqlDatabase;
```
Now you are ready to create a new instance of `MysqlDatabase` where database connection is needed:
```php
$connection = new MysqlDatabase();
```
to make a database connection call `getConnection()` method:
```php
$connection->getConnection();
```
to close database connection call `closeConnection()` method:
```php
$connection->closeConnection();
```