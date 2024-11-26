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
//       dd($this->all());
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
        $cart->push([
            'id' => $item->id,
            'type' => $type,
            'title' => $item->title,
            'color_id'=>$color_id,
            'color_name'=>$color_name,
            'price' => $item->price,
            'discount' => $item->discount,
            'count' => 1
        ]);
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
}