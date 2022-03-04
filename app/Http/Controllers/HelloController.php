<?php

namespace App\Http\Controllers;

use App\Facades\MyService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HelloController extends Controller
{

    function __construct()
    {
    }

    public function index(int $id = -1)
    {
        MyService::setId($id);
        $data = [
            'msg' => MyService::say(),
            'data' => MyService::alldata()
        ];

        return view('hello.index', $data);
    }

}
