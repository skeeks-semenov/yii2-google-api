Component for work with official google api
===================================

Partly wrapper over powerful official package from google — google/apiclient

* [google/apiclient](https://github.com/google/google-api-php-client)
* [google/apiclient-services](https://github.com/google/google-api-php-client-services)
* https://console.cloud.google.com/home/dashboard


[![Latest Stable Version](https://img.shields.io/packagist/v/skeeks/yii2-google-api.svg)](https://packagist.org/packages/skeeks/yii2-google-api)
[![Total Downloads](https://img.shields.io/packagist/dt/skeeks/yii2-google-api.svg)](https://packagist.org/packages/skeeks/yii2-google-api)

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist skeeks/yii2-google-api "^2.0.1"
```

or add

```
"skeeks/yii2-google-api": "^2.0.1"
```


How to use
----------

### Configuration app
```php
//App config
[
    'components'    =>
    [
    //....
        'googleApi' =>
        [
            'class'       => '\skeeks\yii2\googleApi\GoogleApi',
            'key'         => 'YOUR_GOOLE_API_KEY',
        ],
    //....
    ]
]

```

An example of the Api transliteration
---

https://cloud.google.com/translate/v2/using_rest

Translate "apple"

```php
$result = \Yii::$app->googleApi->serviceTranslate->translate('apple', 'ru');
print_r($result);
```

or

```php
$result = \Yii::$app->googleApi->serviceTranslate->googleService->translations->listTranslations('apple', 'ru');
print_r($result);
```

or

```php
$googleService = \Yii::$app->googleApi->serviceTranslate->googleService;
$result = $googleService->translations->listTranslations('apple', 'ru');
print_r($result);
```

or

```php
$googleClient = \Yii::$app->googleApi->googleClient;
$googleService = new \Google_Service_Translate($googleClient);
$result = $googleService->translations->listTranslations('apple', 'ru');
print_r($result);
```

```php
$service = \Yii::$app->googleApi->serviceTranslate->googleService;
$result = $service->languages->listLanguages([
    'target' => 'ru'
]);
print_r($result);
```


An example other google services
---

```php

$googleClient = \Yii::$app->googleApi->googleClient;
$googleServiceAdsense = new \Google_Service_Adsense($googleClient);
$googleServiceAdsense = new \Google_Service_Youtube($googleClient);
//....

```

Your Google Services
---

```php
//App config
[
    'components'    =>
    [
    //....
        'googleApi' =>
        [
            'class'       => '\skeeks\yii2\googleApi\GoogleApi',
            'key'         => 'YOUR_GOOLE_API_KEY',
            
            'serviceTranslateClass' => 'skeeks\cms\googleApi\serviceTranslate\GoogleApiServiceTranslate'
            
            //or
            
            'serviceTranslateClass' => [
                'class' => 'skeeks\cms\googleApi\serviceTranslate\GoogleApiServiceTranslate',
                
                'option' => 'value'
            ],
        ],
    //....
    ]
]

```


___

> [![skeeks!](https://skeeks.com/img/logo/logo-no-title-80px.png)](https://skeeks.com)  
<i>SkeekS CMS (Yii2) — quickly, easily and effectively!</i>  
[skeeks.com](https://skeeks.com) | [cms.skeeks.com](https://cms.skeeks.com)


