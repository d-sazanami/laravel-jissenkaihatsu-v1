<?php
namespace App\Http\Controllers\Sample;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SampleController extends Controller
{
    public function index(Request $request)
    {
        $data = [
            'msg' => 'SAMPLE-CONTOROLLER-INDEX!',
        ];
        return view('hello.index', $data);
    }

    public function other(Request $request)
    {
        $data = [
            'msg' => 'SAMPLE-CONTOROLLER-OTHER!!',
        ];
        return view('hello.index', $data);
    }
}