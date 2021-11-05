<?php

declare(strict_types=1);

namespace OCR\Core\Engine;

use OCR\Core\Language\LanguageInterface;

abstract class AbstractEngine implements EngineInterface
{
    private ?LanguageInterface $language;

    private bool $detectOrientation;

    public function __construct()
    {
        $this->language = null;
        $this->detectOrientation = false;
    }

    public function getLanguage(): ?LanguageInterface
    {
        return $this->language;
    }

    public function setLanguage(?LanguageInterface $language): self
    {
        $this->language = $language;

        return $this;
    }

    public function getDetectOrientation(): bool
    {
        return $this->detectOrientation;
    }

    public function setDetectOrientation(bool $detectOrientation): self
    {
        $this->detectOrientation = $detectOrientation;

        return $this;
    }
}
