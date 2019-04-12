<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */

namespace skeeks\yii2\googleApi;

use skeeks\yii2\googleApi\services\GoogleApiServiceAdsense;
use skeeks\yii2\googleApi\services\GoogleApiServiceTranslate;
use skeeks\yii2\googleApi\services\GoogleApiServiceYoutube;
use yii\base\Component;
use yii\base\Exception;
use yii\base\InvalidConfigException;
use yii\helpers\ArrayHelper;

/**
 * @property \Google_Client            $googleClient
 *
 * @property GoogleApiServiceTranslate $serviceTranslate
 * @property GoogleApiServiceYoutube   $serviceYoutube
 * @property GoogleApiServiceAdsense   $serviceAdsense
 *
 * @author Semenov Alexander <semenov@skeeks.com>
 */
class GoogleApi extends Component
{
    /**
     * @see https://console.developers.google.com/apis/credentials?project=api-project-1091876680684
     * @var string
     */
    public $key = '';

    /**
     * @var string
     */
    public $serviceTranslateClass = GoogleApiServiceTranslate::class;
    /**
     * @var string
     */
    public $serviceYoutubeClass = GoogleApiServiceYoutube::class;
    /**
     * @var string
     */
    public $serviceAdsenseClass = GoogleApiServiceAdsense::class;

    /**
     * @return \Google_Client
     */
    public function getGoogleClient()
    {
        $client = new \Google_Client();
        $client->setDeveloperKey($this->key);

        return $client;
    }

    /**
     * @param $serviceName
     * @return GoogleApiService
     * @throws InvalidConfigException
     */
    private function _createService(string $serviceName) {
        $serviceName = $serviceName . "Class";
        if (!isset($this->{$serviceName})) {
            throw new InvalidConfigException("Not exist service");
        }

        $serviceData = $this->{$serviceName};
        $config = [
            'googleApi' => $this
        ];

        if (is_string($serviceData)) {
            $config = ArrayHelper::merge($config, [
                'class' => $serviceData
            ]);
        } elseif(is_array($serviceData)) {
            $config = ArrayHelper::merge($serviceData, $config);
        }

        return \Yii::createObject($config);
    }

    /**
     * @return GoogleApiServiceTranslate
     * @throws InvalidConfigException
     */
    public function getServiceTranslate()
    {
        return $this->_createService("serviceTranslate");
    }
    /**
     * @return GoogleApiServiceYoutube
     * @throws InvalidConfigException
     */
    public function getServiceYoutube()
    {
        return $this->_createService("serviceYoutube");
    }

    /**
     * @return GoogleApiServiceAdsense
     * @throws InvalidConfigException
     */
    public function getServiceAdsense()
    {
        return $this->_createService("serviceAdsense");
    }
}