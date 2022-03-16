<?php

namespace App\Console\Commands;

use App\Models\Person;
use Illuminate\Console\Command;
use Illuminate\Foundation\Inspiring;

class MyCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'my:cmd {--id=?} {--name=?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This is my first command!';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $id = $this->option('id');
        $name = $this->option('name');
        if ($id != '?') {
            $p = Person::find($id);
        } else {
            if ($name != '?') {
                $p = Person::where('name', $name)->first();
            } else {
                $p = null;
            }
        }
        if ($p != null) {
            echo "Person id = " . $p->id . ":\n" . $p->all_data;
        } else {
            echo 'no Person find...';
        }
        echo "\n";

        return 0;
    }
}
