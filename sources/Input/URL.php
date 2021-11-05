<?php

declare(strict_types=1);

namespace OCR\Input;

use OCR\Exception\Exception;

class URL extends AbstractInput
{
    private string $url;

    public function __construct(string $url)
    {
        $this->url = $url;

        parent::__construct();
    }

    protected function createStream()
    {
        $stream = fopen($this->url, 'r');
        if (!$stream) {
            throw new Exception('Could not open the stream');
        }

        return $stream;
    }
}
