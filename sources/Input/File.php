<?php

declare(strict_types=1);

namespace OCR\Input;

use OCR\Exception\Exception;

class File extends AbstractInput
{
    private string $path;

    public function __construct(string $path)
    {
        $this->path = $path;

        parent::__construct();
    }

    protected function createStream()
    {
        $stream = fopen($this->path, 'r');
        if (!$stream) {
            throw new Exception('Could not open the stream');
        }

        return $stream;
    }
}
