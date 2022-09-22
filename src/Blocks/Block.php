<?php

namespace RobChett\Laraberg\Blocks;

use RobChett\Laraberg\Services\OEmbedService;

class Block
{
    protected BlockTypeRegistry $registry;
    protected OEmbedService $embedService;

    public function __construct(
        public string $blockName,
        public array $attributes = [],
        public array $innerBlocks = [],
        public string $innerHTML = '',
        public array $innerContent = []
    ) {
        $this->registry = app('laraberg.registry');
        $this->embedService = app('laraberg.embed');
    }

    public function render(): string
    {
        $output = '';

        foreach ($this->innerContent as $innerContent) {
            $output .= is_string($innerContent)
                ? $innerContent
                : $this->innerBlocks[$index++]->render();
        }

        $blockType = $this->registry->getBlockType($this->blockName);
        if ($blockType && $blockType->isDynamic()) {
            $output = call_user_func($blockType->renderCallback, $this->attributes, $output, $this);
        }

        if ($this->blockName === 'core/embed') {
            $output = $this->embed($output);
        }

        return $output;
    }

    public function embed(string $content): string
    {
        $embed = $this->embedService->parse($this->attributes['url']);

        return str_replace(
            htmlspecialchars($this->attributes['url']),
            $embed['html'],
            $content
        );
    }

    public static function fromArray(array $args): Block
    {
        $innerBlocks = [];
        foreach ($args['innerBlocks'] ?? [] as $innerBlock) {
            $innerBlocks[] = static::fromArray($innerBlock);
        }

        return new static(
            $args['blockName'] ?? '',
            $args['attrs'] ?? [],
            $innerBlocks,
            $args['innerHTML'] ?? '',
            $args['innerContent'] ?? []
        );
    }
}
