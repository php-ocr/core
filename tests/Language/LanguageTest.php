<?php

declare(strict_types=1);

namespace OCR\Test\Core\Language;

use OCR\Core\Language\Language;
use OCR\Core\Language\LanguageInterface;
use PHPUnit\Framework\TestCase;

class LanguageTest extends TestCase
{
    public function testClassImplementsExceptionInterface(): void
    {
        $language = new Language('en-US');

        $this->assertInstanceOf(LanguageInterface::class, $language);
    }

    /**
     * @dataProvider providerToStringReturnsValueFromConstructor
     */
    public function testToStringReturnsValueFromConstructor(string $tag): void
    {
        $language = new Language($tag);

        $string = $language->toString();

        $this->assertSame($tag, $string);
    }

    /**
     * @return mixed[]
     */
    public function providerToStringReturnsValueFromConstructor(): array
    {
        return [
            [
                'en-US',
            ],
            [
                'ru-RU',
            ],
            [
                'fr-FR',
            ],
        ];
    }
}
