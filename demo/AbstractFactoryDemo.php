<?php

require_once __DIR__ . '/../vendor/autoload.php';

use DesignPatterns\Creational\AbstractFactory\GUIFactory;
use DesignPatterns\Creational\AbstractFactory\MacFactory;
use DesignPatterns\Creational\AbstractFactory\WindowsFactory;

class AbstractFactoryDemo
{
    /**
     * Run the complete Abstract Factory pattern demonstration.
     *
     * @return void
     */
    public function run(): void
    {
        $this->showHeader();

        $this->demonstrateWindowsFactory();
        $this->demonstrateMacFactory();

        $this->showFooter();
    }

    /**
     * Display demonstration header.
     *
     * @return void
     */
    private function showHeader(): void
    {
        echo "============================================\n";
        echo "    ABSTRACT FACTORY PATTERN DEMONSTRATION  \n";
        echo "============================================\n\n";
    }

    /**
     * Demonstrate UI creation using WindowsFactory.
     *
     * @return void
     */
    private function demonstrateWindowsFactory(): void
    {
        echo "1. Windows Factory Demonstration:\n";
        echo "=================================\n";

        $factory = new WindowsFactory();
        $this->renderUI($factory);

        echo "\n";
    }

    /**
     * Demonstrate UI creation using MacFactory.
     *
     * @return void
     */
    private function demonstrateMacFactory(): void
    {
        echo "2. Mac Factory Demonstration:\n";
        echo "============================\n";

        $factory = new MacFactory();
        $this->renderUI($factory);

        echo "\n";
    }

    /**
     * Render a complete UI using the provided factory.
     *
     * @param GUIFactory $factory
     * @return void
     */
    private function renderUI(GUIFactory $factory): void
    {
        $button = $factory->createButton();
        $checkbox = $factory->createCheckbox();

        echo "Creating UI components...\n";
        $button->render();
        $checkbox->render();
    }

    /**
     * Display demonstration footer.
     *
     * @return void
     */
    private function showFooter(): void
    {
        echo "============================================\n";
        echo "✅ Abstract Factory pattern demo completed! ✅\n";
        echo "============================================\n";
    }
}


// Run demonstration
$demo = new AbstractFactoryDemo();
$demo->run();