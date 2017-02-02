<?php

namespace Bestoon;

class Client
{
    use Request;

    /**
     * Base url of client
     *
     * @var string
     */
    protected $baseUrl = 'http://bestoon.ir';

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
    }

    /**
     * Get stat
     *
     * @return mixed
     */
    public function generalStat()
    {
        $response = $this->post($this->baseUrl . '/q/generalstat/',[
            'token' => $this->token
        ]);

        return json_decode($response, true);
    }

    /**
     * Set expense
     *
     * @param $amount
     * @param $text
     * @return mixed
     */
    public function expense($amount, $text)
    {
        $response = $this->post($this->baseUrl . '/submit/expense',[
            'token' => $this->token,
            'amount' => $amount,
            'text' => $text
        ]);

        return json_decode($response, true);
    }

    /**
     * Set income
     *
     * @param $amount
     * @param $text
     * @return mixed
     */
    public function income($amount, $text)
    {
        $response = $this->post($this->baseUrl . '/submit/income',[
            'token' => $this->token,
            'amount' => $amount,
            'text' => $text
        ]);

        return json_decode($response, true);
    }

}