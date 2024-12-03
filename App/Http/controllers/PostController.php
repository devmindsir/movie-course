<?php

namespace App\Http\controllers;

use App\Core\Controller;
use App\Core\Session;
use App\Helper\Cart;
use App\Models\Address;
use App\Models\shippingPost;
use App\Services\PostService;

class PostController extends Controller
{
    public function index()
    {
        $service = new PostService();
        $service->checkCart();
        $service->checkProduct();
        $type_post = $service->checkPostPrice();
        $getAddress = (new Address())->getUserAddress();
        $this->view('pages.post.index', ['address' => $getAddress, 'posts' => $type_post]);
    }

    public function create()
    {
        $service = new PostService();
        $inputData = json_decode(file_get_contents('php://input'), true);
        $addressId = $inputData['addressId'] ?? null;
        $shippingId = $inputData['shippingId'] ?? null;
        $service->checkValidate($addressId, $shippingId);
        $postPrice = $service->calculatePost($shippingId);
        Session::set('post', ['addressID' => $addressId, 'shippingID' => $shippingId, 'postPrice' => $postPrice]);

        echo json_encode([
            'success' => true,
            'message' => 'اطلاعات با موفقیت ثبت شد'
        ]);

    }
}