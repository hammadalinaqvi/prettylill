<?php

namespace App\Http\Controllers;

use App\Contracts\ProductsInterface;
use App\Http\Requests\FileUploadRequest;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function store(FileUploadRequest $request, ProductsInterface $products)
    {
        try {
            $upload = $products->uploadProducts($request->all());
            if ($upload) {
                return redirect('/products');
            }
        } catch (\Exception $exception) {
            dd($exception);
        }
    }

    public function products(ProductsInterface $products)
    {
        try {

            $data = $products->getProducts();

            return view('products', [
                'products' => $data
            ]);
        } catch (\Exception $exception) {
            dd($exception);
        }
    }
}
