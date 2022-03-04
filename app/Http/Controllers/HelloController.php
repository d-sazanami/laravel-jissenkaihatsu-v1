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

    public function index(Request $request)
    {
        $data = [
            'msg' => $request->msg,
            'data' => $request->alldata,
        ];

        return view('hello.index', $data);
    }

}
