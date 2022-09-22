<?php

namespace RobChett\Laraberg\Blocks;

class BlockParser
{

    protected WordpressBlockParser $parser;

    public function __construct(WordpressBlockParser $parser)
    {
        $this->parser = $parser;
    }

    /**
     * @return Block[]
     */
    public function parse(string $content): array
    {
        $blocks = $this->parser->parse($content);

        return array_map(fn($block) => Block::fromArray((array) $block), $blocks);
    }
}
