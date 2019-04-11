<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */

namespace skeeks\yii2\googleApi;
use \Yii;
use yii\base\Component;

/**
 * @property \Google_Client $client
 *
 * @author Semenov Alexander <semenov@skeeks.com>
 */
class GoogleApiComponent extends Component
{
    public $developer_key = '';

    public function getClient()
    {
        $client = new \Google_Client();
        $client->setDeveloperKey($this->developer_key);

        return $client;
    }

    public function translate($source_phrase, $target_language, $source_language = null, $source_format = 'text')
    {

    }
}