<?php

declare(strict_types=1);

namespace OCR\Test\Core\Language;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use OCR\Exception\ExceptionInterface;
use OCR\Language\AbstractLanguageFactory;
use OCR\Language\LanguageFactoryInterface;
use PHPUnit\Framework\TestCase;

class AbstractLanguageFactoryTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    public function testClassImplementsLanguageFactoryInterface(): void
    {
        $factory = $this->stubLanguageFactory([]);

        $this->assertInstanceOf(LanguageFactoryInterface::class, $factory);
    }

    public function testUnsupportedLanguageThrowsException(): void
    {
        $factory = $this->stubLanguageFactory([]);

        $this->expectException(ExceptionInterface::class);
        $this->expectExceptionMessage('Language is not supported.');

        $factory->createLanguage('en-US');
    }

    public function testSupportedLanguageReturnsLanguage(): void
    {
        $factory = $this->stubLanguageFactory(['en' => 'english']);

        $language = $factory->createLanguage('en-US');
        $string = $language->toString();

        $this->assertSame('english', $string);
    }

    /**
     * @param array<string, string> $languages
     */
    private function stubLanguageFactory(array $languages): LanguageFactoryInterface
    {
        $factory = Mockery::mock(AbstractLanguageFactory::class, [])
            ->shouldAllowMockingProtectedMethods()
            ->makePartial()
        ;

        $factory
            ->allows('getLanguages')
            ->andReturns($languages)
        ;

        return $factory;
    }
}
