<?php

namespace App\Models;

use App\Models\Feedback;
use App\Models\Punctuable;

class Course implements Punctuable
{
    private $name;
    private $videos;
    private $feedbacks;

    public function __construct(string $name)
    {
        $this->name = $name;
        $this->videos = [];
        $this->feedbacks = [];
    }

    public function receiveFeedback(Feedback $feedback): void
    {
        $this->feedbacks[] = $feedback;
    }

    public function addVideo(Video $video)
    {
        if ($video->minutesOfDuration() < 3) {
            throw new \DomainException('Very short video');
        }

        $this->videos[] = $video;
    }

    /** @return Video[] */
    public function recoverVideos(): array
    {
        return $this->videos;
    }

    public function recoverScore(): int
    {
        return 100;
    }

    public function assistive(): void
    {
        foreach ($this->recoverVideos() as $video) {
            $video->assist();
        }
    }
}
