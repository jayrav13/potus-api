<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\President;
use App\Models\Poll;

class ScrapePolls extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scrape:polls';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Scrape presidential opinion polls';

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
     * @return mixed
     */
    public function handle()
    {
        $output = [];
        exec("python storage/scripts/polls/recent_poll_scrape.py", $output);
        $data = json_decode( implode(" ", $output) );

        $president = President::orderBy('number', 'desc')->first();

        foreach($data as $key => $value)
        {
            $poll = new Poll;
            $poll->fill( (array) $value );
            $president->polls()->save($poll);
        }

    }
}
