<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;

final class KonversiSuhuTest extends TestCase
{
    #[DataProvider('fahrenheitProvider')]
    public function testCelsiusCanBeConvertedToFahrenheit(
        float $celsius,
        float $expected
    ): void {
        // Arrange
        $konversi = new KonversiSuhu();

        // Act
        $hasil = $konversi->celsiusKeFahrenheit($celsius);

        // Assert
        $this->assertEqualsWithDelta($expected, $hasil, 0.001);
    }

    public static function fahrenheitProvider(): array
    {
        return [
            'titik beku air' => [0, 32],
            'titik didih air' => [100, 212],
            'suhu negatif' => [-40, -40],
            'suhu tubuh' => [36.6, 97.88],
        ];
    }

    #[DataProvider('kelvinProvider')]
    public function testCelsiusCanBeConvertedToKelvin(
        float $celsius,
        float $expected
    ): void {
        // Arrange
        $konversi = new KonversiSuhu();

        // Act
        $hasil = $konversi->celsiusKeKelvin($celsius);

        // Assert
        $this->assertEqualsWithDelta($expected, $hasil, 0.001);
    }

    public static function kelvinProvider(): array
    {
        return [
            'titik beku air' => [0, 273.15],
            'titik didih air' => [100, 373.15],
            'suhu negatif' => [-40, 233.15],
            'suhu tubuh' => [36.6, 309.75],
        ];
    }
}
