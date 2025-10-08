<?php

namespace DesignPatterns\Creational\AbstractFactory;

// Concrete factories
class WindowsFactory implements GUIFactory {
    public function createButton(): IButton {
        return new WindowsButton();
    }
    public function createCheckbox(): ICheckbox {
        return new WindowsCheckbox();
    }
}