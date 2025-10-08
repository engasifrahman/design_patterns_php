<?php

namespace DesignPatterns\Creational\AbstractFactory;

class MacCheckbox implements ICheckbox {
    public function render(): void {
        echo "Rendering Mac Checkbox\n";
    }
}
