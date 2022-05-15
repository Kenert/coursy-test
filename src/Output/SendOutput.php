<?php /** @noinspection PhpNoReturnAttributeCanBeAddedInspection */

namespace Kenert\CoursyTest\Output;

use Kenert\CoursyTest\Processor;

class SendOutput implements Processor
{

    public function process(mixed $data): void
    {
        fwrite(STDOUT, json_encode($data, JSON_PRETTY_PRINT));
    }
}