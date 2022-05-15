<?php

namespace Kenert\CoursyTest\Format;

enum Extension: string
{
    case JSON = 'json';
    case XML = 'xml';
    case CSV = 'csv';
}