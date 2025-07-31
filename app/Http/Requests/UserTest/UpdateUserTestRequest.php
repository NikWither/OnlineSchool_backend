<?php

namespace App\Http\Requests\TestAssigment;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserTestRequest extends FormRequest
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
}
