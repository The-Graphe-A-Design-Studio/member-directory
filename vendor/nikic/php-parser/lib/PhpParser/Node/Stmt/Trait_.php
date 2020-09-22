<?php declare(strict_types=1);

namespace PhpParser\Node\Stmt;

use PhpParser\Node;

class Trait_ extends ClassLike
{
    /**
     * Constructs a trait node.
     *
     * @param string|Node\Identifier $name Name
     * @param array  $subNodes   Array of the following optional subnodes:
<<<<<<< HEAD
     *                           'stmts'      => array(): Statements
     *                           'attrGroups' => array(): PHP attribute groups
=======
     *                           'stmts' => array(): Statements
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
     * @param array  $attributes Additional attributes
     */
    public function __construct($name, array $subNodes = [], array $attributes = []) {
        $this->attributes = $attributes;
        $this->name = \is_string($name) ? new Node\Identifier($name) : $name;
        $this->stmts = $subNodes['stmts'] ?? [];
<<<<<<< HEAD
        $this->attrGroups = $subNodes['attrGroups'] ?? [];
    }

    public function getSubNodeNames() : array {
        return ['attrGroups', 'name', 'stmts'];
=======
    }

    public function getSubNodeNames() : array {
        return ['name', 'stmts'];
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
    }

    public function getType() : string {
        return 'Stmt_Trait';
    }
}
