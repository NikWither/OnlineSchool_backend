<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Route;
use App\Http\Resources\HomeworkResource;

class UsersResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        $isRouteShow = str_contains(Route::currentRouteName(), 'users.show');

        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'homework' => $this->when($isRouteShow, HomeworkResource::collection($this->homework)),
        ];
    }
}
