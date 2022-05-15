<?php /** @noinspection PhpNoReturnAttributeCanBeAddedInspection */

namespace Kenert\CoursyTest;

use Exception;
use Kenert\CoursyTest\Processors\InputProcessor;
use Kenert\CoursyTest\Processors\OutputProcessor;

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

        $this->pipeline->add(new InputProcessor());
        $this->pipeline->add(new OutputProcessor());
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