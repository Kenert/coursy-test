<?php

namespace Kenert\CoursyTest\Format;

use Kenert\CoursyTest\Input\File;
use Kenert\CoursyTest\Processor;

class MatchFormat implements Processor
{

    /* @var File $data */
    public function process($data): array
    {
        $extension = Extension::from($data->getExtension());

        $format = FormatFactory::create($extension, $data->getContents());

        return $format->getFormattedData();
    }
}