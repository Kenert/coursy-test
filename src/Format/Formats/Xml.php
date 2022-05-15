<?php

namespace Kenert\CoursyTest\Format\Formats;

class Xml extends BaseFormat
{
    public function formatData(): void
    {
        $xml = simplexml_load_string($this->rawData);

        $this->setFormattedData([
            'user_role' => (string)$xml->role,
            'user_level' => (string)$xml->level,
            'user_department' => (string)$xml->department,
        ]);
    }
}