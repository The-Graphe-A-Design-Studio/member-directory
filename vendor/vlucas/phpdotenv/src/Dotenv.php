<?php

<<<<<<< HEAD
=======
declare(strict_types=1);

>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
namespace Dotenv;

use Dotenv\Exception\InvalidPathException;
use Dotenv\Loader\Loader;
use Dotenv\Loader\LoaderInterface;
<<<<<<< HEAD
use Dotenv\Repository\RepositoryBuilder;
use Dotenv\Repository\RepositoryInterface;
use Dotenv\Store\FileStore;
use Dotenv\Store\StoreBuilder;
=======
use Dotenv\Parser\Parser;
use Dotenv\Parser\ParserInterface;
use Dotenv\Repository\Adapter\ArrayAdapter;
use Dotenv\Repository\Adapter\PutenvAdapter;
use Dotenv\Repository\RepositoryBuilder;
use Dotenv\Repository\RepositoryInterface;
use Dotenv\Store\StoreBuilder;
use Dotenv\Store\StoreInterface;
use Dotenv\Store\StringStore;
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd

class Dotenv
{
    /**
<<<<<<< HEAD
     * The loader instance.
     *
     * @var \Dotenv\Loader\LoaderInterface
     */
    protected $loader;

    /**
     * The repository instance.
     *
     * @var \Dotenv\Repository\RepositoryInterface
     */
    protected $repository;

    /**
     * The store instance.
     *
     * @var \Dotenv\Store\StoreInterface
     */
    protected $store;
=======
     * The store instance.
     *
     * @var \Dotenv\Store\StoreInterface
     */
    private $store;

    /**
     * The parser instance.
     *
     * @var \Dotenv\Parser\ParserInterface
     */
    private $parser;

    /**
     * The loader instance.
     *
     * @var \Dotenv\Loader\LoaderInterface
     */
    private $loader;

    /**
     * The repository instance.
     *
     * @var \Dotenv\Repository\RepositoryInterface
     */
    private $repository;
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd

    /**
     * Create a new dotenv instance.
     *
<<<<<<< HEAD
     * @param \Dotenv\Loader\LoaderInterface         $loader
     * @param \Dotenv\Repository\RepositoryInterface $repository
     * @param \Dotenv\Store\StoreInterface|string[]  $store
     *
     * @return void
     */
    public function __construct(LoaderInterface $loader, RepositoryInterface $repository, $store)
    {
        $this->loader = $loader;
        $this->repository = $repository;
        $this->store = is_array($store) ? new FileStore($store, true) : $store;
=======
     * @param \Dotenv\Store\StoreInterface           $store
     * @param \Dotenv\Parser\ParserInterface         $parser
     * @param \Dotenv\Loader\LoaderInterface         $loader
     * @param \Dotenv\Repository\RepositoryInterface $repository
     *
     * @return void
     */
    public function __construct(
        StoreInterface $store,
        ParserInterface $parser,
        LoaderInterface $loader,
        RepositoryInterface $repository
    ) {
        $this->store = $store;
        $this->parser = $parser;
        $this->loader = $loader;
        $this->repository = $repository;
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
    }

    /**
     * Create a new dotenv instance.
     *
     * @param \Dotenv\Repository\RepositoryInterface $repository
     * @param string|string[]                        $paths
     * @param string|string[]|null                   $names
     * @param bool                                   $shortCircuit
<<<<<<< HEAD
     *
     * @return \Dotenv\Dotenv
     */
    public static function create(RepositoryInterface $repository, $paths, $names = null, $shortCircuit = true)
    {
        $builder = StoreBuilder::create()->withPaths($paths)->withNames($names);
=======
     * @param string|null                            $fileEncoding
     *
     * @return \Dotenv\Dotenv
     */
    public static function create(RepositoryInterface $repository, $paths, $names = null, bool $shortCircuit = true, string $fileEncoding = null)
    {
        $builder = $names === null ? StoreBuilder::createWithDefaultName() : StoreBuilder::createWithNoNames();

        foreach ((array) $paths as $path) {
            $builder = $builder->addPath($path);
        }

        foreach ((array) $names as $name) {
            $builder = $builder->addName($name);
        }
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd

        if ($shortCircuit) {
            $builder = $builder->shortCircuit();
        }

<<<<<<< HEAD
        return new self(new Loader(), $repository, $builder->make());
=======
        return new self($builder->fileEncoding($fileEncoding)->make(), new Parser(), new Loader(), $repository);
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
    }

    /**
     * Create a new mutable dotenv instance with default repository.
     *
     * @param string|string[]      $paths
     * @param string|string[]|null $names
     * @param bool                 $shortCircuit
<<<<<<< HEAD
     *
     * @return \Dotenv\Dotenv
     */
    public static function createMutable($paths, $names = null, $shortCircuit = true)
    {
        $repository = RepositoryBuilder::create()->make();

        return self::create($repository, $paths, $names, $shortCircuit);
=======
     * @param string|null          $fileEncoding
     *
     * @return \Dotenv\Dotenv
     */
    public static function createMutable($paths, $names = null, bool $shortCircuit = true, string $fileEncoding = null)
    {
        $repository = RepositoryBuilder::createWithDefaultAdapters()->make();

        return self::create($repository, $paths, $names, $shortCircuit, $fileEncoding);
    }

    /**
     * Create a new mutable dotenv instance with default repository with the putenv adapter.
     *
     * @param string|string[]      $paths
     * @param string|string[]|null $names
     * @param bool                 $shortCircuit
     * @param string|null          $fileEncoding
     *
     * @return \Dotenv\Dotenv
     */
    public static function createUnsafeMutable($paths, $names = null, bool $shortCircuit = true, string $fileEncoding = null)
    {
        $repository = RepositoryBuilder::createWithDefaultAdapters()
            ->addAdapter(PutenvAdapter::class)
            ->make();

        return self::create($repository, $paths, $names, $shortCircuit, $fileEncoding);
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
    }

    /**
     * Create a new immutable dotenv instance with default repository.
     *
     * @param string|string[]      $paths
     * @param string|string[]|null $names
     * @param bool                 $shortCircuit
<<<<<<< HEAD
     *
     * @return \Dotenv\Dotenv
     */
    public static function createImmutable($paths, $names = null, $shortCircuit = true)
    {
        $repository = RepositoryBuilder::create()->immutable()->make();

        return self::create($repository, $paths, $names, $shortCircuit);
=======
     * @param string|null          $fileEncoding
     *
     * @return \Dotenv\Dotenv
     */
    public static function createImmutable($paths, $names = null, bool $shortCircuit = true, string $fileEncoding = null)
    {
        $repository = RepositoryBuilder::createWithDefaultAdapters()->immutable()->make();

        return self::create($repository, $paths, $names, $shortCircuit, $fileEncoding);
    }

    /**
     * Create a new immutable dotenv instance with default repository with the putenv adapter.
     *
     * @param string|string[]      $paths
     * @param string|string[]|null $names
     * @param bool                 $shortCircuit
     * @param string|null          $fileEncoding
     *
     * @return \Dotenv\Dotenv
     */
    public static function createUnsafeImmutable($paths, $names = null, bool $shortCircuit = true, string $fileEncoding = null)
    {
        $repository = RepositoryBuilder::createWithDefaultAdapters()
            ->addAdapter(PutenvAdapter::class)
            ->immutable()
            ->make();

        return self::create($repository, $paths, $names, $shortCircuit, $fileEncoding);
    }

    /**
     * Create a new dotenv instance with an array backed repository.
     *
     * @param string|string[]      $paths
     * @param string|string[]|null $names
     * @param bool                 $shortCircuit
     * @param string|null          $fileEncoding
     *
     * @return \Dotenv\Dotenv
     */
    public static function createArrayBacked($paths, $names = null, bool $shortCircuit = true, string $fileEncoding = null)
    {
        $repository = RepositoryBuilder::createWithNoAdapters()->addAdapter(ArrayAdapter::class)->make();

        return self::create($repository, $paths, $names, $shortCircuit, $fileEncoding);
    }

    /**
     * Parse the given content and resolve nested variables.
     *
     * This method behaves just like load(), only without mutating your actual
     * environment. We do this by using an array backed repository.
     *
     * @param string $content
     *
     * @throws \Dotenv\Exception\InvalidFileException
     *
     * @return array<string,string|null>
     */
    public static function parse(string $content)
    {
        $repository = RepositoryBuilder::createWithNoAdapters()->addAdapter(ArrayAdapter::class)->make();

        $phpdotenv = new self(new StringStore($content), new Parser(), new Loader(), $repository);

        return $phpdotenv->load();
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
    }

    /**
     * Read and load environment file(s).
     *
<<<<<<< HEAD
     * @throws \Dotenv\Exception\InvalidPathException|\Dotenv\Exception\InvalidFileException
=======
     * @throws \Dotenv\Exception\InvalidPathException|\Dotenv\Exception\InvalidEncodingException|\Dotenv\Exception\InvalidFileException
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
     *
     * @return array<string,string|null>
     */
    public function load()
    {
<<<<<<< HEAD
        return $this->loader->load($this->repository, $this->store->read());
=======
        $entries = $this->parser->parse($this->store->read());

        return $this->loader->load($this->repository, $entries);
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
    }

    /**
     * Read and load environment file(s), silently failing if no files can be read.
     *
<<<<<<< HEAD
     * @throws \Dotenv\Exception\InvalidFileException
=======
     * @throws \Dotenv\Exception\InvalidEncodingException|\Dotenv\Exception\InvalidFileException
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
     *
     * @return array<string,string|null>
     */
    public function safeLoad()
    {
        try {
            return $this->load();
        } catch (InvalidPathException $e) {
            // suppressing exception
            return [];
        }
    }

    /**
     * Required ensures that the specified variables exist, and returns a new validator object.
     *
     * @param string|string[] $variables
     *
     * @return \Dotenv\Validator
     */
    public function required($variables)
    {
<<<<<<< HEAD
        return new Validator($this->repository, (array) $variables);
=======
        return (new Validator($this->repository, (array) $variables))->required();
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
    }

    /**
     * Returns a new validator object that won't check if the specified variables exist.
     *
     * @param string|string[] $variables
     *
     * @return \Dotenv\Validator
     */
    public function ifPresent($variables)
    {
<<<<<<< HEAD
        return new Validator($this->repository, (array) $variables, false);
=======
        return new Validator($this->repository, (array) $variables);
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
    }
}
