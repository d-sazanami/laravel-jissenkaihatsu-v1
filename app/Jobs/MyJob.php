<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Person;
use Illuminate\Support\Facades\Storage;

class MyJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $person;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($id)
    {
        $this->person = Person::find($id)->first();
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->doJob();
    }

    public function getPersonId()
    {
        return $this->person->id;
    }

    public function __invoke()
    {
        $this->handle();
    }

    public function doJob()
    {
        $sufix = ' [+MY JOB]';
        if (strpos($this->person->name, $sufix)) {
            $this->person->name = str_replace($sufix, '', $this->person->name);
        } else {
            $this->person->name .= $sufix;
        }
        $this->person->save();

        Storage::append('person_access_log.txt', $this->person->all_data);
    }
}
