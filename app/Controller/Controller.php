<?php

namespace App\Controller;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    public $request;
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct() {
        $this->request = app(Request::class);
    }

    public function simpleReturn($res,$msg = 'error') {
        if ($res !== false) {
            return success('success',!is_bool($res) ? $res : '');
        }
        return error(400,$msg);
    }
}
