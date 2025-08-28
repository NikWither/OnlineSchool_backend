<?php

namespace App\Http\Requests\Homework;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'StoreHomeworkRequest',
    required: ['title', 'homework', 'user_id'],
    properties: [
        new OA\Property(property: 'title', type: 'string', example: 'Домашнее задание на вторник'),
        new OA\Property(property: 'homework', type: 'string', example: 'Выучить второй замечательный закон'),
        new OA\Property(property: 'user_id', type: 'integer', example: 32)
    ],
    type: 'object'
)]

class StoreHomeworkRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'homework' => 'required|string|max:255',
            'user_id' => 'required|integer|exists:users,id',
        ];
    }
}
