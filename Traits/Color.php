<?php
trait Color {
    protected $color;

    public function getColor() {
        return $this->color;
    }

    public function setColor($newColor) {
        $this->color = $newColor;
    }
}
?>
