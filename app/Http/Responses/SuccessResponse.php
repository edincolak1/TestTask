<?php

namespace App\Http\Responses;

class Succeessesponse
{
    protected $statusCode = 200;
    protected $message = 'Success';

    public function __construct($message = null, $statusCode = null)
    {
        if (!is_null($statusCode)) {
            $this->setStatusCode($statusCode);
        }
        if (!is_null($message)) {
            $this->setMessage($message);
        }
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function setMessage($message)
    {
        $this->message = $message;
    }

    public function getStatusCode()
    {
        return $this->statusCode;
    }

    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;
    }

    public function getResponse()
    {
        return [
            "success" => true,
            "description" => $this->getMessage()
        ];
    }
}
