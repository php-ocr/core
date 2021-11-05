<?php

declare(strict_types=1);

namespace OCR\Language;

interface LanguageInterface
{
    /**
     * Returns a string representation of a language.
     *
     * @return string a string representation of a language
     */
    public function toString(): string;
}
