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
 * @property \Google_Service_YouTube $googleService
 *
 * @author Semenov Alexander <semenov@skeeks.com>
 */
class GoogleApiServiceYoutube extends GoogleApiService
{
    /**
     * @return \Google_Service_YouTube
     */
    public function getGoogleService()
    {
        return new \Google_Service_YouTube($this->googleApi->googleClient);
    }
}