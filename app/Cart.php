<?php

namespace App;

class Cart
{
	public $items = null;
	public $totalQuantity = 0;
	public $totalPrice = 0;
	public $product_name;

	public function __construct($oldCart) {
		if($oldCart) {
			$this->product_name = $oldCart->product_name;
			$this->items = $oldCart->items;
			$this->totalQuantity = $oldCart->totalQuantity;
			$this->totalPrice = $oldCart->totalPrice;
		}
	}

	public function add($item, $id) {
		$storedItem = ['qty' => 0, 'price' => 0, 'item' => $item, 'product_name' => $item->product_name];
		if($this->items) {
			if(array_key_exists($id, $this->items)) {
				$storedItem = $this->items[$id];
			}
		}
		$storedItem['qty']++;
		$storedItem['price'] = $item->price * $storedItem['qty'];
		$this->items[$id] = $storedItem;
		$this->totalQuantity++;
		$this->totalPrice += $item->price;
		$this->product_name = $item->product_name;
	}
 
}
