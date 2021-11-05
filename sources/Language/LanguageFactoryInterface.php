<?php

declare(strict_types=1);

namespace OCR\Core\Language;

interface LanguageFactoryInterface
{
    /**
     * Creates a language instance from a IETF language tag.
     *
     * @param string $tag IETF language tag
     *
     * @return LanguageInterface a language instance
     */
    public function createLanguage(string $tag): LanguageInterface;
}
