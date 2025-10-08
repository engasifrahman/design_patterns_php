<?php

namespace DesignPatterns\Creational\AbstractFactory;

// Concrete product implementations (Mac)
class MacButton implements IButton {
    public function render(): void {
        echo "Rendering Mac Button\n";
    }
}