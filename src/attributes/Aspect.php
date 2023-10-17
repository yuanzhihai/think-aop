<?php

namespace Ting\Aop\attributes;

use Attribute;

#[Attribute(Attribute::TARGET_CLASS | Attribute::IS_REPEATABLE)]
class Aspect
{
    public function __construct(public array $classes = [])
    {

    }
}