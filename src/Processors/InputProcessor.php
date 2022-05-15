<?php

namespace Kenert\CoursyTest\Processors;

use Exception;

class InputProcessor implements Processor
{
    /**
     * @throws Exception
     */
    public function process(mixed $data): string
    {
        if ($file = $this->getFileInput()) {
            return $file;
        }

        throw new Exception('Unable to retrieve file input for processing');
    }

    /**
     * @throws Exception
     */
    private function getFileInput(): string
    {
        $args = getopt("p:", ["path:"]);
        if (empty($args)) {
            throw new Exception('Missing path (p) argument');
        }

        $path = $args['p'] ?? $args['path'] ?? null;
        if (!$path) {
            throw new Exception('Path argument is empty');
        }

        $file = file_get_contents($path);
        if (!$file) {
            throw new Exception('Path is broken or the file is empty');
        }

        return $file;
    }
}