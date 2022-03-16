<?php

namespace App\Http\Controllers;

use App\MyClasses\PowerMyservice;
use Illuminate\Http\Request;
use App\Models\Person;
use Illuminate\Support\Facades\Artisan;
use Symfony\Component\Console\Output\BufferedOutput;

class HelloController extends Controller
{

    public function index($id = -1)
    {
        $opt = [
            '--method' => 'get',
            '--path' => 'hello',
            '--sort' => 'uri',
            '--compact' => null
        ];
        $output = new BufferedOutput();
        Artisan::call('route:list', $opt, $output);
        $msg = $output->fetch();

        $data = [
            'msg' => $msg,
        ];

        dump($data);
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

    public function clear()
    {
        Artisan::call('cache:clear');
        Artisan::call('event:clear');

        return redirect()->route('hello');
    }

}
