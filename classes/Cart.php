<?php
class Cart 
{
    /**
     * 購物車中的產品
     * @var array
     */
    private $products = [];

    /**
     * 折扣規則 - 照優先權排序
     * @var array
     */
    private $discount_rules = [
        ['group_size' => 3, 'discount' => 0.9],
        ['group_size' => 2, 'discount' => 0.95],
    ];

    /**
     * 折扣的最大組合數
     * @var integer
     */
    private $max_discount_group_size;

    public function __construct()
    {
        foreach ($this->discount_rules as $rule) {
            if ($rule['group_size'] > $this->max_discount_group_size) {
                $this->max_discount_group_size = $rule['group_size'];
            }
        }
    }

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

                // 超過最大折扣組合數則跳出檢查
                if (count($discount_groups) >= $this->max_discount_group_size) {
                    break;
                }
            }            

            // 判斷是否有符合的折扣規則
            foreach ($this->discount_rules as $discount_rule) {
                if (count($discount_groups) == $discount_rule['group_size']) {
                    $total = $this->calculateDiscount($discount_groups, $discount_rule);
                }
            }
        } while($find_discount_group);

        return $total;
    }

    /**
     * 計算折扣
     */
    private function calculateDiscount($discount_groups, $discount_rule)
    {
        $total = 0;

        // 計算折扣的價錢
        foreach ($discount_groups as $discount_group) {
            // 打折
            $total += $discount_group['product']['price'] * $discount_rule['discount'];

            // 打完折從購物車拿掉
            $remove_index = $discount_group['index'];
            $this->products[$remove_index]['quantity']--;  
        }

        return $total;
    }
}