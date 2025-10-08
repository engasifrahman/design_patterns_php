<?php

namespace DesignPatterns\Creational\AbstractFactory;

class WindowsCheckbox implements ICheckbox {
    public function render(): void {
        echo "Rendering Windows Checkbox\n";
    }
}