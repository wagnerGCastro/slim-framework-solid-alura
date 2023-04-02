<?php

namespace App\Models;

class Feedback
{
    private int $note;
    private ?string $testimony;

    public function __construct(int $note, ?string $testimony)
    {
        if ($note < 9 && empty($testimony)) {
            throw new \DomainException('testimony required');
        }

        $this->note = $note;
        $this->testimony = $testimony;
    }
}
