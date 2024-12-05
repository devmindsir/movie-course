<?php

namespace App\Helper;

use App\Core\Session;
use Illuminate\Support\Collection;

class Cart
{
    private function getCart(): Collection
    {
        $cart = Session::get('cart');
        return is_array($cart) ? collect($cart) : collect([]);
    }

    public function add(object $item, string $type,?int $color_id,?string $color_name):void
    {

        $cart = $this->getCart();
        $exist = $this->findItemInCart($cart, $item, $type,$color_id);
        if ($exist) {
            $cart = $this->updateCountItem($cart, $item, $type,$color_id);
        } else {
            $cart = $this->addNewItem($cart, $item, $type,$color_id,$color_name);
        }
        $this->setSession($cart);
    }

    private function findItemInCart(Collection $cart, object $item, string $type,?int $color_id): ?array
    {
        return $cart->firstWhere(fn($cartItem) => $cartItem['id'] === $item->id
            && $cartItem['type'] === $type
            && $cartItem['color_id']===$color_id
        );
    }

    private function updateCountItem(Collection $cart, object $item, string $type,?int $color_id):Collection
    {
        if ($type === 'course') {

            $this->setFlush('این دوره در سبد خرید شما وجود دارد','error');
            return $cart;
        }
        return $cart->map(function ($cartItem) use ($item,$color_id) {
            if ($cartItem['id'] === $item->id && $cartItem['color_id']===$color_id) {
                $cartItem['count'] += 1;
            }
            $this->setFlush();
            return $cartItem;
        });

    }

    private function addNewItem(Collection $cart, object $item, string $type,?int $color_id,?string $color_name): Collection
    {
        $cartItem=[
            'id' => $item->id,
            'type' => $type,
            'title' => $item->title,
            'price' => $item->price,
            'discount' => $item->discount,
            'count' => 1
        ];
        if ($type==='product'){
              $cartItem['color_id']=$color_id;
              $cartItem['color_name']=$color_name;
            $cartItem['weight']=$item->weight;
        }
        $cart->push($cartItem);
        $this->setFlush();
        return $cart;
    }

    private function setFlush(string $message='محصول به سبد خرید اضافه شد',string $status='success'){
        Session::setFlash('toast',['message'=>$message,'status'=>$status]);

    }

    private function setSession(Collection $cart)
    {
        Session::set('cart', $cart->toArray());
    }

    public function getTotalCount(){
        $cart=$this->getCart();
        return $cart->count();
    }
    public function getTotalPrice(){
        $cart=$this->getCart();
        $totalPrice=$cart->sum(function($item){
            $discountPrice=$item['price']*(1-$item['discount']/100);
            return $discountPrice*$item['count'];
        });
        return $totalPrice;
    }


    public function all(): Collection
    {
        return $this->getCart();
    }

    public function hasProduct():bool{
        $cart=$this->getCart();
        return $cart->contains(fn($item)=>$item['type']==='product');
    }

    public function calculatePostPrice(string $postType){

        $cart=$this->getCart();
        //!BasePrice
        $basePrice=0;
        if ($postType==='special'){
            $basePrice=50000;
        }elseif ($postType==='express'){
            $basePrice=25000;
        }

        //!get Weight
        $totalWeight=0;
        foreach ($cart as $row){
            if ($row['type']==='product'){
                $totalWeight+=$row['weight']*$row['count'];
            }
        }
        $postWeightPrice=4000;
        $addationalPrice=0;
        if ($totalWeight>0){
            $addationalPrice=ceil($totalWeight/500)*$postWeightPrice;
        }
        $totalShippingPrice=$basePrice+$addationalPrice;
        return $totalShippingPrice;
    }

    public function getFinalPrice(){
        $postPrice=Session::get('post')['postPrice']??0;
        $codePrice=Session::get('total_cart')['discountAmount']??0;
        $totalPrice=$this->getTotalPrice();
        return $postPrice+$totalPrice-$codePrice;
    }

    public function clear(){
        Session::remove('cart');
        Session::remove('post');
        Session::remove('total_cart');
    }

}