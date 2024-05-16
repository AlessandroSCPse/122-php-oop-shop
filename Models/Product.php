<?php
class Product {

    public $name;
    public $description;
    public $price;
    public $image;
    public $category;

    public function __construct($_name, $_price, Category $_category) {
        $this->name = $_name;
        $this->price = $_price;
        $this->category = $_category;
    }
}
?>