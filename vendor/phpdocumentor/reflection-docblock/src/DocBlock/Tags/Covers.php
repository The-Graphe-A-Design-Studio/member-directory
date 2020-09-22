<?php

declare(strict_types=1);

/**
 * This file is part of phpDocumentor.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @link http://phpdoc.org
 */

namespace phpDocumentor\Reflection\DocBlock\Tags;

use phpDocumentor\Reflection\DocBlock\Description;
use phpDocumentor\Reflection\DocBlock\DescriptionFactory;
use phpDocumentor\Reflection\Fqsen;
use phpDocumentor\Reflection\FqsenResolver;
use phpDocumentor\Reflection\Types\Context as TypeContext;
<<<<<<< HEAD
use phpDocumentor\Reflection\Utils;
use Webmozart\Assert\Assert;
use function array_key_exists;
use function explode;
=======
use Webmozart\Assert\Assert;
use function preg_split;
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd

/**
 * Reflection class for a @covers tag in a Docblock.
 */
final class Covers extends BaseTag implements Factory\StaticMethod
{
    /** @var string */
    protected $name = 'covers';

    /** @var Fqsen */
    private $refers;

    /**
     * Initializes this tag.
     */
    public function __construct(Fqsen $refers, ?Description $description = null)
    {
        $this->refers      = $refers;
        $this->description = $description;
    }

    public static function create(
        string $body,
        ?DescriptionFactory $descriptionFactory = null,
        ?FqsenResolver $resolver = null,
        ?TypeContext $context = null
    ) : self {
<<<<<<< HEAD
        Assert::stringNotEmpty($body);
        Assert::notNull($descriptionFactory);
        Assert::notNull($resolver);

        $parts = Utils::pregSplit('/\s+/Su', $body, 2);

        return new static(
            self::resolveFqsen($parts[0], $resolver, $context),
=======
        Assert::notEmpty($body);
        Assert::notNull($descriptionFactory);
        Assert::notNull($resolver);

        $parts = preg_split('/\s+/Su', $body, 2);
        Assert::isArray($parts);

        return new static(
            $resolver->resolve($parts[0], $context),
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
            $descriptionFactory->create($parts[1] ?? '', $context)
        );
    }

<<<<<<< HEAD
    private static function resolveFqsen(string $parts, ?FqsenResolver $fqsenResolver, ?TypeContext $context) : Fqsen
    {
        Assert::notNull($fqsenResolver);
        $fqsenParts = explode('::', $parts);
        $resolved = $fqsenResolver->resolve($fqsenParts[0], $context);

        if (!array_key_exists(1, $fqsenParts)) {
            return $resolved;
        }

        return new Fqsen($resolved . '::' . $fqsenParts[1]);
    }

=======
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
    /**
     * Returns the structural element this tag refers to.
     */
    public function getReference() : Fqsen
    {
        return $this->refers;
    }

    /**
     * Returns a string representation of this tag.
     */
    public function __toString() : string
    {
<<<<<<< HEAD
        if ($this->description) {
            $description = $this->description->render();
        } else {
            $description = '';
        }

        $refers = (string) $this->refers;

        return $refers . ($description !== '' ? ($refers !== '' ? ' ' : '') . $description : '');
=======
        return $this->refers . ($this->description ? ' ' . $this->description->render() : '');
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
    }
}
