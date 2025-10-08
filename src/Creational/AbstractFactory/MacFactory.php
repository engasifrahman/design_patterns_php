<?php

namespace DesignPatterns\Creational\AbstractFactory;

class MacFactory implements GUIFactory {
    public function createButton(): IButton {
        return new MacButton();
    }
    public function createCheckbox(): ICheckbox {
        return new MacCheckbox();
    }
}