<?php

namespace App\Http\Controllers;

use App\MyClasses\MyService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HelloController extends Controller
{

    public function index(int $id = -1)
    {
        $myService = app()->makeWith('App\MyClasses\MyService', ['id' => $id]);
        $data = [
            'msg' => $myService->say($id),
            'data' => $myService->alldata()
        ];

        return view('hello.index', $data);
    }

}
