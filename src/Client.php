<?php

namespace Bestoon;

use GuzzleHttp\Client as GuzzleClient;

class Client
{
    /**
     * Base url of client
     *
     * @var string
     */
    protected $baseUrl = 'http://bestoon.ir';

    /**
     * Guzzle client instance
     *
     * @var object
     */
    protected $guzzle = null;

    /**
     * Token of client
     *
     * @var string
     */
    protected $token = null;

    /**
     * Client constructor.
     *
     * @param array $options
     */
    public function __construct(array $options)
    {
        if(empty($options) || ! isset($options['token'])){
            throw new \Exception("The token is required !");
        }

        $this->token = $options['token'];

        $this->guzzle = new GuzzleClient([
            'base_uri' => $this->baseUrl
        ]);
    }

    /**
     * Get stat
     *
     * @return mixed
     */
    public function generalStat()
    {
        $response = $this->guzzle->post('/q/generalstat/',[
            'form_params' => [
                'token' => $this->token
            ]
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }

    /**
     * Set expense
     *
     * @param $amount
     * @param $text
     * @return mixed
     */
    public function setExpense($amount, $text)
    {
        $response = $this->guzzle->post('/submit/expense',[
            'token' => $this->token,
            'amount' => $amount,
            'text' => $text
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }

    /**
     * Set income
     *
     * @param $amount
     * @param $text
     * @return mixed
     */
    public function setIncome($amount, $text)
    {
        $response = $this->guzzle->post($this->baseUrl . '/submit/income',[
            'token' => $this->token,
            'amount' => $amount,
            'text' => $text
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }

}