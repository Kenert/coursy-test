<?php

namespace Kenert\CoursyTest\Input;

class File
{
    public function __construct(private readonly string $contents, private readonly string $extension)
    {
    }

    public function getExtension(): string
    {
        return $this->extension;
    }

    public function getContents(): string
    {
        return $this->contents;
    }
}