<?php

namespace App\DTOs;

class UserTestDTO
{
    public function __construct(
        public readonly string $user_id,
        public readonly string $test_id,
        public readonly string $status,
    )
    {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            user_id: $data['user_id'],
            test_id: $data['test_id'],
            status: $data['status'],
        );
    }
}