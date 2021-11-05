<?php

declare(strict_types=1);

namespace OCR\Test\Core\Exception;

use Exception as BaseException;
use OCR\Core\Exception\Exception;
use OCR\Core\Exception\ExceptionInterface;
use PHPUnit\Framework\TestCase;

class ExceptionTest extends TestCase
{
    public function testClassImplementsExceptionInterface(): void
    {
        $exception = new Exception();

        $this->assertInstanceOf(ExceptionInterface::class, $exception);
    }

    public function testClassExtendsBaseException(): void
    {
        $exception = new Exception();

        $this->assertInstanceOf(BaseException::class, $exception);
    }
}
