<?php

namespace App\Services;

use Decimal\Decimal;

class GradeCalculationService
{
    private static $secretKey;

    public static function init()
    {
        self::$secretKey = env('INTEGRITY_SECRET', 'military-grade-secret-key-change-me');
    }

    /**
     * Calculate Final Grade with High Precision
     * FG = (P1 * 50%) + (P2 * 50%)
     * P1 = (CS * 60%) + (PE * 40%)
     * P2 = (CS * 60%) + (PE * 40%)
     */
    public static function calculate($p1_cs, $p1_pe, $p2_cs, $p2_pe)
    {
        // Using BCMath for arbitrary precision if Decimal extension is not available
        // Or simple PHP float math if we trust it enough for this demo (but proposal says "Arbitrary Precision Math")
        // Since we can't easily install PHP extensions here, we will use BCMath which is usually available.

        $p1 = bcadd(bcmul($p1_cs, '0.60', 4), bcmul($p1_pe, '0.40', 4), 4);
        $p2 = bcadd(bcmul($p2_cs, '0.60', 4), bcmul($p2_pe, '0.40', 4), 4);

        $fg = bcadd(bcmul($p1, '0.50', 4), bcmul($p2, '0.50', 4), 4);

        // Round to 2 decimal places
        $finalGrade = number_format($fg, 2, '.', '');

        return [
            'final_grade' => $finalGrade,
            ...self::convertGradeToLetter($finalGrade)
        ];
    }

    public static function convertGradeToLetter($fg)
    {
        if ($fg >= 90.00)
            return ['grade_letter' => 'A', 'grade_point' => '4.00'];
        if ($fg >= 85.00)
            return ['grade_letter' => 'A-', 'grade_point' => '3.75'];
        if ($fg >= 80.00)
            return ['grade_letter' => 'B+', 'grade_point' => '3.50'];
        if ($fg >= 70.00)
            return ['grade_letter' => 'B', 'grade_point' => '3.00'];
        if ($fg >= 65.00)
            return ['grade_letter' => 'B-', 'grade_point' => '2.75'];
        if ($fg >= 60.00)
            return ['grade_letter' => 'C+', 'grade_point' => '2.50'];
        if ($fg >= 50.00)
            return ['grade_letter' => 'C', 'grade_point' => '2.00'];
        return ['grade_letter' => 'D', 'grade_point' => '1.00'];
    }

    public static function generateIntegrityHash($nim, $finalGrade)
    {
        if (!self::$secretKey)
            self::init();
        $data = $nim . $finalGrade . self::$secretKey;
        return hash('sha256', $data);
    }
}
