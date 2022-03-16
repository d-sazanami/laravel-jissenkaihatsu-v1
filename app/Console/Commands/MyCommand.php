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
    protected $signature = 'my:cmd {num?*}';

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
        $arr = $this->arguments();
        $re = 0;
        foreach ($arr['num'] as $item ) {
            $re += (int) $item;
        }

        echo "total:" . $re;
        return 0;
    }
}
