<?php

namespace Kenert\CoursyTest;

use Kenert\CoursyTest\Processors\Processor;

class Pipeline
{
    private array $processors = [];
    private mixed $data = null;

    public function add(Processor $processor): void
    {
        $this->processors[] = $processor;
    }

    public function process(): void
    {
        foreach ($this->processors as $processor) {
            /* @var Processor $processor */
            $this->data = $processor->process($this->data);
        }
    }
}