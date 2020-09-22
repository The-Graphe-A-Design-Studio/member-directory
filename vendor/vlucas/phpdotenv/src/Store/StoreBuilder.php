<?php

<<<<<<< HEAD
=======
declare(strict_types=1);

>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
namespace Dotenv\Store;

use Dotenv\Store\File\Paths;

<<<<<<< HEAD
class StoreBuilder
{
    /**
=======
final class StoreBuilder
{
    /**
     * The of default name.
     *
     * @var string[]
     */
    private const DEFAULT_NAME = '.env';

    /**
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
     * The paths to search within.
     *
     * @var string[]
     */
    private $paths;

    /**
     * The file names to search for.
     *
<<<<<<< HEAD
     * @var string[]|null
=======
     * @var string[]
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
     */
    private $names;

    /**
     * Should file loading short circuit?
     *
     * @var bool
     */
<<<<<<< HEAD
    protected $shortCircuit;
=======
    private $shortCircuit;

    /**
     * The file encoding.
     *
     * @var string|null
     */
    private $fileEncoding;
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd

    /**
     * Create a new store builder instance.
     *
<<<<<<< HEAD
     * @param string[]      $paths
     * @param string[]|null $names
     * @param bool          $shortCircuit
     *
     * @return void
     */
    private function __construct(array $paths = [], array $names = null, $shortCircuit = false)
=======
     * @param string[]    $paths
     * @param string[]    $names
     * @param bool        $shortCircuit
     * @param string|null $fileEncoding
     *
     * @return void
     */
    private function __construct(array $paths = [], array $names = [], bool $shortCircuit = false, string $fileEncoding = null)
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
    {
        $this->paths = $paths;
        $this->names = $names;
        $this->shortCircuit = $shortCircuit;
<<<<<<< HEAD
    }

    /**
     * Create a new store builder instance.
     *
     * @return \Dotenv\Store\StoreBuilder
     */
    public static function create()
=======
        $this->fileEncoding = $fileEncoding;
    }

    /**
     * Create a new store builder instance with no names.
     *
     * @return \Dotenv\Store\StoreBuilder
     */
    public static function createWithNoNames()
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
    {
        return new self();
    }

    /**
<<<<<<< HEAD
     * Creates a store builder with the given paths.
     *
     * @param string|string[] $paths
     *
     * @return \Dotenv\Store\StoreBuilder
     */
    public function withPaths($paths)
    {
        return new self((array) $paths, $this->names, $this->shortCircuit);
    }

    /**
     * Creates a store builder with the given names.
     *
     * @param string|string[]|null $names
     *
     * @return \Dotenv\Store\StoreBuilder
     */
    public function withNames($names = null)
    {
        return new self($this->paths, $names === null ? null : (array) $names, $this->shortCircuit);
=======
     * Create a new store builder instance with the default name.
     *
     * @return \Dotenv\Store\StoreBuilder
     */
    public static function createWithDefaultName()
    {
        return new self([], [self::DEFAULT_NAME]);
    }

    /**
     * Creates a store builder with the given path added.
     *
     * @param string $path
     *
     * @return \Dotenv\Store\StoreBuilder
     */
    public function addPath(string $path)
    {
        return new self(\array_merge($this->paths, [$path]), $this->names, $this->shortCircuit, $this->fileEncoding);
    }

    /**
     * Creates a store builder with the given name added.
     *
     * @param string $name
     *
     * @return \Dotenv\Store\StoreBuilder
     */
    public function addName(string $name)
    {
        return new self($this->paths, \array_merge($this->names, [$name]), $this->shortCircuit, $this->fileEncoding);
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
    }

    /**
     * Creates a store builder with short circuit mode enabled.
     *
     * @return \Dotenv\Store\StoreBuilder
     */
    public function shortCircuit()
    {
<<<<<<< HEAD
        return new self($this->paths, $this->names, true);
=======
        return new self($this->paths, $this->names, true, $this->fileEncoding);
    }

    /**
     * Creates a store builder with the specified file encoding.
     *
     * @param string|null $fileEncoding
     *
     * @return \Dotenv\Store\StoreBuilder
     */
    public function fileEncoding(string $fileEncoding = null)
    {
        return new self($this->paths, $this->names, $this->shortCircuit, $fileEncoding);
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
    }

    /**
     * Creates a new store instance.
     *
     * @return \Dotenv\Store\StoreInterface
     */
    public function make()
    {
        return new FileStore(
<<<<<<< HEAD
            Paths::filePaths($this->paths, $this->names === null ? ['.env'] : $this->names),
            $this->shortCircuit
=======
            Paths::filePaths($this->paths, $this->names),
            $this->shortCircuit,
            $this->fileEncoding
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
        );
    }
}
