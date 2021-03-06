<?php
namespace Weasty\Resource\Utils;

/**
 * @TODO create service
 * Class WordInflector
 * @package Weasty\Resource\Utils
 */
class WordInflector {

    const CASE_NOMINATIVE = 1;
    const CASE_GENITIVE = 2;
    const CASE_DATIVE = 3;
    const CASE_ACCUSATIVUS = 4;
    const CASE_ABLATIVUS = 5;
    const CASE_PRAEPOSITIONALIS = 6;

    /**
     * @TODO refactor
     * @param $word
     * @param null|int $case
     * @return array|string|bool
     */
    public static function inflect($word, $case = null){

        $result = false;

        $url = 'http://export.yandex.ru/inflect.xml?name=' . urlencode($word) . '&format=json';
        $json_response = @file_get_contents($url);
        if($json_response){

            $response = json_decode($json_response, true);

            if(is_array($response)){

                if($case){

                    if(isset($response[$case])){

                        $result = $response[$case];

                    }

                } else {

                    $result = $response;

                }

            }

        }

        return $result;

    }

}