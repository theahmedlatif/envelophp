# Upgrading Manual

## V0 to V1
### Introduction
__*Version 0*__ was initial attempt to publish _envelophp_ package and ensure it usability over composer platform.

in __*Version one*__, _envelophp_ has no major changes however a new feature `createDatabase()` is introduced.

### Details
`createDatabase()` :
this new method where one can use to create a *Mysql Database* using database name provided in .env file, after that getConnection() can be called. 

```php
<?php
require_once dirname(__FILE__).'/vendor/autoload.php';
use Envelope\Database\MysqlDatabase;

$database = new MysqlDatabase();

//Create Database
$database->createDatabase();

//Connect to Database
$database->getConnection();
```