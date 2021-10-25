<?php

namespace App\Http\Controllers;

use App\MyClasses\MyService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HelloController extends Controller
{

    public function index(MyService $myService)
    {
        $data = [
            'msg' => $myService->say(),
            'data' => $myService->data()
        ];

        return view('hello.index', $data);
    }

}
