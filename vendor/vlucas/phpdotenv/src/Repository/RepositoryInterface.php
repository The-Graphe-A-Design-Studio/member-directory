<?php

<<<<<<< HEAD
namespace Dotenv\Repository;

use ArrayAccess;

/**
 * @extends \ArrayAccess<string,string|null>
 */
interface RepositoryInterface extends ArrayAccess
{
    /**
     * Tells whether environment variable has been defined.
=======
declare(strict_types=1);

namespace Dotenv\Repository;

interface RepositoryInterface
{
    /**
     * Determine if the given environment variable is defined.
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
     *
     * @param string $name
     *
     * @return bool
     */
<<<<<<< HEAD
    public function has($name);
=======
    public function has(string $name);
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd

    /**
     * Get an environment variable.
     *
     * @param string $name
     *
<<<<<<< HEAD
     * @throws \InvalidArgumentException
     *
     * @return string|null
     */
    public function get($name);
=======
     * @return string|null
     */
    public function get(string $name);
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd

    /**
     * Set an environment variable.
     *
<<<<<<< HEAD
     * @param string      $name
     * @param string|null $value
     *
     * @throws \InvalidArgumentException
     *
     * @return void
     */
    public function set($name, $value = null);
=======
     * @param string $name
     * @param string $value
     *
     * @return bool
     */
    public function set(string $name, string $value);
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd

    /**
     * Clear an environment variable.
     *
     * @param string $name
     *
<<<<<<< HEAD
     * @throws \InvalidArgumentException
     *
     * @return void
     */
    public function clear($name);
=======
     * @return bool
     */
    public function clear(string $name);
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
}
