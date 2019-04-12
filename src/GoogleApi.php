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
     * @return GoogleApiServiceTranslate
     */
    public function getServiceTranslate()
    {
        $class = $this->serviceTranslateClass;
        return new $class($this);
    }
    /**
     * @return GoogleApiServiceYoutube
     */
    public function getServiceYoutube()
    {
        $class = $this->serviceYoutubeClass;
        return new $class($this);
    }
    /**
     * @return GoogleApiServiceAdsense
     */
    public function getServiceAdsense()
    {
        $class = $this->serviceAdsenseClass;
        return new $class($this);
    }
}