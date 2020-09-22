<?php

namespace Illuminate\View\Engines;

use Illuminate\Contracts\View\Engine;
<<<<<<< HEAD
=======
use Illuminate\Filesystem\Filesystem;
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
use Throwable;

class PhpEngine implements Engine
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
        return $this->evaluatePath($path, $data);
    }

    /**
     * Get the evaluated contents of the view at the given path.
     *
<<<<<<< HEAD
     * @param  string  $__path
     * @param  array  $__data
     * @return string
     */
    protected function evaluatePath($__path, $__data)
=======
     * @param  string  $path
     * @param  array  $data
     * @return string
     */
    protected function evaluatePath($path, $data)
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
    {
        $obLevel = ob_get_level();

        ob_start();

<<<<<<< HEAD
        extract($__data, EXTR_SKIP);

=======
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
        // We'll evaluate the contents of the view inside a try/catch block so we can
        // flush out any stray output that might get out before an error occurs or
        // an exception is thrown. This prevents any partial views from leaking.
        try {
<<<<<<< HEAD
            include $__path;
=======
            $this->files->getRequire($path, $data);
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
        } catch (Throwable $e) {
            $this->handleViewException($e, $obLevel);
        }

        return ltrim(ob_get_clean());
    }

    /**
     * Handle a view exception.
     *
     * @param  \Throwable  $e
     * @param  int  $obLevel
     * @return void
     *
     * @throws \Throwable
     */
    protected function handleViewException(Throwable $e, $obLevel)
    {
        while (ob_get_level() > $obLevel) {
            ob_end_clean();
        }

        throw $e;
    }
}
