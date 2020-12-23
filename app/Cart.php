<?php

namespace App;

class Cart {

    public $items = null;
    public $totalQty = 0;
    public $totalPrice = 0;

    function __construct($oldCart) {

        if ($oldCart) {

            $this->items = $oldCart->items;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
        }
    }

    public function add($item, $id, $qty) {
        $stroeditem = ['qty' => 0, 'price' => $item->price, 'item' => $item];
        if ($this->items) {
            if (array_key_exists($id, $this->items)) {
                $stroeditem = $this->items[$id];
            }
        }
        $stroeditem['qty'] = $stroeditem['qty'] + $qty;
        $stroeditem['price'] = $item->price * $qty;
        $this->items[$id] = $stroeditem;
        $this->totalQty++;
        $this->totalPrice = $this->totalPrice + $stroeditem['price'];
    }

    public function giftSubscription($item, $id, $qty) {

        $giftItem = ['qty' => 0, 'price' => $item['price'], 'item' => $item];

        if ($this->items) {
            if (array_key_exists($id, $this->items)) {
                $giftItem = $this->items[$id];
            }
        }
        $giftItem['qty'] = $giftItem['qty'] + $qty;
        $giftItem['price'] = $item['price'];
        $this->items[$id] = $giftItem;
        $this->totalQty++;
        $this->totalPrice = $this->totalPrice + $giftItem['price'];
    }
     public function subscription($items, $id, $total){
         
         dd($items);
         
     }
    
    

}
