<?php
/**
 * 購物車測試
 */
class CartTest extends PHPUnit_Framework_TestCase
{
    public function __construct()
    {
        xdebug_disable();
    }

    public function test_buy_bookNo1_quantity_is_1_total_should_be_100()
    {
        // arrange
        $target = new Cart();
        $product = ['no' => 1, 'price' => 100];
        $quantity = 1;
        $target->addProduct($product, $quantity);
        $expected = 100;

        // act
        $actual = $target->calculateTotal();

        // assert
        $this->assertEquals($expected, $actual);
    }

    public function test_buy_bookNo1_quantity_is_1_and_BookNo2_quantity_is_1_total_should_be_190()
    {
        // arrange
        $target = new Cart();
        
        $product = ['no' => 1, 'price' => 100];
        $quantity = 1;
        $target->addProduct($product, $quantity);

        $product = ['no' => 2, 'price' => 100];
        $quantity = 1;
        $target->addProduct($product, $quantity);
        
        $expected = 190;

        // act
        $actual = $target->calculateTotal();

        // assert
        $this->assertEquals($expected, $actual);
    }

    public function test_buy_bookNo1_quantity_is_1_and_BookNo2_quantity_is_1_and_BookNo3_quantity_is_1_total_should_be_270()
    {
        // arrange
        $target = new Cart();
        
        $product = ['no' => 1, 'price' => 100];
        $quantity = 1;
        $target->addProduct($product, $quantity);

        $product = ['no' => 2, 'price' => 100];
        $quantity = 1;
        $target->addProduct($product, $quantity);
        
        $product = ['no' => 3, 'price' => 100];
        $quantity = 1;
        $target->addProduct($product, $quantity);
        
        $expected = 270;

        // act
        $actual = $target->calculateTotal();

        // assert
        $this->assertEquals($expected, $actual);
    }

    public function test_buy_bookNo1_quantity_is_1_and_BookNo2_quantity_is_1_and_BookNo3_quantity_is_1_and_BookNo4_quantity_is_1_total_should_be_320()
    {
        // arrange
        $target = new Cart();
        
        $product = ['no' => 1, 'price' => 100];
        $quantity = 1;
        $target->addProduct($product, $quantity);

        $product = ['no' => 2, 'price' => 100];
        $quantity = 1;
        $target->addProduct($product, $quantity);
        
        $product = ['no' => 3, 'price' => 100];
        $quantity = 1;
        $target->addProduct($product, $quantity);

        $product = ['no' => 4, 'price' => 100];
        $quantity = 1;
        $target->addProduct($product, $quantity);
        
        $expected = 320;

        // act
        $actual = $target->calculateTotal();

        // assert
        $this->assertEquals($expected, $actual);
    }

    public function test_buy_bookNo1_quantity_is_1_and_BookNo2_quantity_is_1_and_BookNo3_quantity_is_1_and_BookNo4_quantity_is_1_and_BookNo5_quantity_is_1_total_should_be_375()
    {
        // arrange
        $target = new Cart();
        
        $product = ['no' => 1, 'price' => 100];
        $quantity = 1;
        $target->addProduct($product, $quantity);

        $product = ['no' => 2, 'price' => 100];
        $quantity = 1;
        $target->addProduct($product, $quantity);
        
        $product = ['no' => 3, 'price' => 100];
        $quantity = 1;
        $target->addProduct($product, $quantity);

        $product = ['no' => 4, 'price' => 100];
        $quantity = 1;
        $target->addProduct($product, $quantity);
        
        $product = ['no' => 5, 'price' => 100];
        $quantity = 1;
        $target->addProduct($product, $quantity);
        
        $expected = 375;

        // act
        $actual = $target->calculateTotal();

        // assert
        $this->assertEquals($expected, $actual);
    }

    public function test_buy_bookNo1_quantity_is_1_and_BookNo2_quantity_is_1_and_BookNo3_quantity_is_2_total_should_be_370()
    {
        // arrange
        $target = new Cart();
        
        $product = ['no' => 1, 'price' => 100];
        $quantity = 1;
        $target->addProduct($product, $quantity);

        $product = ['no' => 2, 'price' => 100];
        $quantity = 1;
        $target->addProduct($product, $quantity);
        
        $product = ['no' => 3, 'price' => 100];
        $quantity = 2;
        $target->addProduct($product, $quantity);
        
        $expected = 370;

        // act
        $actual = $target->calculateTotal();

        // assert
        $this->assertEquals($expected, $actual);
    }

    public function test_buy_bookNo1_quantity_is_1_and_BookNo2_quantity_is_2_and_BookNo3_quantity_is_2_total_should_be_460()
    {
        // arrange
        $target = new Cart();
        
        $product = ['no' => 1, 'price' => 100];
        $quantity = 1;
        $target->addProduct($product, $quantity);

        $product = ['no' => 2, 'price' => 100];
        $quantity = 2;
        $target->addProduct($product, $quantity);
        
        $product = ['no' => 3, 'price' => 100];
        $quantity = 2;
        $target->addProduct($product, $quantity);
        
        $expected = 460;

        // act
        $actual = $target->calculateTotal();

        // assert
        $this->assertEquals($expected, $actual);
    }

    public function test_buy_bookNo1_quantity_is_2_and_BookNo2_quantity_is_2_total_should_be_380()
    {
        // arrange
        $target = new Cart();
        
        $product = ['no' => 1, 'price' => 100];
        $quantity = 2;
        $target->addProduct($product, $quantity);

        $product = ['no' => 2, 'price' => 100];
        $quantity = 2;
        $target->addProduct($product, $quantity);
        
        $expected = 380;

        // act
        $actual = $target->calculateTotal();

        // assert
        $this->assertEquals($expected, $actual);
    }
}