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
      //Improved error handling: Log the issue and continue processing
      error_log('Non-string element encountered: ' . print_r($item, true)); 
    }
  }
  return $result;
}

$data = [
  'apple',
  ['banana', 'cherry'],
  'date',
  ['fig', ['grape', 'kiwi']],
  123 //This will now be logged as an error, but the function will continue
];

$processedData = processData($data);
print_r($processedData);
```