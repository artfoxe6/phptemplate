<?php


namespace App\Service\Test;


use App\Service\Service;
use Illuminate\Http\Request;

class TestService extends Service
{
    public function index(Request $request)
    {
        try {
            return [
                "test"=>$request->input("id")
            ];
        } catch (\Exception $exception) {
            return $this->errMsg($exception);
        }
    }
}
