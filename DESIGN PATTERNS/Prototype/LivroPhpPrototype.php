<?php

namespace Prototype;

/**
 * Class LivroPhpPrototype
 *
 * @package Prototype
 * @author Isaac Barreto
 */
class LivroPhpPrototype extends LivroPrototype
{
    /**
     * LivroPhpPrototype constructor.
     */
    public function __construct()
    {
        $this->setAssunto('PHP');
    }

    /**
     * @return self
     */
    public function __clone()
    {
        echo "Livro PHP Clonado\n";
    }
}