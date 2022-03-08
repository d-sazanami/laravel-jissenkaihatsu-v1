<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person;

class HelloController extends Controller
{

    public function index(Request $request)
    {
        $msg = 'show people reord.';
        $even = Person::get()->filter(function($item)
        {
            return $item->id % 2 == 0;
        });
        $even2 = Person::get()->filter(function($item)
        {
            return $item->age % 2 == 0;
        });
        $result = $even->merge($even2);

        $data = [
            'msg' => $msg,
            'data' => $result,
        ];

        return view('hello.index', $data);
    }

}
