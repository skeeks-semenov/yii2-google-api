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
 * @property \Google_Service_Translate $googleService
 *
 * @author Semenov Alexander <semenov@skeeks.com>
 */
class GoogleApiServiceTranslate extends GoogleApiService
{
    /**
     * @return \Google_Service_Translate
     */
    public function getGoogleService()
    {
        return new \Google_Service_Translate($this->googleApi->googleClient);
    }

    /**
     *
     * @see https://cloud.google.com/translate/docs/translating-text
     *
     * @param        $source_phrase
     * @param        $target_language
     * @param null   $source_language
     * @param string $source_format
     * @return string
     * @throws \Exception
     */
    public function translate($source_phrase, $target_language, $source_language = null, $source_format = 'text')
    {
        $source_phrase = trim($source_phrase);
        $source_format = $source_format == 'html' ? 'html' : 'text';

        try {
            //Обратимся к google сервису
            $service = $this->googleService;

            $optParams = [];
            if ($source_format !== 'text') {
                $optParams['format'] = 'html';
            }

            if ($source_language) {
                $optParams['source'] = $source_language;
            }

            $result = $service->translations->listTranslations($source_phrase, $target_language, $optParams);

            $data = $result->offsetGet('data');
            if (isset($data['translations'][0]['translatedText'])) {
                $translated = $data['translations'][0]['translatedText'];
                return (string)$translated;
            } else {
                throw new Exception("Not translated '{$source_phrase}' to '{$target_language}'");
            }
        } catch (\Exception $e) {
            \Yii::warning($e->getMessage(), self::class);
            throw $e;
        }
    }
}