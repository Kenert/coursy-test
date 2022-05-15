<?php /** @noinspection PhpNoReturnAttributeCanBeAddedInspection */

namespace Kenert\CoursyTest;

use Exception;
use Kenert\CoursyTest\Format\MatchFormat;
use Kenert\CoursyTest\Input\GetInput;
use Kenert\CoursyTest\Output\SendOutput;
use ValueError;

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
        $this->pipeline->add(new MatchFormat());
        $this->pipeline->add(new SendOutput());
    }

    private function init(): void
    {
        try {
            $this->pipeline->process();
        } catch (Exception $e) {
            die($e->getMessage());
        } catch (ValueError $e) {
            die('That file extension is not supported');
        }
    }
}