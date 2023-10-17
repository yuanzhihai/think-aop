<?php

namespace Ting\Aop;

use Ting\Aop\interfaces\ProceedingJoinPointInterface;
use Ting\Aop\interfaces\ProxyInterface;

/**
 * Class AbstractAspect.
 */
class AbstractAspect implements ProxyInterface
{
    //类名 eg: Index:class
    //类名 . '::方法明' eg: Index:class . '::hello'
    public array $classes = [];

    /**
     * @return mixed
     */
    public function process(ProceedingJoinPointInterface $entryClass)
    {
        return $entryClass->process();
    }
}
