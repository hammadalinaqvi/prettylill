<?php

namespace App\Services;

use App\Contracts\ProductsInterface;
use App\Helper\ImportHelper;
use App\Product;

class ProductsService implements ProductsInterface
{
    public function uploadProducts($data)
    {
        try {
            $file = $data['products_csv'];
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $tempPath = $file->getRealPath();
            $fileSize = $file->getSize();
            $mimeType = $file->getMimeType();

            $location = 'uploads';
            $file->move($location, $filename);

            $filepath = public_path($location . "/" . $filename);

            //make array from CSV
            //$product_data = $this->seedFromCSV($filepath, ',');
            $product_data = ImportHelper::seedFromCSV($filepath, ',');

            //importing into table
            $import = ImportHelper::importToDB($product_data);

            if($import)
            {
                return true;
            }

        } catch (\Exception $exception) {
            dd($exception);
        }
    }

    public function getProducts()
    {
        $products = Product::paginate(20);
        return $products ? $products : false;
    }

} // END - Class