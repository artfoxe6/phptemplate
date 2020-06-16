<?php

namespace App\Service;


use App\Exceptions\CustomException;

class Service
{
    protected $message = '';

    public function setMessage($message, $exception = null, $code = 400) {
        $this->message = $message;
        if ($exception != null && !$exception instanceof CustomException) {
            report($exception);
        }
    }

    public function getMessage() {
        return $this->message;
    }

    protected function throwException($errorMessage, $code = null)
    {
        if ($code) {
            throw new CustomException($errorMessage, $code);
        } else {
            throw new CustomException($errorMessage);
        }
    }

    // 返回失败并设置原因
    public function errMsg($exception) {
        $this->message = $exception->getMessage() . "#".$exception->getLine();
        return false;
    }
}
