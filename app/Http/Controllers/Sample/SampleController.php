<?php
namespace App\Http\Controllers\Sample;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SampleController extends Controller
{
    public function index(Request $request)
    {
        $sample_msg = config('sample.message');
        $sample_data = config('sample.data');
        $data = [
            'msg' => $sample_msg,
            'data' => $sample_data,
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