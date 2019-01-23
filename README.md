Component for work with official google api
===================================

Partly wrapper over powerful official package from google — google/apiclient

* [google/apiclient](https://github.com/google/google-api-php-client)
* [google/apiclient-services](https://github.com/google/google-api-php-client-services)
* https://console.cloud.google.com/home/dashboard

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist skeeks/yii2-google-api "*"
```

or add

```
"skeeks/yii2-google-api": "*"
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
            'class'                 => '\skeeks\yii2\googleApi\GoogleApiComponent',
            'developer_key'         => 'YOUR_GOOLE_API_KEY',
        ],
    //....
    ]
]

```

### An example of the Api transliteration

https://cloud.google.com/translate/v2/using_rest

```php

$service = new Google_Service_Translate(\Yii::$app->googleApi->client);
$result = $service->languages->listLanguages([
    'target' => 'ru'
]);
print_r($result);

```

```php

$result = $service->translations->listTranslations('apple', 'ru');
print_r($result);

```


___

> [![skeeks!](https://skeeks.com/img/logo/logo-no-title-80px.png)](https://skeeks.com)  
<i>SkeekS CMS (Yii2) — quickly, easily and effectively!</i>  
[skeeks.com](https://skeeks.com) | [cms.skeeks.com](https://cms.skeeks.com)


