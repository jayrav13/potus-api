<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\President;

class ScrapePresidents extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scrape:presidents';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Scrape Presidents';

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
        exec("python storage/scripts/presidents_scrape.py", $output);

        $data = json_decode($output[0]);

        var_dump( (array) $data[0]);

        foreach($data as $key => $value)
        {
            $value = (array) $value;
            $president = President::create($value);
        }

    }
}
