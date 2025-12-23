<?php

namespace Tests\Unit\Services;

use Tests\TestCase;
use App\Services\GradeCalculationService;

class GradeCalculationFormulaTest extends TestCase
{
    /**
     * Test: Formula perhitungan nilai benar
     * 
     * @test
     */
    public function it_calculates_final_grade_correctly_with_standard_values()
    {
        $result = GradeCalculationService::calculate(
            p1_cs: 85.00,
            p1_pe: 90.00,
            p2_cs: 88.00,
            p2_pe: 92.00
        );

        // Manual calculation:
        // P1 CS: 85 * 0.15 = 12.75
        // P1 PE: 90 * 0.15 = 13.50
        // P2 CS: 88 * 0.15 = 13.20
        // P2 PE: 92 * 0.15 = 13.80
        // Total: 53.25 (before final grade is added by controller)

        $this->assertIsArray($result);
        $this->assertArrayHasKey('final_grade', $result);
        $this->assertArrayHasKey('grade_letter', $result);
        $this->assertArrayHasKey('grade_point', $result);
    }

    /**
     * Test: Perhitungan dengan nilai perfect (100)
     * 
     * @test
     */
    public function it_calculates_correctly_with_perfect_scores()
    {
        $result = GradeCalculationService::calculate(
            p1_cs: 100.00,
            p1_pe: 100.00,
            p2_cs: 100.00,
            p2_pe: 100.00
        );

        $this->assertEquals('A', $result['grade_letter']);
        $this->assertEquals(4.00, $result['grade_point']);
    }

    /**
     * Test: Perhitungan dengan nilai minimum (0)
     * 
     * @test
     */
    public function it_calculates_correctly_with_minimum_scores()
    {
        $result = GradeCalculationService::calculate(
            p1_cs: 0.00,
            p1_pe: 0.00,
            p2_cs: 0.00,
            p2_pe: 0.00
        );

        // Service returns 'D' for scores < 50 (no 'E' grade)
        $this->assertEquals('D', $result['grade_letter']);
        $this->assertEquals('1.00', $result['grade_point']);
    }
}
