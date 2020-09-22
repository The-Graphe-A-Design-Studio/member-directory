<?php

<<<<<<< HEAD
namespace Dotenv\Store\File;

use PhpOption\Option;

class Reader
{
    /**
=======
declare(strict_types=1);

namespace Dotenv\Store\File;

use Dotenv\Exception\InvalidEncodingException;
use Dotenv\Util\Str;
use PhpOption\Option;

/**
 * @internal
 */
final class Reader
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
     * Read the file(s), and return their raw content.
     *
     * We provide the file path as the key, and its content as the value. If
     * short circuit mode is enabled, then the returned array with have length
     * at most one. File paths that couldn't be read are omitted entirely.
     *
<<<<<<< HEAD
     * @param string[] $filePaths
     * @param bool     $shortCircuit
     *
     * @return array<string,string>
     */
    public static function read(array $filePaths, $shortCircuit = true)
=======
     * @param string[]    $filePaths
     * @param bool        $shortCircuit
     * @param string|null $fileEncoding
     *
     * @throws \Dotenv\Exception\InvalidEncodingException
     *
     * @return array<string,string>
     */
    public static function read(array $filePaths, bool $shortCircuit = true, string $fileEncoding = null)
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
    {
        $output = [];

        foreach ($filePaths as $filePath) {
<<<<<<< HEAD
            $content = self::readFromFile($filePath);
=======
            $content = self::readFromFile($filePath, $fileEncoding);
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
            if ($content->isDefined()) {
                $output[$filePath] = $content->get();
                if ($shortCircuit) {
                    break;
                }
            }
        }

        return $output;
    }

    /**
     * Read the given file.
     *
<<<<<<< HEAD
     * @param string $filePath
     *
     * @return \PhpOption\Option<string>
     */
    private static function readFromFile($filePath)
    {
        $content = @file_get_contents($filePath);

        /** @var \PhpOption\Option<string> */
        return Option::fromValue($content, false);
=======
     * @param string      $path
     * @param string|null $encoding
     *
     * @throws \Dotenv\Exception\InvalidEncodingException
     *
     * @return \PhpOption\Option<string>
     */
    private static function readFromFile(string $path, string $encoding = null)
    {
        /** @var Option<string> */
        $content = Option::fromValue(@\file_get_contents($path), false);

        return $content->flatMap(static function (string $content) use ($encoding) {
            return Str::utf8($content, $encoding)->mapError(static function (string $error) {
                throw new InvalidEncodingException($error);
            })->success();
        });
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
    }
}
