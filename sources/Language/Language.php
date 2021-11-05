<?php

declare(strict_types=1);

namespace OCR\Language;

class Language implements LanguageInterface
{
    private string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * {@inheritdoc}
     */
    public function toString(): string
    {
        return $this->name;
    }
}
