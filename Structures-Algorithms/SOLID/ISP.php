<?php

/**
 * Interface segregation principle
 */

// Bad example

class DOMtraverser
{
    private $settings;
    private $rootNote;

    public function __construct(Settings $settings)
    {
        $this->settings = $settings;
        $this->init();
    }

    private function init(): void
    {
        $this->rootNote = $this->settings->rootNote;
        $this->settings->module->init();
    }

    public function animate(): void
    {
        $this->settings->module->render();
        //...
    }

    public function traverse(): void
    {
        //...
    }
}

class Settings
{
    public string $rootNode;
    public AnimationModule $module;

    public function __construct(string $rootNode, AnimationModule $module)
    {
        $this->rootNode = $rootNode;
        $this->module = $module;
    }
}

class AnimationModule
{
    public function init(): void
    {
        // ...
    }
    public function render(): void
    {

    }
}

$man = new DOMtraverser(
    new Settings(
        'body',
        new AnimationModule(), // we don't need this in method traverse()
    )
);

// Better example

class DOMtraverser
{
    private $settings;
    private $rootNote;
    private $options;

    public function __construct(Settings $settings)
    {
        $this->settings = $settings;
        $this->options = $settings->options;
        $this->init();
    }

    private function init(): void
    {
        $this->rootNote = $this->settings->rootNote;
        $this->setupOptions();
    }

    private function setupOptions(): void
    {
        if ($this->options->module) {
            // ...
        }
    }

    public function animate(): void
    {
        //...
    }

    public function traverse(): void
    {
        //...
    }
}

class Settings
{
    public string $rootNode;
    public Options $options;

    public function __construct(string $rootNode, Options $options = null)
    {
        $this->rootNode = $rootNode;
        $this->options = $options;
    }
}

class Options
{
    public AnimationModule $module;

    public function __construct(AnimationModule $module = null /*...*/)
    {
        $this->module = $module;
    }
}

class AnimationModule
{
    public function init(): void
    {
        // ...
    }
    public function render(): void
    {

    }
}

$man = new DOMtraverser(
    new Settings('body', null)
);
