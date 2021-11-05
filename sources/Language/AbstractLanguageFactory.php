<?php

declare(strict_types=1);

namespace OCR\Language;

use OCR\Exception\Exception;

abstract class AbstractLanguageFactory implements LanguageFactoryInterface
{
    public function createLanguage(string $tag): LanguageInterface
    {
        $languages = $this->getLanguages();

        if (!isset($languages[$tag])) {
            throw new Exception('Language is not supported.');
        }

        $language = $languages[$tag];
        $language = new Language($language);

        return $language;
    }

    /**
     * Returns a map of IETF language tags to engine languages.
     *
     * @return array<string, string> a map of IETF language tags to engine languages
     */
    abstract protected function getLanguages(): array;
}
