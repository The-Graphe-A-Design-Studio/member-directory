<?php

<<<<<<< HEAD
namespace Dotenv\Store\File;

class Paths
{
    /**
=======
declare(strict_types=1);

namespace Dotenv\Store\File;

/**
 * @internal
 */
final class Paths
{
    /**
     * This class is a singleton.
     *
     * @codeCoverageIgnore
     *
     * @return void
     */
    private function __construct()
    {
        //
    }

    /**
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
     * Returns the full paths to the files.
     *
     * @param string[] $paths
     * @param string[] $names
     *
     * @return string[]
     */
    public static function filePaths(array $paths, array $names)
    {
        $files = [];

        foreach ($paths as $path) {
            foreach ($names as $name) {
<<<<<<< HEAD
                $files[] = rtrim($path, DIRECTORY_SEPARATOR).DIRECTORY_SEPARATOR.$name;
=======
                $files[] = \rtrim($path, \DIRECTORY_SEPARATOR).\DIRECTORY_SEPARATOR.$name;
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
            }
        }

        return $files;
    }
}
