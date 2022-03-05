<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HelloController extends Controller
{

    public function index(Request $request)
    {
        $result = DB::table('people')->get();
        $data = [
            'msg' => 'Database access.',
            'data' => $result,
        ];

        return view('hello.index', $data);
    }

}
