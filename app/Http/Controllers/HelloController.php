<?php

namespace App\Http\Controllers;

use App\Http\Pagination\MyPaginator;
use Illuminate\Http\Request;
use App\Models\Person;

class HelloController extends Controller
{

    public function index(Request $request)
    {
        $id = $request->query('page');
        $msg = 'show page: ' . $id;
        $result = Person::paginate(3);
        $paginator = new MyPaginator($result);

        $data = [
            'msg' => $msg,
            'data' => $result,
            'paginator' => $paginator
        ];

        return view('hello.index', $data);
    }

}
