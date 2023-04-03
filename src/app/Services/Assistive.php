<?php

namespace App\Services;

use App\Models\Punctuable;

class Assistive
{
    public function assistive(Punctuable $content)
    {
        $content->assistive();
    }
}
