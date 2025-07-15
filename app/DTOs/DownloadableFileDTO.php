<?php

namespace App\DTOs;

class DownloadableFileDTO
{
    public function __construct(
        public readonly string $path,
        public readonly string $name,
    )
    {
    }
}