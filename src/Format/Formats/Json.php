<?php

namespace Kenert\CoursyTest\Format\Formats;

class Json extends BaseFormat
{
    public function formatData(): void
    {
        $parsedJson = json_decode($this->rawData, true);

        $this->setFormattedData([
            'user_role' => $parsedJson['data']['role_code'],
            'user_level' => $parsedJson['data']['level_code'],
            'user_department' => $parsedJson['data']['department_code'],
        ]);
    }
}