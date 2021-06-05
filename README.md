<h3 align="center">PHP-OOP Xml Parse</h3>

<p align="center">
  <a href="https://packagist.org/packages/muhittingulap/xml-parse"><img src="https://poser.pugx.org/muhittingulap/xml-parse/v/stable.svg" alt="Latest Stable Version">
  <a href="https://packagist.org/packages/muhittingulap/xml-parse"><img src="https://poser.pugx.org/muhittingulap/xml-parse/d/total.svg" alt="Total Downloads"></a>
  <a href="https://packagist.org/packages/muhittingulap/xml-parse"><img src="https://poser.pugx.org/muhittingulap/xml-parse/license.svg" alt="License"></a>
</p>

## Get Started
PHP-OOP Xml Parse

## Install

    $ composer require muhittingulap/xml-parse
 
## Using in your project
```php

    <?php     
    include('vendor/autoload.php');

    $xml = new \MGXML\libraries\xml();
    $xml->setUrl($url) // Xml url
        ->setParentAttr("product"); // Example repeat parent attr

```  
## Config

| Parametre        | Detail         |
| ---------------- | -------------- |
| setUrl           | Xml Url        |
| setParentAttr    | Repeat parent attr |

#### - getKeys

```php

<?php 
$return = $xml->getKeys(); // Get array xml attr keys

```  