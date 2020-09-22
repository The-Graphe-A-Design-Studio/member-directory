<?php declare(strict_types=1);

namespace PhpParser\Node\Expr;

use PhpParser\Node;
use PhpParser\Node\Expr;
use PhpParser\Node\FunctionLike;

class ArrowFunction extends Expr implements FunctionLike
{
    /** @var bool */
    public $static;

    /** @var bool */
    public $byRef;

    /** @var Node\Param[] */
    public $params = [];

    /** @var null|Node\Identifier|Node\Name|Node\NullableType|Node\UnionType */
    public $returnType;

    /** @var Expr */
    public $expr;
<<<<<<< HEAD
    /** @var Node\AttributeGroup[] */
    public $attrGroups;
=======
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd

    /**
     * @param array $subNodes   Array of the following optional subnodes:
     *                          'static'     => false   : Whether the closure is static
     *                          'byRef'      => false   : Whether to return by reference
     *                          'params'     => array() : Parameters
     *                          'returnType' => null    : Return type
     *                          'expr'       => Expr    : Expression body
<<<<<<< HEAD
     *                          'attrGroups' => array() : PHP attribute groups
=======
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
     * @param array $attributes Additional attributes
     */
    public function __construct(array $subNodes = [], array $attributes = []) {
        $this->attributes = $attributes;
        $this->static = $subNodes['static'] ?? false;
        $this->byRef = $subNodes['byRef'] ?? false;
        $this->params = $subNodes['params'] ?? [];
        $returnType = $subNodes['returnType'] ?? null;
        $this->returnType = \is_string($returnType) ? new Node\Identifier($returnType) : $returnType;
        $this->expr = $subNodes['expr'] ?? null;
<<<<<<< HEAD
        $this->attrGroups = $subNodes['attrGroups'] ?? [];
    }

    public function getSubNodeNames() : array {
        return ['attrGroups', 'static', 'byRef', 'params', 'returnType', 'expr'];
=======
    }

    public function getSubNodeNames() : array {
        return ['static', 'byRef', 'params', 'returnType', 'expr'];
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
    }

    public function returnsByRef() : bool {
        return $this->byRef;
    }

    public function getParams() : array {
        return $this->params;
    }

    public function getReturnType() {
        return $this->returnType;
    }

<<<<<<< HEAD
    public function getAttrGroups() : array {
        return $this->attrGroups;
    }

=======
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
    /**
     * @return Node\Stmt\Return_[]
     */
    public function getStmts() : array {
        return [new Node\Stmt\Return_($this->expr)];
    }

    public function getType() : string {
        return 'Expr_ArrowFunction';
    }
}
