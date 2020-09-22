<?php

namespace Illuminate\View\Engines;

use Illuminate\Contracts\View\Engine;
<<<<<<< HEAD
=======
use Illuminate\Filesystem\Filesystem;
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd

class FileEngine implements Engine
{
    /**
<<<<<<< HEAD
=======
     * The filesystem instance.
     *
     * @var \Illuminate\Filesystem\Filesystem
     */
    protected $files;

    /**
     * Create a new file engine instance.
     *
     * @param  \Illuminate\Filesystem\Filesystem  $files
     * @return void
     */
    public function __construct(Filesystem $files)
    {
        $this->files = $files;
    }

    /**
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
     * Get the evaluated contents of the view.
     *
     * @param  string  $path
     * @param  array  $data
     * @return string
     */
    public function get($path, array $data = [])
    {
<<<<<<< HEAD
        return file_get_contents($path);
=======
        return $this->files->get($path);
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
    }
}
