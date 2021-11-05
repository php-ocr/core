<?php

declare(strict_types=1);

namespace OCR\Test\Core\Engine;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use OCR\Engine\AbstractEngine;
use OCR\Engine\EngineInterface;
use OCR\Language\LanguageInterface;
use PHPUnit\Framework\TestCase;

class AbstractEngineTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    public function testClassImplementsEngineInterface(): void
    {
        $engine = $this->stubEngine();

        $this->assertInstanceOf(EngineInterface::class, $engine);
    }

    public function testGetLanguageReturnsNullByDefault(): void
    {
        $engine = $this->stubEngine();

        $language = $engine->getLanguage();

        $this->assertNull($language);
    }

    public function testGetLanguageReturnsValueFromSetLanguage(): void
    {
        $engine = $this->stubEngine();
        $language = $this->stubLanguage('english');

        $engine->setLanguage($language);
        $language = $engine->getLanguage();

        $string = $language->toString();
        $this->assertSame('english', $string);
    }

    public function testGetDetectOrientationReturnsFalseByDefault(): void
    {
        $engine = $this->stubEngine();

        $detectOrientation = $engine->getDetectOrientation();

        $this->assertFalse($detectOrientation);
    }

    public function testGetDetectOrientationReturnsValueFromSetDetectOrientation(): void
    {
        $engine = $this->stubEngine();

        $engine->setDetectOrientation(true);
        $detectOrientation = $engine->getDetectOrientation();

        $this->assertTrue($detectOrientation);
    }

    private function stubEngine(): EngineInterface
    {
        $engine = Mockery::mock(AbstractEngine::class, [])
            ->makePartial()
        ;

        return $engine;
    }

    private function stubLanguage(string $string): LanguageInterface
    {
        $language = Mockery::mock(LanguageInterface::class);
        $language->allows('toString')->andReturns($string);

        return $language;
    }
}
