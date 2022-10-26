<?php

namespace Evosite\Laraberg\Blocks;

class ContentRenderer
{

    public function __construct(private BlockParser $parser)
    {
    }

    public function render(string $content): string
    {
        $output = '';
        $blocks = $this->parser->parse($content);

        foreach ($blocks as $block) {
            $output .= $block->render();
        }

        return $output;
    }
}
