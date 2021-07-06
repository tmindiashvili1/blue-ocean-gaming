<?php

if(!function_exists('xmlParseToArray')) {
    /**
     * @param $xmlContent
     * @return mixed|null
     */
    function xmlParseToArray($xmlContent)
    {
        try {
            $data = preg_replace("/(<\/?)(\w+):([^>]*>)/", "$1$2$3",
                $xmlContent);
            $xml = new \SimpleXMLElement($data);
            return json_decode(json_encode((array)$xml), true);
        } catch (\Exception $ex) {
            logger('[Error parsing xml]',[
                'error' => $ex
            ]);
            return null;
        }
    }
}
