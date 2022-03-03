<?php

namespace App\Http\Controllers;

use App\MyClasses\MyServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HelloController extends Controller
{

    function __construct()
    {
    }

    public function index(MyServiceInterface $myService, int $id = -1)
    {
        $myService->setId($id);
        $data = [
            'msg' => $myService->say(),
            'data' => $myService->alldata()
        ];

        return view('hello.index', $data);
    }

}
