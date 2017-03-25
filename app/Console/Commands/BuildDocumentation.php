<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class BuildDocumentation extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'documentation:build';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Build Slate documentation';

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
        exec("cd storage/documentation && bundle exec middleman build", $output);
        echo implode("\n", $output);

        if(count($output) == 0 || $output[count($output) - 1] != "Project built successfully.")
        {
            echo "\nProject build failed. Please try again.\n";
        }
        else
        {
            echo "\nMove index.html to views.\n";
            exec("mv storage/documentation/build/index.html resources/views/index.php");

            foreach(scandir("storage/documentation/build") as $dir)
            {
                if ($dir == "." || $dir == "..")
                {
                    continue;
                }
                else
                {
                    echo "Moving {$dir} to public/\n";
                    exec("rm -rf public/{$dir}");
                    exec("cp -r storage/documentation/build/{$dir} public/{$dir}");
                }
            }
        }

    }
}
