<?php

namespace App\Http\Controllers;

use App\MyClasses\PowerMyservice;
use Illuminate\Http\Request;
use App\Models\Person;

class HelloController extends Controller
{

    public function index(PowerMyservice $service)
    {
        $service->setId(1);
        $msg = $service->say();
        $result = Person::get();

        $data = [
            'input' => '',
            'msg' => $msg,
            'data' => $result,
        ];

        return view('hello.index', $data);
    }

    public function send(Request $request)
    {
        $id = $request->input('id');
        $person = Person::find($id);

        event(new PersonEvent($person));
        $data = [
            'input' => '',
            'msg' => 'id=' . $id,
            'data' => [$person],
        ];

        return view('hello.index', $data);
    }

    public function save($id, $name)
    {
        $record = Person::find($id);
        $record->name = $name;
        $record->save();

        return redirect()->route('hello');
    }

    public function other()
    {
        $person = new Person();
        $person->all_data = ['aaa', 'bbb@ccc', 1234];
        $person->save();

        return redirect()->route('hello');
    }

    public function json($id = -1)
    {
        if ($id == -1) {
            return Person::get()->toJson();
        } else {
            return Person::find($id)->toJson();
        }
    }

}
