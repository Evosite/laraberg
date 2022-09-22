<?php

namespace RobChett\Laraberg\Blocks;

/**
 * Holds the block structure in memory
 */
class WordpressBlockParserBlock
{

    /**
     * Name of block
     * @example "core/paragraph"
     */
    public string $blockName;

    /**
     * Optional set of attributes from block comment delimiters
     * @example null
     * @example array( 'columns' => 3 )
     */
    public ?array $attrs;

    /**
     * List of inner blocks (of this same class)
     * @var WordpressBlockParserBlock[]
     */
    public array $innerBlocks;

    /**
     * Resultant HTML from inside block comment delimiters
     * after removing inner blocks
     * @example "...Just <!-- wp:test /--> testing..." -> "Just testing..."
     * @var string
     */
    public string $innerHTML;

    /**
     * List of string fragments and null markers where inner blocks were found
     *
     * @example array(
     *   'innerHTML'    => 'BeforeInnerAfter',
     *   'innerBlocks'  => array( block, block ),
     *   'innerContent' => array( 'Before', null, 'Inner', null, 'After' ),
     * )
     */
    public array $innerContent;

    /**
     * @param  string  $name  Name of block.
     * @param  array  $attrs  Optional set of attributes from block comment delimiters.
     * @param  array  $innerBlocks  List of inner blocks (of this same class).
     * @param  string  $innerHTML  Resultant HTML from inside block comment delimiters after removing inner blocks.
     * @param  array  $innerContent  List of string fragments and null markers where inner blocks were found.
     */
    public function __construct(string $name, array $attrs, array $innerBlocks, string $innerHTML, array $innerContent)
    {
        $this->blockName = $name;
        $this->attrs = $attrs;
        $this->innerBlocks = $innerBlocks;
        $this->innerHTML = $innerHTML;
        $this->innerContent = $innerContent;
    }
}
