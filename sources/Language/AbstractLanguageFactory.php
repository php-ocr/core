<?php

declare(strict_types=1);

namespace OCR\Language;

use OCR\Exception\Exception;

abstract class AbstractLanguageFactory implements LanguageFactoryInterface
{
    public function createLanguage(string $tag): LanguageInterface
    {
        $languages = $this->getLanguages();
        $language = $this->getLanguage($tag);

        if (!isset($languages[$language])) {
            throw new Exception('Language is not supported.');
        }

        $language = $languages[$language];
        $language = new Language($language);

        return $language;
    }

    /**
     * Returns a map of IETF language tags to engine languages.
     *
     * @return array<string, string> a map of IETF language tags to engine languages
     */
    abstract protected function getLanguages(): array;

    private function getLanguage(string $tag): string
    {
        $pattern = '/^(.*?)(-|$)/ui';
        $result = preg_match($pattern, $tag, $matches);
        if (!$result) {
            throw new Exception('Invalid language tag provided.');
        }

        $language = $matches[1];

        return $language;
    }
}
