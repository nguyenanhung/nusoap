[![Latest Stable Version](http://poser.pugx.org/nguyenanhung/nusoap/v)](https://packagist.org/packages/nguyenanhung/nusoap) [![Total Downloads](http://poser.pugx.org/nguyenanhung/nusoap/downloads)](https://packagist.org/packages/nguyenanhung/nusoap) [![Latest Unstable Version](http://poser.pugx.org/nguyenanhung/nusoap/v/unstable)](https://packagist.org/packages/nguyenanhung/nusoap) [![License](http://poser.pugx.org/nguyenanhung/nusoap/license)](https://packagist.org/packages/nguyenanhung/nusoap) [![PHP Version Require](http://poser.pugx.org/nguyenanhung/nusoap/require/php)](https://packagist.org/packages/nguyenanhung/nusoap) [![Monthly Downloads](http://poser.pugx.org/nguyenanhung/nusoap/d/monthly)](https://packagist.org/packages/nguyenanhung/nusoap) [![Daily Downloads](http://poser.pugx.org/nguyenanhung/nusoap/d/daily)](https://packagist.org/packages/nguyenanhung/nusoap)

# NuSoap - Fix for Php >= 5.4 and <= 8.1

NuSphere's NuSOAP for Packagist/Composer

Refactor by me, use namespace

Fix NuSOAP for PHP `>=5.4` and PHP `<=8.1`

## Install

Step 1: Install packages

```shell
composer require nguyenanhung/nusoap
```

Step 2.1: Init to Project if PHP <= 7.0

```php
<?php 
require '/your/to/path/vendor/autoload.php';
use nguyenanhung\MyNuSOAP\nusoap_client;
$client = new nusoap_client();
```

Step 2.2: Init to Project if PHP <= 8.1

```php
<?php 
require '/your/to/path/vendor/autoload.php';
use nguyenanhung\MyFixNuSOAP\nusoap_client;
$client = new nusoap_client();
```

## Contact

If any question & request, please contact following information

| Name        | Email                | Skype            | Facebook      |
| ----------- | -------------------- | ---------------- | ------------- |
| Hung Nguyen | dev@nguyenanhung.com | nguyenanhung5891 | @nguyenanhung |

From Hanoi with Love <3