<?php /** @noinspection PhpNoReturnAttributeCanBeAddedInspection */

namespace Kenert\CoursyTest\Processors;

class OutputProcessor implements Processor
{

    public function process(mixed $data): void
    {
        die(json_encode($data, JSON_PRETTY_PRINT));
    }
}