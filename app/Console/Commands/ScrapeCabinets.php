<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\President;
use App\Models\CabinetMember;

class ScrapeCabinets extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scrape:cabinets';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Scrape presidential cabinets';

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

        // Get all US presidents for which a URL exists to get a cabinet.
        $presidents = President::where('presidency_url', '!=', 'null')->get();

        foreach($presidents as $president)
        {
            // Print POTUS url to get started.
            echo $president->url . "\n";

            // Execute the Python script and parse data out of it.
            $output = [];
            exec("python storage/scripts/leadership/cabinet_scrape.py {$president->presidency_url} {$president->number}", $output);
            $data = json_decode($output[0]);

            // Iterate through every member and persist.
            foreach($data as $res)
            {
                $member = new CabinetMember;
                $member->fill( (array) $res );
                $president->cabinet_members()->save($member);

                // Print name.
                echo $member->name . "\n";
            }
        }
    }
}
