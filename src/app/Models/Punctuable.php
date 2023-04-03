<?php

namespace App\Models;

interface Punctuable
{
    public function recoverScore(): int;
    public function assistive(): void;
}
