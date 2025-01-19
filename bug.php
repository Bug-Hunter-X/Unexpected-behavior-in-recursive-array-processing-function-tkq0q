```php
function processData(array $data): array
{
  $result = [];
  foreach ($data as $item) {
    if (is_array($item)) {
      $result[] = processData($item); // Recursive call for nested arrays
    } elseif (is_string($item) && strlen($item) > 0) {
      $result[] = $item;
    } else{
        //Handle other cases or throw exceptions
    }
  }
  return $result;
}

$data = [
  'apple',
  ['banana', 'cherry'],
  'date',
  ['fig', ['grape', 'kiwi']],
  123 //This will cause an error because it's not a string
];

$processedData = processData($data);
print_r($processedData);
```