<?php


class CartItem
{
    private Product $product;
    private int $quantity;

    // TODO Generate constructor with all properties of the class
    public function __construct(Product $product, int $quantity)
    {
        $this->product = $product;
        $this->quantity = $quantity;
    }
    // TODO Generate getters and setters of properties
    public function setProduct(Product $product)
    {
        $this->product = $product;
    }
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }
    public function getProduct()
    {
        return $this->product;
    }
    public function getQuantity()
    {
        return $this->quantity;
    }
    public function increaseQuantity($quantity = 1)
    {
        //TODO $quantity must be increased by one.
        // Bonus: $quantity must not become more than whatever is Product::$availableQuantity
        if ($quantity <= $this->product->getAvailableQuantity()) {
            $this->quantity += $quantity;
            $this->product->setAvailableQuantity($this->product->getAvailableQuantity() - $quantity);
        } else
            return false;
    }

    public function decreaseQuantity($quantity)
    {
        //TODO $quantity must be increased by one.
        // Bonus: Quantity must not become less than 1
        if ($this->quantity - $quantity > 0) {
            $this->quantity -= $quantity;
            $this->product->setAvailableQuantity($this->product->getAvailableQuantity() + $quantity);
        } else
            return false;
    }
}
