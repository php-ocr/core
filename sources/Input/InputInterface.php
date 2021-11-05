<?php

declare(strict_types=1);

namespace OCR\Input;

interface InputInterface
{
    /**
     * @return resource
     */
    public function getStream();
}
