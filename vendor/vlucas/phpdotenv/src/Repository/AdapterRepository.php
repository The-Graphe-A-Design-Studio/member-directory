<?php

<<<<<<< HEAD
namespace Dotenv\Repository;

class AdapterRepository extends AbstractRepository
{
    /**
     * The set of readers to use.
     *
     * @var \Dotenv\Repository\Adapter\ReaderInterface[]
     */
    protected $readers;

    /**
     * The set of writers to use.
     *
     * @var \Dotenv\Repository\Adapter\WriterInterface[]
     */
    protected $writers;
=======
declare(strict_types=1);

namespace Dotenv\Repository;

use Dotenv\Repository\Adapter\ReaderInterface;
use Dotenv\Repository\Adapter\WriterInterface;

final class AdapterRepository implements RepositoryInterface
{
    /**
     * The reader to use.
     *
     * @var \Dotenv\Repository\Adapter\ReaderInterface
     */
    private $reader;

    /**
     * The writer to use.
     *
     * @var \Dotenv\Repository\Adapter\WriterInterface
     */
    private $writer;
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd

    /**
     * Create a new adapter repository instance.
     *
<<<<<<< HEAD
     * @param \Dotenv\Repository\Adapter\ReaderInterface[] $readers
     * @param \Dotenv\Repository\Adapter\WriterInterface[] $writers
     * @param bool                                         $immutable
     *
     * @return void
     */
    public function __construct(array $readers, array $writers, $immutable)
    {
        $this->readers = $readers;
        $this->writers = $writers;
        parent::__construct($immutable);
    }

    /**
     * Get an environment variable.
     *
     * We do this by querying our readers sequentially.
=======
     * @param \Dotenv\Repository\Adapter\ReaderInterface $reader
     * @param \Dotenv\Repository\Adapter\WriterInterface $writer
     *
     * @return void
     */
    public function __construct(ReaderInterface $reader, WriterInterface $writer)
    {
        $this->reader = $reader;
        $this->writer = $writer;
    }

    /**
     * Determine if the given environment variable is defined.
     *
     * @param string $name
     *
     * @return bool
     */
    public function has(string $name)
    {
        return $this->reader->read($name)->isDefined();
    }

    /**
     * Get an environment variable.
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
     *
     * @param string $name
     *
     * @return string|null
     */
<<<<<<< HEAD
    protected function getInternal($name)
    {
        foreach ($this->readers as $reader) {
            $result = $reader->get($name);
            if ($result->isDefined()) {
                return $result->get();
            }
        }

        return null;
=======
    public function get(string $name)
    {
        return $this->reader->read($name)->getOrElse(null);
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
    }

    /**
     * Set an environment variable.
     *
<<<<<<< HEAD
     * @param string      $name
     * @param string|null $value
     *
     * @return void
     */
    protected function setInternal($name, $value = null)
    {
        foreach ($this->writers as $writers) {
            $writers->set($name, $value);
        }
=======
     * @param string $name
     * @param string $value
     *
     * @return bool
     */
    public function set(string $name, string $value)
    {
        return $this->writer->write($name, $value);
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
    }

    /**
     * Clear an environment variable.
     *
     * @param string $name
     *
<<<<<<< HEAD
     * @return void
     */
    protected function clearInternal($name)
    {
        foreach ($this->writers as $writers) {
            $writers->clear($name);
        }
=======
     * @return bool
     */
    public function clear(string $name)
    {
        return $this->writer->delete($name);
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
    }
}
