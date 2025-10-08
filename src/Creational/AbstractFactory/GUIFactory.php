<?php

namespace DesignPatterns\Creational\AbstractFactory;

// Abstract Factory interface
interface GUIFactory {
    public function createButton(): IButton;
    public function createCheckbox(): ICheckbox;
}