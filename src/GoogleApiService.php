<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */

namespace skeeks\yii2\googleApi;

use yii\base\Component;
use yii\base\InvalidConfigException;

/**
 * @property \Google_Service $googleService
 *
 * @author Semenov Alexander <semenov@skeeks.com>
 */
abstract class GoogleApiService extends Component implements GoogleApiServiceInterface
{
    /**
     * @var GoogleApi
     */
    public $googleApi;

    public function __construct(GoogleApi $googleApi = null, $config = [])
    {
        $this->googleApi = $googleApi;
        parent::__construct($config);
    }

    /**
     * @throws InvalidConfigException
     */
    public function init()
    {
        parent::init();

        if (!$this->googleApi && !$this->googleApi instanceof GoogleApi) {
            throw new InvalidConfigException("googleApi must be ".GoogleApi::class);
        }

    }

    /**
     * @return \Google_Service
     */
    abstract public function getGoogleService();
}