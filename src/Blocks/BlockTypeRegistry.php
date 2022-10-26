<?php

namespace Evosite\Laraberg\Blocks;

class BlockTypeRegistry
{
    protected static BlockTypeRegistry $instance;

    /** @var BlockType[] */
    protected array $blockTypes = [];

    public static function getInstance(): BlockTypeRegistry
    {
        if (!isset(static::$instance)) {
            static::$instance = new BlockTypeRegistry();
        }

        return static::$instance;
    }

    public function register(string $name, array $attributes = [], callable $renderCallback = null): void
    {
        $this->blockTypes[] = new BlockType($name, $attributes, $renderCallback);
    }

    public function blockTypes(): array
    {
        return $this->blockTypes;
    }

    public function getBlockType(string $name): ?BlockType
    {
        $arr = array_filter($this->blockTypes(), fn($blockType) => $blockType->name === $name);

        return array_shift($arr);
    }
}
