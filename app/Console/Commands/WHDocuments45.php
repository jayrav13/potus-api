<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\DocumentType;
use App\Models\Document;
use App\Models\President;

class WHDocuments45 extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'wh:docs:45';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Scrapes 45th POTUS Documents';

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
        exec("python storage/scripts/documents/45.py", $output);
        foreach ($output as $key => $value) {

            $president = President::where('number', 45)->first();

            $value = (array) json_decode($value);

            $type = DocumentType::where('slug', $value["category_slug"])->where('president_id', $president->id)->first();
            if ( ! $type )
            {
                $type = new DocumentType;
                $type->fill([
                    "name" => $value["category_name"],
                    "slug" => $value["category_slug"]
                ]);
                $president->document_types()->save($type);
            }

            $document = Document::where('url', $value["url"])->first();
            if ( ! $document )
            {
                $document = new Document;
                $document->fill([
                    "title" => $value["title"],
                    "url" => $value["url"],
                    "document_date" => $value["document_date"],
                    "content" => $value["content"],
                ]);
                $type->documents()->save($document);
            }

        }
    }
}
