<?php

namespace App\Models;

class Cart
{
    protected $items = null;
    protected $totalQty;
    protected $totalPrice;

    public function __construct ($oldCart) 
    {
        if ($oldCart) {
            $this->items = $oldCart->items; // cái này là lưu nguyên cái giỏ hàng
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
        }
    }

    public function add ($product, $id)
    {
        $storedItem = ['qty' => 0, 'price' => $product->price];
        
        if ($this->items) {
            if (array_key_exists($id, $this->items)) {
                $storedItem = $this->items[$id];
            }
        
        }
        $storedItem['qty']++; // nếu như trong giỏ hàng đã có item này. thì sẽ +1
        $storedItem['price'] = $product->price*$storedItem['qty']; // nếu như đã có item. thì sẽ tính lại price

        $this->items[$id] = $storedItem; // lưu lại item mới vs key = $id
        $this->totalQty++; // tăng số lượng giỏ hàng lên 1
        $this->totalPrice += $product->price; // tính lại tổng giá giỏ hàng
    }
}
