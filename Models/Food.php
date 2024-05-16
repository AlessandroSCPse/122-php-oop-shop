<?php
require_once __DIR__ . '/Product.php';

class Food extends Product {
    public $weight;
    public $ingredients;

    public function __construct($_name, $_price, $_category, $_ingredients) {
        parent::__construct($_name, $_price, $_category);
        $this->ingredients = $_ingredients;
    }
}
?>
