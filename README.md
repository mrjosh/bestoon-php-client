## Bestoon php client
A simple PHP client for [Bestoon Project](https://github.com/jadijadi/bestoon)

### Installation

you can install client with composer
```
composer require bestoon/client:'dev-develop'
```

## Usage : Setconfig

You should set your API token key first with instance of client

```php
use Bestoon\Client;

$client = new Client([
    'token' => 'YOUR-TOKEN'
]);
```

### Manage stats
You can manage your stats with generalStat method

```php
$stats = $client->generalStat();

var_dump($stats);
```

### Set incom
Set your income with amount and text in arguments
```php
$client->setIncome('1000000','Test');
```

### Set expense
Set your expense with amount and text in arguments
```php
$client->setExpense('1000000','Test');
```

### License
The MIT License (MIT). Please see [License File](LICENSE) for more information.
