<?php

namespace Bestoon;

trait Request
{
    /**
     * Send get request with curl
     *
     * @param $url
     * @return mixed
     */
    public function get($url)
    {
        $ch = curl_init();

        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

        $response = curl_exec($ch);

        curl_close($ch);

        return $response;
    }

    /**
     * Send post request with curl
     * 
     * @param $uri
     * @param array $options
     * @return mixed
     */
    public function post($uri, array $options)
    {
        $ch = curl_init($uri);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $options);

        $response = curl_exec($ch);

        curl_close($ch);

        return $response;
    }

}