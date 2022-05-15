<?php /** @noinspection PhpNoReturnAttributeCanBeAddedInspection */

namespace Kenert\CoursyTest;

use Exception;
use Kenert\CoursyTest\Processors\GetInput;
use Kenert\CoursyTest\Processors\StandardOutput;

class Application
{
    private Pipeline $pipeline;

    public function __construct()
    {
        $this->setup();
        $this->init();
    }

    private function setup(): void
    {
        $this->pipeline = new Pipeline();

        $this->pipeline->add(new GetInput());
        $this->pipeline->add(new StandardOutput());
    }

    private function init(): void
    {
        try {
            $this->pipeline->process();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}