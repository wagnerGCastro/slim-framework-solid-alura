<?php

namespace App\Services;

use App\Models\AluraPlus;
use App\Models\Course;

class CalculatorScore
{
    public function recoverScore($content)
    {
        if ($content instanceof Course) {
            return 100;
        } elseif ($content instanceof AluraPlus) {
            return $content->minutesOfDuration() * 2;
        } else {
            throw new \DomainException('Only Alura+ courses and videos have scores');
        }
    }
}
