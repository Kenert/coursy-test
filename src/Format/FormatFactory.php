<?php

namespace Kenert\CoursyTest\Format;

use Kenert\CoursyTest\Format\Formats\BaseFormat;
use Kenert\CoursyTest\Format\Formats\Csv;
use Kenert\CoursyTest\Format\Formats\Json;
use Kenert\CoursyTest\Format\Formats\Xml;

class FormatFactory
{
    public static function create(Extension $extension, mixed $rawData): BaseFormat
    {
        return match ($extension) {
            Extension::JSON => new Json($rawData),
            Extension::XML => new Xml($rawData),
            Extension::CSV => new Csv($rawData),
        };
    }
}