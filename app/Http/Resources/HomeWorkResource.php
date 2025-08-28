<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'HomeworkResponse',
    properties: [
        new OA\Property(property: 'id', type: 'integer', example: 29),
        new OA\Property(property: 'title', type: 'string', example: 'Домашнее задание на вторник'),
        new OA\Property(property: 'homework', type: 'string', example: 'Выучить второй замечательный закон'),
        new OA\Property(property: 'date', type: 'string', example: '23.09')
    ],
    type: 'object'
)]

class HomeworkResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'homework' => $this->homework,
            'date' => $this->created_at->format('d.m'),
        ];
    }
}
