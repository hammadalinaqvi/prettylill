<?php


namespace App\Contracts;


interface ProductsInterface
{

    public function uploadProducts($data);

    public function getProducts();
}