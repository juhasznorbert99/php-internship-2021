<?php

namespace App\Repositories;

class Cart
{
    protected array $addedToCart;

    public function __construct()
    {
        $this->addedToCart = [];
    }

    public function __call($method, $args)
    {
        return $this;
    }

    public function addToCart($productId) {
        if (!in_array($productId, $this->addedToCart))
        {
            $this->addedToCart[$productId] = 1;
        }

    }

    public function getCart() {


        return($this->addedToCart);
    }

    public function numberOfItems() {
        $number = 0;
        foreach ($this->addedToCart as $quantity) {
            $number += $quantity;
        }
        return $quantity;
    }


}