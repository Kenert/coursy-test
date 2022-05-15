<?php

namespace Kenert\CoursyTest\Format\Formats;

abstract class BaseFormat implements DataFormat
{
    protected mixed $formattedData;

    public function __construct(protected mixed $rawData)
    {
        $this->formatData();
    }

    public function getFormattedData(): array
    {
        return $this->formattedData;
    }

    public function setFormattedData(mixed $formattedData): void
    {
        $this->formattedData = $formattedData;
    }
}