<?php

namespace Kenert\CoursyTest\Input;

use Exception;
use Kenert\CoursyTest\Processor;

class GetInput implements Processor
{
    /**
     * @throws Exception
     */
    public function process(mixed $data): File
    {
        $args = $this->getPathArgs();
        $path = $this->getFilepath($args);
        $extension = $this->getFileExtension($path);
        $contents = $this->getFileContents($path);

        return new File($contents, $extension);
    }

    /**
     * @throws Exception
     */
    private function getPathArgs(): array
    {
        $args = getopt("p:", ["path:"]);
        if (empty($args)) {
            throw new Exception('Missing path (p) argument');
        }

        return $args;
    }

    /**
     * @throws Exception
     */
    private function getFilepath(array $args): string
    {
        $path = $args['p'] ?? $args['path'] ?? null;
        if (!$path) {
            throw new Exception('Path argument is empty');
        }

        return $path;
    }

    /**
     * @throws Exception
     */
    private function getFileExtension(string $path): string
    {
        $extension = pathinfo($path, PATHINFO_EXTENSION);
        if (!$extension) {
            throw new Exception('File is missing extension');
        }

        return $extension;
    }

    /**
     * @throws Exception
     */
    private function getFileContents(string $path): string
    {
        $contents = file_get_contents($path);
        if (!$contents) {
            throw new Exception('Path is broken or the file is empty');
        }

        return $contents;
    }
}