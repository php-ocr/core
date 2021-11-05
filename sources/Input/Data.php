<?php

declare(strict_types=1);

namespace OCR\Input;

use OCR\Exception\Exception;

class Data extends AbstractInput
{
    private string $data;

    public function __construct(string $data)
    {
        $this->data = $data;

        parent::__construct();
    }

    protected function createStream()
    {
        $stream = fopen('php://memory', 'r+');
        if (!$stream) {
            throw new Exception('Could not open the stream');
        }

        $wrote = fwrite($stream, $this->data);
        if (!$wrote) {
            throw new Exception('Could not write to the stream.');
        }

        $rewound = rewind($stream);
        if (!$rewound) {
            throw new Exception('Could not rewind the stream.');
        }

        return $stream;
    }
}
