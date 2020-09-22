<?php

<<<<<<< HEAD
=======
declare(strict_types=1);

>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
namespace Dotenv\Store;

interface StoreInterface
{
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
    public function read();
}
