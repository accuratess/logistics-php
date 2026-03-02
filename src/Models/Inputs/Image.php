<?php

namespace Accurate\Shipping\Models\Inputs;

use GuzzleHttp\Psr7\UploadedFile;

class Image
{
    public function __construct(
        public UploadedFile $file,
        public ?string $subjectCode,
    ) {}
}
