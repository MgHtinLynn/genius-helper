<?php
/**
 * Created by PhpStorm.
 * User: htinlynn
 * Date: 11/26/18
 * Time: 4:17 PM
 */

namespace Genius\Services;


use Genius\Contacts\Genius;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class GeniusService implements Genius
{
    private $token;
    private $receivedNumber;
    private $testing;
    private $url;

    /**
     * Genius constructor.
     */
    public function __construct()
    {
        $this->token = config('geniusService.token');
        $this->receivedNumber = config('geniusService.receivedNumber');
        $this->testing = config('geniusService.testing');
        $this->url = config('general.ooredooUrl');
    }

    /**
     * @param array $phoneNumber
     * @param string $message
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @return Genius
     */
    public function sendSMSService(array $phoneNumber, string $message): Genius
    {
        $apiKey = urlencode($this->token);
        $numbers = implode(',', $phoneNumber);
        $sender = urlencode($this->receivedNumber);
        $data = $this->getData($apiKey, $numbers, $sender, $message);
        $validate = $this->validateData($data);
        if (!$validate) {
            return $this->validateError();
        }
        return $this->requestAPI($data);
    }

    /**
     * @param $apiKey
     * @param $phoneNumber
     * @param $sender
     * @param $message
     * @return array
     */
    protected function getData($apiKey, $phoneNumber, $sender, $message)
    {
        return [
            'apikey' => $apiKey,
            'numbers' => $phoneNumber,
            "sender" => $sender,
            "message" => urlencode($message),
            'test' => $this->testing
        ];
    }

    /**
     * @param $data
     * @return bool
     */
    protected function validateData($data)
    {
        if (empty($data['message'])) {
            Log::error('Empty message');
            return false;
        }
        if (empty($data['sender'])) {
            Log::error('Empty sender name');
            return false;
        }
        return true;
    }

    /**
     *
     */
    protected function validateError()
    {
        Log::error('Validate Data Error');
        //Session::flash('api.status', 500);
        //Session::flash('api.message', 'Validate Data Wrong');
        return;
    }

    /**
     * @param $data
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    protected function requestAPI($data)
    {
        // Send the POST request with guzzle
        try {
            $client = new \GuzzleHttp\Client(['base_uri' => $this->url]);
            $response = $client->request('POST', 'send/', [
                'form_params' => $data
            ]);

            $body = $response->getBody();
            $body = json_decode($body);
            if ($body->status === 'failure') {
                return $this->validateMessage($body);
            } else {
                //session()->flash('genius.message', 200);
                //session()->flash('genius.message', 'Successfully to send SMS to User');
                Log::info('Successfully to send SMS ' . $data['numbers']);
                return;
            }
        } catch (\Exception $e) {
            return $this->throwException($e);
        }
        // Process your response here
    }

    /**
     * @param $body
     */
    protected function validateMessage($body)
    {
        $message = $body->warnings[0]->message . ' ,' . $body->errors[0]->message;
        Log::error('Fail Ooredoo SMS Service Fail because of ' . $message);
        //Session::flash('genius.message', 500);
        //Session::flash('genius.message', 'Fail to send SMS to User');
        return;
    }

    /**
     * @param $e
     */
    protected function throwException($e)
    {
        Log::error('Fail Ooredoo SMS Service Fail because of ' . $e->getMessage());
        //Session::flash('api.status', 500);
        //Session::flash('api.message', 'Something Wrong! Ooredoo SMS Service Fail');
        return;
    }


}