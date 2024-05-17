<?php
require_once __DIR__ . '/Product.php';
require_once __DIR__ . '/../Traits/Color.php';

class Kennel extends Product {
    use Color;

    public $size;
}

?>