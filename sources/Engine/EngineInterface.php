<?php

declare(strict_types=1);

namespace OCR\Core\Engine;

use OCR\Core\Language\LanguageInterface;
use SplFileInfo;

interface EngineInterface
{
    public function getLanguage(): ?LanguageInterface;

    public function setLanguage(?LanguageInterface $language): self;

    public function getDetectOrientation(): bool;

    public function setDetectOrientation(bool $detectOrientation): self;

    public function recognize(SplFileInfo $file): string;
}
