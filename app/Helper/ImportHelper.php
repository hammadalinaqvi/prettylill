<?php


namespace App\Helper;


use App\Product;

class ImportHelper
{
    public static function seedFromCSV($filename, $deliminator = ',')
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

    public static function importToDB($data)
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