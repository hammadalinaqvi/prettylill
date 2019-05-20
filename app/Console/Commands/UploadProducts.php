<?php

namespace App\Console\Commands;

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
        $products = $this->seedFromCSV($this->argument('file'), ',');
        if ($this->importToDB($products)) {
            return "Data imported Successfully";
        }
    }

    private function seedFromCSV($filename, $deliminator = ',')
    {
        $header = null;
        $data = [];

        if (($handle = fopen($filename, 'r')) !== false) {
            while (($row = fgetcsv($handle, 1000, $deliminator)) !== false) {
                if (!$header) {
                    $header = $row;
                } else {
                    $data[] = $row;
                }
            }

            fclose($handle);
        }

        return $data;
    }

    private function importToDB($data)
    {

        foreach ($data as $datum) {

            $product = new Product();
            $product->code = $datum[0];
            $product->name = $datum[1];
            $product->description = $datum[2];
            $product->stock = $datum[3];
            $product->price = floatval(preg_replace('/[^0-9-.]+/', '', $datum[4]));
            if (empty($datum[5]) || $datum[5] === 'yes') {
                $product->discontinued = 1;
            }
            $product->save();

        }
        return true;
    }
}
