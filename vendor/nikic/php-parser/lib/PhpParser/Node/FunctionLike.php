<?php declare(strict_types=1);

namespace PhpParser\Node;

use PhpParser\Node;

interface FunctionLike extends Node
{
    /**
     * Whether to return by reference
     *
     * @return bool
     */
    public function returnsByRef() : bool;

    /**
     * List of parameters
     *
<<<<<<< HEAD
     * @return Param[]
=======
     * @return Node\Param[]
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
     */
    public function getParams() : array;

    /**
     * Get the declared return type or null
     *
<<<<<<< HEAD
     * @return null|Identifier|Name|NullableType|UnionType
=======
     * @return null|Identifier|Node\Name|Node\NullableType|Node\UnionType
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
     */
    public function getReturnType();

    /**
     * The function body
     *
<<<<<<< HEAD
     * @return Stmt[]|null
     */
    public function getStmts();

    /**
     * Get PHP attribute groups.
     *
     * @return AttributeGroup[]
     */
    public function getAttrGroups() : array;
=======
     * @return Node\Stmt[]|null
     */
    public function getStmts();
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
}
