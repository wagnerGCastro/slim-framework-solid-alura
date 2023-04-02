<?php

namespace App\Models;

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

    public function receiveFeedback(int $note, ?string $testimony): void
    {
        if ($note < 9 && empty($testimony)) {
            throw new \DomainException('testimony required');
        }

        $this->feedbacks[] = [$note, $testimony];
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
