<?php

namespace Evosite\Laraberg\Blocks;

class BlockType
{
    /** @var ?callable */
    public $renderCallback;

    public function __construct(
        public string $name,
        public array $attributes = [],
        ?callable $renderCallback = null
    ) {
        $this->renderCallback = $renderCallback;
    }

    public function isDynamic(): bool
    {
        return is_callable($this->renderCallback);
    }
}
