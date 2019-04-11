<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (СкикС)
 * @date 28.03.2016
 */

namespace skeeks\yii2\googleApi;
use \Yii;
use yii\base\Component;

/**
 * @property \Google_Client $client
 *
 * Class GoogleComponent
 * @package common\components
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
}