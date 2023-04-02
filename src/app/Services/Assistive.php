<?php

namespace App\Services;

use App\Models\AluraPlus;
use App\Models\Course;

class Assistive
{
    public function assistCourse(Course $course)
    {
        foreach ($course->recoverVideos() as $video) {
            $video->assist();
        }
    }

    public function assistAluraPlus(AluraPlus $aluraPlus)
    {
        $aluraPlus->assist();
    }
}
