<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */

namespace skeeks\yii2\googleApi\services;

use skeeks\yii2\googleApi\GoogleApi;
use skeeks\yii2\googleApi\GoogleApiService;
use yii\base\Component;

/**
 * @property \Google_Service_AdSense $googleService
 *
 * @author Semenov Alexander <semenov@skeeks.com>
 */
class GoogleApiServiceAdsense extends GoogleApiService
{
    /**
     * @return \Google_Service_AdSense
     */
    public function getGoogleService()
    {
        return new \Google_Service_AdSense($this->googleApi->googleClient);
    }
}