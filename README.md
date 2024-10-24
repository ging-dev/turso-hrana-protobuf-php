```php
<?php

use Gingdev\TursoHranaPHP\Hrana\HranaClient;
use Gingdev\TursoHranaPHP\LibSQL;

require __DIR__.'/vendor/autoload.php';

$client = HranaClient::create($appUrl, $authToken);
$db = new LibSQL($client);
$result = $db->query('SELECT * FROM users');

while ($record = $result->fetchArray(SQLITE3_ASSOC)) {
    print_r($record);
}
```
