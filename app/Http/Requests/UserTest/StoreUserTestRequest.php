<?php

namespace App\Http\Requests\UserTest;

use App\DTOs\UserTestDTO;
use Illuminate\Foundation\Http\FormRequest;

class StoreUserTestRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'user_id' => 'required|integer|exists:users,id',
            'test_id' => 'required|integer|exists:tests,id',
            'status' => 'required|in:not_available,in_progress,passed,failed'
        ];
    }

    public function toDTO(): UserTestDTO
    {
        return UserTestDTO::fromArray($this->validated());
    }
}
