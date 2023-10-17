<?php

namespace Ting\Aop\interfaces;

/**
 * Interface ProxyInterface.
 */
interface ProxyInterface
{
    public function process(ProceedingJoinPointInterface $entryClass);
}
