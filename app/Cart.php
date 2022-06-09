<?php
  namespace App;

  class Cart {
    public $items = null;
    public $totalQty = 0;
    public $totalPrice = 0;

    public function __construct($oldCart) {
      
      if ($oldCart) {
        $this->items = $oldCart->items;
        $this->totalQty = $oldCart->totalQty;
        $this->totalPrice = $oldCart->totalPrice;
      }
    }

    public function add($item, $product_id) {
      // Initialize the content of a cart item
      $storedItem = [
        'qty' => 0, 
        'product_id' => 0, 
        'product_name' => $item->product_name, 
        'product_price' => $item->product_price, 
        'product_description' => $item->product_description, 
        'product_image' => $item->product_image, 
        'item' => $item
      ];

      // check if the product already exist in cart
      if($this->items) {
        if(array_key_exists($product_id, $this->items)) {
          $storedItem = $this->items($product_id);
        }
      }

      // Add the product to cart or increase qty, totalQty and Total Price
      $storedItem['qty']++;
      $storedItem['product_id'] = $product_id;
      $storedItem['product_name'] = $item->product_name;
      $storedItem['product_price'] = $item->product_price;
      $storedItem['product_description'] = $item->product_description;
      $storedItem['product_image'] = $item->product_image;
      
      
      $this->totalQty++;
      $this->totalPrice += $item->product_price;
      $this->items[$product_id] = $storedItem;
    }
  }
?>