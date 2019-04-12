<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */

namespace skeeks\yii2\googleApi;

/**
 * @author Semenov Alexander <semenov@skeeks.com>
 */
interface GoogleApiServiceInterface
{
    /**
     * @return \Google_Service
     */
    public function getGoogleService();
}