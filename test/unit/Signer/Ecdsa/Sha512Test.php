<?php
declare(strict_types=1);

namespace Lcobucci\JWT\Signer\Ecdsa;

use PHPUnit\Framework\TestCase;

use const OPENSSL_ALGO_SHA512;

/** @coversDefaultClass \Lcobucci\JWT\Signer\Ecdsa\Sha512 */
final class Sha512Test extends TestCase
{
    /**
     * @test
     *
     * @covers \Lcobucci\JWT\Signer\Ecdsa::create
     * @covers \Lcobucci\JWT\Signer\Ecdsa::__construct
     *
     * @uses \Lcobucci\JWT\Signer\Ecdsa\MultibyteStringConverter
     */
    public function createShouldReturnAValidInstance(): void
    {
        $signer = Sha512::create();

        self::assertInstanceOf(Sha512::class, $signer);
    }

    /**
     * @test
     *
     * @covers ::getAlgorithmId
     *
     * @uses \Lcobucci\JWT\Signer\Ecdsa
     */
    public function getAlgorithmIdMustBeCorrect(): void
    {
        self::assertSame('ES512', $this->getSigner()->getAlgorithmId());
    }

    /**
     * @test
     *
     * @covers ::getAlgorithm
     *
     * @uses \Lcobucci\JWT\Signer\Ecdsa
     */
    public function getAlgorithmMustBeCorrect(): void
    {
        self::assertSame(OPENSSL_ALGO_SHA512, $this->getSigner()->getAlgorithm());
    }

    /**
     * @test
     *
     * @covers ::getKeyLength
     *
     * @uses \Lcobucci\JWT\Signer\Ecdsa
     */
    public function getKeyLengthMustBeCorrect(): void
    {
        self::assertSame(132, $this->getSigner()->getKeyLength());
    }

    private function getSigner(): Sha512
    {
        return new Sha512($this->createMock(SignatureConverter::class));
    }
}
