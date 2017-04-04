<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\VicePresident;

class ScrapeVicePresidents extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scrape:vps';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Scrape Vice Presidents';

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
        exec("python storage/scripts/leadership/vice_presidents_scrape.py", $output);
        $data = json_decode( implode(" ", $output) );

        foreach($data as $key => $value)
        {
            $value = (array) $value;
            $president = VicePresident::create($value);
        }
    }
}
