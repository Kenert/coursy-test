<?php

namespace Kenert\CoursyTest\Format\Formats;

class Csv extends BaseFormat
{
    public function formatData(): void
    {
        $parsedCsv = $this->getParsedCsv();

        $this->setFormattedData([
            'user_role' => $parsedCsv["roleCode"],
            'user_level' => $parsedCsv["levelCode"],
            'user_department' => $parsedCsv["departmentCode"],
        ]);
    }

    private function getParsedCsv(): array
    {
        $csv = explode("\n", $this->rawData);

        $parsedCsv = [];
        $headers = str_getcsv($csv[0], ';');
        unset($csv[0]);

        foreach ($csv as $line) {
            $lineArr = str_getcsv($line, ';');
            foreach ($lineArr as $index => $item) {
                $parsedCsv[$headers[$index]] = $item;
            }
        }

        return $parsedCsv;
    }
}