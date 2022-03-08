<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person;

class HelloController extends Controller
{

    public function index(Request $request)
    {
        $msg = 'show people reord.';
        $re = Person::get();
        $fields = Person::get()->fields();

        $data = [
            'msg' => implode(', ', $fields),
            'data' => $re,
        ];

        return view('hello.index', $data);
    }

}
