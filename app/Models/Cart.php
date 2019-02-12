<?php

namespace App\Models;

class Cart
{
    public $items = null;
    public $totalQty = 0;
    public $totalPrice = 0;

    /**
     * Undocumented function
     *
     * @param [type] $oldCart
     */
    public function __construct ($oldCart) 
    {
        if ($oldCart) {
            $this->items = $oldCart->items; // cái này là lưu nguyên cái giỏ hàng
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
        }
    }

    /**
     * Undocumented function
     *
     * @param [type] $product
     * @param [type] $id
     * @return void
     */
    public function add ($product, $id)
    {
        $storedItem = ['qty' => 0, 'price' => $product->price, 'name' => $product->name, 'img' => $product->img];
        
        if ($this->items) {
            if (array_key_exists($id, $this->items)) {
                $storedItem = $this->items[$id];
            }
        }
        $storedItem['qty']++; 
        $storedItem['price'] = $product->price*$storedItem['qty']; 

        $this->items[$id] = $storedItem; 
        $this->totalQty++;
        $this->totalPrice += $product->price;
    }
}
