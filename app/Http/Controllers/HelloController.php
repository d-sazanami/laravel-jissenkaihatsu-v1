<?php

namespace App\Http\Controllers;

use App\MyClasses\MyService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HelloController extends Controller
{

    public function index(MyService $myService, int $id = -1)
    {
        $myService->setId($id);
        $data = [
            'msg' => $myService->say(),
            'data' => $myService->alldata()
        ];

        return view('hello.index', $data);
    }

}
