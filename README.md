# Serial number generator

Generate serial number or key or random string with number. 
Tested on PHP 8.4.

[![Latest Stable Version](https://poser.pugx.org/rundiz/serial-number-generator/v/stable)](https://packagist.org/packages/rundiz/serial-number-generator)
[![License](https://poser.pugx.org/rundiz/serial-number-generator/license)](https://packagist.org/packages/rundiz/serial-number-generator)
[![Total Downloads](https://poser.pugx.org/rundiz/serial-number-generator/downloads)](https://packagist.org/packages/rundiz/serial-number-generator)

## Properties
**numberChunks** is number of chunks. If you just want to generate random string, set this to 1. It required at least number 1.<br>
Example: If number of chunk is 3. XXXXX-XXXXX-XXXXX

**numberLettersPerChunk** is number of letters per chunk.<br>
Example: If number of letters per chunk is 2 and number of chunk is 3. XX-XX-XX

**separateChunkText** is separator text to separate chunks.<br>
Example: If separator is colon. XXXXX:XXXXX:XXXXX:XXXXX:XXXXX

## Example

### Install
I recommend you to install this library via Composer and use Composer autoload for easily include the files. If you are not using Composer, you have to manually include these files by yourself.<br>
Please make sure that the path to files are correct.

```php
require_once '/path/to/Rundiz/SerialNumberGenerator/SerialNumberGenerator.php';
```


### Usage
Just write this simple code. You can set properties to change some values.

```php
$SerialNumberGenerator = new \Rundiz\SerialNumberGenerator\SerialNumberGenerator();
$serial_number = $SerialNumberGenerator->generate();
unset($SerialNumberGenerator);

echo $serial_number;
```