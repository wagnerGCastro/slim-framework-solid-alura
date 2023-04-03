<?php

namespace App\Models;

use App\{Models\Punctuable};

class AluraPlus extends Video implements Punctuable
{
    private string $category;

    public function __construct(string $name, string $category)
    {
        parent::__construct($name);
        $this->category = $category;
    }

    public function retrieveUrl(): string
    {
        return 'https://videos.alura.com.br/' . str_replace(' ', '-', strtolower($this->category));
    }

    public function recoverScore(): int
    {
        return $this->minutesOfDuration() * 2;
    }
}
