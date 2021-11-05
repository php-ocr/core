<?php

declare(strict_types=1);

namespace OCR\Engine;

use OCR\Input\InputInterface;
use OCR\Language\LanguageInterface;

interface EngineInterface
{
    public function getLanguage(): ?LanguageInterface;

    public function setLanguage(?LanguageInterface $language): self;

    public function getDetectOrientation(): bool;

    public function setDetectOrientation(bool $detectOrientation): self;

    public function process(InputInterface $input): string;
}
