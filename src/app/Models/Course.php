<?php

namespace App\Models;

use App\Models\Feedback;

class Curso
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
}
