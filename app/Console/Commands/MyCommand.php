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
    protected $signature = 'my:cmd {person?}';

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
        $p = $this->argument('person');
        if ($p != null) {
            $person = Person::find($p);
            if ($person != null) {
                echo "\nPerson id = " . $p . ":\n";
                echo $person->all_data . "\n";
                return 0;
            }
        }

        echo "can't get Person...";
        return 0;
    }
}
