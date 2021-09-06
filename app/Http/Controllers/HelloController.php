<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use App\Models\Person;

class HelloController extends Controller
{
    private $fname;

    function __construct()
    {
        $this->fname = 'hello.txt';
    }

    public function index(Request $request)
    {
        $msg = 'please input text:';

        if ($request->isMethod('post'))
        {
            $msg = 'you typed: "' . $request->input('msg') . '"';
        }

        $data = [
            'msg' => $msg
        ];

        return view('hello.index', $data);
    }

    public function other(Request $request)
    {
        $ext = '.' . $request->file('file')->extension();
        Storage::disk('public')->putFileAs('files', $request->file('file'), 'uploaded' . $ext);
        return redirect()->route('hello');
    }
}
