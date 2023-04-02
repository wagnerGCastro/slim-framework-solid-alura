<?php

namespace App\Models;

class AluraPlus extends Video
{
    private $category;

    public function __construct(string $name, string $category)
    {
        parent::__construct($name);
        $this->category = $category;
    }

    public function retrieveUrl(): string
    {
        return str_replace(' ', '-', strtolower($this->category));
    }
}
