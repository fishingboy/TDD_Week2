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
        // 先計算折扣
        $total = $this->discount();

        // 剩下的照訂價算
        foreach ($this->products as $order) {
            $total += $order['product']['price'] * $order['quantity'];
        }
        return $total;
    }

    /**
     * 計算折扣
     * 1. 兩本 95 折
     */
    private function discount()
    {
        $total = 0;

        // 尋找折扣組合
        do
        {
            $find_discount_group = false;
            $discount_groups = [];
            foreach ($this->products as $index => $order) {
                if ($order['quantity'] <= 0) {
                    continue;
                }

                // 加入折扣組合
                $discount_groups[] = [
                    'product' => $order['product'], 
                    'index' => $index
                ];


                if (count($discount_groups) >= 3) break;
            }            

            if (count($discount_groups) == 3) {
                $find_discount_group = true;

                // 計算折扣的價錢
                foreach ($discount_groups as $discount_group) {
                    // 95 折
                    $total += $discount_group['product']['price'] * 0.9;

                    // 打完折從購物車拿掉
                    $remove_index = $discount_group['index'];
                    $this->products[$remove_index]['quantity']--;  
                }
            } elseif (count($discount_groups) == 2) {
                // 如果找到兩本就打 95 折

                $find_discount_group = true;

                // 計算折扣的價錢
                foreach ($discount_groups as $discount_group) {
                    // 95 折
                    $total += $discount_group['product']['price'] * 0.95;

                    // 打完折從購物車拿掉
                    $remove_index = $discount_group['index'];
                    $this->products[$remove_index]['quantity']--;  
                }
            }
        } while($find_discount_group);

        return $total;
    }
}