<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */

namespace skeeks\yii2\googleApi;

use skeeks\yii2\googleApi\services\GoogleApiServiceTranslate;
use yii\base\Component;
use yii\base\Exception;

/**
 * @property \Google_Client            $googleClient
 *
 * @property \Google_Service_Translate $serviceTranslate
 * @property \Google_Service_YouTube   $serviceYoutube
 * @property \Google_Service_AdSense   $serviceAdsense
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
     * @return \Google_Client
     */
    public function getGoogleClient()
    {
        $client = new \Google_Client();
        $client->setDeveloperKey($this->key);

        return $client;
    }

    /**
     * @return GoogleApiServiceTranslate
     */
    public function getServiceTranslate()
    {
        return new GoogleApiServiceTranslate($this);
    }
}