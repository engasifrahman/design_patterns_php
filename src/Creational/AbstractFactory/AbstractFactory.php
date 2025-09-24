<?php
namespace DesignPatterns\Creational\AbstractFactory;

// Abstract product interfaces
interface Button {
    public function render(): void;
}

interface Checkbox {
    public function render(): void;
}

// Concrete product implementations (Windows)
class WindowsButton implements Button {
    public function render(): void {
        echo "Rendering Windows Button\n";
    }
}
class WindowsCheckbox implements Checkbox {
    public function render(): void {
        echo "Rendering Windows Checkbox\n";
    }
}

// Concrete product implementations (Mac)
class MacButton implements Button {
    public function render(): void {
        echo "Rendering Mac Button\n";
    }
}
class MacCheckbox implements Checkbox {
    public function render(): void {
        echo "Rendering Mac Checkbox\n";
    }
}

// Abstract Factory interface
interface GUIFactory {
    public function createButton(): Button;
    public function createCheckbox(): Checkbox;
}

// Concrete factories
class WindowsFactory implements GUIFactory {
    public function createButton(): Button {
        return new WindowsButton();
    }
    public function createCheckbox(): Checkbox {
        return new WindowsCheckbox();
    }
}

class MacFactory implements GUIFactory {
    public function createButton(): Button {
        return new MacButton();
    }
    public function createCheckbox(): Checkbox {
        return new MacCheckbox();
    }
}

// Client code
function renderUI(GUIFactory $factory): void {
    $button = $factory->createButton();
    $checkbox = $factory->createCheckbox();
    $button->render();
    $checkbox->render();
}

// Example usage
renderUI(new WindowsFactory()); 
// Rendering Windows Button
// Rendering Windows Checkbox

renderUI(new MacFactory()); 
// Rendering Mac Button
// Rendering Mac Checkbox
