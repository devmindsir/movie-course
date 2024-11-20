<?php

namespace App\Http\controllers;

use App\Core\Controller;
use App\Core\Router;
use App\Exceptions\ProductNotFoundException;
use App\Services\ProductService;

class ProductController extends Controller
{

public function show(int $product_id,string $slug):void{
    try {
        $getProductDetails=(new ProductService())->getProductDetails($product_id,$slug);
        $this->view('pages.product.show',$getProductDetails);
    }catch (ProductNotFoundException $e){
        (new Router())->abort(404,$e->getMessage());
    }
}

}