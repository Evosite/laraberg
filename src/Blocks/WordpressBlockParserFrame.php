<?php

namespace RobChett\Laraberg\Blocks;

/**
 * Holds partial blocks in memory while parsing
 */
class WordpressBlockParserFrame
{

    /**
     * Full or partial block
     * @var WordpressBlockParserBlock
     */
    public WordpressBlockParserBlock $block;

    /**
     * Byte offset into document for start of parse token
     */
    public int $token_start;

    /**
     * Byte length of entire parse token string
     */
    public int $token_length;

    /**
     * Byte offset into document for after parse token ends
     * (used during reconstruction of stack into parse production)
     */
    public int $prev_offset;

    /**
     * Byte offset into document where leading HTML before token starts
     */
    public int $leading_html_start;

    /**
     * @param  WordpressBlockParserBlock  $block  Full or partial block.
     * @param  int  $token_start  Byte offset into document for start of parse token.
     * @param  int  $token_length  Byte length of entire parse token string.
     * @param  int  $prev_offset  Byte offset into document for after parse token ends.
     * @param  int  $leading_html_start  Byte offset into document where leading HTML before token starts.
     */
    public function __construct(
        WordpressBlockParserBlock $block,
        int $token_start,
        int $token_length,
        ?int $prev_offset = null,
        ?int $leading_html_start = null
    ) {
        $this->block = $block;
        $this->token_start = $token_start;
        $this->token_length = $token_length;
        $this->prev_offset = $prev_offset ?? $token_start + $token_length;
        $this->leading_html_start = $leading_html_start;
    }
}