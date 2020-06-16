<?php


namespace App\Controller\Test;


use App\Controller\Controller;
use App\Service\Test\TestService;

class TestController extends Controller
{
    public $s;

    public function __construct(TestService $service) {
        parent::__construct();
        $this->s = $service;
    }
    public function index() {
        $this->validate($this->request, [
            "id" => "required|integer",
        ]);
        return $this->simpleReturn($this->s->index($this->request), $this->s->getMessage());
    }
}
