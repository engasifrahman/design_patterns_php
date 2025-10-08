<?php

namespace DesignPatterns\Creational\AbstractFactory;

// Concrete product implementations (Windows)
class WindowsButton implements IButton {
    public function render(): void {
        echo "Rendering Windows Button\n";
    }
}