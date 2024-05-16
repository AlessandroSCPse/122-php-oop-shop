<?php
class Category {
    public $name;
    public $image;

    public function __construct($_name, $_image) {
        $this->name = $_name;
        $this->image = $_image;
    }
}
?>