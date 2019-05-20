<?php

namespace App\Console\Commands;

use App\Helper\ImportHelper;
use App\Product;
use Illuminate\Console\Command;

class UploadProducts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:products
                            {file : path to file}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command to import the files';

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
        $products = ImportHelper::seedFromCSV($this->argument('file'), ',');
        if (ImportHelper::importToDB($products)) {
            return "Data imported Successfully";
        } else {
            return "Something went wrong!";
        }

    }

}
