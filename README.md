# Make Response
This PHP library helps to generate global standard response in `JSON` and `Array` for client (API Client, POS Client, Web Client etc). It is not framework dependent, you are open to use it with any PHP project.

## Installation
Via composer command
```composer
composer require farhanwazir/makeresponse
```

Or add below line in your composer.json and run `composer update` command
```composer.json
"farhanwazir/makeresponse" : "1.*"
```

### Laravel user's
For Laravel user's can add below line in config/app.php
```php
'providers' => [
    ...
    FarhanWazir\MakeResponse\MakeResponseServiceProvider::class
    ...
]
```

Do not close config/app, go down inside "aliases"
```php
'aliases' => [
    ...
    'MakeResponse' => FarhanWazir\MakeResponse\Facade\MakeResponse::class
    ...
]
```

### Lumen user's
For Lumen user's can add below line in bootstrap/app.php
```php
$app->register(FarhanWazir\MakeResponse\MakeResponseServiceProvider::class);
```
Add alias as facade in laravel
```php
if (!class_exists('MakeResponse')) {
    class_alias(FarhanWazir\MakeResponse\Facade\MakeResponse::class, 'MakeResponse');
}
```

## Usage
You just need to call `makeResponse()` helper function to respond to request. Below listed available methods will help you to explorer MakeResponse.

- `setStatus(numeric)` set numeric value with positive or negative
- `setMessage(string)` set string message not big string, it is for short message
- `setErrors(sting|array)` set string or array for errors
- `setResult(string|array)` set string or array for result parameter of your response
- `set(status, result, errors, message)` set method for set response parameters once

- `get()` get formatted response collection
- `get()->toArray()` convert collection in array
- `get()->toJson()` convert collection in json

#### Use via helper function
```php
makeResponse($status, $result, $errors, $message, $array);
```
- `$status` must be numeric positive or negative.
- `$result` string or array. `Default null`
- `$errors` string or array. `Default null`
- `$message` one line string. `Default null`
- `$array` boolean, it is belongs to returning response (in array or json). `Default true`

#### Get response example
Example 1: Get formatted response in array
```php
makeResponse(1, ['id' => 1, 'name' => 'Farhan Wazir']);
```
Example 2: Get formatted response in json
```php
makeResponse()->setStatus(1)->setErrors('You provided input is wrong.')->get();
//OR
makeResponse(1, ['id' => 1, 'name' => 'Farhan Wazir'], null, null, false);
```
Example 3: Verify formatted response to client
```php
//Response will be in array
makeResponse(1);

//Response will be in json
makeResponse(1, null, null, null, false);
```
Example 4: Convert response in array
```php
// makeResponse()->toArray() converts into array and same for json by toJson()
makeResponse()->setStatus(0)->setErrors('You provided input is wrong.')->get()->toArray();
```
Example 5: Direct class call approach
```php
$response = new FarhanWazir\MakeResponse\Response();
$response->setStatus(1);
$response->setResult( array('id' => 1, 'name' => 'Make Responder') );


print $response->get(); //or $response->get()->toJson();


//convert response in array
print_r($response->get()->toArray());
```

**Laravel and Lumen user's**

You can also use above illustrated example and below is for Laravel and Lumen style:
```php
//Response will be in json
MakeResponse::set(1, ['id' => 1, 'name' => 'Farhan Wazir'])->get();

//Response will be in array
MakeResponse::set(0, null, 'Your input is wrong', 'Input error')->getArray();
```


### Thank you for using