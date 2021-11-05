<?php

declare(strict_types=1);

namespace OCR\Input;

use OCR\Exception\Exception;
use Throwable;

abstract class AbstractInput implements InputInterface
{
    /**
     * @var resource|null
     */
    protected $stream;

    public function __construct()
    {
        $this->stream = $this->createStream();
    }

    public function __destruct()
    {
        $this->closeStream();
    }

    /**
     * {@inheritdoc}
     */
    public function getStream()
    {
        if (!$this->stream) {
            throw new Exception('Stream has not been initialized.');
        }

        return $this->stream;
    }

    /**
     * @return resource
     */
    abstract protected function createStream();

    private function closeStream(): void
    {
        if (!$this->stream) {
            return;
        }

        try {
            $stream = $this->stream;
            fclose($stream);
        } catch (Throwable $error) { // @phan-suppress-current-line PhanUnusedVariableCaughtException
            // Seems like the stream has already been closed.
            // Nothing to do here.
        }
    }
}
