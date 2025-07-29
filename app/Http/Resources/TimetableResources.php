<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TimetableResources extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            "user_id" => $this->user_id,
            "lesson_id" => $this->lesson_id,
            "day_of_week" => $this->day_name,
            "start_time" => $this->start_time,
            "end_time" => $this->end_time,

            'lesson' => [
                'title' => $this->lesson->title,
            ],
            'user' => [
                $this->user->name,
            ]
        ];
    }
}
