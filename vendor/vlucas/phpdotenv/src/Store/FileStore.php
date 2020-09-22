<?php

<<<<<<< HEAD
=======
declare(strict_types=1);

>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
namespace Dotenv\Store;

use Dotenv\Exception\InvalidPathException;
use Dotenv\Store\File\Reader;

<<<<<<< HEAD
class FileStore implements StoreInterface
=======
final class FileStore implements StoreInterface
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
{
    /**
     * The file paths.
     *
     * @var string[]
     */
<<<<<<< HEAD
    protected $filePaths;
=======
    private $filePaths;
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd

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
     * Create a new file store instance.
     *
<<<<<<< HEAD
     * @param string[] $filePaths
     * @param bool     $shortCircuit
     *
     * @return void
     */
    public function __construct(array $filePaths, $shortCircuit)
    {
        $this->filePaths = $filePaths;
        $this->shortCircuit = $shortCircuit;
=======
     * @param string[]    $filePaths
     * @param bool        $shortCircuit
     * @param string|null $fileEncoding
     *
     * @return void
     */
    public function __construct(array $filePaths, bool $shortCircuit, string $fileEncoding = null)
    {
        $this->filePaths = $filePaths;
        $this->shortCircuit = $shortCircuit;
        $this->fileEncoding = $fileEncoding;
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
    }

    /**
     * Read the content of the environment file(s).
     *
<<<<<<< HEAD
     * @throws \Dotenv\Exception\InvalidPathException
=======
     * @throws \Dotenv\Exception\InvalidEncodingException|\Dotenv\Exception\InvalidPathException
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
     *
     * @return string
     */
    public function read()
    {
        if ($this->filePaths === []) {
            throw new InvalidPathException('At least one environment file path must be provided.');
        }

<<<<<<< HEAD
        $contents = Reader::read($this->filePaths, $this->shortCircuit);

        if (count($contents) > 0) {
            return implode("\n", $contents);
        }

        throw new InvalidPathException(
            sprintf('Unable to read any of the environment file(s) at [%s].', implode(', ', $this->filePaths))
=======
        $contents = Reader::read($this->filePaths, $this->shortCircuit, $this->fileEncoding);

        if (\count($contents) > 0) {
            return \implode("\n", $contents);
        }

        throw new InvalidPathException(
            \sprintf('Unable to read any of the environment file(s) at [%s].', \implode(', ', $this->filePaths))
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
        );
    }
}
