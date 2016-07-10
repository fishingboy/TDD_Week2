<?php
class Cart 
{
    private $products = [];

    /**
     * 加入購物車
     */
    public function addProduct($product, $quantity)
    {
        $this->products[] = [
            'product'  => $product,
            'quantity' => $quantity
        ];    
    }

    /**
     * 計算總金額
     */
    public function calculateTotal()
    {
        $total = 0;
        foreach ($this->products as $order) {
            $total += $order['product']['price'] * $order['quantity'];
        }
        return $total;
    }
}