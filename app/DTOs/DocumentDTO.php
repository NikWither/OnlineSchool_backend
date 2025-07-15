<?php

namespace App\DTOs;

class DocumentDTO
{
    public function __construct(
        public readonly string $title,
        public readonly string $file_path,
        public readonly string $original_name,
    )
    {     
    }

    public static function fromArray(array $data): self
    {
        return new self(
            title: $data['title'],
            file_path: $data['file_path'],
            original_name: $data['original_name'],
        );
    }
}