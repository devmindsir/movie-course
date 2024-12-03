<?php

namespace App\Http\controllers;

use App\Core\Controller;
use App\Core\Router;
use App\Exceptions\CourseNotFoundException;
use App\Helper\Cart;
use App\Services\CartService;
use Exception;

class CartController extends Controller
{

    public function index(){
        $carts=cart()->all();
        $this->view('pages.cart.index',['carts'=>$carts]);
    }

    public function store(){
        try {
            $product_id=$_POST['product_id']??null;
            $product_type=$_POST['product_type']??null;
            $product_color_id=$_POST['product_color']??null;
            $color_name=null;

            //!CART SERVICE
            $service=new CartService();
            //!Check Type
            $service->checkProductType($product_type);
            //!Check Product
            $product=$service->getProduct($product_id,$product_type);
            //!check Color
            if ($product_color_id){
                $color_name=(new CartService)->getColor($product_color_id);
            }
            //!Send Product To Cart
            if ($product){
                cart()->add($product,$product_type,$product_color_id,$color_name);
            }
            //!REDIRECT
            redirect("$product_type/show/$product_id/".generateSlug($product->title),'',303);


        }catch (Exception $e){
            (new Router())->abort(404,$e->getMessage());
        }
    }


}