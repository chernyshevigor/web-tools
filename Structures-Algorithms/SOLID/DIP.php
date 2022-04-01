<?php

/**
 * Dependency inversion principle
 */

// Bad example

class InventoryRequester
{
    public function __construct()
    {
        $this->reqMethods = ['HTTP'];
    }

    public function requestItem($item)
    {
        //...
    }
}

class InventoryTracker
{
    private array $items;

    public function __construct(array $items)
    {
        $this->items = $items;
        $this->requester = new InventoryRequester(); // created a dependency on a specific request implementation
    }

    public function requestItems(): void
    {
        foreach ($this->items as $item) {
            $this->requester->requestItem($item);
        }
    }
}

// Better example

class InventoryTracker
{
    private array $items;

    public function __construct(array $items, InventoryRequesterContract $requester)
    {
        $this->items = $items;
        $this->requester = $requester;
    }

    public function requestItems(): void
    {
        foreach ($this->items as $item) {
            $this->requester->requestItem($item);
        }
    }
}

interface InventoryRequesterContract
{
    public function requestItem($item);
}

class InventoryRequesterV1 implements InventoryRequesterContract
{
    public function __construct()
    {
        $this->reqMethods = ['HTTP'];
    }

    public function requestItem($item)
    {
        //...
    }
}

class InventoryRequesterV2 implements InventoryRequesterContract
{
    public function __construct()
    {
        $this->reqMethods = ['WS'];
    }

    public function requestItem($item)
    {
        //...
    }
}
